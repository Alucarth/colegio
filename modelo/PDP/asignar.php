<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."asig.php");
	$tabla=$base->prefig."primaria";
	$tabla_0=$base->prefig."primaria_aulas";
	$tabla_1=$base->prefig."docente_p";
	$tabla_2=$base->prefig."docente_aula_p";
	if($_POST["opc"]=="Asignar"){
	$base->dex_query("update $tabla_1 set id_paralelo='".$_POST["id"]."' where id='".$_GET['cod_0']."';");
	$dt_0=$base->dex_query_fetch_array("select id,nivel from $tabla_2 order by id DESC");
	$cont=$dt_0["nivel"]+1;
	$base->dex_query("insert into $tabla_2 (id,id_docente,id_paralelo,nivel)value('','{$_GET['cod_0']}','{$_POST['id']}','$cont');");
	$base->dex_query("update $tabla_0 set id_docente='$cont' where id='".$_POST["id"]."';");}
?>
<h6 class="content-group text-semibold">
    ASIGNAR PARALELO A DOCENTE
    <small class="display-block">Nivel Primaria</small>
</h6>
<div class="row">
<?php 
$sql_01="select * from $tabla";
$rs_01=$base->dex_query($sql_01);
while ($dt_01=$base->dex_fetch_array($rs_01)){
?>
 <div class="col-md-4">
  <div class="panel panel-body border-top-primary text-center">
    <h6 class="no-margin text-semibold"><?php echo $dt_01["nombre"] ?> de Primaria</h6>
    <p class="content-group-sm text-muted"><?php echo $dt_01["ciclo"] ?><br /><code>
    <?php 
	$sql_02="select * from $tabla_0 where id_primaria ='".$dt_01["id"]."'";
	$rs_02=$base->dex_query($sql_02);
	echo $base->dex_num_rows($rs_02); 
	?>
    Paralelos
    </code></p>
      <div class="row">													
        <!-- Circle empty -->
        <div class="panel panel-body border-top-primary">
            <ul class="list-feed">
            <?php 
			$sql_03="select * from $tabla_0 where id_primaria ='".$dt_01["id"]."'";
			$rs_03=$base->dex_query($sql_03);
			if($base->dex_num_rows($rs_03)>0){
			while ($dt_03=$base->dex_fetch_array($rs_03)){			
			 $sql_0="select * from $tabla_2 where id_paralelo ='".$dt_03["id"]."'";
			 $rs_0=$base->dex_query($sql_0);	
			 if($base->dex_num_rows($rs_0)<>6){				
			 ?>
             <li>El <?php echo $dt_03["paralelo"] ?></code> tiene <code><?php echo $base->dex_num_rows($rs_0) ?></code> docentes Asignados<br /><a onclick="asig('<?php echo $dt_03["id"];?>','Asignar','<?php echo $_GET["cod_0"];?>')"><?php echo $dt_03["paralelo"] ?></a></li>
			 <?php	
			 }else{?>
             <li><code>El <?php echo $dt_03["paralelo"] ?></code> ya tiene <code>6</code> docente Asignado</li>
             <?php
			 }            
			}			
			}else{?>
            <li>Docentes Asignados <code>0</code><br /><br /><a href="javascript:void(0);">No hay paralelos para asignar</a></li>
			<?php	
			}
			?>                                   
            </ul>
        </div>
        <!-- Circle empty -->                        
      </div>                     
  </div>                 
 </div>
<?php 
}
?> 
</div>