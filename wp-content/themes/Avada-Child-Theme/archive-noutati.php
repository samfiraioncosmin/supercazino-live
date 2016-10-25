<?php
// Template Name: Noutati_archive
get_header(); ?>

 <div class="no-div col-xs-12 col-sm-12 col-md-12 col-lg-12 noutati-he">
<!-- header start -->
	<div id='left-games' class='games-left-side bg-cont-border'>
		<h4 class="title-text">Stiri interesante!</h4>
		<h1 class="nodisplay">Stiri interesante!</h1>
		<?php
			$args = array(
				'post_type' => 'world_news',
				'posts_per_page' => 4,
				'tax_query' => array(
					array(
						'taxonomy' => 'header_news',
						'terms'    => 26
					),
				),
			);
			$query = new WP_Query($args);
			while($query -> have_posts()) : $query -> the_post();
		?>
		 <div class="post clearfix col-xs-6 col-sm-6 col-md-6 col-lg-6">
           	<div class='newsfeed-img blog-img arch-news-img'>
  				<div class='newsfeed-img-sec'>
  					<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('world-news-header-left-noutati'); ?></a>
  				</div>
  				<div class="newsfeed-title-overlay">
  					<h2><span><a href='<?php the_permalink(); ?>' style="color: white;"><?php the_title(); ?></a></span></h2>
  				</div>
  			</div>
  		</div>
  		<?php 
  			endwhile; 
  			wp_reset_query(); 
  		?>
  	</div>
<!-- header end -->

<!-- sidebar start -->
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
	</div>
	<!-- sidebar end -->
<!-- arhive blog start-->


	<div id='left-games' class='games-half-width bg-cont-border'>
		<h4 class="title-text">lista postări</h4>
		<?php
  			$args = array(
	   			'post_type' => 'world_news',
	  			'paged' => get_query_var('page'),
	  			'posts_per_page' => 5
   			);
   			$the_query = new WP_Query($args);
   			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();   			
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
		 	endif;
			wp_pagenavi( array( 'query' => $the_query ) );
			wp_reset_postdata(); 
		?>
	</div>

<?php get_footer(); ?>
