<!-- Basic modal -->
<div id="modal_new" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon  glyphicon-floppy-saved'></i> Nueva Actividad</h4>
            </div>
            <div class="modal-body">
            <form class="steps-modelo" id="form-modelo" method="post">
              <input type="hidden" name="mod_cod" value="guardar" />
              <input type="hidden" name="id_mes" id="id" />
              <h6>Información Actividad</h6>
              <fieldset>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Dia de Actividad: <span class="text-danger">(Requerido)</span></label>
                           <select class="form-control required" id="dia"  name="dia" placeholder="dia">
                                <option></option>
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
                      <div class="form-group">
                          <label>Titulo de Actividad: <span class="text-danger">(Requerido)</span></label>
                          <input type="text" id="titulo" name="titulo" class="form-control required" placeholder="Escriba el titulo de actividad">
                      </div>                                                                 
                      <div class="form-group">
                          <label>Descripción de Actividad: <span class="text-danger">(Requerido)</span></label>
                          <textarea id="descripcion" name="descripcion" rows="5" cols="5" class="form-control required" placeholder="Escriba la actividad que se realizara"></textarea>
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