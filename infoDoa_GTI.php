<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOA – Gestión Educativa Inteligente | GTI</title>
    <link rel="stylesheet" href="css/estilos.css?v=3">
</head>
<body>

    <!-- =========================================
         BARRA DE NAVEGACIÓN
         ========================================= -->
    <header class="barra-nav">
        <div class="contenedor barra-nav__interior">

            <a href="index.php" class="barra-nav__logo">
                <img src="img/logo-gti-removebg-preview.png" alt="GTI – Grado en Tecnologías Interactivas">
            </a>

            <nav aria-label="Menú principal">
                <ul class="barra-nav__menu">
                    <li class="barra-nav__item">
                        <a href="#" class="barra-nav__enlace">
                            Productos <span class="barra-nav__flecha" aria-hidden="true">▾</span>
                        </a>
                        <ul class="barra-nav__dropdown">
                            <li><a href="infoDoa_GTI.php" aria-current="page">DOA</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php#testimonios">Testimonios</a></li>
                    <li><a href="contacto_GTI.php">Contáctanos</a></li>
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
                <a id="gti-btn-login" href="login_GTI.php?redirect=infoDoa_GTI.php" class="gti-btn-login">
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
                <li><a class="mobile-nav-link" href="contacto_GTI.php">Contáctanos</a></li>
            </ul>
        </nav>

    </header>

    <main>

        <!-- =========================================
             PORTADA
             ========================================= -->
        <section class="portada" aria-label="Inicio">
            <div class="contenedor portada__interior">

                <div class="portada__contenido">
                    <h1>
                        <span class="destacado">DOA:</span> gestión<br>
                        educativa inteligente
                    </h1>
                    <p>
                        Porque la coordinación no debe costar esfuerzo,
                        conectamos personas y procesos en un entorno único;
                        tenemos una plataforma escolar modular y escalable.
                    </p>
                    <div class="portada__botones">

                        <!--
                            BOTÓN CONDICIONAL según sesión GTI
                            ─────────────────────────────────
                            • Sin sesión GTI → #btn-registro-gti  (visible por defecto)
                              Redirige a login_GTI.php con ?redirect= para volver aquí.
                            • Con sesión GTI → #btn-acceder-demo  (oculto por defecto, se muestra con JS)
                              Redirige al login de DOA para probar la demo.
                            La visibilidad se gestiona en el <script> al final del archivo.
                        -->

                        <!-- Estado NO autenticado: captar lead -->
                        <a
                            id="btn-registro-gti"
                            href="login_GTI.php?redirect=infoDoa_GTI.php"
                            class="btn btn-principal"
                        >Regístrate y prueba DOA gratis</a>

                        <!-- Estado AUTENTICADO: acceso a la demo (oculto hasta verificar sesión) -->
                        <a
                            id="btn-acceder-demo"
                            href="login_doa.php"
                            class="btn btn-principal"
                            style="display:none"
                        >Acceder a la Demo de DOA</a>

                        <a href="contacto_GTI.php" class="btn btn-contorno">CONTÁCTANOS</a>
                    </div>

                </div>

                <div class="portada__imagen">
                    <img src="img/imagen_landing.png" alt="Estudiante trabajando con DOA">
                </div>

            </div>
        </section>

        <!-- =========================================
             FUNCIONALIDADES
             ========================================= -->
        <section class="funcionalidades seccion" id="funcionalidades" aria-label="Funcionalidades">
            <div class="contenedor">

                <div class="cabecera-seccion">
                    <h2>Funcionalidades</h2>
                    <div class="cabecera-seccion__linea"></div>
                </div>

                <div class="funcionalidades__cuadricula">

                    <!-- Tarjeta 1 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M24 10L6 20l18 10 18-10L24 10z"
                                  stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
                            <path d="M12 25v9c4 3 8 4 12 4s8-1 12-4v-9"
                                  stroke="currentColor" stroke-width="2.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="42" y1="20" x2="42" y2="30"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                        <h3>Tareas y trabajos de entrega online</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                    <!-- Tarjeta 2 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="7" y="11" width="34" height="30" rx="4"
                                  stroke="currentColor" stroke-width="2.5"/>
                            <line x1="7" y1="20" x2="41" y2="20"
                                  stroke="currentColor" stroke-width="2.5"/>
                            <line x1="16" y1="7" x2="16" y2="15"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="32" y1="7" x2="32" y2="15"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <rect x="14" y="26" width="6" height="5" rx="1" fill="currentColor"/>
                            <rect x="23" y="26" width="6" height="5" rx="1" fill="currentColor"/>
                        </svg>
                        <h3>Calendario actualizado interactivo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                    <!-- Tarjeta 3 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="24" cy="24" r="6"
                                    stroke="currentColor" stroke-width="2.5"/>
                            <path d="M24 8v4M24 36v4M8 24h4M36 24h4
                                     M12.7 12.7l2.8 2.8M32.5 32.5l2.8 2.8
                                     M35.3 12.7l-2.8 2.8M15.5 32.5l-2.8 2.8"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                        <h3>Personalización</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                    <!-- Tarjeta 4 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M24 10L6 20l18 10 18-10L24 10z"
                                  stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
                            <path d="M12 25v9c4 3 8 4 12 4s8-1 12-4v-9"
                                  stroke="currentColor" stroke-width="2.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="42" y1="20" x2="42" y2="30"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                        <h3>Tareas y trabajos de entrega online</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                    <!-- Tarjeta 5 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="7" y="11" width="34" height="30" rx="4"
                                  stroke="currentColor" stroke-width="2.5"/>
                            <line x1="7" y1="20" x2="41" y2="20"
                                  stroke="currentColor" stroke-width="2.5"/>
                            <line x1="16" y1="7" x2="16" y2="15"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="32" y1="7" x2="32" y2="15"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                            <rect x="14" y="26" width="6" height="5" rx="1" fill="currentColor"/>
                            <rect x="23" y="26" width="6" height="5" rx="1" fill="currentColor"/>
                        </svg>
                        <h3>Calendario actualizado interactivo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                    <!-- Tarjeta 6 -->
                    <article class="tarjeta-funcionalidad">
                        <svg class="tarjeta-funcionalidad__icono" viewBox="0 0 48 48"
                             fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="24" cy="24" r="6"
                                    stroke="currentColor" stroke-width="2.5"/>
                            <path d="M24 8v4M24 36v4M8 24h4M36 24h4
                                     M12.7 12.7l2.8 2.8M32.5 32.5l2.8 2.8
                                     M35.3 12.7l-2.8 2.8M15.5 32.5l-2.8 2.8"
                                  stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                        <h3>Personalización</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </article>

                </div>
            </div>
        </section>

        <!-- =========================================
             CTA BANNER
             ========================================= -->
        <section class="gti-cta-banner" aria-label="Contacto">
            <div class="contenedor gti-cta-banner__interior">
                <div>
                    <h2>¿Hablamos?</h2>
                    <p>
                        Cuéntanos tu proyecto y diseñamos juntos la solución perfecta
                        para tu negocio.
                    </p>
                </div>
                <a href="contacto_GTI.php" class="btn btn-principal">Contactar con GTI</a>
            </div>
        </section>

    </main>

    <!-- =========================================
         PIE DE PÁGINA
         ========================================= -->
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

