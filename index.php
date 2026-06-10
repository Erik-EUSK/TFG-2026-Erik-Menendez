<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Inicio</title>
    <link rel="stylesheet" href="recursos/css/style.css">
    
    <style>
        .contenedor-blanco {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Contenedor para las fotos */
        .galeria-novedades {
            display: flex;
            gap: 15px; /* Espacio entre fotos */
            margin-top: 20px;
        }

        /* Estilo para cada imagen */
        .galeria-novedades img {
            width: 100%;       /* Ocupa el espacio disponible */
            height: 250px;     /* Altura fija para todas igual */
            object-fit: cover; /* Corta la imagen para que no se deforme y rellene el espacio */
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <nav>
            <ul class="menu-navegacion">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="vista/videojuegos.php">Videojuegos</a></li>
                <li><a href="vista/libros.php">Libros</a></li>
                <li><a href="vista/misaldo.php">Mi Saldo</a></li>
                
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li><a href="controlador/logout.php" style="color: #ffcccc; font-weight: bold;">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="vista/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="bloque-principal">
        <div class="contenedor-blanco">
            
            <section class="home-seccion">
                <div class="seccion-header">
                    <h2>Bienvenido a Lumina Play Store</h2>
                </div>
                <p>Aquí puedes conseguir los últimos videojuegos y libros utilizando nuestro sistema de puntos.</p><br>
                <h2>ULTIMAS NOVEDADES!!!</h2>
                <div class="galeria-novedades">
                    <img src="recursos/img/reddead.jpg" alt="Juego 1">
                    <img src="recursos/img/ds.avif" alt="Juego 2">
                    <img src="recursos/img/salvacion.jpg" alt="Juego 3">
                </div>
            </section>

            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <a href="vista/videojuegos.php" class="btn-accion">Ver Videojuegos</a>
                <a href="vista/libros.php" class="btn-accion">Ver Libros</a>
            </div>

        </div> 
    </main>

    <footer class="bloque-pie">
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>