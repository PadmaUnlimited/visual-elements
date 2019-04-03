jQuery(document).ready(function(jQuery){


	//toggle 3d navigation
	jQuery('.ve-3d-nav-trigger').on('click', function(){
		toggle3dBlock(!jQuery('.block-type-ve-3d-nav').hasClass('nav-is-visible'));
	});

	//select a new item from the 3d navigation
	jQuery(document).on('click', '.ve-3d-nav a', function(){
		var selected = jQuery(this);
		selected.parent('li').addClass('current').siblings('li').removeClass('current');
		//updateSelectedNav('close');
	});

	jQuery(window).on('resize', function(){
		window.requestAnimationFrame(updateSelectedNav);
	});	

	function toggle3dBlock(addOrRemove) {
		if(typeof(addOrRemove)==='undefined') addOrRemove = true;	
		jQuery('.block-type-ve-3d-nav').toggleClass('nav-is-visible', addOrRemove);
		jQuery('.ve-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);
		jQuery('main').toggleClass('nav-is-visible', addOrRemove).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			//fix marker position when opening the menu (after a window resize)
			addOrRemove && updateSelectedNav();
		});
	}

	//this function update the .cd-marker position
	function updateSelectedNav(type) {
		var marker = jQuery('.cd-marker');

		if( type == 'close') {
			marker.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				toggle3dBlock(false);
			});
		}
	}

	jQuery.fn.removeClassPrefix = function(prefix) {
	    this.each(function(i, el) {
	        var classes = el.className.split(" ").filter(function(c) {
	            return c.lastIndexOf(prefix, 0) !== 0;
	        });
	        el.className = jQuery.trim(classes.join(" "));
	    });
	    return this;
	};
});