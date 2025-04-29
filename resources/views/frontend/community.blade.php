<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Six Brothers</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/home/favicon.png') }}" sizes="32x32" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/hover.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/menu.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/media.css') }}">
        <!-- Hotjar Tracking Code for Six Brothers Mahura -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:6378883,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
    </head>
    <body>
        <!-- ==================== Start Navbar ==================== -->
        <nav class="navbar navbar-expand-lg">
            <div class="navcontainer">
                <a class="logo" href="https://sixbrothers.com/home">
                <img src="{{ asset('frontend/assets/images/home/logo.png') }}" alt="Six Brothers Mahura Logo">
                </a>
                <div class="topnav">
                    <div class="menu-icon">
                        <img src="{{ asset('frontend/assets/images/icons/menu.png') }}">
                    </div>
                </div>
            </div>
        </nav>
        <div class="hamenu">
            <div class="close-menu cursor-pointer ti-close">
                <img src="{{ asset('frontend/assets/images/icons/close.png') }}">
            </div>
            <div class="container-fluid rest d-flex">
                <div class="menu-links">
                    <ul class="main-menu rest">
                        <li>
                            <div class="o-hidden">
                                <a href="the-spirit.html" class="link dmenu"><span class="fill-text"
                                    data-text="THE SPIRIT">THE SPIRIT</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="journey.html" class="link"><span class="fill-text" data-text="THE JOURNEY">THE
                                JOURNEY</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="the-legacy.html" class="link"><span class="fill-text" data-text="THE LEGACY">THE
                                LEGACY</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="the-location.html" class="link"><span class="fill-text"
                                    data-text="THE LOCATION">THE LOCATION</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="the-distillery.html" class="link"><span class="fill-text"
                                    data-text="THE DISTILLERY">THE DISTILLERY</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="mix.html" class="link"><span class="fill-text" data-text="THE MIX">THE
                                MIX</span></a>
                            </div>
                        </li>
                        <li>
                            <div class="o-hidden">
                                <a href="community.html" class="link"><span class="fill-text active" data-text="COMMUNITY">COMMUNITY</span></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="cont-info valign">
                    <div class="text-center full-width">
                        <!-- <img src="/images/home/menu-img.png" class="img-responsive"> -->
                    </div>
                    <img src="/images/home/menu-from-img.jpg" alt="Six Brothers Mahura Spirit" class="visually-hidden">
                </div>
                <div class="tiger-menuimg-valign">
                    <img src="/images/home/menu-tiger.png" alt="Menu Image" class="img-responsive">
                </div>
                <h2 class="vertical-menu-text">SPIRIT OF THE WILD</h2>
            </div>
        </div>
    

        <section class="blog-banners-wrap" style="background: url('{{ asset('uploads/community/' . $banner->banner_image) }}') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-banner-content-sec">
                            <div class="blog-banner-text-main" data-aos="fade-up" data-aos-duration="1000">
                                <h1>{{ $banner->banner_heading }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="blog-articles-wrap-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-articles-title-sec">
                            <h2 style="text-align: center;">PRESS RELEASES</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel blog-articles-carousel">
                            @foreach($pressReleases as $pressRelease)
                            <div class="blog-articles-item">
                                <div class="blog-articles-item-img-sec">
                                    <a href="{{ $pressRelease->url }}" target="_blank">
                                        <img src="{{ asset('uploads/community/' . $pressRelease->thumbnail) }}" alt="{{ $pressRelease->blog_heading }}">
                                    </a>
                                </div>
                                <div class="blog-articles-content-sec">
                                    <h4><a href="{{ $pressRelease->url }}" target="_blank">{{ $pressRelease->blog_heading }}</a></h4>
                                    <a href="{{ $pressRelease->url }}" target="_blank" class="ch-btn-style-1 ch-btn-animated">View More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="blog-articles-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-articles-title">
                            <h2>LEARN MORE</h2>
                        </div>
                    </div>
                    <div class="blog-articles-three-col-sec">
                        @foreach($blogs as $blog)
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="blog-artilces-box-wrap">
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset('uploads/community/'.$blog->thumbnail) }}" class="img-responsive" alt="Blog Image">
                                    </a>
                                    <h4><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->blog_heading }}</a></h4>
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blog-articles-btn">
                                        <img src="{{ asset('frontend/assets/images/icons/arrow-right-black.png') }}" alt="arrow-right-icon">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>






        <div class="border-line-box">
            <img src="{{ asset('frontend/assets/images/icons/border-line.png') }}" class="border-line">
        </div>
        <footer class="footer-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="footer-text-left">
                            <ul class="footer-list">
                                <li><a href="community.html">COMMUNITY</a></li>
                                <li><a href="careers.html">Careers</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="#">PRESS OFFICE KIT</a></li>
                            </ul>
                        </div>
                        <div class="follow-list">
                            <div class="follow-box">
                                <h5>Follow Us</h5>
                                <ul>
                                    <li><a href="https://www.instagram.com/sixbrothersmahura/" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                                    <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                                    <!--<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 footer-middle-col">
                        <div class="footer-img-center">
                            <img src="{{ asset('frontend/assets/images/home/footer-img.png') }}" alt="Spirit Of The Wild" class="border-line">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="footer-text-right">
                            <ul class="footer-list">
                                <li><a href="community.html">PRESS RELEASES</a></li>
                                <li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                                <li><a href="privacy-policy.html">Privacy Notice</a></li>
                                <li><a href="cookies-policy.html">Cookie Policy</a></li>
                                <li><a href="social-responsibility.html">Ugc Policy/social Responsibility</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="footer-left-bottom">
                            <p>Content to be shared with those over legal drinking age only.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="footer-right-bottom">
                            <p>© 2025 Six Brothers Mahura</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- From Beginning -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <!-- text animation -->
        <script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ScrollTrigger.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/SplitText.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    </body>
</html>