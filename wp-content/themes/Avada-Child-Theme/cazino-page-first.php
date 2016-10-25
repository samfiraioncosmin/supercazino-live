<?php
// Template Name: casino_games
get_header(); ?>
	<div id="content" class="full-width">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>
			<div class="post-content">
				<?php the_content(); ?>
<div id='cazino-id-bg'>
<?php $cazino = new WP_Query(array(
'post_type' => 'casino_games'
)); ?>
<?php while($cazino->have_posts()) : $cazino->the_post(); ?>
	<div class='cazino-bg'>
		<div class="cazino-game-header">
			<p class='cazino-number'><?php the_field('numar'); ?></p>
			<p class='cazino-titlu'><?php the_field('titlu'); ?></p>
			<p class='cazino-cazino'><?php the_field('cazino');?></p>
			<p class='cazino-rating'><img class="rating-star" src="http://fiipenet.ro/work/wordpress/wp-content/uploads/2016/08/star.png"><?php the_field('rating'); ?></p>
		</div>
			<div class='cazino-button'><a class='cazino-link'href='<?php the_field('link'); ?>'>Go to game</a></div>
			<p class='cazino-arie-text'><?php the_field('arie_text'); ?></p>
			<div class='cazino-thumbnail'><?php the_post_thumbnail('medium_large'); ?></div>
			<h1 class='display-none'><?php the_title(); ?></h1>
    </div>
  <?php endwhile; ?>
</div>
				<?php avada_link_pages(); ?>
			</div>
			<?php if( ! post_password_required($post->ID) ): ?>
			<?php if ( Avada()->settings->get( 'comments_pages') ): ?>
				<?php
				wp_reset_query();
				comments_template();
				?>
			<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
