<!-- Modal Overlay -->
<div id="newPostModal" class="modal-overlay">
    <div class="modal-container">
        <!-- Cabeçalho do Modal -->
        <div class="modal-header">
            <h2>Criar Novo Post</h2>
            <button class="modal-close" onclick="closeNewPostModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Corpo do Modal -->
        <div class="modal-body">
            <form id="newPostForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Avatar do usuário -->
                <div class="post-author">
                    <div class="author-avatar">
                        @if(auth()->user()->profile_picture)
                            <img src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }}">
                        @else
                            <div class="avatar-placeholder small">
                                {{ substr(auth()->user()->name, 0, 2) }}
                            </div>
                        @endif
                    </div>
                    <div class="author-info">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>{{auth()->user()->username}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <input name="title" type="text" placeholder="Título" required>
                </div>
                <!-- Campo de texto -->
                <div class="form-group">
                    <textarea
                        name="content"
                        id="postContent"
                        rows="5"
                        placeholder="No que você está pensando?"
                        required
                    ></textarea>
                </div>

                <!-- Rodapé do Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeNewPostModal()">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Publicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
