<?php
// Conexión a la base de datos. La incluimos desde otros archivos con require_once.
$host        = "localhost";
$usuario_db  = "root";
$pass_db     = "";
$base_datos  = "lumina_play_store";

$conexion = mysqli_connect($host, $usuario_db, $pass_db, $base_datos);

if (!$conexion) {
    die("Error de conexión con la base de datos.");
}

?>