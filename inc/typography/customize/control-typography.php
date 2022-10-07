<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Podcaster_Radio_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'podcaster-radio-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'podcaster-radio' ),
				'family'      => esc_html__( 'Font Family', 'podcaster-radio' ),
				'size'        => esc_html__( 'Font Size',   'podcaster-radio' ),
				'weight'      => esc_html__( 'Font Weight', 'podcaster-radio' ),
				'style'       => esc_html__( 'Font Style',  'podcaster-radio' ),
				'line_height' => esc_html__( 'Line Height', 'podcaster-radio' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'podcaster-radio' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'podcaster-radio-ctypo-customize-controls' );
		wp_enqueue_style(  'podcaster-radio-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'podcaster-radio' ),
        'Abril Fatface' => __( 'Abril Fatface', 'podcaster-radio' ),
        'Acme' => __( 'Acme', 'podcaster-radio' ),
        'Anton' => __( 'Anton', 'podcaster-radio' ),
        'Architects Daughter' => __( 'Architects Daughter', 'podcaster-radio' ),
        'Arimo' => __( 'Arimo', 'podcaster-radio' ),
        'Arsenal' => __( 'Arsenal', 'podcaster-radio' ),
        'Arvo' => __( 'Arvo', 'podcaster-radio' ),
        'Alegreya' => __( 'Alegreya', 'podcaster-radio' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'podcaster-radio' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'podcaster-radio' ),
        'Bangers' => __( 'Bangers', 'podcaster-radio' ),
        'Boogaloo' => __( 'Boogaloo', 'podcaster-radio' ),
        'Bad Script' => __( 'Bad Script', 'podcaster-radio' ),
        'Bitter' => __( 'Bitter', 'podcaster-radio' ),
        'Bree Serif' => __( 'Bree Serif', 'podcaster-radio' ),
        'BenchNine' => __( 'BenchNine', 'podcaster-radio' ),
        'Cabin' => __( 'Cabin', 'podcaster-radio' ),
        'Cardo' => __( 'Cardo', 'podcaster-radio' ),
        'Courgette' => __( 'Courgette', 'podcaster-radio' ),
        'Cherry Swash' => __( 'Cherry Swash', 'podcaster-radio' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'podcaster-radio' ),
        'Crimson Text' => __( 'Crimson Text', 'podcaster-radio' ),
        'Cuprum' => __( 'Cuprum', 'podcaster-radio' ),
        'Cookie' => __( 'Cookie', 'podcaster-radio' ),
        'Chewy' => __( 'Chewy', 'podcaster-radio' ),
        'Days One' => __( 'Days One', 'podcaster-radio' ),
        'Dosis' => __( 'Dosis', 'podcaster-radio' ),
        'Droid Sans' => __( 'Droid Sans', 'podcaster-radio' ),
        'Economica' => __( 'Economica', 'podcaster-radio' ),
        'Fredoka One' => __( 'Fredoka One', 'podcaster-radio' ),
        'Fjalla One' => __( 'Fjalla One', 'podcaster-radio' ),
        'Francois One' => __( 'Francois One', 'podcaster-radio' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'podcaster-radio' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'podcaster-radio' ),
        'Great Vibes' => __( 'Great Vibes', 'podcaster-radio' ),
        'Handlee' => __( 'Handlee', 'podcaster-radio' ),
        'Hammersmith One' => __( 'Hammersmith One', 'podcaster-radio' ),
        'Inconsolata' => __( 'Inconsolata', 'podcaster-radio' ),
        'Indie Flower' => __( 'Indie Flower', 'podcaster-radio' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'podcaster-radio' ),
        'Julius Sans One' => __( 'Julius Sans One', 'podcaster-radio' ),
        'Josefin Slab' => __( 'Josefin Slab', 'podcaster-radio' ),
        'Josefin Sans' => __( 'Josefin Sans', 'podcaster-radio' ),
        'Kanit' => __( 'Kanit', 'podcaster-radio' ),
        'Lobster' => __( 'Lobster', 'podcaster-radio' ),
        'Lato' => __( 'Lato', 'podcaster-radio' ),
        'Lora' => __( 'Lora', 'podcaster-radio' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'podcaster-radio' ),
        'Lobster Two' => __( 'Lobster Two', 'podcaster-radio' ),
        'Merriweather' => __( 'Merriweather', 'podcaster-radio' ),
        'Monda' => __( 'Monda', 'podcaster-radio' ),
        'Montserrat' => __( 'Montserrat', 'podcaster-radio' ),
        'Muli' => __( 'Muli', 'podcaster-radio' ),
        'Marck Script' => __( 'Marck Script', 'podcaster-radio' ),
        'Noto Serif' => __( 'Noto Serif', 'podcaster-radio' ),
        'Open Sans' => __( 'Open Sans', 'podcaster-radio' ),
        'Overpass' => __( 'Overpass', 'podcaster-radio' ),
        'Overpass Mono' => __( 'Overpass Mono', 'podcaster-radio' ),
        'Oxygen' => __( 'Oxygen', 'podcaster-radio' ),
        'Orbitron' => __( 'Orbitron', 'podcaster-radio' ),
        'Patua One' => __( 'Patua One', 'podcaster-radio' ),
        'Pacifico' => __( 'Pacifico', 'podcaster-radio' ),
        'Padauk' => __( 'Padauk', 'podcaster-radio' ),
        'Playball' => __( 'Playball', 'podcaster-radio' ),
        'Playfair Display' => __( 'Playfair Display', 'podcaster-radio' ),
        'PT Sans' => __( 'PT Sans', 'podcaster-radio' ),
        'Philosopher' => __( 'Philosopher', 'podcaster-radio' ),
        'Permanent Marker' => __( 'Permanent Marker', 'podcaster-radio' ),
        'Poiret One' => __( 'Poiret One', 'podcaster-radio' ),
        'Quicksand' => __( 'Quicksand', 'podcaster-radio' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'podcaster-radio' ),
        'Raleway' => __( 'Raleway', 'podcaster-radio' ),
        'Rubik' => __( 'Rubik', 'podcaster-radio' ),
        'Rokkitt' => __( 'Rokkitt', 'podcaster-radio' ),
        'Russo One' => __( 'Russo One', 'podcaster-radio' ),
        'Righteous' => __( 'Righteous', 'podcaster-radio' ),
        'Slabo' => __( 'Slabo', 'podcaster-radio' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'podcaster-radio' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'podcaster-radio'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'podcaster-radio' ),
        'Sacramento' => __( 'Sacramento', 'podcaster-radio' ),
        'Shrikhand' => __( 'Shrikhand', 'podcaster-radio' ),
        'Tangerine' => __( 'Tangerine', 'podcaster-radio' ),
        'Ubuntu' => __( 'Ubuntu', 'podcaster-radio' ),
        'VT323' => __( 'VT323', 'podcaster-radio' ),
        'Varela Round' => __( 'Varela Round', 'podcaster-radio' ),
        'Vampiro One' => __( 'Vampiro One', 'podcaster-radio' ),
        'Vollkorn' => __( 'Vollkorn', 'podcaster-radio' ),
        'Volkhov' => __( 'Volkhov', 'podcaster-radio' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'podcaster-radio' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'podcaster-radio' ),
			'100' => esc_html__( 'Thin',       'podcaster-radio' ),
			'300' => esc_html__( 'Light',      'podcaster-radio' ),
			'400' => esc_html__( 'Normal',     'podcaster-radio' ),
			'500' => esc_html__( 'Medium',     'podcaster-radio' ),
			'700' => esc_html__( 'Bold',       'podcaster-radio' ),
			'900' => esc_html__( 'Ultra Bold', 'podcaster-radio' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'podcaster-radio' ),
			'normal'  => esc_html__( 'Normal', 'podcaster-radio' ),
			'italic'  => esc_html__( 'Italic', 'podcaster-radio' ),
			'oblique' => esc_html__( 'Oblique', 'podcaster-radio' )
		);
	}
}
