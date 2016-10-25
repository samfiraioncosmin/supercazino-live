	<div class="post clearfix">
		<div class='newsfeed-img'>
			<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('casino-banner-thumb-home'); ?></a>
		</div>
		<div class='newsfeed-title'>
			<h5><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h5>
		</div>
		<div class="newsfeed-date">
			<?php the_date(); ?>
		</div>
		<?php echo get_excerpt(240); ?>
	</div>