<?php
session_start();

// 1. Verificamos que el usuario haya iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
if (!$bd) {
    die("Error de conexión: " . mysqli_connect_error());
}

$usuario_id = $_SESSION['usuario_id'];

// 2. Obtenemos el saldo actual del usuario
$sql_usuario = "SELECT saldo_puntos FROM usuarios WHERE id = ?";
$stmt_user = mysqli_prepare($bd, $sql_usuario);
mysqli_stmt_bind_param($stmt_user, "i", $usuario_id);
mysqli_stmt_execute($stmt_user);
$resultado_user = mysqli_stmt_get_result($stmt_user);
$usuario = mysqli_fetch_assoc($resultado_user);
$saldo_actual = $usuario['saldo_puntos'];
mysqli_stmt_close($stmt_user);

// 3. Obtenemos el historial real de compras de ESE usuario
$sql_historial = "SELECT t.fecha_compra, p.titulo, t.puntos_gastados 
                  FROM transacciones t 
                  JOIN productos p ON t.id_producto = p.id 
                  WHERE t.id_usuario = ? 
                  ORDER BY t.fecha_compra DESC LIMIT 5";
$stmt_hist = mysqli_prepare($bd, $sql_historial);
mysqli_stmt_bind_param($stmt_hist, "i", $usuario_id);
mysqli_stmt_execute($stmt_hist);
$historial = mysqli_stmt_get_result($stmt_hist);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Mi Saldo</title>
    <link rel="stylesheet" href="../recursos/css/style.css">
</head>
<body>
    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <p>(Encabezado)</p>
        <nav>
            <ul class="menu-navegacion">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="videojuegos.php">Videojuegos</a></li>
                <li><a href="libros.php">Libros</a></li>
                <li><a href="misaldo.php">Mi Saldo</a></li>
                <li><a href="perfil.php">Mi Perfil</a></li> 
            </ul>
        </nav>
    </header>

    <main class="bloque-principal">
        <div class="home">
            
            <?php if (isset($_SESSION['exito'])): ?>
                <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb; text-align: center; font-weight: bold;">
                    <?php 
                        echo $_SESSION['exito']; 
                        unset($_SESSION['exito']); 
                    ?>
                </div>
            <?php endif; ?>

            <section class="home-seccion">
                <div class="info-wallet-banner">
                    <div>
                        <h3>Tu saldo actual</h3>
                        <p>Puntos disponibles para canjear en libros y videojuegos</p>
                    </div>
                    <div class="wallet-badge"><?php echo number_format($saldo_actual, 0, ',', '.'); ?> pts</div>
                </div>
            </section>

            <section class="home-seccion">
                <div class="seccion-header">
                    <h2>Recargar saldo</h2>
                </div>

                <div class="grid-categorias">
                    <form action="../controlador/procesar_recarga.php" method="POST">
                        <input type="hidden" name="puntos" value="1000">
                        <button type="submit" class="panel-cat" style="width: 100%; cursor: pointer; display: block; box-sizing: border-box; font-family: inherit;">
                            <h3>1.000 pts</h3>
                            <p>Ideal para un cómic o un libro infantil</p>
                            <span class="btn-falso">Recargar · 5 €</span>
                        </button>
                    </form>

                    <form action="../controlador/procesar_recarga.php" method="POST">
                        <input type="hidden" name="puntos" value="2500">
                        <button type="submit" class="panel-cat" style="width: 100%; cursor: pointer; display: block; box-sizing: border-box; font-family: inherit;">
                            <h3>2.500 pts</h3>
                            <p>El pack más vendido de la tienda</p>
                            <span class="btn-falso">Recargar · 10 €</span>
                        </button>
                    </form>

                    <form action="../controlador/procesar_recarga.php" method="POST">
                        <input type="hidden" name="puntos" value="5000">
                        <button type="submit" class="panel-cat" style="width: 100%; cursor: pointer; display: block; box-sizing: border-box; font-family: inherit;">
                            <h3>5.000 pts</h3>
                            <p>Para varias compras o un videojuego grande</p>
                            <span class="btn-falso">Recargar · 18 €</span>
                        </button>
                    </form>

                    <form action="../controlador/procesar_recarga.php" method="POST">
                        <input type="hidden" name="puntos" value="10000">
                        <button type="submit" class="panel-cat" style="width: 100%; cursor: pointer; display: block; box-sizing: border-box; font-family: inherit;">
                            <h3>10.000 pts</h3>
                            <p>Máximo ahorro por punto</p>
                            <span class="btn-falso">Recargar · 32 €</span>
                        </button>
                    </form>
                </div>
            </section>

            <section class="home-seccion">
                <div class="seccion-header">
                    <h2>Últimos movimientos (Compras)</h2>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="text-align:left; border-bottom:2px solid var(--borde);">
                            <th style="padding:0.8rem 0;">Fecha</th>
                            <th style="padding:0.8rem 0;">Concepto</th>
                            <th style="padding:0.8rem 0; text-align:right;">Puntos Gastados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($historial) > 0) {
                            // Imprimimos el historial real del usuario
                            while ($fila = mysqli_fetch_assoc($historial)) {
                                $fecha = date("d/m/Y", strtotime($fila['fecha_compra']));
                                $titulo = $fila['titulo'];
                                $puntos = number_format($fila['puntos_gastados'], 0, ',', '.');
                                
                                echo "<tr style='border-bottom:1px solid var(--borde);'>";
                                echo "<td style='padding:0.8rem 0; color:var(--texto-suave);'>$fecha</td>";
                                echo "<td style='padding:0.8rem 0;'>Compra: $titulo</td>";
                                echo "<td style='padding:0.8rem 0; text-align:right; color:#b32424; font-weight:bold;'>-$puntos</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' style='padding:1rem 0; text-align:center;'>Aún no has realizado ninguna compra.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <footer class="bloque-pie">
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>
</body>
</html>
<?php mysqli_close($bd); ?>