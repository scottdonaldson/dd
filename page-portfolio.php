<?php 
/*
Template Name: Portfolio
*/
get_header(); ?>

<div class="content clearfix">
  
    <?php query_posts('post_type=project&posts_per_page=50&orderby=title');
    while (have_posts()) : the_post(); 
    ?>
        
        <div class="unit <?php foreach((get_the_category()) as $category) { 
                                   echo $category->cat_name.' '; }
                               $year = get_the_date('Y');
                               echo $year; ?>">
            
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php echo get_the_post_thumbnail(); ?>
			</a>  
            <div class="title">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            </div>      
        </div>    
        
        <?php 
		endwhile; 
        wp_reset_query(); ?>
        
</div><!-- .content -->


<?php get_footer(); ?>