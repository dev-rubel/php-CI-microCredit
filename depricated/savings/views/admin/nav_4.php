<li class="nav-item <?php echo activeMenu('savings');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-address-book"></i>
        <span class="title">Savings</span>
        <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('savings','Add Savings');?>">
            <a href="<?php echo base_url('savings/userList');?>" class="nav-link ">
                <span class="title">Add Savings</span>
            </a>
        </li>
    </ul>
</li>