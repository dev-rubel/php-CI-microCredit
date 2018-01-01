<li class="nav-item <?php echo activeMenu('loan');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-leanpub" aria-hidden="true"></i>
        <span class="title">loan</span>
        <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('loan','Microcredit');?>">
            <a href="<?php echo base_url('loan');?>" class="nav-link ">
                <span class="title">Microcredit</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Consumer');?>">
            <a href="<?php echo base_url('loan/loan_consumer');?>" class="nav-link ">
                <span class="title">Consumer</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','SOD');?>">
            <a href="<?php echo base_url('loan/loan_sod');?>" class="nav-link ">
                <span class="title">SOD</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','CCH');?>">
            <a href="<?php echo base_url('loan/loan_cch');?>" class="nav-link ">
                <span class="title">CCH</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Short Loan');?>">
            <a href="<?php echo base_url('loan/loan_short');?>" class="nav-link ">
                <span class="title">Short Loan</span>
            </a>
        </li>
    </ul>
</li>