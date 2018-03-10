/* ------------------------------------------------------------------------------
*
*  # Login form with validation
*
*  Specific JS code additions for login_validation.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

	// Style checkboxes and radios
	$('.styled').uniform();


    // Setup validation
    $(".form-validates").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label").text("")
        },
        rules: {
            password: {
                minlength: 5
            }
        },
        messages: {
            username: "Ingrese su nombre de usuario",
            password: {
            	required: "Ingrese su contraseña",
            	minlength: jQuery.validator.format("Se requieren al menos {0} caracteres")
            }
        },
		submitHandler:(function(){
		  var data = $(".form-validates").serialize();
		  var URLactual = window.location;
		  $.ajax({
			type:"POST",
			data:data,
			url:"",
			beforeSend: function(){	
			 $('#tabla').slideUp('fast');			 		 	
			 $("#suses").html("<div class='text-center'><h5 class='content-group'><i class='icon-spinner2 spinner'></i> <small class='display-block'>Procesando información..!</small></h5></div>");		 	
			},
			success: function(response){
			  $("#suses").show();
			  $("#suses").html("<div class='text-center'><h5 class='content-group'><i class='icon-spinner2 spinner'></i> <small class='display-block'>Generando listas..!</small></h5></div>");
			  setTimeout(window.location.href = URLactual,1000);			  	 
			}
		  });
		  return false;
		})		
    });

});
