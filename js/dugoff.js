$(window).load(function(){
	
		var order = $('.order'),
			html = $('html'),
			body = $('body'),
			main = $('#main'),
			unit = $('.no-touch div.unit'),
			heightInit = $(window).height(),
			widthInit = $(window).width(),
			drag = $('.dragger_container'),
			dragger = drag.find('.dragger');
	
		order.find('li.all a')
			.click(function(){
				$this = $(this);
				$this.addClass('sorted').closest('li').siblings('li').find('a').removeClass('sorted');
				unit.each(function(){
					$(this).removeClass('unit-sorted')
					.animate({
						opacity:1
					},750)
					.css('z-index',1);
				});
			});
		order.find('li.cat-item a').removeAttr('href')
			.click(function(){
				$this = $(this);
				$this.addClass('sorted').closest('li').siblings('li').find('a').removeClass('sorted');
				var cat = $this.text();
					unit.each(function(){
						$this = $(this);
	
						if ( $this.hasClass(cat) ) {
							$this.addClass('unit-sorted')
							.animate({
								opacity:1
							},750)
							.css('z-index',1);
						} else {
							$this.removeClass('unit-sorted')
							.animate({
								opacity:0.15
							},750)
							.css('z-index',-1);
						}
					});
				
			})
		order.find('li.year a')
			.mouseenter(function(){
				$(this).find('.twenty').show();
			})
			.mouseleave(function(){
				$(this).find('.twenty').hide();
			})
			.click(function(){
				$this = $(this);
				$this.addClass('sorted').closest('li').siblings('li').find('a').removeClass('sorted');
				var year = $this.text();
					unit.each(function(){
						$this = $(this);
						if ( $this.hasClass(year) ) {
								$this.addClass('unit-sorted')
								.animate({
									opacity:1
								},750)
								.css('z-index',1);
							} else {
								$this.removeClass('unit-sorted')
								.animate({
									opacity:0.15
								},750)
								.css('z-index',-1);
							}
					})
			});		
	
	unit.mouseenter(function(){
		$(this).animate({
			'opacity':1
		},{queue:false,duration:751})
		.find('.title').addClass('activated').css('top',20)
		.closest(unit).siblings(unit).animate({
			'opacity':0.15
		},{queue:false,duration:750});		
	}).mouseleave(function(){
		if (order.find('li:first a').hasClass('sorted')) {
			unit.animate({
				'opacity':1
			},{queue:false,duration:750});
		} else {
			unit.each(function(){
				$this = $(this);
				if ($this.hasClass('unit-sorted')) {
					$this.animate({
						'opacity':1
					},{queue:false,duration:750});
				} else {
					$this.css({'z-index':-1,'opacity':0.15});
				}
			})
		}
		$(this).find('.title').removeClass('activated');
	});
	
	var touchUnit = $('.touch .unit'),
		imgHeight = touchUnit.find('img').height();
		
	touchUnit.css('padding-bottom',1.2*imgHeight);	
	touchUnit.find('.title').css('top',1.05*imgHeight);

	
	// --------------- CV -------------- //
	
	var cvItem = $('.page-id-83 ul li');
	
	cvItem.each(function(){
		$this = $(this);
		var cvSubItem = $this.next('ul');
		cvSubItem.appendTo($this);
	});

	cvItem.find('ul li').after('<div class="blocker"></div>');
	
	if (!body.hasClass('smallscreen') && !html.hasClass('touch')){
		cvItem.mouseenter(function(){
			$this = $(this);
			$this.find('.blocker').css('z-index',5).delay(250).animate({
				left:800
			}).prev('li').css('z-index',4);
		}).mouseleave(function(){
			$this = $(this);
			$this.find('.blocker').css('z-index',3).animate({
				left:0
			},160).prev('li').css('z-index',3);
		});
	}
	
	
	// -------------- BLOG and SINGLE PROJECT PAGE----------------------- //

	var blogContent = $('.blog .content'),
		blogImages = blogContent.find('img'),
		images = $('.single-gallery img'),
		postImage = $('.single-post .single-gallery img,.page-template-page-log-php .single-gallery img'),
		content = $('.single-content'),
		textContentHeight = $('.single .content').height();
		singleMain = $('.single #main'),
		gallery = $('.single-gallery'),
		singleDrag = $('.single .dragger_container'),
		prev = $('.single-project .prev1'),
		next = $('.single-project .next1'),
		blogPrev = $('.single-post #main .prev1 a,.page-template-page-log-php #main .prev1 a'),
		blogNext = $('.single-post #main .next1 a,.page-template-page-log-php #main .next1 a');
	
		postImage.unwrap();
		
		if (blogNext.attr('href')) {
			order.find('.next1 a').attr('href',blogNext.attr('href'));
		} else {
			order.find('.next1 a').attr('href','http://www.dugoff.com/?p=3174');
		}
		if (blogPrev.attr('href')) {
			$('.order .prev1 a').attr('href',blogPrev.attr('href'));
		} else {
			var latestLink = $('.latest').find('a').attr('href')
			order.find('.prev1 a').attr('href',latestLink);
		}
		$('.single-post .entry-title,.page-template-page-log-php .entry-title').appendTo('.order');
	
		/* Newer blog posts uploaded from phone */
		var newer = $('.newer'),
			newerImg = newer.find('img'),
			singleNewer = $('.single-post .newer,.page-template-page-log-php .newer');
		
		newer.each(function(){
			$this = $(this);
			var newerLink = $this.find('.perm').attr('href');
			$this.find('img').closest('a').attr('href',newerLink);
		});
		
		singleNewer.find('strong').appendTo('.order');
		singleNewer.find('img').unwrap();
	
	
	
	// ----- SINGLE PROJECT PAGE -------- //
	
	$('#waiting').hide();
		
	if (body.hasClass('admin-bar')) {
		gallery.height(heightInit-200);
		content.height(heightInit-200);
		drag.height(heightInit-200);
	} else if (html.hasClass('touch')) {
		
	} else {
		gallery.height(heightInit-170);
		content.height(heightInit-170);
		drag.height(heightInit-170);
	}	
		
		
	if (textContentHeight > content.height()) {
		content.mouseenter(function(){
			singleDrag.fadeIn().height(content.height());
			dragger.fadeIn();
		}).mouseleave(function(){
			singleDrag.fadeOut();
		});
	} else {
		singleDrag.hide();
	}
	
	var	galleryHeightInit = gallery.height(),
		galleryWidthInit = gallery.width();
		
	if (!html.hasClass('touch')) {
		images.each(function(){
			$this = $(this);
			$this.css({
				top:.5*galleryHeightInit-.5*$this.height(),
				left:.5*galleryWidthInit-.5*$this.width()
			});
		});
	}
	
	$('.single-gallery img:first').addClass('shown initial').css('display','block').siblings('img').hide();
	$('.single-gallery img:last').addClass('final');
	
	next.on('click',function(){
		$('.order').find('h2').remove();
		
		if (body.hasClass('blog')) {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.closest('.post').next().find('img').addClass('shown').fadeIn('slow');
		} else if ($('img.shown').hasClass('final')) {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.siblings('.initial').addClass('shown').fadeIn('slow');
			nextpage.show();
		} else {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.next('img').addClass('shown').fadeIn('slow');
		}
	
		var shown = $('img.shown');
		shown.prev('h2').appendTo('.order');
		
	});
	
	prev.on('click',function(){
		$('.order').find('h2').remove();
		
		if (body.hasClass('blog')) {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.closest('.post').prev().find('img').addClass('shown').fadeIn('slow');
		} else if ($('img.shown').hasClass('initial')) {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.siblings('.final').addClass('shown').fadeIn('slow');
			prevpage.show();
		} else {
			$('img.shown').fadeOut('slow').removeClass('shown')
				.prev('img').addClass('shown').fadeIn('slow');
		}
		var shown = $('img.shown');
		shown.prev('h2').appendTo('.order');
		
	});
	
	$(document).on('keydown',function(e){
		if (body.hasClass('single-project')) {
			if (e.keyCode == 39 && !$('img.shown').hasClass('final')) { 
				$('.order').find('h2').remove();
				
				if (body.hasClass('blog')) {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.closest('.post').next().find('img').addClass('shown').fadeIn('slow');
				} else if ($('img.shown').hasClass('final')) {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.siblings('.initial').addClass('shown').fadeIn('slow');
					nextpage.show();
				} else {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.next('img').addClass('shown').fadeIn('slow');
				}
			
				var shown = $('img.shown');
				shown.prev('h2').clone().appendTo('.order');	
			}
			if (e.keyCode == 37 && !$('img.shown').hasClass('initial')) {
				$('.order').find('h2').remove();
				
				if (body.hasClass('blog')) {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.closest('.post').prev().find('img').addClass('shown').fadeIn('slow');
				} else if ($('img.shown').hasClass('initial')) {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.siblings('.final').addClass('shown').fadeIn('slow');
					prevpage.show();
				} else {
					$('img.shown').fadeOut('slow').removeClass('shown')
						.prev('img').addClass('shown').fadeIn('slow');
				}
				var shown = $('img.shown');
				shown.prev('h2').clone().appendTo('.order');
			}
		} else if (body.hasClass('single-post') || body.hasClass('page-template-page-log-php')) {
			if (e.keyCode == 39) {
				if (!blogPrev.attr('href')) {
					document.location.href = latestLink;
				} else {
					document.location.href = blogPrev.attr('href');
				}
			}
			if (e.keyCode == 37) {
				if (!blogNext.attr('href')) {
					document.location.href = 'http://www.dugoff.com/?p=3174';
				} else {
					document.location.href = blogNext.attr('href');
				}
			}
		}
	});
	

// --------- WINDOW RESIZES ------------------- //
	
	if ($(window).width < 600) {
			body.addClass('smallscreen');
			
			gallery.height('auto');
			content.height('auto');
		}
	
	$(window).on('resize',function(){
		var height = $(this).height(),
			width = $(this).width(),
			shown = $('img.shown');
			
		if (width < 600) {
			body.addClass('smallscreen');
			
			main.height('auto');
			gallery.height('auto');
			content.height('auto');
		} else {
			body.removeClass('smallscreen');
			
			if (body.hasClass('admin-bar')) {
				gallery.height(height-200);
				content.height(height-200);
				blogContent.height(height-200);
				drag.height(height-200);
				
			} else {
				gallery.height(height-170);
				content.height(height-170);
				blogContent.height(height-170);
				drag.height(height-170);
			}
			
			var imagesResize = $('img.shown'),
			galleryResize = $('.single-gallery');
			imagesResize.css({
				top:.5*galleryResize.height()-.5*imagesResize.height(),
				left:.5*galleryResize.width()-.5*imagesResize.width()
			});
			if (shown.hasClass('initial')) {
				//prev.hide();
			}
			if (shown.hasClass('final')) {
				//next.hide();
			}
		}
		drag.hide();

	});
	
	
	main.mCustomScrollbar('vertical',400,'easeOutCirc',1.5,'fixed','yes','yes',10);
	content.mCustomScrollbar('vertical',400,'easeOutCirc',0,'fixed','yes','yes',10);
	drag.hide();
	
	
});