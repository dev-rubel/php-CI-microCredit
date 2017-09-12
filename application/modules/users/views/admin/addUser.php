<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">

				<div class="portlet-body">
					<!-- BEGIN FORM-->
					<form action="<?php echo base_url('users/addUser');?>" method="post" class="form-horizontal validateForm" id="usersForm" >
						<div class="form-body">
							<br>
							<div class="alert alert-danger display-hide" id="errorMsg"></div>
							<div class="alert alert-success display-hide" id="successMsg"></div>

							<div class="form-group">
								<label class="control-label col-md-3">Name
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-5">
									<input type="text" name="name" class="form-control" required /> </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-5">
									<input type="text" name="email" class="form-control" required /> </div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPass" type="password" class="form-control" required />
								</div>
							</div>
                            <div class="form-group">
								<label class="control-label col-md-3">User Type
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<select class="form-control" name="userType" required>
										<option value="">Select...</option>
										<option value="1">Admin</option>
										<option value="2">Accountant</option>
										<option value="3">Field Officer</option>
									</select>
								</div>
							</div>
							
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-1 col-md-2">
										<?php echo preLoader('memberLoader'); ?>
									</div>
									<div class="col-md-7">
										<button type="submit" id='memberAdd' class="btn green">Submit</button>
										<button type="button" class="btn grey-salsa btn-outline">Cancel</button>
									</div>
								</div>
							</div>
					</form>
					<!-- END FORM-->
					</div>
				</div>
				<!-- END VALIDATION STATES-->
			</div>
		</div>
