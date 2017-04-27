;(function($){

	var imageLinks = $('a.image-button'),
		pageLocation = window.location.href;

	imageLinks.each(function(){
		var $this = $(this),
			href = $this.attr('href');

		if (href == pageLocation) {
			$this.addClass('selected');
		}

	});

}(jQuery));