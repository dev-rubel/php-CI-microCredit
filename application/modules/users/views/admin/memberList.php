<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">Member Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab2" data-toggle="tab"> Member Section </a>
			</li>
			<li>
				<a href="#portlet_tab1" data-toggle="tab"> New </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
			<div class="tab-pane active" id="portlet_tab2">

                <!-- START MEMBER LIST TABLE -->
                
				<div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg">
					<?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?>
				</div>
				<div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg">
					<?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?>
				</div>
				<div class="portlet light bordered">
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed member-list">
							<thead>
								<tr>
									<th>#</th>
									<th>Member ID</th>
									<th>Name</th>
									<th>Address</th>
									<th>Date of Birth</th>
									<th>Created Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
				<!-- END MEMBER LIST TABLE -->

			</div>
			<div class="tab-pane" id="portlet_tab1">
				<h1>Working.......</h1>
			</div>
		</div>
	</div>
</div>
