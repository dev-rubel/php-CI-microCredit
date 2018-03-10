<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">Savings Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab2" data-toggle="tab"> Savings </a>
			</li>
			<li>
				<a href="#portlet_tab1" data-toggle="tab"> Search Savings (Member Wise) </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
			<div class="tab-pane active" id="portlet_tab2">

				<!-- START SAVINGS TAB SECTION -->

				<!-- START ADD SAVINGS SECTION-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add Saving</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="savingForm" action="<?php echo base_url('deposit/addSaving');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgSaving"></div>
								<div class="alert alert-success display-hide" id="successMsgSaving"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-2">
										<input type="text" name="memberId" id="memberId" class="form-control" placeholder="Account NO." />
									</div>
									<div class="col-md-2">
										<input type="text" name="savingAmount" class="form-control" placeholder="Amount" />
									</div>
									<div class="col-md-2">
										<input type="text" name="savingLaserNo" class="form-control" placeholder="Laser NO." />
									</div>
									<div class="col-md-2">
										<select name="savingFildOfficerID/required" id="" class="form-control">
											<option value="">Select Fild Officer</option>
											<option value="name">Name</option>
										</select>
									</div>
									<div class="col-md-2">
										<input class="date-picker form-control" name="savingDate" placeholder="Date" readonly/>
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
				<!-- END ADD SAVINGS SECTION-->

				<!-- START SAVINGS LIST SECTION-->
				<div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg">
					<?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?>
				</div>
				<div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg">
					<?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?>
				</div>
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Saving List</h3>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed saving-list">
							<thead>
								<tr>
									<th>#</th>
									<th style="width: 20px !important;">Transaction ID</th>
									<th>Member ID</th>
									<th>DR/CR</th>
									<th>Amount</th>
									<th>Laser No.</th>
									<th>Source</th>
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
				<!-- END SAVINGS LIST SECTION-->

				<!-- END SAVINGS TAB SECTION -->

			</div>
			<div class="tab-pane" id="portlet_tab1">
				<!-- START SAVINGS LIST TAB SECTION -->

				<!-- START SEARCH MEMBER SAVIGNS-->
				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Search Member Savings</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="savingSearchForm" action="<?php echo base_url('deposit/searchMemberSaving');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgSearchSaving"></div>
								<div class="alert alert-success display-hide" id="successMsgSearchSaving"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-4">
										<input type="text" name="memberId" class="form-control" placeholder="Account NO." />
									</div>
									<div class="col-md-3">
										<input type="text" name="savingInterest" class="form-control" placeholder="Interest %" />
									</div>
									<div class="col-md-3">
										<input type="text" name="savingDay" class="form-control" placeholder="Day (365)" />
									</div>
									<div class="col-md-2">
										<input type="submit" class="btn btn-info" value="search" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				
				<!-- END SEARCH MEMBER SAVINGS -->

				<!-- BEGIN ACCORDION PORTLET-->
				
				<div id="searchMemberSavingTableHolder"></div>
				
				<!-- END ACCORDION PORTLET-->

				<!-- END SAVINGS LIST TAB SECTION -->
			</div>
		</div>
	</div>
</div>
