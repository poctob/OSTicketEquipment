<?php
/*********************************************************************
    ajax.equipment.php

    AJAX interface for equipment allowed methods.

    Alex P <alexp@xpresstek.net>
    Copyright (c)  2013 XpressTek
    http://www.xpresstek.net

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
if(!defined('INCLUDE_DIR')) die('!');

	    
class EquipmentAjaxAPI extends AjaxController {
    
    function equipment($id, $format='html') {
        global $thisstaff; //XXX: user ajax->getThisStaff()
        include_once(INCLUDE_DIR.'class.equipment.php');

        if(!($equipment=Equipment::lookup($id)))
            return null;

        //TODO: $fag->getJSON() for json format.
        $resp = sprintf(
                '<div style="width:650px;">
                 <strong>%s</strong><p>%s</p>
                 <div class="faded">Last updated %s</div>
                 <hr>
                 <a href="equipment.php?id=%d">View</a>',
                $equipment->getName(), 
                Format::safe_html($equipment->getStatus()),
                Format::db_daydatetime($equipment->getUpdateDate()),
                $equipment->getId());
        if($thisstaff && $thisstaff->canManageEquipment()) {
            $resp.=sprintf(' | <a href="equipment.php?id=%d&a=edit">Edit</a>',$equipment->getId());

        }
        $resp.='</div>';

        return $resp; 
    }
}
?>
