(function($){
	"use strict";

	/*----------------------------------
    * Blog
    -----------------------------------*/
    var posts = $('.posts');

    posts.owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    /*----------------------------------
    * Training & Category
    -----------------------------------*/

    $('#tnc .btn-tnc').click(function() {
        if (!$(this).hasClass('active')) {
            var target = $(this).attr('data-target');

            $('#tnc .tnc-category').removeClass('active');
            $('#' + target).addClass('active');
            $('#' + target + ' .card').addClass('animated');

            $('#tnc .btn-tnc').removeClass('active');
            $(this).addClass('active');

        }
    });

    /*----------------------------------
    * Hide nav menu of hiden section
    -----------------------------------*/
    
    $(window).load(function () { // makes sure the whole site is loaded
        
        var href;
        $('.home-section').each(function(index, value){
            if( $(this).css('display') == 'none' ) {
                href = '#' + $('.home-section:eq(' + index + ') > section').attr('id');
                $('a.nav-link[href="' + href + '"]').parent().css('display', 'none');
            }
        });

    })
	
})(jQuery)