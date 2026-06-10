// Función para mostrar/ocultar contraseña
function togglePasswordVisibility(inputId, buttonId) {
    const passwordInput = document.getElementById(inputId);
    const toggleButton = document.getElementById(buttonId);
    
    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            // Cambiar el tipo de input
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Cambiar el icono del ojo
            const icon = toggleButton.querySelector('i');
            if (icon) {
                if (type === 'text') {
                    icon.textContent = '👁️';
                    icon.style.opacity = '0.7';
                } else {
                    icon.textContent = '👁️‍🗨️';
                    icon.style.opacity = '1';
                }
            }
        });
    }
}

// Función para ordenar tablas
function setupTableSorting() {
    const tables = document.querySelectorAll('.tabla-admin');
    
    tables.forEach(table => {
        const headers = table.querySelectorAll('th');
        const tbody = table.querySelector('tbody');
        
        headers.forEach((header, index) => {
            // Solo agregar ordenamiento a columnas que no sean "Acciones"
            if (header.textContent.trim() !== 'Acciones') {
                header.style.cursor = 'pointer';
                header.style.userSelect = 'none';
                header.setAttribute('data-sort-index', index);
                
                // Agregar indicador visual
                const sortIndicator = document.createElement('span');
                sortIndicator.style.marginLeft = '8px';
                sortIndicator.textContent = '↕️';
                sortIndicator.style.fontSize = '12px';
                header.appendChild(sortIndicator);
                
                header.addEventListener('click', function() {
                    const sortIndex = parseInt(this.getAttribute('data-sort-index'));
                    const currentSort = this.getAttribute('data-sort-direction') || 'asc';
                    const newSort = currentSort === 'asc' ? 'desc' : 'asc';
                    
                    // Resetear todos los indicadores
                    headers.forEach(h => {
                        if (h.textContent.trim() !== 'Acciones') {
                            h.setAttribute('data-sort-direction', '');
                            const indicator = h.querySelector('span');
                            if (indicator) indicator.textContent = '↕️';
                        }
                    });
                    
                    // Establecer nuevo orden
                    this.setAttribute('data-sort-direction', newSort);
                    const indicator = this.querySelector('span');
                    if (indicator) {
                        indicator.textContent = newSort === 'asc' ? '↑' : '↓';
                    }
                    
                    // Ordenar la tabla
                    sortTable(table, sortIndex, newSort);
                });
            }
        });
    });
}

// Función para ordenar la tabla
function sortTable(table, columnIndex, direction) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((rowA, rowB) => {
        let cellA = rowA.cells[columnIndex].textContent.trim();
        let cellB = rowB.cells[columnIndex].textContent.trim();
        
        // Detectar si es número (para saldo, precio, stock, ID)
        const numA = parseFloat(cellA.replace(/[^0-9.-]/g, ''));
        const numB = parseFloat(cellB.replace(/[^0-9.-]/g, ''));
        
        if (!isNaN(numA) && !isNaN(numB)) {
            // Es un número
            if (direction === 'asc') {
                return numA - numB;
            } else {
                return numB - numA;
            }
        } else {
            // Es texto
            cellA = cellA.toLowerCase();
            cellB = cellB.toLowerCase();
            
            if (direction === 'asc') {
                if (cellA < cellB) return -1;
                if (cellA > cellB) return 1;
                return 0;
            } else {
                if (cellA > cellB) return -1;
                if (cellA < cellB) return 1;
                return 0;
            }
        }
    });
    
    // Reordenar el DOM
    rows.forEach(row => tbody.appendChild(row));
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    setupTableSorting();
});