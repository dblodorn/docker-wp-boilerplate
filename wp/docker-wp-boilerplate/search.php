<?php /* The template for displaying search results pages */ get_header(); ?>

<section>
  <?php include locate_template('/includes/utils/search-form.php')?>
  <?php if ( have_posts() ) : ?>
    <ul>
      <?php while ( have_posts() ) : the_post(); ?>
        <li>
          <a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
          </a>
          <?php the_excerpt(); ?>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php include locate_template('/includes/utils/pagination.php'); ?>
  <?php else: ?>
    <h2>SORRY NO SEARCH RESULTS</h2>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
