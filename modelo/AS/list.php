<?php 
	$base=new base();
	$user=new user();
	$tabla=$base->prefig."secundaria";
	$tabla_0=$base->prefig."secundaria_aulas";	
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
    ALUMNOS SECUNDARIA
    <small class="display-block">Por nivel y paralelos</small>
</h6>
<div class="row">
<?php 
$sql_01="select * from $tabla";
$rs_01=$base->dex_query($sql_01);
$i=1;
while ($dt_01=$base->dex_fetch_array($rs_01)){
?>
 <div class="col-md-3">
  <div class="panel panel-body border-top-danger text-center">
    <h6 class="no-margin text-semibold"><?php echo $dt_01["nombre"] ?> de Secundaria</h6>
    <?php 
	$sql_02="select * from $tabla_0 where id_secundaria='".$dt_01["id"]."'";
	$rs_02=$base->dex_query($sql_02);	
	?>
    <p class="content-group-sm text-muted"><?php echo $dt_01["ciclo"] ?>
    <br /><code>Paralelos <?php echo $base->dex_query_num_rows($sql_02); ?> </code></p>
    <ul class="fab-menu fab-menu-top" data-fab-toggle="click" style="z-index: 1002;">
      <br />                     
      <li><a class="btn btn-primary" href="<?php echo $dt_01["id"]."/" ?>">Inscripcion de alumnos</a> </li>
    </ul>    
  </div>                 
 </div>
<?php 
}
?> 
</div>	
