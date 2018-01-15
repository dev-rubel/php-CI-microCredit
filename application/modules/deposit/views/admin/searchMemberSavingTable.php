<?php
	//print_r($singleMemberSavings);
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption text-right">
			Member Name: Name | Member ID: 22
		</div>
	</div>
	<div class="portlet-body">

		<div class="panel-group accordion" id="accordion3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
						2017 </a>
					</h4>
				</div>
				<div id="collapse_3_1" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>SL</th>
									<th>Date</th>
									<th>Dr</th>
									<th>Cr</th>
									<th>Balance</th>
									<th>Product</th>
									<th>Interest</th>
								</tr>
							</thead>
							<tbody>

							<?php foreach($singleMemberSavings as $k=> $each):?>
								<tr>
									<td><?php echo $k+1;?></td>
									<td><?php echo $each['savingDate'];?></td>
									<td><?php echo $each['dr_cr']=='DR'?$each['savingAmount']:'';?></td>
									<td><?php echo $each['dr_cr']=='CR'?$each['savingAmount']:'';?></td>
									<td><?php echo 'balance';?></td>
									<td><?php echo 'product';?></td>
									<td><?php echo 'interest';?></td>
								</tr>
							<?php endforeach;?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		
		
			
		</div>

	</div>
</div>