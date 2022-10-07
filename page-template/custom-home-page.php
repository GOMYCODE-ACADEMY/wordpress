<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'podcaster_radio_before_slider' ); ?>

  <?php if( get_theme_mod( 'podcaster_radio_slider_hide_show', false) != '' || get_theme_mod( 'podcaster_radio_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">        
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'podcaster_radio_slider_speed',4000)) ?>">
        <?php $podcaster_radio_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'podcaster_radio_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $podcaster_radio_pages[] = $mod;
            }
          }
          if( !empty($podcaster_radio_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $podcaster_radio_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( podcaster_radio_string_limit_words( $excerpt, esc_attr(get_theme_mod('podcaster_radio_slider_excerpt_number','20')))); ?></p>
                  <?php if( get_theme_mod('podcaster_radio_slider_button_text','Explore All') != ''){ ?>
                    <div class="more-btn my-3 my-lg-4 my-md-4 wow slideInRight delay-1000" data-wow-duration="2s">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('podcaster_radio_slider_button_text',__('Explore All','podcaster-radio')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('podcaster_radio_slider_button_text',__('Explore All','podcaster-radio')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
        <i class="fas fa-angle-left"></i>
        <span class="screen-reader-text"><?php echo esc_html('Previous','podcaster-radio'); ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
        <i class="fas fa-angle-right"></i>
        <span class="screen-reader-text"><?php echo esc_html('Next','podcaster-radio'); ?></span>
        </button>
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'podcaster_radio_after_slider' ); ?>

  <section id="track-player-sec" class="wow zoomIn delay-1000" data-wow-duration="2s">    
    <div class="tracks-list">  
      <div class="container">    
        <?php $podcaster_radio_track_player_page = array();
          $mod = absint( get_theme_mod( 'podcaster_radio_track_player_page','podcaster-radio'));
          if ( 'page-none-selected' != $mod ) {
            $podcaster_radio_track_player_page[] = $mod;
          }
          if( !empty($podcaster_radio_track_player_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $podcaster_radio_track_player_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $count = 0;
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php the_content(); ?>
              <?php $count++; endwhile; ?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif;
          wp_reset_postdata()
        ?>
      </div>
    </div>
  </section>

  <?php do_action( 'podcaster_radio_after_track_player' ); ?>

  <?php if( get_theme_mod( 'podcaster_radio_series_podcast_small_title', false) != '' || get_theme_mod( 'podcaster_radio_series_podcast_heading', false) != '' || get_theme_mod( 'podcaster_radio_series_podcast_category', false) != '') { ?>
    <section id="podcast-series-section" class="pt-5 px-2 wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
            <div class="series-box-content">
              <?php if( get_theme_mod('podcaster_radio_series_podcast_small_title') != '' ){ ?>
                <strong class="text-lg-start d-block mb-1"><?php echo esc_html(get_theme_mod('podcaster_radio_series_podcast_small_title',''));?></strong>
              <?php }?>
              <?php if( get_theme_mod('podcaster_radio_series_podcast_heading') != '' ){ ?>
                <h2 class="text-lg-start heading-text"><?php echo esc_html(get_theme_mod('podcaster_radio_series_podcast_heading',''));?></h2>
              <?php }?>
            </div>
            <div class="series-category-box pt-5">
                <div class="owl-carousel">
                  <?php
                    $podcaster_radio_catdata=  get_theme_mod('podcaster_radio_series_podcast_category');
                    if($podcaster_radio_catdata){
                  $page_query = new WP_Query(array( 'category_name' => esc_html($podcaster_radio_catdata ,'podcaster-radio'))); ?>         
                    <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                        <div class="catgory-box">
                          <?php the_post_thumbnail(); ?>
                          <div class="inner-catgory-box">
                            <h3 class="mt-3 mt-md-0 mt-lg-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                            <p class="pt-2 pt-md-2 pt-lg-3"><?php $excerpt = get_the_excerpt(); echo esc_html( podcaster_radio_string_limit_words( $excerpt, esc_attr(get_theme_mod('podcaster_radio_services_excerpt_number','30')))); ?></p>
                              <div class="more-btn my-3 my-lg-4 my-md-4">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html('Episodes','podcaster-radio');?><i class="fas fa-play"></i><span class="screen-reader-text"><?php echo esc_html('Episodes','podcaster-radio');?></span></a>
                              </div>
                          </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();}
                  ?>
                </div>
            </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'podcaster_radio_after_podcast_series_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>