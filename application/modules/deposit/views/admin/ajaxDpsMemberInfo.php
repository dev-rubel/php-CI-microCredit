
<div class="panel panel-success">
	<div class="panel-heading">Register DPS Account</div>
	<div class="panel-body">
	<form id="createDpsAccount" action="<?php echo base_url('deposit/createDpsAccount/').$memberId;?>" method="post" class="form-horizontal validateForm">
		<div class="form-body">
		<!-- START LOCATION INFORMATION SECTION -->
		<hr>
			<h3 class="section-title">Location Information</h3>
		<hr>
		<div class="form-group">
			<label class="control-label col-md-2">Branch & Word
				<span class="required"> * </span>
			</label>

			<div class="col-md-5">
				<select class="form-control" name="members_account_info*accOpenBranchID">
					<option value="">Select Branch</option>
					<option value="Banch 1">Banch 1</option>
					<option value="Banch 2">Banch 2</option>
					<option value="Banch 3">Banch 3</option>
				</select>
			</div>
			<div class="col-md-4">
				<select class="form-control" name="members_account_info*accOpenWardID">
					<option value="">Select Ward</option>
					<option value="Ward 1">Ward 1</option>
					<option value="Ward 2">Ward 2</option>
					<option value="Ward 3">Ward 3</option>
				</select>
			</div>
		</div>
		<!-- END LOCATION INFORMATION SECTION -->

		<!-- START ACCOUNTING INFORMATION SECTION -->
		<hr>
			<h3 class="section-title">Accounting (DPS)</h3>
		<hr>
		<div class="form-group">
			<div class="col-md-3">
				<input class="date-picker form-control" name="members_account_info*accIssueDate" data-date-format="dd-mm-yyyy" placeholder="Issue Date" readonly/>
			</div>
			<div class="col-md-3">
				<input type="number" class="form-control" name="members_account_info*accAmount" placeholder="Amount">
			</div>
			<div class="col-md-3">
				<input type="text" class="date-picker form-control" name="members_account_info*accExpireDate" data-date-format="dd-mm-yyyy" placeholder="Expiry Date" readonly>
			</div>
			<div class="col-md-3">
			<input type="text" class="form-control" name="members_account_info*accProfitRate" placeholder="Profit Rate %">
			</div>
		</div>
		
		<!-- END ACCOUNTING INFORMATION SECTION -->

		<!-- START ACCOUNTING INSTRUCTION INFORMATION SECTION -->
		<hr>
		<h3 class="section-title">Accounting Information (If Any)</h3>
		<hr>
		<div class="form-group">
			<div class="col-md-12">
				<textarea class="form-control" name="members_account_info*accInformation" rows="10" placeholder="Accounting Information"></textarea>
			</div>
		</div>
		<!-- END ACCOUNTING INSTRUCTION INFORMATION SECTION -->
		<div class="form-group text-center">
			<button type="submit" class="btn btn-info">Submit</button>
		</div>

	</div>
	</form>

	</div>
</div>

<script>

/* CREATE DPS ACCOUNT */
$('#createDpsAccount').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('errorMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html('');
        } else {
            appendData('successMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html('');
        }
    }
});

</script>
