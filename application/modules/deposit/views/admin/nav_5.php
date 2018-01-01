<li class="nav-item <?php echo activeMenu('deposit');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-id-card" aria-hidden="true"></i>
        <span class="title">Deposit</span>
        <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('deposit','Savings');?>">
            <a href="<?php echo base_url('deposit');?>" class="nav-link ">
                <span class="title">Savings</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','TDR');?>">
            <a href="<?php echo base_url('deposit/deposit_tdr');?>" class="nav-link ">
                <span class="title">TDR</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','DPS');?>">
            <a href="<?php echo base_url('deposit/deposit_dps');?>" class="nav-link ">
                <span class="title">DPS</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','My Savings');?>">
            <a href="<?php echo base_url('deposit/deposit_msavings');?>" class="nav-link ">
                <span class="title">My Savings</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','SDF');?>">
            <a href="<?php echo base_url('deposit/deposit_sdf');?>" class="nav-link ">
                <span class="title">SDF</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','SSF');?>">
            <a href="<?php echo base_url('deposit/deposit_ssf');?>" class="nav-link ">
                <span class="title">SSF</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','MSF');?>">
            <a href="<?php echo base_url('deposit/deposit_msf');?>" class="nav-link ">
                <span class="title">MSF</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('deposit','LPSC');?>">
            <a href="<?php echo base_url('deposit/deposit_lpsc');?>" class="nav-link ">
                <span class="title">LPSC</span>
            </a>
        </li>
    </ul>
</li>