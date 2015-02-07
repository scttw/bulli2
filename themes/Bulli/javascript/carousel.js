Bulli.carousel = {
	init: function () {
		$('.dropdown-toggle').click(function(e) {
			e.preventDefault();
			setTimeout($.proxy(function() {
				if ('ontouchstart' in document.documentElement) {
					$(this).siblings('.dropdown-backdrop').off().remove();
			}
			}, this), 0);
		});
		$("#gallery img").each(function () {
			$(this).attr('data-link', $(this).parent().attr('href'));
			$(this).unwrap();
		});
		$("#gallery").flexslider({
			selector: '.carouselContainer > .carousel',
			animation: 'slide',
			prevText: '',
			nextText: '',
			smoothHeight: true
		});
	}
}

$(document).ready(function () {
	Bulli.carousel.init();
});