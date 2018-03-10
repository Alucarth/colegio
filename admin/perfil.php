<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	if($user->get_level()==1 or $user->get_nivel()==2){
	$tabla=$base->prefig."usuario";	$carpeta="userfiles/user_sistema/";$get="Cargo";$cod=$user->get_id();}
	else{
	 if($user->get_level()==3 and $user->get_nivel()=="P"){
	 $tabla=$base->prefig."docente_p";$carpeta="userfiles/user_docente_p/";$get="Docente";$cod=$user->get_id();}
	 else{
	  if($user->get_level()==3 and $user->get_nivel()=="S"){	 
	  $tabla=$base->prefig."docente_s";$carpeta="userfiles/user_docente_s/";$get="Docente";$cod=$user->get_id();}	  
	  else{
	   if($user->get_level()==4 and $user->get_nivel()=="P"){
		$tabla=$base->prefig."alumno_primaria";$carpeta="userfiles/user_Alumno_primaria/";$get="Alumno";$cod=$user->get_id();}
	   else{
	    $tabla=$base->prefig."alumno_secundaria";$carpeta="userfiles/user_Alumno_secundaria/";$get="Alumno";$cod=$user->get_id();}	   	  
	  }
	 }
	}
	$codigo="id";		
	if (!$user->check_register()){
	}else{
	if($_POST["valor"]==""){	
	$dt=$base->dex_query_fetch_array("select * from $tabla where $codigo='$cod'");
	$nombre=$dt["nombre"];
	$id=$dt["id"];
	$ap_paterno=$dt["ap_paterno"];
	$ap_materno=$dt["ap_materno"];
	$direccion=$dt["direccion"];
	$email=$dt["email"];	
	$cel=$dt["cel"];
	$foto=$dt["foto"];	
	$estado=$dt["estado"];	
	$login=$dt["login"];
	if($user->get_level()==1 or $user->get_nivel()==2){
	$tabla=$base->prefig."usuario";	$carpeta="userfiles/user_sistema/";$get="Cargo";$cargo=$dt["cargo"];}
	else{
	 if($user->get_level()==3 and $user->get_nivel()=="P"){
	 $cargo=$dt["materia"];}
	 else{
	  if($user->get_level()==3 and $user->get_nivel()=="S"){	 
	  $cargo=$dt["materia"];}
	  else{
	   if($user->get_level()==4 and $user->get_nivel()=="P"){
	   $cargo="Alumno de colegio";}
	   else{
	   $cargo="Alumno de colegio";}	   	   
	  }
	 }
	}		
	$valor="perfil";}
	else{
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla,"id",$cod,"foto","archivo",$carpeta,$valida,$sis,$base);	  
	  $password=md5($_POST['password']);
	  $base->dex_query("update $tabla set 
	  nombre='{$_POST['nombre']}',email='{$_POST['email']}',ap_paterno='{$_POST['ap_paterno']}',ap_materno='{$_POST['ap_materno']}', 
	  direccion='{$_POST['direccion']}',cel='{$_POST['cel']}',login='{$_POST['login']}' ,password='$password' where id='$cod'");	  		
	}}
?>
<!-- Wizard with validation -->
<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">Formulario de datos del Usuario</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="reload"></a></li>
            </ul>
        </div>
    </div>
    
    <form class="steps-model" id="form-model" method="post" enctype="multipart/form-data">
    <input type="hidden" name="valor" value="<?php echo $valor ;?>" />
        <h6>Información personal</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre completo: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="nombre" class="form-control required" placeholder="Nombre completo" value="<?php echo $nombre ;?>">
                    </div>
                    <div class="form-group">
                        <label>Apellido Paterno: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="ap_paterno" class="form-control required" placeholder="Apellido Paterno" value="<?php echo $ap_paterno ;?>">
                    </div> 
                    <div class="form-group">
                        <label>Apellido Materno: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="ap_materno" class="form-control required" placeholder="Apellido Materno" value="<?php echo $ap_materno ;?>">
                    </div>                                       
                </div>               
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dirección: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="direccion" class="form-control required" placeholder="Dirección actual" value="<?php echo $direccion ;?>">
                    </div>
                    <div class="form-group">
                        <label>Celular o teléfono: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="cel" class="form-control required" placeholder="Celular o teléfono" value="<?php echo $cel ;?>">
                    </div> 
                    <div class="form-group">
                        <label>Email: <span class="text-danger">(Requerido)</span></label>
                        <input type="email" name="email" class="form-control required" placeholder="tu@email.com" value="<?php echo $email ;?>">
                    </div>                                       
                </div>
                <div class="col-md-4">      
                    <div class="content-divider"> 
                        <?php 
						if(!empty($foto)){
						 echo"<img src='".server_url.$carpeta.$id.".".$foto."' class='img-rounded img-preview'>";}
						else{
						 echo"<img src='".server_url."userfiles/img/face1.png' class='img-rounded img-preview'>";}
						?>                                   
                    </div>                        
                    <div class="caption text-center"><h6><small>Foto de Perfil</small></h6></div>
                    <div class="form-group">
                      <div class="input-group-btn">					
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="icon-file-plus"></i> 
                        <span class="hidden-xs">Seleccionar archivo</span>
                        <input name="archivo" type="file" >
                        </div>
                        <span class="help-block">Formatos aceptados: gif, png, jpg.</span>
                        
                      </div>  
                    </div>
                    <div class="form-group">
                        <label><?php echo $get; ?>:</label>
                        <input type="text" class="form-control" value="<?php echo $cargo ;?>" disabled>
                    </div>
                </div>                                                    
            </div>      
        </fieldset>
        <h6>Información de sesión</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Usuario: <span class="text-danger">*</span></label>
                        <input type="text" name="login" placeholder="Nombre de usuario" class="form-control required" value="<?php echo $login ;?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contraseña: <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Escriba una contraseña" class="form-control required" value="<?php echo $password ;?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Repita la contraseña: <span class="text-danger">*</span></label>
                        <input type="password" name="repeat_password" id="repeat_password" placeholder="Vuelva a escriba su contraseña" class="form-control required">
                    </div>
                </div>                
            </div>  
        </fieldset>
    </form>
</div>
<!-- /wizard with validation -->
<div id="responsive"></div>   