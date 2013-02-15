<?php 
/*
Template Name: Portfolio
*/
get_header(); ?>

<div class="content clearfix">
  
    <?php $portfolio = new WP_Query(array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'orderby' => 'title'
        )
    );
    while ($portfolio->have_posts()) : $portfolio->the_post(); 

    // only show if there's a featured image (breakage prevention)
    if (get_the_post_thumbnail()) { ?>
        
        <div class="unit <?php foreach((get_the_category()) as $category) { 
                               echo $category->cat_name.' '; }
                               $year = get_the_date('Y');
                               echo $year; ?>">
            
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php echo get_the_post_thumbnail(); ?>
			  
                <h2 class="title"><span><?php the_title(); ?></span></h2>
            </a>   
        </div>    
        
    <?php } // end has feat. image
	endwhile; 
    wp_reset_postdata(); ?>
        
</div><!-- .content -->

<script>
jQuery(document).ready(function($){
    var html = $('html'),
        main = $('#main'),
        menuItem = $('.order li a'),
        organizer,
        unit = $('.unit'),
        title = $('.title');

    // remove links
    // click function: 
    // - add sorted class, remove sorted from sibling items
    // - add class for organizing to main (for styling units)
    menuItem.removeAttr('href').click(function(){
        $this = $(this);
        $this.addClass('sorted');
        $this.parent('li').siblings('li').find('a').removeClass('sorted');

        organizer = $this.text();
        main.attr('data-sort', organizer);

        unit.each(function(){
            $this = $(this);
            if (!$this.hasClass(organizer)) {
                $this.addClass('faded');
            } else {
                $this.removeClass('faded');
            }
            if (organizer == 'all') {
                $this.removeClass('faded');
            }
        });
    });

    // IE8 and below :nth-child fix
    if (html.hasClass('lt-ie9')) {
        var templateUrl = $('#template_url').text();
        unit.each(function(){
            $this = $(this);
            if ($this.index() % 5 == 4) {
                $this.addClass('clear-right');
            }
            // Rounded corner thing doesn't work in IE7
            if (!html.hasClass('lt-ie8')) {
                $this.find('.title').before('<img class="ie-cover" src="'+templateUrl+'/images/ie-cover.png" />');
            }
        });
    }
});

jQuery(window).load(function(){
    // fade in images once they're loaded
    $('img').animate({ 'opacity': 1 });
});
</script>

<?php get_footer(); ?>