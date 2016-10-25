<?php
/**
 * Flexible Posts Widget: Old Default widget template
 * 
 * @since 1.0.0
 *
 * This is the ORIGINAL default template used by the plugin.
 * There is a new default template (default.php) that will be 
 * used by default if no template was specified in a widget.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="cpd-single-header">	
				<a href="<?php echo the_permalink(); ?>">
					<h4 class="title"><?php the_title(); ?></h4>
					<div class="custom-info-field"><?php
						$custom_fields = get_post_custom();
						$my_custom_field = $custom_fields['aginfo'];
						foreach ( $my_custom_field as $key => $value ) {
							echo "<span class='ginfo'>" . $value . "</span>";
						}?>
					</div>
				</a>
				<div class="custom-rating-field"><?php
					$custom_fields = get_post_custom();
					$my_custom_field = $custom_fields['arating'];
					foreach ( $my_custom_field as $key => $value ) {
						echo "<span class='rating'>" . $value . "</span>";
					}?>
				</div>
			</div>
			<p class="game-excerpt"><?php the_excerpt(); ?></p>
			<div class="custom-address-field"><?php
				$custom_fields = get_post_custom();
				$my_custom_field = $custom_fields['address_to_original'];
				foreach ( $my_custom_field as $key => $value ) {
					echo "<span class='address-to-original-wrapper'><a class='address-to-original'>" . $value . "</a></span>";
				}?>
		    </div>
		    <a href="<?php echo the_permalink(); ?>"></a>
			<?php
				if( $thumbnail == true ) {
					// If the post has a feature image, show it
					if( has_post_thumbnail() ) {
						the_post_thumbnail( $thumbsize );
					// Else if the post has a mime type that starts with "image/" then show the image directly.
					} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
						echo wp_get_attachment_image( $post->ID, $thumbsize );
					}
				}?>
			</a>
		</li>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
