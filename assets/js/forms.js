$(function() {
    function submitData($form) {
        var formData = $form.serialize();
         return $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: formData,
            dataType: 'json',
        })
    }
    
    // create product with ajax
    $('#product_form').on('submit', function(e) {
        e.preventDefault();
    
        submitData($(this)).done(function(data) {
			console.log(data);
            if(data.errors != null) {
                $('.attribute_description').hide();
                $('.invalid-msg').hide();
                $.each(data.errors, function(key, value) {
                    $('#'+key).after("<div class='invalid-msg'>"+value+"</div>");
                });
            }
            else {
                window.location.href = data.redirect;
            }
        });
    });

    //delete multiple products with ajax
    $('#DeleteProductsForm').on('submit', function(e) {
        e.preventDefault();
    
        submitData($(this)).done(function(data) {
            window.location.href = data.redirect;
        });
    });

});