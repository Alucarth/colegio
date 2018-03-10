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
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/notifications/noty.min.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/plugins/notifications/jgrowl.min.js"></script>    

	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/pages/login_validation.js"></script>
	<script type="text/javascript" src="<?php echo server_url; ?>assets/js/pages/components_notifications_other.js"></script>    
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover">
<?php $modulo->muestra();?>
</body>
</html>