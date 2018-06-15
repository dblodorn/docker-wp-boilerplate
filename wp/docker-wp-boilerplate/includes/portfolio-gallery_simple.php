<li class="portfolio__item">
  <a class="portfolio__image--wrapper <?php echo $popup_type; ?> <?php echo $image_style; ?>" style="padding-bottom: <?php echo $proportion; ?>;" href="<?php echo $images_image['sizes']['large']; ?>" data-mfp-src="<?php echo $images_image['sizes']['large']; ?>">
    <?php if ( $columns == 'col_one_wide' ) : ?>
      <img class="lazy" data-src="<?php echo $images_image['sizes']['large']; ?>">
    <?php else: ?>
      <img class="lazy" data-src="<?php echo $images_image['sizes']['medium']; ?>">
    <?php endif; ?>
    <?php include(locate_template('includes/spinner.php')); ?>
  </a>
</li>
