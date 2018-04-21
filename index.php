<?php include( 'lib/utils.php' ); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Basic Template</title>

    <?php include( 'partials/common-head.php' ); ?>
  </head>

  <body class="">
  <?php
    $svg_url = 'dist/images/icons.svg';
    echo '<div class="svg-sprite">' . file_get_contents($svg_url) .'</div>';
  ?>
  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.    </div>
  <![endif]-->

  <!-- Add tag manager here -->

    <header class="header" role="banner">
      <div id="skiptocontent"><a class="skip" href="#maincontent">skip to main content</a></div>
      <div class="content-container header-container">
        <test>Header content</test>
      </div>
      <div class="content-container intenal-banner">
        <h1 class="intenal-banner-title">Title</h1>
      </div>
    </header>

    <main id="maincontent" role="main" tabindex="-1">
      <div class="content-container">
        <!-- Start of Standard -->
        <test>Main content</test>
        <!-- End of Standard -->
      </div>
    </main>

    <?php include( 'partials/footer.php' ); ?>
  </body>
</html>
