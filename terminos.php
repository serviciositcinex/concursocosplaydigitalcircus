<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - Cosplay Cuarta Edición</title>
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            background-image: url("assets/images/fondo.png");
            background-size: 1600px 750px;
            background-repeat: no-repeat;    
            background-position: center center; 
            background-attachment: fixed;
        }

        /* Variables de diseño corporativo Cinex */
        :root {
            --primary-color: #004B93; /* Azul Cinex */
            --accent-color: #FFCC00;  /* Dorado Cinex */
            --dark-bg: #111111;
            --card-bg: #1a1a1a;
            --text-color: #ffffff;
            --text-muted: #b3b3b3;
            --border-color: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .terms-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            text-align: center;
            font-size: 2.3rem;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }

        /* Contenedor legal principal */
        .legal-box {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-top: 5px solid var(--primary-color);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.6);
        }

        /* Estructura de las cláusulas legales */
        .term-clause {
            margin-bottom: 30px;
            border-bottom: 1px solid #252525;
            padding-bottom: 25px;
        }

        .term-clause:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .term-clause h3 {
            color: var(--accent-color);
            font-size: 1.2rem;
            margin-top: 0;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }

        .term-clause p {
            color: var(--text-muted);
            margin: 0 0 10px 0;
            font-size: 1.05rem;
            text-align: justify;
        }

        /* Sublistas de parámetros o redes */
        .sub-list {
            list-style: none;
            padding-left: 0;
            margin: 10px 0 0 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }

        .sub-list li {
            background-color: #222222;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 0.95rem;
            border-left: 3px solid var(--primary-color);
            color: #ffffff;
        }

        .sub-list.networks li {
            border-left-color: #e1306c; /* Color alusivo a Instagram */
            font-weight: bold;
        }

        /* Sección de pie con advertencia legal estándar */
        .legal-footer-text {
            font-size: 0.85rem;
            color: #666666;
            margin-top: 30px;
            text-align: center;
            border-top: 1px solid var(--border-color);
            padding-top: 20px;
        }

        /* Botonera inferior */
        .actions-block {
            text-align: center;
            margin-top: 40px;
        }

        .btn-register {
            display: inline-block;
            background-color: var(--primary-color);
            color: #ffffff;
            padding: 12px 35px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 75, 147, 0.4);
        }

        .btn-register:hover {
            background-color: #00366b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 75, 147, 0.6);
        }

        @media (max-width: 768px) {
            .legal-box { padding: 25px; }
            .page-title { font-size: 1.8rem; }
            .sub-list { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- Encabezado con Logo y Enlaces idéntico al index -->
<header class="main-header">
    <div class="logo-container">
        <img src="https://www.cinex.com.ve/assets/images/logo.png" alt="Logo Cinex">
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Formulario de Registro</a></li>
            <li><a href="premios.php">Premios</a></li>
        </ul>
    </nav>
</header>

<main class="terms-container">
    <h1 class="page-title">Términos y Condiciones</h1>
    
    <div class="legal-box">
        
        <!-- CLÁUSULA 1 -->
        <section class="term-clause">
            <h3>1. Requisitos de Seguimiento Digital</h3>
            <p>Los participantes deberán seguir las cuentas de Instagram de</p>
            <ul class="sub-list networks">
                <li>@cinexve</li>
                <li>@geekmevenezuela</li>
                <li>@cloudthes</li>
                <li>@leveluparena_ </li>
                <li>@vip_phonecity  </li>
                <li>Estar registrado en cinex.com.ve</li>
            </ul>
        </section>

        <!-- CLÁUSULA 2 -->
        <section class="term-clause">
            <h3>2. Período de Vigencia y Carga de Material</h3>
            <p>La etapa de participación estará vigente desde el 15  al 19 de octubre de 2026. Durante este período, los participantes deberán subir un link con 2 fotos de su cosplay con el que participará a través de www.cinex.com.ve.</p>
        </section>

        <!-- CLÁUSULA 3 -->
        <section class="term-clause">
            <h3>3. Parámetros Técnicos de Evaluación</h3>
            <p>Parámetros de evaluación: maquillaje, vestuario, caracterización, accesorios, siendo indispensable el cumplimiento de la mayoría de edad legal.</p>
        </section>

        <!-- CLÁUSULA 4 -->
        <section class="term-clause">
            <h3>4. Selección de Finalistas y Gala Presencial</h3>
            <p>El jurado del concurso comenzará la selección de los 10 finalistas una vez termine la etapa de participación, estos 10 finalistas serán contactados el martes 20/10 y son quienes asistirán al cierre del concurso para la gala final, en donde se escogerán a los 3 ganadores, el evento será en Cinex El Recreo a las 2:00 pm el sábado 24 de octubre del 2026.</p>
        </section>

        <!-- PIE LEGAL ESTÁNDAR -->
        <p class="legal-footer-text">
            Suramericana de Espectáculos S.A. RIF: J-00045832-4 || © Copyright 2026. Cinex. Todos los derechos reservados. El incumplimiento de cualquiera de las pautas descritas anulará automáticamente la participación sin derecho a reclamos.
        </p>

    </div>

    <!-- Enlace de retorno al flujo de registro -->
    <div class="actions-block">
        <a href="index.php" class="btn-register">Aceptar y Registrarme</a>
    </div>
</main>

<script src="assets/js/scripts.min.js"></script>
</body>
</html>
