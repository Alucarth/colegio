<?php 
	$base=new base();
	$user=new user();
	include($carpeta."new.php");
	$tabla=$base->prefig."primaria";
	$tabla_0=$base->prefig."primaria_aulas";	
	if (!$user->check_register()){
	}else{	
	if($_POST["mod_cod"]=="guardar"){
	$fecha=date("Y-m-d");	 
	$base->dex_query("insert into $tabla_0 
	(id,id_primaria,paralelo,cantidad,fecha_mod) 
	value('','{$_POST['id_primaria']}','{$_POST['paralelo']}','{$_POST['cantidad']}','$fecha');");}
	}
?>
<h6 class="content-group text-semibold">
    EDUCACIÓN PRIMARIA
    <small class="display-block">Nivel Primaria</small>
</h6>
<div class="row">
<?php 
$sql_01="select * from $tabla";
$rs_01=$base->dex_query($sql_01);
$i=1;
while ($dt_01=$base->dex_fetch_array($rs_01)){
?>
 <div class="col-md-4">
  <div class="panel panel-body border-top-danger text-center">
    <h6 class="no-margin text-semibold"><?php echo $dt_01["nombre"] ?> de Primaria</h6>
    <p class="content-group-sm text-muted"><?php echo $dt_01["ciclo"] ?><br /><code>
    <?php 
	$sql_02="select * from $tabla_0 where id_primaria ='".$dt_01["id"]."'";
	$rs_02=$base->dex_query($sql_02);
	echo $base->dex_num_rows($rs_02); 
	?>
    Paralelos
    </code></p>
    <ul class="fab-menu fab-menu-top" data-fab-toggle="click" style="z-index: 1002;">
      <li>
    <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" data-toggle="modal" data-target="#modal_new" data-id="<?php echo $dt_01["id"];?>">
        <i class="fab-icon-open icon-plus3"></i>
        <i class="fab-icon-close icon-cross2"></i>
    </a>
      </li><br />                     
      <li><a class="btn btn-primary" href="<?php echo $dt_01["id"]."/" ?>">Lista de paralelos</a> </li>
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
