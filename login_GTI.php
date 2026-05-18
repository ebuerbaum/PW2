<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso GTI – Regístrate o inicia sesión</title>
    <link rel="stylesheet" href="css/estilos.css">

    <style>
        /* =============================================
           ESTILOS ESPECÍFICOS DE login_GTI.php
           Se definen aquí para no contaminar estilos.css
           con reglas de una sola página.
           ============================================= */

        /* Fondo degradado coherente con la paleta GTI */
        .lgti-body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f0f4ff 0%, #e8f4fd 60%, #f4f8ff 100%);
        }

        /* Enlace "Volver" en la esquina superior izquierda */
        .lgti-volver {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            position: absolute;
            top: 20px;
            left: 24px;
            font-family: var(--fuente-titular);
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-principal);
            transition: gap 0.2s;
        }

        .lgti-volver svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .lgti-volver:hover {
            gap: 10px;
        }

        /* Área central */
        .lgti-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        /* Logo + título */
        .lgti-logo {
            height: 56px;
            width: auto;
            margin-bottom: 12px;
        }

        .lgti-titulo {
            font-family: var(--fuente-titular);
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--color-texto-oscuro);
            margin-bottom: 4px;
            text-align: center;
        }

        .lgti-subtitulo {
            font-size: 0.875rem;
            color: var(--color-texto);
            text-align: center;
            margin-bottom: 24px;
        }

        /* Tarjeta blanca contenedora */
        .lgti-card {
            background: var(--color-blanco);
            border-radius: var(--radio-tarjeta);
            box-shadow: 0 4px 24px rgba(7, 135, 240, 0.10);
            padding: 32px;
            width: 100%;
            max-width: 420px;
        }

        /* ---- Tabs Login / Registro ---- */
        .lgti-tabs {
            display: flex;
            border-bottom: 2px solid #e4e6ea;
            margin-bottom: 24px;
        }

        .lgti-tab {
            flex: 1;
            padding: 10px;
            font-family: var(--fuente-titular);
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--color-texto);
            background: none;
            border: none;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: color 0.2s, border-color 0.2s;
        }

        .lgti-tab--activo {
            color: var(--color-principal);
            border-bottom-color: var(--color-principal);
        }

        /* ---- Paneles de cada tab ---- */
        .lgti-panel {
            display: none;
        }

        .lgti-panel--activo {
            display: block;
        }

        /* ---- Campos de formulario ---- */
        .lgti-campo {
            margin-bottom: 16px;
        }

        .lgti-label {
            display: block;
            font-family: var(--fuente-titular);
            font-weight: 600;
            font-size: 0.8125rem;
            color: var(--color-texto-oscuro);
            margin-bottom: 6px;
        }

        .lgti-input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #dde1e7;
            border-radius: 8px;
            font-family: var(--fuente-cuerpo);
            font-size: 0.9375rem;
            color: var(--color-texto-oscuro);
            background-color: #fafbfc;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .lgti-input:focus {
            border-color: var(--color-principal);
            box-shadow: 0 0 0 3px rgba(7, 135, 240, 0.15);
            background-color: var(--color-blanco);
        }

        /* Estado de error en el input */
        .lgti-input--error {
            border-color: #dc2626;
        }

        .lgti-input--error:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15);
        }

        /* Mensaje de error inline bajo el input */
        .lgti-campo-error {
            display: block;
            margin-top: 5px;
            font-size: 0.78rem;
            color: #dc2626;
            font-family: var(--fuente-cuerpo);
        }

        /* Wrapper del input contraseña (para el toggle ver/ocultar) */
        .lgti-input-wrapper {
            position: relative;
        }

        .lgti-input-wrapper .lgti-input {
            padding-right: 42px;
        }

        .lgti-toggle-pwd {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            color: var(--color-texto);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lgti-toggle-pwd svg {
            width: 20px;
            height: 20px;
            pointer-events: none;
        }

        /* Botón principal de envío */
        .lgti-btn {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            background-color: var(--color-principal);
            color: var(--color-blanco);
            border: none;
            border-radius: var(--radio-boton);
            font-family: var(--fuente-titular);
            font-weight: 700;
            font-size: 0.9375rem;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        .lgti-btn:hover {
            background-color: #0670cc;
        }

        .lgti-btn:active {
            transform: scale(0.98);
        }

        /* Caja de feedback (error / éxito) debajo del botón */
        .lgti-feedback {
            margin-top: 12px;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-family: var(--fuente-cuerpo);
            display: none; /* Se activa por JS */
        }

        .lgti-feedback--error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            display: block;
        }

        .lgti-feedback--exito {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
            display: block;
        }

        /* Enlace de texto dentro del formulario */
        .lgti-enlace-tab {
            display: block;
            text-align: center;
            margin-top: 16px;
            font-size: 0.85rem;
            color: var(--color-texto);
        }

        .lgti-enlace-tab button {
            background: none;
            border: none;
            color: var(--color-principal);
            font-family: var(--fuente-titular);
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            padding: 0;
            text-decoration: underline;
        }

        /* Nota informativa ("registra tu institución") */
        .lgti-nota {
            margin-top: 20px;
            padding: 12px 16px;
            background-color: #f0f7ff;
            border-left: 3px solid var(--color-principal);
            border-radius: 0 8px 8px 0;
            font-size: 0.8125rem;
            color: var(--color-texto);
            line-height: 1.5;
        }

        .lgti-nota strong {
            color: var(--color-principal);
        }

        /* ---- Responsive ---- */
        @media (max-width: 480px) {
            .lgti-card {
                padding: 24px 20px;
            }

            .lgti-volver {
                position: static;
                display: inline-flex;
                margin: 16px 0 0 16px;
            }
        }
    </style>
</head>
<body class="lgti-body">

    <!-- Enlace de volver a la página de info de DOA (o a la que vino) -->
    <a href="infoDoa_GTI.php" class="lgti-volver" id="lgti-btn-volver" aria-label="Volver">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M19 12H5M5 12l7 7M5 12l7-7" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Volver
    </a>

    <main class="lgti-main">

        <!-- Logo GTI -->
        <img src="img/logo-gti-removebg-preview.png" alt="GTI" class="lgti-logo">
        <h1 class="lgti-titulo">Acceso a GTI</h1>
        <p class="lgti-subtitulo">Regístrate o inicia sesión para probar la demo de DOA</p>

        <!-- Tarjeta con tabs Login / Registro -->
        <div class="lgti-card">

            <!-- ---- Tabs ---- -->
            <div class="lgti-tabs" role="tablist">
                <button
                    class="lgti-tab lgti-tab--activo"
                    id="tab-login"
                    role="tab"
                    aria-selected="true"
                    aria-controls="panel-login"
                >Iniciar sesión</button>
                <button
                    class="lgti-tab"
                    id="tab-registro"
                    role="tab"
                    aria-selected="false"
                    aria-controls="panel-registro"
                >Registrarse</button>
            </div>

            <!-- ============================
                 PANEL: LOGIN
                 ============================ -->
            <div class="lgti-panel lgti-panel--activo" id="panel-login" role="tabpanel" aria-labelledby="tab-login">

                <form id="lgti-form-login" novalidate>

                    <!-- Email -->
                    <div class="lgti-campo">
                        <label for="lgti-login-email" class="lgti-label">Correo electrónico</label>
                        <input
                            type="email"
                            id="lgti-login-email"
                            name="email"
                            class="lgti-input"
                            autocomplete="email"
                            placeholder="tu@institución.es"
                            required>
                    </div>

                    <!-- Contraseña -->
                    <div class="lgti-campo">
                        <label for="lgti-login-pwd" class="lgti-label">Contraseña</label>
                        <div class="lgti-input-wrapper">
                            <input
                                type="password"
                                id="lgti-login-pwd"
                                name="password"
                                class="lgti-input"
                                autocomplete="current-password"
                                placeholder="••••••"
                                required>
                            <!-- Botón ver / ocultar contraseña -->
                            <button type="button" class="lgti-toggle-pwd" id="lgti-toggle-login" aria-label="Mostrar contraseña">
                                <svg id="lgti-eye-login" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <ellipse cx="12" cy="12" rx="9" ry="5.5" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <svg id="lgti-eye-off-login" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="display:none">
                                    <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <line x1="1" y1="1" x2="23" y2="23" stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="lgti-btn">Iniciar sesión</button>

                    <!-- Feedback de error/éxito del login -->
                    <div id="lgti-feedback-login" class="lgti-feedback" role="alert" hidden></div>

                </form>

                <!-- Enlace para cambiar al registro -->
                <p class="lgti-enlace-tab">
                    ¿Aún no tienes cuenta?
                    <button type="button" id="lgti-ir-registro">Regístrate gratis</button>
                </p>

            </div>
            <!-- /panel-login -->

            <!-- ============================
                 PANEL: REGISTRO
                 ============================ -->
            <div class="lgti-panel" id="panel-registro" role="tabpanel" aria-labelledby="tab-registro">

                <form id="lgti-form-registro" novalidate>

                    <!-- Nombre de la institución / persona -->
                    <div class="lgti-campo">
                        <label for="lgti-reg-nombre" class="lgti-label">Nombre completo o institución</label>
                        <input
                            type="text"
                            id="lgti-reg-nombre"
                            name="nombre"
                            class="lgti-input"
                            autocomplete="organization"
                            placeholder="IES / Universidad / Tu nombre"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="lgti-campo">
                        <label for="lgti-reg-email" class="lgti-label">Correo electrónico</label>
                        <input
                            type="email"
                            id="lgti-reg-email"
                            name="email"
                            class="lgti-input"
                            autocomplete="email"
                            placeholder="tu@institución.es"
                            required>
                    </div>

                    <!-- Contraseña -->
                    <div class="lgti-campo">
                        <label for="lgti-reg-pwd" class="lgti-label">Contraseña <span style="font-weight:400;color:var(--color-texto)">(mínimo 6 caracteres)</span></label>
                        <div class="lgti-input-wrapper">
                            <input
                                type="password"
                                id="lgti-reg-pwd"
                                name="password"
                                class="lgti-input"
                                autocomplete="new-password"
                                placeholder="••••••"
                                required>
                            <!-- Botón ver / ocultar contraseña -->
                            <button type="button" class="lgti-toggle-pwd" id="lgti-toggle-reg" aria-label="Mostrar contraseña">
                                <svg id="lgti-eye-reg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <ellipse cx="12" cy="12" rx="9" ry="5.5" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <svg id="lgti-eye-off-reg" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="display:none">
                                    <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <line x1="1" y1="1" x2="23" y2="23" stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="lgti-btn">Crear cuenta y acceder</button>

                    <!-- Feedback del registro -->
                    <div id="lgti-feedback-registro" class="lgti-feedback" role="alert" hidden></div>

                </form>

                <!-- Enlace para volver al login -->
                <p class="lgti-enlace-tab">
                    ¿Ya tienes cuenta?
                    <button type="button" id="lgti-ir-login">Inicia sesión</button>
                </p>

                <!-- Nota informativa -->
                <div class="lgti-nota">
                    <strong>¿Por qué registrarse?</strong>
                    Tu cuenta GTI te da acceso a la demo completa de DOA con credenciales de prueba.
                    Sin compromiso, sin tarjeta de crédito.
                </div>

            </div>
            <!-- /panel-registro -->

        </div>
        <!-- /lgti-card -->

    </main>

    <!-- Pie de página -->
    <footer class="pie-pagina">
        <div class="contenedor pie-pagina__interior">
            <a href="index.php" class="pie-pagina__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>
            <p class="pie-pagina__derechos">Todos los derechos reservados 2026&copy;</p>
        </div>
    </footer>

    <!-- Sistema de auth GTI (simulado) -->
    <script src="js/auth-gti.js" defer></script>

    <script defer>
        /* ==============================================
           LOGIN_GTI — Script principal
           Gestiona:
             1. Tabs login / registro
             2. Toggle ver/ocultar contraseña
             3. Envío del formulario de login
             4. Envío del formulario de registro
             5. Redirección post-login (parámetro ?redirect=)
           ============================================== */

        /* ---- 1. Parámetro ?redirect= de la URL ----
           Si venimos desde infoDoa_GTI.php con ?redirect=infoDoa_GTI.php,
           tras el login redirigimos allí en lugar de a index.php. */
        var params   = new URLSearchParams(window.location.search);
        var redirect = params.get('redirect') || 'index.php';

        /* Actualizar también el enlace "Volver" con la página de origen */
        var btnVolver = document.getElementById('lgti-btn-volver');
        if (btnVolver && params.get('redirect')) {
            btnVolver.href = decodeURIComponent(redirect);
        }

        /* ---- 2. Tabs ---- */
        var tabLogin    = document.getElementById('tab-login');
        var tabRegistro = document.getElementById('tab-registro');
        var panelLogin  = document.getElementById('panel-login');
        var panelReg    = document.getElementById('panel-registro');

        /** Activa el tab indicado ('login' | 'registro') */
        function activarTab(cual) {
            var esLogin = (cual === 'login');

            /* Tabs */
            tabLogin.classList.toggle('lgti-tab--activo', esLogin);
            tabLogin.setAttribute('aria-selected', esLogin ? 'true' : 'false');
            tabRegistro.classList.toggle('lgti-tab--activo', !esLogin);
            tabRegistro.setAttribute('aria-selected', !esLogin ? 'true' : 'false');

            /* Paneles */
            panelLogin.classList.toggle('lgti-panel--activo', esLogin);
            panelReg.classList.toggle('lgti-panel--activo', !esLogin);
        }

        tabLogin.addEventListener('click',    function () { activarTab('login'); });
        tabRegistro.addEventListener('click', function () { activarTab('registro'); });

        /* Botones de enlace dentro de cada panel */
        document.getElementById('lgti-ir-registro').addEventListener('click', function () { activarTab('registro'); });
        document.getElementById('lgti-ir-login').addEventListener('click',    function () { activarTab('login'); });

        /* ---- 3. Toggle ver/ocultar contraseña ---- */
        function configurarTogglePwd(btnId, inputId, eyeId, eyeOffId) {
            var btn    = document.getElementById(btnId);
            var input  = document.getElementById(inputId);
            var eye    = document.getElementById(eyeId);
            var eyeOff = document.getElementById(eyeOffId);
            if (!btn || !input) return;

            btn.addEventListener('click', function () {
                var visible = input.type === 'text';
                input.type  = visible ? 'password' : 'text';
                eye.style.display    = visible ? '' : 'none';
                eyeOff.style.display = visible ? 'none' : '';
                btn.setAttribute('aria-label', visible ? 'Mostrar contraseña' : 'Ocultar contraseña');
            });
        }

        configurarTogglePwd('lgti-toggle-login', 'lgti-login-pwd',  'lgti-eye-login',  'lgti-eye-off-login');
        configurarTogglePwd('lgti-toggle-reg',   'lgti-reg-pwd',    'lgti-eye-reg',    'lgti-eye-off-reg');

        /* ---- Helpers de feedback y validación ---- */

        /** Muestra un mensaje en la caja de feedback */
        function mostrarFeedback(id, texto, tipo) {
            var caja = document.getElementById(id);
            if (!caja) return;
            caja.textContent = texto;
            caja.className   = 'lgti-feedback lgti-feedback--' + tipo;
            caja.hidden      = false;
        }

        /** Oculta la caja de feedback */
        function ocultarFeedback(id) {
            var caja = document.getElementById(id);
            if (caja) {
                caja.hidden = true;
                caja.className = 'lgti-feedback';
            }
        }

        /** Marca un input con estado de error */
        function marcarError(inputEl, msg) {
            inputEl.classList.add('lgti-input--error');
            /* Eliminar mensaje previo si existía */
            var prev = inputEl.parentElement.querySelector('.lgti-campo-error');
            if (prev) prev.remove();
            var span = document.createElement('span');
            span.className = 'lgti-campo-error';
            span.setAttribute('role', 'alert');
            span.textContent = msg;
            inputEl.parentElement.appendChild(span);
        }

        /** Limpia el estado de error de un input */
        function limpiarError(inputEl) {
            inputEl.classList.remove('lgti-input--error');
            var prev = inputEl.parentElement.querySelector('.lgti-campo-error');
            if (prev) prev.remove();
        }

        /** Valida un email con regex básica */
        function emailValido(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        /* ---- 4. Formulario de LOGIN ---- */
        document.getElementById('lgti-form-login').addEventListener('submit', function (e) {
            e.preventDefault();
            ocultarFeedback('lgti-feedback-login');

            var emailInput = document.getElementById('lgti-login-email');
            var pwdInput   = document.getElementById('lgti-login-pwd');
            var email      = emailInput.value.trim();
            var pwd        = pwdInput.value;
            var hayError   = false;

            /* Validar email */
            limpiarError(emailInput);
            if (!email) {
                marcarError(emailInput, 'Introduce tu correo electrónico.');
                hayError = true;
            } else if (!emailValido(email)) {
                marcarError(emailInput, 'Correo no válido. Ejemplo: nombre@institución.es');
                hayError = true;
            }

            /* Validar contraseña */
            limpiarError(pwdInput.parentElement.querySelector('.lgti-input') || pwdInput);
            if (!pwd) {
                marcarError(pwdInput, 'Introduce tu contraseña.');
                hayError = true;
            }

            if (hayError) return;

            /* Intentar login con AuthGTI */
            var usuario = window.AuthGTI ? AuthGTI.validar(email, pwd) : null;
            if (usuario) {
                AuthGTI.guardar(usuario);
                /* Redirigir a la página de origen (o index.php si no hay redirect) */
                window.location.href = decodeURIComponent(redirect);
            } else {
                mostrarFeedback('lgti-feedback-login', 'Correo o contraseña incorrectos. ¿No tienes cuenta? Regístrate.', 'error');
            }
        });

        /* ---- 5. Formulario de REGISTRO ---- */
        document.getElementById('lgti-form-registro').addEventListener('submit', function (e) {
            e.preventDefault();
            ocultarFeedback('lgti-feedback-registro');

            var nombreInput = document.getElementById('lgti-reg-nombre');
            var emailInput  = document.getElementById('lgti-reg-email');
            var pwdInput    = document.getElementById('lgti-reg-pwd');
            var nombre      = nombreInput.value.trim();
            var email       = emailInput.value.trim();
            var pwd         = pwdInput.value;
            var hayError    = false;

            /* Validar nombre */
            limpiarError(nombreInput);
            if (!nombre) {
                marcarError(nombreInput, 'Introduce el nombre de tu institución o nombre completo.');
                hayError = true;
            }

            /* Validar email */
            limpiarError(emailInput);
            if (!email) {
                marcarError(emailInput, 'Introduce tu correo electrónico.');
                hayError = true;
            } else if (!emailValido(email)) {
                marcarError(emailInput, 'Correo no válido. Ejemplo: nombre@institución.es');
                hayError = true;
            }

            /* Validar contraseña */
            limpiarError(pwdInput);
            if (!pwd) {
                marcarError(pwdInput, 'Introduce una contraseña.');
                hayError = true;
            } else if (pwd.length < 6) {
                marcarError(pwdInput, 'La contraseña debe tener al menos 6 caracteres.');
                hayError = true;
            }

            if (hayError) return;

            /* Intentar registro con AuthGTI */
            var resultado = window.AuthGTI ? AuthGTI.registrar(nombre, email, pwd) : { ok: false, error: 'Error interno.' };

            if (resultado.ok) {
                /* Login automático tras registro exitoso */
                AuthGTI.guardar(resultado.usuario);
                /* Breve mensaje de bienvenida antes de redirigir */
                mostrarFeedback('lgti-feedback-registro', '¡Registro exitoso! Redirigiendo…', 'exito');
                setTimeout(function () {
                    window.location.href = decodeURIComponent(redirect);
                }, 1200);
            } else {
                mostrarFeedback('lgti-feedback-registro', resultado.error, 'error');
            }
        });

        /* ---- Si ya hay sesión GTI activa, redirigir directamente ----
           El usuario no necesita volver a logarse si ya lo hizo. */
        if (window.AuthGTI && AuthGTI.getUsuario()) {
            window.location.href = decodeURIComponent(redirect);
        }
    </script>

</body>
</html>
