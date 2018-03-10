	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo server_url; ?>"><img src="<?php echo server_url."userfiles/empresa/".$id.".".$logo; ?>" style="width: 170px;height: 33px;"></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">

			<p class="navbar-text"><span class="label bg-success">conectado</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
						<img src="<?php echo server_url; ?>assets/images/flags/gb.png" class="position-left" alt="">
						 LA PAZ - BOLIVIA
					</a>
				</li>				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
						if($user->get_foto()==""){
						 echo"<img src='".server_url."asset/images/demo/users/face1.png'>";}
						else{
						 echo"<img src='".server_url."userfiles/user_sistema/".$user->get_id().".".$user->get_foto()."'>";}
						?>
						<span><?php echo $user->get_name();?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo server_url; ?>perfil/"><i class="icon-user-plus"></i> Perfil</a></li>
						<li><a href="<?php echo server_url; ?>empresa/"><i class="icon-office"></i> Establecimiento</a></li>
						<li class="divider"></li>						
						<li><a href="<?php echo server_url; ?>nivel/"><i class=" icon-users2"></i> Nivel de Usuarios</a></li>
						<li><a href="<?php echo server_url; ?>logout/"><i class="icon-switch2"></i> Salir</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->