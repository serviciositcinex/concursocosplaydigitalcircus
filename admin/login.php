<?php
session_start();

// Si el usuario ya está logueado, redirigir automáticamente al panel
if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true) {
    header('Location: admin_cards.php'); // O 'admin.php' según el diseño que elijas
    exit;
}

// 1. CONFIGURACIÓN DE CREDENCIALES (Cambia esto por seguridad)
define('ADMIN_USER', 'admin_cinex');
define('ADMIN_PASS', 'Cin3xCircuz2026*#'); // Usa una contraseña fuerte

$error = '';

// 2. PROCESAR EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validación básica y segura contra tiempos de respuesta (Timing Attacks)
    if (hash_equals(ADMIN_USER, $usuario) && hash_equals(ADMIN_PASS, $password)) {
        $_SESSION['admin_logged'] = true;
        $_SESSION['admin_user'] = $usuario;
        
        // Redirigir al panel principal
        header('Location: admin_cards.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinex - Login Admin Digital Circus</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .bg-circus-dark { background: radial-gradient(circle at top, #1a0b2e 0%, #05020a 100%); }
        .neon-glow { box-shadow: 0 0 20px rgba(219, 39, 119, 0.3); }
    </style>
</head>
<body class="bg-circus-dark text-gray-200 font-sans min-h-screen flex items-center justify-center p-4">

    <!-- Tarjeta del Contenedor de Login -->
    <div class="w-full max-w-md bg-gray-950/80 backdrop-blur-md border border-purple-900/40 rounded-2xl p-8 neon-glow">
        
        <!-- Encabezado / Branding de Cinex -->
        <div class="text-center mb-8">
            <span class="text-3xl font-black bg-gradient-to-r from-red-500 via-purple-500 to-fuchsia-500 bg-clip-text text-transparent tracking-widest block">CINEX</span>
            <span class="text-xs uppercase tracking-widest text-fuchsia-400 font-bold bg-fuchsia-950/50 px-2.5 py-1 rounded-md border border-fuchsia-800/30 inline-block mt-2">
                Digital Circus Panel
            </span>
            <p class="text-xs text-purple-400/70 mt-4">Introduce tus credenciales para acceder a la lista de participantes</p>
        </div>

        <!-- Alerta de Error -->
        <?php if (!empty($error)): ?>
            <div class="bg-red-950/40 border border-red-800/50 text-red-400 text-xs rounded-xl p-3 mb-6 flex items-center space-x-2">
                <span>⚠️</span>
                <span><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>

        <!-- Formulario de Acceso -->
        <form action="" method="POST" class="space-y-5">
            
            <!-- Campo: Usuario -->
            <div>
                <label for="usuario" class="block text-xs font-semibold text-purple-300 uppercase tracking-wider mb-2">Usuario Administrativo</label>
                <input type="text" id="usuario" name="usuario" required autocomplete="off"
                       class="w-full bg-black/40 border border-purple-900/60 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition"
                       placeholder="ej. admin_cinex">
            </div>

            <!-- Campo: Contraseña -->
            <div>
                <label for="password" class="block text-xs font-semibold text-purple-300 uppercase tracking-wider mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required
                       class="w-full bg-black/40 border border-purple-900/60 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition"
                       placeholder="••••••••••••">
            </div>

            <!-- Botón de Ingreso -->
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-fuchsia-600 to-pink-600 hover:from-fuchsia-500 hover:to-pink-500 text-white font-bold text-sm uppercase tracking-wider py-3.5 rounded-xl transition duration-200 shadow-lg shadow-pink-900/20 mt-2" style="cursor:pointer;">
                Iniciar Sesión 🔒
            </button>
        </form>

    </div>

</body>
</html>
