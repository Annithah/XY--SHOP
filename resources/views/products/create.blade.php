@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        /* Light mode colors */
        --primary-light: #f97316;
        --primary-dark-light: #ea580c;
        --success-light: #22c55e;
        --danger-light: #ef4444;
        --warning-light: #eab308;
        --text-light: #1e293b;
        --text-secondary-light: #64748b;
        --bg-light: #f8fafc;
        --card-bg-light: #ffffff;
        --card-border-light: #e2e8f0;
        --input-bg-light: #ffffff;
        
        /* Dark mode colors */
        --primary-dark: #fb923c;
        --primary-dark-dark: #f97316;
        --success-dark: #4ade80;
        --danger-dark: #f87171;
        --warning-dark: #facc15;
        --text-dark: #f8fafc;
        --text-secondary-dark: #94a3b8;
        --bg-dark: #0f172a;
        --card-bg-dark: #1e293b;
        --card-border-dark: #334155;
        --input-bg-dark: #1e293b;
        
        /* Current theme variables */
        --primary: var(--primary-light);
        --primary-dark: var(--primary-dark-light);
        --success: var(--success-light);
        --danger: var(--danger-light);
        --warning: var(--warning-light);
        --text: var(--text-light);
        --text-secondary: var(--text-secondary-light);
        --bg: var(--bg-light);
        --card-bg: var(--card-bg-light);
        --card-border: var(--card-border-light);
        --input-bg: var(--input-bg-light);
    }

    .dark-mode {
        --primary: var(--primary-dark);
        --primary-dark: var(--primary-dark-dark);
        --success: var(--success-dark);
        --danger: var(--danger-dark);
        --warning: var(--warning-dark);
        --text: var(--text-dark);
        --text-secondary: var(--text-secondary-dark);
        --bg: var(--bg-dark);
        --card-bg: var(--card-bg-dark);
        --card-border: var(--card-border-dark);
        --input-bg: var(--input-bg-dark);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg);
        color: var(--text);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .form-container {
        min-height: 100vh;
        padding: 2rem 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, rgba(249,115,22,0.1) 0%, rgba(249,115,22,0) 100%);
    }

    .card-form {
        background-color: var(--card-bg);
        border-radius: 1.25rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 3rem;
        width: 100%;
        max-width: 32rem;
        border: 1px solid var(--card-border);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .card-form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 0.25rem;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
    }

    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .form-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .form-header p {
        color: var(--text-secondary);
        font-size: 1rem;
        max-width: 80%;
        margin: 0 auto;
    }

    .alert-notification {
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
        text-align: center;
        border: 1px solid var(--card-border);
        animation: fadeIn 0.5s ease-out;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: var(--success);
        border-color: rgba(34, 197, 94, 0.2);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
        border-color: rgba(239, 68, 68, 0.2);
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
        margin: 0.75rem 0 0;
        text-align: left;
    }

    .alert-danger li {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .alert-danger li::before {
        content: '•';
        color: var(--danger);
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 500;
        color: var(--text);
        font-size: 0.9375rem;
    }

    .form-control {
        width: 100%;
        padding: 1rem 1.25rem;
        background-color: var(--input-bg);
        border: 1px solid var(--card-border);
        border-radius: 0.75rem;
        font-size: 1rem;
        color: var(--text);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .form-control::placeholder {
        color: var(--text-secondary);
        opacity: 0.6;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-top: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(249, 115, 22, 0.2);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .theme-toggle {
        position: fixed;
        top: 1.5rem;
        right: 1.5rem;
        background: var(--card-bg);
        color: var(--text);
        border: 1px solid var(--card-border);
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        z-index: 10;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .theme-toggle:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .card-form {
            padding: 2.5rem 1.5rem;
            border-radius: 1rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .card-form {
            padding: 2rem 1.25rem;
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .theme-toggle {
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
    }
</style>

<div class="form-container">
    <button id="themeToggle" class="theme-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
        </svg>
        <span>Dark Mode</span>
    </button>
    
    <div class="card-form">
        <div class="form-header">
            <h2>Create New Product</h2>
            <p>Add a new product to your inventory management system</p>
        </div>

        @if(session('success'))
            <div class="alert-notification alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-notification alert-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <div>
                    <strong>Please fix these issues:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" id="productForm">
            @csrf

            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="text" 
                       id="product_code" 
                       name="product_code" 
                       class="form-control" 
                       value="{{ old('product_code') }}" 
                       required 
                       placeholder="PRD-001"
                       autocomplete="off">
            </div>

            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" 
                       id="pname" 
                       name="pname" 
                       class="form-control" 
                       value="{{ old('pname') }}" 
                       required 
                       placeholder="Enter product name"
                       autocomplete="off">
            </div>

            <div class="form-group">
                <label for="quantity">Initial Quantity</label>
                <input type="number" 
                       id="quantity" 
                       name="quantity" 
                       class="form-control" 
                       value="{{ old('quantity') }}" 
                       required 
                       placeholder="Enter initial quantity"
                       min="0"
                       step="1"
                       autocomplete="off">
            </div>

            <button type="submit" class="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Create Product
            </button>
        </form>
    </div>
</div>

<script>
    // Dark mode toggle functionality
    const themeToggle = document.getElementById('themeToggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    // Check for saved theme preference or use system preference
    const currentTheme = localStorage.getItem('theme') || 
                        (prefersDarkScheme.matches ? 'dark' : 'light');
    
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggle.querySelector('span').textContent = 'Light Mode';
        themeToggle.querySelector('svg').innerHTML = `
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        `;
    }
    
    themeToggle.addEventListener('click', function() {
        const isDark = document.body.classList.toggle('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        
        if (isDark) {
            themeToggle.querySelector('span').textContent = 'Light Mode';
            themeToggle.querySelector('svg').innerHTML = `
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
            `;
        } else {
            themeToggle.querySelector('span').textContent = 'Dark Mode';
            themeToggle.querySelector('svg').innerHTML = `
                <circle cx="12" cy="12" r="5"></circle>
                <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
            `;
        }
    });

    // Form animation
    document.querySelectorAll('.form-group').forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateY(10px)';
        group.style.animation = `fadeInUp 0.5s ease-out forwards ${index * 0.1 + 0.3}s`;
    });

    // Add fadeInUp animation if not already present
    if (!document.getElementById('fadeInUpStyle')) {
        const fadeStyle = document.createElement('style');
        fadeStyle.id = 'fadeInUpStyle';
        fadeStyle.innerHTML = `
            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(fadeStyle);
    }
</script>
@endsection