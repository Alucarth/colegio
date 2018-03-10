<?php 
	$base=new base();
	$user=new user();
	$tabla_e=$base->prefig."notas_s";	
	$cod=$user->get_id();
	if (!$user->check_register()){
	}
	echo $_POST["id_valor"];   		
?>
<!-- Basic modal -->
<div id="modal_notas" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon  glyphicon-pencil'></i> Notas del Alumno <?php echo $_POST["id_valor"]; ?></h4>
            </div>
            <div class="modal-body">
            <form class="steps-notas" id="form-notas" method="post">
            <?php 
			 $sql_e="select * from $tabla_e";
			 $rs_e=$base->dex_query($sql_e);
			 $dt_e=$base->dex_fetch_array($rs_e);
			 if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='1'")==1){
			 ?>
				 <input type="hidden" name="mod_cod" value="actualizar_nota_1" />				              
			 <?php	 
			 }else{
               if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='2'")==1){
			   ?>
				 <input type="hidden" name="mod_cod" value="actualizar_nota_2" />				 			   
			   <?php	 				  
			  }else{
               if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='3'")==1){
				 ?>
				 <input type="hidden" name="mod_cod" value="actualizar_nota_3" />				 
				 <?php	 				   
			   }else{
               if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='4'")==1){?>
                <input type="hidden" name="mod_cod" value="actualizar_nota_4" />
                <?php
				}   
			   }	  
			  }	 
			 }
			?>              
              <input type="hidden" name="id_alumno" id="id_alumno" />
              <input type="hidden" name="id_aula" id="id_aula" />
              <input type="hidden" name="id_docente" id="id_docente" />
              <h6>Información Personal del Alumno</h6>
              <fieldset>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Nombre(s): <span class="text-success">(Generado)</span></label>
                          <input type="text" id="nombre" name="nombre" class="form-control required" disabled>
                      </div>
                  </div> 
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Apellido Parteno: <span class="text-success">(Generado)</span></label>
                          <input type="text" id="ap_paterno" name="ap_paterno" class="form-control required" disabled>
                      </div>                                                                                      
                  </div> 
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Apellido Marteno: <span class="text-success">(Generado)</span></label>
                          <input type="text" id="ap_materno" name="ap_materno" class="form-control required" disabled>
                      </div>                       
                  </div>                                                                                                     
              </div>                   
              </fieldset> 
              <h6>Información de Notas</h6> 
              <fieldset>
              <?php 
			  $sql_n="select estado_n from $tabla_e";
			  $rs_n=$base->dex_query($sql_n);
			  $dt_n=$base->dex_fetch_array($rs_n);			  
			  ?>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Primer Bimestre: <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='1'")==1){?><span class="text-danger">(Requerido)</span><?php }else{?>
                          <span class="text-success">(Bloquedo)</span><?php }?></label>
                          <input type="text" name="primero" class="form-control <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='1'")==1){?>required" id="nota_1" placeholder="Escriba la primero nota" <?php }else{?> id="primero" placeholder="Nota Deshabilitada" disabled<?php }?> />
                      </div>
                  </div> 


                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Segundo Bimestre: <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='2'")==1){?><span class="text-danger">(Requerido)</span><?php }else{?>
                          <span class="text-success">(Bloquedo)</span><?php }?></label>
                          <input type="text"  name="segundo" class="form-control <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='2'")==1){?>required" id="nota_2" placeholder="Escriba la Segunda nota" <?php }else{?> id="segundo" placeholder="Nota Deshabilitada" disabled<?php }?> />
                      </div>                                                                                      
                  </div> 
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Tercer Bimestre: <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='3'")==1){?><span class="text-danger">(Requerido)</span><?php }else{?>
                          <span class="text-success">(Bloquedo)</span><?php }?></label>
                          <input type="text" name="tercero" class="form-control <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='3'")==1){?>required" id="nota_3" placeholder="Escriba la Tercera nota"<?php }else{?> id="tercero" placeholder="Nota Deshabilitada" disabled<?php }?>  />
                      </div>                       
                  </div> 
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Cuarto Bimestre: <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='4'")==1){?><span class="text-danger">(Requerido)</span><?php }else{?>
                          <span class="text-success">(Bloquedo)</span><?php }?></label>
                          <input type="text" name="cuarto" class="form-control <?php if($base->dex_query_num_rows("select estado_n from $tabla_e where estado_n='4'")==1){?>required" id="nota_4" placeholder="Escriba la Cuarta nota"<?php }else{?> id="cuarto" placeholder="Nota Deshabilitada" disabled<?php }?> />
                      </div>                       
                  </div>                    			
              </fieldset>    
            </form>
			</div>
        </div>
    </div>
</div>
<!-- /basic modal -->