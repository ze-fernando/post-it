@extends('layouts.posts')

@section('title', 'Feed')

@section('content')
    <div class="feed-container">
        <!-- Header do Feed -->
        <div class="feed-header">
            <h1>Feed</h1>
            <div class="feed-actions">
                <button class="btn-refresh" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>

        <!-- Lista de Posts -->
        <div class="posts-list">
            @forelse($posts ?? [] as $post)
                <div class="post-card">
                    <div class="post-header">
                        <div class="post-author">
                            <div class="author-avatar">
                                @if($post->user->avatar)
                                    <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}">
                                @else
                                    <div class="avatar-placeholder small">
                                        {{ substr($post->user->name, 0, 2) }}
                                    </div>
                                @endif
                            </div>
                            <div class="author-info">
                                <strong>{{ $post->user->name }}</strong>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>

                    <strong>{{ $post->title}}</strong>
                    <div class="post-content">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-sticky-note"></i>
                    <h3>Nenhum post ainda</h3>
                    <p>Seja o primeiro a postar algo!</p>
                    <button class="btn-primary" onclick="openNewPostModal()">
                        Criar Primeiro Post
                    </button>
                </div>
            @endforelse
        </div>
    </div>
    @include('posts.partials.view_post')
@endsection
