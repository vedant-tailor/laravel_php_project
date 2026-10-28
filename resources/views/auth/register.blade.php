<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Register') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* General Body Styling */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8f6;
            background-image: url('https://imgs.search.brave.com/UZ-YUqtzvxjK8Ox5Ar5WYhU5TbccxT3tZN-afeOoDP0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMucGV4ZWxzLmNv/bS9waG90b3MvMzA0/OTEyMS9wZXhlbHMt/cGhvdG8tMzA0OTEy/MS5qcGVnP2F1dG89/Y29tcHJlc3MmY3M9/dGlueXNyZ2ImZHBy/PTEmdz01MDA');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 1rem;
            box-sizing: border-box;
        }

        /* Main Container */
        .register-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Form Section (Left Side) */
        .register-form-section {
            flex: 1;
            padding: 40px 50px;
            background-color: #fdfcf9;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-wrapper h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-wrapper .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* Input Fields & Groups */
        .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        .input-group label {
            display: block;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-group .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .input-group .form-control:focus {
            outline: none;
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        }

        /* Styling for Laravel's validation errors */
        .form-control.is-invalid { border-color: #dc3545; }
        .invalid-feedback-custom {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }
        
        /* Buttons and Links */
        .register-btn {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            background-color: #2d2d2d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .register-btn:hover { background-color: #444; }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        .login-link a { color: #333; text-decoration: underline; font-weight: 500; }

        /* Image Section (Right Side) */
        .register-image-section {
            flex: 1;
            /* --- THIS IS THE UPDATED LINE --- */
            background-image: url('https://imgs.search.brave.com/Er-gwql11DlCQWo0H8avT3jSUPRm4Npc2cEKJuKcDFU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ2/MDUwMzYyOS92ZWN0/b3IvM2QtZGlmZmVy/ZW50LWZ1cm5pdHVy/ZS1ob21lLXNldC1w/bGFzdGljaW5lLWNh/cnRvb24tc3R5bGUt/dmVjdG9yLmpwZz9z/PTYxMng2MTImdz0w/Jms9MjAmYz1PRUVy/Z1BuNjFpeUd6SVlr/SEdnZ2toeTBOdW1v/R1k3S0hXMFl0dUE1/S1BvPQ');
            background-size: cover;
            background-position: center;
            position: relative;
            display: none;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            /* --- Minor style update for better contrast --- */
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 20px;
            cursor: pointer;
            line-height: 30px;
            text-align: center;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
            .register-image-section { display: block; }
        }
        @media (max-width: 767px) {
            .register-container { flex-direction: column; width: 100%; max-width: 400px; min-height: auto; }
            .register-form-section { padding: 40px 30px; }
        }
    </style>
</head>
<body>
    <div class="register-container">
        {{-- Left Side: The Form --}}
        <div class="register-form-section">
            <div class="form-wrapper">
                <h2>Create Your Account</h2>
                <p class="subtitle">Get started by creating a new account.</p>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name Input --}}
                    <div class="input-group">
                        <label for="name">{{ __('Name') }} *</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback-custom" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    
                    {{-- Email Input --}}
                    <div class="input-group">
                        <label for="email">{{ __('Email Address') }} *</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback-custom" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Role Dropdown --}}
                    <div class="input-group">
                        <label for="role">{{ __('Register As') }} *</label>
                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback-custom" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Password Input --}}
                    <div class="input-group">
                        <label for="password">{{ __('Password') }} *</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback-custom" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Confirm Password Input --}}
                    <div class="input-group">
                        <label for="password-confirm">{{ __('Confirm Password') }} *</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    
                    <button type="submit" class="register-btn">
                        {{ __('Register') }}
                    </button>
                    
                    <p class="login-link">
                        Already have an account? <a href="{{ route('login') }}">Log In</a>
                    </p>
                </form>
            </div>
        </div>

        {{-- Right Side: The Image --}}
        <div class="register-image-section">
             <a href="{{ url('/') }}" class="close-btn" style="text-decoration: none;">&times;</a>
        </div>
    </div>
</body>
</html>