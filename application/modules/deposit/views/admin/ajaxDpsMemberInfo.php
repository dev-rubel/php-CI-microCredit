
<div class="panel panel-success">
	<div class="panel-heading">Register DPS Account</div>
	<div class="panel-body">
	<!-- id="createDpsAccount"  -->
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

			<div class="col-md-3">
				<select class="form-control" name="members_account_info*accOpenBranchID">
					<option value="">Select Branch</option>
					<option value="Banch 1">Banch 1</option>
					<option value="Banch 2">Banch 2</option>
					<option value="Banch 3">Banch 3</option>
				</select>
			</div>
			<div class="col-md-3">
				<select class="form-control" name="members_account_info*accOpenWardID">
					<option value="">Select Ward</option>
					<option value="Ward 1">Ward 1</option>
					<option value="Ward 2">Ward 2</option>
					<option value="Ward 3">Ward 3</option>
				</select>
			</div>
			<div class="col-md-3">
				<input type="number" name="members_introducer*introMemberID" class="form-control" placeholder="Reference/Inroducer Id">
			</div>
		</div>
		<!-- END LOCATION INFORMATION SECTION -->

		<!-- START ACCOUNTING INFORMATION SECTION -->
		<hr>
			<h3 class="section-title">Accounting (DPS)</h3>
		<hr>
		<div class="form-group">
			<div class="col-md-2">
				<select id="dpsTerm" class="form-control">
					<option value="">Select Term</option>
					<option value="3">3 Years</option>
					<option value="5">5 Years</option>
					<option value="10">10 Years</option>
				</select>
			</div>
			<div class="col-md-3">
				<input class="date-picker form-control" id="issueDate" name="members_account_info*accIssueDate" data-date-format="dd-mm-yyyy" placeholder="Issue Date" readonly/>
			</div>
			<div class="col-md-2">
				<input type="text" class="date-picker form-control" id="expireDate" name="members_account_info*accExpireDate" data-date-format="dd-mm-yyyy" placeholder="Expiry Date" readonly>
			</div>
			<div class="col-md-2">
				<select name="members_account_info*accAmount" class="form-control">
					<option value="">Select Amount</option>
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="300">300</option>
					<option value="500">500</option>
					<option value="1000">1000</option>
					<option value="1500">1500</option>
					<option value="2000">2000</option>
				</select>
			</div>
			<div class="col-md-2">
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

Date.prototype.ddmmyyyy = function() {
  var yyyy = this.getFullYear().toString();
  var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
  var dd  = this.getDate().toString();
  return (dd[1]?dd:"0"+dd[0]) + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + yyyy; // padding
};

$('#issueDate').on('change',function(){
	if(this.value) {
		var dpsTerm = $('#dpsTerm').val();
		if(dpsTerm) {
			var date = this.value.split("-");
			var date = new Date(date[2],date[1]-1,date[0]);
			date.setFullYear( date.getFullYear() + parseInt(dpsTerm) );

			$('#expireDate').val(date.ddmmyyyy());
		} else {
			$('#issueDate').val('');
			alert('Please Select Terms First');
		}

	}
});

/* CREATE DPS ACCOUNT */
$('#createDpsAccount').ajaxForm({
    success: function(data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            appendData('applyErrorMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html('');
        } else {
            appendData('applySuccessMsgDps',jData.msg);
            $('#memberDpsInformationHolder').html('');
        }
    }
});

</script>
