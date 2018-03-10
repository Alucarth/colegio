	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Form with validation -->
					<form class="form-validate">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Ingrese a su cuenta <small class="display-block">Sus credenciales</small></h5>
							</div>
                            <div id="suses"></div>
                            <div id="login">
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Usuario" name="username" id="username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-4">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled">
											Recuerdame
										</label>
									</div>

									<div class="col-sm-8 text-right">
										<a href="login_password_recover.html">Recuperar contraseña?</a>
									</div>
								</div>
							</div>
                            </div>
							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block">Iniciar sesión <i class="icon-arrow-right14 position-right"></i></button>
							</div>                            
							<span class="help-block text-center no-margin">Unidad educativa</span>
						</div>
					</form>
					<!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->