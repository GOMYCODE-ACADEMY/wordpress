<?php
//about theme info
add_action( 'admin_menu', 'podcaster_radio_gettingstarted' );
function podcaster_radio_gettingstarted() {
	add_theme_page( esc_html__('About Podcaster Radio', 'podcaster-radio'), esc_html__('About Podcaster Radio', 'podcaster-radio'), 'edit_theme_options', 'podcaster_radio_guide', 'podcaster_radio_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function podcaster_radio_admin_theme_style() {
	wp_enqueue_style('podcaster-radio-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('podcaster-radio-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'podcaster_radio_admin_theme_style');

//guidline for about theme
function podcaster_radio_mostrar_guide() { 
	//custom function about theme customizer
	$podcaster_radio_return = add_query_arg( array()) ;
	$podcaster_radio_theme = wp_get_theme( 'podcaster-radio' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Podcaster Radio', 'podcaster-radio' ); ?> <span class="version"><?php esc_html_e( 'Version', 'podcaster-radio' ); ?>: <?php echo esc_html($podcaster_radio_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','podcaster-radio'); ?></p>
    </div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="podcaster_radio_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'podcaster-radio' ); ?></button>
			<button class="tablinks" onclick="podcaster_radio_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'podcaster-radio' ); ?></button>
		</div>

		<?php
			$podcaster_radio_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$podcaster_radio_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Podcaster_Radio_Plugin_Activation_Settings::get_instance();
				$podcaster_radio_actions = $plugin_ins->recommended_actions;
				?>
				<div class="podcaster-radio-recommended-plugins">
				    <div class="podcaster-radio-action-list">
				        <?php if ($podcaster_radio_actions): foreach ($podcaster_radio_actions as $key => $podcaster_radio_actionValue): ?>
				                <div class="podcaster-radio-action" id="<?php echo esc_attr($podcaster_radio_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($podcaster_radio_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($podcaster_radio_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($podcaster_radio_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','podcaster-radio'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($podcaster_radio_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'podcaster-radio' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Podcasts are becoming more popular every day. Starting your Podcaster Radio is a great way for your brand to increase its popularity. This theme will help you create a great website for your podcast. The pre-built layout makes it easy to create a podcast, portal or video blog, as well as a video blogging and magazine website. Whether youre hosting audio files or using podcast services, displaying any content type on your website wont be a problem. Responsiveness is a key feature of this theme. It makes it easy to display content on any screen and allows for layout changes according to the screen size. Bootstrap is a framework that developers have used to make everything robust and easy to modify. To modify the themes color or font styles, typography, imagery, or other elements, you dont need to know any programming skills. WP Theme has many shortcodes that can be used to add content spaces, such as the contact page. The widgets included with the theme can be used to manage your content. You can also add them in the footer. Its SEO-friendly design will allow search engines to crawl your site and rank it in top web searches to increase organic traffic. This theme will allow you to create a beautiful website for your podcasts.','podcaster-radio'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'podcaster-radio' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'podcaster-radio' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( PODCASTER_RADIO_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'podcaster-radio' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'podcaster-radio'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'podcaster-radio'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'podcaster-radio'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'podcaster-radio'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'podcaster-radio'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( PODCASTER_RADIO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'podcaster-radio'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'podcaster-radio'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'podcaster-radio'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( PODCASTER_RADIO_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'podcaster-radio'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'podcaster-radio' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','podcaster-radio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','podcaster-radio'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','podcaster-radio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_series_podcast_section') ); ?>" target="_blank"><?php esc_html_e('Podcast Series','podcaster-radio'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','podcaster-radio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','podcaster-radio'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','podcaster-radio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','podcaster-radio'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','podcaster-radio'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','podcaster-radio'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','podcaster-radio'); ?></span><?php esc_html_e(' Go to ','podcaster-radio'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','podcaster-radio'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','podcaster-radio'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','podcaster-radio'); ?></span><?php esc_html_e(' Go to ','podcaster-radio'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','podcaster-radio'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','podcaster-radio'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','podcaster-radio'); ?> <a class="doc-links" href="<?php echo esc_url( PODCASTER_RADIO_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','podcaster-radio'); ?></a></p>
			  	</div>
			</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Podcaster_Radio_Plugin_Activation_Settings::get_instance();
			$podcaster_radio_actions = $plugin_ins->recommended_actions;
			?>
				<div class="podcaster-radio-recommended-plugins">
				    <div class="podcaster-radio-action-list">
				        <?php if ($podcaster_radio_actions): foreach ($podcaster_radio_actions as $key => $podcaster_radio_actionValue): ?>
				                <div class="podcaster-radio-action" id="<?php echo esc_attr($podcaster_radio_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($podcaster_radio_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($podcaster_radio_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($podcaster_radio_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'podcaster-radio' ); ?></h3>
				<hr class="h3hr">
				<div class="podcaster-radio-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','podcaster-radio'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'podcaster-radio' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','podcaster-radio'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','podcaster-radio'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','podcaster-radio'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','podcaster-radio'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=podcaster_radio_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','podcaster-radio'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','podcaster-radio'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

	</div>
</div>

<?php } ?>