$(document).ready(function() {
    $('.attributes-input').hide();
	$('#productType').on('change', function() {
		if($(this).val() != null) {
			showProductAttribute($(this).val());
		}
	})
});

function showProductAttribute(value) {
    $('.attributes-input').hide();
	$('#'+value+'Attribute').show();
}