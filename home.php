<!doctype html>
<html lang="en">

  <head>
    <title>Memory</title>
    <?php include( 'partials/common-head.php' ); ?>
  </head>

  <body class="">
    <div class="svg-sprite">
    </div>
    <!--[if lt IE 8]>
      <div class="alert alert-warning">
        You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.    </div>
    <![endif]-->

    <!-- Add tag manager here -->

    <main id="maincontent" role="main" tabindex="-1">
      
      <article class="home">
        <nav class="home-nav-bar">
          <div class="nav-tabs-container">
            <div class="nav-tab-container">
              <p class="nav-tab-title">
                Journeys
              </p>
              <img  class="nav-icons" src="http://www.lastwilderness.net/wp-content/uploads/blogger/-b0v3zaQwvpQ/T-RbqVeFZ2I/AAAAAAAAFoA/jRj3vmwNatI/s1600/compass-rose.gif" alt="tab icon" width="15" height="15">
            </div>
            <div class="nav-tab-container">
              <p class="nav-tab-title">
                Journeys
              </p>
              <img  class="nav-icons"  src="http://www.lastwilderness.net/wp-content/uploads/blogger/-b0v3zaQwvpQ/T-RbqVeFZ2I/AAAAAAAAFoA/jRj3vmwNatI/s1600/compass-rose.gif" alt="tab icon" width="15" height="15">
            </div>
            <div class="nav-tab-container">
              <p class="nav-tab-title">
                Journeys
              </p>
              <img  class="nav-icons"  src="http://www.lastwilderness.net/wp-content/uploads/blogger/-b0v3zaQwvpQ/T-RbqVeFZ2I/AAAAAAAAFoA/jRj3vmwNatI/s1600/compass-rose.gif" alt="tab icon" width="15" height="15">
            </div>

          </div>
        </nav>
        <header class="home-header reset">
          <h2 class="home-header-title">The journey experts</h2>
        </header>

        <!-- BODY-->
        <div class="home-body-container">

          <!--MAIN BODY HEADER-->
          <div class="home-body-tours-container">
            <h2 class="home-body-titles">popular tours</h2>
            <hr class="home-line margin-center">

            <div class="home-body-tours">
              <div class="home-body-tour tour-classic">
                <div class="home-body-tour-header">
                  <h3 class="home-body-tour-title">the french way</h3>
                </div>
                <p class="home-body-tour-text">The Classic Route</p>
                <!--does and href in a div link to another page-->
                <img class="home-body-tour-goto" src="img/arrow-line.svg" alt="" width="28" height="21">
              </div>
              <div class="home-body-tour tour-costal">
                <div class="home-body-tour-header">
                  <h3 class="home-body-tour-title">the portuguese way</h3>
                </div>
                <p class="home-body-tour-text">the coastal Journey</p>
                <!--does and href in a div link to another page-->
                <img class="home-body-tour-goto" src="img/arrow-line.svg" alt="" width="28" height="21">
              </div>
              <div class="home-body-tour tour-cycle">
                <div class="home-body-tour-header">

                  <h3 class="home-body-tour-title">the portuguese way</h3>

                </div>
                <p class="home-body-tour-text">Cycle the Journey</p>
                <!--does and href in a div link to another page-->
                <img class="home-body-tour-goto" src="img/arrow-line.svg" alt="" width="28" height="21">
              </div>
              <div class="home-body-tour tour-rome">
                <div class="home-body-tour-header">
                  <h3 class="home-body-tour-title
              ">the via Francigena</h3>
                </div>
                <p class="home-body-tour-text">Journey to Rome</p>
                <!--does and href in a div link to another page-->
                <img class="home-body-tour-goto" src="img/arrow-line.svg" alt="" width="28" height="21">
              </div>
              <div class="home-body-tour  tour-end-of-the-world">
                <div class="home-body-tour-header">
                  <h3 class="home-body-tour-title
              ">The Finisterre Way</h3>
                </div>
                <p class="home-body-tour-text">The End of the World</p>
                <!--does and href in a div link to another page-->
                <img class="home-body-tour-goto" src="img/arrow-line.svg" alt="" width="28" height="21">
              </div>

            </div>
            <a class="button home-button home-body-tours-link" href="#">View all the Ways</a>
          </div>
        </div>
        <!--MAIN BODY CONTENT-->
        <div class="home-route-planner-container">
          <h2 class="home-body-titles">create your own route</h2>
          <p class="home-route-planner-text">Already know where you want to go? So lorem ipsum dolor sit amet. Sed auctor condimentum mi at malesuada. Sed in ullamcorper dui. Proin pretium velit sapien, quis elementum ipsum accumsan eu. Mauris egestas eget velit at dignissim.</p>
          <div class="home-route-planner">
            <form class="planner-form">
              <div class="home-route-planner-variables">
                <select id="region_variable" name="region_variable" class="home-route-planner-variable-region form-variable">
              <option value="Region">region</option>
                  <option value="x">x</option>
                  <option value="y">y</option>
                  <option value="z">z</option>
                </select>
                <select id="region_variable" name="region_variable" class="home-route-planner-variable-way form-variable">
              <option value="ways">ways</option>
                  <option value="x">x</option>
                  <option value="y">y</option>
                  <option value="z">z</option>
                </select>
                <select id="region_variable" name="region_variable" class="home-route-planner-variable-start-date form-variable">
              <option value="start-date">start date</option>
                  <option value="x">x</option>
                  <option value="y">y</option>
                  <option value="z">z</option>
                </select>
                <select id="region_variable" name="region_variable" class="home-route-planner-variable-end-date form-variable">
                                    <option value="end-date">end date</option>
                  <option value="x">x</option>
                  <option value="y">y</option>
                  <option value="z">z</option>
                </select>
              </div>

              <input class="home-button" type="submit" value="Create my Way">
            </form>
          </div>
        </div>
        <div class="home-body-about">
          <div class="home-body-about-content">
            <svg viewBox="0 0 33.96 32" width="100%" height="100%" class="home-body-about-icon">
           <path d="M24.96 30.3c-6.4-3.5-12.7-7-18.8-10.4l11 11c-.4.4-.6.7-1 1.1-3.8-3.7-7.6-7.3-11.4-10.9 1.2 2.6 2.5 5 3.9 7.6a7.46 7.46 0 0 0-1.2.7l-3.9-6.6a4.05 4.05 0 0 1-.9.5c-.6.1-.9-.1-.8-.8a6.72 6.72 0 0 0-1.3-5.1 2.7 2.7 0 0 1 0-3.3 10.49 10.49 0 0 0 1.4-2.8 15.82 15.82 0 0 0 .1-3.1c.7-.1 1.4-.3 1.6.8 1.5-2.3 2.9-4.5 4.4-6.7a9.14 9.14 0 0 1 1.4.7c-1.6 2.4-3.1 4.8-4.6 7.1 4-3.3 7.9-6.7 11.8-10.1a8.74 8.74 0 0 0 1 .8c-3.8 3.5-7.5 7-11.3 10.4 0 .1.1.1.1.2 6-3 12.2-6.3 18.5-9.5.2.4.4.7.6 1.1-6.3 3.3-12.5 6.6-18.7 9.9 0 .1 0 .1.1.2 8-1.9 16.1-3.8 24.2-5.7.1.5.2.8.3 1.2-8 2.1-16 4.1-24.1 6.2a.55.55 0 0 0 .5.2c7.7.1 15.2.1 22.8.2a17.7 17.7 0 0 1 2.3.1c.5 0 1-.2 1 .7s-.6.6-1 .6h-12c-4.2 0-8.3-.1-12.5-.1h-.9a.37.37 0 0 1-.1.3c8 2.2 16 4.4 24 6.7l-.3 1.2-24.6-6.3c0 .1-.1.1-.1.2 6.3 3.5 12.7 7.1 19.1 10.7.2-.1-.4.6-.6 1z"></path>
</svg>
            <h2 class="home-body-titles">about us</h2>
            <p class="home-body-about-text">
              JourneyWays.com is a truly international, friendly and well-travelled multicultural team of professionals. We are a cycling and walking holiday specialist with many years of experience organising tours on the many Camino de Santiago routes across Spain,
              Portugal and France. More than a pilgrimage, the Camino is a unique cultural experience and trip of a lifetime.
            </p>
            <div class="home-body-about-link"><a class="button home-button margin-center" href="#">Learn more</a></div>

          </div>
        </div>
        <div class="home-experiences">
          <h2 class="home-body-titles">
            experience
          </h2>
          <div class="home-experiences-links">
            <div class="home-experiences-memories-link-container">
              <a class="home-experiences-memories" href="#">
                <div class="experiences-memories-header">
                  <h3 class="home-experiences-memories-overtitle">Journey</h3>
                  <h4 class="home-experiences-memories-title">memories</h4>
                </div>

                <p class="home-body-experiences-memories_link-text">
                  Read peoples memories and experiences in their Journeys
                </p>
              </a>
            </div>
            <div class="home-experiences-links-container">
              <a class="other-links" href="#">
                <img>
                <h3 class="title??">blog</h3>
                <p class="home-body-text-black home-body-experiences-link-text">
                Read our latest posts
to see the best of the Journeys
                </p>
              </a>
              <a class="other-links" href="#">
                  <img>
                  <h3 class="title??">videos</h3>
                  <p class="home-body-text-black home-body-experiences-link-text">
                  Know more about our Journeys with our videos
                  </p>
                </a>
              <a class="other-links" href="#">
                  <img>
                  <div>
                    <h3 class="title??">review</h3>
                  <p class="home-body-text-black home-body-experiences-link-text">
                  Read peoples reviews of their Journeys.
                  </p>
                  </div>
                  
                </a>
              <a class="other-links" href="#">
                  <img>
                  <h3 class="title??">podcast</h3>
                  <p class="home-body-text-black home-body-experiences-link-text">
                  Hear great content about the Journeys
                  </p>
                </a>
            </div>
          </div>
          <a class="button home-button home-body-experiences-all-link" href="#">View all the</a>
        </div>
        <hr class="home-line margin-center">
        <form class="home-newsletter-form">
          <div class="home-newsletter-form-header">

            <h2 class="newsletter-title"> subscribe to our<br>
              <span>newsletter</span>
            </h2>
            <p class="home-body-text-white home-newsletter-text">
              lots ad lots of text o all keinfs becaosujölk definaly deadn id ca tht is the the way if it.babaly tom pay cas why the fuk not.
            </p>
          </div>
          <div class="newsletter-form-input">
            <input class="subscription_form-variable half-round-left" type="text" id="subscription_fullname" name="fullname" placeholder="Full Name">
            <input class="subscription_form-variable half-round-right" type="text" id="subscription_email" name="email" placeholder="Email">
            <input class="home-button" type="submit" value="subscribe">
          </div>
        </form>
        <footer>
          <div class="home-footer-container">
            <div class="footer-content">
              <div class="footer-logo">
          <p class="footer-logo-title">journey
          </p>
          <svg viewBox="0 0 33.96 32" width="100%" height="100%" class="footer-logo-icon">
           <path d="M24.96 30.3c-6.4-3.5-12.7-7-18.8-10.4l11 11c-.4.4-.6.7-1 1.1-3.8-3.7-7.6-7.3-11.4-10.9 1.2 2.6 2.5 5 3.9 7.6a7.46 7.46 0 0 0-1.2.7l-3.9-6.6a4.05 4.05 0 0 1-.9.5c-.6.1-.9-.1-.8-.8a6.72 6.72 0 0 0-1.3-5.1 2.7 2.7 0 0 1 0-3.3 10.49 10.49 0 0 0 1.4-2.8 15.82 15.82 0 0 0 .1-3.1c.7-.1 1.4-.3 1.6.8 1.5-2.3 2.9-4.5 4.4-6.7a9.14 9.14 0 0 1 1.4.7c-1.6 2.4-3.1 4.8-4.6 7.1 4-3.3 7.9-6.7 11.8-10.1a8.74 8.74 0 0 0 1 .8c-3.8 3.5-7.5 7-11.3 10.4 0 .1.1.1.1.2 6-3 12.2-6.3 18.5-9.5.2.4.4.7.6 1.1-6.3 3.3-12.5 6.6-18.7 9.9 0 .1 0 .1.1.2 8-1.9 16.1-3.8 24.2-5.7.1.5.2.8.3 1.2-8 2.1-16 4.1-24.1 6.2a.55.55 0 0 0 .5.2c7.7.1 15.2.1 22.8.2a17.7 17.7 0 0 1 2.3.1c.5 0 1-.2 1 .7s-.6.6-1 .6h-12c-4.2 0-8.3-.1-12.5-.1h-.9a.37.37 0 0 1-.1.3c8 2.2 16 4.4 24 6.7l-.3 1.2-24.6-6.3c0 .1-.1.1-.1.2 6.3 3.5 12.7 7.1 19.1 10.7.2-.1-.4.6-.6 1z"></path>
          </svg>
          <svg class="logo-background-form">
            <polygon  points="0,0 190,0 140,56 0,56"
            style="fill:white;stroke-width:5;"/>
          </svg>
          </div>
          <div class="footer-main-content">
            <div class="footer-links">
            <ul class="footer-links-list">
              <li class="footer-link">tours</li>
              <li class="footer-link">about</li>
              <li class="footer-link">experiences</li>
              <li class="footer-link">contact</li>
              <li class="footer-link">deals</li>
              <li class="footer-link">terms  conditions</li>
              <li class="footer-link">privacy policy</li>
            </ul>
          </div>
          
                      <div class="home-footer-socialmedia">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-pinterest"></a>
              <a href="#" class="fa fa-instagram"></a>
              <a href="#" class="fa fa-google"></a>
            </div>
          </div>
          <div class="footer-contact-email">
          <a class="footer-button" href="#">email us</a>
          </div>
            </div>
          
          
          </div>
        </footer>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
            <footer class="footer" role="contentinfo">
              <div class="footer-container">
                <test>Footer content</test>
              </div>
              <div class="cookie-notice-full-container js-cookie-notice-full-container">
                <div class="content-container cookie-notice-container">
                  <div class="cookie-notice-content">
                    We use cookies to give you the best online experience. By using our website you agree to our use of cookies in accordance with our cookie policy.

                    <a href="#" class="cookie-notice-link" tabindex="1">Read More</a>
                  </div>
                  <div class="cookie-notice-cta-container">
                    <a href="#" class="cookie-notice-cta js-cookie-notice-cta" tabindex="1">Accept</a>
                  </div>
                </div>
              </div>
              <div class="reminder-banner">
                <div class="reminder-banner-content">
                  <img class="reminder-banner-icon" src="https://cdn.onlinewebfonts.com/svg/img_541.png" alt="gift" height="20" width="20">
                  <span class="reminder-banner-text"><span class="reminder-banner-text-bold">great deals:</span>
                  on valentines day, all tours 20% off for 2 people
                  <a class="reminder-button" href="#">book now</a>
                </div>
                  
                  <img class="reminder-banner-x-icon"src="https://image.flaticon.com/icons/png/512/69/69324.png" alt="x" height="15px" width="15px">

              </div>
            </footer>
  </body>

</html>
