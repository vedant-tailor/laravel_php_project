@extends('layouts.app')

@section('content')
<div class="login-page-container">
    <div class="login-container">
        {{-- Left Side: The Form --}}
        <div class="login-form-section">
            <div class="form-wrapper">
                <h2>Log In To Your Account</h2>
                <p class="subtitle">Welcome back! Please enter your details.</p>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Login As Dropdown --}}
                    <div class="input-group">
                        <label for="login_as">{{ __('Login As') }} *</label>
                        <select id="login_as" class="form-control @error('login_as') is-invalid @enderror" name="login_as" required>
                            <option value="">Select Role</option>
                            <option value="user" {{ old('login_as') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('login_as') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('login_as')
                            <span class="invalid-feedback-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Email Input --}}
                    <div class="input-group">
                        <label for="email">{{ __('Email Address') }} *</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Password Input --}}
                    <div class="input-group">
                        <label for="password">{{ __('Password') }} *</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Remember Me & Forgot Password --}}
                    <div class="form-options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="forgot-password-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    
                    {{-- Login Button --}}
                    <button type="submit" class="login-btn">
                        {{ __('Login') }}
                    </button>

                    {{-- Optional: Sign up link --}}
                    @if (Route::has('register'))
                        <p class="signup-link">
                            Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                        </p>
                    @endif
                </form>
            </div>
        </div>

        {{-- Right Side: The Image --}}
        <div class="login-image-section">
            <button class="close-btn" onclick="window.location='{{ url('/') }}'">&times;</button>
        </div>
    </div>
</div>
@endsection