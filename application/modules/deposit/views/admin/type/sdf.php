<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">SDF Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab1" data-toggle="tab"> SDF </a>
			</li>
			<li>
				<a href="#portlet_tab2" data-toggle="tab"> Search SDF (Member Wise) </a>
			</li>
			<li>
				<a href="#portlet_tab3" data-toggle="tab"> Add SDF (Member Wise) </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
			<div class="tab-pane active" id="portlet_tab1">

				<!-- START SDF TAB SECTION -->

				<!-- START ADD SDF SECTION-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add SDF</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="sdfForm" action="<?php echo base_url('deposit/addSdf');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgSdf"></div>
								<div class="alert alert-success display-hide" id="successMsgSdf"></div>

								<!-- START MEMBER INFORMATION SECTION -->
									<div class="form-group">
										<div class="col-md-2">
											<input type="text" name="memberId" id="memberId" class="form-control" placeholder="Account NO." />
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" name="sdfAmount" placeholder="Amount">
										</div>
										<div class="col-md-2">
											<input type="text" name="sdfLaserNo" class="form-control" placeholder="Laser NO." />
										</div>
										<div class="col-md-2">
											<select name="sdfFildOfficerID/required" id="" class="form-control">
												<option value="">Select Fild Officer</option>
												<option value="name">Name</option>
											</select>
										</div>
										<div class="col-md-2">
											<input class="date-picker form-control" name="sdfDate" placeholder="Date" readonly/>
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
				<!-- END ADD SDF SECTION-->

				<!-- START SDF LIST SECTION-->
				<div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg">
					<?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?>
				</div>
				<div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg">
					<?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?>
				</div>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>SDF List</h3>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed sdf-list">
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
				<!-- END SDF LIST SECTION-->

				<!-- END SDF TAB SECTION -->

			</div>
			<div class="tab-pane" id="portlet_tab2">
				<!-- START SDF LIST TAB SECTION -->

				<!-- START SEARCH MEMBER SAVIGNS-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Search Member SDF</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="sdfSearchForm" action="<?php echo base_url('deposit/searchMemberSdf');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgSearchSdf"></div>
								<div class="alert alert-success display-hide" id="successMsgSearchSdf"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-4">
										<input type="text" name="memberId" class="form-control" placeholder="Account NO." />
									</div>
									<div class="col-md-3">
										<input type="text" name="sdfInterest" class="form-control" placeholder="Interest %" />
									</div>
									<div class="col-md-3">
										<input type="text" name="sdfDay" class="form-control" placeholder="Days (365)" />
									</div>
									<div class="col-md-2">
										<input type="submit" class="btn btn-info" value="search" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- END SEARCH MEMBER SDF -->

				<!-- BEGIN ACCORDION PORTLET-->

				<div id="searchMembersdfTableHolder"></div>

				<!-- END ACCORDION PORTLET-->

				<!-- END SDF LIST TAB SECTION -->
			</div>

			<div class="tab-pane" id="portlet_tab3">

				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add SDF Account</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="createSdfForm" action="<?php echo base_url('deposit/createSdfForm');?>" method="post" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="applyErrorMsgSdf"></div>
								<div class="alert alert-success display-hide" id="applySuccessMsgSdf"></div>

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
				<div id="memberSdfInformationHolder"></div>

			</div>

		</div>
	</div>
</div>
