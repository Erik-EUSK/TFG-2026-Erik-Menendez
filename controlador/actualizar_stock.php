<?php
session_start();

// 1. Capa de Seguridad: Solo un administrador logueado puede ejecutar esto.
if (!isset($_SESSION['usuario_id']) || ($_SESSION['rol'] ?? '') !== 'admin') {
    header("Location: ../vista/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nuevo_stock = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;

    if ($id > 0 && $nuevo_stock >= 0) {
        $bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
        
        if ($bd) {
            $id = mysqli_real_escape_string($bd, $id);
            $nuevo_stock = mysqli_real_escape_string($bd, $nuevo_stock);
            
            $sql = "UPDATE productos SET stock = $nuevo_stock WHERE id = $id";
            
            if (mysqli_query($bd, $sql)) {
                $_SESSION['admin_exito'] = "Stock del producto ID #$id actualizado correctamente.";
            } else {
                $_SESSION['admin_error'] = "Error al intentar actualizar el stock de la base de datos.";
            }
            mysqli_close($bd);
        }
    }
}

// Redirigir de regreso al panel administrativo
header("Location: ../vista/admin.php");
exit();