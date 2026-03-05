@extends('layouts.posts')

@section('title', 'Perfil')

@section('content')
    <div class="profile-container">
        <!-- Informações do Perfil -->
        <div class="profile-info">
            <div class="profile-details">
                <h1>{{ auth()->user()->name }}</h1>
                <div class="profile-stats">
                    <div class="stat-item">
                        <strong>{{ count($posts) ?? 0 }}</strong>
                        <span>Posts</span>
                    </div>
                </div>
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
                            <form action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-post">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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
