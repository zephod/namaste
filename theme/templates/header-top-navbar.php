<div class="pre-header"></div>
<header class="banner" role="banner">
  <div class="hidden-xs forrest-social-buttons">
    <a href="#" class="btn btn-info pull-left">
      <i class="icon-large icon-twitter"></i>
    </a>
    <a href="#" class="btn btn-info pull-left">
      <i class="icon-large icon-facebook"></i>
    </a>
    <a href="#" type="button" class="btn btn-info pull-left">
      <i class="icon-large icon-envelope"></i>
    </a>
  </div>
  <div class="container">
    <a class="navbar-brand" href="<?php echo home_url(); ?>/">
      <img src="/build/img/header.png" style="height: 80px;" alt="Forrest Yoga London" />
    </a>
  </div>
</header>
<div class="banner navbar navbar-static-top" role="banner">
  <div class="container">
    <button data-target=".nav-main" data-toggle="collapse" type="button" class="navbar-toggle">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <nav class="nav-main nav-collapse collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</div>
