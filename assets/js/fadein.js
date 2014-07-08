jQuery( document ).ready(function( $ ) {
	$('.active-slide').each(function(){
		$(this).addClass( 'fadein' );
		$(this).find( '.f-title' ).addClass('fadein');
		$(this).find( '.f-excerpt' ).addClass('fadein');
	});
	$('.sfeatured>ul>.post-item').each(function(){
		$(this).addClass( 'fadein' );
		$(this).find( '.sf-title' ).addClass('fadein');
		$(this).find( '.sf-excerpt' ).addClass('fadein');
	});
	$('.home .mpostfeed').each(function(){
		$(this).addClass('fadein');
		$(this).find('.post').addClass('fadein');
	});
	$('.fadein').each(function(i) {
		$(this).delay((i++) * 125).fadeTo(250, 1); 
	});
	
});