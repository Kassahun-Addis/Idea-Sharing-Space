<footer class="main-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="footer-info">
                        <h3 class="footer-brand">
                            <i class="fas fa-feather-alt"></i> BlogSpace
                        </h3>
                        <p class="footer-desc">
                            A professional blogging platform designed for creators, thinkers, and storytellers. Share your knowledge and connect with readers worldwide.
                        </p>
                        <div class="footer-social">
                            <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('posts.index') }}">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h4 class="footer-title">Popular Categories</h4>
                    <ul class="footer-links">
                        @foreach($categories->take(5) as $category)
                            <li>
                                <a href="{{ route('posts.index', ['category' => $category->slug]) }}">
                                    <i class="{{ $category->icon }}"></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="footer-title">Newsletter</h4>
                    <p class="footer-newsletter-text">
                        Subscribe to our newsletter and stay updated with the latest articles and news.
                    </p>
                    <form class="footer-newsletter">
                        <div class="newsletter-form">
                            <input type="email" placeholder="Enter your email">
                            <button type="submit" class="newsletter-btn">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                    <div class="footer-contact mt-4">
                        <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                        <p><i class="fas fa-envelope"></i> info@blogspace.com</p>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Street, City, Country</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="copyright">
                    © {{ date('Y') }} BlogSpace. All rights reserved.
                </p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy</a>
                    <a href="#">Terms</a>
                    <a href="#">Support</a>
                    <a href="#">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer> 