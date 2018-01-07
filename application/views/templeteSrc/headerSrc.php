<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url();?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url();?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url();?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url();?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico" />
<!-- END THEME LAYOUT STYLES -->



<div id="overlayDiv" style="width: 99%;height: 100%;background-color: white;position: absolute;top: 0;z-index: 1111; opacity: .7; display: none;"></div>
<img src="<?php echo base_url();?>assets/loader.gif" id="loading" style="position: absolute; top: 40%; left: 45%; z-index: 1111; display: none;"/>  
<img src="<?php echo base_url();?>assets/backend/loader.gif" id="loading2" style="position: absolute; top: 20%; left: 40%; z-index: 1111; display: none;"/>  

<!-- START----DYNAMIC GET CSS FILE FOR EACH USER -->
<?php
    /* $path = APPPATH.'modules/';
    $files = directory_map($path);
    $allModules = str_replace('\\','',array_keys($files));
    $code = '';
    foreach ($allModules as $key => $each) { */
        $path = APPPATH.'modules/'.$_SESSION['menuOpen'].'/views/'.$userType.'/src/cssComponent.php';                        
        if (is_file($path)) {
            include_once($path); 
        }                    
    //}
?>
<!-- END----DYNAMIC GET CSS FILE FOR EACH USER -->