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


    function Installer() {
        $this->errors=array();
    }
    
    function install($vars) {

        $this->errors=$f=array();
        
        $f['prefix'] = array('type'=>'string',   'required'=>1, 'error'=>'Table prefix required');
  
         $sql='SELECT equipment.* FROM EQUIPMENT_TABLE';

        if (($res=db_query($sql)) && (db_num_rows($res))) 
        {
            $this->errors['err']='Looks like this plugin is already installed! Aborting!';
        }

        //bailout on errors.
        if($this->errors) return false;

        $schemaFile =INC_DIR.'upgrader/equipment/sql/install_equipment.sql'; //DB dump.

        //Last minute checks.
        if(!file_exists($schemaFile))
            $this->errors['err']='Internal Error - please make sure your download is the latest (#1)';        
        elseif(!$this->load_sql_file($schemaFile,$vars['prefix'], true, true))
            $this->errors['err']='Error parsing SQL schema! Get help from developers (#4)';                      

        if($this->errors) return false; //Abort on internal errors.
                    
        //Log a message.
        $msg="Congratulations pluginc installation completed!";
        return true;
    }
}
?>