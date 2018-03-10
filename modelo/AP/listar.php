<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."new.php");
	$tabla=$base->prefig."primaria";
	$carpeta="userfiles/user_Alumno_primaria/";
	$modelos =  modelo."/".$cod_mod."/";
	$tabla_0=$base->prefig."primaria_aulas";
	$tabla_1=$base->prefig."alumno_primaria";
	if (!$user->check_register()){
	}else{	
	if($_POST["mod_cod"]=="guardar"){
	$fecha=date("Y-m-d");
	$password=md5($_POST['carnet']);
	$fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['ano'];	 
	$base->dex_query("insert into $tabla_1 
	(id,nivel,id_nivel_user,id_paralelo,carnet,fecha_nacimiento,foto,nombre,ap_paterno,ap_materno,edad,direccion,tutor,cel,estado,login,password,modificacion) 
	value('','P','4','{$_POST['id_primaria']}','{$_POST['carnet']}','$fecha_nacimiento','','{$_POST['nombre']}','{$_POST['ap_paterno']}',
	'{$_POST['ap_materno']}','{$_POST['edad']}','{$_POST['direccion']}','{$_POST['tutor']}','{$_POST['celular']}','A',
	'{$_POST['ap_paterno']}','{$password}','$fecha');");
	  $dt_0=$base->dex_query_fetch_array("select * from $tabla_1 order by id DESC");
	  $id_alumno=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla_1,"id",$id,"foto","archivo",$carpeta,$valida,$sis,$base);}	  
	}
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Lista de Paralelos de Primaria</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a class="btn btn-primary btn-xlg" href="<?php echo server_url."".$modelos ?>"><i class="icon-undo2 position-left"></i>Volver</a></li>
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="10%">Nº</th>
              <th width="15%">Paralelo</th>
              <th width="30%" class="text-center">Cantidad Maxima de Alumnos</th>
              <th width="45%" class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_0 where id_primaria ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);		
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $dt_01["paralelo"];?></td>
          <td class="text-center"><?php echo $dt_01["cantidad"];?> Cupos disponibles <code>
          <?php 
			$sql_02="select * from $tabla_1 where id_paralelo ='".$dt_01["id_primaria"]."'";
			$rs_02=$base->dex_query($sql_02);
			echo ($dt_01["cantidad"]-$base->dex_num_rows($rs_02)); 		  
		  ?></code>
          </td>
          <td class="text-right col-md-2">
          <a data-toggle="modal" data-target="#modal_new" data-id_nivel="<?php echo $_GET["cod_0"];?>" class="btn bg-blue"><i class="icon-pencil7"></i> inscribir a paralelo</a>
          <a href="<?php echo server_url."".$modelos.$_GET["cod_0"]."/nomina/" ?>" class="btn bg-warning-400"><i class="icon-profile"></i> Lista de Alumnos</a>
          </td>          
      </tr>
        <?php
        $i++; 
        }?>        
        </tbody>
    </table>
</div>
<!-- /nested object data -->
<script>
        $('#modal_new').on('show.bs.modal', function(event) {
		  var button = $(event.relatedTarget)
		  var id_nivel = button.data('id_nivel')	
		  var modal = $(this)
		  modal.find('.modal-body #id_nivel').val(id_nivel)	  	  		  
        });
</script>