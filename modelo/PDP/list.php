<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."edit.php"); 
	include($carpeta."new.php");
	$tabla=$base->prefig."docente_p";
	$tabla_0=$base->prefig."docente_aula_p";
	$carpeta="userfiles/user_docente_p/";
	$modelos =  modelo."/".$cod_mod."/";
	$codigo="id";
	$cod=$user->get_id();
	if (!$user->check_register()){
	}else{
     if($_POST["mod_cod"]=="guardar"){
	  $password=md5($_POST["carnet"]);
	  $fecha=date("Y-m-d");	 
	  $base->dex_query("insert into $tabla 	  
	  (id,nivel,id_nivel_user,id_paralelo,nombre,ap_paterno,ap_materno,carnet,direccion,cel,email,foto,materia,login,password,estado,notas,nota_1,nota_2,
	  nota_3,nota_4,modificacion)value('','P','3','','{$_POST['nombre']}','{$_POST['ap_paterno']}','{$_POST['ap_materno']}','{$_POST['carnet']}',
	  '{$_POST['direccion']}','{$_POST['cel']}','{$_POST['email']}','','{$_POST['materia']}',
	  '{$_POST['ap_paterno']}','$password','A','0','','','','','$fecha');");
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla order by id DESC");
	  $id=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla,"id",$id,"foto","archivo",$carpeta,$valida,$sis,$base);	  	   	 
	  $base->dex_query("insert into $tabla_0 	  
	  (id,id_docente,id_paralelo,nivel_1,nivel_2,nivel_3,nivel_4,nivel_5,nivel_6)value('','$id','','','','','','','');");	  
	 }
     if($_POST["mod_cod"]=="actualizar"){
	  if(empty($_POST["archivo"])){	 
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla,"id",$_POST['id_usuario'],"foto","archivo",$carpeta,$valida,$sis,$base);}
	  $password=md5($_POST["carnet"]);
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  nombre='{$_POST['nombre']}',email='{$_POST['email']}',ap_paterno='{$_POST['ap_paterno']}',ap_materno='{$_POST['ap_materno']}',
      materia='{$_POST['materia']}',
	  direccion='{$_POST['direccion']}',cel='{$_POST['cel']}',login='{$_POST['ap_paterno']}',carnet='{$_POST['carnet']}',password='$password', 
      modificacion='$fecha' where $codigo='{$_POST['id_usuario']}'");	   	 
	 }
     if($_POST["opc"]=="Deshabilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  estado ='B', modificacion='$fecha' where $codigo='{$_POST['id']}'");}
     if($_POST["opc"]=="Habilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  estado ='A', modificacion='$fecha' where $codigo='{$_POST['id']}'");}  	  
    }				
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Plantel Docente Del Nivel Primario</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><button type='button' class="btn btn-success" data-toggle="modal" data-target="#modal_news"><span class="glyphicon glyphicon-plus" ></span> Nueva Docente</button></li>
                <li><a class="btn bg-brown" href="<?php echo server_url.$modelos."imprimir.php"?>" target="_blank" style="color:#FFF"><i class="icon-printer position-left"></i>Imprimir</a></li>                  
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table width="742" class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="5%">Nº</th>
              <th width="20%">Documento de Identidad</th>
              <th width="35%">Docentes</th>
              <th width="10%">Materia</th>              
              <th width="30%" class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla";
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
             echo"<img src='".server_url."userfiles/user_docente_p/face.png' class='img-xs'>";}
            ?>           
            <span class="text-default display-inline-block"><?php echo $dt_01["nombre"]." ".$dt_01["ap_paterno"]." ".$dt_01[ "ap_materno"];?></span>
          </td>
          <td><?php echo $dt_01["materia"];?></td>
          <td class="text-center">
			<?php if($dt_01["estado"]=="A"){?>
            <a class="btn border-teal text-teal-600 btn-flat btn-icon" href="javascript:void(0);" title='Deshabilitar Docente' onclick="desh(<?php echo $dt_01["id"];?>,'Deshabilitar')"><i class="icon-checkmark3 text-success"></i></a>
            <?php }else{?>
            <a class="btn border-teal text-teal-600 btn-flat btn-icon" href="javascript:void(0);" title='Habilitar Docente' onclick="habi('<?php echo $dt_01["id"];?>','Habilitar')"><i class="icon-cross2 text-danger-400"></i></a>
            <?php }?>                     
            <a class="btn border-teal text-teal-600 btn-flat btn-icon" href="javascript:void(0);" data-toggle="modal" data-target="#modal_new" title="Editar Datos" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>"data-direccion="<?php echo $dt_01["direccion"];?>" data-carnet="<?php echo $dt_01["carnet"];?>" data-cel="<?php echo $dt_01["cel"];?>" data-login="<?php echo $dt_01["login"];?>"data-email="<?php echo $dt_01["email"];?>" data-id_usuario="<?php echo $dt_01["id"];?>"data-materia="<?php echo $dt_01["materia"];?>"data-foto="<?php echo $dt_01["foto"];?>"><i class="icon-pencil7 text-success"></i></a>
            <?php if($dt_01["id_paralelo"]==0){?>
            <a href="<?php echo server_url."".$modelos.$dt_01["id"]."/asignar/" ?>" class="btn bg-teal-400"><i class="icon-home8"></i> Asignar Paralelo</a>
            <?php }else{?>
            <a href="javascript:void(0)" class="btn bg-danger-400"><i class="icon-home8"></i> Paralelo Asignado</a>
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
          var nombre = button.data('nombre')
		  var ap_paterno = button.data('ap_paterno')
		  var ap_materno = button.data('ap_materno')
		  var direccion = button.data('direccion')
		  var carnet = button.data('carnet')
		  var cel = button.data('cel')
		  var login = button.data('login')
		  var email = button.data('email')
		  var id_usuario = button.data('id_usuario')
		  var materia = button.data('materia')
		  var foto = button.data('foto')
		  var modal = $(this)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #ap_paterno').val(ap_paterno)
		  modal.find('.modal-body #ap_materno').val(ap_materno)
		  modal.find('.modal-body #direccion').val(direccion)
		  modal.find('.modal-body #carnet').val(carnet)
		  modal.find('.modal-body #cel').val(cel)
		  modal.find('.modal-body #login').val(login)
		  modal.find('.modal-body #email').val(email)
		  modal.find('.modal-body #id_usuario').val(id_usuario)
		  modal.find('.modal-body #materia').val(materia)
		  modal.find('.modal-body #foto').val(foto)		  	  		  
        });
</script>