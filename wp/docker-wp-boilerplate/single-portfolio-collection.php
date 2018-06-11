<?php get_header(); ?>

<?php if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    include locate_template('includes/portfolio-gallery.php');
  ?>
<?php }} ?>

<?php get_footer(); ?>
