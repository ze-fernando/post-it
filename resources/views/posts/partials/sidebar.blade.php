<aside class="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <i class="fas fa-sticky-note"></i>
        <span>Post-IT</span>
    </div>

    <!-- Perfil do Usuário -->
    <div class="user-profile">
        <div class="user-avatar">
            @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
            @else
                <div class="avatar-placeholder">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </div>
            @endif
        </div>
        <div class="user-info">
            <h3 class="user-name">{{ auth()->user()->name }}</h3>
            <span class="user-role">{{ auth()->user()->role ?? 'Membro' }}</span>
        </div>
    </div>

    <!-- Menu de Navegação -->
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                <a href="{{ route('posts.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Feed</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('posts.profile') ? 'active' : '' }}">
                <a href="{{ route('posts.profile') }}">
                    <i class="fas fa-user"></i>
                    <span>Perfil</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Botão Novo Post -->
    <button class="new-post-btn" onclick="openNewPostModal()">
        <i class="fas fa-plus"></i>
        <span>Novo Post</span>
    </button>

    <!-- Footer da Sidebar -->
    <div class="sidebar-footer">
        <div class="user-email">
            <i class="fas fa-envelope"></i>
            <span>{{ auth()->user()->email }}</span>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span>
            </button>
        </form>
    </div>
</aside>
