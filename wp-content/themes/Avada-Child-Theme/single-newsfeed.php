<?php get_header(); ?>
<div id='big-n-bad'>
<!-- content left -->
	<div id='single-wide-bg' class='home-content-left bg-cont-border'>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>		    
		<div class = 'newsfeed-page-img'>
			<?php the_post_thumbnail('single-blog-image'); ?>
		</div>
		<div class="newsfeed-title">
			<h2><?php the_title(); ?></h2>
		</div>
		<div class = 'newsfeed-date'>
			<?php the_date(); ?>
		</div>
		<div class = 'newsfeed-page-excerpt'>
			<?php the_content(); ?>	
		</div>
		    <?php 
			    $terms = wp_get_post_terms($post->ID, "categories");
				foreach ($terms as $termid) {  
				    $idterm = $termid->term_id;
				} 
		    ?>
		<?php endwhile; endif; wp_reset_query(); ?>
	</div>
<!-- content left --- -->

<!-- content right -->
	<div id='single-bg' class='home-content-left bg-cont-border'>
		<!-- sidebar - added -->
		<div class="the-content-single">

			<h4 class="title-text">Noutăți cazinouri</h4>
			<?php
				if ( $idterm == 18 ) {
					$posttype = "casino_games";
					$pagename = "casino";
				} else if ( $idterm == 19 ) {
					$posttype = "cazino_live";
					$pagename = "casino_live";
				} else if ( $idterm == 25 ) {
					$posttype = "pariu_sportiv";
					$pagename = "pariuri-sportive";
				} else if ( $idterm == 20 ) {
					$posttype = "bonus";
					$pagename = "bonus";
				} else if ( $idterm == 21 ) {
					$posttype = "spins_games";
					$pagename = "spin";
				} else if ( $idterm == 22 ) {
					$posttype = "jackpot_games";
					$pagename = "jackpot";
				} 
				else if ( $idterm == 23 ) {
					$posttype = "slot_games";
					$pagename = "slots";
				}
				$args = array(
					'post_type' => $posttype,
					'posts_per_page' => 5,
				);
				$query = new WP_Query($args);
				while($query -> have_posts()) : $query -> the_post();
			?>
			<div class="post clearfix">
				<div class='newsfeed-img-sec'>
					<a target="_blank" href='<?php the_field('link'); ?>'><?php the_post_thumbnail('newsfeed-thumb-header-left'); ?></a>
				</div>
				<div class='newsfeed-title'>
					<h5><a target="_blank" href='<?php the_field('link'); ?>'><?php the_title(); ?></a></h5>
				</div>
			</div>
			<?php 
				endwhile; 
				wp_reset_query(); 
			?>
			<div class='more-posts'>
				<a href='/<?php echo $pagename ?>'>Vezi toate cazinourile</a>
			</div>
		</div>
		<div class="the-content-single">
			<h4 class="title-text">Articole relevante</h4>
			<?php
				$args = array(
					'post_type' => 'newsfeed',
					'posts_per_page' => 5,
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'terms'    => $idterm
						),
					),
				);
				$query = new WP_Query($args);
				while($query -> have_posts()) : $query -> the_post(); 
			?>
				<div class="post clearfix">
					<div class='newsfeed-img-sec'>
						<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('newsfeed-thumb-header-left'); ?></a>
					</div>
					<div class='newsfeed-title'>
						<h5><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h5>
					</div>
					<div class='newsfeed-excerpt-div'>
						<?php echo the_excerpt(); ?>
					</div>
				</div>
			<?php		
				endwhile; 
				wp_reset_query(); 
			?>
			<div class='more-posts'>
				<a href='/newsfeed'>Vezi toate articolele</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
