<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	$tabla=$base->prefig."empresa";
	$carpeta="userfiles/empresa/";
	$codigo="id";
	$cod=1;	
	$id_user=$user->get_id();
	$id_nivel_user=$user->get_user();
	if (!$user->check_register()){
	}else{
	if($_POST["valor"]==""){	
	$dt=$base->dex_query_fetch_array("select * from $tabla where $codigo='$cod'");
	$nombre=$dt["nombre_e"];
	$email_1=$dt["email_1"];
	$email_2=$dt["email_2"];
	$direccion=$dt["direccion"];
	$email=$dt["email"];	
	$cel=$dt["cel"];	
	$logo=$dt["logo"];	
	$valor="empresa";}
	else{
	  $fecha=date("d-m-Y");
	  $valida[0]="gif";
	  $valida[1]="jpg";
	  $valida[2]="png";
	  $fun->upload_file($tabla,"id",$cod,"logo","archivo",$carpeta,$valida,$sis,$base);	  	
	  $base->dex_query("update $tabla set 
	  id_user='$id_user',id_nivel_user='$id_nivel_user',nombre_e='{$_POST['nombre']}',email_1='{$_POST['email_1']}',email_2='{$_POST['email_2']}', 
	  direccion='{$_POST['direccion']}',cel='{$_POST['cel']}',modificacion='$fecha' where id='$cod'");	  		
	}}
?>
<!-- Wizard with validation -->
<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">Formulario de datos de la Unidad Educativa</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="reload"></a></li>
            </ul>
        </div>
    </div>
    <form class="steps-model" id="form-model" method="post">
    <input type="hidden" name="valor" value="<?php echo $valor ;?>" />
        <h6>Información de la Unidad Educativa</h6>
        <fieldset>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre del Establecimiento: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="nombre" class="form-control required" placeholder="Nombre de Empresa" value="<?php echo $nombre ;?>">
                    </div>
                    <div class="form-group">
                        <label>Primer email del establecimiento: <span class="text-danger">(Requerido)</span></label>
                        <input type="email" name="email_1" class="form-control required" placeholder="Primer email del establecimiento" value="<?php echo $email_1 ;?>">
                    </div> 
                    <div class="form-group">
                        <label>Segundo email del establecimiento: <span class="text-success">(Opcional)</span></label>
                        <input type="email" name="email_2" class="form-control" placeholder="Segundo email del establecimiento" value="<?php echo $email_2 ;?>">
                    </div>                                       
                </div>               
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dirección: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="direccion" class="form-control required" placeholder="Dirección Empresa" value="<?php echo $direccion ;?>">
                    </div>
                    <div class="form-group">
                        <label>Celular o teléfono: <span class="text-danger">(Requerido)</span></label>
                        <input type="text" name="cel" class="form-control required" placeholder="Celular o teléfono" value="<?php echo $cel ;?>">
                    </div>                                     
                </div>
                <div class="col-md-4">      
                    <div class="content-divider"> 
                        <?php 
						if($logo<>""){
						 echo"<img src='".server_url."userfiles/empresa/".$cod.".".$logo."' class='img-rounded img-preview'>";}
						else{
						 echo"<img src='".server_url."userfiles/img/foto_no.png' class='img-rounded img-preview'>";}
						?>                                   
                    </div>                        
                    <div class="caption text-center"><h6><small>Logo de la Unidad Educativa</small></h6></div>
                    <div class="form-group">
                      <div class="input-group-btn">					
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="icon-file-plus"></i> 
                        <span class="hidden-xs">Seleccionar archivo</span>
                        <input type="file" class="file-input" name="archivo">
                        </div>
                        <span class="help-block">Formatos aceptados: gif, png, jpg.<br /><code>Tamaño de imagen es de 170 X 33 px</code></span>
                        
                      </div>  
                    </div>
                </div>                                                    
            </div>      
        </fieldset>        
    </form>
</div>
<!-- /wizard with validation -->
<div id="responsive"></div> 