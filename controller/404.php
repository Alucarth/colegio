<?php
	$user=new user();			
?>	
        	<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3><img src="<?php echo server_url; ?>userfiles/img/logo.png" alt=""></h3>
				</div>
			</div>
			<!-- /page header -->            			
			<!-- Breadcrumbs line -->
            <div class="callout callout-danger fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h5>Enlace no encontrado.....!</h5>
                <p>intentas ingresar a un enlace inexistente.</p>
            </div>               
            <!-- /Breadcrumbs line -->
            <!-- Error wrapper -->
			<div class="error-wrapper text-center">
			    <h1>404</h1>
		        <h6>- Vaya, se ha producido un error. ¡Página no encontrada! -</h6>

		        <!-- Error content -->
		        <div class="error-content">
			        <div class="row">
				          <a href="<?php echo server_url;?>" class="btn btn-success btn-block">Volver a la página Principal</a>
			        </div>
		        </div>
		        <!-- /error content -->
			</div>  
			<!-- /error wrapper -->
                   