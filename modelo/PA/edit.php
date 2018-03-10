<!-- Basic modal -->
<div id="modal_default" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-wrench'></i> Editar datos de Personal</h4>
            </div>
            <div class="modal-body">
<form class="steps-modo" id="form-modo" method="post" enctype="multipart/form-data">
  <input type="hidden" name="mod_cod" value="actualizar" />
  <input type="hidden" name="id_usuario" id="id_usuario" />
  <input type="hidden" name="foto" id="foto" /> 
  <h6>Información personal</h6>
  <fieldset>
  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label>Nombre completo: <span class="text-danger">(Requerido)</span></label>
              <input type="text" id="nombre" name="nombre" class="form-control required" placeholder="Nombre completo">
          </div>
          <div class="form-group">
              <label>Apellido Paterno: <span class="text-danger">(Requerido)</span></label>
              <input type="text" id="ap_paterno" name="ap_paterno" class="form-control required" placeholder="Apellido Paterno">
          </div> 
          <div class="form-group">
              <label>Apellido Materno: <span class="text-danger">(Requerido)</span></label>
              <input type="text" id="ap_materno" name="ap_materno" class="form-control required" placeholder="Apellido Materno" >
          </div> 
          <div class="form-group">
            <label>Cargo: <span class="text-danger">(Requerido)</span></label>
            <input type="text" id="cargo"  name="cargo" class="form-control required" placeholder="Puesto del personal" >
          </div>                                                                    
      </div>               
      <div class="col-md-4">
          <div class="form-group">
              <label>Dirección: <span class="text-danger">(Requerido)</span></label>
              <input type="text" id="direccion" name="direccion" class="form-control required" placeholder="Dirección actual">
          </div>
          <div class="form-group">
              <label>Celular o teléfono: <span class="text-danger">(Requerido)</span></label>
              <input type="text" id="cel" name="cel" class="form-control required" placeholder="Celular o teléfono" >
          </div> 
          <div class="form-group">
              <label>Email: <span class="text-success">(Opcional)</span></label>
              <input type="email" id="email" name="email" class="form-control" placeholder="tu@email.com" >
          </div>
          <div class="form-group">
              <label>Nivel de usuario: <span class="text-warning">(Generado)</span></label>
              <input type="text" id="nivel"  name="nivel" class="form-control" disabled>
          </div>           	                                                             
      </div>
      <div class="col-md-4"> 
          <div class="form-group">
            <label>Carnet: <span class="text-danger">(Requerido)</span></label>
            <input type="text" id="carnet"  name="carnet" class="form-control required" placeholder="Documento de identidad" >
          </div>           
        <div class="content-divider"> 
                        <?php 
						if(!empty($foto)){
						 echo"<img src='".server_url.$carpeta.$id.".".$foto."' class='img-rounded img-preview'>";}
						else{
						 echo"<img src='".server_url."userfiles/img/face1.png' class='img-rounded img-preview'>";}
						?>                                     
        </div>                        
        <div class="caption text-center"><h6><small>Foto de Perfil</small></h6></div>
        <div class="form-group">
          <div class="input-group-btn">					
            <div tabindex="500" class="btn btn-primary btn-file"><i class="icon-file-plus"></i> 
            <span class="hidden-xs">Seleccionar archivo</span>
            <input id="archivo" name="archivo" type="file">
            </div>
            <span class="help-block">Formatos aceptados: gif, png, jpg.</span>            
          </div>  
        </div>
      </div>                                             
  </div>      
  </fieldset>  
  <h6>Información de sesión</h6>
  <fieldset>
    <!-- Info alert -->
    <div class="alert alert-info alert-styled-left alert-arrow-left alert-warning">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Cerrar</span></button>
        <h6 class="alert-heading text-semibold">Datos Sesión al Sistema</h6>
        El LOGIN Y CONTRASEÑA, del Personal escrito sera: <br />LOGIN: PRIMER APELLIDO PATERNO Y CONTRASEÑA: NUMERO CARNET<br />
        TENDRA QUE CAMBIAR SOLO LA PRIMERA VEZ QUE INICIE SESSION 
    </div>
    <!-- /info alert --> 			
  </fieldset>
</form>
			</div>
        </div>
    </div>
</div>
<!-- /basic modal -->