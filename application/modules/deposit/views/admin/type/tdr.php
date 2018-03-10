<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">TDR Section</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab3" data-toggle="tab"> Add TDR (Member Wise) </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
		
			<div class="tab-pane active" id="portlet_tab3">

				<div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Add TDR Account</h3>
					</div>
					<div class="portlet-body">
						<!-- BEGIN FORM-->
						<form id="createTdrForm" action="<?php echo base_url('deposit/createTdrForm');?>" method="post" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide" id="applyErrorMsgTdr"></div>
								<div class="alert alert-success display-hide" id="applySuccessMsgTdr"></div>

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
				<div id="memberTdrInformationHolder"></div>

			</div>

		</div>
	</div>
</div>
