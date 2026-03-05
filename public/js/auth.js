document.addEventListener("DOMContentLoaded", function () {
    const loginTab = document.querySelector('.auth-tab[data-form="login"]');
    const registerTab = document.querySelector(
        '.auth-tab[data-form="register"]',
    );
    const loginForm = document.querySelector(".sign-in-form");
    const registerForm = document.querySelector(".sign-up-form");

    // Função para trocar entre formulários
    function switchForm(formToShow) {
        // Atualiza as abas
        if (formToShow === "login") {
            loginTab.classList.add("active");
            registerTab.classList.remove("active");
            loginForm.classList.add("active");
            registerForm.classList.remove("active");
        } else {
            registerTab.classList.add("active");
            loginTab.classList.remove("active");
            registerForm.classList.add("active");
            loginForm.classList.remove("active");
        }
    }

    // Event listeners para as abas
    loginTab.addEventListener("click", () => switchForm("login"));
    registerTab.addEventListener("click", () => switchForm("register"));

    // Validação de email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Mostrar mensagens de feedback
    function showMessage(message, type) {
        const existingMessage = document.querySelector(".alert-message");
        if (existingMessage) {
            existingMessage.remove();
        }

        const messageDiv = document.createElement("div");
        messageDiv.className = `alert-message alert-${type}`;
        messageDiv.textContent = message;
        document.body.appendChild(messageDiv);

        setTimeout(() => {
            messageDiv.style.animation = "slideUp 0.3s ease";
            setTimeout(() => {
                messageDiv.remove();
            }, 300);
        }, 3000);
    }

    // Efeitos visuais nos inputs
    const inputs = document.querySelectorAll(".input-field input");
    inputs.forEach((input) => {
        input.addEventListener("focus", function () {
            this.parentElement.style.borderColor = "#2563eb";
            this.parentElement.style.boxShadow =
                "0 0 0 3px rgba(37, 99, 235, 0.1)";
        });

        input.addEventListener("blur", function () {
            this.parentElement.style.borderColor = "#404040";
            this.parentElement.style.boxShadow = "none";
        });
    });

    // Previne o envio ao pressionar Enter sem preenchimento
    inputs.forEach((input) => {
        input.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                const form = this.closest("form");
                const submitBtn = form.querySelector(".btn");
                submitBtn.click();
            }
        });
    });
});
