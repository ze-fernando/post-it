@extends('layouts.posts')

@section('title', 'Perfil')

@section('content')
    <div class="profile-container">
        <!-- Informações do Perfil -->
        <div class="profile-info">
            <div class="profile-avatar-large">
                @if(auth()->user()->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                @else
                    <div class="avatar-placeholder large">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>
                @endif
            </div>

            <div class="profile-details">
                <h1>{{ auth()->user()->name }}</h1>
                <p class="profile-bio">{{ auth()->user()->bio ?? 'Sem bio ainda' }}</p>

                <div class="profile-stats">
                    <div class="stat-item">
                        <strong>{{ count($posts) ?? 0 }}</strong>
                        <span>Posts</span>
                    </div>
                </div>

                <button class="btn-edit-profile" onclick="editProfile()">
                    <i class="fas fa-edit"></i>
                    Editar Perfil
                </button>
            </div>
        </div>

        <!-- Posts do Usuário -->
        <div class="profile-posts">
            <h2>Meus Posts</h2>

            <div class="posts-grid">
                @forelse($posts ?? [] as $post)
                    <div class="profile-post-card">

                            <div class="post-text-preview">
                                <p>{{ Str::limit($post->content, 100) }}</p>
                            </div>
                        <div class="post-overlay">
                            <span>{{ $post->created_at->format('d/m/Y') }}</span>
                            <button class="delete-post" onclick="deletePost({{ $post->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="empty-posts">
                        <p>Você ainda não tem posts</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
