<?php get_header(); ?>

<div id='newsfeed-archive' class="container-newsf-archive">
	 <h4 class="title-text">Lista postari</h4>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
   <h1><?php the_title(); ?></h1>

   <ul>
       <li><strong><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></strong></li>
       <li><strong>Year of publishing:</strong><a href='<?php the_permalink(); ?>'> <?php the_date(); ?></a></li>
       <li><strong><a href='<?php the_permalink(); ?>'><?php the_post_thumbnail('medium_large'); ?></a></strong></li>
			 <li><strong><?php echo get_excerpt(240); ?></strong></li>

   </ul>


<?php endwhile; endif;?>
</div>

<?php get_footer(); ?>
