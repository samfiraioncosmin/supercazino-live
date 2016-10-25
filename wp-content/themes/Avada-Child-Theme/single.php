<?php if ( have_posts() ) { the_post(); rewind_posts(); } ?>
<?php if('newsfeed' == get_post_type()){ ?>
<?php include(TEMPLATEPATH . '/single-newsfeed.php'); ?> 
<?php }
