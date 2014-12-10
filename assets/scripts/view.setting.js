$(function(){
	//
	if ($('[name=input-action]').val() === 'view') {
		$('form select, input, textarea, button').prop('disabled', true);
	}
	
	$('.btn-edit').on('click', function(){
		$('form select, input, textarea, button').prop('disabled', false);
		return false;
	});
	
	$('.do-delete-option').on('click', function(){
		var optionId = $(this).attr('data-option-id'),
			actionLink = $('[name=action-link]').val();
		$('li').has(this).hide();
		$.ajax({
			type: "POST",
			url: actionLink,
			data : { 'option_id' : optionId },
			success: function(res){
				//
			}
		});
		return false;
	});
});