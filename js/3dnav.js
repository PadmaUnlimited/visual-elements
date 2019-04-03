jQuery(document).ready(function(jQuery){
	//toggle 3d navigation
	jQuery('.cd-3d-nav-trigger').on('click', function(){
		toggle3dBlock(!jQuery('.cd-header').hasClass('nav-is-visible'));
	});

	//select a new item from the 3d navigation
	jQuery('.cd-3d-nav').on('click', 'a', function(){
		var selected = jQuery(this);
		selected.parent('li').addClass('cd-selected').siblings('li').removeClass('cd-selected');
		updateSelectedNav('close');
	});

	jQuery(window).on('resize', function(){
		window.requestAnimationFrame(updateSelectedNav);
	});

	function toggle3dBlock(addOrRemove) {
		if(typeof(addOrRemove)==='undefined') addOrRemove = true;	
		jQuery('.cd-header').toggleClass('nav-is-visible', addOrRemove);
		jQuery('.cd-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);
		jQuery('main').toggleClass('nav-is-visible', addOrRemove).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			//fix marker position when opening the menu (after a window resize)
			addOrRemove && updateSelectedNav();
		});
	}

	//this function update the .cd-marker position
	function updateSelectedNav(type) {
		var selectedItem = jQuery('.cd-selected'),
			selectedItemPosition = selectedItem.index() + 1, 
			leftPosition = selectedItem.offset().left,
			backgroundColor = selectedItem.data('color'),
			marker = jQuery('.cd-marker');

		marker.removeClassPrefix('color').addClass('color-'+ selectedItemPosition).css({
			'left': leftPosition,
		});
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