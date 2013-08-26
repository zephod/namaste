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
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
