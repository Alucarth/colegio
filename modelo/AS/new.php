<!-- Basic modal -->
<div id="modal_new" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon  glyphicon-floppy-saved'></i> Nuevo Alumno</h4>
            </div>
            <div class="modal-body">
            <form class="steps-modelo" id="form-modelo" method="post">
              <input type="hidden" name="mod_cod" value="guardar" />
              <input type="hidden" name="id_primaria" id="id_nivel" />
              <input type="hidden" name="edad" id="resultado_1" />
              <h6>Información Personal del Alumno</h6>
             <fieldset>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Nombre(s): <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="nombre" name="nombre" class="form-control required" placeholder="Escriba su nombre">
                      </div>
                      <div class="form-group">
                          <label>Apellido Parteno: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="ap_paterno" name="ap_paterno" class="form-control required" placeholder="Escriba su Apellido Parteno">
                      </div>
                      <div class="form-group">
                          <label>Apellido Marteno: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="ap_materno" name="ap_materno" class="form-control required" placeholder="Escriba su Apellido Marteno">
                      </div>  
                      <div class="form-group">
                          <label>Tutor o encargado del alumno: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="tutor" name="tutor" class="form-control required" placeholder="Escriba el nombre completo del tutor">
                      </div>                                                                                                                                       
                  </div> 
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Carnet Identidad: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="carnet" name="carnet" class="form-control required" placeholder="Numero de su C.I.">
                      </div>                  
                        <div class="form-group">
                            <label>Fecha de Nacimiento: <span class="text-danger">(Requerido)</span></label><br />
                            <div class="col-md-4">
                             <select class="form-control" id="dia"  name="dia">
                                  <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                                  <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
                                  <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                  <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
                                  <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                  <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
                                  <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
                                  <option value="29">29</option><option value="30">30</option><option value="31">31</option>                    
                              </select>               
                            </div>
                            <div class="col-md-4">
                             <select class="form-control" id="mes"  name="mes">
                                  <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                                  <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
                                  <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                             </select>                   
                            </div>
                            <div class="col-md-4">
                            <input type="text" id="ano" name="ano" class="form-control required" placeholder="Año" onKeyUp="fncSumar()"></div>
                        </div><br /> <br />                      
                      <div class="form-group">
                          <label>Celular o Telefono: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="celular" name="celular" class="form-control required" placeholder="Celular o teléfono de referencia" >
                      </div> 
                      <div class="form-group">
                          <label>Direción del alumno: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="direccion" name="direccion" class="form-control required" placeholder="Escriba la direccion actual del alumno" >
                      </div>                                                                                         
                  </div> 
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Edad: <span class="text-warning">(Generado)</span></label>
                          <input type="text" id="resultado" name="resultado" class="form-control required" disabled>
                      </div>                  
                    <div class="content-divider"> 
					  <?php 
                      if(!empty($foto)){
                       echo"<img src='".server_url.$carpeta.$id.".".$foto."' class='img-rounded img-preview'>";}
                      else{
                       echo"<img src='".server_url."userfiles/img/face1.png' class='img-rounded img-preview'>";}
                      ?>                                     
                    </div>                        
                    <div class="caption text-center"><h6><small>Foto de Alumno</small></h6></div>
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
              <h6>Información de Sessión</h6> 
              <fieldset>
                <!-- Info alert -->
                <div class="alert alert-info alert-styled-left alert-arrow-left alert-warning">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Cerrar</span></button>
                    <h6 class="alert-heading text-semibold">Datos Sesión al Sistema</h6>
                    El LOGIN Y CONTRASEÑA, del Alumno escrito sera: <br />LOGIN: PRIMER APELLIDO PATERNO Y CONTRASEÑA: NUMERO CARNET<br />
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
<script>
//Función que realiza la suma
function fncSumar(){
 var fecha_ini = Number(document.getElementById("ano").value);
 var fecha = <?php echo date('Y'); ?>;
 document.getElementById("resultado").value = fecha - fecha_ini;
  document.getElementById("resultado_1").value = fecha - fecha_ini;
}
</script>