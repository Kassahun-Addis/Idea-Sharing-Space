<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    @vite('resources/css/app.css')
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #2dd4bf 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        /* Layout Structure */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            line-height: 1.7;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* Header Styles */
        .header {
            background: var(--primary-gradient);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #4f46e5;
        }

        .nav-link {
            font-weight: 500;
            color: #4b5563;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--primary-gradient);
            color: white;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            padding: 2rem;
            flex: 1;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: static;
                margin-bottom: 2rem;
            }
        }

        /* General Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            line-height: 1.7;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        }

        .card-body {
            padding: 2.5rem;
        }

        /* Button Styles */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255,255,255,0.1);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn:hover::after {
            opacity: 1;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        .btn-warning {
            background: var(--warning-gradient);
            border: none;
            color: white;
        }

        .btn-danger {
            background: var(--danger-gradient);
            border: none;
        }

        .btn-secondary {
            background: var(--secondary-gradient);
            border: none;
            color: white;
        }

        /* Form Controls */
        .form-control {
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            padding: 0.875rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f9fafb;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background-color: #ffffff;
        }

        /* Comment Section */
        .comment-section {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .comment-card {
            background-color: #f9fafb;
            border-radius: 16px;
            margin-bottom: 1.25rem;
            padding: 1.5rem;
            border-left: 5px solid #6366f1;
            transition: all 0.3s ease;
        }

        .comment-card:hover {
            transform: translateX(5px);
            background-color: #f3f4f6;
        }

        /* Typography */
        .display-4 {
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border-radius: 6px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Layout & Grid System */
        .page-wrapper {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (max-width: 992px) {
            .page-wrapper {
                grid-template-columns: 1fr;
            }
        }

        /* Content Organization */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* Sidebar Improvements */
        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .sidebar-section {
            margin-bottom: 2rem;
        }

        .sidebar-section:last-child {
            margin-bottom: 0;
        }

        .category-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #4b5563;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .category-link:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(5px);
        }

        /* Card Improvements */
        .post-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
        }

        .post-header {
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 1rem;
        }

        .post-content {
            flex: 1;
        }

        .post-footer {
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
            margin-top: auto;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 0.75rem;
        }

        .stat-card {
            background: var(--primary-gradient);
            color: white;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-card small {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        /* Make sidebar sticky but scrollable if content is too long */
        .sidebar {
            position: sticky;
            top: 100px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        /* Hide scrollbar but keep functionality */
        .sidebar::-webkit-scrollbar {
            width: 0px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <i class="fas fa-feather-alt me-2"></i>BlogSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">
                            <i class="fas fa-plus-circle me-1"></i> Create Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-search me-1"></i> Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to BlogSpace</h1>
            <p class="lead">Share your thoughts and connect with others</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <div class="page-wrapper">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <!-- Profile Section -->
                    <div class="sidebar-section">
                        <h5 class="mb-3">Quick Stats</h5>
                        <div class="stats-grid">
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalPosts }}</h3>
                                <small>Posts</small>
                            </div>
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalComments }}</h3>
                                <small>Comments</small>
                            </div>
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalReplies }}</h3>
                                <small>Replies</small>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    <div class="sidebar-section">
                        <h5 class="mb-3">Categories</h5>
                        <div class="category-list">
                            <a href="#" class="category-link">
                                <i class="fas fa-laptop-code me-2"></i>
                                Technology
                            </a>
                            <a href="#" class="category-link">
                                <i class="fas fa-heart me-2"></i>
                                Lifestyle
                            </a>
                            <a href="#" class="category-link">
                                <i class="fas fa-plane me-2"></i>
                                Travel
                            </a>
                        </div>
                    </div>

                    <!-- Popular Tags -->
                    <div class="sidebar-section">
                        <h5 class="mb-3">Popular Tags</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="badge bg-primary">Laravel</a>
                            <a href="#" class="badge bg-primary">PHP</a>
                            <a href="#" class="badge bg-primary">Web Dev</a>
                        </div>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <h5 class="mb-3">About BlogSpace</h5>
                    <p>A platform for sharing thoughts and connecting with others.</p>
                </div>
                <div>
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">About</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="mb-3">Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <p class="text-center mb-0">&copy; 2024 BlogSpace. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    @vite('resources/js/app.js')
</body>
</html>