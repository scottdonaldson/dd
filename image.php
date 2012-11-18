<?php 
get_header(); 
the_post(); ?>

            <h1 class="entry-title visuallyhidden"><?php the_title(); ?></h1>
            <span class="entry-meta">
			
			<?php 
			the_content(); 
			the_title(); 
			?>

<?php get_footer(); ?>