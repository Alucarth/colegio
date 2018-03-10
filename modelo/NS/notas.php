<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."new.php");
	include($carpeta."reporte_g.php");
	$tabla=$base->prefig."secundaria";
	$carpeta="userfiles/user_Alumno_secundaria/";
	$modelos =  modelo."/".$cod_mod."/";
	$tabla_0=$base->prefig."secundaria_aulas";
	$tabla_1=$base->prefig."alumno_secundaria";
	if (!$user->check_register()){
	}else{	
	if($_POST["mod_cod"]=="guardar"){
	$fecha=date("Y-m-d");
	$password=md5($_POST['carnet']);
	$fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['ano'];	 
	$base->dex_query("insert into $tabla_1 
	(id,id_paralelo,carnet,fecha_nacimiento,foto,nombre,ap_paterno,ap_materno,edad,direccion,tutor,cel,estado,login,password,modificacion) 
	value('','{$_POST['id_primaria']}','{$_POST['carnet']}','$fecha_nacimiento','','{$_POST['nombre']}','{$_POST['ap_paterno']}',
	'{$_POST['ap_materno']}','{$_POST['edad']}','{$_POST['direccion']}','{$_POST['tutor']}','{$_POST['celular']}','A',
	'{$_POST['ap_paterno']}','{$password}','$fecha');");
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla_1 order by id DESC");
	  $id=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla_1,"id",$id,"foto","archivo",$carpeta,$valida,$sis,$base);}	  
	}
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Lista de Paralelos de Secundaria</h5>
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
              <th width="20%">Paralelo</th>
              <th width="40%" class="text-center">Cantidad Maxima de Alumnos</th>
              <th width="40%" class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_0 where id_secundaria ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);		
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $dt_01["paralelo"];?></td>
          <td class="text-center"><?php echo $dt_01["cantidad"];?> Cupos disponibles <code>
          <?php 
			$sql_02="select * from $tabla_1 where id_paralelo ='".$dt_01["id_secundaria"]."'";
			$rs_02=$base->dex_query($sql_02);
			echo ($dt_01["cantidad"]-$base->dex_num_rows($rs_02)); 		  
		  ?></code>
          </td>
          <td class="text-right col-md-2">
          <?php 
			$sql_s="select * from notas_p where id_aula ='".$_GET["cod_0"]."'";
			$rs_s=$base->dex_query($sql_s);$s_1=0;$s_2=0;$s_3=0;$s_4=0;
			while ($dt_s=$base->dex_fetch_array($rs_s)){
				$s_1=$dt_s["primero"]+$s_1;$s_2=$dt_s["segundo"]+$s_2;$s_3=$dt_s["tercero"]+$s_3;$s_4=$dt_s["cuarto"]+$s_4;												
			}		  
			$r_s_1=$s_1/4;$r_s_2=$s_2/4;$r_s_3=$s_3/4;$r_s_4=$s_4/4;
		  ?>
          <a href="<?php echo server_url."".$modelos.$_GET["cod_0"]."/".$_GET["cod_1"]."/nomina/" ?>" class="btn bg-warning-400"><i class="icon-profile"></i> Lista de Alumnos</a>
          <?php if($user->get_level()==1){?>
          <a data-toggle="modal" data-target="#modal_reporte" class="btn bg-success-400" onclick="reporte_g('<?php echo $r_s_1;?>','<?php echo $r_s_2;?>','<?php echo $r_s_3;?>','<?php echo $r_s_4;?>')"><i class="icon-statistics"></i> Estado general del paralelo</a>
           <?php }?>
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