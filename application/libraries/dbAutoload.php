<?php defined('BASEPATH') OR exit('No direct script access allowed');
require BASEPATH."helpers/directory_helper".EXT;

class DbAutoload {

    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance(); /* CI CREATE INSTANCE */

        /* GET ALL DBtABLES FILES */
        $libraries = directory_map(APPPATH."libraries/dbTables", TRUE);
        foreach($libraries as $library)
		{			
            if($library !== 'index.html' && $library !== 'index.php' && ! is_array($library)) 
            {		
                $files['libraries'][] = strtolower($library);
                $dbFiles[] = pathinfo(strtolower($library), PATHINFO_FILENAME);
			}
        }

        foreach($files['libraries'] as $each) 
        {
            $path = APPPATH."libraries/dbTables/".$each;
            $fileContents[] = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } 

        /* GET ALL DATABASE TABLES */
        $dbTables = $this->ci->db->list_tables();
        /* GET DIFFENENCE BITWEEN DATABASE TABLE AND FILES TABLE */
        $tableDifferent = array_diff($dbFiles, $dbTables);

        /* IF UPDATE URL VALID */
        $validUri = $this->ci->uri->segment(2);        
                
        //dbugd($uriTable);
        if ($validUri == 'system-update')
        {
            //$output = array_slice($fileContents[0], 2);
            
            foreach ($fileContents as $key => $value) 
            {            
                $seed = array_slice($value, 2);
                $fileAttribute[$value[0]] = [explode(',',$value[1]), $seed];            
            }                       

            //dbugd($attribute);
            //unset($attribute['login']);
            $this->ci->load->library('logintable', $fileAttribute);
            /* SHOW MESSAGE COMPLETE UPDATE PROCESS */            
            $this->ci->load->view('systemupdatemessages/systemUpdateSuccess');                       
                       
        } else {
            /* STOP SCRIPT WHEN NEED UPDATE */           
            // dbugd($attributeDiff);
            if(!empty($tableDifferent)) 
            {   
                $this->ci->load->view('systemupdatemessages/systemUpdateNeed');  
            } else {
                 /* dbTables ALL TABLE ATTRIBUTES NAME AND TYPES */
                foreach ($fileContents as $k => $value) 
                {            
                    $fileAttribute = explode(',',$value[1]); 
                    $tableAtt = $this->ci->db->field_data($value[0]); 
                    $dbAttribute = [];
                    foreach($tableAtt as $key => $each) {
                        $dbAttribute[] = $this->returnColNameType($each);  
                    } 
                    $attributeDiff[$k] = array_diff($dbAttribute, $fileAttribute); 
                    if( empty($attributeDiff[$k]) ){
                        $attributeDiff[$k] = array_diff($fileAttribute, $dbAttribute);
                    }        
                }               
                $checkAttOrNameChange = array_filter($attributeDiff);
                if(!empty($checkAttOrNameChange)){
                    $this->ci->load->view('systemupdatemessages/systemUpdateNeed');  
                }
            }            
        }
    }

    public function returnColNameType($attribute) 
    {
        if($attribute->type == 'int' && $attribute->primary_key == 1) {
            $type = $attribute->name.'-in';
        } elseif($attribute->type == 'int' && $attribute->primary_key == 0) {
            $type = $attribute->name.'-i';
        } elseif($attribute->type == 'varchar') {
            $type = $attribute->name.'-v';
        } elseif($attribute->type == 'text') {
            $type = $attribute->name.'-t';
        }
        return $type;
    }

}
