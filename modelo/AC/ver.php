<!-- Basic modal -->
<div id="modal_default" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon  glyphicon-floppy-saved'></i> Actividad</h4>
            </div>
            <div class="modal-body">
            <form class="steps-ver" id="form-ver">
              <input type="hidden" name="id_mes" id="id" />
              <h6>Información Actividad</h6>
              <fieldset>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Dia de la Actividad: <span class="text-success">(ver)</span></label>
                          <input type="text" id="dia" name="dia" class="form-control" placeholder="Escriba el titulo de actividad" disabled>
                      </div> 
                      <div class="form-group">
                          <label>Titulo de Actividad: <span class="text-success">(ver)</span></label>
                          <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Escriba el titulo de actividad" disabled>
                      </div>                                                                 
                      <div class="form-group">
                          <label>Descripción de Actividad: <span class="text-success">(ver)</span></label>
                          <textarea id="descripcion" name="descripcion" rows="5" cols="5" class="form-control" placeholder="Escriba la actividad que se realizara" disabled></textarea>
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