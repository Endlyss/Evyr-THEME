jQuery( document ).ready(function( $ ) {
	$('#slider').bxSlider({
		infiniteLoop: true,
		mode: 'fade',
		auto: false,
		autoControls: false,
		pause: 7500,
		nextSelector: '.f-next',
		prevSelector: '.f-prev',
		onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
		    console.log(currentSlideHtmlObject);
		    $('.active-slide').removeClass('active-slide');
		    $('#slider>li').eq(currentSlideHtmlObject).addClass('active-slide')
		},
		onSliderLoad: function () {
		    $('#slider>li').eq(0).addClass('active-slide')
		}
	});
	$(window).bind('scroll', function() {
		if ($(window).scrollTop() > 169) {
			$('.fixed-menu').addClass('is-fixed');
		}
		else {
			$('.fixed-menu').removeClass('is-fixed');
		}

		if ($(window).scrollTop() > 211) {
			$('.lheader').addClass('opaque-bg');
			$('.socialb').addClass('opaque-bg');
		}
		else {
			$('.lheader').removeClass('opaque-bg');
			$('.socialb').removeClass('opaque-bg');
		}
	});
	$(document).ready(function()
	{
	    $(".mnavi").accessibleDropDown();
	});

	$.fn.accessibleDropDown = function ()
	{
	    var el = $(this);

	    /* Setup dropdown menus for IE 6 */

	    $("li", el).mouseover(function() {
	        $(this).addClass("focused");
	    }).mouseout(function() {
	        $(this).removeClass("focused");
	    });

	    /* Make dropdown menus keyboard accessible */

	    $("a", el).focus(function() {
	        $(this).parents("li").addClass("focused");
	    }).blur(function() {
	        $(this).parents("li").removeClass("focused");
	    });
	}
});


