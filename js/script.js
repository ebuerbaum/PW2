// Página de contacto y recuperar contraseña (recuperar-contrasena.php comparte parte de este archivo).

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

// ==========================================
// Muro de Anuncios (Notificaciones)
// ==========================================
(function () {
    var btnNotif = document.getElementById('ma-btn-notif');
    var panelNotif = document.getElementById('ma-panel');
    var btnCerrar = document.getElementById('ma-btn-cerrar');
    var btnMarcarTodo = document.getElementById('ma-marcar-todo');
    var badge = document.getElementById('ma-badge');
    var notificaciones = document.querySelectorAll('.ma-notif');

    if (!btnNotif || !panelNotif) return;

    function abrirPanel() {
        panelNotif.classList.add('ma-panel--visible');
        btnNotif.setAttribute('aria-expanded', 'true');
    }

    function cerrarPanel() {
        panelNotif.classList.remove('ma-panel--visible');
        btnNotif.setAttribute('aria-expanded', 'false');
    }

    // Toggle
    btnNotif.addEventListener('click', function (e) {
        e.stopPropagation();
        if (panelNotif.classList.contains('ma-panel--visible')) {
            cerrarPanel();
        } else {
            abrirPanel();
        }
    });

    // Cerrar con el botón X
    if (btnCerrar) {
        btnCerrar.addEventListener('click', function (e) {
            e.stopPropagation();
            cerrarPanel();
            btnNotif.focus();
        });
    }

    // Cerrar al hacer clic fuera del panel
    document.addEventListener('click', function (e) {
        if (panelNotif.classList.contains('ma-panel--visible') && !panelNotif.contains(e.target)) {
            cerrarPanel();
        }
    });

    // Evitar que clics dentro del panel lo cierren
    panelNotif.addEventListener('click', function (e) {
        e.stopPropagation();
    });

    // Cerrar con Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && panelNotif.classList.contains('ma-panel--visible')) {
            cerrarPanel();
            btnNotif.focus();
        }
    });

    function actualizarBadge() {
        if (!badge) return;
        var noLeidas = document.querySelectorAll('.ma-notif--no-leida').length;
        if (noLeidas > 0) {
            badge.textContent = noLeidas;
            badge.setAttribute('aria-label', noLeidas + ' notificaciones sin leer');
            badge.classList.remove('ma-badge--oculto');
        } else {
            badge.classList.add('ma-badge--oculto');
        }
    }

    // Marcar una notificación como leída al hacer clic en ella
    notificaciones.forEach(function (notif) {
        notif.addEventListener('click', function () {
            if (this.classList.contains('ma-notif--no-leida')) {
                this.classList.remove('ma-notif--no-leida');
                actualizarBadge();
            }
        });
    });

    // Marcar todas como leídas
    if (btnMarcarTodo) {
        btnMarcarTodo.addEventListener('click', function () {
            notificaciones.forEach(function (notif) {
                notif.classList.remove('ma-notif--no-leida');
            });
            actualizarBadge();
        });
    }

    // Inicializar badge
    actualizarBadge();
})();


// ==========================================
// Botón condicional GTI (infoDoa_GTI.php)
// ==========================================
// Lee la sesión GTI de sessionStorage (gestionada por auth-gti.js).
// Si hay sesión activa → muestra "Acceder a la Demo".
// Si no la hay       → muestra "Regístrate y prueba DOA gratis".
(function () {
    var btnRegistro = document.getElementById('btn-registro-gti');
    var btnDemo     = document.getElementById('btn-acceder-demo');

    /* Si ninguno de los dos botones existe, no estamos en infoDoa_GTI.php */
    if (!btnRegistro && !btnDemo) return;

    /**
     * Comprueba si hay sesión GTI activa leyendo sessionStorage
     * con la misma clave que usa auth-gti.js ('gti_sesion').
     */
    function gtiComprobarSesion() {
        var sesionGTI = null;
        try {
            sesionGTI = JSON.parse(sessionStorage.getItem('gti_sesion'));
        } catch (e) {
            sesionGTI = null;
        }

        if (sesionGTI) {
            /* Usuario autenticado en GTI: mostrar botón de demo */
            if (btnRegistro) btnRegistro.style.display = 'none';
            if (btnDemo)     btnDemo.style.display     = '';
        } else {
            /* Sin sesión GTI: mostrar botón de captación */
            if (btnRegistro) btnRegistro.style.display = '';
            if (btnDemo)     btnDemo.style.display     = 'none';
        }
    }

    /* Ejecutar al cargar la página */
    gtiComprobarSesion();
}());


// ==========================================
// Login DOA: botones "Autocompletar" en el panel lateral
// ==========================================
(function () {
    document.addEventListener('click', function (e) {
        var btn = e.target.closest && e.target.closest('.btn-autocompletar-doalogin');
        if (!btn) return;

        var email = btn.getAttribute('data-email');
        var pwd   = btn.getAttribute('data-password');
        var em    = document.getElementById('login-email');
        var pw    = document.getElementById('login-password');
        var fb    = document.getElementById('login-feedback');

        if (em && email !== null) em.value = email;
        if (pw && pwd !== null) pw.value = pwd;
        if (fb) {
            fb.hidden = true;
            fb.textContent = '';
        }
        if (em) em.focus();
    });
})();


// ==========================================
// Header GTI: LOGIN vs desplegable de perfil (AuthGTI)
// ==========================================
(function () {
    var wrap = document.querySelector('.gti-nav-perfil');
    if (!wrap) return;

    var btnLogin   = document.getElementById('gti-btn-login');
    var perfilWrap = document.getElementById('gti-perfil-wrapper');
    var perfilBtn  = document.getElementById('gti-perfil-btn');
    var popup      = document.getElementById('gti-perfil-popup');
    var logoutBtn  = document.getElementById('gti-btn-logout');
    var nombreEl   = document.getElementById('gti-popup-nombre');

    function cerrarPopupPerfil() {
        if (popup) popup.hidden = true;
        if (perfilBtn) perfilBtn.setAttribute('aria-expanded', 'false');
    }

    function actualizarBarraGTI() {
        if (!window.AuthGTI) return;

        var usuario = AuthGTI.getUsuario();
        if (usuario) {
            if (btnLogin) btnLogin.style.display = 'none';
            if (perfilWrap) perfilWrap.style.display = '';
            if (nombreEl) nombreEl.textContent = usuario.nombre || 'Usuario';
        } else {
            if (btnLogin) btnLogin.style.display = '';
            if (perfilWrap) {
                perfilWrap.style.display = 'none';
                cerrarPopupPerfil();
            }
        }
    }

    if (!window.AuthGTI) {
        console.warn('[GTI] auth-gti.js no está cargado: el estado del header puede ser incorrecto.');
        return;
    }

    actualizarBarraGTI();

    if (perfilBtn && popup) {
        perfilBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var abierto = !popup.hidden;
            popup.hidden = abierto;
            perfilBtn.setAttribute('aria-expanded', String(!abierto));
        });
        popup.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    }

    document.addEventListener('click', cerrarPopupPerfil);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') cerrarPopupPerfil();
    });

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            AuthGTI.cerrarSesion();
        });
    }
})();


