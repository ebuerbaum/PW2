<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GTI – Contáctanos para más información sobre nuestros productos.">
    <title>Contáctanos | GTI</title>
    <link rel="stylesheet" href="css/estilos.css?v=3">
</head>

<body>
    <!-- ============ HEADER ============ -->
    <header class="barra-nav">
        <div class="contenedor barra-nav__interior">

            <a href="index.php" class="barra-nav__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>

            <nav aria-label="Menú principal">
                <ul class="barra-nav__menu">
                    <li class="barra-nav__item">
                        <a href="index.php" class="barra-nav__enlace">
                            Productos <span class="barra-nav__flecha" aria-hidden="true">▾</span>
                        </a>
                        <ul class="barra-nav__dropdown">
                            <li><a href="infoDoa_GTI.php">DOA</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php#testimonios">Testimonios</a></li>
                    <li><a href="contacto_GTI.php" aria-current="page">Contáctanos</a></li>
                </ul>
            </nav>
            <!--
                ÁREA DE PERFIL / LOGIN en la navbar GTI
                ─────────────────────────────────────────
                • Sin sesión GTI → #gti-btn-login (enlace «LOGIN»)
                • Con sesión GTI → #gti-perfil-wrapper (desplegable: nombre + cerrar sesión)
                Requiere auth-gti.js antes de script.js.
            -->
            <div class="gti-nav-perfil">

                <!-- Estado SIN sesión -->
                <a id="gti-btn-login" href="login_GTI.php?redirect=contacto_GTI.php" class="gti-btn-login">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    LOGIN
                </a>

                <!-- Estado CON sesión (oculto por defecto) -->
                <div class="gti-perfil-wrapper" id="gti-perfil-wrapper" style="display:none">
                    <button class="gti-perfil-btn" id="gti-perfil-btn" aria-expanded="false" aria-controls="gti-perfil-popup" aria-label="Perfil de usuario">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="gti-perfil-popup" id="gti-perfil-popup" hidden>
                        <div class="gti-perfil-popup__cabecera">
                            <div class="gti-perfil-popup__avatar" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/>
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div style="min-width:0">
                                <p class="gti-perfil-popup__nombre" id="gti-popup-nombre">Usuario</p>
                            </div>
                        </div>
                        <button class="gti-perfil-popup__logout" id="gti-btn-logout">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="16 17 21 12 16 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Cerrar sesión
                        </button>
                    </div>
                </div>

            </div>

            <button class="hamburger" aria-label="Abrir menú" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>

        </div>

        <nav id="mobile-menu" class="mobile-menu" hidden aria-label="Menú móvil">
            <ul class="mobile-nav-list">
                <li><a class="mobile-nav-link" href="infoDoa_GTI.php">DOA</a></li>
                <li><a class="mobile-nav-link" href="index.php#testimonios">Testimonios</a></li>
                <li><a class="mobile-nav-link mobile-nav-link--active" href="contacto_GTI.php"
                       aria-current="page">Contáctanos</a></li>
            </ul>
        </nav>

    </header>

    <!-- ============ MAIN ============ -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Contacto</h1>

            <div class="contact-card">
                <form id="contact-form" class="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Juan Perez"
                                required minlength="2" maxlength="60" autocomplete="name"
                                aria-describedby="nombre-error">
                            <span class="form-error" id="nombre-error" role="alert"></span>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input"
                                placeholder="jperez@gmail.com" required autocomplete="email"
                                aria-describedby="email-error">
                            <span class="form-error" id="email-error" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="centro" class="form-label">Centro Educativo</label>
                        <input type="text" id="centro" name="centro" class="form-input" placeholder="Colegio Nombre"
                            required minlength="2" maxlength="100" autocomplete="organization"
                            aria-describedby="centro-error">
                        <span class="form-error" id="centro-error" role="alert"></span>
                    </div>

                    <div class="form-group">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" class="form-input form-textarea"
                            placeholder="Escribe tu mensaje aquí..." required minlength="10" maxlength="1000" rows="6"
                            aria-describedby="mensaje-error mensaje-count"></textarea>
                        <div class="textarea-meta">
                            <span class="form-error" id="mensaje-error" role="alert"></span>
                            <span class="char-counter" id="mensaje-count" aria-live="polite">0 / 1000</span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn--primary btn--submit">
                            <span class="btn-label">Enviar</span>
                            <svg class="btn-spinner" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="10" stroke-width="3" fill="none"></circle>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Success / error toast -->
                <div id="form-feedback" class="form-feedback" role="status" aria-live="polite" hidden></div>
            </div>
        </div>
    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="pie-pagina">
        <div class="contenedor pie-pagina__interior">
            <a href="index.php" class="pie-pagina__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>
            <p class="pie-pagina__derechos">Todos los derechos reservados 2026&copy;</p>
        </div>
    </footer>

    <script src="js/auth-gti.js" defer></script>
    <script src="js/script.js" defer></script>
</body>

</html>