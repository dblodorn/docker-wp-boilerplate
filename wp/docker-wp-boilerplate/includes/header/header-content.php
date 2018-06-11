<?php $blog_title = get_bloginfo( 'name' ); ?>
<span id="top"></span>
<header class="top">
  <div class="inner-header">
    <div class="inner-header__burger-wrapper">
      <?php include(locate_template('includes/header/hamburger.php')); ?>
    </div>
    <a id="logo" href="/">
      <span><?php echo $blog_title; ?></span>
    </a>
    <?php /* Left Menu */
      wp_nav_menu(array(
        'menu' => 'main-menu',
        'container_class' => 'header-menu__wrapper',
        'menu_class' => 'header-menu__ul'
      ));
    ?>
  </div>
</header>
