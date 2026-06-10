<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Videojuegos</title>
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
                <img src="../recursos/img/thewitcher.webp" alt="" class="img-card">
                <h3>The Witcher 3</h3>
                <p>Precio: 2500 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="1">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/cyberpunk.jpg" alt="" class="img-card">
                <h3>Cyberpunk</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="3">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/reddead.jpg" alt="" class="img-card">
                <h3>Red Dead Redemption 2</h3>
                <p>Precio: 1500 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="5">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/uncharted.jpg" alt="" class="img-card">
                <h3>Uncharted 4</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="6">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/tlou.jpg" alt="" class="img-card">
                <h3>The Last of Us</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="7">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/tlou2.jpg" alt="" class="img-card">
                <h3>The Last of Us 2</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="8">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/bo3.jpg" alt="" class="img-card">
                <h3>Call of Duty Black Ops 3</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="9">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/r6.jpg" alt="" class="img-card">
                <h3>Rainbow Six Siege</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="10">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/stardew.png" alt="" class="img-card">
                <h3>Stardew Valley</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="11">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/battlefront.jpg" alt="" class="img-card">
                <h3>Star Wars Battlefront 2</h3>
                <p>Precio: 2500 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="28">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/expedition.webp" alt="" class="img-card">
                <h3>Expedition 33</h3>
                <p>Precio: 1800 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="29">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/ds.avif" alt="" class="img-card">
                <h3>Dark Souls 3</h3>
                <p>Precio: 3500 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="30">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/spyro.webp" alt="" class="img-card">
                <h3>Spyro</h3>
                <p>Precio: 2200 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="31">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/sekiro.jpg" alt="" class="img-card">
                <h3>Sekiro</h3>
                <p>Precio: 3000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="32">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/detroit.jpg" alt="" class="img-card">
                <h3>Detroit Become Human</h3>
                <p>Precio: 2000 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="33">
                    <button type="submit">Comprar</button>
                </form>
            </article>

            <article class="producto-card">
                <img src="../recursos/img/subnautica.jpg" alt="" class="img-card">
                <h3>Subnautica</h3>
                <p>Precio: 1500 pts</p>
                <form action="../controlador/procesar_compra.php" method="POST">
                    <input type="hidden" name="id_producto" value="34">
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