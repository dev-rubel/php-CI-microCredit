<li class="nav-item <?php echo activeMenu('loan');?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-leanpub" aria-hidden="true"></i>
        <span class="title">loan</span>
        <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
        <li class="nav-item <?php echo activeMenu('loan','Loan1');?>">
            <a href="<?php echo base_url('loan');?>" class="nav-link ">
                <span class="title">Loan1</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Loan2');?>">
            <a href="<?php echo base_url('loan/loan2');?>" class="nav-link ">
                <span class="title">Loan2</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Loan3');?>">
            <a href="<?php echo base_url('loan/loan3');?>" class="nav-link ">
                <span class="title">Loan3</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Loan4');?>">
            <a href="<?php echo base_url('loan/loan4');?>" class="nav-link ">
                <span class="title">Loan4</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Loan5');?>">
            <a href="<?php echo base_url('loan/loan5');?>" class="nav-link ">
                <span class="title">Loan5</span>
            </a>
        </li>
        <li class="nav-item <?php echo activeMenu('loan','Loan6');?>">
            <a href="<?php echo base_url('loan/loan6');?>" class="nav-link ">
                <span class="title">Loan6</span>
            </a>
        </li>
    </ul>
</li>