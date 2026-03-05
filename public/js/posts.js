// Controle do Modal
function openNewPostModal() {
    document.getElementById("newPostModal").classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeNewPostModal() {
    document.getElementById("newPostModal").classList.remove("active");
    document.body.style.overflow = "auto";
    resetModalForm();
}

function resetModalForm() {
    const form = document.getElementById("newPostForm");
    if (form) form.reset();
    document.getElementById("imagePreview").style.display = "none";
}

// Preview de imagem
document
    .getElementById("imageUpload")
    ?.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById("preview");
                preview.src = e.target.result;
                document.getElementById("imagePreview").style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });

function removePreview() {
    document.getElementById("imageUpload").value = "";
    document.getElementById("imagePreview").style.display = "none";
}

// Fechar modal com ESC
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        closeNewPostModal();
    }
});

// Fechar modal clicando fora
document
    .querySelector(".modal-overlay")
    ?.addEventListener("click", function (e) {
        if (e.target === this) {
            closeNewPostModal();
        }
    });

// Like animation
document.querySelectorAll(".like-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        const icon = this.querySelector("i");
        icon.classList.toggle("far");
        icon.classList.toggle("fas");
        if (icon.classList.contains("fas")) {
            this.style.color = "#ef4444";
        } else {
            this.style.color = "";
        }
    });
});

// Controle do Modal de Post
function openPostModal(postId) {
    const modal = document.getElementById("postModal");

    // Busca os dados do post clicado
    const postCard = event.currentTarget;

    // Coleta informações do post
    const postAuthor = postCard.querySelector(
        ".author-info strong",
    ).textContent;
    const postDate = postCard.querySelector(".author-info span").textContent;
    const postContent = postCard.querySelector(".post-content p").textContent;
    const postImage = postCard.querySelector(".post-image")?.src;
    const authorAvatar = postCard.querySelector(".author-avatar img")?.src;

    // Preenche o modal com as informações
    document.getElementById("modalAuthorName").textContent = postAuthor;
    document.getElementById("modalPostDate").textContent = postDate;
    document.getElementById("modalPostContent").textContent = postContent;

    // Atualiza o avatar
    const modalAvatar = document.getElementById("modalAuthorAvatar");
    if (authorAvatar) {
        modalAvatar.innerHTML = `<img src="${authorAvatar}" alt="${postAuthor}">`;
    } else {
        modalAvatar.innerHTML = `<div class="avatar-placeholder small">${postAuthor.substr(0, 2)}</div>`;
    }

    // Atualiza a imagem (se existir)
    const modalImageContainer = document.getElementById(
        "modalPostImageContainer",
    );
    if (postImage) {
        modalImageContainer.innerHTML = `<img src="${postImage}" alt="Post image" class="modal-post-image">`;
        modalImageContainer.style.display = "block";
    } else {
        modalImageContainer.style.display = "none";
    }

    // Abre o modal
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closePostModal() {
    const modal = document.getElementById("postModal");
    modal.classList.remove("active");
    document.body.style.overflow = "auto";
}

// Fechar modal com ESC
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        closePostModal();
    }
});

// Configurar eventos quando o DOM estiver carregado
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("postModal");

    // Fechar modal clicando no overlay (fundo escuro)
    if (modal) {
        modal.addEventListener("click", function (e) {
            if (e.target === this) {
                closePostModal();
            }
        });
    }

    // Adicionar evento de clique aos cards de post
    document.querySelectorAll(".post-card").forEach((card) => {
        card.addEventListener("click", function (e) {
            // Não abre o modal se clicou nos botões de ação
            if (e.target.closest(".action-btn")) {
                return;
            }

            // Passa o card clicado como referência
            openPostModal.call(this);
        });
    });
});
