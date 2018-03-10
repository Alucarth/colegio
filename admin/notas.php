<?php 
	$base=new base();
	$user=new user();
	$tabla_0=$base->prefig."primaria_aulas";
	$tabla_2=$base->prefig."notas_p";
	$tabla_3=$base->prefig."docente_p";
	$carpeta="userfiles/user_Alumno_primaria/";		
	$codigo="id";	
	$cod=$user->get_id();
?>
<!-- Nested object data -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"><i class="icon-user-check"></i> lista de materias del Alumno<br />Paralelo :
        <?php 
        $sql_p="select * from $tabla_0 where id_primaria ='".$cod."'";
        $rs_p=$base->dex_query($sql_p);
		$dt_p=$base->dex_fetch_array($rs_p);
		echo $dt_p["paralelo"];
		?>
        </h5>
        <div class="heading-elements">
            <ul class="icons-list">                            
                <li><a data-action="reload"></a></li>
            </ul>
        </div>        
    </div>    
    <table width="1140" class="table table datatable-ajax" id="tabla">
        <thead>
            <tr>
              <th width="35%">Docente</th>
              <th width="25%">Materias</th>              
              <th width="45%">Notas</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql_01="select * from $tabla_3  where id_paralelo ='".$dt_p["id"]."'";
        $rs_01=$base->dex_query($sql_01);
        while ($dt_01=$base->dex_fetch_array($rs_01)){
        ?>          
      <tr>
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
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="row">
						<?php 
                        $sql_="select * from $tabla_2 where id_alumno='".$cod."' and id_docente='".$dt_01["id"]."'";
                        $rs_=$base->dex_query($sql_);
                        $dt_=$base->dex_fetch_array($rs_);																	
                        ?>                            
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo  $dt_["primero"]?>" disabled />
                            <span class="help-block text-right">Nota 1</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo  $dt_["segundo"]?>" disabled />
                            <span class="help-block text-right">Nota 2</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo  $dt_["tercero"]?>" disabled />
                            <span class="help-block text-right">Nota 3</span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?php echo  $dt_["cuarto"]?>" disabled />
                            <span class="help-block text-right">Nota 4</span>
                        </div>                                                         
                    </div>
                </div>
            </div>  
          </td>
      </tr>
        <?php 
        }?>        
        </tbody>
    </table> 
    <div id="suses"></div>   
</div>
<!-- Quick stats boxes -->
