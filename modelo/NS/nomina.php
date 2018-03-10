<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."notas_alumno.php");
	include($carpeta."reporte.php");
	$modelos =  modelo."/".$cod_mod."/";
	$tabla_0=$base->prefig."secundaria_aulas";
	$tabla_1=$base->prefig."alumno_secundaria";
	$tabla_2=$base->prefig."notas_s";
	$tabla_3=$base->prefig."docente_s";
	$tabla_e=$base->prefig."epoca";
	$carpeta="userfiles/user_Alumno_secundaria/";		
	$codigo="id";	
	$cod=$user->get_id();
  if (!$user->check_register()){
  }else{
	$sql_d="select id,nombre,ap_paterno,ap_materno,materia,nota_1,nota_2,nota_3,nota_4,notas,id_paralelo,id_edit from $tabla_3 where id='".$_GET["cod_1"]."'";
	 $rs_d=$base->dex_query($sql_d);
	 $dt_d=$base->dex_fetch_array($rs_d);			
	 $sql_02="select * from $tabla_1 where id_paralelo ='".$_GET["cod_0"]."'";
	 $rs_02=$base->dex_query($sql_02);
	 $sql_e="select * from $tabla_e";
	 $rs_e=$base->dex_query($sql_e);
	 $dt_e=$base->dex_fetch_array($rs_e);	 		
	 $fecha=date("Y-m-d");
	 if($base->dex_query_num_rows("select * from $tabla_e where estado_n='5'")==0){$vcalor_n=5;}else{if($base->dex_query_num_rows("select * from $tabla_e where estado_n='4'")==0){$vcalor_n=4;}else{if($base->dex_query_num_rows("select * from $tabla_e where estado_n='3'")==0){$vcalor_n=3;}else{if($base->dex_query_num_rows("select * from $tabla_e where estado_n='2'")==0){$vcalor_n=2;}else{if($base->dex_query_num_rows("select * from $tabla_e where estado_n='1'")==0){$vcalor_n=1;}}}}}
	 if($_POST["mod_cod"]=="guardar_nota_1"){
		 
		 $base->dex_query("update $tabla_3 set nota_1='1', modificacion='$fecha',notas='1' where $codigo='{$_GET['cod_1']}'");
	  for ($indice=1; $indice<=$_POST["rango"]; $indice++){
		if($_POST["asigna"][$indice]<>""){
		 if($base->dex_query_num_rows("select * from $tabla_2 where id_alumno='".$_POST["id_alumno"][$indice]."' and id_docente='".$_GET["cod_1"]."'")==0){
		   $base->dex_query("insert into $tabla_2 (id,id_alumno,id_aula,id_docente,primero,segundo,tercero,cuarto,estado_n,modificacion)value('','".$_POST["id_alumno"][$indice]."','".$_GET["cod_0"]."','".$_GET["cod_1"]."','".$_POST["asigna"][$indice]."','','','','$vcalor_n','$fecha')");	 
		 }else{
		   $base->dex_query("update $tabla_2 set primero='".$_POST["asigna"][$indice]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"][$indice]."'");	 
		 }	
		}  
	  }}else{if($_POST["mod_cod"]=="guardar_nota_2"){$base->dex_query("update $tabla_3 set nota_2='1', modificacion='$fecha',notas='1' where $codigo='{$_GET['cod_1']}'");
		 for ($indice=1; $indice<=$_POST["rango"]; $indice++){
		   if($_POST["asigna"][$indice]<>""){
			if($base->dex_query_num_rows("select * from $tabla_2 where id_alumno='".$_POST["id_alumno"][$indice]."' and id_docente='".$_GET["cod_1"]."")==0){				
			$base->dex_query("insert into $tabla_2 (id,id_alumno,id_aula,id_docente,primero,segundo,tercero,cuarto,estado_n,modificacion)
	 	    value('','".$_POST["id_alumno"][$indice]."','".$_GET["cod_0"]."','".$_GET["cod_1"]."','','".$_POST["asigna"][$indice]."','','','$vcalor_n','$fecha')");	
			}
			else{
			$base->dex_query("update $tabla_2 set segundo='".$_POST["asigna"][$indice]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"][$indice]."'");	
			}
		   }
		 }}else{if($_POST["mod_cod"]=="guardar_nota_3"){$base->dex_query("update $tabla_3 set nota_3='1', modificacion='$fecha',notas='1' where $codigo='{$_GET['cod_1']}'");
		 for ($indice=1; $indice<=$_POST["rango"]; $indice++){
		   if($_POST["asigna"][$indice]<>""){
			if($base->dex_query_num_rows("select * from $tabla_2 where id_alumno='".$_POST["id_alumno"][$indice]."' and id_docente='".$_GET["cod_1"]."")==0){
			$base->dex_query("insert into $tabla_2 (id,id_alumno,id_aula,id_docente,primero,segundo,tercero,cuarto,estado_n,modificacion)
	 	    value('','".$_POST["id_alumno"][$indice]."','".$_GET["cod_0"]."','".$_GET["cod_1"]."','','','".$_POST["asigna"][$indice]."','','$vcalor_n','$fecha')");}
			else{
			$base->dex_query("update $tabla_2 set tercero='".$_POST["asigna"][$indice]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"][$indice]."'");}	  
		   }		
		 }}else{if($_POST["mod_cod"]=="guardar_nota_4"){$base->dex_query("update $tabla_3 set nota_4='1', modificacion='$fecha',notas='1' where $codigo='{$_GET['cod_1']}'");
		   for ($indice=1; $indice<=$_POST["rango"]; $indice++){
			 if($_POST["asigna"][$indice]<>""){	
			  if($base->dex_query_num_rows("select * from $tabla_2 where id_alumno='".$_POST["id_alumno"][$indice]."' and id_docente='".$_GET["cod_1"]."")==0){
			  $base->dex_query("insert into $tabla_2 (id,id_alumno,id_aula,id_docente,primero,segundo,tercero,cuarto,estado_n,modificacion)
			  value('','".$_POST["id_alumno"][$indice]."','".$_GET["cod_0"]."','".$_GET["cod_1"]."','','','','".$_POST["asigna"][$indice]."','$vcalor_n','$fecha')");}
			  else{				
			  $base->dex_query("update $tabla_2 set cuarto='".$_POST["asigna"][$indice]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"][$indice]."'");} 
			 }		
		   }			 }}}}
	 	   
	 if($_POST["mod_cod"]=="actualizar_nota_1"){$base->dex_query("update $tabla_2 set primero='".$_POST["primero"]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"]."' and id_docente='".$_POST["id_docente"]."'");
	  $base->dex_query("update $tabla_3 set id_edit='0' where $codigo='".$_POST["id_docente"]."'");	}else{if($_POST["mod_cod"]=="actualizar_nota_2"){$base->dex_query("update $tabla_2 set segundo='".$_POST["segundo"]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"]."' and id_docente='".$_POST["id_docente"]."'");
		$base->dex_query("update $tabla_3 set id_edit='0' where $codigo='".$_POST["id_docente"]."'");}else{if($_POST["mod_cod"]=="actualizar_nota_3"){$base->dex_query("update $tabla_2 set tercero='".$_POST["tercero"]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"]."' and id_docente='".$_POST["id_docente"]."'");
			$base->dex_query("update $tabla_3 set id_edit='0' where $codigo='".$_POST["id_docente"]."'");}else{if($_POST["mod_cod"]=="actualizar_nota_4"){
			$base->dex_query("update $tabla_2 set cuarto='".$_POST["cuarto"]."',estado_n='$vcalor_n',modificacion='$fecha' where id_alumno='".$_POST["id_alumno"]."' and id_docente='".$_POST["id_docente"]."'");
			$base->dex_query("update $tabla_3 set id_edit='0' where $codigo='".$_POST["id_docente"]."'");}}}}	 
  }
?>
<!-- Nested object data -->
<form class="form-validates">
            <?php 
			 if($dt_e["estado_1"]=='A'){
			 ?>
				 <input type="hidden" name="mod_cod" value="guardar_nota_1" />				              
			 <?php	 
			 }else{
			  if($dt_e["estado_2"]=='A'){
			   ?>
				 <input type="hidden" name="mod_cod" value="guardar_nota_2" />				 			   
			   <?php	 				  
			  }else{
			   if($dt_e["estado_3"]=='A'){
				 ?>
				 <input type="hidden" name="mod_cod" value="guardar_nota_3" />				 
				 <?php	 				   
			   }else{
				 ?>
				 <input type="hidden" name="mod_cod" value="guardar_nota_4" />				 
				 <?php					   
			   }	  
			  }	 
			 }
			?>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="icon-user-check"></i> Nomina de Alumnos de Primaria<br />Paralelo :
        <?php 
        $sql_p="select * from $tabla_0 where id_secundaria ='".$_GET["cod_0"]."'";
        $rs_p=$base->dex_query($sql_p);
		$dt_p=$base->dex_fetch_array($rs_p);
		echo $dt_p["paralelo"];
		?>
        <br />Docente: <?php echo $dt_d["nombre"]." ".$dt_d["ap_paterno"]." ".$dt_d["ap_materno"] ?><br />Materia: <?php echo $dt_d["materia"] ?></h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li>
                <?php
				if($user->get_level()==1){ 
				 if($dt_d["notas"]==0){  
				 echo'<button type="submit" class="btn btn-success" value="notas"><span class="glyphicon glyphicon-plus" ></span> guardar Notas</button>';}					
				}
				?>
                </li>
                <li><a class="btn bg-blue" href="<?php echo server_url."".$modelos.$_GET["cod_0"]."/".$_GET["cod_1"]."/notas" ?>"><i class="icon-undo2 position-left"></i>Volver</a></li>   
                <li><a class="btn bg-brown" href="<?php echo server_url."".$modelos."imprimir.php?valor=".$_GET["cod_0"]."" ?>" target="_blank" style="color: #f3f4f4;"><i class="icon-printer position-left"></i>Imprimir</a></li>                             
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>    
    <table width="1290" class="table table datatable-ajax" id="tabla">
        <thead>
            <tr>
              <th width="13%">Documento de Identidad</th>
              <th width="31%">Nombre de Alumno</th>
              <th width="11%">Estado</th>
              <th width="31%">Notas</th>
              <?php if($user->get_level()==1){?>                    
              <th width="14%" class="text-center">Opciones</th><?php }?>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_1  where id_paralelo ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $dt_01["carnet"];?></td>
          <td>
			<?php 
            if(!empty($dt_01["foto"])){
             echo"<img src='".server_url.$carpeta.$dt_01["id"].".".$dt_01["foto"]."' class='img-xs'>";}
            else{
             echo"<img src='".server_url.$carpeta."face.png' class='img-xs'>";}
            ?>           
            <span class="text-default display-inline-block"><?php echo $dt_01["nombre"]." ".$dt_01["ap_paterno"]." ".$dt_01[ "ap_materno"];?></span>
          </td>
          <td>
           <ul class="icons-list">
			  <?php if($dt_01["estado"]=="A"){?>
              <li><i class="icon-checkmark3 text-success"></i> Activo</li>
              <?php }else{?>
              <li><i class="icon-cross2 text-danger-400"></i> Inactivo</li>
              <?php }?>     
            </ul>             
          </td>
          <td class="text-center">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="row">
                      <input type="hidden" name="id_alumno[<?php echo $i ?>]" value="<?php echo $dt_01["id"] ?>" />
						<?php 
                        $sql_n="select estado_1,estado_2,estado_3,estado_4,estado_n from $tabla_e";
                        $rs_n=$base->dex_query($sql_n);
                        $dt_n=$base->dex_fetch_array($rs_n);
                        $sql_="select id_alumno,primero,segundo,tercero,cuarto,estado_n from $tabla_2 where id_alumno='".$dt_01["id"]."' and id_docente='".$_GET["cod_1"]."'";
                        $rs_=$base->dex_query($sql_);
                        $dt_=$base->dex_fetch_array($rs_); 																	
                        ?>                            
                        <div class="col-md-3">
                            <input type="text" name="asigna[<?php echo $i ?>]" class="form-control required" <?php 
							if($dt_n["estado_1"]=='A'){
								if($dt_d["nota_1"]==1){
									if($dt_d["nota_1"]==2){
										echo 'value="'.$dt_["primero"].'"';}
									else{
										echo 'value="'.$dt_["primero"].'" disabled';}}
								else{
									echo' placeholder=".. !"';}}
							else{
								if($dt_n["estado_1"]=='B'){
									if($dt_["primero"]==0){
										echo' placeholder=".. ?" disabled';}
								    else{
									     if($dt_d["nota_1"]==2){echo 'value="'.$dt_["primero"].'"';}
								else{echo 'value="'.$dt_["primero"].'" disabled';}}}}?> />
                            <span class="<?php if($dt_n["estado_1"]=='A'){?>help-block text-right text-danger<?php }else{?>help-block text-right<?php }?>">Nota 1</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="asigna[<?php echo $i ?>]" class="form-control required" <?php if($dt_n["estado_2"]=='A'){if($dt_d["nota_2"]==1){if($dt_d["nota_2"]==2){echo 'value="'.$dt_["segundo"].'"';}else{echo 'value="'.$dt_["segundo"].'" disabled';}}else{echo' placeholder=".. !"';}}else{if($dt_n["estado_2"]=='B'){if($dt_["segundo"]==0){echo' placeholder=".. ?" disabled';}else{if($dt_d["nota_2"]==2){echo 'value="'.$dt_["segundo"].'"';}else{echo 'value="'.$dt_["segundo"].'" disabled';}}}}?> />
                            <span class="<?php if($dt_n["estado_2"]=='A'){?>help-block text-right text-danger<?php }else{?>help-block text-right<?php }?>">Nota 2</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="asigna[<?php echo $i ?>]" class="form-control required" <?php if($dt_n["estado_3"]=='A'){if($dt_d["nota_3"]==1){if($dt_d["nota_3"]==2){echo 'value="'.$dt_["tercero"].'"';}else{echo 'value="'.$dt_["tercero"].'" disabled';}}else{echo' placeholder=".. !"';}}else{if($dt_n["estado_3"]=='B'){if($dt_["tercero"]==0){echo' placeholder=".. ?" disabled';}else{if($dt_d["nota_3"]==2){echo 'value="'.$dt_["tercero"].'"';}else{echo 'value="'.$dt_["tercero"].'" disabled';}}}}?> />
                            <span class="<?php if($dt_n["estado_3"]=='A'){?>help-block text-right text-danger<?php }else{?>help-block text-right<?php }?>">Nota 3</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="asigna[<?php echo $i ?>]" class="form-control required" <?php if($dt_n["estado_4"]=='A'){if($dt_d["nota_4"]==1){if($dt_d["nota_4"]==2){echo 'value="'.$dt_["cuarto"].'"';}else{echo 'value="'.$dt_["cuarto"].'" disabled';}}else{	echo' placeholder=".. !"';}}else{if($dt_n["estado_4"]=='B'){if($dt_["cuarto"]==0){echo' placeholder=".. ?" disabled';}else{if($dt_d["nota_4"]==2){echo 'value="'.$dt_["cuarto"].'"';}else{echo 'value="'.$dt_["cuarto"].'" disabled';}}}}?> />
                            <span class="<?php if($dt_n["estado_4"]=='A'){?>help-block text-right text-danger<?php }else{?>help-block text-right<?php }?>">Nota 4</span>
                        </div>                                                         
                    </div>
                </div>
            </div>  
          </td>
          <td class="text-center">
            <?php
			if(($dt_d["nota_1"]==1 or $dt_d["nota_1"]==0) and ($dt_d["id_paralelo"]<>0) and ($dt_01["id"]==$dt_d["id_edit"]) and ($dt_["estado_n"]==1)){?>
            <a href="javascript:void(0);" class="btn border-teal text-teal-600 btn-flat btn-icon" data-toggle="modal" data-target="#modal_notas" title="Notas del alumno" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>" data-id_alumno="<?php echo $dt_01["id"];?>" data-id_aula="<?php echo $_GET["cod_0"];?>" data-id_docente="<?php echo $_GET["cod_1"];?>" data-nota_1="<?php echo $dt_["primero"];?>" data-nota_2="<?php echo $dt_["segundo"];?>" data-nota_3="<?php echo $dt_["tercero"];?>"data-nota_4="<?php echo $dt_["cuarto"];?>"><i class="icon-file-eye text-success"></i> Primera nota</a><br /><br />            
			<?php	
			}else{
			 if(($dt_d["nota_2"]==1 or $dt_d["nota_2"]==0) and ($dt_d["id_paralelo"]<>0) and ($dt_01["id"]==$dt_d["id_edit"]) and ($dt_["estado_n"]==2)){?>
            <a href="javascript:void(0);" class="btn border-teal text-teal-600 btn-flat btn-icon" data-toggle="modal" data-target="#modal_notas" title="Notas del alumno" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>" data-id_alumno="<?php echo $dt_01["id"];?>" data-id_aula="<?php echo $_GET["cod_0"];?>" data-id_docente="<?php echo $_GET["cod_1"];?>" data-nota_1="<?php echo $dt_["primero"];?>" data-nota_2="<?php echo $dt_["segundo"];?>" data-nota_3="<?php echo $dt_["tercero"];?>"data-nota_4="<?php echo $dt_["cuarto"];?>"><i class="icon-file-eye text-success"></i> Segunda nota</a><br /><br />            
			<?php				 
			 }else{
			   if(($dt_d["nota_3"]==1 or $dt_d["nota_3"]==0) and ($dt_d["id_paralelo"]<>0) and ($dt_01["id"]==$dt_d["id_edit"]) and ($dt_["estado_n"]==3)){?>
            <a href="javascript:void(0);" class="btn border-teal text-teal-600 btn-flat btn-icon" data-toggle="modal" data-target="#modal_notas" title="Notas del alumno" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>" data-id_alumno="<?php echo $dt_01["id"];?>" data-id_aula="<?php echo $_GET["cod_0"];?>" data-id_docente="<?php echo $_GET["cod_1"];?>" data-nota_1="<?php echo $dt_["primero"];?>" data-nota_2="<?php echo $dt_["segundo"];?>" data-nota_3="<?php echo $dt_["tercero"];?>"data-nota_4="<?php echo $dt_["cuarto"];?>"><i class="icon-file-eye text-success"></i> Tercera nota</a><br /><br />            
			<?php				   
			   }else{
				 if(($dt_d["nota_4"]==1 or $dt_d["nota_4"]==0) and ($dt_d["id_paralelo"]<>0) and ($dt_01["id"]==$dt_d["id_edit"]) and ($dt_["estado_n"]==4)){?>
            <a href="javascript:void(0);" class="btn border-teal text-teal-600 btn-flat btn-icon" data-toggle="modal" data-target="#modal_notas" title="Notas del alumno" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>" data-id_alumno="<?php echo $dt_01["id"];?>" data-id_aula="<?php echo $_GET["cod_0"];?>" data-id_docente="<?php echo $_GET["cod_1"];?>" data-nota_1="<?php echo $dt_["primero"];?>" data-nota_2="<?php echo $dt_["segundo"];?>" data-nota_3="<?php echo $dt_["tercero"];?>"data-nota_4="<?php echo $dt_["cuarto"];?>"><i class="icon-file-eye text-success"></i> Cuarta nota</a><br /><br />           
			<?php					 
				 }							   
			   }								 
			 }				
			}
			if($user->get_level()==1){
			?>
            <a data-toggle="modal" data-target="#modal_reporte" class="btn bg-success-400" onclick="reporte('<?php echo $dt_["primero"];?>','<?php echo $dt_["segundo"];?>','<?php echo $dt_["tercero"];?>','<?php echo $dt_["cuarto"];?>')"><i class="icon-statistics"></i> Estado del Alumno</a>           
            <?php }?>
          </td>
      </tr>
        <?php
        $i++; 
        }?>        
        </tbody>
    </table> 
    <div id="suses"></div>   
</div>
<input type="hidden" name="rango" value="<?php echo $i?>" />
</form>
<script>
        $('#modal_notas').on('show.bs.modal', function(event) {
		  var button = $(event.relatedTarget)
          var nombre = button.data('nombre')
		  var ap_paterno = button.data('ap_paterno')
		  var ap_materno = button.data('ap_materno')
		  var id_alumno = button.data('id_alumno')
		  var id_aula = button.data('id_aula')
		  var id_docente = button.data('id_docente')
		  var nota_1 = button.data('nota_1')
		  var nota_2 = button.data('nota_2')
		  var nota_3 = button.data('nota_3')
		  var nota_4 = button.data('nota_4')
		  var modal = $(this)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #ap_paterno').val(ap_paterno)
		  modal.find('.modal-body #ap_materno').val(ap_materno)
		  modal.find('.modal-body #id_alumno').val(id_alumno)
		  modal.find('.modal-body #id_aula').val(id_aula)
		  modal.find('.modal-body #id_docente').val(id_docente)
		  modal.find('.modal-body #nota_1').val(nota_1)
		  modal.find('.modal-body #nota_2').val(nota_2)
		  modal.find('.modal-body #nota_3').val(nota_3)
		  modal.find('.modal-body #nota_4').val(nota_4)	  	  		  
        });		
</script>				
<!-- Quick stats boxes -->
 
