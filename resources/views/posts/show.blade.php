@extends('layouts.app')
@section('title', $post->title)
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
<div class="container py-5">

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Posts
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $post->title }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text fs-5">{{ $post->content }}</p>
            <div class="d-flex justify-content-between text-muted small mt-3">
                <span><i class="bi bi-person"></i> {{ $post->user->name }}</span>
                <span><i class="bi bi-calendar"></i> {{ $post->created_at->format('Y-m-d') }}</span>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h4 class="mb-3"><i class="bi bi-chat-dots"></i> Comments ({{ $post->comments->count() }})</h4>
        
        @forelse ($post->comments as $comment)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <p class="mb-1">{{ $comment->content }}</p>
                    <div class="text-muted small mb-2">
                        <i class="bi bi-person-circle"></i> {{ $comment->user->name }} | 
                        <i class="bi bi-clock"></i> {{ $comment->created_at->format('Y-m-d H:i') }}
                    </div>
                    
                    @if ($comment->user_id === auth()->id())
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Delete this comment?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-muted">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>

    
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3"><i class="bi bi-pencil"></i> Add Comment</h5>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control shadow-sm" rows="3" placeholder="Write your comment..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-send"></i> Post Comment
                </button>
            </form>
        </div>
    </div>

</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
