<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios | DOA</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="rt-body">

    <!-- Barra superior -->
    <header class="rt-barra-superior">
        <a href="home_DOA.php" class="rt-barra-superior__logo-movil" aria-label="DOA – Inicio">
            <img src="img/logoPrincipal_monocromatico.png" alt="DOA – Gestión Educativa Inteligente"
                style="height: 48px; width: auto;">
        </a>

        <div class="rt-barra-superior__relleno" aria-hidden="true"></div>

        <div class="rt-barra-superior__acciones">
            <button class="rt-barra-superior__boton-icono" aria-label="Notificaciones">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.73 21a2 2 0 01-3.46 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <button class="rt-barra-superior__boton-icono" aria-label="Ayuda">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                    <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <line x1="12" y1="17" x2="12.01" y2="17" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" />
                </svg>
            </button>
            <div class="rt-perfil-contenedor">
                <button class="rt-barra-superior__usuario" id="rt-perfil-boton" aria-expanded="false"
                    aria-controls="rt-perfil-emergente">
                    <div class="rt-barra-superior__usuario-informacion">
                        <span class="rt-barra-superior__usuario-nombre">Gloria Paz</span>
                        <span class="rt-barra-superior__usuario-rol" style="text-transform: uppercase;">Secretaría</span>
                    </div>
                    <div class="rt-barra-superior__avatar" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke-linecap="round" />
                        </svg>
                    </div>
                </button>
                <div class="rt-perfil-emergente" id="rt-perfil-emergente" hidden>
                    <div class="rt-perfil-emergente__cabecera">
                        <div class="rt-perfil-emergente__avatar-grande">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="rt-perfil-emergente__nombre">Gloria Paz</p>
                            <p class="rt-perfil-emergente__rol">Secretaría</p>
                        </div>
                    </div>
                    <a href="recuperar-contrasena.php" class="rt-perfil-emergente__cambiar">Cambiar contraseña</a>
                    <a href="login_doa.php" class="rt-perfil-emergente__cerrar-sesion">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <polyline points="16 17 21 12 16 7" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        CERRAR SESIÓN
                    </a>
                </div>
            </div>
        </div>

        <button class="hamburguesa rt-hamburguesa" id="rt-hamburguesa" aria-label="Abrir menú" aria-expanded="false"
            aria-controls="rt-menu-movil">
            <span class="linea-hamburguesa"></span>
            <span class="linea-hamburguesa"></span>
            <span class="linea-hamburguesa"></span>
        </button>
    </header>

    <!-- MENÚ MÓVIL -->
    <div id="rt-menu-movil" class="menu-movil rt-menu-movil" hidden>
        <ul class="lista-nav-movil">
            <li><a href="crearAsignaturas_secretaria.php" class="enlace-nav-movil">Clases</a></li>
            <li><a href="gestion_usuarios_secretaria.php" class="enlace-nav-movil enlace-nav-movil--activo"
                    aria-current="page">Gestión de usuarios</a></li>
            <li><a href="#" class="enlace-nav-movil">Comunicados</a></li>
            <li><a href="login_doa.php" class="enlace-nav-movil enlace-nav-movil--sesion">Logout</a></li>
        </ul>
    </div>

    <!-- Contenedor: sidebar + contenido -->
    <div class="rt-contenedor-pagina">

        <!-- BARRA LATERAL -->
        <aside class="rt-barra-lateral" id="rt-barra-lateral" aria-label="Menú lateral">
            <nav class="rt-barra-lateral__navegacion" aria-label="Secciones del aula">
                <ul class="rt-barra-lateral__menu">
                    <li>
                        <a href="crearAsignaturas_secretaria.php" class="rt-barra-lateral__enlace">
                            <svg class="rt-barra-lateral__icono" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor"
                                    stroke-width="2" />
                                <path d="M7 8h10M7 12h6" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Clases
                        </a>
                    </li>
                    <li>
                        <a href="gestion_usuarios_secretaria.php" class="rt-barra-lateral__enlace rt-barra-lateral__enlace--activo"
                            aria-current="page">
                            <svg class="rt-barra-lateral__icono" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Gestión de usuarios
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rt-barra-lateral__enlace">
                            <svg class="rt-barra-lateral__icono" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Comunicados
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="rt-barra-lateral__pie">
                <a href="login_doa.php" class="rt-barra-lateral__cerrar-sesion">
                    <svg class="rt-barra-lateral__icono" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <polyline points="16 17 21 12 16 7" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    Cerrar sesión
                </a>
            </div>
        </aside>

        <!-- ÁREA PRINCIPAL -->
        <div class="rt-contenedor-principal">
            <main class="gu-contenido">
                <div class="gu-cabecera">
                    <h1 class="gu-titulo">Gestión de usuarios</h1>
                </div>

                <div class="gu-distribucion" id="gu-distribucion">

                    <!-- Columna Izquierda: Buscador y Lista -->
                    <div class="gu-lista-columna" id="gu-lista-columna">
                        <div class="gu-busqueda">
                            <svg class="gu-busqueda-icono" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="11" cy="11" r="8" />
                                <path d="M21 21l-4.35-4.35" stroke-linecap="round" />
                            </svg>
                            <input type="text" placeholder="BUSCA POR NOMBRE O DNI" class="gu-busqueda-entrada">
                        </div>

                        <div class="gu-lista">
                            <!-- Usuario 1 -->
                            <div class="gu-elemento">
                                <div class="gu-elemento-avatar"></div>
                                <div class="gu-elemento-informacion">
                                    <div class="gu-elemento-nombre">Juan Hernandez</div>
                                    <div class="gu-elemento-dni-rol">
                                        <span class="gu-elemento-dni">45123455R</span>
                                        <span class="gu-etiqueta gu-etiqueta-alumno">Alumno</span>
                                    </div>
                                </div>
                                <button class="gu-boton-editar" style="background-color: #ef4444; color: white;" aria-label="Eliminar Juan Hernandez" onclick="this.closest('.gu-elemento').remove();">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Usuario 2 -->
                            <div class="gu-elemento">
                                <div class="gu-elemento-avatar"></div>
                                <div class="gu-elemento-informacion">
                                    <div class="gu-elemento-nombre">Maria Garcia</div>
                                    <div class="gu-elemento-dni-rol">
                                        <span class="gu-elemento-dni">78541236F</span>
                                        <span class="gu-etiqueta gu-etiqueta-profesor">Profesor</span>
                                    </div>
                                </div>
                                <button class="gu-boton-editar" style="background-color: #ef4444; color: white;" aria-label="Eliminar Maria Garcia" onclick="this.closest('.gu-elemento').remove();">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1-2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Usuario 3 -->
                            <div class="gu-elemento">
                                <div class="gu-elemento-avatar"></div>
                                <div class="gu-elemento-informacion">
                                    <div class="gu-elemento-nombre">Carlos Martinez</div>
                                    <div class="gu-elemento-dni-rol">
                                        <span class="gu-elemento-dni">12457896X</span>
                                        <span class="gu-etiqueta gu-etiqueta-alumno">Alumno</span>
                                    </div>
                                </div>
                                <button class="gu-boton-editar" style="background-color: #ef4444; color: white;" aria-label="Eliminar Carlos Martinez" onclick="this.closest('.gu-elemento').remove();">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1-2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Usuario 4 -->
                            <div class="gu-elemento">
                                <div class="gu-elemento-avatar"></div>
                                <div class="gu-elemento-informacion">
                                    <div class="gu-elemento-nombre">David Ruiz</div>
                                    <div class="gu-elemento-dni-rol">
                                        <span class="gu-elemento-dni">98765432Z</span>
                                        <span class="gu-etiqueta gu-etiqueta-administrador">Admin</span>
                                    </div>
                                </div>
                                <button class="gu-boton-editar" style="background-color: #ef4444; color: white;" aria-label="Eliminar David Ruiz" onclick="this.closest('.gu-elemento').remove();">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1-2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="gu-detalles-columna activo-movil" id="gu-detalles-columna">
                        <div class="gu-detalles-cabecera-movil">
                            <button class="gu-boton-volver" onclick="cerrarDetalles()">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 12H5"></path>
                                    <path d="M12 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <h2 class="gu-detalles-titulo-movil" id="gu-titulo-movil">Añadir nuevo usuario</h2>
                        </div>

                        <div class="gu-detalles-tarjeta creando" id="gu-detalles-tarjeta">
                            <h2 class="gu-detalles-titulo-escritorio">Añadir nuevo usuario</h2>

                            <div class="gu-detalles-campos-crear" id="gu-campos-crear">
                                <label class="gu-etiqueta-campo">NOMBRE</label>
                                <input type="text" class="gu-entrada" id="gu-entrada-nombre" placeholder="Nombre">
                                <label class="gu-etiqueta-campo">DNI</label>
                                <input type="text" class="gu-entrada" id="gu-entrada-dni" placeholder="DNI">
                            </div>

                            <label class="gu-etiqueta-campo">ASIGNACIÓN DE ROL:</label>
                            <div class="gu-selector-contenedor">
                                <select class="gu-selector" id="gu-selector-rol">
                                    <option value="Alumno">Alumno</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                <svg class="gu-select-icono" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <label class="gu-etiqueta-campo" id="gu-etiqueta-notas">NOTAS ADMINISTRATIVAS</label>
                            <textarea class="gu-area-texto" id="gu-area-notas"
                                placeholder="Escribe notas aquí..."></textarea>

                            <button class="gu-boton-guardar" id="gu-boton-guardar">Añadir usuario</button>
                        </div>
                    </div>
                </div>

            </main>

            <footer class="pie-pagina rt-pie">
                <div class="contenedor pie-pagina__interior">
                    <a href="index.php" class="pie-pagina__logo">
                        <img src="img/logoPrincipal_monocromatico.png" alt="Logo DOA">
                    </a>
                    <p class="pie-pagina__derechos">Todos los derechos reservados 2026&copy;</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // En pantallas pequeñas cierra el overlay del detalle.
        function cerrarDetalles() {
            document.getElementById('gu-detalles-columna').classList.remove('activo-movil');
            document.getElementById('gu-lista-columna').classList.remove('oculto-movil');
        }

        var hamburguesa = document.getElementById('rt-hamburguesa');
        var menuMovil   = document.getElementById('rt-menu-movil');

        if (hamburguesa && menuMovil) {
            hamburguesa.addEventListener('click', function () {
                var abierto = !menuMovil.hidden;
                menuMovil.hidden = abierto;
                hamburguesa.setAttribute('aria-expanded', String(!abierto));
            });
            menuMovil.querySelectorAll('a').forEach(function (a) {
                a.addEventListener('click', function () {
                    menuMovil.hidden = true;
                    hamburguesa.setAttribute('aria-expanded', 'false');
                });
            });
        }

        var perfilBoton    = document.getElementById('rt-perfil-boton');
        var perfilEmergente = document.getElementById('rt-perfil-emergente');

        if (perfilBoton && perfilEmergente) {
            perfilBoton.addEventListener('click', function (e) {
                e.stopPropagation();
                var abierto = !perfilEmergente.hidden;
                perfilEmergente.hidden = abierto;
                perfilBoton.setAttribute('aria-expanded', String(!abierto));
            });
            document.addEventListener('click', function () {
                perfilEmergente.hidden = true;
                perfilBoton.setAttribute('aria-expanded', 'false');
            });
            perfilEmergente.addEventListener('click', function (e) { e.stopPropagation(); });
        }
    </script>

    <!-- auth-demo: quitar cuando haya login real -->
    <script src="js/auth-demo.js"></script>
    <script>AuthDemo.inicializar({ rol: 'secretaria' });</script>

</body>

</html>
