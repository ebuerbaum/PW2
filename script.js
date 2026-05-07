// Página de contacto y recuperar contraseña (recuperar-contrasena.html comparte parte de este archivo).

// — Menú móvil (GTI) —
var botonMenu = document.querySelector('.hamburger');
var menuMovil = document.getElementById('mobile-menu');

if (botonMenu && menuMovil) {

    botonMenu.addEventListener('click', function () {
        var abierto = !menuMovil.hidden;
        menuMovil.hidden = abierto;
        botonMenu.setAttribute('aria-expanded', abierto ? 'false' : 'true');
    });

    var enlacesMenu = menuMovil.querySelectorAll('a');
    for (var i = 0; i < enlacesMenu.length; i++) {
        enlacesMenu[i].addEventListener('click', function () {
            menuMovil.hidden = true;
            botonMenu.setAttribute('aria-expanded', 'false');
        });
    }
}


// — Formulario de contacto —
var formulario = document.getElementById('contact-form');

if (formulario) {

    formulario.addEventListener('submit', function (evento) {
        evento.preventDefault();

        var nombre  = document.getElementById('nombre').value.trim();
        var email   = document.getElementById('email').value.trim();
        var centro  = document.getElementById('centro').value.trim();
        var mensaje = document.getElementById('mensaje').value.trim();

        if (nombre === '' || email === '' || centro === '' || mensaje === '') {
            mostrarFeedback('Por favor, rellena todos los campos.', 'error');
            return;
        }

        if (!email.includes('@') || !email.includes('.')) {
            mostrarFeedback('Introduce un email válido (ej. nombre@dominio.com).', 'error');
            return;
        }

        if (mensaje.length < 10) {
            mostrarFeedback('El mensaje debe tener al menos 10 caracteres.', 'error');
            return;
        }

        mostrarFeedback('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.', 'exito');
        formulario.reset();
        actualizarContador();
    });
}


// — Contador del textarea del mensaje —
var campoMensaje = document.getElementById('mensaje');
var contadorEl   = document.getElementById('mensaje-count');
var MAXIMO       = 1000;

function actualizarContador() {
    if (!campoMensaje || !contadorEl) return;
    contadorEl.textContent = campoMensaje.value.length + ' / ' + MAXIMO;
}

if (campoMensaje && contadorEl) {
    campoMensaje.addEventListener('input', actualizarContador);
    actualizarContador();
}


function mostrarFeedback(texto, tipo) {
    var caja = document.getElementById('form-feedback');
    if (!caja) return;

    caja.textContent = texto;
    caja.className   = 'form-feedback form-feedback--' + tipo;
    caja.hidden      = false;

    if (tipo === 'exito') {
        setTimeout(function () {
            caja.hidden = true;
        }, 6000);
    }
}


// — Recuperar contraseña (solo si estamos en esa página) —
(function () {
    var formEmail = document.getElementById('rc-form-email');
    if (!formEmail) return;

    var CODIGO_DEMO = '123456';

    var paso1         = document.getElementById('rc-paso1');
    var paso2         = document.getElementById('rc-paso2');
    var formCambio    = document.getElementById('rc-form-cambio');
    var overlayExito  = document.getElementById('rc-overlay-exito');
    var overlayError  = document.getElementById('rc-overlay-error');
    var overlayCambio = document.getElementById('rc-overlay-cambio-ok');

    function mostrarOverlayRC(el) {
        el.removeAttribute('hidden');
        void el.offsetWidth;
        el.classList.add('rc-overlay--visible');
    }

    function cerrarOverlayRC(el, cb) {
        el.classList.remove('rc-overlay--visible');
        setTimeout(function () {
            el.setAttribute('hidden', '');
            if (typeof cb === 'function') cb();
        }, 260);
    }

    function marcarErrorRC(input, msg) {
        input.classList.add('rc-input--error');
        var existente = input.parentElement.querySelector('.rc-campo-error');
        if (!existente) {
            var span = document.createElement('span');
            span.className = 'rc-campo-error';
            span.setAttribute('role', 'alert');
            span.textContent = msg;
            input.parentElement.appendChild(span);
        } else {
            existente.textContent = msg;
        }
    }

    function limpiarErrorRC(input) {
        input.classList.remove('rc-input--error');
        var existente = input.parentElement.querySelector('.rc-campo-error');
        if (existente) existente.remove();
    }

    var btnExitoCerrar = document.getElementById('rc-popup-exito-cerrar');
    if (btnExitoCerrar) {
        btnExitoCerrar.addEventListener('click', function () {
            cerrarOverlayRC(overlayExito, function () {
                paso1.classList.add('rc-main--oculto');
                paso2.classList.remove('rc-main--oculto');
            });
        });
    }

    var btnErrorCerrar = document.getElementById('rc-popup-error-cerrar');
    if (btnErrorCerrar) {
        btnErrorCerrar.addEventListener('click', function () {
            cerrarOverlayRC(overlayError);
        });
    }

    formEmail.addEventListener('submit', function (e) {
        e.preventDefault();
        var email = document.getElementById('rc-email').value.trim();

        if (!email) {
            marcarErrorRC(document.getElementById('rc-email'), 'Introduce tu correo electrónico.');
            return;
        }
        if (!email.includes('@') || !email.includes('.')) {
            marcarErrorRC(document.getElementById('rc-email'), 'Introduce un correo electrónico válido.');
            return;
        }

        limpiarErrorRC(document.getElementById('rc-email'));
        mostrarOverlayRC(overlayExito);
    });

    if (formCambio) {
        formCambio.addEventListener('submit', function (e) {
            e.preventDefault();
            var codigo    = document.getElementById('rc-codigo').value.trim();
            var nuevaPwd  = document.getElementById('rc-nueva-pwd').value;
            var confirmar = document.getElementById('rc-confirmar-pwd').value;

            var hayError = false;

            if (codigo !== CODIGO_DEMO) {
                marcarErrorRC(document.getElementById('rc-codigo'), 'Código incorrecto o caducado.');
                mostrarOverlayRC(overlayError);
                hayError = true;
            } else {
                limpiarErrorRC(document.getElementById('rc-codigo'));
            }

            if (!nuevaPwd || nuevaPwd.length < 6) {
                marcarErrorRC(document.getElementById('rc-nueva-pwd'), 'La contraseña debe tener al menos 6 caracteres.');
                hayError = true;
            } else {
                limpiarErrorRC(document.getElementById('rc-nueva-pwd'));
            }

            if (nuevaPwd !== confirmar) {
                marcarErrorRC(document.getElementById('rc-confirmar-pwd'), 'Las contraseñas no coinciden.');
                hayError = true;
            } else if (!hayError) {
                limpiarErrorRC(document.getElementById('rc-confirmar-pwd'));
            }

            if (!hayError) {
                mostrarOverlayRC(overlayCambio);
            }
        });
    }

    [overlayExito, overlayError, overlayCambio].forEach(function (overlay) {
        if (!overlay) return;
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) cerrarOverlayRC(overlay);
        });
    });

}());

