;(function ($, hoverReveal, undefined) {

	var reveal = function(){
		var $items = $('.hover-reveal-item');
		var $contents = $items.find('.hover-reveal-content');

		$contents.css({opacity: 0});

		$items.on({
			mouseenter: function () {
				$(this).find('.hover-reveal-content').fadeTo(300, 1);
			},
			mouseleave: function () {
				$(this).find('.hover-reveal-content').fadeTo(300, 0);
			}
		});
	};

	hoverReveal.init = function() {
		reveal();
	};

}(jQuery, window.hoverReveal = window.hoverReveal || {}));


jQuery(function(){
	hoverReveal.init();
});