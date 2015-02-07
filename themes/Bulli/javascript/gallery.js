Bulli.gallery = {
	init: function () {
		$('a img').each( function () {
			if ($(this).width() > $(this).height()) {
				$(this).attr('data-potrait', 'landscape').addClass('landscape');
			} else {
				$(this).attr('data-potrait', 'portrait').addClass('portrait');
			}
		})
		$("a").fluidbox({overlayColor: '#000'});
	}
}
$(document).ready( function () {
	Bulli.gallery.init();
})