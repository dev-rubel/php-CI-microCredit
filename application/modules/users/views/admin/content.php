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
					<form id="membersForm" action="<?php echo base_url('users/addMember');?>" method="post" class="form-horizontal validateForm" enctype="multipart/form-data">
						<div class="form-body">
							<!-- START MEMBER INFORMATION SECTION -->
							<div class="alert alert-danger display-hide" id="errorMsg"></div>
							<div class="alert alert-success display-hide" id="successMsg"></div>
							<h3 class="section-title">Member Information</h3>
							<hr>
							<br>							
							<div class="form-group">
								<label class="control-label col-md-2">ID
									<span class="required"> * </span>
								</label>
								<div class="col-md-3">
									<input type="text" name="members*memberAcID/required|numeric" class="form-control" placeholder="Member ID" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members*memberShareID" class="form-control" placeholder="Share ID" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members*memberAccountingID" class="form-control" placeholder="Accounting ID" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Member/Share
									<span class="required"> * </span>
								</label>
								<div class="col-md-3">
									<input type="text" name="members_share*shareFee" class="form-control" placeholder="Fee" /> </div>
								</label>
								<div class="col-md-2">
									<input type="text" name="members_share*shareAmount" class="form-control" placeholder="Share Amount" /> </div>
								</label>
								<div class="col-md-2">
									<input type="text" name="members_share*shareTotal" class="form-control" placeholder="Share Total" /> </div>
								</label>
								<div class="col-md-2">
									<input type="text" name="members_share*shareGrandTotal" class="form-control" placeholder="Grand Total" /> </div>
								</label>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Name
									<span class="required"> * </span>
								</label>
								<div class="col-md-9">
									<input type="text" name="members*memberName" class="form-control" placeholder="Member Name" /> </div>
								</label>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Father/Husband
									<span class="required"> * </span>
								</label>
								<div class="col-md-3">
									<input type="text" name="members*memberGuardianName" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members*memberGuardianPro" class="form-control" placeholder="Profession" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members*memberGuardianAge" class="form-control" placeholder="Age" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Address
									<span class="required"> * </span>
								</label>
								<div class="col-md-5">
									<input name="members*memberPEaddrrs" type="text" class="form-control" placeholder="Parmanent" />
								</div>
								<div class="col-md-4">
									<input name="members*memberPRaddrrs" type="text" class="form-control" placeholder="Present" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Other's
									<span class="required"> * </span>
								</label>
								<div class="col-md-3">
									<input name="members*memberNID" type="text" class="form-control" placeholder="NID Number" />
								</div>
								<div class="col-md-3">
									<input name="members*memberNationality" type="text" class="form-control" placeholder="Nationality" />
								</div>
								<div class="col-md-3">
									<input class="date-picker form-control" name="members*memberDOB" data-date-format="dd-mm-yyyy" placeholder="Date of Birth"
									readonly/>
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
									<input name="members_nominee*nomineeName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members_nominee*nomineeAge[]" class="form-control" placeholder="Age" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee 1 Guardian
									<span class="required"> * </span>
								</label>
								<div class="col-md-6">
									<input name="members_nominee*nomineeGuardianName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members_nominee*nomineeGuardianRel[]" class="form-control" placeholder="Relation" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee 1 Address
									<span class="required"> * </span>
								</label>
								<div class="col-md-5">
									<input name="members_nominee*nomineePEaddrrs[]" type="text" class="form-control" placeholder="Parmanent" />
								</div>
								<div class="col-md-4">
									<input name="members_nominee*nomineePRaddrrs[]" type="text" class="form-control" placeholder="Present" />
								</div>
							</div>
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Nominee 2
									<span class="required"> * </span>
								</label>
								<div class="col-md-6">
									<input type="text" name="members_nominee*nomineeName[]" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members_nominee*nomineeAge[]" class="form-control" placeholder="Age" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee 2 Guardian
									<span class="required"> * </span>
								</label>
								<div class="col-md-6">
									<input name="members_nominee*nomineeGuardianName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-3">
									<input type="text" name="members_nominee*nomineeGuardianRel[]" class="form-control" placeholder="Relation" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-2">Nominee 2 Address
									<span class="required"> * </span>
								</label>
								<div class="col-md-5">
									<input name="members_nominee*nomineePEaddrrs[]" type="text" class="form-control" placeholder="Parmanent" />
								</div>
								<div class="col-md-4">
									<input name="members_nominee*nomineePRaddrrs[]" type="text" class="form-control" placeholder="Present" />
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
									<input name="members_introducer*introName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-4">
									<input name="members_introducer*introMemberID[]" type="text" class="form-control" placeholder="Member ID" />
								</div>
							</div>
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Introducer 2
									<span class="required"> * </span>
								</label>
								<div class="col-md-5">
									<input name="members_introducer*introName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-4">
									<input name="members_introducer*introMemberID[]" type="text" class="form-control" placeholder="Member ID" />
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

								<div class="col-md-4">
									<input name="members_applicant*applicantName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-5">
									<input name="members_applicant*applicantGuardian[]" type="text" class="form-control" placeholder="Father/Husband" />
								</div>
							</div>
							<hr class="hr-divider">
							<div class="form-group">
								<label class="control-label col-md-2">Applicant 2
									<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input name="members_applicant*applicantName[]" type="text" class="form-control" placeholder="Name" />
								</div>
								<div class="col-md-5">
									<input name="members_applicant*applicantGuardian[]" type="text" class="form-control" placeholder="Father/Husband" />
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
									<select class="form-control" name="members_account_info*accOpenBranchID">
										<option value="">Select Branch</option>
										<option value="General Savings">General Savings</option>
										<option value="DPS">DPS</option>
										<option value="FDR">FDR</option>
									</select>
								</div>
								<div class="col-md-4">
									<select class="form-control" name="members_account_info*accOpenWardID">
										<option value="">Select Ward</option>
										<option value="General Savings">General Savings</option>
										<option value="DPS">DPS</option>
										<option value="FDR">FDR</option>
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
									<select class="form-control" name="members_account_info*accTypeID">
										<option value="">Select Account Type</option>
										<option value="General Savings">General Savings</option>
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
									<input class="date-picker form-control" name="members_account_info*accIssueDate" data-date-format="dd-mm-yyyy" placeholder="Issue Date"
									readonly/>
								</div>
								<div class="col-md-3">
									<input name="members_account_info*accAmount" type="text" class="form-control" placeholder="Amount (tk)" />
								</div>
								<div class="col-md-3">
									<input class="date-picker form-control" name="members_account_info*accExpireDate" data-date-format="dd-mm-yyyy" placeholder="Expiry Date"
									readonly/>
								</div>
								<div class="col-md-2">
									<input name="members_account_info*accProfitRate" type="text" class="form-control" placeholder="Profit Rate" />
								</div>
							</div>
							<!-- END ACCOUNTING INFORMATION SECTION -->

							<!-- START ACCOUNTING INSTRUCTION INFORMATION SECTION -->
							<hr>
							<h3 class="section-title">Accounting Information (If Any)</h3>
							<hr>
							<div class="form-group">
								<div class="col-md-11">
									<textarea class="form-control" name="members_account_info*accInformation" rows="10" placeholder="Accounting Information"></textarea>
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
												<input type="file" name="memberImage" /> </span>
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
												<input type="file" name="memberCardImage" /> </span>
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
