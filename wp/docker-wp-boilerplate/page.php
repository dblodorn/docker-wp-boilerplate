<?php /* The template for displaying all pages */ get_header(); ?>

<?php if ( have_posts() ) { ?>
  <section>
  <?php while ( have_posts() ) { the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <article><?php the_content(); ?></article>
  <?php } ?>
  </section>
<?php } ?>

<?php get_footer(); ?>
