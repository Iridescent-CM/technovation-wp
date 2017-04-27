;(function($){

	var tabsContainer = $('.graphic-tabs-tabs'),
		contentContainer = $('.graphic-tab-container');

	contentContainer.hide();

	tabsContainer.on('click', 'a', function(e){
		e.preventDefault();
		var $this = $(this),
			href = $this.attr('href'),
			listItem = $this.parent('li'),
			content = $(href),
			visible = contentContainer.filter(':visible');



		listItem.addClass('current').siblings().removeClass('current');

		if (visible.length > 0) {
			visible.slideUp('fast', function(){
				content.slideDown('slow');
			});
		} else {
			content.slideDown('slow');
		}

	});


}(jQuery));