<?php
/**
 *
 * @package Pictorico
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses pictorico_header_style()
 * @uses pictorico_admin_header_style()
 * @uses pictorico_admin_header_image()
 */
function pictorico_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'pictorico_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '07a1f2',
		'width'                  => 1200,
		'height'                 => 525,
		'flex-height'            => true,
		'wp-head-callback'       => 'pictorico_header_style',
		'admin-head-callback'    => 'pictorico_admin_header_style',
		'admin-preview-callback' => 'pictorico_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'pictorico_custom_header_setup' );

if ( ! function_exists( 'pictorico_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see pictorico_custom_header_setup().
 */
function pictorico_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // pictorico_header_style

if ( ! function_exists( 'pictorico_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see pictorico_custom_header_setup().
 */
function pictorico_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
			max-width: 1180px;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
			border-right: 1px solid rgb(204, 204, 204);
			display: inline-block;
			font-family: 'Open Sans Condensed', Helvetica, Arial, sans-serif;
			font-size: 37px;
			font-style: normal;
			font-weight: bold;
			line-height: 39.59999084472656px;
			margin: 0;
			padding: 6px 30px;
			text-transform: uppercase;
			width: auto;
		}
		#headimg h1 a {
			text-decoration: none
		}
		#desc {
		}
		#headimg img {
		}
		.site-branding {
			background: white;
			max-width: 295px;
			padding-right: 30px;
		}
		.header-image {
			background-position: center;
			background-repeat: no-repeat;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			height: 525px;
		}
	</style>
<?php
}
endif; // pictorico_admin_header_style

if ( ! function_exists( 'pictorico_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see pictorico_custom_header_setup().
 */
function pictorico_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<div class="site-branding">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<?php if ( get_header_image() ) : ?>
		<div style="background-image:url(<?php header_image(); ?>)" class="header-image"></div>
		<?php endif; ?>
	</div>
<?php
}
endif; // pictorico_admin_header_image
