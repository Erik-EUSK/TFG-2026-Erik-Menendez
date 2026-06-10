<?php
session_start();

// Conectamos a la base de datos para obtener el stock en tiempo real
$bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
$stocks = [];
if ($bd) {
    $res = mysqli_query($bd, "SELECT id, stock FROM productos");
    while ($row = mysqli_fetch_assoc($res)) {
        $stocks[$row['id']] = $row['stock'];
    }
    mysqli_close($bd);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Libros</title>
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
        
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <li><a href="../controlador/logout.php" style="color: #ffcccc; font-weight: bold;">Cerrar Sesión</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
    </header>

    <main class="bloque-principal">
        
        <?php if (isset($_SESSION['exito_compra'])): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb; text-align: center; font-weight: bold;">
                <?php echo $_SESSION['exito_compra']; unset($_SESSION['exito_compra']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_compra'])): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #f5c6cb; text-align: center; font-weight: bold;">
                <?php echo $_SESSION['error_compra']; unset($_SESSION['error_compra']); ?>
            </div>
        <?php endif; ?>

        <section class="catalogo-grid">
            <article class="producto-card">
                <img src="../recursos/img/harrypotter.jpg" alt="" class="img-card">
                <h3>Harry Potter y la piedra filosofal</h3>
                <p>Precio: 3000 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[12] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="12">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/salvacion.jpg" alt="" class="img-card">
                <h3>Proyecto Hail Mary</h3>
                <p>Precio: 2800 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[13] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="13">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/monster.jpg" alt="" class="img-card">
                <h3>Monster</h3>
                <p>Precio: 2000 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[14] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="14">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/mortadelo.webp" alt="" class="img-card">
                <h3>Mortadelo y Filemon</h3>
                <p>Precio: 1500 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[15] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="15">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/op.jpg" alt="" class="img-card">
                <h3>One piece</h3>
                <p>Precio: 1800 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[16] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="16">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/jeronimo.jpg" alt="" class="img-card">
                <h3>Jeronimo Stilton el reino de la fantasia</h3>
                <p>Precio: 2000 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[17] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="17">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/izaro.jpg" alt="" class="img-card">
                <h3>Izaroko altxorra</h3>
                <p>Precio: 3200 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[18] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="18">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/anillos.jpg" alt="" class="img-card">
                <h3>El señor de los anillos</h3>
                <p>Precio: 2100 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[19] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="19">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/hansel.webp" alt="" class="img-card">
                <h3>Hansel y Gretell</h3>
                <p>Precio: 1500 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[20] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="20">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/odisea.webp" alt="" class="img-card">
                <h3>La Odisea</h3>
                <p>Precio: 1200 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[21] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="21">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/anillos.jpg" alt="" class="img-card">
                <h3>Jeronimo Stilton la ultima aventura</h3>
                <p>Precio: 2500 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[22] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="22">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/starwars.jpg" alt="" class="img-card">
                <h3>Star wars</h3>
                <p>Precio: 2500 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[23] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="23">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/dn.jpg" alt="" class="img-card">
                <h3>Death Note 1</h3>
                <p>Precio: 1800 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[24] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="24">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/19kamera.jpg" alt="" class="img-card">
                <h3>19 Kamera</h3>
                <p>Precio: 1600 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[26] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="26">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/bernarda.jpg" alt="" class="img-card">
                <h3>La casa de Bernarda Alva</h3>
                <p>Precio: 1100 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[27] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="27">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/berserk.jpg" alt="" class="img-card">
                <h3>Berserk 1</h3>
                <p>Precio: 1900 pts</p>
                <p style="font-size: 0.85rem; color: #ccc; margin-bottom: 10px;">Disponibles: <?php echo $stocks[25] ?? 0; ?></p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="25">
                    <button type="submit">Comprar</button>
                </form>
            </article>
        </section>
    </main>
        
    <footer class="bloque-pie">
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>