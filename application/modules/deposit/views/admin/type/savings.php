<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
                <h3>Add Saving</h3>
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
								<div class="col-md-2">
									<input type="text" name="memberId" class="form-control" placeholder="Account NO." />
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
                                    <input class="date-picker form-control" name="savingDate" data-date-format="dd-mm-yyyy" placeholder="Date"
									readonly/>
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

		</div>
    </div>

    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg"><?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?></div>
    <div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg"><?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?></div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <h3>Saving List</h3>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-header-fixed saving-list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Member ID</th>
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
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>




