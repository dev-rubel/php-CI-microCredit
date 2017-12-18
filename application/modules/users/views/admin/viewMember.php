<?php 
extract($memberInformation[0]);
?>
<!-- END PAGE HEADER-->
<div class="row">
	<div class="col-md-offset-1 col-md-10">
        <!-- BEGIN PROFILE SIDEBAR -->
        <br>
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet ">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo base_url('uploads/members/member').$memId.'.jpg'; ?>" class="img-responsive" alt=""> </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $memName; ?> </div>
					<div class="profile-usertitle-job"> Member </div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-circle green btn-sm">Account Type: <?php echo $acType; ?></button>
					<br><br>
					<button type="button" class="btn btn-circle blue btn-sm">FO: <?php echo $memFO; ?></button>
					<br><br>
				</div>
				<!-- END SIDEBAR BUTTONS -->
			</div>
			<!-- END PORTLET MAIN -->
		</div>
		<!-- END BEGIN PROFILE SIDEBAR -->
		<!-- BEGIN PROFILE CONTENT -->
		<div class="profile-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light ">
						<div class="portlet-title tabbable-line">
							<div class="caption caption-md">
								<i class="icon-globe theme-font hide"></i>
								<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
							</div>
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
								</li>
								<li>
									<a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<!-- PERSONAL INFO TAB -->
								<div class="tab-pane active" id="tab_1_1">
									<form action="<?php echo base_url('users/updateMember');?>" method="post" class="form-horizontal validateForm" enctype="multipart/form-data">
										    <div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Name</label> <h4 class="d-inline-block"><?php echo $memName; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Email</label> <h4 class="d-inline-block"><?php echo $memEmail; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Phone</label> <h4 class="d-inline-block"><?php echo $memPhn; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Date of birth</label> <h4 class="d-inline-block"><?php echo $memDOB; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Present Address</label> <h4 class="d-inline-block"><?php echo $memPRaddrrs; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Parmanent Address</label> <h4 class="d-inline-block"><?php echo $memPEaddrrs; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">NID Number</label> <h4 class="d-inline-block"><?php echo $memNID; ?></h4>
                                            </div>
											<div class="form-group memberLavel">
                                                <label class="label label-sm label-info control-label">Join Date</label> <h4 class="d-inline-block"><?php echo $memJnDate; ?></h4>
                                            </div>
											
									</form>
									</div>
									<!-- END PERSONAL INFO TAB -->
									<!-- PRIVACY SETTINGS TAB -->
									<div class="tab-pane" id="tab_1_4">
										<p><b>For Future Use</b></p>
										<form action="#">
											<table class="table table-light table-hover">
												<tr>
													<td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
													<td>
														<div class="mt-radio-inline">
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
														</div>
													</td>
												</tr>
												<tr>
													<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
													<td>
														<div class="mt-radio-inline">
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
														</div>
													</td>
												</tr>
												<tr>
													<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
													<td>
														<div class="mt-radio-inline">
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
														</div>
													</td>
												</tr>
												<tr>
													<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
													<td>
														<div class="mt-radio-inline">
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
															<label class="mt-radio">
                                                        <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
														</div>
													</td>
												</tr>
											</table>
											<!--end profile-settings-->
											<div class="margin-top-10">
												<a href="javascript:;" class="btn red"> Save Changes </a>
												<a href="javascript:;" class="btn default"> Cancel </a>
											</div>
										</form>
									</div>
									<!-- END PRIVACY SETTINGS TAB -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE CONTENT -->


		</div>
	</div>
