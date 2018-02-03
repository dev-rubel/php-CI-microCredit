<style>
    .profile-usertitle-name {
        color: #5a7391;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 7px;
    }

</style>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="portlet light profile-sidebar-portlet ">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
                <img class="img-responsive"
                     src="<?php echo base_url(); ?>uploads/members/member<?php echo $memId; ?>.jpg"/>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    <?php echo $memName; ?>
                </div>
                <div class="profile-usertitle-job">  <?php echo $memPRaddrrs ?>  </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <button type="button" class="btn btn-circle green btn-sm"><?php echo $acType ?></button>
                <button type="button" class="btn btn-circle red btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="active">
                        <a class="clsRightFrJs" href="<?php echo base_url('savings/userOverView/'.$memId);?>" data-target="#ajaxModal2" data-toggle="modal">
                            <i class="icon-home"></i> Overview </a>
                    </li>
                    <li>
                        <a href="page_user_profile_1_account.html">
                            <i class="icon-settings"></i> <?php echo $memEmail; ?>  </a>
                    </li>
                    <li>
                        <a href="page_user_profile_1_help.html">
                            <i class="icon-info"></i> <?php echo $memJnDate ?> </a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green">
                    <i class="icon-pin font-green"></i>
                    <span class="caption-subject bold uppercase"> Savings Form</span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" action="<?php echo base_url('savings/savingsData'); ?>" method="post">
                    <input type="hidden" name="memberId" value="<?php echo $memId ?>">

                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="depositDate" type="text" class="date date-picker form-control"
                                   data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="form_control_0" readonly>
                            <span class="input-group-btn">
                                <button style="display: none" class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                            <label for="form_control_0">Deposit Date</label>
                            <span class="help-block">e.g: 2017-12-19</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input name="dpAmount" type="text" class="form-control" id="form_control_1">
                            <label for="form_control_1">Deposit Amount</label>
                            <span class="help-block">e.g: 500</span>
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/tanvir/malsup/jquery.form.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        // bind 'myForm' and provide a simple callback function
        $('[action="<?php echo base_url('savings/savingsData'); ?>"]').ajaxForm(function() {
            swal("Good job!", "Save update", "success");
        });

    });
</script>
