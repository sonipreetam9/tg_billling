
@extends('layouts.header')
@section('content')
    <!-- Hero Section Start -->
    <div class="hero dark-section parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ $comp_full_name }}</h3>
                            <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $comp_name }} <span>care you can trust.</span></h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Experience the perfect balance of purity and precision with our premium oil droppers Designed for effortless application, our high-quality droppers ensure accurate dispensing, minimal waste, and maximum potency.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Content Body Start -->
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.4s">
                            <!-- Hero Button Start -->
                            <div class="hero-btn">
                                 @if(Auth::check())
                                <a href="{{ route('dashboard') }}" class="btn-default btn-highlighted">Dashboard</a>
                                @else
                                <a href="{{ route('login') }}" class="btn-default btn-highlighted">Login Now</a>
                                @endif>
                            </div>
                            <!-- Hero Button End -->

                            <!-- Contact Now Box Start -->
                            <div class="contact-now-box">
                                <div class="icon-box">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="contact-now-box-content">
                                    <h3>Call Us</h3>
                                    <p><a href="tel:{{ $comp_phone }}">{{ $comp_phone }}</a></p>
                                </div>
                            </div>
                            <!-- Contact Now Box End -->
                        </div>
                        <!-- Hero Content Body End -->
                    </div>
                    <!-- Hero Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Hero Image Start -->
                    <div class="hero-image">
                        <figure>
                            <img src="images/my/40752.jpg" alt="">
                        </figure>


                    </div>
                    <!-- Hero Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Us Section Start -->
    <div class="about-us d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Images Start -->
                    <div class="about-images">
                        <figure>
                            <img src="images/about-image.png" alt="">
                        </figure>

                        <!-- Premium Quality Circle Start -->
                        <div class="premium-quality-circle">
                            <img src="images/premium-quality-circle-2.png" alt="">
                        </div>
                        <!-- Premium Quality Circle End -->
                    </div>
                    <!-- About Images End -->
                </div>

                <div class="col-lg-6">
                    <!-- About us Content Start -->
                    <div class="about-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">about us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Pure essence precise drops <span>ultimate care always</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">We believe that every drop matters. Our premium oil dropper bottles are designed to deliver purity, precision, and care with every use.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us List Start -->
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul>
                                <li>Precision in every drop designed for perfect application</li>
                                <li>Leak-Proof & durable protecting your precious Oils with care</li>
                            </ul>
                        </div>
                        <!-- About Us List End -->

                        <!-- About Us Body Start -->
                        <div class="about-us-body">
                            <!-- About Body Item Button Start -->
                            <div class="about-body-item-btn">
                                <!-- About Organic Item Start -->
                                <div class="about-organic-item wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="icon-box">
                                        <img src="images/icon-about-organic.svg" alt="">
                                    </div>
                                    <div class="about-organic-content">
                                        <h3>100% Organic & Pure</h3>
                                        <p>Helping to restore balance and promote overall wellness.</p>
                                    </div>
                                </div>
                                <!-- About Organic Item End -->

                                <!-- About Us Button Start -->
                                <div class="about-us-btn wow fadeInUp" data-wow-delay="0.8s">
                                    <a href="about.html" class="btn-default">more about</a>
                                </div>
                                <!-- About Us Button End -->
                            </div>
                            <!-- About Body Item Button End -->

                            <!-- About Body Item Start -->
                            <div class="about-body-item wow fadeInUp" data-wow-delay="0.6s">
                                <img src="images/icon-about-body-item.svg" alt="">
                                <h3>Nature's Best in Every Drop</h3>
                            </div>
                            <!-- About Body Item End -->
                        </div>
                        <!-- About Us Body End -->
                    </div>
                    <!-- About us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Why Choose us Section Start -->
    <div class="why-choose-us d-none">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <!-- Why Choose Box Start -->
                    <div class="why-choose-box">
                        <!-- Why Choose Content Start -->
                        <div class="why-choose-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">why choose us</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">Precision drops, premium <span>quality, care you trust</span></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Our oil dropper bottles are designed for precision, ensuring controlled application with minimal waste. Made from high-quality, durable materials.</p>
                            </div>
                            <!-- Section Title End -->

                            <!-- Why Choose Item Box Start -->
                            <div class="why-choose-item-box wow fadeInUp" data-wow-delay="0.4s">
                                <!-- Why Choose Item Start -->
                                <div class="why-choose-item">
                                    <div class="icon-box">
                                        <img src="images/icon-why-choose-1.svg" alt="">
                                    </div>
                                    <div class="why-choose-item-content">
                                        <h3>Premium Quality</h3>
                                        <p>Carefully sourced, 100%, rigorously tested for excellence.</p>
                                    </div>
                                </div>
                                <!-- Why Choose Item End -->

                                <!-- Why Choose Item Start -->
                                <div class="why-choose-item">
                                    <div class="icon-box">
                                        <img src="images/icon-why-choose-2.svg" alt="">
                                    </div>
                                    <div class="why-choose-item-content">
                                        <h3>Fast & Reliable Shipping</h3>
                                        <p>Carefully sourced, 100%, rigorously tested for excellence.</p>
                                    </div>
                                </div>
                                <!-- Why Choose Item End -->
                            </div>
                            <!-- Why Choose Item Box End -->

                            <!-- Why Choose Body Start -->
                            <div class="why-choose-body">
                                <div class="icon-box">
                                    <img src="images/premium-quality-circle-3.png" alt="">
                                </div>
                                <div class="why-choose-body-content wow fadeInUp" data-wow-delay="0.6s">
                                    <p>With a commitment to sustainability and customer satisfaction, we provide reliable, stylish, and -friendly solutions you can trust. Experience the  balance of function and care—one drop at a time.</p>
                                </div>
                            </div>
                            <!-- Why Choose Body End -->
                        </div>
                        <!-- Why Choose Content End -->

                        <!-- Why Choose Images Start -->
                        <div class="why-choose-images">
                            <div class="why-choose-img">
                                <figure>
                                    <img src="images/why-choose-image.jpg" alt="">
                                </figure>
                            </div>
                            <div class="why-choose-product-image">
                                <img src="images/why-choose-product-image.png" alt="">
                            </div>
                        </div>
                        <!-- Why Choose Images End -->
                    </div>
                    <!-- Why Choose Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose us Section End -->

    <!-- Our Products Section Start -->
    <div class="our-products d-none">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our product</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Premium droppers for pure, <span>precise application</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-6">
                    <!-- Section Button Start -->
                    <div class="section-btn wow fadeInUp" data-wow-delay="0.2s">
                        <a href="#" class="btn-default">view all products</a>
                    </div>
                    <!-- Section Button End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp">
                        <div class="product-image">
                            <figure>
                                <img src="images/product-image-1.png" alt="">
                            </figure>
                        </div>
                        <div class="product-content">
                            <h3>Eco Glow Dropper</h3>
                            <p>$16.00</p>
                        </div>
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="product-image">
                            <figure>
                                <img src="images/product-image-2.png" alt="">
                            </figure>
                        </div>
                        <div class="product-content">
                            <h3>Vital Oil Dropper</h3>
                            <p>$35.00</p>
                        </div>
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="product-image">
                            <figure>
                                <img src="images/product-image-3.png" alt="">
                            </figure>
                        </div>
                        <div class="product-content">
                            <h3>Golden Drip Bottle</h3>
                            <p>$45.00</p>
                        </div>
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Product Item Start -->
                    <div class="product-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="product-image">
                            <figure>
                                <img src="images/product-image-4.png" alt="">
                            </figure>
                        </div>
                        <div class="product-content">
                            <h3>Zen Flow Dropper</h3>
                            <p>$62.00</p>
                        </div>
                    </div>
                    <!-- Product Item End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                        <p><span>Free</span>Let's make something great work together. <a href="contact.html">Get Free Quote</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Product Section End -->

    <!-- What We Do Section Start -->
    <div class="what-we-do dark-section d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- What We Images Start -->
                    <div class="what-we-images">
                        <!-- What We Image Start -->
                        <div class="what-we-image-1">
                            <figure class="image-anime reveal">
                                <img src="images/what-we-image-1.jpg" alt="">
                            </figure>
                        </div>
                        <!-- What We Image End -->

                        <!-- What We Image Start -->
                        <div class="what-we-image-2">
                            <figure class="image-anime reveal">
                                <img src="images/what-we-image-2.jpg" alt="">
                            </figure>
                        </div>
                        <!-- What We Image End -->

                        <!-- What We Circle Start -->
                        <div class="what-we-circle">
                            <img src="images/premium-quality-circle-2.png" alt="">
                        </div>
                        <!-- What We Circle End -->
                    </div>
                    <!-- What We Images End -->
                </div>

                <div class="col-lg-6">
                    <!-- What We Content Start -->
                    <div class="what-we-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">What we do ?</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Delivering precision, purity, <span>and care daily</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- What We Item Box Start -->
                        <div class="what-we-item-box">
                            <!-- What We Item Start -->
                            <div class="what-we-item wow fadeInUp" data-wow-delay="0.2s">
                                <h3>Crafting Precision for Every Drop</h3>
                                <p>We believe that precision matters. Our expertly designed oil dropper bottles ensure controlled dispensing allowing you to use just the right amount.</p>
                            </div>
                            <!-- What We Item End -->

                            <!-- What We Item Start -->
                            <div class="what-we-item wow fadeInUp" data-wow-delay="0.4s">
                                <h3>Designed for Essential Oils</h3>
                                <p>We believe that precision matters. Our expertly designed oil dropper bottles ensure controlled dispensing allowing you to use just the right amount.</p>
                            </div>
                            <!-- What We Item End -->
                        </div>
                        <!-- What We Item Box End -->
                    </div>
                    <!-- What We Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do Section End -->

    <!-- Our Key Points Section Start -->
    <div class="our-key-points d-none">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our key points</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Superior design, precision <span>drop lasting quality</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-6">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                        <p>Crafted with superior design, engineered with precision, and built to  commitment to excellence ensures every detail is meticulously perfected, delivering unparalleled quality and durability.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 order-1">
                    <!-- Key Point Item Box Start -->
                    <div class="key-points-item-box-1">
                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-1.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>Preserves Purity</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->

                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-2.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>Travel Friendly</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->

                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.8s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-3.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>Preserves Purity</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->
                    </div>
                    <!-- Key Point Steps End -->
                </div>

                <div class="col-lg-4 order-lg-2 order-md-3 order-3">
                    <!-- Key Points Image Start -->
                    <div class="key-points-image">
                        <figure>
                            <img src="images/key-points-image.png" alt="">
                        </figure>
                    </div>
                    <!-- Key Points Image End -->
                </div>

                <div class="col-lg-4 col-md-6 order-lg-3 order-md-2 order-3">
                    <!-- Key Point Item Box Start -->
                    <div class="key-points-item-box-2">
                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-4.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>100% Pure Oils</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->

                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-5.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>Eco Friendly</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->

                        <!-- Key Point Item Start -->
                        <div class="key-points-item wow fadeInUp" data-wow-delay="0.8s">
                            <div class="icon-box">
                                <img src="images/icon-key-points-6.svg" alt="">
                            </div>
                            <div class="key-points-item-content">
                                <h3>Trusted by Experts</h3>
                                <p>Ensures natural essence, free and from toxins, additives</p>
                            </div>
                        </div>
                        <!-- Key Point Item End -->
                    </div>
                    <!-- Key Point Steps End -->
                </div>

                <div class="col-lg-12 order-4">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s">
                        <p>Let's make something great work together. <a href="contact.html">Get Free Quote</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Key Points Section End -->

    <!-- Premium Products Section Start -->
    <div class="premium-products d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Premium Products Content Start -->
                    <div class="premium-products-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Premium dropper</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Premium quality precsion design <span>pure performance</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Premium Products Body Start -->
                        <div class="premium-products-body">
                            <div class="premium-products-body-content wow fadeInUp" data-wow-delay="0.2s">
                                <p>Our oil dropper bottles  designed precision, ensuring controlled application.</p>
                                <a href="contact.html" class="btn-default">Explore More</a>
                            </div>

                            <div class="premium-products-list wow fadeInUp" data-wow-delay="0.4s">
                                <ul>
                                    <li>Easy and mess-free oil dispensing</li>
                                    <li>Prevents spills and waste.</li>
                                    <li>Durable and safe for essential oils.</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Premium Products Body End -->

                        <!-- Premium Products Item Box Start -->
                        <div class="premium-products-item-box">
                            <!-- Premium Products Item Start -->
                            <div class="premium-products-item wow fadeInUp">
                                <div class="premium-products-image">
                                    <figure class="image-anime">
                                        <img src="images/premium-products-image-1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="premium-products-item-content">
                                    <h3><a href="#">Leak-Proof Seal</a></h3>
                                </div>
                            </div>
                            <!-- Premium Products Item End -->

                            <!-- Premium Products Item Start -->
                            <div class="premium-products-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="premium-products-image">
                                    <figure class="image-anime">
                                        <img src="images/premium-products-image-2.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="premium-products-item-content">
                                    <h3><a href="#">Leak-Proof Seal</a></h3>
                                </div>
                            </div>
                            <!-- Premium Products Item End -->

                            <!-- Premium Products Item Start -->
                            <div class="premium-products-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="premium-products-image">
                                    <figure class="image-anime">
                                        <img src="images/premium-products-image-3.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="premium-products-item-content">
                                    <h3><a href="#">Durable Glass</a></h3>
                                </div>
                            </div>
                            <!-- Premium Products Item End -->
                        </div>
                        <!-- Premium Products Item Box End -->
                    </div>
                    <!-- Premium Products Content End -->
                </div>

                <div class="col-lg-5">
                    <!-- Products Intro Video Start -->
                    <div class="products-intro-video">
                        <!-- Products Intro Image Start -->
                        <div class="products-intro-image">
                            <figure class="image-anime reveal">
                                <img src="images/products-intro-image.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Products Intro Image End -->

                        <!-- Video Play Button Start -->
                        <div class="video-play-button">
                            <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                    </div>
                    <!-- Products Intro Video End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Premium Products Section End -->

    <!-- Our Benefits Section Start -->
    <div class="our-benefits d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <!-- Benefit Image Start -->
                    <div class="benefit-image">
                        <div class="bemefit-img">
                            <figure>
                                <img src="images/benefit-img.png" alt="">
                            </figure>
                        </div>

                        <div class="benefit-quality-circle">
                            <figure>
                                <img src="images/premium-quality-circle-2.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- Benefit Image End -->
                </div>
                <div class="col-lg-7">
                    <!-- Benefit Content Start -->
                    <div class="benefit-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Benefits of Oil </h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Unlock nature's power amazing <span>benefits of essential oils</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Benefit Body Start -->
                        <div class="benefit-body">
                            <!-- Benefit Item Box Start -->
                            <div class="benefit-item-box">
                                <!-- Benefit Item Start -->
                                <div class="benefit-item wow fadeInUp">
                                    <div class="icon-box">
                                        <img src="images/icon-benefit-1.svg" alt="">
                                    </div>
                                    <div class="benefit-item-content">
                                        <h3>natural healing & wellness</h3>
                                        <p>Supports overall health, immunity, and promotes well-being.</p>
                                    </div>
                                </div>
                                <!-- Benefit Item End -->

                                <!-- Benefit Item Start -->
                                <div class="benefit-item wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon-box">
                                        <img src="images/icon-benefit-2.svg" alt="">
                                    </div>
                                    <div class="benefit-item-content">
                                        <h3>skin & beauty care  </h3>
                                        <p>Supports overall health, immunity, and promotes well-being.</p>
                                    </div>
                                </div>
                                <!-- Benefit Item End -->
                            </div>
                            <!-- Benefit Item Box End -->

                            <!-- Benefit Item Box Start -->
                            <div class="benefit-item-box">
                                <!-- Benefit Item Start -->
                                <div class="benefit-item wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="icon-box">
                                        <img src="images/icon-benefit-3.svg" alt="">
                                    </div>
                                    <div class="benefit-item-content">
                                        <h3>home purification</h3>
                                        <p>Supports overall health, immunity, and promotes well-being.</p>
                                    </div>
                                </div>
                                <!-- Benefit Item End -->

                                <!-- Benefit Item Start -->
                                <div class="benefit-item wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="icon-box">
                                        <img src="images/icon-benefit-4.svg" alt="">
                                    </div>
                                    <div class="benefit-item-content">
                                        <h3>non-toxic & eco-friendly</h3>
                                        <p>Supports overall health, immunity, and promotes well-being.</p>
                                    </div>
                                </div>
                                <!-- Benefit Item End -->
                            </div>
                            <!-- Benefit Item Box End -->
                        </div>
                        <!-- Benefit Body End -->
                    </div>
                    <!-- Benefit Content End -->
                </div>

                <div class="col-lg-12">
                    <!-- Benefit List Start -->
                    <div class="benefits-list">
                        <!-- Benefit List Item Start -->
                        <div class="benefit-list-item wow fadeInUp">
                            <div class="icon-box">
                                <img src="images/icon-benefit-list-1.svg" alt="">
                            </div>
                            <div class="benefit-list-item-content">
                                <h3>active member</h3>
                                <p>Dedicated to sharing oil benefits.</p>
                            </div>
                        </div>
                        <!-- Benefit List Item End -->

                        <!-- Benefit List Item Start -->
                        <div class="benefit-list-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="images/icon-benefit-list-2.svg" alt="">
                            </div>
                            <div class="benefit-list-item-content">
                                <h3>project complete</h3>
                                <p>Successfully delivered quality oil.</p>
                            </div>
                        </div>
                        <!-- Benefit List Item End -->

                        <!-- Benefit List Item Start -->
                        <div class="benefit-list-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="images/icon-benefit-list-3.svg" alt="">
                            </div>
                            <div class="benefit-list-item-content">
                                <h3>product reward</h3>
                                <p>Earn rewards for oil purchases.</p>
                            </div>
                        </div>
                        <!-- Benefit List Item End -->
                    </div>
                    <!-- Benefit List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Benefits Section End -->

    <!-- Cta Box Start -->
    <div class="cta-box dark-section d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Cta Content Start -->
                    <div class="cta-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Get 50% off</span> Premium oil</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Porches Premium Oil is crafted for those who value purity and excellence. Sourced from the finest natural ingredients, our premium oil is carefully extracted to preserve its full potency</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Cta Button Start -->
                        <div class="cta-buton wow fadeInUp" data-wow-delay="0.4s">
                            <a href="contact.html" class="btn-default btn-highlighted">purchase now</a>
                        </div>
                        <!-- Cta Button End -->
                    </div>
                    <!-- Cta Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Cta Image Start -->
                    <div class="cta-image">
                        <figure>
                            <img src="images/cta-image.png" alt="">
                        </figure>
                    </div>
                    <!-- Cta Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Cta Box End -->

    <!-- Our Faqs Section Start -->
    <div class="our-faqs d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Faqs Image Start -->
                    <div class="faqs-image">
                        <div class="faq-image">
                            <figure class="image-anime">
                                <img src="images/faq-image.jpg" alt="">
                            </figure>
                        </div>

                        <!-- Faqs CTA Box Start -->
                        <div class="faqs-cta-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="images/icon-faqs-cta.svg" alt="">
                            </div>
                            <div class="faqs-cta-box-content">
                                <h3>Answers You Need !</h3>
                            </div>
                        </div>
                        <!-- Faqs CTA Box End -->
                    </div>
                    <!-- Faqs Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- Faqs Content Start -->
                    <div class="faqs-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">FAQ's</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Your questions, <span>our expert answers</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- FAQ Accordion Start -->
                        <div class="faq-accordion" id="faqaccordion">
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        What is an oil dropper used for?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>Yes, our dropper bottles are designed with secure, leak-proof seals to prevent spills and maintain product integrity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Are your dropper bottles leak-proof?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2" data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>Yes, our dropper bottles are designed with secure, leak-proof seals to prevent spills and maintain product integrity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        How do I clean my oil dropper bottle?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>Yes, our dropper bottles are designed with secure, leak-proof seals to prevent spills and maintain product integrity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Do you offer bulk or wholesale options?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        <p>Yes, our dropper bottles are designed with secure, leak-proof seals to prevent spills and maintain product integrity.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                        </div>
                        <!-- FAQ Accordion End -->
                    </div>
                    <!-- Faqs Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Faqs Section End -->



@endsection
