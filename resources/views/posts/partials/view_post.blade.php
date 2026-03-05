<!-- Modal de Visualização do Post -->
<div class="post-modal-overlay" id="postModal">
    <div class="post-modal-container">
        <div class="post-modal-header">
            <h2>
                <i class="fas fa-sticky-note"></i>
                Visualizar Post
            </h2>
            <button class="post-modal-close" onclick="closePostModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="post-modal-body">
            <div class="modal-post-author">
                <div class="modal-author-avatar" id="modalAuthorAvatar"></div>
                <div class="modal-author-info">
                    <strong id="modalAuthorName"></strong>
                    <span id="modalPostDate">
                        <i class="far fa-clock"></i>
                    </span>
                </div>
            </div>

            <div class="modal-post-content">
                <p id="modalPostContent"></p>
            </div>

            <div id="modalPostImageContainer"></div>

        </div>
    </div>
</div>
