<section class="portfolio">
  <?php if ( have_rows( 'image_gallery' ) ): ?>
    <?php while ( have_rows( 'image_gallery' ) ) : the_row(); ?>
      <?php if ( get_row_layout() == 'single_image_popup' ) : ?>
        <?php
          $columns = get_sub_field( 'columns' );
          $images_images = get_sub_field( 'images' );
          $proportion = get_sub_field( 'proportion' );
          $image_style = get_sub_field( 'image_style' );
          $popup_type = 'single-image-popup';
        ?>
        <?php if ( $images_images ) :  ?>
          <ul class="portfolio__grid <?php echo $columns; ?>">
          <?php foreach ( $images_images as $images_image ): ?>
            <?php include(locate_template('includes/portfolio-gallery_simple.php')); ?>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      <?php elseif ( get_row_layout() == 'slideshow_popup' ) : ?>
        <?php
          $columns = get_sub_field( 'columns' );
          $images_images = get_sub_field( 'images' );
          $proportion = get_sub_field( 'proportion' );
          $image_style = get_sub_field( 'image_style' );
          $popup_type = 'slideshow-popup';
        ?>
        <?php if ( $images_images ) :  ?>
          <ul class="portfolio__grid <?php echo $columns; ?>">
          <?php foreach ( $images_images as $images_image ): ?>
            <?php include(locate_template('includes/portfolio-gallery_simple.php')); ?>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      <?php elseif ( get_row_layout() == 'details_popup' ) : ?>
        <?php
          $columns = get_sub_field( 'columns' );
          $proportion = get_sub_field( 'proportion' );
          $images_images = get_sub_field( 'images' );
          $image_style = get_sub_field( 'image_style' );
          $popup_type = 'details-popup';
        ?>
        <?php if ( have_rows( 'images' ) ) : ?>
          <ul class="portfolio__grid <?php echo $columns; ?>">
            <?php while ( have_rows( 'images' ) ) : the_row(); ?>
              <?php $main_image = get_sub_field( 'main_image' ); ?>
              <?php $details_images = get_sub_field( 'details' ); ?>
              <?php include(locate_template('includes/portfolio-gallery_detail.php')); ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <?php // no layouts found ?>
  <?php endif; ?>
</section>
