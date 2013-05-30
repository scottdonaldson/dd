jQuery(window).load(function(){

	var vines = $('.post').filter(function(){
			return $(this).find('h3.hidden').text().substr(0, 4) === 'http';
		});

	function doVine(vine){

		var cover = $('<div style="position: absolute; top: 0; left: 0;"></div>');
		cover.prependTo(vine.find('.perm'));

		var vineURL = vine.find('h3.hidden').text(),
	        vineStart = 'https://vine.co/v/'.length,
	        vineID;
    
	    // strip the URL of all but the vine ID
	    vineID = vineURL.substr(vineStart);
	    vineID = vineID.substr(0, vineID.indexOf('/embed'));

	    var iframe = $('<iframe src="https://vine.co/v/' + vineID + '/embed/simple" frameborder="0"></iframe>');

	    function replaceIframe() {
	        iframe.remove();

	        var iframeDim = vine.width();

	        iframe.appendTo(vine.find('.perm')).css({
	            height: iframeDim,
	            width: iframeDim
	        }).load(function(){
	            $(this).addClass('loaded playing');
	            setTimeout(function(){
                    iframe[0].contentWindow.postMessage('play', '*');
                }, 150);
	        });

	        cover.width(vine.width()).height(vine.height());
	        
	    };
	    replaceIframe();

	    var waitForResize = (function() {
            var timers = {};
            return function (callback, ms, uniqueId) {
                if (!uniqueId) {
                    uniqueId = vineID;
                }
                if (timers[uniqueId]) {
                    clearTimeout (timers[uniqueId]);
                }
                timers[uniqueId] = setTimeout(callback, ms);
            };
        })();

        $(window).resize(function(){
            waitForResize(function(){
                replaceIframe();
            }, 250, vineID);
        });
	}

	vines.each(function(){
		doVine($(this));
	});
    
});