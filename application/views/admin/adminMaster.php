<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<base url="<?php echo base_url();?>" />
		<meta charset="utf-8" />
		<title><?php echo !empty($title)?$title:'Title';?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Micro-Credit" name="description" />
		<meta content="Nihal IT" name="author" />
		<?php echo $adminHeaderSrc; ?>
		<!-- END HEAD -->
		<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
			<div class="page-wrapper">
				<!-- BEGIN HEADER -->
				<?php echo $adminHeader; ?>
				<!-- END HEADER -->
				<!-- BEGIN HEADER & CONTENT DIVIDER -->
				<div class="clearfix"> </div>
				<!-- END HEADER & CONTENT DIVIDER -->
				<!-- BEGIN CONTAINER -->
				<div class="page-container">
					<!-- BEGIN SIDEBAR -->
					<?php echo $adminSidebar; ?>
					<!-- END SIDEBAR -->
					<!-- BEGIN CONTENT -->
					<div class="page-content-wrapper">
						<!-- BEGIN CONTENT BODY -->
						<div class="page-content">
							<!-- BEGIN PAGE HEADER-->
							
							<!-- BEGIN PAGE BAR -->
							<div class="page-bar">
								<ul class="page-breadcrumb">
									<li>
										<a href="index.html">Home</a>
										<i class="fa fa-circle"></i>
									</li>
									<li>
										<span>Dashboard</span>
									</li>
								</ul>
								<div class="page-toolbar">
									<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
										<i class="icon-calendar"></i>&nbsp;
										<span class="thin uppercase hidden-xs"></span>&nbsp;
										<i class="fa fa-angle-down"></i>
									</div>
								</div>
							</div>
							<!-- END PAGE BAR -->
							<?php echo $allContents; ?>
							
						</div>
						<!-- END CONTENT BODY -->
					</div>
					<!-- END CONTENT -->
				</div>
				<!-- END CONTAINER -->
				<!-- BEGIN FOOTER -->
				<?php echo $adminFooter; ?>
				<!-- END FOOTER -->
			</div>
			
			<!--[if lt IE 9]>
			<script src="assets/global/plugins/respond.min.js"></script>
			<script src="assets/global/plugins/excanvas.min.js"></script>
			<script src="assets/global/plugins/ie8.fix.min.js"></script>
			<![endif]-->
			<?php echo $adminFooterSrc; ?>
		</body>
	</html>