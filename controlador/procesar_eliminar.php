<?php
session_start();

// 1. Solo un admin logueado puede borrar. Si no, fuera.
if (!isset($_SESSION['usuario_id']) || ($_SESSION['rol'] ?? '') !== 'admin') {
    header("Location: ../vista/login.php");
    exit();
}

// 2. Solo aceptamos POST (los enlaces GET no deben borrar cosas)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../vista/admin.php");
    exit();
}

$tabla = $_POST['tabla'] ?? '';
$id    = (int)($_POST['id'] ?? 0);

// 3. LISTA BLANCA de tablas: el nombre de una tabla NO se puede pasar
//    como parámetro de una consulta preparada, así que solo permitimos
//    exactamente estos dos valores. Cualquier otra cosa -> error.
$tablas_permitidas = ['usuarios', 'productos'];

if (!in_array($tabla, $tablas_permitidas, true) || $id <= 0) {
    $_SESSION['admin_error'] = "Petición de borrado no válida.";
    header("Location: ../vista/admin.php");
    exit();
}

// 4. Un admin no puede borrarse a sí mismo (se quedaría fuera del panel)
if ($tabla === 'usuarios' && $id === (int)$_SESSION['usuario_id']) {
    $_SESSION['admin_error'] = "No puedes eliminar tu propio usuario.";
    header("Location: ../vista/admin.php");
    exit();
}

$bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
if (!$bd) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 5. Borrado con consulta preparada (el id va con bind_param).
//    Las transacciones asociadas se borran solas gracias al
//    ON DELETE CASCADE definido en la base de datos.
$sql  = "DELETE FROM $tabla WHERE id = ?";
$stmt = mysqli_prepare($bd, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt) && mysqli_stmt_affected_rows($stmt) > 0) {
    $nombre_cosa = ($tabla === 'usuarios') ? 'Usuario' : 'Producto';
    $_SESSION['admin_exito'] = "$nombre_cosa con id $id eliminado correctamente.";
} else {
    $_SESSION['admin_error'] = "No se pudo eliminar (¿el registro ya no existe?).";
}

mysqli_stmt_close($stmt);
mysqli_close($bd);

header("Location: ../vista/admin.php");
exit();
?>
