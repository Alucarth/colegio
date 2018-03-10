<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."edit.php");
	include($carpeta."new.php");
	$tabla=$base->prefig."docente_s";
	$carpeta="userfiles/user_docente_s/";
	$modelos =  modelo."/".$cod_mod."/";
	$codigo="id";
	$cod=$user->get_id();
	if (!$user->check_register()){
	}				
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Plantel Docente Del Nivel de Secundario</h5>
        <div class="heading-elements">
            <ul class="icons-list">
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
             echo"<img src='".server_url.$carpeta."face.png' class='img-xs'>";}
            ?>           
            <span class="text-default display-inline-block"><?php echo $dt_01["nombre"]." ".$dt_01["ap_paterno"]." ".$dt_01[ "ap_materno"];?></span>
          </td>
          <td><?php echo $dt_01["materia"];?></td>
          <td class="text-center">
          <?php if($user->get_level()==1){?>
           <a href="<?php echo server_url."".$modelos.$dt_01["id_paralelo"]."/".$dt_01["id"]."/notas/" ?>" class="btn bg-primary-400"><i class="icon-book3"></i> Insertar Notas</a><?php }else{?>
           <a href="<?php echo server_url."".$modelos.$dt_01["id_paralelo"]."/".$dt_01["id"]."/notas/" ?>" class="btn bg-primary-400"><i class="icon-book3"></i> Ver Notas</a><?php }?>           
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
