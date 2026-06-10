<?php
session_start();

// 1. Solo puede entrar un usuario logueado Y con rol "admin".
if (!isset($_SESSION['usuario_id']) || ($_SESSION['rol'] ?? '') !== 'admin') {
    header("Location: login.php");
    exit();
}

$bd = mysqli_connect("localhost", "root", "", "lumina_play_store");
if (!$bd) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql_usuarios = "SELECT id, nombre, email, saldo_puntos, rol, fecha_registro FROM usuarios ORDER BY id";
$usuarios = mysqli_query($bd, $sql_usuarios);

$sql_productos = "SELECT p.id, p.titulo, p.tipo, p.precio_puntos, p.stock, c.nombre AS categoria
                  FROM productos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  ORDER BY p.id";
$productos = mysqli_query($bd, $sql_productos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Admin</title>
    <link rel="stylesheet" href="../recursos/css/style.css">
    <script src="../recursos/js/scripts.js" defer></script>
    <style>
        body { background-color: #f4f7f6 ; color: #333 ; margin: 0; padding: 0; }
        
        .admin-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .seccion-admin { margin-bottom: 60px; padding-bottom: 20px; border-bottom: 1px solid #eee; }
        .seccion-admin h2 { margin-bottom: 20px; color: #2c3e50; }

        .contenedor-tabla { overflow-x: auto; }
        .tabla-admin { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .tabla-admin th { background-color: #f8f9fa; color: #555; padding: 15px; text-align: left; border-bottom: 2px solid #ddd; }
        .tabla-admin td { padding: 15px; border-bottom: 1px solid #eee; }
        .tabla-admin tr:hover { background-color: #fcfcfc; }

        .boton-eliminar { background-color: #ff4d4d; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; }
        .boton-eliminar:hover { background-color: #cc0000; }

        .btn-volver {
            display: inline-block;
            padding: 12px 25px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s;
            margin-top: 20px;
        }
        .btn-volver:hover { background-color: #5a6268; }

        .etiqueta-rol { padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; }
        .rol-admin { background: #d4edda; color: #155724; }
        .rol-usuario { background: #e2e3e5; color: #383d41; }
        
        .input-stock {
            width: 60px; 
            padding: 6px; 
            text-align: center; 
            border: 1px solid #ccc; 
            border-radius: 4px;
            font-size: 0.95rem;
        }
        .btn-guardar-stock {
            background-color: #2c3e50; 
            color: white; 
            border: none; 
            padding: 6px 10px; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: bold;
            transition: background 0.2s;
        }
        .btn-guardar-stock:hover { background-color: #1a252f; }
        
        /* Estilo para indicadores de ordenamiento */
        .tabla-admin th {
            cursor: pointer;
            user-select: none;
        }
        
        .tabla-admin th span {
            margin-left: 8px;
            font-size: 12px;
        }
        
        /* Animación para las filas al ordenar */
        .tabla-admin tbody tr {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

    <header class="cabecera-admin" style="background: #2c3e50; padding: 20px; color: white; text-align: center;">
        <h1>Panel de Administración</h1>
        <p>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong></p>
    </header>

    <main class="admin-wrapper">

        <?php if (isset($_SESSION['admin_exito'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                <?php echo htmlspecialchars($_SESSION['admin_exito']); unset($_SESSION['admin_exito']); ?>
            </div>
        <?php endif; ?>

        <section class="seccion-admin">
            <h2>Usuarios (<span id="totalUsuarios"><?php echo mysqli_num_rows($usuarios); ?></span>)</h2>
            <div class="contenedor-tabla">
                <table class="tabla-admin" id="tablaUsuarios">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Nombre</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Saldo</th>
                            <th data-sortable="true">Rol</th>
                            <th data-sortable="true">Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Resetear el puntero del resultado
                        mysqli_data_seek($usuarios, 0);
                        while ($u = mysqli_fetch_assoc($usuarios)): 
                        ?>
                            <tr>
                                <td><?php echo $u['id']; ?></td>
                                <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($u['email']); ?></td>
                                <td><?php echo number_format($u['saldo_puntos'], 0, ',', '.'); ?></td>
                                <td><span class="etiqueta-rol <?php echo $u['rol'] === 'admin' ? 'rol-admin' : 'rol-usuario'; ?>"><?php echo htmlspecialchars($u['rol'] ?? 'usuario'); ?></span></td>
                                <td><?php echo htmlspecialchars($u['fecha_registro']); ?></td>
                                <td>
                                    <?php if ((int)$u['id'] !== (int)$_SESSION['usuario_id']): ?>
                                       <form method="POST" action="../controlador/procesar_eliminar.php" onsubmit="return confirm('¿Eliminar este usuario? Esta acción no se puede deshacer.');">
                                            <input type="hidden" name="tabla" value="usuarios"> 
                                            <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
                                            <button type="submit" class="boton-eliminar">Eliminar</button>
                                        </form>
                                    <?php else: ?>
                                        <span style="color: #999;">(Tu cuenta)</span>
                                    <?php endif; ?>
                                 </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="seccion-admin">
            <h2>Productos (<span id="totalProductos"><?php echo mysqli_num_rows($productos); ?></span>)</h2>
            <div class="contenedor-tabla">
                <table class="tabla-admin" id="tablaProductos">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Título</th>
                            <th data-sortable="true">Tipo</th>
                            <th data-sortable="true">Categoría</th>
                            <th data-sortable="true">Precio</th>
                            <th data-sortable="true">Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        mysqli_data_seek($productos, 0);
                        while ($p = mysqli_fetch_assoc($productos)): 
                        ?>
                            <tr>
                                <td><?php echo $p['id']; ?></td>
                                <td><?php echo htmlspecialchars($p['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($p['tipo']); ?></td>
                                <td><?php echo htmlspecialchars($p['categoria'] ?? '—'); ?></td>
                                <td><?php echo number_format($p['precio_puntos'], 0, ',', '.'); ?></td>
                                <td>
                                    <form method="POST" action="../controlador/actualizar_stock.php" style="display: flex; gap: 5px; align-items: center;">
                                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                                        <input type="number" name="stock" value="<?php echo $p['stock']; ?>" min="0" class="input-stock">
                                        <button type="submit" class="btn-guardar-stock" title="Guardar stock">✔</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="../controlador/procesar_eliminar.php" onsubmit="return confirm('¿Eliminar este producto? Esta acción no se puede deshacer.');">
                                        <input type="hidden" name="tabla" value="productos"> 
                                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                                        <button type="submit" class="boton-eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <div style="text-align: center; margin-top: 20px;">
            <a href="../index.php" class="btn-volver">← Volver a la Tienda</a>
        </div>

    </main>

    <footer style="text-align: center; padding: 20px; color: #888;">
        <p>Lumina Play Store · Administración</p>
    </footer>
    
    <script>
        // Función específica para ordenar las tablas del admin
        function setupAdminSorting() {
            const tables = ['tablaUsuarios', 'tablaProductos'];
            
            tables.forEach(tableId => {
                const table = document.getElementById(tableId);
                if (!table) return;
                
                const headers = table.querySelectorAll('th[data-sortable="true"]');
                const tbody = table.querySelector('tbody');
                
                headers.forEach((header, idx) => {
                    // Crear indicador de orden si no existe
                    if (!header.querySelector('.sort-indicator')) {
                        const indicator = document.createElement('span');
                        indicator.className = 'sort-indicator';
                        indicator.textContent = ' ↕️';
                        indicator.style.fontSize = '12px';
                        header.appendChild(indicator);
                    }
                    
                    header.addEventListener('click', () => {
                        const columnIndex = Array.from(header.parentNode.children).indexOf(header);
                        const currentDirection = header.getAttribute('data-sort-direction') || 'asc';
                        const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
                        
                        // Resetear todos los headers
                        headers.forEach(h => {
                            h.setAttribute('data-sort-direction', '');
                            const ind = h.querySelector('.sort-indicator');
                            if (ind) ind.textContent = ' ↕️';
                        });
                        
                        // Establecer nueva dirección
                        header.setAttribute('data-sort-direction', newDirection);
                        const indicator = header.querySelector('.sort-indicator');
                        if (indicator) {
                            indicator.textContent = newDirection === 'asc' ? ' ↑' : ' ↓';
                        }
                        
                        // Ordenar las filas
                        const rows = Array.from(tbody.querySelectorAll('tr'));
                        
                        rows.sort((a, b) => {
                            let aValue = a.children[columnIndex].textContent.trim();
                            let bValue = b.children[columnIndex].textContent.trim();
                            
                            // Limpiar formato de números
                            aValue = aValue.replace(/[.,]/g, '');
                            bValue = bValue.replace(/[.,]/g, '');
                            
                            // Verificar si son números
                            const aNum = parseFloat(aValue);
                            const bNum = parseFloat(bValue);
                            
                            if (!isNaN(aNum) && !isNaN(bNum)) {
                                return newDirection === 'asc' ? aNum - bNum : bNum - aNum;
                            }
                            
                            // Ordenar texto
                            const comparison = aValue.localeCompare(bValue, 'es');
                            return newDirection === 'asc' ? comparison : -comparison;
                        });
                        
                        // Reordenar el DOM
                        rows.forEach(row => tbody.appendChild(row));
                    });
                });
            });
        }
        
        // Inicializar cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            setupAdminSorting();
        });
    </script>
</body>
</html>