<?php
// Template Name: Home_temp
get_header(); ?>
	<div id="content" class="full-width">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>
			<!-- content left start -->
			<div class="post-content">
				
				<div id='content-bg' class='home-content-left bg-cont-border'>
					<!--div class='slider-rev-cls'>
							<?php //putRevSlider("main") ?>
					</div>-->
					<!-- left side start -->
					<div class='the-content-cls'>
						<?php the_content(); ?>
						<!-- inside content start -->
						<div id='inside-content'>
							<div>
								<h4 class="title-text bar hue-black">jocuri</h4>
								<div id='home-games-div'>
								<?php 
									$slots = new WP_Query(
										array(
									    	'post_type' => 'slot_games',
											'posts_per_page' => 4,
											)
										);
									while($slots->have_posts()) : $slots->the_post(); 
								?>
									
										<div class="the-content-cls">
											<div class="post clearfix">
												<div class='newsfeed-img'>
													<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('slot-thumb-home'); ?></a>
												</div>
												<div class='newsfeed-title'>
													<a href='<?php the_permalink(); ?>'><h5><?php the_title(); ?></h5></a>
												</div>
												<div class='newsfeed-excerpt-div'>
													<?php echo the_excerpt(157); ?>
												</div>
												<div class='preview__button'>
													<a class='button--wide hue-pri' target="_blank" href='<?php the_field('link'); ?>'>Vizitează site</a>
												</div>
											</div>
										</div>
							
								<?php 
									endwhile; 
									wp_reset_query(); 
								?>
								</div>
								<div>
									<div class='preview__button spec-btn'>
										<a class='button--wide hue-pri' href='/sloturi'>Încearcă mai multe jocuri</a>
									</div>
								</div>
							</div>
						</div>
					<!-- inside content end -->
					<div id='second-content-text'>
						<div class='second-home-title'>
							<h2><?php the_field('home-text-title'); ?></h2>
						</div>
						<div class='second-home-content'>
							<?php the_field('home-text'); ?>
						</div>
					</div>
				</div>
				<!-- left side end -->

				<!-- right side start -->
				<div class="the-content-cls cls-second">
					<div class='articole-rev'>
					<!-- articole start -->
					<h4 class="title-text bar hue-black">Articole</h4>
					<?php
						$args = array(
							'post_type' => 'newsfeed',
							'posts_per_page' => 10,
						);
						$query = new WP_Query($args);
						while($query -> have_posts()) : $query -> the_post();
					?>
					<div class="post clearfix">
						<div class='newsfeed-img'>
							<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('world-news-thumb-home'); ?></a>
						</div>
						<div class='newsfeed-title'>
							<a href='<?php the_permalink(); ?>'><h5><?php the_title(); ?></h5></a>
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
						<a href='/newsfeed'>Vezi toate noutățile!</a>
					</div>
					<!-- articole end -->
					<div class='second-home-content home-right-text'>
						<?php the_field('home-right-text'); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- content left end -->

		<!-- sidebar - added -->
		<div id='newsfeed' class="container-newsf">
			<h4 class="title-text bar hue-black">Cazinouri recomandate</h4>
			<?php
				$args = array(
					'post_type' => 'casino_banner'
				);
				$query = new WP_Query($args);
				while($query -> have_posts()) : $query -> the_post();
			?>
				<div class="post clearfix">
					<div class='newsfeed-img'>
						<div class='newsfeed-img-sec'>
							<a target="_blank" href='<?php the_field('link'); ?>'><?php the_post_thumbnail('casino-banner-thumb-home'); ?></a>
						</div>
					</div>
				</div>
			<?php 
				endwhile; 
				wp_reset_query();
			?>
		</div>
		<?php avada_link_pages(); ?>
	</div>
<?php endwhile; ?>
</div>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
