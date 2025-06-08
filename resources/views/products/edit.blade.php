@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --secondary: #6c757d;
        --danger: #ff4757;
        --text: #ffffff;
        --text-light: rgba(255, 255, 255, 0.8);
    }
    
    .products-container {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .glass-form-container {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 40px;
        width: 100%;
        max-width: 600px;
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
    
    .form-group {
        margin-bottom: 25px;
    }
    
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.9);
    }
    
    input {
        width: 100%;
        padding: 14px 16px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        font-size: 15px;
        color: white;
        transition: all 0.3s ease;
    }
    
    input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
    }
    
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        gap: 15px;
    }
    
    .submit-btn {
        flex: 1;
        padding: 14px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .cancel-btn {
        flex: 1;
        padding: 14px;
        background: rgba(255, 255, 255, 0.1);
        color: var(--text);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .cancel-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
    
    @media (max-width: 600px) {
        .glass-form-container {
            padding: 30px 20px;
        }
        
        .form-actions {
            flex-direction: column;
        }
    }
</style>

<div class="products-container">
    <div class="glass-form-container">
        <div class="form-header">
            <h2>Edit Product</h2>
            <p style="color: rgba(255, 255, 255, 0.8);">Update the product details below</p>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="text" id="product_code" name="product_code" value="{{ $product->product_code }}" required>
            </div>

            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" id="pname" name="pname" value="{{ $product->pname }}" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">Update Product</button>
                <a href="{{ route('products.index') }}" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection