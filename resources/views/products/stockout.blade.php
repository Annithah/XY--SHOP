@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        /* Light mode colors - Orange theme */
        --primary-light: #f97316;
        --primary-dark-light: #ea580c;
        --danger-light: #ef4444;
        --danger-dark-light: #dc2626;
        --text-light: #1e293b;
        --text-secondary-light: #475569;
        --bg-light: #f8fafc;
        --card-bg-light: #ffffff;
        --card-border-light: #e2e8f0;
        --input-bg-light: #f1f5f9;
        
        /* Dark mode colors - Orange theme */
        --primary-dark: #fb923c;
        --primary-dark-dark: #f97316;
        --danger-dark: #f87171;
        --danger-dark-dark: #ef4444;
        --text-dark: #f8fafc;
        --text-secondary-dark: #cbd5e1;
        --bg-dark: #0f172a;
        --card-bg-dark: #1e293b;
        --card-border-dark: #334155;
        --input-bg-dark: #1e293b;
        
        /* Common variables */
        --primary: var(--primary-light);
        --primary-dark: var(--primary-dark-light);
        --danger: var(--danger-light);
        --danger-dark: var(--danger-dark-light);
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
        --danger: var(--danger-dark);
        --danger-dark: var(--danger-dark-dark);
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

    .stock-form-container {
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-form {
        background-color: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 500px;
        border: 1px solid var(--card-border);
        transition: all 0.3s ease;
    }

    .card-form:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-header h2 {
        color: var(--text);
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-header p {
        color: var(--text-secondary);
        font-size: 16px;
    }

    .product-name {
        color: white;
        font-weight: 600;
        background: var(--danger);
        padding: 8px 16px;
        border-radius: 8px;
        display: inline-block;
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: var(--text);
    }

    input {
        width: 100%;
        padding: 14px 16px;
        background-color: var(--input-bg);
        border: 1px solid var(--card-border);
        border-radius: 8px;
        font-size: 16px;
        color: var(--text);
        transition: all 0.3s ease;
    }

    input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.3);
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: var(--danger);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .submit-btn:hover {
        background: var(--danger-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: var(--text-secondary);
        text-decoration: none;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .back-link:hover {
        color: var(--primary);
    }

    .warning-message {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid rgba(239, 68, 68, 0.2);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .theme-toggle {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--card-bg);
        color: var(--text);
        border: 1px solid var(--card-border);
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .theme-toggle:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    @media (max-width: 600px) {
        .card-form {
            padding: 30px 20px;
        }
        
        .theme-toggle {
            top: 10px;
            right: 10px;
            padding: 6px 12px;
            font-size: 14px;
        }
    }
</style>

<div class="stock-form-container">
    <button id="themeToggle" class="theme-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
        </svg>
        <span>Dark Mode</span>
    </button>
    
    <div class="card-form">
        <div class="form-header">
            <h2>Inventory Removal</h2>
            <p>Remove stock for:</p>
            <div class="product-name">{{ $product->pname }}</div>
        </div>

        <div class="warning-message">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
            This action will permanently reduce inventory
        </div>

        <form method="POST" action="{{ route('products.stockout', $product->id) }}">
            @csrf
            
            <div class="form-group">
                <label for="quantity">Quantity to Remove</label>
                <input type="number" 
                       id="quantity" 
                       name="quantity" 
                       required 
                       min="1"
                       max="{{ $product->stock_quantity ?? '' }}"
                       placeholder="Enter quantity">
            </div>
            
            <button type="submit" class="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
                Confirm Removal
            </button>
            
            <a href="{{ url()->previous() }}" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Cancel and return
            </a>
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
</script>
@endsection