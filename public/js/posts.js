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
