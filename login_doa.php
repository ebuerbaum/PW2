<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DOA – Gestión Educativa Inteligente</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="login-body">

    <a href="infoDoa_GTI.php" class="login-volver">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M19 12H5M5 12l7 7M5 12l7-7" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Volver
    </a>

    <main class="login-main login-main--con-panel">

        <!-- =============================================
             COLUMNA IZQUIERDA: Formulario de login DOA
             (sin cambios en la lógica existente)
             ============================================= -->
        <div class="login-columna-form">

        <img src="img/solo_buho_negro.png" alt="DOA" class="login-logo">
        <h1 class="login-titulo">Bienvenido a DOA</h1>
        <p class="login-subtitulo">Gestión educativa inteligente</p>

        <div class="login-card">
            <form id="login-form" class="login-form" novalidate>

                <div class="login-campo">
                    <label for="login-email" class="login-label">Correo electrónico</label>
                    <input
                        type="email"
                        id="login-email"
                        name="email"
                        class="login-input"
                        placeholder=""
                        autocomplete="email"
                        required>
                </div>

                <div class="login-campo">
                    <label for="login-password" class="login-label">Contraseña</label>
                    <div class="login-input-wrapper">
                        <input
                            type="password"
                            id="login-password"
                            name="password"
                            class="login-input"
                            placeholder=""
                            autocomplete="current-password"
                            required>
                        <button type="button" class="login-toggle-pwd" id="toggle-pwd" aria-label="Mostrar contraseña">
                            <!-- Ojo abierto -->
                            <svg id="icon-eye" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <ellipse cx="12" cy="12" rx="9" ry="5.5" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <!-- Ojo tachado (oculto por defecto) -->
                            <svg id="icon-eye-off" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="display:none">
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

                <a href="recuperar-contrasena.php" class="login-olvide">¿Olvidaste tu contraseña?</a>

                <button type="submit" class="login-btn">LOGIN</button>

                <div id="login-feedback" class="login-feedback" hidden role="alert"></div>

            </form>
        </div>

        </div>
        <!-- /login-columna-form -->

        <!-- =============================================
             COLUMNA DERECHA: Panel de credenciales de prueba
             (usuarios alineados con auth-demo.js; sin @correo.com)
             ============================================= -->
        <aside class="doa-cred-panel" aria-label="Credenciales de prueba para DOA">

            <div class="doa-cred-panel__cabecera">
                <svg class="doa-cred-panel__icono" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <rect x="5" y="11" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                    <path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="12" cy="16" r="1.2" fill="currentColor"/>
                </svg>
                <div>
                    <h2 class="doa-cred-panel__titulo">Credenciales de prueba</h2>
                    <p class="doa-cred-panel__desc">Pulsa Autocompletar para rellenar el formulario</p>
                </div>
            </div>

            <div class="doa-cred-grupo">
                <span class="doa-cred-grupo__etiqueta">
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <circle cx="10" cy="7" r="3.5" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M3 17c0-3.3 3.1-6 7-6s7 2.7 7 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    Alumnos
                </span>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Lief Simants Dredge</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="l.simdre@epsg.upv.es" data-password="9218611"
                            aria-label="Autocompletar credenciales de Lief Simants Dredge">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">l.simdre@epsg.upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">9218611</span></p>
                </div>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Merline Kirdsch Kampshell</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="m.kirkam@epsg.upv.es" data-password="1320191"
                            aria-label="Autocompletar credenciales de Merline Kirdsch Kampshell">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">m.kirkam@epsg.upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">1320191</span></p>
                </div>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Debora Rawstorne</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="d.rawabc@epsg.upv.es" data-password="9971924"
                            aria-label="Autocompletar credenciales de Debora Rawstorne">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">d.rawabc@epsg.upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">9971924</span></p>
                </div>
            </div>

            <div class="doa-cred-grupo">
                <span class="doa-cred-grupo__etiqueta doa-cred-grupo__etiqueta--profesor">
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <rect x="2" y="3" width="16" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M7 17h6M10 15v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    Profesores
                </span>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Kevan Pounds Mainston</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="k.poumai@upv.es" data-password="4525956"
                            aria-label="Autocompletar credenciales de Kevan Pounds Mainston">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">k.poumai@upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">4525956</span></p>
                </div>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Luelle Pridmore Starsmeare</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="l.prista@upv.es" data-password="6055365"
                            aria-label="Autocompletar credenciales de Luelle Pridmore Starsmeare">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">l.prista@upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">6055365</span></p>
                </div>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Eolande Merriton Mizzi</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="e.mermiz@upv.es" data-password="6738133"
                            aria-label="Autocompletar credenciales de Eolande Merriton Mizzi">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">e.mermiz@upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">6738133</span></p>
                </div>
            </div>

            <div class="doa-cred-grupo">
                <span class="doa-cred-grupo__etiqueta doa-cred-grupo__etiqueta--secretaria">
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M4 4h12a1 1 0 011 1v10a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M7 9h6M7 12h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    Secretaría / PAS
                </span>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Ondrea Brezlaw Sherwill</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="o.breshe@upv.es" data-password="1316390"
                            aria-label="Autocompletar credenciales de Ondrea Brezlaw Sherwill">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">o.breshe@upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">1316390</span></p>
                </div>

                <div class="doa-cred-fila">
                    <div class="doa-cred-fila__cabecera">
                        <span class="doa-cred-nombre">Brooke Malimoe Thomerson</span>
                        <button type="button" class="btn-autocompletar-doalogin"
                            data-email="b.maltho@upv.es" data-password="1970980"
                            aria-label="Autocompletar credenciales de Brooke Malimoe Thomerson">Autocompletar</button>
                    </div>
                    <p class="doa-cred-fila__meta"><span class="doa-cred-valor">b.maltho@upv.es</span> · <span class="doa-cred-valor doa-cred-pwd">1970980</span></p>
                </div>
            </div>

        </aside>
        <!-- /doa-cred-panel -->

    </main>


    <footer class="pie-pagina">
        <div class="contenedor pie-pagina__interior">
            <a href="index.php" class="pie-pagina__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>
            <p class="pie-pagina__derechos">Todos los derechos reservados 2026&copy;</p>
        </div>
    </footer>

    <!-- auth-demo.js: login simulado; sustituir por API -->
    <script src="js/auth-demo.js"></script>
    <!-- script.js: navegación móvil y autocompletar credenciales (login DOA) -->
    <script src="js/script.js"></script>


    <script>
        // Mostrar u ocultar la contraseña al pulsar el icono.
        var toggleBtn = document.getElementById('toggle-pwd');
        var pwdInput  = document.getElementById('login-password');
        var iconEye   = document.getElementById('icon-eye');
        var iconOff   = document.getElementById('icon-eye-off');

        if (toggleBtn && pwdInput) {
            toggleBtn.addEventListener('click', function () {
                var visible = pwdInput.type === 'text';
                pwdInput.type = visible ? 'password' : 'text';
                iconEye.style.display = visible ? '' : 'none';
                iconOff.style.display = visible ? 'none' : '';
                toggleBtn.setAttribute('aria-label', visible ? 'Mostrar contraseña' : 'Ocultar contraseña');
            });
        }

        var loginForm = document.getElementById('login-form');
        var feedback  = document.getElementById('login-feedback');

        if (loginForm) {
            loginForm.addEventListener('submit', function (e) {
                e.preventDefault();
                var email = document.getElementById('login-email').value.trim();
                var pwd   = document.getElementById('login-password').value;

                if (!email || !pwd) {
                    feedback.textContent = 'Por favor, rellena todos los campos.';
                    feedback.hidden = false;
                    return;
                }
                if (!email.includes('@') || !email.includes('.')) {
                    feedback.textContent = 'Introduce un correo electrónico válido.';
                    feedback.hidden = false;
                    return;
                }

                // Comprueba contra la lista demo de auth-demo.js (luego será fetch al servidor).
                var usuario = (window.AuthDemo)
                    ? AuthDemo.validar(email, pwd)
                    : null;
                if (usuario) {
                    AuthDemo.guardar(usuario);
                    window.location.href = usuario.inicio;
                } else {
                    feedback.textContent = 'Correo o contraseña incorrectos.';
                    feedback.hidden = false;
                }
            });
        }
    </script>
</body>
</html>
