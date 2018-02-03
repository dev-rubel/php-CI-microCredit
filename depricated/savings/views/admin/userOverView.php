
<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-dark"></i>
            <span class="caption-subject font-dark bold uppercase">User Overview Table</span>
        </div>

    </div>
    <div class="portlet-body">
        <div class="table-scrollable">


            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                <thead>
                <thead>
                <tr>
                    <th> # </th>
                    <th> Amount </th>
                    <th> DepositDate </th>
                    <th> Action </th>
                    <th> Status </th>
                </tr>
                </thead>
                </thead>
                <tbody>
                <?php
                foreach ($userOverView as $singleOverView) { ?>
                    <tr class="gradeX odd" role="row">
                        <td> 1 </td>
                        <td class="editable"> <?php echo $singleOverView->dpAmount; ?> </td>
                        <td class="editable datePickerTd"> <?php echo $singleOverView->depositDate; ?> </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a myAction="editable" class="editable" myId="<?php echo $singleOverView->id; ?>" data-target="" data-toggle="modal" href="#editSavingDataModal"><i class="icon-docs"></i> Edit </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" myAction="delete" myTable="savings" myUrl="<?php echo base_url('savings/deleteSaving/'. $singleOverView->id) ?>">
                                            <i class="icon-tag"></i> Delete </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-user"></i> New User </a>
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
                            <span class="label label-sm label-warning"> Suspended </span>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td><b>Total</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><b><?php echo $dpAmountSum->dpAmount ?> TK</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="editSavingDataModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
                <form id="updateSavingsData" action="" method="post">
                <table>
                    <tr>
                        <td>Amount</td>
                        <td><input type="hidden" name="id">
                            <input class="form-control" type="text" name="dpAmount">
                        </td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td><input name="depositDate" class="date date-picker form-control"
                                   data-date-format="yyyy-mm-dd" data-date-viewmode="years" readonly></td>
                    </tr>
                </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button id="" myAction="editable" type="button" class="saveSavingData btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $(document).ready(function() {
        $(document).on('click', 'a.editable', function (){
            $('[name="id"]').val(editableData[0].trim());
            $('[name="dpAmount"]').val(editableData[1].trim());
            $('[name="depositDate"]').val(editableData[2].trim());
            editableData = [];
        });
        $(document).on('click', '.saveSavingData', function (){
            $('#updateSavingsData').ajaxSubmit({
                url: "<?php echo base_url('savings/updateSavingsData/') ?>",
                success: function () {
                    swal("Good job!", "Successfully Update Data", "success");
                }
            });
        });

    });
</script>
