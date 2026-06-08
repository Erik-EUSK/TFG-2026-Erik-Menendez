<?php
session_start();                 // necesario para guardar errores y la sesión del usuario
$conexion = mysqli_connect("localhost","root","","lumina_play_store");    // $conexion

// Solo aceptamos datos que lleguen por POST (desde el formulario)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../vista/login.php");
    exit;
}

// Recogemos los datos. trim() quita espacios sobrantes al inicio/fin.
$nombre   = trim($_POST["nombre"] ?? "");
$password = $_POST["password"] ?? "";

$errores = [];   // aquí acumulamos un mensaje por cada cosa que falle

// 1) Campos vacíos (un error para cada uno)
if ($nombre === "") {
    $errores[] = "El nombre no puede estar vacío.";
}
if ($password === "") {
    $errores[] = "La contraseña no puede estar vacía.";
}

// 2) Formato del nombre: SOLO letras (mayúsculas/minúsculas), números y espacios
//    (solo lo comprobamos si el nombre no está vacío)
if ($nombre !== "" && !preg_match('/^[A-Za-z0-9 ]+$/', $nombre)) {
    $errores[] = "El nombre solo puede contener letras, números y espacios.";
}

// Si hay errores de validación, volvemos al login mostrándolos
if (!empty($errores)) {
    $_SESSION["errores"]    = $errores;
    $_SESSION["old_nombre"] = $nombre;   // para no obligar a reescribir el nombre
    header("Location: ../vista/login.php");
    exit;
}

// 3) Comprobar contra la base de datos con CONSULTA PREPARADA
//    El "?" + bind_param evita la inyección SQL: lo que escriba el usuario
//    nunca se mezcla con la sentencia SQL.
$sql  = "SELECT id, nombre, password, rol FROM usuarios WHERE nombre = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $nombre);   // "s" = string
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$usuario   = mysqli_fetch_assoc($resultado);

// 4) Validar usuario + contraseña
//    (Por seguridad damos UN solo mensaje genérico: no revelamos si falló
//     el nombre o la contraseña, para no dar pistas a un atacante.)
if ($usuario === null || $usuario["password"] !== $password) {
    $_SESSION["errores"]    = ["Nombre o contraseña incorrectos."];
    $_SESSION["old_nombre"] = $nombre;
    header("Location: ../vista/login.php");
    exit;
}

// 5) Login correcto -> guardamos la sesión de forma segura
session_regenerate_id(true);     // nuevo id de sesión = evita "session fixation"
$_SESSION["usuario_id"] = $usuario["id"];
$_SESSION["nombre"]     = $usuario["nombre"];
$_SESSION["rol"]        = $usuario["rol"];

// 6) Redirigir según el rol
if ($usuario["rol"] === "admin") {
    header("Location: ../admin.php");
} else {
    header("Location: ../index.php");
}
exit;
?>