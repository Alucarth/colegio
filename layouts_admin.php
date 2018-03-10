<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<!-- Global stylesheets -->
    <link rel="icon" type="image/png" href="<?php echo server_url;?>userfiles/empresa/1.png" sizes="16x16">
	<!-- Global stylesheets -->
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
</head>

<body class="navbar-top">

<?php include("vista/main_navbar.php"); ?>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
        <?php include("vista/main_navigation.php"); ?>           
		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
