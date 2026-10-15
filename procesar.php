<?php
// 1. CONTROL DE SEGURIDAD: Validar origen del dominio (CORS / Referer)
$allowed_domain = 'cinex.com.ve';
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$isValidOrigin = false;

/*if (!empty($origin)) {
    $origin_host = parse_url($origin, PHP_URL_HOST);
    if ($origin_host === $allowed_domain || substr($origin_host, -13) === '.' . $allowed_domain) {
        $isValidOrigin = true;
    }
} elseif (!empty($referer)) {
    $referer_host = parse_url($referer, PHP_URL_HOST);
    if ($referer_host === $allowed_domain || substr($referer_host, -13) === '.' . $allowed_domain) {
        $isValidOrigin = true;
    }
}

if (!$isValidOrigin) {
    header('HTTP/1.1 403 Forbidden');
    die("Error 403: Acceso denegado. Las peticiones externas no están permitidas.");
}*/

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

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // CRÍTICO: Fuerza a MySQL a usar sentencias preparadas reales nativas
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// 3. PROCESAMIENTO DEL FORMULARIO (MÉTODO POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recibir, recortar espacios y limpiar entradas básicas
    $cedula            = trim($_POST['cedula'] ?? '');
    $nombres_apellidos = trim($_POST['nombres_apellidos'] ?? '');
    $telefono          = trim($_POST['telefono'] ?? '');
    
    // Sanitización estricta de filtros nativos
    $email             = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $link_imagen       = filter_var(trim($_POST['link_imagen'] ?? ''), FILTER_SANITIZE_URL);
    $perfil_instagram  = filter_var(trim($_POST['perfil_instagram'] ?? ''), FILTER_SANITIZE_URL);

    // Validación de campos vacíos
    if (empty($cedula) || empty($nombres_apellidos) || empty($telefono) || empty($email) || empty($link_imagen) || empty($perfil_instagram)) {
        die("Error: Por favor completa todos los campos del formulario. Todos los enlaces son obligatorios.");
    }

    // --- PROTECCIÓN EXTRA: Validación de formatos en el servidor ---
    
    // Validar formato de Cédula (Solo números, entre 6 y 8 dígitos)
    if (!preg_match('/^\d{6,8}$/', $cedula)) {
        die("Error: El formato de la cédula no es válido.");
    }

    // Validar formato de Teléfono (11 dígitos que inicien con operadoras venezolanas)
    if (!preg_match('/^(0414|0424|0412|0416|0426)\d{7}$/', $telefono)) {
        die("Error: El formato del número telefónico no es válido.");
    }

    // Validar Correo Electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: El formato del correo electrónico no es válido.");
    }
    
    // Validar Enlaces (URLs válidas)
    if (!filter_var($link_imagen, FILTER_VALIDATE_URL) || !filter_var($perfil_instagram, FILTER_VALIDATE_URL)) {
        die("Error: Uno o más enlaces proporcionados no tienen un formato de URL válido.");
    }

    // Consulta SQL estructurada de forma limpia
    $sql = "INSERT INTO participantes (cedula, nombres_apellidos, telefono, email, link_imagen, perfil_instagram, fechahora) 
            VALUES (:cedula, :nombres_apellidos, :telefono, :email, :link_imagen, :perfil_instagram, NOW())";
    
    try {
        $stmt = $pdo->prepare($sql);
        
        // Ejecución segura de PDO (Los placeholders anulan cualquier intento de inyección de comandos SQL)
        $stmt->execute([
            ':cedula'            => $cedula,
            ':nombres_apellidos' => $nombres_apellidos,
            ':telefono'          => $telefono,
            ':email'             => $email,
            ':link_imagen'       => $link_imagen,
            ':perfil_instagram'  => $perfil_instagram
        ]);

        header('Location: registro_exitoso.php');
        exit;
    } catch (PDOException $e) {
        echo "<h2>Error Técnico Real:</h2>";
        echo "<p style='color:red;'><strong>Código:</strong> " . $e->getCode() . "</p>";
        echo "<p style='color:red;'><strong>Mensaje:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='index.php'>Volver a intentarlo</a>";
        exit;
    }
    /*} catch (PDOException $e) {
        // Control seguro de excepciones para evitar fugas de información de la base de datos
        if ($e->getCode() == 23000) {
            echo "<h2>Error de Registro</h2>";
            echo "<p>La cédula ingresada ya se encuentra registrada en el sistema.</p>";
        } else {
            // No imprimir $e->getMessage() directamente en entornos de producción reales por seguridad
            echo "<h2>Error Técnico</h2>";
            echo "<p>Ocurrió un problema al guardar los datos de inscripción de forma segura.</p>";
        }
        echo "<a href='index.php'>Volver a intentarlo</a>";
    }*/
} else {
    header('Location: index.php');
    exit;
}
