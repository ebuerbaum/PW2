/* =============================================
   AUTH-GTI.JS
   Sistema de autenticación de GTI (demo/simulado).
   Patrón idéntico a auth-demo.js para consistencia.

   Sesión activa  → sessionStorage, clave 'gti_sesion'
                    (se borra al cerrar la pestaña)
   Usuarios GTI   → localStorage, clave 'gti_usuarios'
                    (persisten entre visitas)
   ============================================= */
(function (global) {
    'use strict';

    /* Clave de la sesión activa */
    var CLAVE_SESION  = 'gti_sesion';
    /* Clave del registro de usuarios GTI */
    var CLAVE_USUARIOS = 'gti_usuarios';

    /* ---- Helpers ---- */

    /** Devuelve el array de usuarios GTI registrados (desde localStorage). */
    function cargarUsuarios() {
        try {
            return JSON.parse(localStorage.getItem(CLAVE_USUARIOS)) || [];
        } catch (e) {
            return [];
        }
    }

    /** Guarda el array de usuarios GTI en localStorage. */
    function guardarUsuarios(usuarios) {
        localStorage.setItem(CLAVE_USUARIOS, JSON.stringify(usuarios));
    }

    /* ---- API pública: objeto AuthGTI ---- */
    var AuthGTI = {

        /**
         * Devuelve el objeto del usuario GTI con sesión activa,
         * o null si no hay sesión.
         */
        getUsuario: function () {
            try {
                return JSON.parse(sessionStorage.getItem(CLAVE_SESION));
            } catch (e) {
                return null;
            }
        },

        /**
         * Guarda el usuario en sessionStorage como sesión activa.
         * @param {Object} usuario  Objeto con { nombre, email }
         */
        guardar: function (usuario) {
            sessionStorage.setItem(CLAVE_SESION, JSON.stringify(usuario));
        },

        /**
         * Valida email + contraseña contra los usuarios registrados.
         * Devuelve el objeto de usuario si coincide, o null.
         */
        validar: function (email, password) {
            var emailNorm = (email || '').toLowerCase().trim();
            var usuarios  = cargarUsuarios();
            for (var i = 0; i < usuarios.length; i++) {
                if (usuarios[i].email    === emailNorm &&
                    usuarios[i].password === password) {
                    return usuarios[i];
                }
            }
            return null;
        },

        /**
         * Registra un nuevo usuario GTI.
         * Devuelve { ok: true } o { ok: false, error: '…' }.
         */
        registrar: function (nombre, email, password) {
            /* --- Validaciones básicas --- */
            nombre   = (nombre   || '').trim();
            email    = (email    || '').toLowerCase().trim();
            password = password  || '';

            if (!nombre) {
                return { ok: false, error: 'El nombre no puede estar vacío.' };
            }

            /* Validación de email: formato mínimo usuario@dominio.ext */
            var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexEmail.test(email)) {
                return { ok: false, error: 'Introduce un correo electrónico válido (ej. nombre@institución.es).' };
            }

            if (password.length < 6) {
                return { ok: false, error: 'La contraseña debe tener al menos 6 caracteres.' };
            }

            /* Comprobar si el email ya está registrado */
            var usuarios = cargarUsuarios();
            for (var i = 0; i < usuarios.length; i++) {
                if (usuarios[i].email === email) {
                    return { ok: false, error: 'Este correo ya está registrado. Inicia sesión.' };
                }
            }

            /* Crear y guardar el nuevo usuario */
            var nuevoUsuario = { nombre: nombre, email: email, password: password };
            usuarios.push(nuevoUsuario);
            guardarUsuarios(usuarios);
            return { ok: true, usuario: nuevoUsuario };
        },

        /** Cierra la sesión GTI y redirige a la home de GTI. */
        cerrarSesion: function () {
            sessionStorage.removeItem(CLAVE_SESION);
            global.location.href = 'index.php';
        },

        /**
         * Redirige a la página de login de GTI si no hay sesión activa.
         * Pasa la URL actual como ?redirect= para volver después del login.
         */
        requireLogin: function () {
            if (!this.getUsuario()) {
                var redirect = encodeURIComponent(global.location.pathname.split('/').pop());
                global.location.href = 'login_GTI.php?redirect=' + redirect;
            }
        }
    };

    /* Exponer al ámbito global */
    global.AuthGTI = AuthGTI;

}(window));
