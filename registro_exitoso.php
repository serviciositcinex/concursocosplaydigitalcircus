<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Registro Exitoso! - Cosplay Cuarta Edición</title>
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
        :root {
            --primary-color: #004B93; /* Azul Cinex */
            --accent-color: #FFCC00;  /* Dorado Cinex */
            --success-color: #28a745; /* Verde Éxito */
            --light-bg: #f4f7f6;      /* Fondo Claro */
            --card-bg: #ffffff;       /* Tarjeta Blanca */
            --text-color: #2b2b2b;    /* Texto Oscuro principal */
            --text-muted: #555555;    /* Texto Secundario */
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Responsivo en Modo Claro */
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0d1b2a;
            padding: 15px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
        }

        .logo-container img {
            height: 45px;
            width: auto;
            /* Filtro opcional para que el logotipo resalte sobre fondo blanco si es necesario */
            filter: drop-shadow(0px 1px 2px rgba(0,0,0,0.1));
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            transition: color .3s;
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        /* Contenedor Central */
        .success-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .success-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-top: 5px solid var(--success-color);
            border-radius: 12px;
            max-width: 550px;
            width: 100%;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            box-sizing: border-box;
        }

        /* Icono de Check Animado */
        .success-icon-box {
            width: 80px;
            height: 80px;
            background-color: rgba(40, 167, 69, 0.08);
            border: 3px solid var(--success-color);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 25px auto;
        }

        .success-icon-box span {
            color: var(--success-color);
            font-size: 3rem;
            font-weight: bold;
            line-height: 1;
        }

        .success-card h2 {
            color: var(--success-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.8rem;
            margin: 0 0 15px 0;
        }

        .success-card p {
            color: var(--text-muted);
            font-size: 1.05rem;
            margin: 0 0 30px 0;
        }

        .success-card strong {
            color: #000000;
        }

        /* Botón de Retorno */
        .btn-home {
            display: inline-block;
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            padding: 14px 35px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s;
            box-shadow: 0 4px 15px rgba(0, 75, 147, 0.2);
        }

        .btn-home:hover {
            background-color: #00366b;
        }

        /* Adaptación a Escritorio */
        @media (min-width: 768px) {
            .main-header {
                flex-direction: row;
                justify-content: space-between;
                padding: 15px 50px;
            }
            .success-card {
                padding: 50px 40px;
            }
            .success-card h2 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <!-- Imagen del logotipo de Cinex provista por el usuario -->
        <img src="https://www.cinex.com.ve/assets/images/logo.png" alt="Logo Cinex">
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="terminos.php">Términos y Condiciones</a></li>
            <li><a href="premios.php">Premios</a></li>
        </ul>
    </nav>
</header>

<main class="success-wrapper">
    <div class="success-card">
        <div class="success-icon-box">
            <span>✓</span>
        </div>
        
        <h2>¡Inscripción Exitosa!</h2>
        
        <p>
            Tu registro para el concurso <strong>Cosplay Cuarta Edición</strong> ha sido procesado correctamente. 
            
        </p>

        <a href="index.php" class="btn-home">Volver al Inicio</a>
    </div>
</main>

</body>
</html>
