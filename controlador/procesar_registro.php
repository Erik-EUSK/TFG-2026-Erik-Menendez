<?php
// Iniciamos sesión para poder enviar los mensajes de error de vuelta al formulario
session_start();

// 1. Conexión corregida (añadidas comillas a los parámetros de texto)
$bd = mysqli_connect("localhost", "root", "", "lumina_play_store");

if (!$bd){
    die("Error de conexión: " . mysqli_connect_error());
}

// 2. Cambiado de $_GET a $_POST (ya que tu formulario envía los datos por POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recogemos los datos y limpiamos espacios vacíos con trim()
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // ==========================================
    // VALIDADORES SOLICITADOS
    // ==========================================
    
    if (empty($nombre) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: ../registro.php");
        exit();
    }

    // Validación 1: Mínimo 5 caracteres
    if (strlen($nombre) < 5) {
        $_SESSION['error'] = "El nombre de usuario debe tener un mínimo de 5 caracteres.";
        header("Location: ../registro.php");
        exit();
    }

    // Validación 2: Solo letras (a-z, A-Z), números y espacios
    if (!preg_match('/^[a-zA-Z0-9 ]+$/', $nombre)) {
        $_SESSION['error'] = "El nombre solo puede contener letras, números y espacios.";
        header("Location: ../registro.php");
        exit();
    }

    // Encriptamos la contraseña por seguridad antes de guardarla
    $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

    // ==========================================
    // INSERCIÓN EN LA BASE DE DATOS
    // ==========================================
    
    // Estructura limpia usando comodines (?) para proteger la consulta
    $sql = "INSERT INTO usuarios (nombre, email, password, saldo_puntos, rol) VALUES (?, ?, ?, 0, 'usuario')";
    
    // Preparamos la consulta en el servidor
    if ($stmt = mysqli_prepare($bd, $sql)) {
        
        // Vinculamos las variables correspondientes a los tres '?' ("sss" significa 3 strings)
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $password_encriptada);
        
        // Ejecutamos la inserción
        if (mysqli_stmt_execute($stmt)) {
            // Si se guarda con éxito, cerramos todo y redirigimos a la página principal
            mysqli_stmt_close($stmt);
            mysqli_close($bd);
            
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al registrar en la base de datos: " . mysqli_error($bd);
            header("Location: ../vista/registro.php");
            exit();
        }
    }
}

// Cerramos la conexión si no se entró al bloque POST
mysqli_close($bd);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Procesando Registro...</title>
</head>
<body>
    <p>Procesando los datos del registro...</p>
</body>
</html>