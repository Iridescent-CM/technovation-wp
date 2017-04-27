;(function ($, technovation, undefined) {

	var headerScroll = function(){
		var header = $('.site-header');
		$(window).on('scroll', function() {
    	if($(window).scrollTop() > 97) {
        header.addClass('scrolled');
    	} else {
       header.removeClass('scrolled');
    	}
		});
	};

	var mobileNav = function(){
		var navs = $('#site-navigation, #secondary-navigation'),
			navItems = navs.find('li'),
			mobileNav = $('<nav id="mobile-nav"></nav>'),
			mobileUl = $('<ul></ul>').appendTo(mobileNav),
			header = $('#masthead'),
			page = $('#page');

			navItems.each(function(){
				var $this = $(this);
				$this.clone().appendTo(mobileUl);
			});

			page.append(mobileNav);

			header.append('<a href="#mobile-nav" class="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>');

			mobileNav.mmenu();
	};

	var printButton = function(){
		var firstRow = $('.fl-row').first();
		printButton = $('<a id="print-button" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print this page</a>');
		if (firstRow.length > 0) { // is a page builder page
			firstRow.append(printButton);
		}

		printButton.on('click', function(e){
			e.preventDefault();
			window.print();
		});
	};

	var videoSizing = function(){
		$('.entry-content').fitVids();
	};

	technovation.init = function() {
		headerScroll();
	  mobileNav();
	  printButton();
	  videoSizing();
	};

}(jQuery, window.technovation = window.technovation || {}));


jQuery(function(){
	technovation.init();
});