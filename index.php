<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Inicio</title>
    <!-- Enlazamos tu CSS global -->
    <link rel="stylesheet" href="recursos/css/style.css">
</head>
<body>

    <!-- NOTA: Aquí deberías poner tu <header> o incluirlo con PHP -->
    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <p>(Encabezado)</p>
        <nav>
            <ul class="menu-navegacion">
                 <li><a href="index.php">Inicio</a></li>
                <li><a href="videojuegos.php">Videojuegos</a></li>
                <li><a href="libros.php">Libros</a></li>
                <li><a href="#">Mi Saldo</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="bloque-principal">
        
        <!-- SECCIÓN PRINCIPAL (HERO) -->
        <section class="hero-section">
            <h1>Bienvenido a Lumina Play Store</h1>
            <p>Tu universo digital de lectura y <i>gaming</i>. Descubre, colecciona y disfruta de los mejores libros y videojuegos utilizando nuestro exclusivo sistema de Créditos Lumina. Sin tarjetas bancarias en cada compra, total seguridad.</p>
            <a href="registro.php" class="btn-accion">Crea tu cuenta gratis</a>
        </section>

        <!-- SECCIÓN INFORMATIVA: ¿CÓMO FUNCIONA? -->
        <h2 style="text-align: center; margin-bottom: 30px;">¿Cómo funciona nuestra plataforma?</h2>
        
        <section class="info-grid">
            <article class="info-card">
                <h3>🪙 1. Recarga tu Saldo</h3>
                <p>Adquiere Puntos Lumina de forma rápida desde tu perfil de usuario. Es tu moneda virtual para adquirir cualquier producto.</p>
            </article>
            <article class="info-card">
                <h3>🎮 2. Explora el Catálogo</h3>
                <p>Navega por cientos de videojuegos de última generación y libros <i>bestseller</i> en nuestra extensa biblioteca digital.</p>
            </article>
            <article class="info-card">
                <h3>✅ 3. Canjea y Disfruta</h3>
                <p>Usa tus puntos para adquirir tus títulos favoritos al instante. El producto se añadirá automáticamente a tu colección.</p>
            </article>
        </section>

    </main>


    
    <footer class="bloque-pie">
        <p>PIE DE PÁGINA</p>
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>
</body>
</html>