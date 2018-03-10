<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."new.php");
	include($carpeta."edit.php");
	$server_url =  modelo."/".$cod_mod."/";
	$tabla_0=$base->prefig."secundaria_aulas";
	$tabla_1=$base->prefig."alumno_secundaria";
	$carpeta="userfiles/user_Alumno_secundaria/";		
	$codigo="id";	
	$cod=$user->get_id();
	if (!$user->check_register()){
	}
	if($_POST["mod_cod"]=="guardar"){
	$fecha=date("Y-m-d");
	$password=md5($_POST["carnet"]);
	$fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['ano'];	 
	$base->dex_query("insert into $tabla_1 
	(id,nivel,id_nivel_user,id_paralelo,carnet,fecha_nacimiento,foto,nombre,ap_paterno,ap_materno,edad,direccion,tutor,cel,estado,login,password,modificacion) 
	value('','S','4','{$_GET['cod_0']}','{$_POST['carnet']}','$fecha_nacimiento','','{$_POST['nombre']}','{$_POST['ap_paterno']}',	
	'{$_POST['ap_materno']}','{$_POST['edad']}','{$_POST['direccion']}','{$_POST['tutor']}','{$_POST['celular']}','A',
	'{$_POST['ap_paterno']}','$password','$fecha');");
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla_1 order by id DESC");
	  $id=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla_1,"id",$id,"foto","archivo",$carpeta,$valida,$sis,$base);}
	if($_POST["mod_cod"]=="Actualizar"){
	$fecha=date("Y-m-d");
	$password=md5($_POST["carnet"]);	
	if($_POST['ano_edit']==""){
	$dt_=$base->dex_query_fetch_array("select fecha_nacimiento,edad from $tabla_1 where id='{$_POST['id_usuario']}'");	
	$fecha_nacimiento=$dt_["fecha_nacimiento"];$edad=$dt_["edad"];
	}else{
	$fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['ano_edit'];$edad=$_POST['edad'];}	 
	$base->dex_query("update $tabla_1 set carnet='{$_POST['carnet']}',fecha_nacimiento='{$fecha_nacimiento}',nombre='{$_POST['nombre']}',
	ap_paterno='{$_POST['ap_paterno']}',ap_materno='{$_POST['ap_materno']}',edad='{$edad}',cel='{$_POST['celular']}',
	direccion='{$_POST['direccion']}',tutor='{$_POST['tutor']}',login='{$_POST['ap_paterno']}',password='$password' where id='{$_POST['id_usuario']}';");
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla_1 order by id DESC");
	  $id=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla_1,"id",$id,"foto","archivo",$carpeta,$valida,$sis,$base);}
     if($_POST["opc"]=="Deshabilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla_1 set 
	  estado ='B', modificacion='$fecha' where $codigo='{$_POST['id']}'");}
     if($_POST["opc"]=="Habilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla_1 set 
	  estado ='A', modificacion='$fecha' where $codigo='{$_POST['id']}'");}	  	    		
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="icon-user-check"></i> Nomina de Alumnos</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a class="btn bg-blue" href="<?php echo server_url."".$server_url.$_GET["pag"] ?>"><i class="icon-undo2 position-left"></i>Volver</a></li>
                <li><a type='button' class="btn btn-success" data-toggle="modal" data-target="#modal_new" data-id_nivel="<?php echo $_GET["pag"]?>"><span class="glyphicon glyphicon-plus" ></span> Nuevo Alumno</a></li>
                <li><a class="btn bg-brown" href="<?php echo server_url."".$server_url."imprimir.php?valor=".$_GET["cod_0"]."" ?>" target="_blank" style="color: #f3f4f4;"><i class="icon-printer position-left"></i>Imprimir</a></li>                 
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="10%">Nº</th>
              <th width="20%">Documento de Identidad</th>
              <th width="40%">Nombre de Alumno</th>
              <th width="10%">Numero de Emergencias</th>
              <th width="10%">Edad</th>
              <th width="10%">Estado</th>                    
              <th width="10%" class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_1 where id_paralelo ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $i;?></td>
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
          <td><?php echo $dt_01["cel"];?></td>
          <td><?php echo $dt_01["edad"];?></td>
          <td>
           <ul class="icons-list">
			  <?php if($dt_01["estado"]=="A"){?>
              <li><a href="javascript:void(0);" title='Deshabilitar alumno' onclick="desh(<?php echo $dt_01["id"];?>,'Deshabilitar')"><i class="icon-checkmark3 text-success"></i> Activo</a></li>
              <?php }else{?>
              <li><a href="javascript:void(0);" title='Habilitar alumno' onclick="habi('<?php echo $dt_01["id"];?>','Habilitar')"><i class="icon-cross2 text-danger-400"></i> Inactivo</a></li>
              <?php }?>     
            </ul>             
          </td>
          <td class="text-center">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_default" title="Editar Datos" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>"data-direccion="<?php echo $dt_01["direccion"];?>" data-carnet="<?php echo $dt_01["carnet"];?>" data-celular="<?php echo $dt_01["cel"];?>" data-login="<?php echo $dt_01["login"];?>"data-tutor="<?php echo $dt_01["tutor"];?>" data-id_usuario="<?php echo $dt_01["id"];?>"data-fecha_nacimiento="<?php echo $dt_01["fecha_nacimiento"]; ?>"data-foto="<?php echo $dt_01["foto"];?>"><i class="icon-pencil7 text-success"></i></a>            
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
        $('#modal_default').on('show.bs.modal', function(event) {
		  var button = $(event.relatedTarget)
          var nombre = button.data('nombre')
		  var ap_paterno = button.data('ap_paterno')
		  var ap_materno = button.data('ap_materno')
		  var direccion = button.data('direccion')
		  var carnet = button.data('carnet')
		  var celular = button.data('celular')
		  var login = button.data('login')
		  var tutor = button.data('tutor')
		  var id_usuario = button.data('id_usuario')
		  var fecha_nacimiento = button.data('fecha_nacimiento')
		  var foto = button.data('foto')
		  var modal = $(this)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #ap_paterno').val(ap_paterno)
		  modal.find('.modal-body #ap_materno').val(ap_materno)
		  modal.find('.modal-body #direccion').val(direccion)
		  modal.find('.modal-body #carnet').val(carnet)
		  modal.find('.modal-body #celular').val(celular)
		  modal.find('.modal-body #login').val(login)
		  modal.find('.modal-body #tutor').val(tutor)
		  modal.find('.modal-body #id_usuario').val(id_usuario)
		  modal.find('.modal-body #fecha_nacimiento').val(fecha_nacimiento)
		  modal.find('.modal-body #foto').val(foto)		  	  		  
        });
        $('#modal_new').on('show.bs.modal', function(event) {
		  var button = $(event.relatedTarget)
		  var id_nivel = button.data('id_nivel')	
		  var modal = $(this)
		  modal.find('.modal-body #id_nivel').val(id_nivel)	  	  		  
        });		
</script>