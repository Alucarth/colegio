<?php 
	$base=new base();
	$user=new user();
	include($carpeta."new.php");
	$tabla=$base->prefig."actividad";
	$tabla_0=$base->prefig."actividad_mes";	
	if (!$user->check_register()){
	}else{	
	if($_POST["mod_cod"]=="guardar"){	 
	$base->dex_query("insert into $tabla 
	(id,id_mes,dia,titulo,descripcion) 
	value('','{$_POST['id_mes']}','{$_POST['dia']}','{$_POST['titulo']}','{$_POST['descripcion']}');");}
	}
?>
<h6 class="content-group text-semibold">
    ACTIVIDADES DEL ESTABLECIMIENTO EDUCATIVO
    <small class="display-block">Visto por cada mes</small>
</h6>
<div class="row">
<?php 
$sql_01="select * from $tabla_0";
$rs_01=$base->dex_query($sql_01);
$i=1;
while ($dt_01=$base->dex_fetch_array($rs_01)){
?>
 <div class="col-md-3">
  <div class="panel panel-body border-top-danger text-center">
    <h6 class="no-margin text-semibold"><?php echo $dt_01["mes"] ?></h6>
    <p class="content-group-sm text-muted"><?php echo $dt_01["ano"] ?></p>
    <p class="content-group-sm text-muted">Actividades del mes<code>
    <?php 
	$sql_02="select * from $tabla where id_mes ='".$dt_01["id"]."'";
	$rs_02=$base->dex_query($sql_02);
	echo $base->dex_num_rows($rs_02); 
	?>
    </code>
    </p>    
    <ul class="fab-menu fab-menu-top" data-fab-toggle="click" style="z-index: 1002;">
      <li>
      <?php 
	  if($user->get_level()==1 or $user->get_nivel()==2){
	  ?>
    <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" data-toggle="modal" data-target="#modal_new" data-id="<?php echo $dt_01["id"];?>">
        <i class="fab-icon-open icon-plus3"></i>
        <i class="fab-icon-close icon-cross2"></i>
    </a>
      <?php }?>
      </li><br />                     
      <li><a class="btn btn-primary" href="<?php echo $dt_01["id"]."/" ?>">Ver actividades</a> </li>
    </ul>    
  </div>                 
 </div>
<?php 
}
?> 
</div>
<script>
        $('#modal_new').on('show.bs.modal', function(event) {
		  var button = $(event.relatedTarget)
		  var id = button.data('id')	
		  var modal = $(this)
		  modal.find('.modal-body #id').val(id)	  	  		  
        });
</script>
