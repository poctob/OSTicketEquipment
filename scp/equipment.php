<?php
/*********************************************************************
    equipment.php
 
    Alex P <alexp@xpresstek.net>
    Copyright (c)  2013 XpressTek
    http://www.xpresstek.net

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
require('staff.inc.php');
require_once(INCLUDE_DIR.'class.equipment.php');
$category=null;
if($_REQUEST['cid'] && !($category=Equipment_Category::lookup($_REQUEST['cid'])))
    $errors['err']='Unknown or invalid equipment category';

$inc='equipment_lists.inc.php'; //Equipment landing page.
if($category && $_REQUEST['a']!='search') {
    $inc='equipment_list.inc.php';
}
$nav->setTabActive('equipment');
require_once(STAFFINC_DIR.'header.inc.php');
require_once(STAFFINC_DIR.$inc);
require_once(STAFFINC_DIR.'footer.inc.php');

?>
