jQuery(window).load(function(){

    var title = $('h1');

    // If there's no title, it's a regular photo post
    if (!title.text() || title.text().substr(0, 4) !== 'http') {

        // Newer blog posts uploaded from phone
        var newer = $('.newer'),
            newerImg = newer.find('img'),
            singleNewer = $('.single-post .newer');
        newer.each(function(){
            $this = $(this);
            var newerLink = $this.find('.perm').attr('href');
            $this.find('img').closest('a').attr('href',newerLink);
        });

        // Title below those links
        $('.entry-title').prependTo('.order'); 
        
        // Unwrap images and prepend content to header
        var postImage = $('.single-gallery img').unwrap();
        singleNewer.find('strong').prependTo('.order');

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

        /* SWIPING EVENTUALLY
        postImage.swipeleft(function(){ goPrev(); });
        postImage.swiperight(function(){ goNext(); });
        */

    // VINES    
    } else {

        var vineURL = $('h1').text(),
            vineStart = 'https://vine.co/v/'.length,
            vineID;
        
        // strip the URL of all but the vine ID
        vineID = vineURL.substr(vineStart);
        vineID = vineID.substr(0, vineID.indexOf('/embed'));

        // prepend content to header
        var title = $('.single-post').find('strong').first();
        title.prependTo('.order');
        $('title').html(title.text());

        function replaceIframe() {
            iframe.remove();

            var iframeDim;
            $(window).width() > 800 ? iframeDim = $(window).height() - 180 : iframeDim = $(window).width() - 20;
            iframe.appendTo($('.single-gallery')).css({
                height: iframeDim,
                width: iframeDim
            }).load(function(){
                $(this).addClass('loaded playing');
                setTimeout(function(){
                    iframe[0].contentWindow.postMessage('play', '*');
                }, 150);
            });
            
        }
        var iframe = $('<iframe src="https://vine.co/v/' + vineID + '/embed/simple" frameborder="0"></iframe>');
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
            }, 250, vineID)
        });
    }

    // Show the side nav
    $('.order').fadeIn();

    // Blog nav in header.php must receive links from here
    var nextLink = $('#main .next1 a').attr('href') ? $('#main .next1 a').attr('href') : $('.oldest').attr('href');
        prevLink = $('#main .prev1 a').attr('href') ? $('#main .prev1 a').attr('href') : $('.latest').attr('href');
    $('.blognav .next1 a').attr('href', nextLink);
    $('.blognav .prev1 a').attr('href', prevLink);

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

});