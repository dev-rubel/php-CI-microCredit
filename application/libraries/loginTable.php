<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LoginTable {

    protected $ci;
    protected $attRename = false;

    public function __construct($params)
    {
        /* LOAD INSTANCE AND DBFOREGE */
        $this->ci =& get_instance();    
        $this->ci->load->dbforge();
        
        /* DROP TABLE FOR SEED AGAING THIS TABLE */
        $uriTable = $this->ci->uri->segment(3);
        if(!empty($uriTable))
        {
            $this->down($uriTable);
        }

        /* LIST OF ALL DB TABLES */
        $dbTables = $this->ci->db->list_tables(); 
        
        /* IF TABLE FILE DELETE FROM PROJECT THEN IT WILL ALSO DELETE SAME DB TABLE */
        if(!empty($dbTables))
        {
            $projectDbTables = array_keys($params);
            //dbugd($projectDbTables);
            foreach ($dbTables as $key => $dbTableCol) 
            {
                if(in_array($dbTableCol, $projectDbTables) == false)
                {
                    $this->down($dbTableCol);
                }
            }            
        }

        
        /* START LOOF FOR EVERY TABLE ACTION */
        foreach ($params as $tableName => $columnAndSeeds):
            
            /* STORE INPUT DATA */
            $table  = $tableName;
            $column = $columnAndSeeds[0];
            $seeds  = $columnAndSeeds[1];                    
                    
            /* LIST OF TABLE ATTRIBUTES */
            /* EXPLOAD INPUT ATTBUTE NAME AND TYPE */
            $eachValue = [];
            foreach($column as $k=>$each)
            {
                $eachV = explode('-',$each);
                $eachValue[] = $eachV[0];
                /* IF ANY TABLE TYPE NOT FOUND */
                if(empty($eachV[1]))
                {                   
                    $this->wrongAttribute($table);                    
                }
                if($eachV[0] !== !empty($tableAtt[$k]))
                {
                    $this->attRename = true;
                }
            }       
            
            /* CHECK TABLE EXISTS */
            $check = $this->ci->db->table_exists($table);
            
            if(!$check)
            {
                /* WHEN TABLE NOT FOUND */
                foreach($column as $k=>$each)
                {
                    $eachV = explode('-',$each);
                    $this->up($eachV[0],$eachV[1],$table);
                }
                $this->ci->dbforge->create_table($table);
                
                /* SEEDS DATA TO TABLE */
                if(!empty($seeds))
                {
                    $this->seedTable($seeds,$eachValue,$table);
                }
            } else {
                /* WHEN TABLE FOUND */         
                $tableAtt = $this->ci->db->list_fields($table);      

                /* FOR DROP DATABASE ATTRUBUTE */
                if(count($tableAtt) > count($eachValue))
                {
                    foreach($tableAtt as $k=>$each){
                        $checkEx = in_array($each,$eachValue);
                        if(!$checkEx){
                            $this->dropColumn($each, $table);
                        }
                    }  
                } else {
                    /* FOR ALTER ATTRBUTE */
                    if(count($eachValue) > count($tableAtt))
                    {
                        foreach($column as $k=>$each)
                        {
                            $dbAttributes = explode('-',$each);
                            $combineArray = array_combine($tableAtt,$tableAtt);
                            
                            if(empty($combineArray[$dbAttributes[0]]))
                            {   
                                $keysss = array_keys($eachValue, $dbAttributes[0]);  
                                $keys = $keysss[0] - 1;
                                if($keys > 0)
                                {
                                    $previousColumn = explode('-', $tableAtt[$keys]);
                                    $this->columnAfter($dbAttributes[0],$dbAttributes[1],$table,$previousColumn[0]);                            
                                } else {
                                    $this->columnAfterFirst($dbAttributes[0],$dbAttributes[1],$table);                            
                                }   
                            }
                        } 
                    } 
                }

                
                /* FOR MODIFY ATTRBUTE */
                if(count($tableAtt) == count($eachValue) && $this->attRename == true) 
                {
                    //dbugd($eachValue);
                    foreach($column as $k=>$each) 
                    {                    
                        $dbAttributes = explode('-',$each);                    
                        /* MODIFY ATTRUBUTE */  
                        $this->columnModify($dbAttributes[0].'s',$dbAttributes[1],$table,$tableAtt[$k]);                                                                             
                    }
                        
                    foreach($column as $k=>$each) 
                    {
                        $dbAttributes = explode('-',$each);
                        $this->columnModify($dbAttributes[0],$dbAttributes[1],$table,$dbAttributes[0].'s');   
                    } 
                }             
            } 
        endforeach;             
    }


    /* ================= FUNCTIONS AREA ================== */

    /* EXIT SCRIPT WHEN FOUND WRONG ATTRIBUTE IN FILE */
    public function wrongAttribute($table) 
    {
        echo '<div style="border: 2px solid #383337; width: 700px; margin: 100px auto; padding: 10px; line-height: 0.7; text-align: center;">';
        echo '<img src="http://www.nihalit.com/src/home/images/logo.png" />';
        echo '<h1 style="color: #0070C6;">Error</h1>';
        echo '<h1 style="color: #0070C6;">Please Check 
        <span style="color: red;">'.$table.'</span>
        Table All Attributes.  </h1>';
        echo '</div>';
        die();
    }

    /* SEED TABLE */
    public function seedTable($seeds,$eachValue,$table) 
    {
        $replace = [" ","'","(","),",");"];
        foreach($seeds as $seedKey=>$eachSeedRow)
        {
            $exploadSeedRow[$seedKey] = explode(',',str_replace($replace,'',$eachSeedRow));
            foreach($exploadSeedRow[$seedKey] as $exploadSeedRowKey=>$exploadSeedRowValue)
            {
                $eachRowValue[$eachValue[$exploadSeedRowKey]] = $exploadSeedRowValue; 
                $newExploadSeedRow[$seedKey][$eachValue[$exploadSeedRowKey]] = $eachRowValue[$eachValue[$exploadSeedRowKey]];
            }                  
        }
        $this->ci->db->insert_batch($table, $newExploadSeedRow);
    }

    /* CREATE NEW TABLE AND ATTBUTES */
    public function up($param,$k,$table)
    {       
        $this->ci->dbforge->add_field(array(
            $param => $this->attributeType($k)
            
        ));
        if($k == 'in')
        {
            $this->ci->dbforge->add_key($param, TRUE);
        }        
    }   

    /* ALL ATTRUBUTES TYPES */
    public function attributeType($type)
    {
        if($type == 'in')
        {
            $var = array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE                
            );
        } elseif($type == 'i') {
            $var = array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,          
            );
        } elseif($type == 'v') {
            $var = array(
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => FALSE
            );
        } elseif($type == 't') {
            $var = array(
                'type' => 'TEXT',
                'null' => FALSE
            );
        }
        return $var;
    }
    
    /* ADD COLUMN AFTER PREVIOUS COLUMN */
    public function columnAfter($param,$k,$table,$column)
    {
        $attType = $this->attributeType($k);
        $createAtt = array_merge($attType, ['after' => $column]);
        $fields = array(
            $param => $createAtt
        );
        $this->ci->dbforge->add_column($table, $fields);
    }
    
    /* SET NEW COLUMN SERIAL FIRST IN TABLE */
    public function columnAfterFirst($param,$k,$table)
    {
        $attType = $this->attributeType($k);
        $createAtt = array_merge($attType, ['first' => TRUE]);
        $fields = array(
            $param => $createAtt
        );
        $this->ci->dbforge->add_column($table, $fields);
    }

    /* FOR TABLE COLUMN MODIFY */
    public function columnModify($param,$k,$table,$oldCol)
    {
        $attType = $this->attributeType($k);
        $createAtt = array_merge(['name' => $param], $attType);
        $fields = array(
            $oldCol => $createAtt
        );
        $this->ci->dbforge->modify_column($table, $fields);
    }

    /* FOR DROP COLUMN */
    public function dropColumn($param,$table)
    {
        $this->ci->dbforge->drop_column($table, $param);
    }

    /* FOR DROP TABLE */
    public function down($table)
    {
        $this->ci->dbforge->drop_table($table);
    }

    

}