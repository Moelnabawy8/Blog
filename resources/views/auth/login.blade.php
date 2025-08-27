@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center bg-light" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4 animate-fade" style="width: 420px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4 fw-bold text-primary">Welcome Back</h3>

            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                               class="form-control @error('email') is-invalid @enderror" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input id="password" type="password" name="password" 
                               class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary fw-semibold">
                            Forgot Password?
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                        Login
                    </button>
                </div>
            </form>

          

            <div class="text-center">
                <span class="text-muted">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-primary ms-1">
                    Register
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s forwards;
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .btn-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #224abe, #1a3a8b);
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
