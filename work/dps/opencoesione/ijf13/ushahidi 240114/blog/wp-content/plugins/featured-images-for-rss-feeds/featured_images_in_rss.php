<?php
/* 
Plugin Name: Featured Images in RSS w/ Size and Position
Plugin URI: http://wordpress.org/plugins/featured-images-for-rss-feeds/
Description: Adds featured images from posts to your site's RSS feed output, with featured image size and CSS positioning options.
Author: Rob Marlbrough
Version: 1.3.3
Author URI: http://webwizards.net/wordpress/
*/

function featured_images_in_rss($content) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
		firss_settings_init(); // checks and sets default values if options have never been set before.
		$featured_images_in_rss_size = get_option('featured_images_in_rss_size');
		$featured_images_in_rss_css_code = firss_eval_css(get_option('featured_images_in_rss_css'));
		$content = get_the_post_thumbnail( $post->ID, $featured_images_in_rss_size, array( 'style' => $featured_images_in_rss_css_code ) ) . $content;
	}
	return $content;
}

add_filter('the_excerpt_rss', 'featured_images_in_rss', 1000, 1);
add_filter('the_content_feed', 'featured_images_in_rss', 1000, 1);

function firss_eval_css($featured_images_in_rss_css) {
	switch ($featured_images_in_rss_css) {
	case "left-above":
		$featured_images_in_rss_css_code = 'display: block; margin-bottom: 5px;';
		break;
	case "centered-above":
		$featured_images_in_rss_css_code = 'display: block; margin: auto; margin-bottom: 5px;';
		break;
	case "left-wrap":
		$featured_images_in_rss_css_code = 'float: left; margin-right: 5px;';
		break;
	case "right-wrap":
		$featured_images_in_rss_css_code = 'float: right; margin-left: 5px;';
		break;
	default:
		$featured_images_in_rss_css_code = 'display: block; margin-bottom: 5px;';
		break;
	}
	return $featured_images_in_rss_css_code;
}
// Add Options Menu
add_action('admin_menu', 'firss_create_menu');

function firss_create_menu() {
	add_options_page('Featured Images in RSS Feeds', 'Featured Images in RSS Feeds', 'administrator', __FILE__, 'firss_settings_page');
	add_action('admin_init', 'register_firss_settings');
}

function register_firss_settings() {
	register_setting('firss-settings-group', 'featured_images_in_rss_size');
	register_setting('firss-settings-group', 'featured_images_in_rss_css');
}

function firss_settings_init() {
	$featured_images_in_rss_size = get_option('featured_images_in_rss_size');
	if (empty($featured_images_in_rss_size)){
		update_option('featured_images_in_rss_size', 'thumbnail');
		$featured_images_in_rss_size = get_option('featured_images_in_rss_size');
	}
	$featured_images_in_rss_css = get_option('featured_images_in_rss_css');
	if (empty($featured_images_in_rss_css)){
		update_option('featured_images_in_rss_css', 'left-above');
		$featured_images_in_rss_css = get_option('featured_images_in_rss_css');
	}
}
function firss_settings_page() {
	firss_settings_init();
	$featured_images_in_rss_size = get_option('featured_images_in_rss_size');
	$featured_images_in_rss_css = get_option('featured_images_in_rss_css');
	?>
	<div class="wrap">
		<h2>Featured Images In RSS Feeds</h2>
		<h3>by <a href=http://twitter.com/WebWizards target=_blank>Rob Marlbrough</a>, <a href=http://webwizards.net/wordpress/ target=_blank>Web Wizards WordPress Services</a></h3>
		<h4>In partnership with <a href=http://fandommarketing.com/ target=_blank>Fandom Marketing Social Media Services</a></h4>
		<h4>Questions or feature requests? <a href=http://webwizards.net/about-us/contact-us/ target=_blank>Contact us</a>.</h4>
		<form method="post" action="options.php">
			<?php settings_fields( 'firss-settings-group' ); ?>
			<table class="form-table">
		        <tr valign="top">
		            <th scope="column">Choose the featured image size to include in your RSS feeds.</th>
		            <td>
		            <?php $image_sizes = get_intermediate_image_sizes(); ?>
					<select name="featured_images_in_rss_size">
					  <?php foreach ($image_sizes as $size_name) : ?>
						<option value="<?php echo $size_name; ?>"<?php 
						echo ($featured_images_in_rss_size == $size_name ? ' selected="selected"' : ''); 
						?>><?php echo $size_name; ?></option>
					  <?php endforeach; ?>
					</select>
		            </td>
		            <td>(Customize image pixel sizes in
		            <BR /><a href=/wp-admin/options-media.php>Media Options</a>, then you'll need to <a href=http://wordpress.org/plugins/regenerate-thumbnails/ target=_blank>Regenerate Thumbnails</a>.)</th>
		            </td>
		        </tr>
		        <tr>
		            <th scope="column">Choose the positioning of the featured images in your RSS feeds.</th>
		            <td>
		                <select name="featured_images_in_rss_css">
		                   <option value="left-above" <?php echo $featured_images_in_rss_css == 'left-above'?'selected="selected"':''; ?>>Image Left Above Text</option>
		                   <option value="centered-above" <?php echo $featured_images_in_rss_css == 'centered-above'?'selected="selected"':''; ?>>Image Centered Above Text</option>
		                   <option value="left-wrap" <?php echo $featured_images_in_rss_css == 'left-wrap'?'selected="selected"':''; ?>>Image Left Text Wraps</option>
		                   <option value="right-wrap" <?php echo $featured_images_in_rss_css == 'right-wrap'?'selected="selected"':''; ?>>Image Right Text Wraps</option>
		                </select>
		            </td>
		        </tr>
		    </table>
		    <p>(Clear your cache [shift-reload] to view RSS feed changes. Note that Feedburner caches feeds, you can <a href=http://feedburner.google.com/fb/a/pingSubmit?bloglink=<?php echo site_url(); ?> target=_blank>Ping Feedburner</a> so it updates your feed immediately.)
		    <p class="submit"><input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
		</form>
	</div>
<?php } ?>