<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">Branchs Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab2" data-toggle="tab"> Branch </a>
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
						<h3>Add Branch</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="branchForm" action="<?php echo base_url('branch/addBranch');?>" method="post" class="form-horizontal validateForm">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="errorMsgBranch"></div>
								<div class="alert alert-success display-hide" id="successMsgBranch"></div>

								<!-- START MEMBER INFORMATION SECTION -->
								<div class="form-group">
									<div class="col-md-2">
										<input type="text" name="branchName" class="form-control" placeholder="Branch Name" />
									</div>
									<div class="col-md-2">
										<input type="submit" id="submitButton" class="btn btn-info" value="Submit" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
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
						<h3>Branch List</h3>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed branch-list">
							<thead>
								<tr>
									<th>#</th>
									<th>Branch ID</th>
									<th>Branch Name</th>
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
		</div>
	</div>
</div>
