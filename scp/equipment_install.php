<?php
require('staff.inc.php');
require_once INCLUDE_DIR.'class.equipment_install.php';

if($_REQUEST['install']=='1')
{
    $installer=new EquipmentInstaller();
    $installer->install($_POST);
    echo 'Done';
    
}
?>