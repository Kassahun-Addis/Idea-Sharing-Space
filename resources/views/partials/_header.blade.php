<header class="main-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div class="header-contact">
                    <span class="me-4">
                        <i class="fas fa-clock me-1"></i>Mon - Fri: 9:00 AM - 6:00 PM
                    </span>
                    <a href="mailto:info@blogspace.com" class="me-3">
                        <i class="fas fa-envelope me-1"></i>info@blogspace.com
                    </a>
                </div>
                <div class="header-social">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <div class="header-wrapper">
                <div class="header-content">
                    <h1 class="header-title">Welcome to BlogSpace</h1>
                    <p class="header-subtitle">Discover stories, thinking, and expertise</p>
                    <div class="header-search">
                        <form action="{{ route('posts.index') }}" method="GET">
                            <div class="search-box">
                                <input type="text" 
                                       name="search" 
                                       placeholder="Search articles..."
                                       value="{{ request('search') }}">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="header-stats">
                        <div class="stat-item">
                            <span class="stat-number">{{ $totalPosts }}</span>
                            <span class="stat-label">Articles</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ $totalComments }}</span>
                            <span class="stat-label">Comments</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ $categories->count() }}</span>
                            <span class="stat-label">Categories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 