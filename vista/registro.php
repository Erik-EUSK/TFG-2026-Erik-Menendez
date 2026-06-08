<html>
    <head>
          <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lumina Play Store - Wireframe a Color</title>     
        <link rel="stylesheet" href="recursos/css/style.css">
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="bloque-principal contenedor-login">
        <section class="tarjeta-login">
            <h2>Crea una cuenta de Lumina Play Store</h2>
            <p>Ingrese sus datos a continuación</p>
            <form action="logicaPhp/procesar_registro.php" method="POST" class="formulario-login">
                <div class="grupo-input">
                    <label for="">Nombre completo: </label>
                    <input type="text"><br>
                </div>
                <div class="grupo-input">
                      <label for="">Email: </label>
                      <input type="text"><br>
                </div>
                <div class="grupo-input">
                     <label for="">Contraseña</label>
                    <input type="password">
                </div>
                <button type="submit" class="btn-accion btn-login">Registrarse</button>
            </form>
        </section>
    </main>
     <footer class="bloque-pie">
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
        <p>Siguenos!!!</p>
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
    </footer>
    </body>
</html>