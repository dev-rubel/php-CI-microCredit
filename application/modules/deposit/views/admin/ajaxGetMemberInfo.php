<?php if(!empty($memberInformation[0])): extract($memberInformation[0]);?>
	<div class="panel panel-success">
		<div class="panel-heading">Member Information</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Present Address</th>
					<th>Parmanent Address</th>
					<th>NID</th>
					<th>Join Date</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $memberName; ?></td>
						<td><?php echo $memberDOB; ?></td>
						<td><?php echo $memberPEaddrrs; ?></td>
						<td><?php echo $memberPRaddrrs; ?></td>
						<td><?php echo $memberNID; ?></td>
						<td><?php echo date('d-m-y',$createDate); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<?php else:?>
<div class="panel panel-danger">
	<div class="panel-heading">Member Information</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<th>Name</th>
				<th>Date of Birth</th>
				<th>Present Address</th>
				<th>Parmanent Address</th>
				<th>NID</th>
				<th>Join Date</th>
			</thead>
			<tbody>
				<tr>
					<td colspan="6">No Member Found</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php endif;?>
