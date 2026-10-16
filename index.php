<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Cosplay Cuarta Edición</title>
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            background-image: url("assets/images/fondo.png");
            background-size: cover;
            background-repeat: no-repeat;    
            background-position: 30%; 
            background-attachment: fixed;
        }

        .form-container {
            margin-top: 50px;        
            margin-left: auto;       
            margin-right: 8%;        
            padding: 25px 30px;      
        }

        .form-group {
            margin-bottom: 18px;     
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;    
            font-weight: bold;
        }
        
        /* Estilos para el Modal de Errores */
        .modal-error {
            display: none; 
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-error-content {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 450px;
            width: 90%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: left;
            position: relative;
        }

        .modal-error-header {
            color: #ff3333;
            font-size: 1.3rem;
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-error-list {
            padding-left: 20px;
            margin-bottom: 20px;
            color: #333;
            line-height: 1.6;
        }

        .modal-error-list li {
            margin-bottom: 8px;
        }

        .btn-close-modal {
            background-color: #ff3333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            float: right;
            transition: background 0.2s;
        }

        .btn-close-modal:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <img src="https://www.cinex.com.ve/assets/images/logo.png" alt="Logo Cinex">
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="terminos.php">Términos y Condiciones</a></li>
            <li><a href="premios.php">Premios</a></li>
        </ul>
    </nav>
</header>

<div class="form-container">
    <h2>Registro Cosplay Cuarta Edición</h2>
    
    <form id="registroForm" action="procesar.php" method="POST" novalidate>
        
        <div class="form-group">
            <label for="cedula">Cédula / Documento:</label>
            <input type="text" id="cedula" name="cedula" inputmode="numeric" maxlength="8" required>
        </div>

        <div class="form-group">
            <label for="nombres_apellidos">Nombres y Apellidos:</label>
            <input type="text" id="nombres_apellidos" name="nombres_apellidos" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ej: 04141234567" inputmode="numeric" maxlength="11" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="link_imagen">Enlace fotos/cosplay:</label>
            <input type="url" id="link_imagen" name="link_imagen" placeholder="https://google.com..." required>
        </div>

        <div class="form-group">
            <label for="perfil_instagram">Perfil de Instagram:</label>
            <input type="url" id="perfil_instagram" name="perfil_instagram" placeholder="https://instagram.com..." required>
        </div>

        <button type="submit">Enviar Registro</button>
    </form>
</div>

<!-- Estructura del Modal para Errores -->
<div id="errorModal" class="modal-error">
    <div class="modal-error-content">
        <h3 class="modal-error-header">⚠️ Errores en el formulario</h3>
        <ul id="errorList" class="modal-error-list"></ul>
        <button id="closeModalBtn" class="btn-close-modal">Corregir</button>
        <div style="clear: both;"></div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registroForm");
    const cedulaInput = document.getElementById("cedula");
    const telefonoInput = document.getElementById("telefono");
    
    // Elementos del Modal
    const errorModal = document.getElementById("errorModal");
    const errorList = document.getElementById("errorList");
    const closeModalBtn = document.getElementById("closeModalBtn");

    const filtrarSoloNumeros = (event) => {
        event.target.value = event.target.value.replace(/\D/g, "");
    };

    cedulaInput.addEventListener("input", filtrarSoloNumeros);
    telefonoInput.addEventListener("input", filtrarSoloNumeros);

    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regexTelefono = /^(0414|0424|0412|0416|0426)\d{7}$/; 
    const regexCedula = /^\d{6,8}$/; 
    const regexUrl = /^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+)\.[a-zA-Z]{2,}(\/\S*)?$/;

    form.addEventListener("submit", function (event) {
        let isValid = true;
        let errores = [];
        
        // Limpiar estilos previos
        document.querySelectorAll("input").forEach(el => el.classList.remove("invalid"));
        errorList.innerHTML = "";

        // 1. Validar Cédula
        if (!regexCedula.test(cedulaInput.value.trim())) {
            cedulaInput.classList.add("invalid");
            errores.push("Cédula inválida (debe tener entre 6 y 8 dígitos).");
            isValid = false;
        }

        // 2. Validar Nombres y Apellidos
        const nombres = document.getElementById("nombres_apellidos");
        if (nombres.value.trim().length < 5) {
            nombres.classList.add("invalid");
            errores.push("Por favor, ingresa tu nombre completo.");
            isValid = false;
        }

        // 3. Validar Teléfono
        if (!regexTelefono.test(telefonoInput.value.trim())) {
            telefonoInput.classList.add("invalid");
            errores.push("Número telefónico inválido de 11 dígitos (Ej: 04141234567).");
            isValid = false;
        }

        // 4. Validar Email
        const email = document.getElementById("email");
        if (!regexEmail.test(email.value.trim())) {
            email.classList.add("invalid");
            errores.push("El formato del correo electrónico no es válido.");
            isValid = false;
        }

        // 5. Validar Link de Imagen
        const imagen = document.getElementById("link_imagen");
        if (imagen.value.trim() === "") {
            imagen.classList.add("invalid");
            errores.push("El enlace de la imagen es obligatorio.");
            isValid = false;
        }

        // 7. Validar Instagram
        const instagram = document.getElementById("perfil_instagram");
        if (instagram.value.trim() === "") {
            instagram.classList.add("invalid");
            errores.push("El perfil de Instagram es obligatorio.");
            isValid = false;
        } else if (!regexUrl.test(instagram.value.trim())) {
            instagram.classList.add("invalid");
            errores.push("Ingresa una URL válida de Instagram.");
            isValid = false;
        }

        // Si hay errores, detener envío y mostrar modal
        if (!isValid) {
            event.preventDefault();
            
            // Insertar errores en la lista del modal
            errores.forEach(function (mensaje) {
                const li = document.createElement("li");
                li.textContent = mensaje;
                errorList.appendChild(li);
            });

            // Mostrar el modal cambiando el display a flex
            errorModal.style.display = "flex";
        }
    });

    // Cerrar el modal al hacer clic en el botón
    closeModalBtn.addEventListener("click", function () {
        errorModal.style.display = "none";
    });

    // Cerrar el modal si se hace clic fuera de la caja blanca
    window.addEventListener("click", function (event) {
        if (event.target === errorModal) {
            errorModal.style.display = "none";
        }
    });
});
</script>

<script src="assets/js/scripts.min.js"></script>
</body>
</html>
