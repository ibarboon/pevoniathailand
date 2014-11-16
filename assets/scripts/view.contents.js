$(function(){
	if ($('[name=input-action]').val() === 'view') {
		$('form select, input, textarea, button').prop('disabled', true);
	}
	
	$('#btn-edit').on('click', function(){
		$('form select, input, textarea, button').prop('disabled', false);
	});
	
	$('#content-control-checkbox').on('click', function(){
		if (this.checked) {
			$("#btn-do-delete").show();
		} else {
			$("#btn-do-delete").hide();
		}
		$('.content-checkbox').prop('checked', this.checked);
	});
	
	$('.content-checkbox').on('click', function(){
		if (this.checked) {
			$("#btn-do-delete").show();
		} else {
			if ($('.content-checkbox:checked').length == 0) {
				$("#btn-do-delete").hide();
			}
		}
	});
});