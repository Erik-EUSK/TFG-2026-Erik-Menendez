<?php
session_start();
// Si el usuario ya tiene sesión iniciada, lo mandamos al index automáticamente
if (isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Iniciar Sesión</title>
    <!-- Enlazamos tu CSS global -->
    <link rel="stylesheet" href="../recursos/css/style.css">
    <script src="../recursos/js/scripts.js" defer></script>

    <!-- Estilo de los mensajes de error (rojo) -->
    <style>
        .errores-login { margin-bottom: 1rem; }
        .mensaje-error {
            color: #c0392b;
            background: #fdecea;
            border: 1px solid #f5c6c0;
            padding: .6rem .8rem;
            border-radius: 8px;
            margin: 0 0 .5rem;
            font-size: .95rem;
        }
        
        /* Estilo para el campo de contraseña con ojo */
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .password-container input {
            flex: 1;
            padding-right: 40px;
        }
        
        .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            background: none;
            border: none;
            padding: 0;
            margin: 0;
        }
        
        .toggle-password i {
            font-style: normal;
        }
    </style>
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

    <main class="bloque-principal contenedor-login">

        <section class="tarjeta-login">
            <h2>Lumina Play Store</h2>
            <p>Inicia sesion para acceder a tu cuenta</p>

            <?php
                // Mostramos los errores que dejó el controlador (si los hay)
                if (!empty($_SESSION["errores"])) {
                    echo '<div class="errores-login">';
                    foreach ($_SESSION["errores"] as $error) {
                        echo '<p class="mensaje-error">' . htmlspecialchars($error) . '</p>';
                    }
                    echo '</div>';
                    unset($_SESSION["errores"]);   // se borran para que no salgan al recargar
                }

                // Recuperamos el nombre escrito para no obligar a reescribirlo
                $old_nombre = $_SESSION["old_nombre"] ?? "";
                unset($_SESSION["old_nombre"]);
            ?>

            <!-- El atributo action enviará los datos a tu lógica PHP -->
            <form action="../controlador/procesar_login.php" method="POST" class="formulario-login">

                <div class="grupo-input">
                    <label for="nombre">Nombre de usuario:</label>
                    <input type="text" id="nombre" name="nombre" required
                           placeholder="nombre usuario"
                           value="<?php echo htmlspecialchars($old_nombre); ?>">
                </div>

                <div class="grupo-input">
                    <label for="password">Contraseña:</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required placeholder="********">
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i>👁️‍🗨️</i>
                        </button>
                    </div>
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
    
    <script>
        // Inicializar el ojo para mostrar/ocultar contraseña en login
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    const icon = togglePassword.querySelector('i');
                    if (type === 'text') {
                        icon.textContent = '👁️';
                    } else {
                        icon.textContent = '👁️‍🗨️';
                    }
                });
            }
        });
    </script>
</body>
</html>