<?php
// Template Name: Promotii_archive
get_header(); ?>


<div id='left-games' class="bg-cont-border">
	<h4 class="title-text">Promoții!</h4>
	<h1 class="nodisplay">Stiri interesante!</h1>
	 	<?php
		 	$args = array(
		 		'post_type' => 'promote_page',
				'paged' => get_query_var('page'),
				'posts_per_page' => 10
		 	);
		 	$query = new WP_Query($args);
		 	while($query -> have_posts()) : $query -> the_post();
	 	?>
		 	<div class="post clearfix">
		 		<div class='newsfeed-img newsfeed-img-2 column-2-left'>
						<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('newsfeed-thumb-header-left'); ?></a>
	 			</div>
			<div class='newsfeed-cont-wrap padding-left'>
			 	<div class='newsfeed-title'>
						<a href='<?php the_permalink(); ?>'><h5><?php the_title(); ?></h5></a>
			 	</div>
				<div class='newsfeed-excerpt'>
			 		<?php echo the_excerpt(); ?>
				</div>
			</div>
		</div>
	 	<?php 
	 		endwhile;
			wp_pagenavi( array( 'query' => $query ) );
			wp_reset_postdata(); 
		?>

</div>

<!-- sidebar - added -->
	<div id='right-games' class='games-right-side bg-cont-border'>
		<h4 class="title-text">Cazinou</h4>
			<?php
				$args = array(
					'post_type' => 'casino_banner',
					'posts_per_page' => 6,
				);
				$query = new WP_Query($args);
				while($query -> have_posts()) : $query -> the_post();
			?>
				<div class="post clearfix">
					<div class='newsfeed-img'>
						<div class='newsfeed-img-sec'>
							<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('casino-banner-thumb-home'); ?></a>
						</div>
					</div>
				</div>
			<?php 
				endwhile; 
				wp_reset_query(); 
			?>
<!-- sidebar - end -->
<?php get_footer(); ?>
