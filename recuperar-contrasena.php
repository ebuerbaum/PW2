<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Recupera tu contraseña de DOA – Gestión Educativa Inteligente introduciendo tu correo electrónico.">
    <title>Recuperar contraseña | DOA – Gestión Educativa Inteligente</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="rc-body">

    <!-- ===== BOTÓN VOLVER ===== -->
    <a href="javascript:history.back()" class="rc-volver" id="rc-volver" aria-label="Volver a la página anterior">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M19 12H5M5 12l7 7M5 12l7-7" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Volver
    </a>

    <!-- ===== PASO 1: Enviar código ===== -->
    <main class="rc-main" id="rc-paso1">

        <img src="img/solo_buho_negro.png" alt="DOA logo" class="rc-logo">
        <h1 class="rc-titulo">Recuperar contraseña</h1>

        <div class="rc-card">
            <form id="rc-form-email" class="rc-form" novalidate>

                <div class="rc-campo">
                    <label for="rc-email" class="rc-label">CORREO ELECTRÓNICO</label>
                    <input type="email" id="rc-email" name="email" class="rc-input" placeholder="" autocomplete="email"
                        required>
                </div>

                <button type="submit" id="rc-btn-enviar" class="rc-btn">ENVIAR CÓDIGO</button>

            </form>
        </div>

    </main>

    <!-- ===== PASO 2: Cambiar contraseña ===== -->
    <main class="rc-main rc-main--oculto" id="rc-paso2">

        <img src="img/solo_buho_negro.png" alt="DOA logo" class="rc-logo">
        <h1 class="rc-titulo">Cambiar la contraseña</h1>

        <div class="rc-card">
            <form id="rc-form-cambio" class="rc-form" novalidate>

                <div class="rc-campo">
                    <label for="rc-codigo" class="rc-label">Código</label>
                    <input type="text" id="rc-codigo" name="codigo" class="rc-input" placeholder=""
                        autocomplete="one-time-code" required>
                </div>

                <div class="rc-campo">
                    <label for="rc-nueva-pwd" class="rc-label">Contraseña nueva</label>
                    <input type="password" id="rc-nueva-pwd" name="nueva-pwd" class="rc-input" placeholder=""
                        autocomplete="new-password" required>
                </div>

                <div class="rc-campo">
                    <label for="rc-confirmar-pwd" class="rc-label" style="color: var(--color-principal);">Confirma la
                        contraseña nueva</label>
                    <input type="password" id="rc-confirmar-pwd" name="confirmar-pwd" class="rc-input" placeholder=""
                        autocomplete="new-password" required>
                </div>

                <button type="submit" id="rc-btn-cambiar" class="rc-btn">Cambiar la contraseña</button>

            </form>
        </div>

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="pie-pagina">
        <div class="contenedor pie-pagina__interior">
            <a href="index.php" class="pie-pagina__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>
            <p class="pie-pagina__derechos">Todos los derechos reservados 2026&copy;</p>
        </div>
    </footer>

    <!-- ===== POPUP: Código enviado con éxito ===== -->
    <div class="rc-overlay" id="rc-overlay-exito" hidden aria-modal="true" role="dialog"
        aria-labelledby="rc-popup-exito-titulo">
        <div class="rc-popup rc-popup--exito">
            <h2 id="rc-popup-exito-titulo" class="rc-popup__titulo">Éxito</h2>
            <p class="rc-popup__mensaje">El código se ha enviado correctamente a su dirección de correo electrónico.</p>
            <button class="rc-popup__btn" id="rc-popup-exito-cerrar">Cerrar</button>
        </div>
    </div>

    <!-- ===== POPUP: Error código incorrecto ===== -->
    <div class="rc-overlay" id="rc-overlay-error" hidden aria-modal="true" role="dialog"
        aria-labelledby="rc-popup-error-titulo">
        <div class="rc-popup rc-popup--error">
            <h2 id="rc-popup-error-titulo" class="rc-popup__titulo">Error</h2>
            <p class="rc-popup__mensaje rc-popup__mensaje--error">Código incorrecto o caducado</p>
            <button class="rc-popup__btn" id="rc-popup-error-cerrar">Cerrar</button>
        </div>
    </div>

    <!-- ===== POPUP: Contraseña cambiada con éxito ===== -->
    <div class="rc-overlay" id="rc-overlay-cambio-ok" hidden aria-modal="true" role="dialog"
        aria-labelledby="rc-popup-cambio-titulo">
        <div class="rc-popup rc-popup--exito">
            <div class="rc-popup__icono-check">
                <svg viewBox="0 0 52 52" fill="none" aria-hidden="true">
                    <circle cx="26" cy="26" r="25" stroke="currentColor" stroke-width="2" />
                    <path d="M14 27l8 8 16-16" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <h2 id="rc-popup-cambio-titulo" class="rc-popup__titulo">¡Contraseña cambiada!</h2>
            <p class="rc-popup__mensaje">Tu contraseña se ha actualizado correctamente. Ya puedes iniciar sesión.</p>
            <a href="login_doa.php" class="rc-popup__btn rc-popup__btn--link">Ir al inicio de sesión</a>
        </div>
    </div>

    <script src="js/script.js"></script>

</body>

</html>