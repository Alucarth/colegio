<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	$tabla=$base->prefig."primaria";
	$tabla_0=$base->prefig."primaria_aulas";
	$tabla_1=$base->prefig."alumno_primaria";
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Lista de Paralelos</h5>
        <h6 class="no-margin text-semibold">
        <?php 
		$dt_0=$base->dex_query_fetch_array("select nombre,ciclo from $tabla where id='".$_GET["cod_0"]."'");
		echo $dt_0["nombre"]." de Primaria del <code>".$dt_0["ciclo"]."</code>";
		?>
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a class="btn btn-primary btn-xlg" href="<?php echo server_url."".$carpeta ?>"><i class="icon-undo2 position-left"></i>Volver</a></li>
                <li><a class="btn bg-brown btn-xlg" href="<?php echo server_url."".$carpeta."imprimir.php?valor=".$_GET["cod_0"]."" ?>" target="_blank" style="color: #f3f4f4;"><i class="icon-printer position-left"></i>Imprimir</a></li>                
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="10%">Nº</th>
              <th width="45%">Paralelo</th>
              <th width="45%" class="text-center">Cantidad Maxima de Alumnos</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_0 where id_primaria ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $dt_01["paralelo"];?></td>
          <td class="text-center"><?php echo $dt_01["cantidad"];?> Cupos disponibles <code>
          <?php 
			$sql_02="select * from $tabla_1 where id_paralelo ='".$dt_01["id"]."'";
			$rs_02=$base->dex_query($sql_02);
			echo ($dt_01["cantidad"]-$base->dex_num_rows($rs_02)); 		  
		  ?></code>
          </td>                   
      </tr>
        <?php
        $i++; 
        }?>        
        </tbody>
    </table>
</div>
<!-- /nested object data -->