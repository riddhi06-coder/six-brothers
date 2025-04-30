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
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
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
              <img src="{{ asset('frontend/assets/images/icons/menu.png') }}" alt="Menu Icon">
            </div>
          </div>
        </div>
      </nav>

      <div class="hamenu">
        <div class="close-menu cursor-pointer ti-close">
          <img src="images/icons/close.png">
        </div>
        <div class="container-fluid rest d-flex">
          <div class="menu-links">
            <ul class="main-menu rest">
              <li>
                <div class="o-hidden">
                  <a href="the-spirit.html" class="link dmenu"><span class="fill-text" data-text="THE SPIRIT">THE SPIRIT</span>
                  </a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="journey.html" class="link"><span class="fill-text" data-text="THE JOURNEY">THE JOURNEY</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="the-legacy.html" class="link"><span class="fill-text" data-text="THE LEGACY">THE LEGACY</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="the-location.html" class="link"><span class="fill-text" data-text="THE LOCATION">THE LOCATION</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="the-distillery.html" class="link"><span class="fill-text" data-text="THE DISTILLERY">THE DISTILLERY</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="mix.html" class="link"><span class="fill-text" data-text="THE MIX">THE MIX</span></a>
                </div>
              </li>
              <li>
                <div class="o-hidden">
                  <a href="community.html" class="link"><span class="fill-text" data-text="COMMUNITY">COMMUNITY</span></a>
                </div>
              </li>
            </ul>
          </div>
          <div class="cont-info valign">
            <div class="text-center full-width">
              <!-- <img src="images/home/menu-img.png" class="img-responsive"> -->
            </div>
          </div>
          <div class="tiger-menuimg-valign">
            <img src="images/home/menu-tiger.png" alt="Menu Image" class="img-responsive">
          </div>
          <h2 class="vertical-menu-text">SPIRIT OF THE WILD</h2>
        </div>
      </div>
  <!-- ==================== End Navbar ==================== -->


      <section class="cocktail-recipe-one-wrap">
          <div class="container">
              <div class="row">
              <div class="col-md-6 col-xs-12 cocktail-recipe-pl-sec">
                  <div class="cocktail-recipe-img-sec">
                  <img src="{{ asset('uploads/community/' . $details->banner_image) }}" class="img-responsive" alt="">
                  </div>
              </div>
              <div class="col-md-5 col-xs-12">
                  <div class="cocktail-recipe-text-sec">
                  <h2>{{ $cocktail->blog_heading }}</h2>

                  <div class="panel-group cocktail-recipe-panel-sec" id="recipeAccordion">
                    @if($details)
                      {{-- INGREDIENTS --}}
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#recipeAccordion" href="#ingredients">
                              INGREDIENTS <span class="toggle-icon"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="ingredients" class="panel-collapse collapse">
                          <div class="panel-body">
                            {!! $details->ingredients !!}
                          </div>
                        </div>
                      </div>

                      {{-- METHOD --}}
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#recipeAccordion" href="#instructions">
                              METHOD <span class="toggle-icon"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="instructions" class="panel-collapse collapse">
                          <div class="panel-body">
                            {!! $details->method !!}
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>

                  <a href="https://sixbrothers.com/home" class="ch-btn-style-1 ch-btn-animated">DISCOVER MORE</a>
                  </div>
              </div>
              </div>
          </div>
      </section>

      <section class="cocktail-recipe-two-wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="cocktail-recipe-eye-icon-sec">
                <img src="{{ asset('frontend/assets/images/home/media-eye-img.png') }}" class="img-responsive mix-eye-img">
              </div>
              <div class="cocktail-recipe-third-text" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="tp-split-text">GOT YOUR OWN<br>SIX BROTHERS MAHURA RECIPE?</h2>
                <h4>ENTER IT NOW TO HAVE IT FEATURED AND CREDITED TO YOU.</h4>
                <a href="#" class="ch-btn-style-1 ch-btn-animated" data-toggle="modal" data-target="#exampleModal">Submit Your Recipe</a>
              </div>
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
                                  <li><a href="https://www.instagram.com/sixbrothersmahura/" target="_blank"><i class="fa fa-instagram"></i></a></li>
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

      <!-- Modal Pop Up -->
      <div class="modal fade popup pop-join-us-2" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class="popup-join-our-two">
                <div class="popup-join-our-two-box">
                  <div class="row popup-row-sec-two">
                    <div class="col-md-6">
                      <div class="pop-up-join-our-two-img">
                        <img src="{{ asset('frontend/assets/images/home/popup-tiger.png') }}" class="popup-two-tiger-img">
                        <img src="{{ asset('frontend/assets/images/home/popup-img-2.webp') }}" class="img-responsive popup-main-img" alt="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="pop-two-btn-sec">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                      </div>
                      <div class="popup-join-our-two-content-sec">
                        <h2 class="tp-split-text">submit your<br>six brothers mahura</h2>
                        <h4>cocktail recipe</h4>
                        <p>Have a signature cocktail? Share your creation with us and let Six Brothers bring it to life. Submit your cocktail idea now!</p>
                        <form action="#" method="post" class="popup-form-two">
                          <div class="form-group">
                            <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First name" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last name" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="link-to-your-social-media" name="Social Media Link" placeholder="Link to your social media" required>
                          </div>
                        </form>
                        <h5>Cocktail Details</h5>
                        <form action="#" method="post" class="popup-form-subsec-two" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="text" class="form-control" id="name-of-your-cocktail" name="cocktail_name" placeholder="Name of your cocktail" required>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" placeholder="Ingredients of your cocktail" required></textarea>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" id="method" name="method" rows="4" placeholder="Method" required></textarea>
                          </div>
                          <button type="button" class="ch-btn-style-1 ch-btn-animated">UPLOAD PHOTO</button>
                          <div class="terms-btn-sec">
                            <div class="row">
                              <div class="col-md-8">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="subscribe" class="consent-checkbox" required>
                                    <span class="consent-text-two">I consent to receiving news and promotional information about Six Brothers.</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <button type="submit" class="ch-btn-style-1 ch-btn-animated">Submit</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  

  <!-- From Beginning -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <!-- text animation -->
  <script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/ScrollTrigger.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/SplitText.min.js') }}"></script>


  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>