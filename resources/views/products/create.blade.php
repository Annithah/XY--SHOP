@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --success: #2ecc71;
        --danger: #ff4757;
        --warning: #f39c12;
        --text: #ffffff;
        --text-light: rgba(255, 255, 255, 0.8);
    }

    .product-form-container {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .glass-form-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 50px;
        width: 100%;
        max-width: 600px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .glass-form-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        z-index: -1;
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        background: linear-gradient(to right, #fff, #e0e0e0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-header p {
        color: var(--text-light);
        font-size: 16px;
        max-width: 80%;
        margin: 0 auto;
    }

    .alert-notification {
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 30px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        animation: fadeIn 0.5s ease-out;
    }

    .alert-success {
        background: rgba(46, 213, 115, 0.25);
        color: white;
    }

    .alert-danger {
        background: rgba(255, 71, 87, 0.25);
        color: white;
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
        margin: 10px 0 0;
    }

    .alert-danger li {
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-danger li::before {
        content: '⚠️';
        margin-right: 8px;
    }

    .form-group {
        margin-bottom: 30px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 12px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.95);
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 16px 20px;
        background: rgba(255, 255, 255, 0.12);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        font-size: 16px;
        color: white;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
        font-weight: 300;
    }

    .form-control:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.3);
        transform: translateY(-1px);
    }

    .submit-btn {
        width: 100%;
        padding: 18px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 17px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .submit-btn svg {
        stroke: white;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .glass-form-card {
            padding: 40px 30px;
            border-radius: 16px;
        }

        .form-header h2 {
            font-size: 28px;
        }

        .form-header p {
            max-width: 100%;
        }
    }

    @media (max-width: 480px) {
        .glass-form-card {
            padding: 30px 20px;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-control {
            padding: 14px 16px;
        }

        .submit-btn {
            padding: 16px;
        }
    }
</style>

<div class="product-form-container">
    <div class="glass-form-card">
        <div class="form-header">
            <h2>Create New Product</h2>
            <p>Add a new product to your inventory management system</p>
        </div>

        @if(session('success'))
            <div class="alert-notification alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-notification alert-danger">
                <strong>Please fix these issues:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                <label for="quantity">Quantity</label>
                <input type="number" 
                       id="quantity" 
                       name="quantity" 
                       class="form-control" 
                       value="{{ old('quantity') }}" 
                       required 
                       placeholder="Enter quantity"
                       min="1"
                       autocomplete="off">
            </div>

            <button type="submit" class="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Add Product
            </button>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.form-group').forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateY(10px)';
        group.style.animation = `fadeInUp 0.5s ease-out forwards ${index * 0.1 + 0.3}s`;
    });

    const fadeStyle = document.createElement('style');
    fadeStyle.innerHTML = `
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(fadeStyle);
</script>
@endsection
