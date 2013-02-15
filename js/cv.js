$(window).load(function(){

	var html = $('html'),
		body = $('body').removeClass('preload'),
		main = $('#main');

	// home page stuff
	if (body.hasClass('home')) {

		var menuItem = $('.order li a'),
			organizer,
			unit = $('.unit');

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

	// single project stuff
	} else if (body.hasClass('single-project')) {

		// hide loading graphic
		$('#waiting').hide();

		var visible = $(window).height() - 180, // visible height
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
				shownImg.fadeIn().css({
					'left': 0.5*(gallery.width() - shownImg.width()),
					'top': 0.5*(gallery.height() - shownImg.height())
				});

				// Keep positioning on window resize
				$(window).resize(function(){
					shownImg = $('.shown');

					shownImg.fadeIn().css({
						'left': 0.5*(gallery.width() - shownImg.width()),
						'top': 0.5*(gallery.height() - shownImg.height())
					});
				});
			}
		});

		images.first().posImg();

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
		})
	}	
	
});