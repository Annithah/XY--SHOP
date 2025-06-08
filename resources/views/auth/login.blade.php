<x-guest-layout>
    <style>
        /* Base Styles */
        :root {
            --primary: #FF7B25;
            --primary-dark: #E56B1C;
            --text-light: #4A5568;
            --text-dark: #1A202C;
            --bg-light: #FFFFFF;
            --bg-dark: #1A1A1A;
            --card-light: #FFFFFF;
            --card-dark: #252525;
            --input-bg-light: #F8FAFC;
            --input-bg-dark: #2D2D2D;
            --border-light: #E2E8F0;
            --border-dark: #3D3D3D;
            --error-color: #E53E3E;
            --link-light: #718096;
            --link-dark: #A0AEC0;
        }

        /* Main Container Styles */
        .auth-container {
            max-width: 420px;
            margin: 0 auto;
            padding: 2rem;
            background-color: var(--card-light);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        body.dark-mode .auth-container {
            background-color: var(--card-dark);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Header Styles */
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        body.dark-mode .auth-title {
            color: white;
        }

        .auth-subtitle {
            color: var(--text-light);
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        body.dark-mode .auth-subtitle {
            color: var(--link-dark);
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-light);
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        body.dark-mode .form-label {
            color: var(--link-dark);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: var(--input-bg-light);
            color: var(--text-dark);
        }

        body.dark-mode .form-input {
            background-color: var(--input-bg-dark);
            border-color: var(--border-dark);
            color: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 123, 37, 0.1);
        }

        /* Checkbox Styles */
        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .remember-checkbox {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid var(--border-light);
            appearance: none;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
        }

        body.dark-mode .remember-checkbox {
            border-color: var(--border-dark);
            background-color: var(--input-bg-dark);
        }

        .remember-checkbox:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .remember-checkbox:checked::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .remember-label {
            margin-left: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
            transition: color 0.3s ease;
        }

        body.dark-mode .remember-label {
            color: var(--link-dark);
        }

        /* Error Message Styles */
        .error-message {
            margin-top: 0.5rem;
            color: var(--error-color);
            font-size: 0.85rem;
        }

        /* Button Styles */
        .auth-button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .auth-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .auth-button:active {
            transform: translateY(0);
        }

        /* Link Styles */
        .auth-link {
            color: var(--link-light);
            font-size: 0.9rem;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        body.dark-mode .auth-link {
            color: var(--link-dark);
        }

        .auth-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        /* Footer Styles */
        .auth-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-light);
            transition: border-color 0.3s ease;
        }

        body.dark-mode .auth-footer {
            border-top-color: var(--border-dark);
        }

        /* Dark Mode Toggle */
        .theme-toggle {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        body.dark-mode .theme-toggle {
            color: var(--link-dark);
        }

        .theme-toggle:hover {
            color: var(--primary);
        }

        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .auth-container {
                padding: 1.5rem;
                margin: 0 1rem;
            }
            
            .auth-title {
                font-size: 1.5rem;
            }

            .theme-toggle {
                top: 1rem;
                right: 1rem;
            }
        }
    </style>

    <button class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </button>

    <div class="auth-container">
        <div class="auth-header">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Sign in to your account</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4" style="color: var(--primary); text-align: center;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" class="remember-checkbox" name="remember">
                <label for="remember_me" class="remember-label">Remember me</label>
            </div>

            <button type="submit" class="auth-button">Log In</button>

            <div class="auth-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link">Forgot password?</a>
                @endif
                <a href="{{ route('register') }}" class="auth-link">Create account</a>
            </div>
        </form>
    </div>

    <script>
        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        const themeIcon = themeToggle.querySelector('i');

        // Check for saved theme preference or use preferred color scheme
        const savedTheme = localStorage.getItem('theme') || 
                         (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        
        // Apply the saved theme
        if (savedTheme === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        }

        // Toggle theme
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</x-guest-layout>