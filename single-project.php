<?php 
get_header(); 
the_post(); ?>

<div class="single-content">
    
    <div class="customScrollBox">
    <div class="container">
        <div class="content clearfix">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <span class="entry-meta">
				<?php $date = get_the_date('n');
            
                    if ($date<3 || $date==12) { echo 'winter/' ;
                    } elseif ($date>2 && $date<6) { echo 'spring/';
                    } elseif ($date>5 && $date<9) { echo 'summer/';
                    } else { echo 'fall/'; }
                    
                    the_date('Y');
			echo '</span><br /><br />'; 
                    
            if (get_field('image_2')) { ?>
	            <span class="prev1">&larr;</span>
    	        <span class="next1">&rarr;</span>       
        	
			<?php } ?>    
            <?php the_content(); ?>
        </div><!-- .content -->
    
	</div><!-- .container -->

    <div class="dragger_container">
        <div class="dragger"></div>
    </div>

	</div><!-- .customScrollBox -->    
        
</div><!-- .single-content -->

<div class="single-gallery">

	<div id="waiting"></div>
	<?php 
        $i=1;
        while ($i<=14) { 
            
            $image_[$i] = get_field('image_'.$i);
            if ($image_[$i]) {
                echo '<img src="'.$image_[$i].'" />';
            }
            
            $i++;
        } 
	?>
    
</div>

<div id="arrowkeys">
	<img src="<?php echo bloginfo('template_url'); ?>/images/arrowkeys.jpg" width="33" height="auto" />
</div>

<?php get_footer(); ?>