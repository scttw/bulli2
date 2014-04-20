Bulli = {
	init: function () {
		$('#Form_Form').addClass('form-group').find('select, input, textarea').each(function () {
			if (!$(this).hasClass('action')) {
				$(this).addClass('form-control');
			} else {
				$(this).addClass('btn btn-primary btn-lg btn-block');
			}
		});
		$('#Form_Form').find('label').addClass('control-label');
		$('body').on('DOMNodeInserted', 'label', function () {
		      if ($(this).hasClass('required')) {
		      	$(this).parents('div.field').addClass('has-error')
		      }
		});
		$('input, select, textarea').on('change', function () {
			$('div.field').each( function () {
				if ($(this).find('label.required').length) {
					$(this).removeClass('has-error');
				}
			});
		});

	}
};
$(document).ready(function () {
	Bulli.init();
});