<?php
session_start();

// 1. Validar inicio de sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../vista/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id_producto = isset($_POST['id_producto']) ? (int)$_POST['id_producto'] : 0;
    $id_usuario = $_SESSION['usuario_id'];

    if ($id_producto > 0) {
        
        $bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
        if (!$bd) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // 2. Obtener datos del libro (Precio, Stock, Título)
        $sql_prod = "SELECT precio_puntos, stock, titulo FROM productos WHERE id = ?";
        $stmt_prod = mysqli_prepare($bd, $sql_prod);
        mysqli_stmt_bind_param($stmt_prod, "i", $id_producto);
        mysqli_stmt_execute($stmt_prod);
        $res_prod = mysqli_stmt_get_result($stmt_prod);
        $producto = mysqli_fetch_assoc($res_prod);
        mysqli_stmt_close($stmt_prod);

        if (!$producto) {
            $_SESSION['error_compra'] = "Error: El producto seleccionado no está registrado en la base de datos.";
            header("Location: ../vista/libros.php");
            exit();
        }

        $precio = $producto['precio_puntos'];
        $stock_actual = $producto['stock'];
        $titulo_prod = $producto['titulo'];

        // 3. Obtener el saldo del usuario actual
        $sql_user = "SELECT saldo_puntos FROM usuarios WHERE id = ?";
        $stmt_user = mysqli_prepare($bd, $sql_user);
        mysqli_stmt_bind_param($stmt_user, "i", $id_usuario);
        mysqli_stmt_execute($stmt_user);
        $res_user = mysqli_stmt_get_result($stmt_user);
        $usuario = mysqli_fetch_assoc($res_user);
        mysqli_stmt_close($stmt_user);

        $saldo_usuario = $usuario['saldo_puntos'];

        // 4. Validar Stock
        if ($stock_actual <= 0) {
            $_SESSION['error_compra'] = "Lo sentimos, el ejemplar '$titulo_prod' se ha agotado.";
            header("Location: ../vista/libros.php");
            exit();
        }

        // 5. Validar Saldo disponible
        if ($saldo_usuario < $precio) {
            $_SESSION['error_compra'] = "Saldo insuficiente para comprar '$titulo_prod'. Cuesta $precio pts y posees $saldo_usuario pts.";
            header("Location: ../vista/libros.php");
            exit();
        }

        // 6. Ejecutar compra segura en bloque (Transacción SQL)
        mysqli_begin_transaction($bd);

        try {
            // A. Restar puntos al usuario
            $sql_restar_puntos = "UPDATE usuarios SET saldo_puntos = saldo_puntos - ? WHERE id = ?";
            $stmt1 = mysqli_prepare($bd, $sql_restar_puntos);
            mysqli_stmt_bind_param($stmt1, "ii", $precio, $id_usuario);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_close($stmt1);

            // B. Restar un artículo al stock del producto
            $sql_restar_stock = "UPDATE productos SET stock = stock - 1 WHERE id = ?";
            $stmt2 = mysqli_prepare($bd, $sql_restar_stock);
            mysqli_stmt_bind_param($stmt2, "i", $id_producto);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt2);

            // C. Insertar movimiento de historial
            $sql_transaccion = "INSERT INTO transacciones (id_usuario, id_producto, puntos_gastados) VALUES (?, ?, ?)";
            $stmt3 = mysqli_prepare($bd, $sql_transaccion);
            mysqli_stmt_bind_param($stmt3, "iii", $id_usuario, $id_producto, $precio);
            mysqli_stmt_execute($stmt3);
            mysqli_stmt_close($stmt3);

            // Guardar cambios definitivamente
            mysqli_commit($bd);
            
            $_SESSION['exito_compra'] = "¡Comprado con éxito! Adquiriste '$titulo_prod' por " . number_format($precio, 0, ',', '.') . " pts.";
            header("Location: ../vista/libros.php");
            exit();

        } catch (Exception $e) {
            // Si algo falla, deshace cualquier cambio parcial para no corromper datos
            mysqli_rollback($bd);
            $_SESSION['error_compra'] = "Error interno al tramitar el pedido. Inténtalo de nuevo.";
            header("Location: ../vista/libros.php");
            exit();
        } finally {
            mysqli_close($bd);
        }
    }
}

header("Location: ../vista/libros.php");
exit();
?>