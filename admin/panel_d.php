<?php 
	$base=new base();
	$user=new user();
		if($user->get_nivel()=="S"){$userfiles="userfiles/user_docente_s/";}else{$userfiles="userfiles/user_docente_p/";}	
?>
<div class="row">
  <!-- Cover area -->
  <div class="profile-cover">
      <div class="profile-cover-img" style="background-image: url(<?php echo server_url."userfiles/img/cover3.jpg"; ?>)"></div>
      <div class="media">
          <div class="media-left">
              <a href="<?php echo server_url; ?>perfil/" class="profile-thumb">
				  <?php 
                  if($user->get_foto()==""){
                   echo"<img src='".server_url."userfiles/img/face1.png' class='img-circle'>";}
                  else{
                   echo"<img src='".server_url.$userfiles.$user->get_id().".".$user->get_foto()."' class='img-circle'>";}
                  ?>                  
              </a>
          </div>

          <div class="media-body">
              <h1><?php echo $user->get_name();?> <small class="display-block">Docente de la Unidad Educativa</small></h1>
          </div>
      </div>
  </div>
  <!-- /cover area -->
</div>