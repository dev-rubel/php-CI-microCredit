<div class="row">
	<div class="col-md-12">
		<img src="<?php echo base_url();?>assets/pages/img/pad_logo.jpg" alt="" class="img-responsive center-block banner-image">
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="portlet-body">
					<!-- BEGIN FORM-->
					<form action="<?php echo base_url('users/addMember');?>" method="post" class="form-horizontal validateForm" id="membersForm" enctype="multipart/form-data">
						<div class="form-body">
<!-- START MEMBER INFORMATION SECTION -->							
							<h3 class="section-title">Member Information</h3>
							<hr>
							<br>
							<div class="alert alert-danger display-hide" id="errorMsg"></div>
							<div class="alert alert-success display-hide" id="successMsg"></div>
							<div class="form-group">
								<label class="control-label col-md-2">ID
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Member ID" required /> 
								</div>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Share ID" required /> 
								</div>
								<div class="col-md-3">
									<input type="text" name="memGuardian" class="form-control" placeholder="Accounting ID" required /> 
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Member/Share
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-3">
									<input type="text" name="memName" class="form-control" placeholder="Fee" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="Share Amount" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="Share Total" required /> </div>
                                </label>
								<div class="col-md-2">
									<input type="text" name="memName" class="form-control" placeholder="Grand Total" required /> </div>
                                </label>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Name
                                    <span class="required"> * </span>
                                </label>
								<div class="col-md-6">
									<input type="text" name="memName" class="form-control" placeholder="Member Name" required /> </div>
                                </label>
								<div class="col-md-3">
									<input type="text" name="memName" class="form-control" placeholder="Mobile" required /> </div>
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
								<label class="control-label col-md-2">Other's
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-3">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="NID Number" required />
								</div>
								<div class="col-md-3">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Nationality" required />
								</div>
								<div class="col-md-3">
									<input class="date-picker form-control" name="memJnDate" data-date-format="dd-mm-yyyy" placeholder="Date of Birth" required readonly/>
								</div>
							</div>	
<!-- END MEMBER INFORMATION SECTION -->								
<!-- START NOMINEE INFORMATION SECTION -->					
							<hr>
							<h3 class="section-title">Nominee Information</h3>
							<hr>
							<div class="form-group">
								<label class="control-label col-md-2">Nominee 1
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
								<label class="control-label col-md-2">Nominee 1 Guardian
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
								<label class="control-label col-md-2">Nominee 1 Address
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Parmanent" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Present" required />
								</div>
							</div>	
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Nominee 2
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
								<label class="control-label col-md-2">Nominee 2 Guardian
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
								<label class="control-label col-md-2">Nominee 2 Address
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Parmanent" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Present" required />
								</div>
							</div>	
<!-- END NOMINEE INFORMATION SECTION -->
<!-- START INTRODUCER INFORMATION SECTION -->	
							<hr>
							<h3 class="section-title">Introducer Information</h3>				
							<hr>
							<div class="form-group">
								<label class="control-label col-md-2">Introducer 1
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Member ID" required />
								</div>
							</div>
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Introducer 2
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-5">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Member ID" required />
								</div>
							</div>	
<!-- END INTRODUCER INFORMATION SECTION -->		
<!-- START APPLICANT INFORMATION SECTION -->						
							<hr>
							<h3 class="section-title">Applicant(s) Information</h3>
							<hr>
							<div class="form-group">
								<label class="control-label col-md-2">Applicant
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-1">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="No." required />
								</div>
								<div class="col-md-4">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Father/Husband" required />
								</div>
							</div>	
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Applicant 2
                                                    <span class="required"> * </span>
                                                </label>
								<div class="col-md-1">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="No." required />
								</div>
								<div class="col-md-4">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Name" required />
								</div>
								<div class="col-md-4">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Father/Husband" required />
								</div>
							</div>
<!-- END APPLICANT INFORMATION SECTION -->
<!-- START LOCATION INFORMATION SECTION -->
							<hr>
							<h3 class="section-title">Location Information</h3>
							<hr>
							<div class="form-group">
								<label class="control-label col-md-2">Branch & Word
                                                    <span class="required"> * </span>
                                                </label>
								
								<div class="col-md-5">
									<select class="form-control" name="acType" required>
										<option value="">Select Branch</option>
										<option value="">Branch 1</option>
										<option value="">Branch 2</option>
										<option value="">Branch 3</option>
									</select>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="acType" required>
										<option value="">Select Ward</option>
										<option value="">Ward 1</option>
										<option value="">Ward 2</option>
										<option value="">Ward 3</option>
									</select>
								</div>
							</div>
<!-- END LOCATION INFORMATION SECTION -->	
<!-- START ACCOUNT TYPE INFORMATION SECTION -->							
							<hr>
							<h3 class="section-title">Account Type</h3>
							<hr>
							<div class="form-group">
								<label class="control-label col-md-2">AC. Type
                                                    <span class="required"> * </span>
                                                </label>
								
								<div class="col-md-9">
									<select class="form-control" name="acType" required>
										<option value="">Select Account Type</option>
										<option value="General Savings">General Savings</option>
										<option value="My Savings">My Savings</option>
										<option value="DPS">DPS</option>
										<option value="FDR">FDR</option>
									</select>
								</div>
							</div>
<!-- START ACCOUNT TYPE INFORMATION SECTION -->		
<!-- START ACCOUNTING INFORMATION SECTION -->	
							<hr>
							<h3 class="section-title">Accounting Information</h3>
							<hr>
							<div class="form-group">
								<div class="col-md-3">
									<input class="date-picker form-control" name="memJnDate" data-date-format="dd-mm-yyyy" placeholder="Issue Date" required readonly/>
								</div>
								<div class="col-md-3">
									<input name="memPEaddrrs" type="text" class="form-control" placeholder="Amount (tk)" required />
								</div>
								<div class="col-md-3">
									<input class="date-picker form-control" name="memJnDate" data-date-format="dd-mm-yyyy" placeholder="Expiry Date" required readonly/>
								</div>
								<div class="col-md-2">
									<input name="memPRaddrrs" type="text" class="form-control" placeholder="Profit Rate" required />
								</div>
							</div>
<!-- END ACCOUNTING INFORMATION SECTION -->		
<!-- START ACCOUNTING INSTRUCTION INFORMATION SECTION -->	
							<hr>
							<h3 class="section-title">Accounting Information (If Any)</h3>
							<hr>
							<div class="form-group">
								<div class="col-md-11">
									<textarea class="form-control" name="" rows="10" placeholder="Accounting Information" required></textarea>
								</div>
							</div>
<!-- END ACCOUNTING INSTRUCTION INFORMATION SECTION -->						
<!-- START DOCUMENT INFORMATION SECTION -->	
							<hr>
							<h3 class="section-title">Document Information</h3>
							<hr>

							<div class="form-group last">
								<label class="control-label col-md-2">Image</label>
								<div class="col-md-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Member+Image" alt="" /> </div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
										<div>
											<span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="file" name="memImg" required /> </span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>									
								</div>

								<div class="col-md-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Scan+Image" alt="" /> </div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
										<div>
											<span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
											<span class="fileinput-exists"> Change </span>
											<input type="file" name="memImg" required /> </span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
										</div>
									</div>									
								</div>
							</div>
<!-- END DOCUMENT INFORMATION SECTION -->								

							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-1 col-md-2">
										<?php echo preLoader('memberLoader'); ?>
									</div>
									<div class="col-md-offset-2 col-md-7">
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
