@extends('layouts.app')
@section('title', 'Edit Post')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg w-100" style="max-width: 650px;">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Post</h4>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body p-4">

            
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="bi bi-exclamation-circle"></i> Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('posts.update', $post) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-sm"
                           value="{{ old('title', $post->title) }}" placeholder="Enter post title..." required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    <textarea name="content" id="content" class="form-control shadow-sm"
                              rows="6" placeholder="Update your post content..." required>{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning w-100 py-2 shadow-sm fw-semibold">
                    <i class="bi bi-check-circle me-1"></i> Update Post
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection