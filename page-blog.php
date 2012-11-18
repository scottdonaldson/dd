<?php 
/*
Template Name: Blog
*/
get_header(); ?>

    <div class="single-gallery clearfix">
    
        <?php 
		
		if (have_posts()) :
        while (have_posts()) : the_post(); ?>
        
		<div <?php post_class(); ?> id="<?php the_ID(); ?>">
	        <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
		
		<?php endwhile; ?>
    
    </div><!-- .single-gallery -->
    
    <div class="loadmore">
		<?php posts_nav_link( ' | ', 'Previous page', 'Next page' ); ?> 
    </div>   
    
    <?php endif; ?>
    
    <span class="previous">&larr;</span>
    <span class="next">&rarr;</span>    


<?php get_footer(); ?>