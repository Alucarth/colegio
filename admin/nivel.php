<?php 
	$base=new base();
	$user=new user();
	$tabla=$base->prefig."nivel_user";
	$codigo="id_det_nivel_modulo";
	$id_user=$user->get_id();
	$id_nivel_user=$user->get_user();
	if (!$user->check_register()){
	}else{
	if($_POST["valor"]<>""){
	  if($base->dex_query_num_rows("select estado,id_det_nivel_modulo from det_nivel_modulo where estado='A' and $codigo='".$_POST["valor"]."';")>0){
	  $estado="B";}else{$estado="A";}	
	  $base->dex_query("update det_nivel_modulo set estado='$estado' where $codigo='{$_POST['valor']}'");}
	}
	  
?>
<!-- Solid tabs title -->
<h6 class="content-group text-semibold">
    Niveles de Usuarios
    <small class="display-block">Asignación de acceso a módulos para grupos de usuarios</small>
</h6>
<!-- /solid tabs title -->
<!-- Tabs with solid background -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading">
                <h6 class="panel-title">Grupos de usuarios</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
            <div class="tabbable">
             <ul class="nav nav-tabs nav-tabs-solid">
             <?php 
				$sql_01="select * from $tabla ORDER BY id_nivel_user ASC;";
				$rs_01=$base->dex_query($sql_01);								
				$i=1;
				while ($dt_01=$base->dex_fetch_array($rs_01)){?>
             <li <?php if($i==1){?> class="active" <?php } ?>><a href="#solid-tab<?php echo $i; ?>" data-toggle="tab"><?php echo $dt_01['titulo']; ?></a></li>			
			 <?php 
			    $i++;
            	}?> 			 
             </ul>
             <div class="tab-content">
             <?php
			  $a=1;
				$sql_0="select * from $tabla ORDER BY id_nivel_user ASC;";
				$rs_0=$base->dex_query($sql_0);			   
			  while ($dt_0=$base->dex_fetch_array($rs_0)){?>             
                 <div class="tab-pane <?php if($a==1){?> active <?php } ?>" id="solid-tab<?php echo $a; ?>">
                    <!-- Info alert -->
                    <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Cerrar</span></button>
                        <h6 class="alert-heading text-semibold"><?php echo $dt_0['titulo']; ?></h6>
                        <?php echo $dt_0['descripcion']; ?>
                    </div>
                    <!-- /info alert -->
                    <div class="table-responsive">
                     <table class="table table-bordered table-lg">
                      <tbody>
                            <tr class="active">
                                <th colspan="3">Lista de Modulos</th>
                            </tr>
                            </tr>
                            <?php
							  $sql_02="select dt.estado,modt.titulo,modt.descripcion,dt.id_det_nivel_modulo from det_nivel_modulo dt,modulo modt where dt.id_nivel_user='{$dt_0['id_nivel_user']}' and dt.id_modulo=modt.id_modulo;";
							  $rs_02=$base->dex_query($sql_02);
							  while ($dt_02=$base->dex_fetch_array($rs_02)){							
							?>                               
                            <tr>
                                <td><?php echo $dt_02["titulo"];?></td>
                                <td><?php echo $dt_02["descripcion"]; ?></td>
                                <td align="center">
                                    <ul class="icons-list">
                                    <?php if($dt_02["estado"]=='A'){?>
                                    <li <?php if($dt_02["estado"]=='A'){?> class="text-teal-600" <?php } ?>>
                                    <i class="icon-checkbox-checked"></i>&nbsp;Módulo Habilitado</li>
                                    <li <?php if($dt_02["estado"]=='A'){?> class="text-danger-600" <?php } ?>>
                                    <button class="btn btn-link text-danger-600" onclick="enviar('<?php echo $dt_02["id_det_nivel_modulo"];?>');">
                                    <i class="icon-checkbox-unchecked position-left"></i> Deshabilitar Módulo</button></li>
                                    <?php }else{?>
                                    <li <?php if($dt_02["estado"]=='B'){?> class="text-danger-600" <?php } ?>>
                                    <i class="icon-checkbox-checked"></i>&nbsp;Módulo Deshabilitado</li>
                                    <li <?php if($dt_02["estado"]=='B'){?> class="text-teal-600" <?php } ?>>
                                    <button class="btn btn-link text-teal-600" onclick="enviar('<?php echo $dt_02["id_det_nivel_modulo"];?>');">
                                    <i class="icon-checkbox-unchecked position-left"></i> Habilitar Módulo</button></li>
                                    <?php }?>
                                    </ul>
                                </td>                                        
                            </tr>
                            <?php 
							  }
							?>                                    
                      </tbody>
                     </table>
                    </div>                                                               
                 </div>               
			 <?php 
			    $a++;
            	}?>                
              </div>                             
            </div>
          </div>
        </div>
    </div>						
</div>
<!-- /tabs with solid background -->