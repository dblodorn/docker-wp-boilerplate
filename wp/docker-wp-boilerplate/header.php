<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include(locate_template('includes/utils/inline-css.php')); ?>
  <?php wp_head(); ?>
  <?php wp_site_icon(); ?>
</head>
<body <?php body_class(); ?>>
<?php include(locate_template('includes/header/header-content.php')); ?>
<main>
