<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premios - Cosplay Cuarta Edición</title>
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
        /* Estilos base integrados para asegurar un diseño premium y responsive */
        :root {
            --primary-color: #004B93; /* Azul Cinex */
            --accent-color: #FFCC00;  /* Dorado Cinex */
            --dark-bg: #111;
            --card-bg: #1a1a1a;
            --text-color: #ffffff;
            --text-muted: #cccccc;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        .premios-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            text-align: center;
            font-size: 2.5rem;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        /* Bloque de Detalles del Evento */
        .event-info-box {
            background: linear-gradient(135deg, var(--primary-color), #002d5a);
            border-left: 5px solid var(--accent-color);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .info-item h3 {
            margin: 0 0 5px 0;
            color: var(--accent-color);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-item p {
            margin: 0;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Grid de Tarjetas de Premios */
        .premios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            align-items: start;
        }

        .premio-card {
            background-color: var(--card-bg);
            border: 1px solid #333;
            border-radius: 12px;
            padding: 30px 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .premio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 75, 147, 0.3);
        }

        /* Distinciones por lugar */
        .premio-card.first-place { border-top: 6px solid #ffd700; }
        .premio-card.second-place { border-top: 6px solid #c0c0c0; }
        .premio-card.third-place { border-top: 6px solid #cd7f32; }

        .place-badge {
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
        }

        .first-place .place-badge { background-color: #ffd700; color: #000; }
        .second-place .place-badge { background-color: #c0c0c0; color: #000; }
        .third-place .place-badge { background-color: #cd7f32; color: #000; }

        .cash-prize {
            font-size: 3rem;
            font-weight: 900;
            color: #fff;
            margin: 15px 0;
            text-shadow: 0 2px 10px rgba(255,255,255,0.1);
        }

        /* Lista de recompensas físicas y experiencias */
        .items-list {
            list-style: none;
            padding: 0;
            margin: 25px 0 0 0;
            text-align: left;
            border-top: 1px solid #333;
        }

        .items-list li {
            padding: 10px 0 10px 25px;
            border-bottom: 1px solid #222;
            font-size: 0.95rem;
            color: var(--text-muted);
            position: relative;
        }

        .items-list li:last-child {
            border-bottom: none;
        }

        /* Checkmarks personalizados según el lugar */
        .items-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        .first-place .items-list li::before { color: #ffd700; }
        .second-place .items-list li::before { color: #c0c0c0; }
        .third-place .items-list li::before { color: #cd7f32; }

        /* Botón de regreso */
        .back-actions {
            text-align: center;
            margin-top: 5px;
        }

        .btn-back {
            display: inline-block;
            background-color: transparent;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: var(--accent-color);
            color: #000;
            box-shadow: 0 4px 15px rgba(255, 204, 0, 0.4);
        }

        @media (max-width: 768px) {
            .page-title { font-size: 2rem; }
            .event-info-box { grid-template-columns: 1fr; gap: 15px; }
            .premios-grid { grid-template-columns: 1fr; }
        }

        /* Estilo para el contenedor de las imágenes de los premios */
        .image-prize {
            width: 100%;
            height: 260px; 
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            overflow: hidden;
        }

        /* Estilo para que la imagen se adapte sin dejar espacios raros */
        .image-prize img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            background: transparent; 
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
            <li><a href="terminos.php">Términos y Condiciones</a></li>
        </ul>
    </nav>
</header>

<main class="premios-container">
    <h1 class="page-title">Premios Cosplay Cuarta Edición</h1>
    
    <!-- Bloque Informativo de la Cita del Evento -->
    <section class="event-info-box">
        <div class="info-item">
            <h3>Lugar</h3>
            <p>Cinex Recreo</p>
        </div>
        <div class="info-item">
            <h3>Fecha</h3>
            <p>Sábado 24 de octubre de 2026</p>
        </div>
        <div class="info-item">
            <h3>Hora</h3>
            <p>10:00 am</p>
        </div>
    </section>

    <!-- Sección de Tarjetas de Premiación Jerárquica -->
    <section class="premios-grid">
        
        <!-- PRIMER LUGAR -->
        <article class="premio-card first-place">
            <span class="place-badge">1er Lugar</span>
            <div class="cash-prize">$500</div>
            <div class="image-prize">
                <img src="assets/images/premio1.png" alt="Premio 1er Lugar">
            </div>
            <ul class="items-list">
                <li>1 Camisa Temática</li>
                <li>1 Sombrero One Piece</li>
                <li>1 Botella One piece </li>
                <li>1 Tarjeta Cinexclusivo</li>
                <li>8 Entradas 2D</li>
                <li>2 Entradas 4DX</li>
                <li>2 Entradas VIP</li>
                <li>5 Combos Dúo</li>
                <li>All you can play para 5 personas</li>
            </ul>
        </article>

        <!-- SEGUNDO LUGAR -->
        <article class="premio-card second-place">
            <span class="place-badge">2do Lugar</span>
            <div class="cash-prize">$300</div>
            <div class="image-prize">
                <img src="assets/images/premio2.png" alt="Premio 2do Lugar">
            </div>
            <ul class="items-list">
                <li>1 Camisa Temática</li>
                <li>1 Funko de Nezuko</li>
                <li>1 Llavero lego</li>
                <li>1 Tarjeta Cinexclusivo</li>
                <li>6 Entradas 2D</li>
                <li>2 Entradas 4DX</li>
                <li>2 Entradas VIP </li>
                <li>2 Combos Dúo</li>
                <li>All you can play para 4 personas</li>
            </ul>
        </article>

        <!-- TERCER LUGAR -->
        <article class="premio-card third-place">
            <span class="place-badge">3er Lugar</span>
            <div class="cash-prize">$150</div>
            <div class="image-prize">
                <img src="assets/images/premio3.png" alt="Premio 3er Lugar">
            </div>
            <ul class="items-list">
                <li>1 Camisa Temática</li>
                <li>1 Libreta Death Note</li>
                <li>1 Llavero Death Note</li>
                <li>1 Tarjeta Cinexclusivo </li>
                <li>4 Entradas 2D</li>
                <li>2 Entradas 4DX </li>
                <li>2 Combos Dúo</li>
                <li>All you can play para 3 personas</li>
            </ul>
        </article>

    </section>

    <!-- Botón de acción para retornar -->
    <div class="back-actions">
        <br><br>
        <a href="index.php" class="btn-back">Registrarme Ahora</a>
    </div>
</main>

<script src="assets/js/scripts.min.js"></script>
</body>
</html>
