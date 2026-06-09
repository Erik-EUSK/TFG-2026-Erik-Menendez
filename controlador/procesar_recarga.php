<?php
session_start();

// Validar que nadie entre aquí sin haber iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../vista/login.php");
    exit();
}

// Comprobar que los datos llegaron por el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtenemos los puntos y los convertimos a número entero por seguridad
    $puntos_recarga = isset($_POST['puntos']) ? (int)$_POST['puntos'] : 0;

    if ($puntos_recarga > 0) {
        
        $bd = mysqli_connect("localhost", "root", "", "lumina_play_store");

        if (!$bd){
            die("Error de conexión: " . mysqli_connect_error());
        }

        $usuario_id = $_SESSION['usuario_id'];

        // Actualizamos la base de datos sumando los puntos
        $sql = "UPDATE usuarios SET saldo_puntos = saldo_puntos + ? WHERE id = ?";
        
        if ($stmt = mysqli_prepare($bd, $sql)) {
            mysqli_stmt_bind_param($stmt, "ii", $puntos_recarga, $usuario_id);
            
            if (mysqli_stmt_execute($stmt)) {
                
                // ===================================================================
                // NUEVO: Guardamos el movimiento de la recarga en el historial
                // ===================================================================
                $sql_trans = "INSERT INTO transacciones (id_usuario, id_producto, puntos_gastados) VALUES (?, NULL, ?)";
                if ($stmt_trans = mysqli_prepare($bd, $sql_trans)) {
                    mysqli_stmt_bind_param($stmt_trans, "ii", $usuario_id, $puntos_recarga);
                    mysqli_stmt_execute($stmt_trans);
                    mysqli_stmt_close($stmt_trans);
                }

                // Si va bien, generamos el aviso
                $_SESSION['exito'] = "¡Éxito! Has recargado " . number_format($puntos_recarga, 0, ',', '.') . " puntos a tu cartera.";
            } else {
                $_SESSION['exito'] = "Hubo un error al intentar recargar.";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($bd);
    }
}

// Redirigir de vuelta a "Mi Saldo"
header("Location: ../vista/misaldo.php");
exit();
?>