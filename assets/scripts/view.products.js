$(function(){
	if ($('[name=input-action]').val() === 'view') {
		$('form select, input, textarea, button').prop('disabled', true);
	}
	
	$('#btn-edit').on('click', function(){
		$('form select, input, textarea, button').prop('disabled', false);
	});
	
	/* PRODUCT_FORM_VIEW.PHP ******** */
	var productClassSeleted = $('[name=input-product-class]:checked').val();
	$('[name=input-product-type]').hide();
	$('#' + productClassSeleted).show();
	$('#label-product-type').attr('for', productClassSeleted);
	
	$('[name=input-product-class]').on('click', function(){
		productClassSeleted = $('[name=input-product-class]:checked').val();
		$('[name=input-product-type]').hide();
		$('#label-product-type').attr('for', productClassSeleted);
		$('#' + productClassSeleted).show();
	});
	
	
	$('#checkbox-all').on('click', function(){
		if (this.checked) {
			$("#btn-do-delete").show();
		} else {
			$("#btn-do-delete").hide();
		}
		$('.checkbox-for-delete').prop('checked', this.checked);
	});
	
	$('.checkbox-for-delete').on('click', function(){
		if (this.checked) {
			$("#btn-do-delete").show();
		} else {
			if ($('.checkbox-for-delete:checked').length == 0) {
				$("#btn-do-delete").hide();
			}
		}
	});
});