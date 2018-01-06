<?php
/* CREATE CONSTENT */
function ci()
{
    $ci =& get_instance();
    return $ci;
}
/* START ---- DATA MANUPULATION AND DEBUGING FUNCTIONS */

function dbugd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function dbugc($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}    

function dbugv($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}


/* END ---- DATA MANUPULATION AND DEBUGING FUNCTIONS */    

/* RETURN USER TYPE BASE ON DATABASE VALUE */

function returnUserType($data)
{
    if($data == 1) {
        return 'admin';
    } elseif($data == 2) {
        return 'accountant';
    } elseif($data == 3) {
        return 'fofficer';
    } elseif($data == 4) {
        return 'member';
    } else {
        return false;
    }
}

function resize_file($w,$h,$folder,$file,$name)
{
    $config['image_library']  = 'gd2';
    $config['source_image']   = $file;
    $config['new_image']      = "./uploads/$folder/$name";
    $config['maintain_ratio'] = TRUE;
    $config['width']          = $w;
    $config['height']         = $h;
    ci()->load->library('image_lib', $config);
    ci()->image_lib->resize();
}

/* ACTIVE MENUE BASE ON CURRENT MODULE NAME AND SET METHOD */    

function activeMenu($data,$open='')
{
    if(isset($_SESSION['menuOpen'])){
        if($data == $_SESSION['menuOpen']) {
            if(!empty($open)) {
                if($_SESSION['menuActive'] == $open) {
                    return 'active';
                } else {
                    return '';
                }               
            } else {
                return 'active open';
            }
        } else {
            return '';
        }
    }
}

function preLoader($id)
{
    return '<img src="https://www.mnn.com/static/img/m-wait.gif" class="display-hide" id="'.$id.'" width="40px" height="40px">';
}

function select($val, $val2)
{
    if($val == $val2){
        echo "selected=selected";
    } else {
        echo '';
    }
}

function sideCollaps($niddle)
{
    $ci =& get_instance();
    $options = ['editMember','users'];
    $uri = $ci->uri->segment(2);
    if(empty($uri)){
        $uri = $ci->uri->segment(1);
    }    
    $check = in_array($uri, $options);
    if($check){
        if($niddle == 'body'){
            $var = 'page-sidebar-closed';
        } else {
            $var = 'page-sidebar-menu-closed';
        }
        return $var;
    }

    return '';    
}


?>