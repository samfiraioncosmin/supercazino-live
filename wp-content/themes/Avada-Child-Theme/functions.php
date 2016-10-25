<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mailchimp', 'http://cdn-images.mailchimp.com/embedcode/classic-10_7.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
/*wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );*/

function theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'mail-chimp', 'http://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array( 'jquery' ), '1.0', true );
}

add_action('wp_enqueue_scripts', 'theme_js');

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

add_theme_support( 'post-thumbnails', array( 'post', 'page', 'article', 'presentation', 'case-study', 'client', 'home-banner', 'people', 'solution', 'tool', 'service', 'associate' ) );

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////   Custom Post Type Display Widget     ////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Cpd_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'cpd_widget', // Base ID
		'CPD Widget', // Name
		array('description' => __( 'Displays your custom posts. Outputs the post thumbnail, title, date and more per listing'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
	return $instance;
}


} //end class Cpd_Widget
register_widget('Cpd_Widget');


function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
	} else {
		$title = '';
		$numberOfListings = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cpd_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Number of Listings:', 'cpd_widget'); ?></label>
		<select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
	<?php
	}

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfListings = $instance['numberOfListings'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->getRealtyListings($numberOfListings);
	echo $after_widget;
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
function get_excerpt($excerpt_length){
$excerpt = get_the_excerpt();
$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $excerpt_length);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
$link = get_permalink();
$excerpt = $excerpt.'... <a href="'.$link.'">Mai mult <i class="fa fa-arrow-right" aria-hidden="true"></i>
</a>';
return $excerpt;
}
/*enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');*/

add_filter('jpeg_quality', function($arg){return 100;});

set_post_thumbnail_size( 550, 550 ); // 50 pixels wide by 50 pixels tall, resize mode

function remove_unwanted_css(){
	wp_dequeue_style('duplicate-post');
	wp_dequeue_style('malinky-ajax-pagination');
	wp_dequeue_style('wp-pagenavi');
}
add_action( 'wp_enqueue_scripts', 'remove_unwanted_css', 100 );

// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'slot-thumb-home', 160, 9999, false );
    add_image_size( 'world-news-thumb-home', 375, 9999, false );
    add_image_size( 'casino-banner-thumb-home', 312, 9999, false );
    add_image_size( 'world-news-thumb-header', 366, 9999, false );
    add_image_size( 'newsfeed-thumb-header-left', 255, 200, false );
    add_image_size( 'world-news-header-left-noutati', 355, 9999, false );
    add_image_size( 'single-blog-image', 566, 9999, false );
}

function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" rel="nofollow"> Mai mult <i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
