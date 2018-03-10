					<!-- Menu navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li  class="active"><a href="javascript:void(0);"><i class="icon-home4"></i> <span>Panel Principal</span></a></li>
								<li>
									<a href="javascript:void(0);"><i class="icon-vcard"></i> <span>Registros Cursos</span></a>
									<ul>
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='1'";
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
								</li>
								<li>
									<a href="javascript:void(0);"><i class="icon-user-tie"></i> <span>Registros de Docentes</span></a>
									<ul>
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='2'";
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
                                </li>
								<li>
									<a href="javascript:void(0);"><i class="icon-certificate"></i> <span>Registros de Notas</span></a>
									<ul>
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='6'";
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
                                </li>                                
								<li>
									<a href="javascript:void(0);"><i class="icon-users4"></i> <span>Registros de Alumnos</span></a>
									<ul>
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='3'";
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
								</li> 
								<li>
									<a href="javascript:void(0);"><i class="icon-users"></i> <span>Registros de Administrativos</span></a>
									<ul>
									<?php 
                                    $sql_01="select re_modulo,titulo,id_modulo from modulo where menu='4'";
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
								</li> 
								<li>
									<a href="javascript:void(0);"><i class="icon-theater"></i> <span>Actividades</span></a>
									<ul>
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
								</li>                                                                                                
							</ul>
						</div>
					</div>
					<!-- /menu navigation -->