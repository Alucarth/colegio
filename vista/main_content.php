			<!-- Main content -->
			<div class="content-wrapper">
                <?php include("vista/page_header.php"); ?> 
				<!-- Content area -->
				<div class="content">
					<?php
					$nivel_user=$user->get_level();
					$sql_00="select * from det_nivel_modulo det_mod where det_mod.id_modulo='{$_GET['con']}' and id_nivel_user='$nivel_user'";
					$n_user=$base->dex_query_num_rows($sql_00);
					$modulo->muestra();
					?>					
					<?php include("vista/footer.php"); ?> 
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->