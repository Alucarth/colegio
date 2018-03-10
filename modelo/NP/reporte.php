<?php 
	$base=new base();
	$user=new user();
	$tabla_e=$base->prefig."epoca";	
	$cod=$user->get_id();
	if (!$user->check_register()){
	}	    		
?>
<!-- Modal with subtitle -->
<div id="modal_reporte" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Reporte de Alumno</h5>
                <span class="modal-subtitle display-block">Estadistica de estado del alumnos sobre las notas</span>
            </div>
            <div class="modal-body">
                    <!-- Simple line chart -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="reload"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div class="chart-container">
								<div class="chart" id="c3-line-chart"></div>
							</div>
						</div>
					</div>
					<!-- /simple line chart -->            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- /modal with subtitle -->
