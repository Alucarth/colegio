function desh(id,opc){
 var parametros = {"id" : id,"opc" : opc};	
 var URLactual = window.location;		
        swal({
            title: "Realmente desea "+opc+" ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Si, "+opc+" ..!",
            cancelButtonText: "No, Cancelar..!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
		 function(isConfirm){
		  	if (isConfirm){
			 $.ajax({
			  type: "POST",
			  url: "",
			  data: parametros,
			  success: function(){
			   swal({title: "Se "+ opc +" ..!",text: "La peticion con exito.",confirmButtonColor: "#66BB6A",type: "success"})
			   window.location.href = URLactual;
			  }	 
			 }) 	
			}else{
			 swal({title: " Se cancelo!",text: "La peticion con exito.",confirmButtonColor: "#2196F3",type: "error"})
			 window.location.href = URLactual;	
			} 
		 }
		)
}
//////////////////////////////////////////////////////////////////////////////////////////////
function habi(id,opc){
 var parametros = {"id" : id,"opc" : opc};	
 var URLactual = window.location;		
        swal({
            title: "Realmente desea "+opc+" ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Si, "+opc+" ..!",
            cancelButtonText: "No, Cancelar..!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
		 function(isConfirm){
		  	if (isConfirm){
			 $.ajax({
			  type: "POST",
			  url: "",
			  data: parametros,
			  success: function(){
			   swal({title: "Se "+ opc +" ..!",text: "La peticion con exito.",confirmButtonColor: "#66BB6A",type: "success"})
			   window.location.href = URLactual;
			  }	 
			 }) 	
			}else{
			 swal({title: " Se cancelo!",text: "La peticion con exito.",confirmButtonColor: "#2196F3",type: "error"})
			 window.location.href = URLactual;	
			} 
		 }
		)
}
//////////////////////////////////////////////////////////////////////////////////////////////
function asig(id,opc,id_){
 var URLactual = window.location;	
 var parametros = {"id" : id,"opc" : opc,"id_" : id_};	
 //var URLactual = window.location;	
        swal({
            title: "Realmente desea realizar la petición ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Si, Asignar docente ..!",
            cancelButtonText: "No, Cancelar..!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
		 function(isConfirm){
		  	if (isConfirm){
			 $.ajax({
			  type: "POST",
			  url: "",
			  data: parametros,
			  success: function(){
			   swal({title: "Exito ..!",text: "La peticion se realizo.",confirmButtonColor: "#66BB6A",type: "success"})
			   window.location.href = URLactual;
			  }	 
			 }) 	
			}else{
			 swal({title: "Se cancelo!",text: "La peticion con exito.",confirmButtonColor: "#2196F3",type: "error"})
			 window.location.href = URLactual;	
			} 
		 }
		)	 
}
////////////////////////////////////////////////////////////
