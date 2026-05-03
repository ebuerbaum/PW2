/* =============================================
   DOA – Scripts generales
   ============================================= */


/* ---- 1. MENÚ MÓVIL ---- */

var botonMenu = document.querySelector('.hamburger');
var menuMovil = document.getElementById('mobile-menu');

if (botonMenu && menuMovil) {

    // Abrir o cerrar el menú al pulsar el botón hamburguesa
    botonMenu.addEventListener('click', function () {
        if (menuMovil.hidden) {
            menuMovil.hidden = false;   // mostrar menú
        } else {
            menuMovil.hidden = true;    // ocultar menú
        }
    });

    // Cerrar el menú cuando el usuario pulsa un enlace
    var enlacesMenu = menuMovil.querySelectorAll('a');
    for (var i = 0; i < enlacesMenu.length; i++) {
        enlacesMenu[i].addEventListener('click', function () {
            menuMovil.hidden = true;
        });
    }
}


/* ---- 2. VALIDACIÓN DEL FORMULARIO DE CONTACTO ---- */

var formulario = document.getElementById('contact-form');

if (formulario) {

    formulario.addEventListener('submit', function (evento) {
        // Evitar que la página se recargue al enviar
        evento.preventDefault();

        // Leer los valores de cada campo
        var nombre  = document.getElementById('nombre').value.trim();
        var email   = document.getElementById('email').value.trim();
        var centro  = document.getElementById('centro').value.trim();
        var mensaje = document.getElementById('mensaje').value.trim();

        // Comprobar que ningún campo esté vacío
        if (nombre === '' || email === '' || centro === '' || mensaje === '') {
            mostrarFeedback('Por favor, rellena todos los campos.', 'error');
            return;
        }

        // Comprobar que el email tiene el símbolo @ y un punto
        if (!email.includes('@') || !email.includes('.')) {
            mostrarFeedback('Introduce un email válido (ej. nombre@dominio.com).', 'error');
            return;
        }

        // Comprobar longitud mínima del mensaje
        if (mensaje.length < 10) {
            mostrarFeedback('El mensaje debe tener al menos 10 caracteres.', 'error');
            return;
        }

        // Si todo está bien, simulamos el envío y mostramos confirmación
        mostrarFeedback('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.', 'exito');
        formulario.reset();
        actualizarContador();
    });
}


/* ---- 3. CONTADOR DE CARACTERES (campo mensaje) ---- */

var campoMensaje = document.getElementById('mensaje');
var contadorEl   = document.getElementById('mensaje-count');
var MAXIMO       = 1000;

function actualizarContador() {
    if (!campoMensaje || !contadorEl) return;
    contadorEl.textContent = campoMensaje.value.length + ' / ' + MAXIMO;
}

if (campoMensaje && contadorEl) {
    campoMensaje.addEventListener('input', actualizarContador);
    actualizarContador(); // mostrar 0 / 1000 al cargar la página
}


/* ---- 4. FUNCIÓN AUXILIAR: mostrar mensaje de respuesta ---- */

function mostrarFeedback(texto, tipo) {
    var caja = document.getElementById('form-feedback');
    if (!caja) return;

    caja.textContent = texto;
    caja.className   = 'form-feedback form-feedback--' + tipo;
    caja.hidden      = false;

    // Si es un mensaje de éxito, ocultarlo automáticamente después de 6 segundos
    if (tipo === 'exito') {
        setTimeout(function () {
            caja.hidden = true;
        }, 6000);
    }
}
