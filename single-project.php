<?php 
get_header(); 
the_post(); 

// get the images
$images = get_field('images');
?>

<div class="single-content clearfix">
    
    <div class="container">
        <div class="content clearfix scroll">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <span class="entry-meta">
				<?php $date = get_the_date('n');
            
                    if ($date < 3 || $date == 12) { echo 'winter/' ;
                    } elseif ($date > 2 && $date < 6) { echo 'spring/';
                    } elseif ($date > 5 && $date < 9) { echo 'summer/';
                    } else { echo 'fall/'; }
                    
                    the_date('Y');
			echo '</span><br />'; 
                    
            if (count($images) > 1) { ?>
	            <span class="arrow prev1"></span>
    	        <span class="arrow next1"></span>       
        	
			<?php } ?>    
            <?php the_content(); ?>
        </div><!-- .content -->   
	</div><!-- .container -->
        
</div><!-- .single-content -->

<div class="single-gallery">
	<?php 
    if (count($images) > 0) {
        foreach ($images as $image) {
            echo '<img src="'.$image['image'].'" />';
        }
    }

	?>
    <div id="left"></div>
    <div id="right"></div>
</div>

<div id="waiting"></div>

<div id="arrowkeys">
	<img src="<?php echo bloginfo('template_url'); ?>/images/arrowkeys.jpg" width="33" height="auto" />
</div>

<script>
jQuery(window).load(function(){

    var body = $('body'),
        visible = $(window).height() - 180, // visible height
        gallery = $('.single-gallery'),
        content = $('.single-content'),
        images = $('.single-gallery img'); 
    
    gallery.height(visible);
    content.height(visible);

        $(window).resize(function(){
            visible = $(window).height() - 180;
            gallery = $('.single-gallery');
            content = $('.single-content');

            gallery.height(visible);
            content.height(visible);
        });

    $.fn.extend({
        posImg: function(){
            $('.shown').removeClass('shown').fadeOut();
            var shownImg = $(this).addClass('shown');

            // Fade in and position the image
            shownImg.stop().fadeIn().css({
                'left': 0.5*(gallery.width() - shownImg.width()),
                'top': 0.5*(gallery.height() - shownImg.height())
            });

            // Keep positioning on window resize
            $(window).resize(function(){
                shownImg = $('.shown');

                shownImg.stop().fadeIn().css({
                    'left': 0.5*(gallery.width() - shownImg.width()),
                    'top': 0.5*(gallery.height() - shownImg.height())
                });
            });
        }
    });

    images.first().posImg();
    images.last().addClass('final');

    // Functions for going to the next and previous images, respectively
    var goNext = function(){
        // Next is the next image if there is a next image
        // Otherwise we cycle back to the first
        var next = $('.shown').next('img').length > 0 ? $('.shown').next('img') : images.first();
        next.posImg();
    }
    var goPrev = function(){
        // Prev is the next image if there is a prev image
        // Otherwise we cycle back to the last
        var prev = $('.shown').prev('img').length > 0 ? $('.shown').prev('img') : images.last();
        prev.posImg();
    }

    // Arrow keys to navigate
    $(document).on('keydown',function(e){
        // Next (right arrow key)
        if (e.keyCode == 39) { goNext(); }
        // Prev (left arrow key)
        else if (e.keyCode == 37) { goPrev(); }
    });
    // Clicking arrows or different sections of the gallery to navigate
    $('.next1, #right').click(function(){ goNext(); });
    $('.prev1, #left').click(function(){ goPrev(); });

    // Custom scrollbars
    content.readyToScroll();
    $(window).resize(function(){ content.resizeScroll(); });
    var scroll = $('.scroll_container');
    content.mouseenter(function(){
        if (!body.hasClass('noscrolling')) {
            scroll.fadeIn();
        }
    }).mouseleave(function(){
        scroll.fadeOut();
    });

    if ($(window).width() <= 800) {
        images.load(function(){ $(this).fadeIn(); });
    }
});
</script>

<?php get_footer(); ?>