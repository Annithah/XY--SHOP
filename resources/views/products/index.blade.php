@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        /* Light mode colors - Orange theme */
        --primary-light: #f97316;
        --primary-dark-light: #ea580c;
        --danger-light: #ef4444;
        --success-light: #22c55e;
        --warning-light: #eab308;
        --text-light: #1e293b;
        --text-secondary-light: #475569;
        --bg-light: #f8fafc;
        --card-bg-light: #ffffff;
        --card-border-light: #e2e8f0;
        
        /* Dark mode colors - Orange theme */
        --primary-dark: #fb923c;
        --primary-dark-dark: #f97316;
        --danger-dark: #f87171;
        --success-dark: #4ade80;
        --warning-dark: #facc15;
        --text-dark: #f8fafc;
        --text-secondary-dark: #cbd5e1;
        --bg-dark: #0f172a;
        --card-bg-dark: #1e293b;
        --card-border-dark: #334155;
        
        /* Common variables */
        --primary: var(--primary-light);
        --primary-dark: var(--primary-dark-light);
        --danger: var(--danger-light);
        --success: var(--success-light);
        --warning: var(--warning-light);
        --text: var(--text-light);
        --text-secondary: var(--text-secondary-light);
        --bg: var(--bg-light);
        --card-bg: var(--card-bg-light);
        --card-border: var(--card-border-light);
    }

    .dark-mode {
        --primary: var(--primary-dark);
        --primary-dark: var(--primary-dark-dark);
        --danger: var(--danger-dark);
        --success: var(--success-dark);
        --warning: var(--warning-dark);
        --text: var(--text-dark);
        --text-secondary: var(--text-secondary-dark);
        --bg: var(--bg-dark);
        --card-bg: var(--card-bg-dark);
        --card-border: var(--card-border-dark);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg);
        color: var(--text);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dashboard-container {
        min-height: 100vh;
        padding: 40px 20px;
    }

    .card-container {
        background-color: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border: 1px solid var(--card-border);
        transition: all 0.3s ease;
    }

    .card-container:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .table-header h2 {
        color: var(--text);
        font-size: 28px;
        font-weight: 600;
        margin: 0;
    }

    .header-actions {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .add-product-btn {
        background: var(--primary);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .add-product-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .theme-toggle {
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
    }

    .theme-toggle:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .products-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        color: var(--text);
    }

    .products-table thead th {
        background: var(--primary);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 500;
        border: none;
    }

    .products-table thead th:first-child {
        border-top-left-radius: 8px;
    }

    .products-table thead th:last-child {
        border-top-right-radius: 8px;
    }

    .products-table tbody tr {
        transition: all 0.2s ease;
    }

    .products-table tbody tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .dark-mode .products-table tbody tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .products-table tbody tr:hover {
        background-color: rgba(249, 115, 22, 0.05);
    }

    .dark-mode .products-table tbody tr:hover {
        background-color: rgba(249, 115, 22, 0.1);
    }

    .products-table td {
        padding: 15px;
        border-bottom: 1px solid var(--card-border);
        color: var(--text-secondary);
    }

    .action-btns {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .action-btn {
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .edit-btn {
        background: rgba(249, 115, 22, 0.1);
        color: var(--primary);
        border: 1px solid rgba(249, 115, 22, 0.2);
    }

    .edit-btn:hover {
        background: rgba(249, 115, 22, 0.2);
    }

    .delete-form {
        display: inline;
    }

    .delete-btn {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
        border: 1px solid rgba(239, 68, 68, 0.2);
        cursor: pointer;
    }

    .delete-btn:hover {
        background: rgba(239, 68, 68, 0.2);
    }

    .stock-btn {
        background: rgba(34, 197, 94, 0.1);
        color: var(--success);
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .stock-btn:hover {
        background: rgba(34, 197, 94, 0.2);
    }

    .empty-row td {
        padding: 30px;
        text-align: center;
        color: var(--text-secondary);
    }

    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-in-stock {
        background: rgba(34, 197, 94, 0.1);
        color: var(--success);
    }

    .status-low-stock {
        background: rgba(234, 179, 8, 0.1);
        color: var(--warning);
    }

    .status-out-of-stock {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
    }

    @media (max-width: 768px) {
        .card-container {
            padding: 20px 15px;
        }

        .products-table thead th,
        .products-table td {
            padding: 10px 8px;
            font-size: 14px;
        }

        .header-actions {
            width: 100%;
            justify-content: space-between;
        }
    }

    @media (max-width: 576px) {
        .action-btns {
            flex-direction: column;
            gap: 5px;
        }
        
        .action-btn {
            width: 100%;
            text-align: center;
            justify-content: center;
        }
    }
</style>

<div class="dashboard-container">
    <div class="card-container">
        <div class="table-header">
            <h2>XY Shop Inventory</h2>
            <div class="header-actions">
                <button id="themeToggle" class="theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"></path>
                    </svg>
                    <span>Dark Mode</span>
                </button>
                <a href="{{ route('products.create') }}" class="add-product-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Add Product
                </a>
            </div>
        </div>

        <table class="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Code</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->pname }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            @if($product->quantity > 20)
                                <span class="status-badge status-in-stock">In Stock</span>
                            @elseif($product->quantity > 0)
                                <span class="status-badge status-low-stock">Low Stock</span>
                            @else
                                <span class="status-badge status-out-of-stock">Out of Stock</span>
                            @endif
                        </td>
                        <td>{{ $product->created_at ? $product->created_at->format('M d, Y') : 'N/A' }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('products.edit', $product->id) }}" class="action-btn edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>

                                <a href="{{ route('products.stockin', $product->id) }}" class="action-btn stock-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                    Stock In
                                </a>
                                <a href="{{ route('products.stockout', $product->id) }}" class="action-btn stock-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 19l-7-7 7-7"></path>
                                    </svg>
                                    Stock Out
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-row">No products available. Add your first product to get started!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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