<?php 
 if($user->get_level()==3)
  {
    if($user->get_nivel()=='P')	{
    $userfiles="userfiles/user_docente_p/";}
   else{
	$userfiles="userfiles/user_docente_s/";}}	
 else{
   if($user->get_level()==4){
    if($user->get_nivel()=='P')	{
    $userfiles="userfiles/user_Alumno_primaria/";}
    else{
	$userfiles="userfiles/user_Alumno_secundaria/";}}
 }
   
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido <?php echo $user->get_name();?></title>

	<!-- Global stylesheets -->
    <link rel="icon" type="image/png" href="<?php echo server_url;?>userfiles/empresa/1.png" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo server_url; ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo server_url; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo server_url; ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo server_url; ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo server_url; ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->       
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/wizards/steps.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/extensions/cookie.js"></script>
    
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/visualization/c3/c3.min.js"></script>

	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
	        
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/notas.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/wizard_mod.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/wizard_model.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/wizard_modelo.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/wizard_modelos.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/wizard_admin.js"></script>    
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/recuestions.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/pages/components_modals.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/pages/datatables_data_sources.js"></script>
    <script type="text/javascript" src="<?php echo server_url; ?>assets/js/charts/c3/c3_lines_areas.js"></script> 
	<!-- /theme JS files -->

</head>

<body class="layout-boxed navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-teal-400 navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo server_url; ?>"><img src="<?php echo server_url."userfiles/empresa/".$id.".".$logo; ?>" style="width: 170px;height: 33px;"></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li class="dropdown mega-menu mega-menu-wide active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-menu7 position-left"></i> Menu <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-body">
							<div class="row">
                                <?php 
								if($user->get_level()<>4){
								?>
								<div class="col-md-3">
									<span class="menu-heading underlined">Registro de Notas</span>
									<ul class="menu-list">
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='6' and id_user ='".$user->get_nivel()."'";
                                    $rs_01=$base->dex_query($sql_01);
                                    if($base->dex_query_num_rows($sql_01)>0){
                                     while ($dt_01=$base->dex_fetch_array($rs_01)){?>
                                     <li><a href="<?php echo server_url; ?>modelo/<?php echo $dt_01['re_modulo'] ?>/"><?php echo $dt_01['titulo'] ?></a></li>
                                     <?php }
                                    }
                                    else{
                                    echo"<li><a>No tiene Modulos Instalados</a></li>";}						
                                    ?>                                    
									</ul>                                    
								</div>
                                <?php 
								}?>
								<div class="col-md-3">
									<span class="menu-heading underlined">Actividades del Colegio</span>
									<ul class="menu-list">
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='5'";
                                    $rs_01=$base->dex_query($sql_01);
                                    if($base->dex_query_num_rows($sql_01)>0){
                                     while ($dt_01=$base->dex_fetch_array($rs_01)){?>
                                     <li><a href="<?php echo server_url; ?>modelo/<?php echo $dt_01['re_modulo'] ?>/"><?php echo $dt_01['titulo'] ?></a></li>
                                     <?php }
                                    }
                                    else{
                                    echo"<li><a>No tiene Modulos Instalados</a></li>";}						
                                    ?>                                   
									</ul>                                    
								</div>                                
							</div>
						</div>
					</div>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
						if($user->get_foto()==""){
						 echo"<img src='".server_url."userfiles/img/face1.png'>";}
						else{
						 echo"<img src='".server_url.$userfiles.$user->get_id().".".$user->get_foto()."'>";}
						?>
						<span><?php echo $user->get_name(); ?></span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo server_url; ?>perfil/"><i class="icon-user-plus"></i> Mi perfil</a></li>
						<li><a href="<?php echo server_url; ?>logout/"><i class="icon-switch2"></i> Salir</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Bienvenido al </span> Principal</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->
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
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>
