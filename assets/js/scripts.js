document.getElementById('registroForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Limpiar errores previos antes de evaluar
    document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
    document.querySelectorAll('input').forEach(el => el.classList.remove('input-error'));

    // 1. Obtener valores de los campos
    const cedula = document.getElementById('cedula').value.trim();
    const nombres = document.getElementById('nombres_apellidos').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const email = document.getElementById('email').value.trim();
    const youtube = document.getElementById('link_youtube').value.trim();
    const instagram = document.getElementById('perfil_instagram').value.trim();

    // Función auxiliar para activar la alerta visual de error
    function showError(inputId, errorId, message) {
        document.getElementById(inputId).classList.add('input-error');
        const errorSpan = document.getElementById(errorId);
        errorSpan.textContent = message;
        errorSpan.style.display = 'block';
        isValid = false;
    }

    // 2. Validación de Cédula (Solo números, entre 6 y 9 dígitos)
    const cedulaRegex = /^[0-9]{6,9}$/;
    if (!cedula) {
        showError('cedula', 'error-cedula', 'La cédula es obligatoria.');
    } else if (!cedulaRegex.test(cedula)) {
        showError('cedula', 'error-cedula', 'Ingresa una cédula válida (solo números, entre 6 y 9 dígitos).');
    }

    // 3. Validación de Nombres y Apellidos (Mínimo dos palabras, solo letras)
    const nombresRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{4,100}$/;
    if (!nombres) {
        showError('nombres_apellidos', 'error-nombres_apellidos', 'El nombre completo es obligatorio.');
    } else if (!nombresRegex.test(nombres)) {
        showError('nombres_apellidos', 'error-nombres_apellidos', 'Ingresa un nombre válido (solo letras).');
    }

    // 4. Validación de Teléfono (Formato numérico básico)
    const telefonoRegex = /^[0-9]{10,15}$/;
    if (!telefono) {
        showError('telefono', 'error-telefono', 'El teléfono es obligatorio.');
    } else if (!telefonoRegex.test(telefono)) {
        showError('telefono', 'error-telefono', 'Ingresa un número telefónico válido (solo números, de 10 a 15 dígitos).');
    }

    // 5. Validación de Correo Electrónico
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        showError('email', 'error-email', 'El correo electrónico es obligatorio.');
    } else if (!emailRegex.test(email)) {
        showError('email', 'error-email', 'El formato del correo no es válido.');
    }

    // 6. Validación de Enlace YouTube (Opcional, pero si tiene texto debe ser un link de YouTube)
    if (youtube && !youtube.includes('youtube.com') && !youtube.includes('youtu.be')) {
        showError('link_youtube', 'error-link_youtube', 'El enlace debe pertenecer a un dominio de YouTube.');
    }

    // 7. Validación de Enlace Instagram (Opcional, pero si tiene texto debe ser de Instagram)
    if (instagram && !instagram.includes('instagram.com')) {
        showError('perfil_instagram', 'error-perfil_instagram', 'El enlace debe pertenecer a un dominio de Instagram.');
    }

    // Si algún campo no es válido, se detiene el envío por POST al servidor
    if (!isValid) {
        event.preventDefault();
    }
});
