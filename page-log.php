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

            <div id="left"></div>
	        <div id="right"></div>        
    
    </div><!-- .single-gallery -->        
            
<?php endwhile; ?>

<span class="prev1"><?php previous_post_link('%link',''); ?></span>
<span class="next1"><?php next_post_link('%link',''); ?></span>

<?php wp_reset_query(); ?>	

<div id="arrowkeys">
	<img src="<?php echo bloginfo('template_url'); ?>/images/arrowkeys.jpg" width="33" height="auto" />
</div>

<?php 
// Get latest
query_posts('posts_per_page=1'); while (have_posts()) : the_post(); ?>
	<a class="hidden latest" href="<?php the_permalink(); ?>"></a>
<?php endwhile; wp_reset_query(); 
// Get oldest
query_posts('posts_per_page=1&order=ASC'); while (have_posts()) : the_post(); ?>
    <a class="hidden oldest" href="<?php the_permalink(); ?>"></a>
<?php endwhile; wp_reset_query(); ?>

<script src="<?php echo bloginfo('template_url'); ?>/js/single.js"></script>

<?php get_footer(); ?>