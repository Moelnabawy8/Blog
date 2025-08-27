@extends('layouts.app')
@section('title', 'Posts')
@auth
    @section("navbar")
        @include("layouts.navbar")
    @endsection
@endauth

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-journal-text me-2"></i> Posts
        </h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Create New Post
        </a>
    </div>

 
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($posts->count())
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $post->title }}</td>
                            <td class="text-muted text-center">{{ $post->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-info btn-sm me-1">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <span class="badge bg-secondary ms-2">
                                    <i class="bi bi-chat-dots"></i> {{ $post->comments->count() }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        <div class="mt-4 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <div class="text-center my-5">
            <div class="card border-0 shadow-sm p-5">
                <i class="bi bi-folder-x text-secondary" style="font-size: 3rem;"></i>
                <h4 class="mt-3 text-muted">No posts found</h4>
                <p class="text-muted">Start by creating a new post.</p>
                <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Add First Post
                </a>
            </div>
        </div>
    @endif
</div>
@endsection


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
