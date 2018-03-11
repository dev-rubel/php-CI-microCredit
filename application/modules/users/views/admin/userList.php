<div class="row">
<div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <br>
    <div class="alert alert-danger <?php echo !empty($_SESSION['error'])?'':'display-hide'; ?>" id="errorMsg"><?php echo !empty($_SESSION['error'])?$_SESSION['error']:''; ?></div>
    <div class="alert alert-success <?php echo !empty($_SESSION['success'])?'':'display-hide'; ?>" id="successMsg"><?php echo !empty($_SESSION['success'])?$_SESSION['success']:''; ?></div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Acc. Create Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($userList as $each): ?>
                    <tr id="rowId-<?php echo $each['id']; ?>">
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders" aria-hidden="true"></i>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="#" href="<?php echo base_url('users/viewUser/').$each['id'];?>" data-target="#ajax" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('users/editUser/').$each['id'];?>" id="collapsSide"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
                                    </li>
                                    <li>
                                        <a href="#" class="confirmation_but" data-popout="true" data-singleton="true" data-placement="left" data-id="<?php echo $each['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </td>                        
                        <td><?php echo $each['name']; ?></td>
                        <td><?php echo $each['email']; ?></td>
                        <td>
                            <?php if($each['userType'] == 1):
                                    echo 'Admin';
                                elseif($each['userType'] == 2):
                                    echo 'Accountant';
                                elseif($each['userType'] == 3):
                                    echo 'Fild Officer';
                                endif;?>
                        </td>
                        <td><?php echo $each['dateTime']; ?></td>                      
                        
                    </tr>       
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


