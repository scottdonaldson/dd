<?php get_header(); ?>

	<div class="content clearfix">
    
	<?php 
		if (have_posts()) :
        while (have_posts()) : the_post(); ?>

		<?php 
		$year = get_the_date('Y');
		$month = get_the_date('n');
		$day = get_the_date('j');
		if (
			($year > 2012) || 
			(($year == 2012) && ($month > 4))
			) { ?>
        
            <div <?php post_class('newer'); ?>>
                <a class="perm" href="<?php the_permalink(); ?>">
                    <?php the_content(); ?>
                </a>
            </div><!-- .post -->
        
        <?php } else { ?>
        
        	<div <?php post_class(); ?>>
            	<a href="<?php the_permalink(); ?>">
                	<?php the_content(); ?>
                </a>
            </div>
        
        <?php } ?>
		
		<?php endwhile; ?>
    
    </div><!-- .content -->
    
    <div class="loadmore">
		<span class="newer"><?php previous_posts_link(''); ?></span>
		<span class="older"><?php next_posts_link(''); ?> </span>
    </div>    
    
    <?php endif; 
	
get_footer(); ?>