@extends('layouts.app')

@section('title', 'Home')

@auth
    @section("navbar")
        @include("layouts.navbar")
    @endsection
@endauth

@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center">
    <div class="overlay"></div>
    <div class="container position-relative py-5">
        <h1 class="display-4 fw-bold animate-fade">Welcome to My Blog</h1>
        <p class="lead mb-4 animate-fade delay-1">Share your thoughts, explore amazing posts, and connect with the community.</p>
        
        @auth
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg shadow-lg px-4 animate-fade delay-2">
                <i class="bi bi-journal-text"></i> View Posts
            </a>
        @endauth
    </div>
</div>

<div class="container py-5">
    @guest
    <div class="row text-center g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 card-hover animate-fade delay-1">
                <div class="card-body p-4">
                    <i class="bi bi-pencil-square display-3 text-primary"></i>
                    <h5 class="card-title mt-3 fw-bold">Create Post</h5>
                    <p class="text-muted">Express your thoughts and ideas by creating a new blog post easily.</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-outline-primary w-100">Create</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 card-hover animate-fade delay-2">
                <div class="card-body p-4">
                    <i class="bi bi-journal-text display-3 text-success"></i>
                    <h5 class="card-title mt-3 fw-bold">Browse Posts</h5>
                    <p class="text-muted">Read interesting posts from other users and stay updated.</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-success w-100">Browse</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 card-hover animate-fade delay-3">
                <div class="card-body p-4">
                    <i class="bi bi-people display-3 text-info"></i>
                    <h5 class="card-title mt-3 fw-bold">Join Community</h5>
                    <p class="text-muted">Connect with people, share knowledge, and grow together.</p>
                    <a href="{{ url('/register') }}" class="btn btn-outline-info w-100">Join</a>
                </div>
            </div>
        </div>
    </div>
    @endguest
</div>

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        background: url('https://source.unsplash.com/1600x600/?blog,writing') center/cover no-repeat;
        height: 60vh;
        overflow: hidden;
    }
    .hero-section .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    /* Hover effect */
    .card-hover {
        transition: all 0.3s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.2);
    }

    /* Animations */
    .animate-fade {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s forwards;
    }
    .delay-1 { animation-delay: 0.3s; }
    .delay-2 { animation-delay: 0.6s; }
    .delay-3 { animation-delay: 0.9s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>