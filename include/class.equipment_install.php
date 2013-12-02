<?php
/*********************************************************************
    class.equipment_install.php

    Equipment extension Intaller - installs the latest version.

    Copyright (c)  2006-2013 XpressTek
    http://www.xpresstek.net

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
require_once 'class.setup.php';

class EquipmentInstaller extends SetupWizard {

    private $error;
    function Installer() {
	$this->error='';
    }
    
    function install($vars) {
  
        $sql='SELECT equipment.* FROM '.EQUIPMENT_TABLE;
        

        if (($res=db_query($sql)) && (db_num_rows($res))) 
        {
            $this->error='Looks like this plugin is already installed! Aborting!';
	    return false;
        }
	
        
        $schemaFile =INCLUDE_DIR.'upgrader/equipment/sql/install_equipment.sql'; //DB dump.
	
        
        //Last minute checks.
        if(!file_exists($schemaFile))
	{
	    echo '<br />';
	    var_dump($schemaFile);
	    echo '<br />';    
            echo 'File Access Error - please make sure your download is the latest (#1)';  
            echo '<br />'; 
	    $this->error='File Access Error!';       
	    
	}	
        elseif(!$this->load_sql_file($schemaFile,$vars['prefix'], true, true))
	{
            echo '<br />';
            echo 'Error parsing SQL schema! Get help from developers (#4)';     
	    $this->error='DB Error!';       
	    echo '<br />';          
	}

        if( (strlen($this->error))>0)
	{
		return false; //Abort on internal errors.
	}
	else
	{                
	        echo 'Congratulations plugin installation completed!';
        	return true;
	}
    }
}
?>