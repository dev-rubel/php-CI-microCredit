<li class="nav-item <?php echo activeMenu('categorys');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-snowflake-o"></i>
        <span class="title">Categorys</span>
        <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('categorys','Branch Category');?>">
            <a href="<?php echo base_url('categorys/branchCategory');?>" class="nav-link ">
                <span class="title">Branch</span>
            </a>
        </li>
    </ul>
</li>