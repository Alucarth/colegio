					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left">
								<?php 
                                if($user->get_foto()==""){
                                 echo"<img src='".server_url."asset/images/demo/users/face1.png'>";}
                                else{
                                 echo"<img src='".server_url."userfiles/user_sistema/".$user->get_id().".".$user->get_foto()."'>";}
                                ?>                               
                                </a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $user->get_name();?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-user-lock text-size-small"></i> &nbsp;Nivel: <?php echo $user->get_cargo();?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->