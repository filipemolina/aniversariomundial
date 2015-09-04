<?php
/**
 * Newsletters About Dashboard v4.5
 */

/**
 * About This Version administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-admin/admin.php' );

$major_features = array(
	array(
		'src'         => $this -> url() . '/images/about/feature-1.png',
		'heading'     => 'WordPress 4.0+ Compatibility',
		'description' => 'This version is 100% compatible with the latest WordPress version. It will fit nicely into your WordPress dashboard and maximizes the WordPress capabilities for speed, functionality and reliability.',
	),
	array(
		'src'         => $this -> url() . '/images/about/feature-2.png',
		'heading'     => 'Redesigned Interface',
		'description' => 'Both the front-end and the admin dashboard interfaces have been redesigned with new buttons, icons, beautiful charts and amazing illustrations of data.',
	)
);
shuffle( $major_features );

$minor_features = array(
	array(
		'src'         => $this -> url() . '/images/about/feature-3.jpg',
		'heading'     => 'JSON API',
		'description' => 'The JSON API is a direct bridge and communication channel between any code or application and the Newsletter plugin itself, including it\'s database.',
	),
	array(
		'src'         => $this -> url() . '/images/about/feature-4.png',
		'heading'     => 'Bounces Section',
		'description' => 'The bounces section will show you bounces as they happen with a status code, reason, newsletter bounced on and much more.',
	),
	array(
		'src'			=>	$this -> url() . '/images/about/feature-5.png',
		'heading'		=>	'Media Files per Newsletter',
		'description'	=>	'Media files are now linked to and separated by each newsletter individually so that you can easily find your files and images when access a newsletter again.'
	)
);

$tech_features = array(
	array(
		'heading'     => __( 'Taxonomy Roadmap' ),
		'description' => __( 'Terms shared across multiple taxonomies are now split into separate terms.' ),
	),
	array(
		'heading'     => __( 'Template Hierarchy' ),
		/* Translators: 1: singular.php; 2: single.php; 3:page.php */
		'description' => sprintf( __( 'Added %1$s as a fallback for %2$s and %3$s' ), '<code>singular.php</code>', '<code>single.php</code>', '<code>page.php</code>.' ),
	),
	array(
		'heading'     => '<code>WP_List_Table</code>',
		'description' => __( 'List tables can and should designate a primary column.' ),
	),
);

?>

<div class="wrap newsletters about-wrap">
	<h1><?php echo sprintf( 'Welcome to Tribulant Newsletters %s', $this -> version); ?></h1>
	<div class="about-text">
		<?php echo sprintf('Thank you for installing! Tribulant Newsletters %s is more powerful, reliable and versatile than before. It includes many features and improvements to make email marketing easier and more efficient for you.', $this -> version); ?>
	</div>
	<div class="newsletters-badge">
		<div>
			<i class="fa fa-envelope fa-fw" style="font-size: 72px !important; color: white;"></i>
		</div>
		<?php echo sprintf('Version %s', $this -> version); ?>
	</div>

	<div class="feature-section two-col">
		<?php foreach ( $major_features as $feature ) : ?>
		<div class="col">
			<div class="media-container">
				<?php
				// Video.
				if ( is_array( $feature['src'] ) ) :
					echo wp_video_shortcode( array(
						'mp4'      => $feature['src']['mp4'],
						'ogv'      => $feature['src']['ogv'],
						'webm'     => $feature['src']['webm'],
						'loop'     => true,
						'autoplay' => true,
						'width'    => 500,
						'height'   => 284
					) );

				// Image.
				else:
				?>
				<img src="<?php echo esc_url( $feature['src'] ); ?>" />
				<?php endif; ?>
			</div>
			<h3><?php echo $feature['heading']; ?></h3>
			<p><?php echo $feature['description']; ?></p>
		</div>
		<?php endforeach; ?>
	</div>

	<div class="feature-section three-col">
		<?php foreach ( $minor_features as $feature ) : ?>
		<div class="col">
			<div class="minor-img-container">
				<img src="<?php echo esc_attr( $feature['src'] ); ?>" />
			</div>
			<h3><?php echo $feature['heading']; ?></h3>
			<p><?php echo $feature['description']; ?></p>
		</div>
		<?php endforeach; ?>
	</div>
	
	<div class="changelog">
		<h3>New Extension Plugins</h3>
		<div class="feature-section under-the-hood three-col">
			<div class="col">
				<h4>Digital Access Pass</h4>
				<a href="http://tribulant.com/extensions/view/43/digital-access-pass"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/digital-access-pass.png'); ?>" alt="digital-access-pass" /></a>
				<p><?php echo 'This extension plugin allows you to capture Newsletter plugin subscribers from your 3rd party Digital Access Pass application/platform. As customers purchase products/memberships through Digital Access Pass, they will be added as subscribers.'; ?></p>
				<p> <a href="http://tribulant.com/extensions/view/43/digital-access-pass" class="button button button-primary">Digital Access Pass</a></p>
			</div>
			<div class="col">
				<h4>WooCommerce Subscribers</h4>
				<a href="http://tribulant.com/extensions/view/42/woocommerce-subscribers"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/woocommerce-subscribers.png'); ?>" alt="woocommerce-subscribers" /></a>
				<p><?php echo 'WooCommerce Subscribers is a free extension plugin to capture email subscribers from your WooCommerce plugin checkout procedure into your Newsletter plugin.'; ?></p>
				<p> <a href="http://tribulant.com/extensions/view/42/woocommerce-subscribers" class="button button button-primary">WooCommerce Subscribers</a></p>
			</div>
			<div class="col">
				<h4>Google Analytics</h4>
				<a href="http://tribulant.com/extensions/view/46/google-analytics"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/google-analytics.png'); ?>" alt="google-analytics" /></a>
				<p><?php echo 'Google Analytics helps you analyze visitor traffic and paint a complete picture of your audience and their needs, wherever they are along the path.'; ?></p>
				<p> <a href="http://tribulant.com/extensions/view/46/google-analytics" class="button button button-primary">Google Analytics</a></p>
			</div>
		</div>
	</div>
	
	<div class="changelog">
		<h3>New Newsletter Templates</h3>
		<div class="feature-section under-the-hood three-col">
			<div class="col">
				<h4>Magazine</h4>
				<a href="http://tribulant.com/emailthemes/view/3/magazine-newsletter-template"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/news-theme-magazine.jpg'); ?>" alt="magazine" /></a>
				<p>The ideal newsletter template for content rich websites. Display content in multiple content areas with a sidebar as well. Fully responsive with media queries and fluid design.</p>
				<p><a href="http://tribulant.com/emailthemes/view/3/magazine-newsletter-template" class="button button button-primary">Magazine</a></p>
			</div>
			<div class="col">
				<h4>Simple Business</h4>
				<a href="http://tribulant.com/emailthemes/view/1/simple-business-newsletter-template"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/news-theme-simple-business.jpg'); ?>" alt="simple-business" /></a>
				<p>The perfect newsletter theme for your business, whether you want to promote your products and pages or simply update your clients. Fully responsive, fluid and media query versions available.</p>
				<p><a href="http://tribulant.com/emailthemes/view/1/simple-business-newsletter-template" class="button button button-primary">Simple Business</a></p>
			</div>
			<div class="col">
				<h4>Easy Shop</h4>
				<a href="http://tribulant.com/emailthemes/view/2/easy-shop-newsletter-template"><img style="float:left; margin:0 15px 10px 0;" src="<?php echo $this -> render_url('images/about/news-theme-easy-shop.jpg'); ?>" alt="easy-shop" /></a>
				<p>Market and showcase your products in a beautifully elegant eCommerce newsletter template. This professional email theme is fully responsive and created for shop owners.</p>
				<p><a href="http://tribulant.com/emailthemes/view/2/easy-shop-newsletter-template" class="button button button-primary">Easy Shop</a></p>
			</div>
		</div>
		
		<div class="return-to-dashboard">
			<a class="button button-primary button-hero" href="<?php echo admin_url('admin.php?page=' . $this -> sections -> welcome); ?>">Go to Newsletters Overview <i class="fa fa-arrow-right"></i></a>
		</div>
	</div>
</div>