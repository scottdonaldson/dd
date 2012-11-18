<?php 
/*
Template Name: Log (most recent post)
*/
get_header();

query_posts('posts_per_page=1');
while (have_posts()) : the_post(); 
?>
            
    <div class="single-gallery clearfix">

		<div id="waiting"></div>
        
            <div <?php post_class('newer'); ?> id="<?php the_ID(); ?>">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
    
    </div><!-- .single-gallery -->        
            
<?php endwhile; ?>

<span class="prev1"><?php previous_post_link('%link',''); ?></span>
<span class="next1"><?php next_post_link('%link',''); ?></span>

<?php wp_reset_query(); ?>	

<div id="arrowkeys">
	<img src="<?php echo bloginfo('template_url'); ?>/images/arrowkeys.jpg" width="33" height="auto" />
</div>

<?php query_posts('posts_per_page=1'); while (have_posts()) : the_post(); ?>
	<div class="visuallyhidden latest"><a href="<?php the_permalink(); ?>"></a></div>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>