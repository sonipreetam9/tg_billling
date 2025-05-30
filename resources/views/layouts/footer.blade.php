<!-- Main Footer Start -->
<footer class="main-footer">
    <div class="container">
        <div class="row">


            <div class="col-lg-6 col-md-6">
                <!-- About Footer Start -->
                <div class="about-footer">
                    <!-- Footer Logo Start -->
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo/tglogo.png') }}" alt="">
                    </div>
                    <!-- Footer Logo End -->

                    <div class="about-footer-content">
                        <p>{{ $comp_address }}</p>
                    </div>

                    <div class="about-footer-contact">
                        <a href="tel:{{ $comp_phone }}">{{ $comp_phone }}</a>
                        <a href="mailto:{{ $comp_email }}">{{ $comp_email }}</a>
                    </div>
                </div>
                <!-- About Footer End -->
            </div>

            <div class="col-lg-6 col-md-6">
                <!-- Footer Contact Box Start -->
                <div class="footer-contact-box">
                    <!-- Newsletter Form Start -->
                    <div class="footer-newsletter-form footer-links">
                        <h3>Newsletter</h3>
                        <form id="newsletterForm" action="#" method="POST">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="mail"
                                    placeholder="Enter Your Email" required="">
                                <button type="submit" class="newsletter-btn"><i
                                        class="fa-regular fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Newsletter Form End -->

                    <!-- Footer Social Links Start -->
                    <div class="footer-social-links">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer Social Links End -->
                </div>
                <!-- Footer Contact Box End -->
            </div>
        </div>
    </div>

    <!-- Footer Copyright Start -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>Copyright © 2025 All Rights Reserved.</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyright End -->
</footer>
<!-- Main Footer End -->

<!-- Jquery Library File -->
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap js file -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Validator js file -->
<script src="{{ asset('js/validator.min.js') }}"></script>
<!-- SlickNav js file -->
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<!-- Swiper js file -->
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<!-- Counter js file -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<!-- Magnific js file -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<!-- SmoothScroll -->
<script src="{{ asset('js/SmoothScroll.js') }}"></script>
<!-- Parallax js -->
<script src="{{ asset('js/parallaxie.js') }}"></script>
<!-- MagicCursor js file -->
<script src="{{ asset('js/gsap.min.js') }}"></script>
<script src="{{ asset('js/magiccursor.js') }}"></script>
<!-- Text Effect js file -->
<script src="{{ asset('js/SplitText.js') }}"></script>
<script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
<!-- YTPlayer js File -->
<script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
<!-- Wow js file -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- Main Custom js file -->
<script src="{{ asset('js/function.js') }}"></script>
</body>

</html>
