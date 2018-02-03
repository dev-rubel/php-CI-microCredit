<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Bordered Table</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-scrollable">


                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                        <thead>
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Member Name </th>
                            <th> Phone Number </th>
                            <th> P.Address </th>
                            <th> Join Date </th>
                            <th> Action </th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($userList as $user) { ?>
                        <tr class="gradeX odd" role="row">
                            <td> 1 </td>
                            <td> <?php echo $user->memName; ?> </td>
                            <td> <?php echo $user->memPhn; ?> </td>
                            <td> <?php echo $user->memPRaddrrs; ?> </td>
                            <td> <?php echo $user->memJnDate; ?> </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="<?php echo base_url('savings/userProfile/'.$user->memId);?>" data-target="#ajaxModalProfile" data-toggle="modal">
                                                <i class="icon-user"></i> Profile </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('savings/savingsFormAjax/'.$user->memId);?>" data-target="#ajaxModal" data-toggle="modal"><i class="icon-docs"></i> Deposit </a>
                                        </li>
                                        <li>
                                            <a class="clsCenterFrJs" href="<?php echo base_url('savings/userOverView/'.$user->memId);?>" data-target="#ajaxModal2" data-toggle="modal">
                                                <i class="icon-home"></i> Deposit Overview </a>
                                        </li>
<li>
                                            <a href="javascript:;">
                                                <i class="icon-tag"></i> New Comment </a>
                                        </li>

                                        <li class="divider"> </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="icon-flag"></i> Comments
                                                <span class="badge badge-success">4</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <span class="label label-sm label-warning"> Unpaid </span>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ajaxModal" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal Title</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url();?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                        <span> &nbsp;&nbsp;Loading... </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ajaxModalProfile" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal Title</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url();?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                        <span> &nbsp;&nbsp;Loading... </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ajaxModal2" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal Title</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url();?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                        <span> &nbsp;&nbsp;Loading... </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
