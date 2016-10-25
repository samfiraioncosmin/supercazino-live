<?php get_header(); ?>
<div id='big-n-bad'>
<!-- content left -->
	<div id='single-wide-bg' class='home-content-left bg-cont-border'>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php echo get_cat_name() ?>
			<div class = 'newsfeed-page-img'><strong><?php the_post_thumbnail('medium_large'); ?></strong></div>
			<div class="newsfeed-title"><h5><?php the_title(); ?></h5></div>
			<div class = 'newsfeed-date'><?php the_date(); ?></div>
			<div class = 'newsfeed-page-excerpt'><strong><?php the_content(); ?></strong></div>
			<div class='cazino-button-cont'>
				<div class='cazino-button'><a class='cazino-link'href='<?php the_field('link'); ?>'>Viziteaza site</a></div>
			</div>

			


		<?php endwhile; endif; wp_reset_query(); ?>
</div>
<!-- content left --- -->

<!-- content right -->
<div id='single-bg' class='home-content-left bg-cont-border'>
	<div class="the-content-single">
		<h4 class="title-text">Cazinouri</h4>
		<?php 
			$cazino = new WP_Query(
				array(
					'post_type' => 'casino_games'
				)
			); 
			while($cazino->have_posts()) : $cazino->the_post(); 
		?>
			<div class="post clearfix">
				<div class='newsfeed-img'>
					<div class='newsfeed-img-sec'>
						<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('newsfeed-thumb-header-left'); ?></a>
					</div>
					<h5><?php the_field('titlu'); ?></h5>
					<p><?php the_excerpt(); ?></p>
				</div>
			</div>
		<?php 
			endwhile; 
			wp_reset_query(); 
		?>
		<div class='more-posts'>
			<a href='/casino'>Vezi toate cazinourile!</a>
		</div>
	</div>
				<div class="the-content-cls">
					<h4 class="title-text bar hue-black">Articole Cazinou</h4>
					<?php
					$args = array(

						'post_type' => 'world_news',
						'posts_per_page' => 10

						);
									$query = new WP_Query($args);
									while($query -> have_posts()) : $query -> the_post();
					?>
							<div class="post clearfix">
								<div class='newsfeed-img'>
									<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('medium_large'); ?></a>
								</div>
								<div class='newsfeed-title'>
										<a href='<?php the_permalink(); ?>'><h5><?php the_title(); ?></h5></a>
								</div>
									<div class="newsfeed-date">
											<?php the_date(); ?>
									</div>
									<div class='newsfeed-excerpt-div'>
									<?php echo get_excerpt(240); ?>
									</div>
									<div class='newsfeed-line'></div>
							</div>
					<?php endwhile; wp_reset_query(); ?>
					<div class='more-posts'>
						<a href='index.php/noutati'>Vezi toate noutatile !</a>
					</div>
				</div>
			</div>
</div>



<?php get_footer(); ?>
