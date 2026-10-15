<?php
// 1. CONTROL DE SESIÓN Y SEGURIDAD CON EL LOGIN
session_start();

if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header('Location: login.php');
    exit;
}

// 2. CONFIGURACIÓN DE LA BASE DE DATOS
$host     = '192.168.106.4';
$dbname   = 'cosplaydigitalcircus';
$username = 'cinexremoteuser';
$password = 'cinexremote2020*';
$charset  = 'utf8mb4';

/*$host     = '127.0.0.1';
$dbname   = 'cosplaydigitalcircus';
$username = 'root';
$password = '';
$charset  = 'utf8mb4';*/

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    // Limpiar cualquier búfer de salida previo para evitar corrupción del CSV
    if (ob_get_contents()) {
        ob_end_clean();
    }
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=cosplayers_' . date('Y-m-d') . '.csv');
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');
    
    // BOM para compatibilidad estricta con Excel (Lectura correcta de tildes y eñes)
    fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF)); 
    
    // Encabezados
    fputcsv($output, ['ID', 'Cédula', 'Nombres y Apellidos', 'Teléfono', 'Email', 'Link Imagen', 'Instagram', 'Link YouTube', 'Fecha de Registro']);
    
    // Consulta
    $stmt = $pdo->query('SELECT id, cedula, nombres_apellidos, telefono, email, link_imagen, perfil_instagram, link_youtube, creado_en FROM participantes ORDER BY creado_en DESC');
    
    // Iteración multilínea segura
    while ($row = $stmt->fetch()) { 
        fputcsv($output, $row); 
    }
    
    fclose($output);
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$totalInscritos = $pdo->query('SELECT COUNT(*) FROM participantes')->fetchColumn();
$participantes  = $pdo->query('SELECT * FROM participantes ORDER BY creado_en DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinex | Panel de Control de Concursos</title>
    
    <!-- VINCULACIÓN DEL ARCHIVO CSS INDEPENDIENTE -->
    <link rel="stylesheet" href="css/styles.min.css">
</head>

<body>

    <!-- Barra de Navegación Superior -->
    <nav class="navbar">
        <div style="display: flex; align-items: center;">
            <span class="brand-title">CINEX</span>
            <span class="brand-subtitle">Consola de Inscritos</span>
        </div>

        <div class="nav-actions">
            <span class="badge">
                Registros totales: <strong><?= (int)$totalInscritos ?></strong>
            </span>
            <a href="?export=csv" class="btn-primary">
                Exportar Excel (.csv)
            </a>
            <a href="?logout=1" class="link-logout">
                Cerrar Sesión
            </a>
        </div>
    </nav>

    <!-- Contenedor de la Aplicación -->
    <main class="container">

        <!-- Controles y Filtros -->
        <header class="dashboard-controls">
            <div>
                <h1 class="section-title">Concurso Cosplay Cuarta Edición</h1>
                <p class="section-subtitle">Listado técnico oficial extraído de la base de datos.</p>
            </div>
            <div>
                <input type="text" id="buscador" onkeyup="filtrarCosplayers()"
                    placeholder="Filtrar por nombres, apellidos o cédula..."
                    class="search-input">
            </div>
        </header>

        <!-- Listado en Formato de Tabla Clásica -->
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th style="width: 120px;">Cédula</th>
                        <th>Nombres y Apellidos</th>
                        <th>Datos de Contacto</th>
                        <th>Multimedia / Redes</th>
                        <th style="width: 180px; text-align: center;">Imagen Adjunta</th>
                        <th style="width: 150px;">Fecha Registro</th>
                    </tr>
                </thead>
                <tbody id="tabla-cuerpo">
                    <?php if (empty($participantes)): ?>
                        <tr>
                            <td colspan="7" class="no-data" style="text-align: center; padding: 4rem;">
                                No se encontraron registros de postulantes vigentes en este concurso.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($participantes as $persona): ?>
                            <tr class="row-participante" 
                                data-nombre="<?= strtolower(htmlspecialchars($persona['nombres_apellidos'])) ?>"
                                data-cedula="<?= strtolower(htmlspecialchars($persona['cedula'])) ?>">
                                
                                <!-- ID -->
                                <td class="text-mono" style="color: var(--text-muted);">#<?= htmlspecialchars($persona['id']) ?></td>
                                
                                <!-- Cédula -->
                                <td class="text-bold text-mono"><?= htmlspecialchars($persona['cedula']) ?></td>
                                
                                <!-- Nombres -->
                                <td class="text-bold" style="color: var(--cinex-blue);"><?= htmlspecialchars($persona['nombres_apellidos']) ?></td>
                                
                                <!-- Contacto -->
                                <td>
                                    <span class="text-mono"><?= htmlspecialchars($persona['telefono']) ?></span>
                                    <span class="text-small"><?= htmlspecialchars($persona['email']) ?></span>
                                </td>
                                
                                <!-- Enlaces Redes -->
                                <td>
                                    <div class="social-container">
                                        <?php if (!empty($persona['perfil_instagram'])): ?>
                                            <a href="<?= htmlspecialchars($persona['perfil_instagram']) ?>" target="_blank" class="action-link">Instagram</a>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($persona['link_youtube'])): ?>
                                            <a href="<?= htmlspecialchars($persona['link_youtube']) ?>" target="_blank" class="action-link">YouTube</a>
                                        <?php endif; ?>

                                        <?php if (empty($persona['perfil_instagram']) && empty($persona['link_youtube'])): ?>
                                            <span class="text-disabled">Sin redes</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                
                                <!-- Imagen -->
                                <td style="text-align: center;">
                                    <?php if (!empty($persona['link_imagen'])): ?>
                                        <a href="<?= htmlspecialchars($persona['link_imagen']) ?>" target="_blank" class="action-link btn-image">
                                            Ver Archivo
                                        </a>
                                    <?php else: ?>
                                        <span class="text-disabled">No cargó</span>
                                    <?php endif; ?>
                                </td>
                                
                                <!-- Fecha -->
                                <td class="text-mono text-small">
                                    <?= date('d-m-Y H:i', strtotime($persona['creado_en'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Filtrado dinámico client-side -->
    <script type="text/javascript">
        function filtrarCosplayers() {
            const query = document.getElementById('buscador').value.toLowerCase().trim();
            const filas = document.querySelectorAll('.row-participante');
            
            filas.forEach(fila => {
                const nombre = fila.getAttribute('data-nombre');
                const cedula = fila.getAttribute('data-cedula');
                
                if (nombre.includes(query) || cedula.includes(query)) {
                    fila.style.display = ""; 
                } else {
                    fila.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>
