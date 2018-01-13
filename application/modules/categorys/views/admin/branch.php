<div class="portlet light bordered">
	<div class="portlet-title tabbable-line">
		<div class="caption">
			<span class="caption-subject font-dark bold uppercase">Branch Category</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#portlet_tab2" data-toggle="tab"> Branchs </a>
			</li>
			<li>
				<a href="#portlet_tab1" data-toggle="tab"> New </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">			
			<div class="tab-pane active" id="portlet_tab2">

            <!-- START BRANCH TAB SECTION-->
				
                <!-- START ADD BRANCH SECTION-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <h3>Add Branch</h3>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form id="savingForm" action="<?php echo base_url('deposit/addSaving');?>" method="post" class="form-horizontal validateForm"
                        enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide" id="errorMsgSaving"></div>
                                <div class="alert alert-success display-hide" id="successMsgSaving"></div>

                                <!-- START MEMBER INFORMATION SECTION -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="text" name="memberId" class="form-control" placeholder="Branch Name" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="memberId" class="form-control" placeholder="Branch Address" />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-info" value="Add" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END ADD BRANCH SECTION-->

                <!-- START BRANCH LIST SECTION-->
                <div class="portlet light bordered">
					<div class="portlet-title">
						<h3>Branch List</h3>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-header-fixed saving-list">
							<thead>
								<tr>
									<th>#</th>
									<th>Branch Name</th>
									<th>Branch Location</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>

                <!-- END BRANCH LIST SECTION-->

            <!-- END BRANCH TAB SECTION-->

			</div>
			<div class="tab-pane" id="portlet_tab1">
                <h1>Working........</h1>
			</div>
		</div>
	</div>
</div>
