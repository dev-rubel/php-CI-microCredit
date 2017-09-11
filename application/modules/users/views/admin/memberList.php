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
                        <th>IMG</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Present Add.</th>
                        <th>Parmanent Add.</th>
                        <th>Acc. Type</th>
                        <th>FO</th>
                        <th>Join date</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($memberList as $each): ?>
                    <tr id="rowId-<?php echo $each['memId']; ?>">
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders fa-2x" aria-hidden="true"></i>
                                    <i class="fa fa-angle-down fa-2x"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="memberView('<?php echo base_url('users/viewMember/').$each['memId'];?>')"><i class="fa fa-eye" aria-hidden="true"></i> View</a> 
                                    </li>
                                    <li>
                                        <a class="" href="<?php echo base_url('users/viewMember/').$each['memId'];?>" data-target="#ajax" data-toggle="modal"> View Demo </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('users/editMember/').$each['memId'];?>" id="collapsSide"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
                                    </li>
                                    <li>
                                        <a href="#" class="confirmation_but" data-popout="true" data-singleton="true" data-placement="left" data-id="<?php echo $each['memId'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </td>
                        <td><img src="<?php echo base_url('uploads/members/member').$each['memId'].'.jpg'; ?>" alt="" width="50px" height="50px"></td>
                        <td><?php echo $each['memName']; ?></td>
                        <td><?php echo $each['memPhn']; ?></td>
                        <td><?php echo $each['memPRaddrrs']; ?></td>
                        <td><?php echo $each['memPEaddrrs']; ?></td>
                        <td><?php echo $each['acType']; ?></td>
                        <td><?php echo $each['memFO']; ?></td>
                        <td><?php echo $each['memJnDate']; ?></td>
                        
                        
                            
                    </tr>       
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


