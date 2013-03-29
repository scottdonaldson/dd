jQuery(window).load(function(){

	var html = $('html'),
		body = $('body').removeClass('preload'),
		main = $('#main'),
		footer = $('footer');

	// center titles over images on home page
	if (body.hasClass('home')) {
		var unit = $('.unit');
		var posTitle = function(){
			unit.each(function(){
				$this = $(this);
				$this.find('.title').css({
		            'top': -0.5 * ($this.height() + $this.find('span').height())
		        });
			});
		}
		posTitle();
		$(window).resize(function(){
			posTitle();
		});
	}

	if (body.hasClass('blog')) {
        $('img').css('opacity', 1).each(function(){
            $this = $(this);

            var newerLink = $this.closest('a').prev().attr('href');

            $this.closest('a').attr('href', newerLink);
        });
	}

	// hide loading graphic
	$('#waiting').hide();

	// NO NEWSLETTER
	$('.newsletter').remove();

});