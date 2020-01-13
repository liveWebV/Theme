jQuery(function($){
	$('.home-slider').bxSlider({
	  	auto: true,
	  	pager: false,
		wrapperClass: 'home-slider-wrapper',
		nextText: '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
	    prevText: '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
	    keyboardEnabled: true,
	    easing: 'ease-in',
	    speed: 500,
	});
	$('.lookbook-slider').bxSlider({
	    auto:true,
	    pager: false,
	    wrapperClass: 'carousel-wrapper',
	    nextText: '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
	    prevText: '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
	    keyboardEnabled: true,
	    easing: 'ease-in',
	    speed: 500,
	    minSlides: 5,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideWidth: $('.lookbook-slider').innerWidth() / 5
	});


	$('[data-fancybox="gallery"]').fancybox({
	  buttons : [ 
	    'slideShow',
	    'share',
	    'zoom',
	    'fullScreen',
	    'close'
	  ],
	  thumbs : {
	    autoStart : true
	  }
	});
});

const fullWidth = ( selector = '.full-width' ) => {
	var bodyWidth = document.querySelector('body').clientWidth;
	var elemWidth = document.querySelector( selector ).clientWidth;
	var fullWidth = ( bodyWidth- elemWidth ) / 2 + 'px';

	$('.full-width').css({
		marginLeft: '-' + fullWidth,
		marginRight: '-' + fullWidth,
		paddingLeft:  fullWidth,
		paddingRight:  fullWidth,
	});
}
document.addEventListener('readystatechange', event => {
    if( event.target.readyState === 'complete' ){
    	fullWidth();
    }
})