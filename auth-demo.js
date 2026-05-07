(function (global) {
    'use strict';

    // Usuarios de prueba (luego vendrá la base de datos).
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
        }
    ];

    var CLAVE = 'doa_sesion_demo';

    function setText(selector, texto) {
        var els = document.querySelectorAll(selector);
        for (var i = 0; i < els.length; i++) {
            els[i].textContent = texto;
        }
    }

    function each(nodeList, fn) {
        for (var i = 0; i < nodeList.length; i++) { fn(nodeList[i]); }
    }

    var AuthDemo = {

        getUsuario: function () {
            try { return JSON.parse(sessionStorage.getItem(CLAVE)); }
            catch (e) { return null; }
        },

        guardar: function (usuario) {
            sessionStorage.setItem(CLAVE, JSON.stringify(usuario));
        },

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

        cerrarSesion: function () {
            sessionStorage.removeItem(CLAVE);
            global.location.href = 'login_doa.html';
        },

        requireLogin: function () {
            if (!this.getUsuario()) {
                global.location.href = 'login_doa.html';
            }
        },

        requireRol: function (rolEsperado) {
            var u = this.getUsuario();
            if (!u || u.rol !== rolEsperado) {
                global.location.href = 'login_doa.html';
            }
        },

        // Hay páginas con clases en inglés y otras en español; cubrimos las dos.
        actualizarHeader: function () {
            var u = this.getUsuario();
            if (!u) return;

            setText('.rt-topbar__usuario-nombre', u.nombre);
            setText('.rt-perfil-popup__nombre',   u.nombre);
            setText('.rt-topbar__usuario-rol',     u.rolTexto);
            setText('.rt-perfil-popup__rol',       u.rolTexto);

            setText('.rt-barra-superior__usuario-nombre', u.nombre);
            setText('.rt-perfil-emergente__nombre',       u.nombre);
            setText('.rt-barra-superior__usuario-rol',    u.rolTexto);
            setText('.rt-perfil-emergente__rol',          u.rolTexto);
        },

        interceptarLogout: function () {
            var self = this;
            var selectores = [
                '.rt-sidebar__logout',
                '.rt-perfil-popup__logout',
                '.mobile-nav-link--login',
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

        // Opciones.rol = 'secretaria' | 'alumno' | …  Si no pasas rol, solo comprueba que haya sesión.
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
