/*
 * ╔══════════════════════════════════════════════════════════════════╗
 * ║              AUTH-DEMO.JS  –  v1.0                              ║
 * ║   Autenticación simulada para prototipo de presentación.        ║
 * ║                                                                 ║
 * ║  CÓMO ELIMINAR CUANDO SE IMPLEMENTE LA BD REAL:                ║
 * ║   1. Borrar este archivo  (auth-demo.js)                        ║
 * ║   2. En cada HTML, borrar la línea:                             ║
 * ║        <script src="auth-demo.js"></script>                     ║
 * ║      y el bloque marcado con [DEMO AUTH] que hay justo debajo.  ║
 * ║   3. En login_doa.html, restaurar la línea de redirección       ║
 * ║      original en el listener 'submit' (marcado con [DEMO AUTH]).║
 * ╚══════════════════════════════════════════════════════════════════╝
 */
(function (global) {
    'use strict';

    /* ── Usuarios de demo ───────────────────────────────────────────
       Cambiar o ampliar aquí para añadir más perfiles de prueba.    */
    var USUARIOS = [
        {
            email:    'alumno@correo.com',
            password: 'alumno123',
            nombre:   'Juan Hernández',
            rol:      'alumno',
            rolTexto: 'Estudiante',
            inicio:   'home_DOA.html'
        },
        {
            email:    'profesor@correo.com',
            password: 'profesor123',
            nombre:   'María García',
            rol:      'profesor',
            rolTexto: 'Profesora',
            inicio:   'home_DOA.html'
        },
        {
            email:    'secretaria@correo.com',
            password: 'secretaria123',
            nombre:   'Gloria Paz',
            rol:      'secretaria',
            rolTexto: 'Secretaría',
            inicio:   'gestion_usuarios_secretaria.html'
        },
        {
            email:    'l.simdre@epsg.upv.es',
            password: '9218611',
            nombre:   'Lief Simants Dredge',
            rol:      'alumno',
            rolTexto: 'Estudiante',
            inicio:   'home_DOA.html'
        },
        {
            email:    'm.kirkam@epsg.upv.es',
            password: '1320191',
            nombre:   'Merline Kirdsch Kampshell',
            rol:      'alumno',
            rolTexto: 'Estudiante',
            inicio:   'home_DOA.html'
        },
        {
            email:    'd.rawabc@epsg.upv.es',
            password: '9971924',
            nombre:   'Debora Rawstorne',
            rol:      'alumno',
            rolTexto: 'Estudiante',
            inicio:   'home_DOA.html'
        },
        {
            email:    'k.poumai@upv.es',
            password: '4525956',
            nombre:   'Kevan Pounds Mainston',
            rol:      'profesor',
            rolTexto: 'Profesor',
            inicio:   'home_DOA.html'
        },
        {
            email:    'l.prista@upv.es',
            password: '6055365',
            nombre:   'Luelle Pridmore Starsmeare',
            rol:      'profesor',
            rolTexto: 'Profesora',
            inicio:   'home_DOA.html'
        },
        {
            email:    'e.mermiz@upv.es',
            password: '6738133',
            nombre:   'Eolande Merriton Mizzi',
            rol:      'profesor',
            rolTexto: 'Profesora',
            inicio:   'home_DOA.html'
        },
        {
            email:    'o.breshe@upv.es',
            password: '1316390',
            nombre:   'Ondrea Brezlaw Sherwill',
            rol:      'secretaria',
            rolTexto: 'PAS',
            inicio:   'gestion_usuarios_secretaria.html'
        },
        {
            email:    'b.maltho@upv.es',
            password: '1970980',
            nombre:   'Brooke Malimoe Thomerson',
            rol:      'secretaria',
            rolTexto: 'PAS',
            inicio:   'gestion_usuarios_secretaria.html'
        }
    ];

    var CLAVE = 'doa_sesion_demo';

    /* ── Helpers privados ─────────────────────────────────────────── */

    /* Actualiza el textContent de todos los elementos que coincidan */
    function setText(selector, texto) {
        var els = document.querySelectorAll(selector);
        for (var i = 0; i < els.length; i++) {
            els[i].textContent = texto;
        }
    }

    /* Itera sobre un NodeList de forma segura (IE11+) */
    function each(nodeList, fn) {
        for (var i = 0; i < nodeList.length; i++) { fn(nodeList[i]); }
    }

    /* ── API pública: window.AuthDemo ─────────────────────────────── */
    var AuthDemo = {

        /**
         * Devuelve el objeto del usuario logueado (desde sessionStorage),
         * o null si no hay sesión activa.
         */
        getUsuario: function () {
            try { return JSON.parse(sessionStorage.getItem(CLAVE)); }
            catch (e) { return null; }
        },

        /**
         * Guarda el objeto de usuario en sessionStorage.
         * Llamar tras validar credenciales en el login.
         */
        guardar: function (usuario) {
            sessionStorage.setItem(CLAVE, JSON.stringify(usuario));
        },

        /**
         * Comprueba email + contraseña contra la lista de demo.
         * Devuelve el objeto usuario o null si no coincide.
         */
        validar: function (email, password) {
            var emailNorm = (email || '').toLowerCase().trim();
            for (var i = 0; i < USUARIOS.length; i++) {
                if (USUARIOS[i].email    === emailNorm &&
                    USUARIOS[i].password === password) {
                    return USUARIOS[i];
                }
            }
            return null;
        },

        /** Elimina la sesión y redirige al login. */
        cerrarSesion: function () {
            sessionStorage.removeItem(CLAVE);
            global.location.href = 'login_doa.html';
        },

        /** Redirige al login si no existe sesión activa. */
        requireLogin: function () {
            if (!this.getUsuario()) {
                global.location.href = 'login_doa.html';
            }
        },

        /**
         * Redirige al login si la sesión no corresponde al rol indicado.
         * Ej: AuthDemo.requireRol('alumno')
         */
        requireRol: function (rolEsperado) {
            var u = this.getUsuario();
            if (!u || u.rol !== rolEsperado) {
                global.location.href = 'login_doa.html';
            }
        },

        /**
         * Sustituye el nombre y rol estáticos del header con los datos
         * reales del usuario logueado. Compatible con el sistema de clases
         * inglés (rt-topbar / rt-perfil-popup) y el español
         * (rt-barra-superior / rt-perfil-emergente) usados en el proyecto.
         */
        actualizarHeader: function () {
            var u = this.getUsuario();
            if (!u) return;

            /* Sistema inglés – páginas alumno / profesor */
            setText('.rt-topbar__usuario-nombre', u.nombre);
            setText('.rt-perfil-popup__nombre',   u.nombre);
            setText('.rt-topbar__usuario-rol',     u.rolTexto);
            setText('.rt-perfil-popup__rol',       u.rolTexto);

            /* Sistema español – páginas secretaría */
            setText('.rt-barra-superior__usuario-nombre', u.nombre);
            setText('.rt-perfil-emergente__nombre',       u.nombre);
            setText('.rt-barra-superior__usuario-rol',    u.rolTexto);
            setText('.rt-perfil-emergente__rol',          u.rolTexto);
        },

        /**
         * Adjunta el handler cerrarSesion() a todos los enlaces de logout
         * para que limpien el sessionStorage antes de navegar.
         */
        interceptarLogout: function () {
            var self = this;
            var selectores = [
                /* Sistema inglés */
                '.rt-sidebar__logout',
                '.rt-perfil-popup__logout',
                '.mobile-nav-link--login',
                /* Sistema español */
                '.rt-barra-lateral__cerrar-sesion',
                '.rt-perfil-emergente__cerrar-sesion',
                '.enlace-nav-movil--sesion'
            ];
            selectores.forEach(function (sel) {
                each(document.querySelectorAll(sel), function (el) {
                    el.addEventListener('click', function (e) {
                        e.preventDefault();
                        self.cerrarSesion();
                    });
                });
            });
        },

        /**
         * Punto de entrada principal para cada página.
         * Comprueba la sesión, actualiza el header e intercepta el logout.
         *
         * Uso sin restricción de rol (alumno y profesor comparten home):
         *   AuthDemo.inicializar()
         *
         * Uso con restricción de rol:
         *   AuthDemo.inicializar({ rol: 'alumno' })
         *   AuthDemo.inicializar({ rol: 'profesor' })
         *   AuthDemo.inicializar({ rol: 'secretaria' })
         */
        inicializar: function (opciones) {
            opciones = opciones || {};
            if (opciones.rol) {
                this.requireRol(opciones.rol);
            } else {
                this.requireLogin();
            }
            this.actualizarHeader();
            this.interceptarLogout();
        }
    };

    global.AuthDemo = AuthDemo;

}(window));
