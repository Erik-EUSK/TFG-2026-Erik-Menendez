<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Inicio</title>
    <!-- Cabecera y pie siguen usando tu CSS del sitio -->
    <link rel="stylesheet" href="recursos/css/style.css">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400..700&display=swap" rel="stylesheet">

    <!-- Estilos propios SOLO de la página de inicio -->
    <style>
        .home {
            /* Paleta de colores simple y neutral */
            --color-principal: #0056b3; /* Azul estándar */
            --color-secundario: #333333; /* Gris oscuro para textos y banners (parecido a un footer) */
            --fondo-gris: #f4f6f9;
            --blanco: #ffffff;
            --borde: #e0e0e0;
            --texto-suave: #666666;

            font-family: 'DM Sans', sans-serif;
            color: var(--color-secundario);
            background: var(--blanco);
            padding: 0;
            margin: 0;
            line-height: 1.5;
        }

        .home h1, .home h2, .home h3 {
            margin: 0;
            color: var(--color-secundario);
        }

        /* ---------- HERO SIMPLE ---------- */
        .home-hero {
            background-color: var(--fondo-gris);
            padding: 4rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid var(--borde);
        }
        .home-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .home-hero .resalte {
            color: var(--color-principal);
        }
        .home-hero p {
            max-width: 600px;
            margin: 0 auto 2rem;
            color: var(--texto-suave);
            font-size: 1.1rem;
        }
        .home-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .btn {
            font-weight: bold;
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-primario {
            background: var(--color-principal);
            color: var(--blanco);
            border: 2px solid var(--color-principal);
        }
        .btn-primario:hover {
            background: #004494;
            border-color: #004494;
        }
        .btn-secundario {
            background: var(--blanco);
            color: var(--color-secundario);
            border: 2px solid var(--color-secundario);
        }
        .btn-secundario:hover {
            background: var(--fondo-gris);
        }

        /* ---------- ESTRUCTURA SECCIONES ---------- */
        .home-seccion {
            max-width: 1100px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }
        .seccion-header {
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--borde);
            padding-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .seccion-header h2 {
            font-size: 1.8rem;
        }
        .enlace-ver-mas {
            color: var(--color-principal);
            text-decoration: none;
            font-weight: bold;
        }
        .enlace-ver-mas:hover {
            text-decoration: underline;
        }

        /* ---------- GRID DE PRODUCTOS ---------- */
        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
        }
        .tarjeta-producto {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 8px;
            padding: 1rem;
            transition: box-shadow 0.2s;
        }
        .tarjeta-producto:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        /* Cajas de color sólido para simular portadas */
        .producto-visual {
            height: 150px;
            border-radius: 6px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        .visual-azul { background-color: #4a90e2; }
        .visual-rojo { background-color: #e24a4a; }
        .visual-verde { background-color: #4ae281; }
        .visual-morado { background-color: #a04ae2; }

        .tarjeta-producto h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .producto-meta {
            font-size: 0.85rem;
            color: var(--texto-suave);
            margin-bottom: 1rem;
        }
        .producto-pie {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--borde);
            padding-top: 1rem;
        }
        .producto-precio {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--color-principal);
        }
        .btn-canjear {
            background: var(--color-secundario);
            color: var(--blanco);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-canjear:hover {
            background: #111;
        }

        /* ---------- BANNER SALDO (Estilo oscuro como un footer) ---------- */
        .info-wallet-banner {
            background: var(--color-secundario);
            color: var(--blanco);
            border-radius: 8px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .info-wallet-banner h3 {
            color: var(--blanco);
            margin-bottom: 0.5rem;
        }
        .info-wallet-banner p {
            margin: 0;
            color: #cccccc;
        }
        .wallet-badge {
            background: var(--color-principal);
            color: var(--blanco);
            padding: 1rem 2rem;
            border-radius: 6px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* ---------- CATEGORÍAS ---------- */
        .grid-categorias {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        .panel-cat {
            background: var(--fondo-gris);
            border: 1px solid var(--borde);
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            text-decoration: none;
            color: var(--color-secundario);
            transition: border-color 0.2s;
        }
        .panel-cat:hover {
            border-color: var(--color-principal);
        }
        .panel-cat h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .btn-falso {
            display: inline-block;
            margin-top: 1rem;
            background: var(--blanco);
            border: 2px solid var(--color-principal);
            color: var(--color-principal);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
        }

        /* ---------- RESPONSIVE MÓVIL ---------- */
        @media (max-width: 768px) {
            .home-cta { flex-direction: column; }
            .info-wallet-banner { flex-direction: column; text-align: center; gap: 1rem; }
            .grid-categorias { grid-template-columns: 1fr; }
            .seccion-header { flex-direction: column; align-items: flex-start; gap: 0.5rem; }
        }
    </style>
</head>
<body>

    <!-- BLOQUE 1: CABECERA (Tu CSS se mantiene intacto) -->
    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <p>(Encabezado)</p>
        <nav>
            <ul class="menu-navegacion">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="vista/videojuegos.php">Videojuegos</a></li>
                <li><a href="vista/libros.php">Libros</a></li>
                <li><a href="vista/misaldo.php">Mi Saldo</a></li>
                <li><a href="vista/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- CONTENIDO DE INICIO -->
    <main class="home">

        <!-- HERO SIMPLE -->
        <section class="home-hero">
            <h1>Contenido premium pagando con <span class="resalte">puntos</span></h1>
            <p>Recarga tu monedero virtual, explora los catálogos y canjea tus títulos favoritos al instante de forma segura y rápida.</p>
            <div class="home-cta">
                <a class="btn btn-primario" href="#novedades">Ver Novedades</a>
                <a class="btn btn-secundario" href="login.php">Iniciar Sesión</a>
            </div>
        </section>

        <!-- ESCAPARATE DE PRODUCTOS -->
        <section class="home-seccion" id="novedades">
            <div class="seccion-header">
                <h2>Últimos añadidos</h2>
                <a href="videojuegos.php" class="enlace-ver-mas">Ver todo el catálogo →</a>
            </div>

            <div class="grid-productos">
                <!-- Producto 1 -->
                <div class="tarjeta-producto">
                    <div class="producto-visual visual-azul">🎮</div>
                    <h3>Cyber Horizon 2088</h3>
                    <div class="producto-meta">Videojuego • Acción</div>
                    <div class="producto-pie">
                        <div class="producto-precio">350 pts</div>
                        <button class="btn-canjear">Comprar</button>
                    </div>
                </div>

                <!-- Producto 2 -->
                <div class="tarjeta-producto">
                    <div class="producto-visual visual-rojo">📖</div>
                    <h3>El Imperio Final</h3>
                    <div class="producto-meta">Libro • Fantasía</div>
                    <div class="producto-pie">
                        <div class="producto-precio">120 pts</div>
                        <button class="btn-canjear">Comprar</button>
                    </div>
                </div>

                <!-- Producto 3 -->
                <div class="tarjeta-producto">
                    <div class="producto-visual visual-verde">🎮</div>
                    <h3>Neon Tactics</h3>
                    <div class="producto-meta">Videojuego • Estrategia</div>
                    <div class="producto-pie">
                        <div class="producto-precio">240 pts</div>
                        <button class="btn-canjear">Comprar</button>
                    </div>
                </div>

                <!-- Producto 4 -->
                <div class="tarjeta-producto">
                    <div class="producto-visual visual-morado">📖</div>
                    <h3>Crónicas de Orión</h3>
                    <div class="producto-meta">Libro • Ciencia Ficción</div>
                    <div class="producto-pie">
                        <div class="producto-precio">95 pts</div>
                        <button class="btn-canjear">Comprar</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- BANNER TIPO FOOTER PARA INFORMACIÓN -->
        <section class="home-seccion">
            <div class="info-wallet-banner">
                <div>
                    <h3>Economía 100% Digital</h3>
                    <p>Usa tus puntos para adquirir cualquier elemento de la tienda sin pagos externos.</p>
                </div>
                <div class="wallet-badge">
                    Mi Saldo: 0 pts
                </div>
            </div>
        </section>

        <!-- SECCIÓN CATEGORÍAS -->

    </main>

    <!-- BLOQUE 3: PIE DE PÁGINA (Tu CSS se mantiene intacto) -->
    <footer class="bloque-pie">
        <p>PIE DE PÁGINA</p>
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>