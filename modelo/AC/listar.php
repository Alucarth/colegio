<?php 
	$base=new base();
	$user=new user();
	$fun=new functions();
	include($carpeta."ver.php");
	$server_url =  modelo."/".$cod_mod."/";
	$tabla=$base->prefig."actividad";
	$tabla_0=$base->prefig."actividad_mes";	
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Lista de Actividades</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a class="btn btn-primary" href="<?php echo server_url."".$carpeta ?>"><i class="icon-undo2 position-left"></i>Volver</a></li>
                <li><a class="btn bg-brown" href="<?php echo server_url."".$server_url."imprimir.php?valor=".$_GET["cod_0"]."" ?>" target="_blank" style="color: #f3f4f4;"><i class="icon-printer position-left"></i>Imprimir</a></li> 
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>
    <table class="table table datatable-ajax">
        <thead>
            <tr>
              <th width="20%">Nº</th>
              <th width="20%">Dia</th>
              <th width="30%" class="text-center">titulo de Actividad</th>
              <th width="30%" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla where id_mes ='".$_GET["cod_0"]."'";
        $rs_01=$base->dex_query($sql_01);
        $i=1;
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $dt_01["dia"];?></td>
          <td class="text-center"><?php echo $dt_01["titulo"];?></td>
          <td class="text-center"><a class="btn btn-primary" data-toggle="modal" data-target="#modal_default" data-id="<?php echo $dt_01["id"];?>" data-dia="<?php echo $dt_01["dia"];?>" data-titulo="<?php echo $dt_01["titulo"];?>" data-descripcion="<?php echo $dt_01["descripcion"];?>">Ver actividad</a></td>                     
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
		  var id = button.data('id')
		  var dia = button.data('dia')
		  var titulo = button.data('titulo')
		  var descripcion = button.data('descripcion')	
		  var modal = $(this)
		  modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #dia').val(dia)
		  modal.find('.modal-body #titulo').val(titulo)
		  modal.find('.modal-body #descripcion').val(descripcion)	  	  		  
        });
</script>