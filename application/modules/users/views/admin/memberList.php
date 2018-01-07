<div class="row">
<div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <br>
    <div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg"><?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?></div>
    <div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg"><?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?></div>
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
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


