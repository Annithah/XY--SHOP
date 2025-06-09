<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XYShop - Premium Clothing & Shoes</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #FF7B25; /* Vibrant orange */
            --primary-dark: #E56B1C;
            --secondary: #6c757d;
            --light: #f8f9fa;
            --dark: #212529;
            --text-light: #6c757d;
            --bg-light: #ffffff;
            --bg-dark: #1a1a1a;
            --card-light: #ffffff;
            --card-dark: #252525;
            --text-dark: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body.dark-mode {
            background-color: var(--bg-dark);
            color: var(--text-dark);
        }

        /* Navigation */
        nav {
            background-color: var(--bg-light);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1.5rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        body.dark-mode nav {
            background-color: var(--card-dark);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        body.dark-mode .nav-links a {
            color: var(--text-dark);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .auth-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .auth-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .login-btn {
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .login-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        .register-btn {
            background-color: var(--primary);
            color: white;
        }

        .register-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 123, 37, 0.3);
        }

        /* Dark Mode Toggle */
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            background-color: rgba(255, 123, 37, 0.1);
            border: none;
            color: var(--dark);
        }

        body.dark-mode .theme-toggle {
            color: var(--text-dark);
        }

        .theme-toggle i {
            font-size: 1.2rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover;
            color: white;
            text-align: center;
            padding: 8rem 2rem;
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 123, 37, 0.3);
        }

        .cta-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 123, 37, 0.4);
        }

        /* Categories Section */
        .categories {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .category-scroll-container {
            position: relative;
            margin-top: 2rem;
        }

        .category-scroll {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 1rem;
            padding: 1rem 0;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Firefox */
        }

        .category-scroll::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }

        .category-card {
            min-width: 200px;
            height: 250px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
            transition: transform 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 1rem;
            color: white;
            text-align: left;
        }

        .category-overlay h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .category-overlay p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .scroll-btn:hover {
            opacity: 1;
        }

        .scroll-left {
            left: -20px;
        }

        .scroll-right {
            right: -20px;
        }

        /* Products Section */
        .products {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        body.dark-mode .section-title h2 {
            color: var(--text-dark);
        }

        .section-title p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background-color: var(--card-light);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            position: relative;
        }

        body.dark-mode .product-card {
            background-color: var(--card-dark);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 123, 37, 0.1);
        }

        body.dark-mode .product-card:hover {
            box-shadow: 0 10px 25px rgba(255, 123, 37, 0.2);
        }

        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }

        .product-img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-card:hover .product-img {
            transform: scale(1.03);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        body.dark-mode .product-info h3 {
            color: var(--text-dark);
        }

        .product-info p {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .product-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .add-to-cart {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .add-to-cart:hover {
            background-color: var(--primary-dark);
        }

        /* Features Section */
        .features {
            background-color: var(--light);
            padding: 5rem 2rem;
        }

        body.dark-mode .features {
            background-color: #252525;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            background-color: var(--card-light);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        body.dark-mode .feature-card {
            background-color: var(--card-dark);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        body.dark-mode .feature-card h3 {
            color: var(--text-dark);
        }

        .feature-card p {
            color: var(--text-light);
        }

        /* Newsletter Section */
        .newsletter {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                        url('https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover;
            color: white;
            padding: 5rem 2rem;
            text-align: center;
        }

        .newsletter-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
        }

        .newsletter p {
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
        }

        .newsletter-btn {
            padding: 0 1.5rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0 50px 50px 0;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .newsletter-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 2rem;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 0.8rem;
        }

        .footer-col ul li a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #adb5bd;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .auth-btn {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-input {
                border-radius: 50px;
                margin-bottom: 0.5rem;
            }

            .newsletter-btn {
                border-radius: 50px;
                padding: 1rem;
            }

            .scroll-btn {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }

            .scroll-left {
                left: -15px;
            }

            .scroll-right {
                right: -15px;
            }
        }

        @media (max-width: 576px) {
            nav {
                padding: 1rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .hero {
                padding: 4rem 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .auth-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .theme-toggle {
                padding: 0.3rem 0.8rem;
                font-size: 0.8rem;
            }

            .product-img {
                height: 250px;
            }

            .category-card {
                min-width: 160px;
                height: 200px;
            }
        }
    </style>
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-tshirt"></i>
                XYShop
            </a>
            <div class="nav-links">
                <a href="#categories">Categories</a>
                <a href="#products">Products</a>
                <a href="#features">Why Us</a>
                <a href="#contact">Contact</a>
                
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-moon"></i>
                    <span>Dark Mode</span>
                </button>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-btn login-btn">Dashboard</a>
                    @else
                        <div class="auth-links">
                            <a href="{{ route('login') }}" class="auth-btn login-btn">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="auth-btn register-btn">Register</a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Stylish Clothing & Shoes for Everyone</h1>
            <p>Discover the latest fashion trends in Rwanda with our premium collection of clothing and footwear at unbeatable prices.</p>
            <a href="#products" class="cta-btn">Shop Now</a>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <div class="section-title">
            <h2>Shop by Category</h2>
            <p>Browse through our wide selection of fashion items</p>
        </div>
        <div class="category-scroll-container">
            <button class="scroll-btn scroll-left" id="scrollLeft">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="category-scroll" id="categoryScroll">
                <div class="category-card" data-category="all">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="All Products" class="category-img">
                    <div class="category-overlay">
                        <h3>All Products</h3>
                        <p>View our complete collection</p>
                    </div>
                </div>
                <div class="category-card" data-category="men">
                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Men's Clothing" class="category-img">
                    <div class="category-overlay">
                        <h3>Men's Clothing</h3>
                        <p>Trendy outfits for men</p>
                    </div>
                </div>
                <div class="category-card" data-category="women">
                    <img src="https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Clothing" class="category-img">
                    <div class="category-overlay">
                        <h3>Women's Clothing</h3>
                        <p>Elegant dresses & more</p>
                    </div>
                </div>
                <div class="category-card" data-category="kids">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Kids' Clothing" class="category-img">
                    <div class="category-overlay">
                        <h3>Kids' Clothing</h3>
                        <p>Adorable outfits for children</p>
                    </div>
                </div>
                <div class="category-card" data-category="shoes">
                    <img src="https://images.unsplash.com/photo-1600269452121-4f2416e55c28?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Shoes" class="category-img">
                    <div class="category-overlay">
                        <h3>Shoes</h3>
                        <p>Footwear for all occasions</p>
                    </div>
                </div>
                <div class="category-card" data-category="accessories">
                    <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Accessories" class="category-img">
                    <div class="category-overlay">
                        <h3>Accessories</h3>
                        <p>Complete your look</p>
                    </div>
                </div>
            </div>
            <button class="scroll-btn scroll-right" id="scrollRight">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <div class="section-title">
            <h2>Our Products</h2>
            <p>Discover our wide selection of clothing and footwear</p>
        </div>
        <div class="product-grid" id="productGrid">
            <!-- Product 1 -->
            <div class="product-card" data-category="men">
                <span class="product-badge">New</span>
                <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Men's Shirt" class="product-img">
                <div class="product-info">
                    <h3>Men's Casual Shirt</h3>
                    <p>Comfortable cotton shirt perfect for any occasion</p>
                    <div class="product-price">
                        <span class="price">15,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card" data-category="women">
                <img src="https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Dress" class="product-img">
                <div class="product-info">
                    <h3>Women's Summer Dress</h3>
                    <p>Lightweight and stylish dress for warm days</p>
                    <div class="product-price">
                        <span class="price">25,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card" data-category="shoes">
                <span class="product-badge">Bestseller</span>
                <img src="https://images.unsplash.com/photo-1600269452121-4f2416e55c28?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Sneakers" class="product-img">
                <div class="product-info">
                    <h3>Unisex Sneakers</h3>
                    <p>Comfortable sneakers for everyday wear</p>
                    <div class="product-price">
                        <span class="price">35,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card" data-category="kids">
                <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Kids Outfit" class="product-img">
                <div class="product-info">
                    <h3>Kids' Play Outfit</h3>
                    <p>Durable and comfortable outfit for active kids</p>
                    <div class="product-price">
                        <span class="price">18,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card" data-category="men shoes">
                <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Men's Shoes" class="product-img">
                <div class="product-info">
                    <h3>Men's Leather Shoes</h3>
                    <p>Elegant formal shoes for special occasions</p>
                    <div class="product-price">
                        <span class="price">45,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card" data-category="women accessories">
                <span class="product-badge">Sale</span>
                <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Bag" class="product-img">
                <div class="product-info">
                    <h3>Women's Handbag</h3>
                    <p>Stylish handbag to complement your outfit</p>
                    <div class="product-price">
                        <span class="price">22,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="product-card" data-category="men">
                <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Men's Jacket" class="product-img">
                <div class="product-info">
                    <h3>Men's Winter Jacket</h3>
                    <p>Warm and stylish jacket for cold days</p>
                    <div class="product-price">
                        <span class="price">38,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="product-card" data-category="women shoes">
                <img src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Shoes" class="product-img">
                <div class="product-info">
                    <h3>Women's Heels</h3>
                    <p>Elegant heels for formal occasions</p>
                    <div class="product-price">
                        <span class="price">32,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 9 -->
            <div class="product-card" data-category="women">
                <span class="product-badge">New</span>
                <img src="https://images.unsplash.com/photo-1581044777550-4cfa60707c03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Blouse" class="product-img">
                <div class="product-info">
                    <h3>Women's Silk Blouse</h3>
                    <p>Elegant and comfortable for any occasion</p>
                    <div class="product-price">
                        <span class="price">28,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 10 -->
            <div class="product-card" data-category="men">
                <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Men's T-Shirt" class="product-img">
                <div class="product-info">
                    <h3>Men's Graphic T-Shirt</h3>
                    <p>Casual cotton tee with unique design</p>
                    <div class="product-price">
                        <span class="price">12,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 11 -->
            <div class="product-card" data-category="kids">
                <span class="product-badge">Bestseller</span>
                <img src="https://images.unsplash.com/photo-1590071089560-3d2b1e5a1f3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Kids Shoes" class="product-img">
                <div class="product-info">
                    <h3>Kids' Running Shoes</h3>
                    <p>Comfortable shoes for active children</p>
                    <div class="product-price">
                        <span class="price">20,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 12 -->
            <div class="product-card" data-category="women">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Women's Jeans" class="product-img">
                <div class="product-info">
                    <h3>Women's Slim Jeans</h3>
                    <p>Classic denim with perfect fit</p>
                    <div class="product-price">
                        <span class="price">24,000 RWF</span>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="section-title">
                <h2>Why Choose XYShop?</h2>
                <p>We provide the best shopping experience for fashion lovers in Rwanda</p>
            </div>
            <div class="feature-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Fast Delivery</h3>
                    <p>Get your fashion items delivered within Kigali in 24 hours and nationwide in 3 days.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>Easy Returns</h3>
                    <p>Not satisfied? Return within 7 days for a full refund or exchange.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Quality Guarantee</h3>
                    <p>We source only the highest quality clothing and footwear for our customers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="newsletter-container">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest fashion trends and exclusive offers</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" class="newsletter-input" required>
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-container">
            <!-- About Column -->
            <div class="footer-col">
                <h3>About XYShop</h3>
                <p>Rwanda's premier online destination for stylish clothing and quality footwear at affordable prices.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#categories">Categories</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#features">Why Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> KN 4 Kinyinya, Kigali, Rwanda</li>
                    <li><i class="fas fa-phone"></i> +250 795 130 378</li>
                    <li><i class="fas fa-envelope"></i> xyshop@gmail.com.rw</li>
                    <li><i class="fas fa-clock"></i> Mon-Sat: 8AM - 6PM</li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} XYShop. All rights reserved.
        </div>
    </footer>

    <script>
        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        const themeIcon = themeToggle.querySelector('i');
        const themeText = themeToggle.querySelector('span');

        // Check for saved theme preference or use preferred color scheme
        const savedTheme = localStorage.getItem('theme') || 
                         (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        
        // Apply the saved theme
        if (savedTheme === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
            themeText.textContent = 'Light Mode';
        }

        // Toggle theme
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                themeText.textContent = 'Light Mode';
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                themeText.textContent = 'Dark Mode';
                localStorage.setItem('theme', 'light');
            }
        });

        // Category Scrolling
        const scrollLeft = document.getElementById('scrollLeft');
        const scrollRight = document.getElementById('scrollRight');
        const categoryScroll = document.getElementById('categoryScroll');

        scrollLeft.addEventListener('click', () => {
            categoryScroll.scrollBy({ left: -200, behavior: 'smooth' });
        });

        scrollRight.addEventListener('click', () => {
            categoryScroll.scrollBy({ left: 200, behavior: 'smooth' });
        });

        // Category Filtering
        const categoryCards = document.querySelectorAll('.category-card');
        const productGrid = document.getElementById('productGrid');
        const productCards = document.querySelectorAll('.product-card');

        categoryCards.forEach(card => {
            card.addEventListener('click', () => {
                const category = card.getAttribute('data-category');
                
                // Update active category
                categoryCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                
                // Filter products
                productCards.forEach(product => {
                    if (category === 'all') {
                        product.style.display = 'block';
                    } else {
                        const productCategories = product.getAttribute('data-category').split(' ');
                        if (productCategories.includes(category)) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    }
                });
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Simple product interaction
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productName = this.closest('.product-card').querySelector('h3').textContent;
                alert(`${productName} added to cart!`);
            });
        });

        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input').value;
            alert(`Thank you for subscribing with ${email}!`);
            this.reset();
        });
    </script>
</body>

</html>