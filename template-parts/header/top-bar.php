<?php
/**
 * The template part for Middle Header
 *
 * @package Podcaster Radio
 * @subpackage podcaster-radio
 * @since podcaster-radio 1.0
 */
?>

<?php if( get_theme_mod( 'podcaster_radio_topbar_hide_show', false) != '') { ?>
  <div class="top-bar p-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 text-md-start text-center">
          <?php if(get_theme_mod('podcaster_radio_topbar_text') != ''){ ?>
            <p class="topbar-text mb-md-0"><?php echo esc_html(get_theme_mod('podcaster_radio_topbar_text')); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-6 text-md-end text-center">
          <div class="topbar-links">
            <?php if(get_theme_mod('podcaster_radio_topbar_support_link') != ''){ ?>
              <a href="<?php echo esc_url(get_theme_mod('podcaster_radio_topbar_support_link')); ?>" class="support"><?php echo esc_html('Support','podcaster-radio'); ?><span class="screen-reader-text"><?php echo esc_html('Support','podcaster-radio'); ?></span></a>
            <?php }?>
            <?php if(get_theme_mod('podcaster_radio_topbar_wishlist_link') != ''){ ?>
              <a href="<?php echo esc_url(get_theme_mod('podcaster_radio_topbar_wishlist_link')); ?>" class="support"><?php echo esc_html('Wishlist','podcaster-radio'); ?><span class="screen-reader-text"><?php echo esc_html('Wishlist','podcaster-radio'); ?></span></a>
            <?php }?>
            <?php if(get_theme_mod('podcaster_radio_topbar_myaccount_link') != ''){ ?>
              <a href="<?php echo esc_url(get_theme_mod('podcaster_radio_topbar_myaccount_link')); ?>" class="support"><?php echo esc_html('My Account','podcaster-radio'); ?><span class="screen-reader-text"><?php echo esc_html('My Account','podcaster-radio'); ?></span></a>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>