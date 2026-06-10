<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lumina Play Store - Registro</title>     
        <link rel="stylesheet" href="../recursos/css/style.css">
        <script src="../recursos/js/scripts.js" defer></script>
        <style>
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
            
            .error-message {
                color: #c0392b;
                background: #fdecea;
                border: 1px solid #f5c6c0;
                padding: .6rem .8rem;
                border-radius: 8px;
                margin-bottom: 1rem;
                font-size: .95rem;
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
                <h2>Crea una cuenta de Lumina Play Store</h2>
                <p>Ingrese sus datos a continuación</p>
                
                <?php
                // Mostrar errores si existen
                if (!empty($_SESSION["errores_registro"])) {
                    echo '<div class="error-message">';
                    foreach ($_SESSION["errores_registro"] as $error) {
                        echo '<p>' . htmlspecialchars($error) . '</p>';
                    }
                    echo '</div>';
                    unset($_SESSION["errores_registro"]);
                }
                ?>
                
                <form action="../controlador/procesar_registro.php" method="POST" class="formulario-login">
                    <div class="grupo-input">
                        <label for="nombre">Nombre de usuario:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="grupo-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="grupo-input">
                        <label for="password">Contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" required>
                            <button type="button" class="toggle-password" id="togglePassword">
                                <i>👁️‍🗨️</i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="grupo-input">
                        <label for="confirm_password">Confirmar Contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <button type="button" class="toggle-password" id="toggleConfirmPassword">
                                <i>👁️‍🗨️</i>
                            </button>
                        </div>
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
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ojo para contraseña principal
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
                
                // Ojo para confirmar contraseña
                const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
                const confirmPasswordInput = document.getElementById('confirm_password');
                
                if (toggleConfirmPassword && confirmPasswordInput) {
                    toggleConfirmPassword.addEventListener('click', function() {
                        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        confirmPasswordInput.setAttribute('type', type);
                        
                        const icon = toggleConfirmPassword.querySelector('i');
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