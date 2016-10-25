<?php
// Template Name: Bonus
get_header(); ?>
	<div id="content" class="full-width">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>
			<?php the_title( '<h1 class="nodisplay">', '</h1>' ); ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
			<div id='Bonus-id-bg' class="bg-cont-border">
				<?php 
					$bonus = new WP_Query(
						array(
							'post_type' => 'Bonus',
							'posts_per_page' => 21
						)
					); 
					while ($bonus->have_posts()) : $bonus->the_post(); 
				?>
					<div class='bg-games-post'>
						<div class='nr-general'>
							<div class='casino-num'>
								<p class='cazino-number'><?php the_field('numar'); ?></p>
							</div>
						</div>
						<div class='img-general'>
							<div class='cazino-img-cont'>
								<div class='cazino-thumbnail'><?php the_post_thumbnail('slot-thumb-home'); ?></div>
							</div>
						</div>
						<div class= 'titluri-general'>
							<div>
								<p class='cazino-cazino'><?php the_field('h1'); ?></p>
							</div>
							<div>
								<?php echo the_content(); ?>
							</div>
						</div>
						<div class='ratingandbutton-general'>
							<div class='cazino-rating-bg'>
								<p class='cazino-rating'><?php the_field('rating_number'); ?> <i class="fa fa-star" aria-hidden="true"></i></p>
							</div>
							<div class='cazino-button-cont'>
								<div class='cazino-button'><a target="_blank" class='cazino-link' href='<?php the_field('link'); ?>'>Vizitează site</a></div>
							</div>
						</div>

					</div>
				<?php 
					endwhile;
					wp_reset_query();
				?>
		</div>
		<!-- sidebar - added -->
		<div id='newsfeed' class="container-newsf">
			<h4 class="title-text">Noutăți bonus</h4>
			<?php
				$args = array(
					'post_type' => 'newsfeed',
					'posts_per_page' => 10,
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'terms'    => 20
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
		</div>
		<?php endwhile; ?>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
