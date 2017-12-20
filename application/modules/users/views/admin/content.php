<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">

				<div class="portlet-body">
					<!-- BEGIN FORM-->
					<form action="<?php echo base_url('users/addMember');?>" method="post" class="form-horizontal validateForm" id="membersForm" enctype="multipart/form-data">
						<div class="form-body">
							<br>
							<div class="alert alert-danger display-hide" id="errorMsg"></div>
							<div class="alert alert-success display-hide" id="successMsg"></div>
							<div class="form-group">
								<label class="control-label col-md-2">ID
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-5">
									<input type="text" name="memGuardian" class="form-control" placeholder="Member ID" required /> 
								</div>
								<div class="col-md-4">
									<input type="text" name="memGuardian" class="form-control" placeholder="Shere ID" required /> 
								</div>
							</div>
							<hr>

							<div class="form-group">
								<label class="control-label col-md-2">Member/Shere
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-3">
									<input type="text" name="memName" class="form-control" placeholder="Fee" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="Shere Amount" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="Total" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="G.Total" required /> </div>
                                </label>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Name
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-9">
									<input type="text" name="memName" class="form-control" placeholder="Member Name" required /> </div>
                                </label>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Father/Husband
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Name" required /> 
								</div>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Profession" required /> 
								</div>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Age" required /> 
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Address
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Parmanent" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Present" required />
								</div>
							</div>							
				
							<div class="form-group">
								<label class="control-label col-md-2">Nominee
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-6">
									<input name="memNID" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-3">
									<input type="text" name="memName" class="form-control" placeholder="Age" required /> 
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee Guardian
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-6">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-3">
									<input type="text" name="memName" class="form-control" placeholder="Relation" required /> 
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee Address
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Parmanent" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Present" required />
								</div>
							</div>
							

							<div class="form-group">
								<label class="control-label col-md-3">Voucher No.
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPass" type="test" class="form-control" placeholder="Voucher No" required />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Account Type
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<select class="form-control" name="acType" required>
										<option value="">Select...</option>
										<option value="General Savings">General Savings</option>
										<option value="DPS">DPS</option>
										<option value="FDR">FDR</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Field Officer
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<select class="form-control" name="memFO" required>
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Join Date
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input type="text" class="date-picker form-control" name="memJnDate" data-date-format="yyyy-mm-dd" placeholder="Date" required readonly/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPass" type="test" class="form-control" placeholder="Member Email" required />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPass" type="password" class="form-control" placeholder="Password" required />
								</div>
							</div>
							<div class="form-group last">
								<label class="control-label col-md-2">Image</label>
								<div class="col-md-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
										<div>
											<span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="file" name="memImg" required /> </span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>
									<div class="clearfix margin-top-10">
										<span class="label label-danger">Member Image</span> Image Size Must W132 X H170 And only JPG format.</div>
								</div>

								<div class="col-md-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
										<div>
											<span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="file" name="memImg" required /> </span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>
									<div class="clearfix margin-top-10">
										<span class="label label-danger">Scanned Image</span> Image Size Must W132 X H170 And only JPG format.</div>
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
