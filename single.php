<?php get_header(); the_post(); 

    // Prior to May 2012, blog images were ported from Tumblr.
	$year = get_the_date('Y');
	$month = get_the_date('n');
	$day = get_the_date('j');
	if (
		($year > 2012) || 
		(($year == 2012) && ($month > 4))
		) { ?>
            
    <div class="single-gallery clearfix">

		<div id="waiting"></div>
        
        <div <?php post_class('newer'); ?> id="<?php the_ID(); ?>">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div><!-- .newer -->

        <div id="left"></div>
        <div id="right"></div>    
    
    </div><!-- .single-gallery -->        
            
    <?php 
    // May 2012 and after, blog images are uploaded via iPhone.
    } else { ?>        

    <div class="single-gallery clearfix">

		<div id="waiting"></div>
        
        <div <?php post_class(); ?> id="<?php the_ID(); ?>">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div><!-- older one -->

        <div id="left"></div>
        <div id="right"></div>
    
    </div><!-- .single-gallery -->
    
    <?php } ?>

<span class="prev1"><?php previous_post_link('%link',''); ?></span>
<span class="next1"><?php next_post_link('%link',''); ?></span>

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