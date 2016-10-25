<?php
// Template Name: cazino_live
get_header(); ?>
	<div id="content" class="full-width">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>
			<?php the_title( '<h1 class="nodisplay">', '</h1>' ); ?>
			<div class="post-content">
				<?php the_content(); ?>
				<div id='cazino-id-bg' class="bg-cont-border">
				<?php 
					$cazino = new WP_Query(
						array(
							'post_type' => 'cazino_live'
						)
					); 
					while($cazino->have_posts()) : $cazino->the_post(); 
				?>
					<div class='cazino-bg'>
						<div class="cazino-game-header">
							<div class='casino-num'>
								<p class='cazino-number'><?php the_field('numar'); ?></p>
							</div>
							<p class='cazino-titlu'><?php the_field('titlu'); ?></p>
							<p class='cazino-cazino'><?php the_field('cazino');?></p>
							<p class='cazino-rating'><?php the_field('rating'); ?> <i class="fa fa-star" aria-hidden="true"></i></p>
						</div>
						<div class='preview__button cazino-button-cont'>
							<a target="_blank" class='button--wide hue-pri' href='<?php the_field('link'); ?>'>Joacă acum!</a>
						</div>
						<div class="cazino-text-cont">
							<?php echo the_content(); ?>
						</div>
						<div class='cazino-img-cont'>
							<div class='cazino-thumbnail'><?php the_post_thumbnail('slot-thumb-home'); ?></div>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_query(); 
				?>
			</div>
			<!-- sidebar - added -->
			<div id='newsfeed' class="container-newsf">
				<h4 class="title-text">Noutăți cazinou live</h4>
				<?php
					$args = array(
						'post_type' => 'newsfeed',
						'posts_per_page' => 10,
						'tax_query' => array(
							array(
								'taxonomy' => 'categories',
								'terms'    => 19
							),
						),
					);
					$query = new WP_Query($args);
					while($query -> have_posts()) : $query -> the_post();
						get_template_part( 'partials/right-sidebar-articles' );
					endwhile; 
					wp_reset_query(); 
				?>
				<div class='more-posts'>
					<a href='/newsfeed'>Vezi toate noutățile!</a>
				</div>
			</div>
			<!-- sidebar - end -->
		</div>
		<?php endwhile; ?>
</div>

<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
