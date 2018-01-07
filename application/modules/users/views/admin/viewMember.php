<?php 
extract($memberInformation[0]);
$memberNominee = $this->MembersNomineeModel->get($memberId);
$memberAccount = $this->MembersAccountInfoModel->get($memberId);
extract($memberAccount[0]);
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
					<img src="<?php echo base_url('uploads/members/profile/').$memberId.'.jpg'; ?>" class="img-responsive" alt=""> </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $memberName; ?> </div>
					<div class="profile-usertitle-job"> Member </div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-circle green btn-sm">Account Type: <?php echo $accTypeID; ?></button>
					<!-- <br><br>
					<button type="button" class="btn btn-circle blue btn-sm">FO: <?php //echo $memFO; ?></button>
					<br><br> -->
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
									<a href="#tab_1_1" data-toggle="tab">Personal</a>
								</li>
								<li>
									<a href="#tab_1_4" data-toggle="tab">Nominee</a>
								</li>
								<li>
									<a href="#tab_1_5" data-toggle="tab">Account</a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<!-- PERSONAL INFO TAB -->
								<div class="tab-pane active" id="tab_1_1">
									<table class="table table-bordered">
										<thead>
											<th colspan="2" class="text-center">Personal Information</th>
										</thead>
										<tbody>
											<tr>
												<th>Member-ID</th>
												<td><?php echo $memberAcID; ?></td>
											</tr>
											<tr>
												<th>Name</th>
												<td><?php echo $memberName; ?></td>
											</tr>
											<tr>
												<th>Date of birth</th>
												<td><?php echo $memberDOB; ?></td>
											</tr>
											<tr>
												<th>Present Address</th>
												<td><?php echo $memberPEaddrrs; ?></td>
											</tr>
											<tr>
												<th>Parmanent Address</th>
												<td><?php echo $memberPRaddrrs; ?></td>
											</tr>
											<tr>
												<th>NID Number</th>
												<td><?php echo $memberNID; ?></td>
											</tr>
											<tr>
												<th>Join Date</th>
												<td><?php echo date('d-m-y',$createDate); ?></td>
											</tr>
										</tbody>
									</table>									
								</div>
								<!-- END PERSONAL INFO TAB -->
								<!-- NOMINEE INFO TAB -->								
								<div class="tab-pane" id="tab_1_4">
									<?php foreach($memberNominee as $k=>$each): extract($each);?>
									<table class="table table-bordered">
										<thead>
											<th colspan="2" class="text-center">Nominee <?php echo $k+1;?> Information</th>
										</thead>
										<tbody>
											<tr>
												<th>Name</th>
												<td><?php echo $nomineeName; ?></td>
											</tr>
											<tr>
												<th>Age</th>
												<td><?php echo $nomineeAge; ?></td>
											</tr>
											<tr>
												<th>Guardian name</th>
												<td><?php echo $nomineeGuardianName; ?></td>
											</tr>
											<tr>
												<th>Relation to Member</th>
												<td><?php echo $nomineeGuardianRel; ?></td>
											</tr>
											<tr>
												<th>Present Address</th>
												<td><?php echo $nomineePEaddrrs; ?></td>
											</tr>
											<tr>
												<th>Parmanent Address</th>
												<td><?php echo $nomineePRaddrrs; ?></td>
											</tr>
										</tbody>
									</table>
								<?php endforeach;?>
								</div>
								<!-- END NOMINEE INFO TAB -->
								<!-- ACCOUNT INFO TAB -->								
								<div class="tab-pane" id="tab_1_5">
									<table class="table table-bordered">
										<thead>
											<tr>
											<th colspan="2" class="text-center">Account Information </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Issue Date</th>
												<td><?php echo $accIssueDate; ?></td>
											</tr>
											<tr>
												<th>Amount</th>
												<td><?php echo $accAmount; ?></td>
											</tr>
											<tr>
												<th>Expire Date</th>
												<td><?php echo $accExpireDate; ?></td>
											</tr>
											<tr>
												<th>Profit Rate</th>
												<td><?php echo $accProfitRate; ?></td>
											</tr>
											<tr>
												<th>Extra Information</th>
												<td><?php echo $accInformation; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- END ACCOUNT INFO TAB -->



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE CONTENT -->


		</div>
	</div>
