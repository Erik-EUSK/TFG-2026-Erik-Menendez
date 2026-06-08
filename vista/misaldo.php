<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Mi Saldo</title>
    <!-- Mismo enlace al CSS externo que en libros.php -->
    <link rel="stylesheet" href="../recursos/css/style.css">
</head>
<body>

    <!-- BLOQUE 1: CABECERA (igual que en libros.php) -->
    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <p>(Encabezado)</p>
        <nav>
            <ul class="menu-navegacion">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="videojuegos.php">Videojuegos</a></li>
                <li><a href="libros.php">Libros</a></li>
                <li><a href="misaldo.php">Mi Saldo</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- BLOQUE 2: CONTENEDOR PRINCIPAL -->
    <!-- El div .home aporta las variables de color que usan el banner y las secciones -->
    <main class="bloque-principal">
        <div class="home">

            <!-- Banner con el saldo actual -->
            <section class="home-seccion">
                <div class="info-wallet-banner">
                    <div>
                        <h3>Tu saldo actual</h3>
                        <p>Puntos disponibles para canjear en libros y videojuegos</p>
                    </div>
                    <div class="wallet-badge">2.500 pts</div>
                </div>
            </section>

            <!-- Recargar saldo -->
            <section class="home-seccion">
                <div class="seccion-header">
                    <h2>Recargar saldo</h2>
                    <a href="#" class="enlace-ver-mas">Ver todos los packs</a>
                </div>

                <div class="grid-categorias">
                    <a href="#" class="panel-cat">
                        <h3>1.000 pts</h3>
                        <p>Ideal para un cómic o un libro infantil</p>
                        <span class="btn-falso">Recargar · 5 €</span>
                    </a>
                    <a href="#" class="panel-cat">
                        <h3>2.500 pts</h3>
                        <p>El pack más vendido de la tienda</p>
                        <span class="btn-falso">Recargar · 10 €</span>
                    </a>
                    <a href="#" class="panel-cat">
                        <h3>5.000 pts</h3>
                        <p>Para varias compras o un videojuego grande</p>
                        <span class="btn-falso">Recargar · 18 €</span>
                    </a>
                    <a href="#" class="panel-cat">
                        <h3>10.000 pts</h3>
                        <p>Máximo ahorro por punto</p>
                        <span class="btn-falso">Recargar · 32 €</span>
                    </a>
                </div>
            </section>

            <!-- Últimos movimientos -->
            <section class="home-seccion">
                <div class="seccion-header">
                    <h2>Últimos movimientos</h2>
                    <a href="#" class="enlace-ver-mas">Ver historial completo</a>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="text-align:left; border-bottom:2px solid var(--borde);">
                            <th style="padding:0.8rem 0;">Fecha</th>
                            <th style="padding:0.8rem 0;">Concepto</th>
                            <th style="padding:0.8rem 0; text-align:right;">Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom:1px solid var(--borde);">
                            <td style="padding:0.8rem 0; color:var(--texto-suave);">05/06/2026</td>
                            <td style="padding:0.8rem 0;">Recarga de saldo (pack 2.500 pts)</td>
                            <td style="padding:0.8rem 0; text-align:right; color:#1a7a3a; font-weight:bold;">+2.500</td>
                        </tr>
                        <tr style="border-bottom:1px solid var(--borde);">
                            <td style="padding:0.8rem 0; color:var(--texto-suave);">03/06/2026</td>
                            <td style="padding:0.8rem 0;">Compra: Proyecto Hail Mary</td>
                            <td style="padding:0.8rem 0; text-align:right; color:#b32424; font-weight:bold;">-1.500</td>
                        </tr>
                        <tr style="border-bottom:1px solid var(--borde);">
                            <td style="padding:0.8rem 0; color:var(--texto-suave);">28/05/2026</td>
                            <td style="padding:0.8rem 0;">Compra: Mortadelo y Filemón</td>
                            <td style="padding:0.8rem 0; text-align:right; color:#b32424; font-weight:bold;">-1.200</td>
                        </tr>
                        <tr>
                            <td style="padding:0.8rem 0; color:var(--texto-suave);">20/05/2026</td>
                            <td style="padding:0.8rem 0;">Recarga de saldo (pack 5.000 pts)</td>
                            <td style="padding:0.8rem 0; text-align:right; color:#1a7a3a; font-weight:bold;">+5.000</td>
                        </tr>
                    </tbody>
                </table>
            </section>

        </div>
    </main>

    <!-- BLOQUE 3: PIE DE PÁGINA (igual que en libros.php) -->
    <footer class="bloque-pie">
        <p>PIE DE PÁGINA</p>
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>
