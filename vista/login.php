<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Iniciar Sesión</title>
    <!-- Enlazamos tu CSS global -->
    <link rel="stylesheet" href="recursos/css/style.css">
</head>
<body>

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

    <main class="bloque-principal contenedor-login">
        
        <section class="tarjeta-login">
            <h2>Lumina Play Store</h2>
            <p>Inicia sesion para acceder a tu cuenta</p>
            
            <!-- El atributo action enviará los datos a tu lógica PHP -->
            <form action="logicaPhp/procesar_login.php" method="POST" class="formulario-login">
                
                <div class="grupo-input">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required placeholder="tu@email.com">
                </div>

                <div class="grupo-input">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required placeholder="********">
                </div>

                <button type="submit" class="btn-accion btn-login">Entrar</button>
            </form>
            
            <p class="enlace-registro">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </section>

    </main>

    <footer class="bloque-pie">
        <p>PIE DE PÁGINA</p>
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>