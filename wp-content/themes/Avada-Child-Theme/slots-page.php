<?php
// Template Name: slot_games
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
			<div id='slot-wrapper'>
				<div id='left-games' class='slot-class'>
          		<?php 
          			$slots = new WP_Query(
          				array(
            				'post_type' => 'slot_games',
							'posts_per_page' => 30
          				)
          			); 
          			while ( $slots->have_posts()) : $slots->the_post(); 
          		?>
					<div class='slots-bg'>
						<div class='slots-thumbnail'>
							<?php the_post_thumbnail('slot-thumb-home'); ?>									
						</div>
						<p class='slots-rating'><?php the_field('slot_text'); ?></p>
						<p class='slots-arie-text'><?php echo get_excerpt(140); ?></p>
						<div class='preview__button slot-modal-buton'>
							<p class='slot-btn-new'>Încearcă-l acum</p>
						</div>
						<div class="slot-modal">
							<div class="slot-modal-wrapper">
								<h2 class="slot-modal-close">X</h2>
								<p style="display: none"><?php the_field('iframe'); ?></p>
								<iframe  src="" class="slot-modal-iframe" width="900" height="500"></iframe>
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
				<h4 class="title-text">Noutăți cazinou</h4>
					<?php
						$args = array(
							'post_type' => 'newsfeed',
							'posts_per_page' => 10,
							'tax_query' => array(
								array(
									'taxonomy' => 'categories',
									'terms'    => 23
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
