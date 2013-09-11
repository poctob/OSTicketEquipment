<?php
require('staff.inc.php');
require_once INCLUDE_DIR.'class.equipment_install.php';

if($_REQUEST['install']=='1')
{
    $errors = array();
    $installer=new EquipmentInstaller();
    $installer->install($_POST);
    
    if(count($errors)>0)
    {
        print_r($errors);
    }
 else {
        echo 'Done';
    }
    
}
?>
