function gridInit( $container ){

	if( !jQuery().isotope ) {
		console.log('gridInit: Isotope not Defined.');
		return true;
	}

	if( $container.length < 1 ) { return true; }
	if( $container.hasClass('customjs') ) { return true; }

	
	$container.each( function(){
		var element = jQuery(this),
			elementTransition = element.attr('data-transition'),
			elementLayoutMode = element.attr('data-layout'),
			elementStagger = element.attr('data-stagger'),
			elementOriginLeft = true;

		if( !elementTransition ) { elementTransition = '0.65s'; }
		if( !elementLayoutMode ) { elementLayoutMode = 'masonry'; }
		if( !elementStagger ) { elementStagger = 0; }
		if( $body.hasClass('rtl') ) { elementOriginLeft = false; }

		setTimeout( function(){
			if( element.hasClass('portfolio') ){
				element.isotope({
					layoutMode: elementLayoutMode,
					isOriginLeft: elementOriginLeft,
					transitionDuration: elementTransition,
					stagger: Number( elementStagger ),
					masonry: {
						columnWidth: element.find('.portfolio-item:not(.wide)')[0]
					}
				});
			} else {
				element.isotope({
					layoutMode: elementLayoutMode,
					isOriginLeft: elementOriginLeft,
					transitionDuration: elementTransition
				});
			}
		}, 300);

	})
	return instances;
}

(function($){

	gridInit(jQuery('.portfolio'));
		
	jQuery(document).on('click','.portfolio-filter li a',function(){
	  	var filterValue = $(this).attr('data-filter');
		jQuery('.portfolio').each( function(){
	  		jQuery(this).isotope({ filter: filterValue });
		});		
	})

})(jQuery);
