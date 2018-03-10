$(function() {
    var form = $(".steps-model").show();	
///////////////////////////////////////////////////////////////////	
    var form = $(".steps-model").show();
    // Initialize wizard
    $(".steps-model").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="number">#index#</span> #title#',
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex) {

            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }

            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }

            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {

                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },

        onStepChanged: function (event, currentIndex, priorIndex) {

            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }

            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },

        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },

        onFinished: function (event, currentIndex) {
				//información del formulario
				var formData = new FormData($("#form-model")[0]);
				var message = ""; 
				//hacemos la petición ajax  
				$.ajax({
					url: '',  
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){
						message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
						showMessage(message)        
					},
					success: function(data){
					$('.steps-model').hide("slow");	
                    swal({title: "Exito.!",text: "Se Actualizo los datos!",confirmButtonColor: "#66BB6A",type: "success"});
					$("#responsive").show("slow");
					$("#responsive").html("<div class='alert alert-success alert-styled-left alert-arrow-left alert-bordered' style='display:block'><span class='text-semibold'>Exito.! </span>Se Guardo los datos corretamente! <a href='' class='alert-link'>Para volver a cambiar los datos refrescar la pagina</a></div>");
						if(isImage(fileExtension))
						{
							swal("Opss..!", "No se puedo actualizar intente de nuevo!", "error")
						}
					},
					//si ha ocurrido un error
					error: function(){
						 swal("Opss..!", "No se puedo actualizar intente de nuevo!", "error")
						 $('.modal-backdrop').slideUp('fast');
					}
				});
        }
    });

    // Initialize validation
    $(".steps-model").validate({
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
        rules: {
            email: {
                email: true
            },
            password: {
                minlength: 5
            },
            repeat_password: {
                equalTo: "#password"
            }
        }
    });
	
	  
});
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}