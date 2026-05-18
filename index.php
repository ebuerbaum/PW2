<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTI – Software a medida para tu negocio</title>
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
                            <li><a href="infoDoa_GTI.php">DOA</a></li>
                        </ul>
                    </li>
                    <li><a href="#testimonios">Testimonios</a></li>
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
                <a id="gti-btn-login" href="login_GTI.php?redirect=index.php" class="gti-btn-login">
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
                <li><a class="mobile-nav-link" href="#testimonios">Testimonios</a></li>
                <li><a class="mobile-nav-link" href="contacto_GTI.php">Contáctanos</a></li>
            </ul>
        </nav>

    </header>

    <main>

        <!-- =========================================
             HERO
             ========================================= -->
        <section class="gti-hero" aria-label="Inicio">
            <div class="contenedor gti-hero__interior">
                <h1 class="gti-hero__titulo">
                    Software que se adapta<br>
                    a <span class="gti-hero__destacado">tu negocio</span>
                </h1>
                <p class="gti-hero__descripcion">
                    Desarrollamos soluciones digitales modulares y escalables para empresas
                    que quieren crecer sin perder el control. Herramientas claras,
                    sin complicaciones técnicas, hechas para personas.
                </p>
                <div class="portada__botones portada__botones--centrados">
                    <a href="infoDoa_GTI.php" class="btn btn-principal">Descubrir DOA</a>
                    <a href="contacto_GTI.php" class="btn btn-contorno-blanco">Hablar con GTI</a>
                </div>
                <div class="gti-hero__stats">
                    <div class="gti-hero__stat">
                        <span class="gti-hero__stat-num">+20</span>
                        <span class="gti-hero__stat-label">Clientes satisfechos</span>
                    </div>
                    <div class="gti-hero__separador" aria-hidden="true"></div>
                    <div class="gti-hero__stat">
                        <span class="gti-hero__stat-num">+5.000</span>
                        <span class="gti-hero__stat-label">Usuarios activos</span>
                    </div>
                    <div class="gti-hero__separador" aria-hidden="true"></div>
                    <div class="gti-hero__stat">
                        <span class="gti-hero__stat-num">98%</span>
                        <span class="gti-hero__stat-label">Satisfacción</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================================
             SOBRE GTI
             ========================================= -->
        <section class="seccion funcionalidades" id="sobre-gti" aria-label="Sobre GTI">
            <div class="contenedor">

                <div class="cabecera-seccion">
                    <h2>¿Quiénes somos?</h2>
                    <div class="cabecera-seccion__linea"></div>
                </div>

                <div class="gti-sobre__interior">
                    <div class="gti-sobre__texto">
                        <p>
                            GTI es una empresa de desarrollo de software fundada con la misión de
                            construir herramientas digitales que realmente funcionan. Creemos que
                            la tecnología debe adaptarse a las personas, no al revés.
                        </p>
                        <p>
                            Nuestros productos nacen de la escucha activa de nuestros clientes.
                            Cada funcionalidad está diseñada para resolver un problema real,
                            con una interfaz clara y sin curva de aprendizaje.
                        </p>
                    </div>
                    <ul class="gti-sobre__lista">
                        <li>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M6 10l3 3 5-5" stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Implantación guiada en menos de una semana
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M6 10l3 3 5-5" stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Soporte técnico incluido en todos los planes
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M6 10l3 3 5-5" stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Módulos activables según las necesidades de tu proyecto
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M6 10l3 3 5-5" stroke="currentColor" stroke-width="1.8"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Actualizaciones continuas sin coste adicional
                        </li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- =========================================
             TESTIMONIOS
             ========================================= -->
        <section class="testimonios seccion" id="testimonios" aria-label="Testimonios">
            <div class="contenedor">

                <div class="cabecera-seccion">
                    <h2>Testimonios de nuestros clientes</h2>
                    <div class="cabecera-seccion__linea"></div>
                </div>

                <div class="testimonios__cuadricula">

                    <div class="tarjeta-testimonio">
                        <p class="tarjeta-testimonio__cita">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                            euismod bibendum laoreet. Proin gravida dolor sit amet lacus
                            accumsan et viverra justo commodo.
                        </p>
                        <div class="tarjeta-testimonio__autor">
                            <div class="avatar-autor" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"
                                          stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div>
                                <strong class="info-autor__nombre">Ana Martín</strong>
                                <span class="info-autor__cargo">Directora de Operaciones</span>
                                <span class="estrellas" aria-label="5 estrellas">★★★★★</span>
                            </div>
                        </div>
                    </div>

                    <div class="tarjeta-testimonio">
                        <p class="tarjeta-testimonio__cita">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                            euismod bibendum laoreet. Proin gravida dolor sit amet lacus
                            accumsan et viverra justo commodo.
                        </p>
                        <div class="tarjeta-testimonio__autor">
                            <div class="avatar-autor" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"
                                          stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div>
                                <strong class="info-autor__nombre">Pepe González</strong>
                                <span class="info-autor__cargo">CEO, TechStartup</span>
                                <span class="estrellas" aria-label="5 estrellas">★★★★★</span>
                            </div>
                        </div>
                    </div>

                    <div class="tarjeta-testimonio">
                        <p class="tarjeta-testimonio__cita">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
                            euismod bibendum laoreet. Proin gravida dolor sit amet lacus
                            accumsan et viverra justo commodo.
                        </p>
                        <div class="tarjeta-testimonio__autor">
                            <div class="avatar-autor" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8"/>
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"
                                          stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div>
                                <strong class="info-autor__nombre">Pedro Guerra</strong>
                                <span class="info-autor__cargo">Product Manager</span>
                                <span class="estrellas" aria-label="5 estrellas">★★★★★</span>
                            </div>
                        </div>
                    </div>

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

    <script src="js/auth-gti.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
