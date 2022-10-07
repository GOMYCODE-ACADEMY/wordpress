<?php
/**
 * The template part for displaying post
 *
 * @package Podcaster Radio 
 * @subpackage podcaster-radio
 * @since podcaster-radio 1.0
 */
?>

<?php 
  $podcaster_radio_archive_year  = get_the_time('Y'); 
  $podcaster_radio_archive_month = get_the_time('m'); 
  $podcaster_radio_archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <div class="row">
      <?php if(has_post_thumbnail() && get_theme_mod( 'podcaster_radio_featured_image_hide_show',true) != '') {?>
        <div class="box-image col-lg-6 col-md-6">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <article class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'podcaster_radio_featured_image_hide_show',true) != '') { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'podcaster_radio_toggle_postdate',true) != '' || get_theme_mod( 'podcaster_radio_toggle_author',true) != '' || get_theme_mod( 'podcaster_radio_toggle_comments',true) != '' || get_theme_mod( 'podcaster_radio_toggle_time',true) != '') { ?>
          <div class="post-info p-2 mb-3">
            <?php if(get_theme_mod('podcaster_radio_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $podcaster_radio_archive_year, $podcaster_radio_archive_month, $podcaster_radio_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('podcaster_radio_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('podcaster_radio_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('podcaster_radio_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('podcaster_radio_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'podcaster-radio'), __('0 Comments', 'podcaster-radio'), __('% Comments', 'podcaster-radio') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('podcaster_radio_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('podcaster_radio_meta_field_separator', '|'));?></span> <i class="fas fa-clock me-2"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $podcaster_radio_theme_lay = get_theme_mod( 'podcaster_radio_excerpt_settings','Excerpt');
          if($podcaster_radio_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($podcaster_radio_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( podcaster_radio_string_limit_words( $excerpt, esc_attr(get_theme_mod('podcaster_radio_excerpt_number','30')))); ?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('podcaster_radio_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('podcaster_radio_button_text',__('Read More','podcaster-radio')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('podcaster_radio_button_text',__('Read More','podcaster-radio')));?></span></a>
          </div>
        <?php } ?>
      </article>
    </div>
  </div>
</div>