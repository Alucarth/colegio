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
    $(".form-validate").validate({
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
            label.addClass("validation-valid-label").text("Correcto")
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
		  var data = $(".form-validate").serialize();
		  $.ajax({
			type:"POST",
			data:data,
			url:"admin/process.php",
			beforeSend: function(){				 		 	
			 $("#suses").html("<div class='text-center'><h5 class='content-group'><i class='icon-spinner2 spinner'></i> <small class='display-block'>Procesando información..!</small></h5></div>");
			 $('#login').slideUp('fast');		 	
			},
			success: function(response){
			 if(response=="ok"){
			  $('#login').slideUp('fast');
			  $("#suses").show();
			  $("#suses").html("<div class='text-center'><h5 class='content-group'><i class='icon-spinner2 spinner'></i> <small class='display-block'>Ingresando al Sistema..!</small></h5></div>");
			  setTimeout(' window.location.href = "admin/home.php"; ',1000);			  	 
			 }else{
				$.jGrowl('Mensaje de Error!', {
					position: 'top-center',
					theme: 'bg-danger',
					header: response
				});
			   $('#suses').slideUp('fast');
			   $('#login').slideDown('fast');
			   $('#username').val('');			   		   
			   $('#password').val('');
			   $(".validation-valid-label").hide();				 
			 }	
			}
		  });
		  return false;
		})		
    });

});
