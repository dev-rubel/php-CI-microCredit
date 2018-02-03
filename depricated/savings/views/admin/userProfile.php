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
    .sweet-alert {
        z-index: 99999;
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