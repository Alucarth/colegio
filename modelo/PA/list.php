<?php
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."edit.php");
	include($carpeta."new.php");
	$tabla=$base->prefig."usuario";
	$server_url=modelo."/".$cod_mod."/";;
	if($user->get_level()==1){
	$carpeta="userfiles/user_sistema/";}else{
	$carpeta="userfiles/user_administrativo/";}		
	$codigo="id";	
	$cod=$user->get_id();	
	$vec=array(1=>"Administrador",2=>"administrativo");
	if (!$user->check_register()){
	}else{
     if($_POST["mod_cod"]=="guardar"){
	  $password=md5($_POST["carnet"]);
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("insert into $tabla 
	  (id,id_user,id_nivel_user,carnet,nombre,ap_paterno,ap_materno,direccion,cel,email,foto,cargo,login,password,estado,modificacion) 
	  value('','$cod','{$_POST['nivel']}','{$_POST['carnet']}','{$_POST['nombre']}','{$_POST['ap_paterno']}','{$_POST['ap_materno']}',
	  '{$_POST['direccion']}','{$_POST['cel']}','{$_POST['email']}','','{$_POST['cargo']}',
	  '{$_POST['ap_paterno']}','$password','A','$fecha');");
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla order by id DESC");
	  $id=$dt_0["id"];	  
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  if($_POST['nivel']==1){$carpeta_s="userfiles/user_sistema/";}else{$carpeta_s="userfiles/user_administrativo/";}
	  $fun->upload_file($tabla,"id",$id,"foto","archivo",$carpeta_s,$valida,$sis,$base);	  	   	 
	 }
     if($_POST["mod_cod"]=="actualizar"){
	  if(empty($_POST["archivo"])){
	  $dt_0=$base->dex_query_fetch_array("select id from $tabla where $codigo='{$_POST['id_usuario']}'");
	  $id_n=$dt_0["id_nivel_user"];
	  if($id_n==1){$carpeta_s="userfiles/user_sistema/";}else{$carpeta_s="userfiles/user_administrativo/";}	  	 
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla,"id",$_POST['id_usuario'],"foto","archivo",$carpeta_s,$valida,$sis,$base);}
	  $password=md5($_POST["carnet"]);
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  nombre='{$_POST['nombre']}',email='{$_POST['email']}',ap_paterno='{$_POST['ap_paterno']}',ap_materno='{$_POST['ap_materno']}',
      cargo='{$_POST['cargo']}',
	  direccion='{$_POST['direccion']}',cel='{$_POST['cel']}',login='{$_POST['ap_paterno']}',carnet='{$_POST['carnet']}',password='$password', 
      modificacion='$fecha' where $codigo='{$_POST['id_usuario']}'");	   	 
	 }
     if($_POST["opc"]=="deshabilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  estado ='B', modificacion='$fecha' where $codigo='{$_POST['id']}'");}
     if($_POST["opc"]=="habilitar"){
	  $fecha=date("d-m-Y");	 
	  $base->dex_query("update $tabla set 
	  estado ='A', modificacion='$fecha' where $codigo='{$_POST['id']}'");}  	  
    }
?>				
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="icon-user-check"></i> Plantel Administrativo</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><button type='button' class="btn btn-success" data-toggle="modal" data-target="#modal_new"><span class="glyphicon glyphicon-plus" ></span> Nuevo Personal</button></li>
                <li><a class="btn bg-brown" href="<?php echo server_url."".$server_url."imprimir.php" ?>" target="_blank" style="color: #f3f4f4;"><i class="icon-printer position-left"></i>Imprimir</a></li>                
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="10%">Nº</th>
              <th width="20%">Documento de Identidad</th>
              <th width="35%">Personal</th>
              <th width="10%">Cargo</th>
              <th width="10%">Nivel</th>          
              <th width="10%" class="text-center">Acciones</th>
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
			 if($dt_01["id_nivel_user"]==1){echo"<img src='".server_url.$carpeta.$dt_01["id"].".".$dt_01["foto"]."' class='img-xs'>";}else{
			 echo"<img src='".server_url."userfiles/user_administrativo/".$dt_01["id"].".".$dt_01["foto"]."' class='img-xs'>";}}
            else{
			 if($dt_01["id_nivel_user"]==1){
             echo"<img src='".server_url."userfiles/user_administrativo/face.png' class='img-xs'>";}else{
		     echo"<img src='".server_url."userfiles/user_administrativo/face.png' class='img-xs'>";}}
            ?>           
            <span class="text-default display-inline-block"><?php echo $dt_01["nombre"]." ".$dt_01["ap_paterno"]." ".$dt_01[ "ap_materno"];?></span>
          </td>
          <td><?php echo $dt_01["cargo"] ?></td>
          <td><?php echo $vec[$dt_01["id_nivel_user"]] ?></td>
          <td class="text-center">
                <ul class="icons-list">
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_default" title="Editar Datos" data-nombre="<?php echo $dt_01["nombre"];?>"data-ap_paterno="<?php echo $dt_01["ap_paterno"];?>" data-ap_materno="<?php echo $dt_01["ap_materno"];?>"data-direccion="<?php echo $dt_01["direccion"];?>" data-carnet="<?php echo $dt_01["carnet"];?>" data-cel="<?php echo $dt_01["cel"];?>" data-email="<?php echo $dt_01["email"];?>" data-id_usuario="<?php echo $dt_01["id"];?>"data-cargo="<?php echo $dt_01["cargo"]; ?>"data-nivel="<?php echo $vec[$dt_01["id_nivel_user"]]; ?>"data-foto="<?php echo $dt_01["foto"];?>"><i class="icon-pencil7 text-success"></i></a></li>
                    <?php if($dt_01["estado"]=="A"){?>
                    <li><a title='Deshabilitar personal' onclick="desh('<?php echo $dt_01["id"];?>','deshabilitar')"><i class="icon-checkmark3 text-success"></i></a></li>
                    <?php }else{?>
                    <li><a title='Habilitar personal' onclick="habi('<?php echo $dt_01["id"];?>','habilitar')"><i class="icon-cross2 text-danger-400"></i></a></li>
                    <?php }?>
                </ul>                  
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
		  var cel = button.data('cel')
		  var email = button.data('email')
		  var id_usuario = button.data('id_usuario')
		  var cargo = button.data('cargo')
		  var nivel = button.data('nivel')
		  var foto = button.data('foto')
		  var modal = $(this)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #ap_paterno').val(ap_paterno)
		  modal.find('.modal-body #ap_materno').val(ap_materno)
		  modal.find('.modal-body #direccion').val(direccion)
		  modal.find('.modal-body #carnet').val(carnet)
		  modal.find('.modal-body #cel').val(cel)
		  modal.find('.modal-body #email').val(email)
		  modal.find('.modal-body #id_usuario').val(id_usuario)
		  modal.find('.modal-body #cargo').val(cargo)
		  modal.find('.modal-body #nivel').val(nivel)
		  modal.find('.modal-body #foto').val(foto)		  	  		  
        });
</script>