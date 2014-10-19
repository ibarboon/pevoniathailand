$(function(){
	$('.get-photo-modal').on('click', function(){
		var photoName = $(this).attr('data-photo-name'),
			actionLink = $(this).attr('data-action-link'),
			photoSrc = $(this).find('img').attr('src'),
			editPhotoSrc = $('#site_url').val() + 'backend/slides/do_edit_photo/' + photoName,
			deletePhotoSrc = $('#site_url').val() + 'backend/slides/do_delete_photo/' + photoName;
		$('#do-delete-photo').attr('href', deletePhotoSrc);
		$('#photo-modal').find('.col-xs-7').empty().append('<img src="' + photoSrc + '" style="width: 100%;">');
		$('#photo-modal').find('#edit-photo-form').attr('action', editPhotoSrc);
		$('#photo-modal').find('[name=input-action-link]').val(actionLink);
		$('#photo-modal').find('#edit-photo-form input').attr('disabled', 'disabled');
	});
	
	$('#do-edit-photo').on('click', function(){
		$('#edit-photo-form input').removeAttr('disabled');
	});
	
	$('[name=cancel-edit-photo]').on('click', function(){
		$('#edit-photo-form input').attr('disabled', 'disabled');
	});
});