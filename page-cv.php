<?php
/*
Template Name: CV
*/
get_header();
the_post();
?>

<div class="content">
	<?php the_content(); ?>
</div>

<script>

	jQuery(document).ready(function($) {

		var cvItem = $('.content > ul > li');

		cvItem.find('ul li').after('<div class="blocker"></div>');
		
		if (!$('body').hasClass('smallscreen') && !$('html').hasClass('touch')){
			cvItem.mouseenter(function(){
				$(this).find('.blocker').css('z-index', 5).delay(250).animate({
					left: 800
				}).prev('li').css('z-index', 4);
			}).mouseleave(function(){
				$(this).find('.blocker').css('z-index',3).animate({
					left: 0
				}, 160).prev('li').css('z-index', 3);
			});
		}

	});

</script>

<?php get_footer(); ?>