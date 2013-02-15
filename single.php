<?php get_header(); the_post(); 

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
            
    <?php } else { ?>        

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

<script>
jQuery(window).load(function(){

    // Blog nav in header.php must receive links from here
    var nextLink = $('#main .next1 a').attr('href') ? $('#main .next1 a').attr('href') : $('.oldest').attr('href');
        prevLink = $('#main .prev1 a').attr('href') ? $('#main .prev1 a').attr('href') : $('.latest').attr('href');
    $('.blognav .next1 a').attr('href', nextLink);
    $('.blognav .prev1 a').attr('href', prevLink);

    // Title below those links
    $('.entry-title').prependTo('.order');

    // Newer blog posts uploaded from phone
    var newer = $('.newer'),
        newerImg = newer.find('img'),
        singleNewer = $('.single-post .newer');
    newer.each(function(){
        $this = $(this);
        var newerLink = $this.find('.perm').attr('href');
        $this.find('img').closest('a').attr('href',newerLink);
    });
    
    // Unwrap images and prepend content to header
    var postImage = $('.single-gallery img').unwrap();
    singleNewer.find('strong').prependTo('.order');

    $('.order').fadeIn();

    // Show and position image
    var visible = $(window).height() - 180, // visible height
        gallery = $('.single-gallery').height(visible);

        $(window).resize(function(){
            visible = $(window).height() - 180;
            $('.single-gallery').height(visible);
        });

    $.fn.extend({
        posImg: function(){

            if ($(window).width() > 800) {
                // Fade in and position the image
                postImage.fadeIn().css({
                    'left': 0.5*(gallery.width() - postImage.width()),
                    'top': 0.5*(gallery.height() - postImage.height())
                });
            }
        }
    });
    postImage.posImg();
    $(window).resize(function(){ postImage.posImg(); });

    // Functions for going to the next and previous images (takes us to new pages)
    var goNext = function(){
        document.location.href = nextLink;
    }
    var goPrev = function(){
        document.location.href = prevLink;
    }

    // Arrow buttons
    $('.next1').click(function(){ goNext(); });
    $('.prev1').click(function(){ goPrev(); });

    // Left and right arrows
    $(document).on('keydown',function(e){
        if (e.keyCode == 39) { goNext(); }
        else if (e.keyCode == 37) { goPrev(); }
    });

    // Clicking on the image
    $('#right').click(function(){ goNext(); });
    $('#left').click(function(){ goPrev(); });

    /* SWIPING EVENTUALLY
    postImage.swipeleft(function(){ goPrev(); });
    postImage.swiperight(function(){ goNext(); });
    */
});
</script>

<?php get_footer(); ?>