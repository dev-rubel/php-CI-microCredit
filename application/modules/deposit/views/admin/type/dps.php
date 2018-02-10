<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">DPS Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab1" data-toggle="tab"> DPS </a>
			</li>
			<li>
				<a href="#portlet_tab2" data-toggle="tab"> Search DPS (Member Wise) </a>
			</li>
			<li>
				<a href="#portlet_tab3" data-toggle="tab"> Add DPS (Member Wise) </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
			<div class="tab-pane active" id="portlet_tab1">

				<!-- START DPS TAB SECTION -->

				<!-- START ADD DPS SECTION-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add DPS</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="monthlyDps" action="<?php echo base_url('deposit/addMonthlyDps');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgDps"></div>
								<div class="alert alert-success display-hide" id="successMsgDps"></div>

								<!-- START MEMBER INFORMATION SECTION -->
									<div class="form-group">
										<div class="col-md-2">
											<input type="text" name="memberId" id="memberId" class="form-control" placeholder="Account NO." />
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" name="dpsAmount" placeholder="Amount">
										</div>
										<div class="col-md-2">
											<input type="text" name="dpsLaserNo" class="form-control" placeholder="Laser NO." />
										</div>
										<div class="col-md-2">
											<select name="dpsFildOfficerID/required" id="" class="form-control">
												<option value="">Select Fild Officer</option>
												<option value="name">Name</option>
											</select>
										</div>
										<div class="col-md-2">
											<input class="date-picker form-control" name="dpsDate" placeholder="Date" readonly/>
										</div>
										<div class="col-md-2">
											<input type="submit" class="btn btn-info" value="Submit" />
										</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="memberInformationHolder"></div>
				<!-- END ADD DPS SECTION-->

				<!-- START DPS LIST SECTION-->
				<div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg">
					<?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?>
				</div>
				<div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg">
					<?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?>
				</div>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>DPS List</h3>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed dps-list">
							<thead>
								<tr>
									<th>#</th>
									<th>Transaction ID</th>
									<th>Member ID</th>
									<th>DR/CR</th>
									<th>Amount</th>
									<th>Laser No.</th>
									<th>Fild Officer</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
				<!-- END DPS LIST SECTION-->

				<!-- END DPS TAB SECTION -->

			</div>
			<div class="tab-pane" id="portlet_tab2">
				<!-- START DPS LIST TAB SECTION -->

				<!-- START SEARCH MEMBER SAVIGNS-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Search Member DPS</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="dpsSearchForm" action="<?php echo base_url('deposit/searchMemberDps');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgSearchDps"></div>
								<div class="alert alert-success display-hide" id="successMsgSearchDps"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-4">
										<input type="text" name="memberId" class="form-control" placeholder="Account NO." />
									</div>
									<div class="col-md-3">
										<input type="text" name="dpsInterest" class="form-control" placeholder="Interest %" />
									</div>
									<div class="col-md-3">
										<input type="text" name="dpsDay" class="form-control" placeholder="Month (12)" />
									</div>
									<div class="col-md-2">
										<input type="submit" class="btn btn-info" value="search" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- END SEARCH MEMBER DPS -->

				<!-- BEGIN ACCORDION PORTLET-->

				<div id="searchMemberdpsTableHolder"></div>

				<!-- END ACCORDION PORTLET-->

				<!-- END DPS LIST TAB SECTION -->
			</div>

			<div class="tab-pane" id="portlet_tab3">

				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add DPS Account</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="createDpsForm" action="<?php echo base_url('deposit/createDpsForm');?>" method="post" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="applyErrorMsgDps"></div>
								<div class="alert alert-success display-hide" id="applySuccessMsgDps"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-10">
										<input type="text" class="form-control" name="memberAcID" placeholder="Member Account ID" />
									</div>
									<div class="col-md-2">
										<input type="submit" class="btn btn-info" value="Submit" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="memberDpsInformationHolder"></div>

			</div>

		</div>
	</div>
</div>
