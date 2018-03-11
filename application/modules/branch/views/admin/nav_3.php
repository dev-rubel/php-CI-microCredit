<li class="nav-item <?php echo activeMenu('branch');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-home" aria-hidden="true"></i>
        <span class="title">Branch & Ward</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('branch','Branch');?>">
            <a href="<?php echo base_url('branch/branch_page');?>" class="nav-link ">
                <span class="title">Branch</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('branch','Ward');?>">
            <a href="<?php echo base_url('branch/ward_page');?>" class="nav-link ">
                <span class="title">Ward</span>
            </a>
        </li>
    </ul>
</li>