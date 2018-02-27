<?php /* The template for displaying all single posts */ get_header(); ?>

<?php if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    include locate_template('includes/utils/simple-content.php');
  ?>
<?php }} ?>

<?php get_footer(); ?>
