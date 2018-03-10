<!-- Basic modal -->
<div id="modal_new" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon  glyphicon-floppy-saved'></i> Nuevo paralelo</h4>
            </div>
            <div class="modal-body">
            <form class="steps-modelo" id="form-modelo" method="post">
              <input type="hidden" name="mod_cod" value="guardar" />
              <input type="hidden" name="id_primaria" id="id" />
              <h6>Información paralelo</h6>
              <fieldset>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombre del Paralelo: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="paralelo" name="paralelo" class="form-control required" placeholder="Nombre del paralelo">
                      </div>                                            
                  </div> 
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Cantidad de alumnos: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="cantidad" name="cantidad" class="form-control required" placeholder="Cantidad de Alumnos por paralelo">
                      </div>                                             
                  </div>                                                                                   
              </div>      
              </fieldset>    
            </form>
			</div>
        </div>
    </div>
</div>
<!-- /basic modal -->