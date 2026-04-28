/* ===========================================================
   DOA - Página de Contacto
   Validación frontend + interacciones (Sprint 3)
   =========================================================== */

(function () {
    'use strict';

    /* ---------- 1. Mobile menu toggle ---------- */
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            const isOpen = hamburger.getAttribute('aria-expanded') === 'true';
            hamburger.setAttribute('aria-expanded', String(!isOpen));
            mobileMenu.hidden = isOpen;
        });

        // Close menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.setAttribute('aria-expanded', 'false');
                mobileMenu.hidden = true;
            });
        });

        // Close menu when resizing to desktop
        const mq = window.matchMedia('(min-width: 721px)');
        mq.addEventListener('change', e => {
            if (e.matches) {
                hamburger.setAttribute('aria-expanded', 'false');
                mobileMenu.hidden = true;
            }
        });
    }

    /* ---------- 2. Form validation ---------- */
    const form = document.getElementById('contact-form');
    if (!form) return;

    const fields = {
        nombre: {
            el: document.getElementById('nombre'),
            errorEl: document.getElementById('nombre-error'),
            validate: (v) => {
                if (!v.trim()) return 'El nombre es obligatorio.';
                if (v.trim().length < 2) return 'El nombre debe tener al menos 2 caracteres.';
                if (v.trim().length > 60) return 'El nombre no puede superar los 60 caracteres.';
                if (!/^[A-Za-zÀ-ÿ\u00f1\u00d1\s'-]+$/.test(v.trim())) {
                    return 'El nombre solo puede contener letras y espacios.';
                }
                return '';
            }
        },
        email: {
            el: document.getElementById('email'),
            errorEl: document.getElementById('email-error'),
            validate: (v) => {
                if (!v.trim()) return 'El email es obligatorio.';
                // Robust-ish email regex (RFC-5322 lite)
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
                if (!re.test(v.trim())) return 'Introduce un email válido (ej. nombre@dominio.com).';
                return '';
            }
        },
        centro: {
            el: document.getElementById('centro'),
            errorEl: document.getElementById('centro-error'),
            validate: (v) => {
                if (!v.trim()) return 'El centro educativo es obligatorio.';
                if (v.trim().length < 2) return 'Indica al menos 2 caracteres.';
                if (v.trim().length > 100) return 'No puede superar los 100 caracteres.';
                return '';
            }
        },
        mensaje: {
            el: document.getElementById('mensaje'),
            errorEl: document.getElementById('mensaje-error'),
            validate: (v) => {
                if (!v.trim()) return 'El mensaje es obligatorio.';
                if (v.trim().length < 10) return 'El mensaje debe tener al menos 10 caracteres.';
                if (v.trim().length > 1000) return 'El mensaje no puede superar los 1000 caracteres.';
                return '';
            }
        }
    };

    /**
     * Show error / valid state on a field.
     */
    function setFieldState(field, errorMsg) {
        const { el, errorEl } = field;
        if (errorMsg) {
            el.classList.add('is-invalid');
            el.classList.remove('is-valid');
            el.setAttribute('aria-invalid', 'true');
            errorEl.textContent = errorMsg;
        } else {
            el.classList.remove('is-invalid');
            // Only mark valid if user has typed something
            if (el.value.trim().length > 0) {
                el.classList.add('is-valid');
            } else {
                el.classList.remove('is-valid');
            }
            el.setAttribute('aria-invalid', 'false');
            errorEl.textContent = '';
        }
    }

    /**
     * Validate one field and update UI.
     */
    function validateField(name) {
        const field = fields[name];
        const errorMsg = field.validate(field.el.value);
        setFieldState(field, errorMsg);
        return errorMsg === '';
    }

    /**
     * Validate all fields. Returns true if everything is OK.
     */
    function validateAll() {
        let allValid = true;
        Object.keys(fields).forEach(name => {
            if (!validateField(name)) allValid = false;
        });
        return allValid;
    }

    /* ---------- 3. Live validation (on blur + on input after first error) ---------- */
    Object.keys(fields).forEach(name => {
        const field = fields[name];
        if (!field.el) return;

        // Validate on blur
        field.el.addEventListener('blur', () => validateField(name));

        // After the first invalid state, validate live on input to give immediate feedback
        field.el.addEventListener('input', () => {
            if (field.el.classList.contains('is-invalid')) {
                validateField(name);
            }
        });
    });

    /* ---------- 4. Character counter (mensaje) ---------- */
    const mensajeEl = fields.mensaje.el;
    const counterEl = document.getElementById('mensaje-count');
    const MAX_CHARS = 1000;

    function updateCounter() {
        const len = mensajeEl.value.length;
        counterEl.textContent = `${len} / ${MAX_CHARS}`;
        counterEl.classList.toggle('is-warning', len >= MAX_CHARS * 0.85 && len < MAX_CHARS);
        counterEl.classList.toggle('is-error', len >= MAX_CHARS);
    }

    if (mensajeEl && counterEl) {
        mensajeEl.addEventListener('input', updateCounter);
        updateCounter();
    }

    /* ---------- 5. Submit handling ---------- */
    const submitBtn = form.querySelector('.btn--submit');
    const feedbackEl = document.getElementById('form-feedback');

    function showFeedback(message, type) {
        feedbackEl.textContent = message;
        feedbackEl.className = `form-feedback form-feedback--${type}`;
        feedbackEl.hidden = false;
        // Auto-hide success after 6s
        if (type === 'success') {
            setTimeout(() => { feedbackEl.hidden = true; }, 6000);
        }
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        feedbackEl.hidden = true;

        const isValid = validateAll();
        if (!isValid) {
            // Focus first invalid field for accessibility
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) firstInvalid.focus();
            showFeedback('Por favor, corrige los errores antes de enviar.', 'error');
            return;
        }

        // Simulate submit (preparado para conectar al backend luego)
        submitBtn.classList.add('btn--loading');
        submitBtn.disabled = true;

        try {
            // ===== Punto de integración con backend =====
            // Cuando el endpoint esté listo, descomentar y ajustar:
            //
            // const formData = {
            //     nombre:  fields.nombre.el.value.trim(),
            //     email:   fields.email.el.value.trim(),
            //     centro:  fields.centro.el.value.trim(),
            //     mensaje: fields.mensaje.el.value.trim()
            // };
            // const response = await fetch('/api/contacto', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify(formData)
            // });
            // if (!response.ok) throw new Error('Error en el servidor');

            // Simulación de delay
            await new Promise(resolve => setTimeout(resolve, 900));

            showFeedback('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.', 'success');
            form.reset();
            // Clear validation styles
            Object.values(fields).forEach(({ el, errorEl }) => {
                el.classList.remove('is-valid', 'is-invalid');
                el.removeAttribute('aria-invalid');
                errorEl.textContent = '';
            });
            updateCounter();
        } catch (err) {
            console.error(err);
            showFeedback('Hubo un error al enviar el mensaje. Inténtalo de nuevo.', 'error');
        } finally {
            submitBtn.classList.remove('btn--loading');
            submitBtn.disabled = false;
        }
    });

})();