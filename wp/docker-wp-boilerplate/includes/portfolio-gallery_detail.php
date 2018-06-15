<li class="portfolio__item popup-gallery <?php echo $popup_type; ?>">
  <a class="portfolio__image--wrapper  <?php echo $image_style; ?>" style="padding-bottom: <?php echo $proportion; ?>;" href="<?php echo $main_image['sizes']['large']; ?>" data-mfp-src="<?php echo $main_image['sizes']['large']; ?>">
    <img class="lazy" data-src="<?php echo $main_image['sizes']['medium']; ?>">
    <?php include(locate_template('includes/spinner.php')); ?>
  </a>
  <?php foreach ( $details_images as $details_image ): ?>
    <a class="portfolio__detail--image" href="<?php echo $details_image['sizes']['large']; ?>" style="padding-bottom: <?php echo $proportion; ?>;" data-mfp-src="<?php echo $details_image['sizes']['large']; ?>">
      <img src="<?php echo $details_image['sizes']['thumbnail']; ?>" alt="<?php echo $details_image['alt']; ?>" />
    </a>
  <?php endforeach; ?>
</li>
