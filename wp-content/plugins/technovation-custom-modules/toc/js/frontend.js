jQuery(document).ready(function($) {
	var toc = $('.fl-toc').first(),
		row = toc.parents('.fl-row'),
		container = $('.entry-content'),
		tocContainer = $('<div class="sticky-toc"><div class="toc-toggle"><span class="closed"><i class="fa fa-bars" aria-hidden="true"></i> Table of Contents</span><span class="open"><i class="fa fa-close aria-hidden="true"></i> Close</span></div></div>'),
		queryString = window.location.search;

	if (queryString.indexOf('fl_builder') > 0 ) { // We're in page builder and need to be able to edit modules

	} else { // We're in display mode, no editing needed.
		row.hide();

		container.css('position', 'relative').append(tocContainer);
		var tocToggle = $('.toc-toggle');
		tocToggle.after(toc);

		tocToggle.on('click', function(e){
			e.preventDefault();
			$(this).toggleClass('open');
			toc.slideToggle();
		});

		$(window).on('scroll', function() {
			if($(window).scrollTop() > 450) {
				tocContainer.addClass('visible');
			} else {
				tocContainer.removeClass('visible');
			}
		});
	}

}(jQuery));