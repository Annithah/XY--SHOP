@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --success: #2ecc71;
        --text: #ffffff;
        --text-light: rgba(255, 255, 255, 0.8);
    }
    
    .stockin-container {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .glass-stockin-form {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.18);
        padding: 40px;
        width: 100%;
        max-width: 500px;
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
        color: var(--text-light);
        font-size: 16px;
    }
    
    .product-name {
        color: var(--text);
        font-weight: 600;
        background: rgba(67, 97, 238, 0.3);
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
        color: rgba(255, 255, 255, 0.9);
    }
    
    input {
        width: 100%;
        padding: 14px 16px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        font-size: 16px;
        color: white;
        transition: all 0.3s ease;
    }
    
    input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.3);
    }
    
    .submit-btn {
        width: 100%;
        padding: 14px;
        background: var(--success);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    
    .submit-btn:hover {
        background: #27ae60;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: var(--text-light);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .back-link:hover {
        color: var(--text);
    }
    
    @media (max-width: 600px) {
        .glass-stockin-form {
            padding: 30px 20px;
        }
    }
</style>

<div class="stockin-container">
    <div class="glass-stockin-form">
        <div class="form-header">
            <h2>Stock Management</h2>
            <p>Add inventory for:</p>
            <div class="product-name">{{ $product->pname }}</div>
        </div>

        <form method="POST" action="{{ route('products.stockin', $product->id) }}">
            @csrf
            
            <div class="form-group">
                <label for="quantity">Quantity to Add</label>
                <input type="number" 
                       id="quantity" 
                       name="quantity" 
                       required 
                       min="1"
                       placeholder="Enter quantity">
            </div>
            
            <button type="submit" class="submit-btn">
                Add to Inventory
            </button>
            
            <a href="{{ url()->previous() }}" class="back-link">
                ← Return to previous page
            </a>
        </form>
    </div>
</div>
@endsection