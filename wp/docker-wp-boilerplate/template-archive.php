<?php /* Template Name: Post Type Archive */ get_header();
$loop = new WP_Query( array(
    'post_type' => 'portfolio-collection',
    'posts_per_page' => -1
  )
);
?>

<section class="portfolio">
  <ul class="portfolio__grid col_two">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li class="portfolio__item">
        <a class="portfolio__image--wrapper cover" style="padding-bottom: 100%;" href="<?php the_permalink(); ?>">
          <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $thumb_url = $thumb_url_array[0];
          ?>
          <img class="lazy" data-src="<?php echo $thumb_url; ?>">
          <div class="portfolio__item--title">
            <p><?php the_title(); ?></p>
          </div>
          <?php include(locate_template('includes/spinner.php')); ?>
        </a>
      </li>
    <?php endwhile; wp_reset_query(); ?>
  </ul>
</section>

<?php get_footer(); ?>


