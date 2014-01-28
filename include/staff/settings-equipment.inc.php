<?php
/*********************************************************************
    settings_categories.inc.php
 
    Alex P <alexp@xpresstek.net>
    Copyright (c)  2013 XpressTek
    http://www.xpresstek.net

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
if(!defined('OSTADMININC') || !$thisstaff || !$thisstaff->isAdmin() || !$config) die('Access Denied');
 

$equipment_installed=false;

$sql='SELECT is_installed FROM '.PLUGIN_TABLE
        .' WHERE name=\'equipment\'';

 if (!($res=db_query($sql)) || !db_num_rows($res)) 
 {
            $equipment_installed=false;
 }
 else
 {
     $t = db_fetch_array($res);
     if($t[is_installed]=='1')
     {
         $equipment_installed=true;
     }
 }


if(!$equipment_installed)
{
    ?>
<h2>Equipment Plugin Installer</h2>
<form action="equipment_install.php?install=1" method="post" id="save">
     <?php csrf_token(); ?>
     Enter database tables prefix:
     <input id="prefix" type="text" size="20" name="prefix" value="">
      &nbsp;<span class="error">*&nbsp;<?php echo $errors['prefix']; ?></span>
      <input id="submit" type="submit" value="Install Now!">
</form>
<?php
}
else
{
?>
<h2>Equipment Settings and Options</h2>
<form action="settings.php?t=equipment" method="post" id="save">
<?php csrf_token(); ?>
<input type="hidden" name="t" value="equipment" >
<table class="form_table settings_table" width="940" border="0" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th colspan="2">
                <h4>Equipment Settings</h4>
                <em>Disabling Equipment disables clients' interface.</em>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="180">Equipment status:</td>
            <td>
              <input type="checkbox" name="enable_equipment" value="1" <?php echo $config['enable_equipment']?'checked="checked"':''; ?>>
              Enable Equipment&nbsp;<em>(Staff backend interface)</em>
              &nbsp;<font class="error">&nbsp;<?php echo $errors['enable_equipment']; ?></font>
            </td>
        </tr>
        <tr>
            <td width="180">Equipment status, frontend:</td>
            <td>
              <input type="checkbox" name="enable_equipment_frontend" value="1" <?php echo $config['enable_equipment_frontend']?'checked="checked"':''; ?>>
              Enable Equipment Frontend&nbsp;<em>(User frontend interface)</em>
              &nbsp;<font class="error">&nbsp;<?php echo $errors['enable_equipment_frontend']; ?></font>
            </td>
        </tr>
    </tbody>
</table>
<p style="padding-left:210px;">
    <input class="button" type="submit" name="submit" value="Save Changes">
    <input class="button" type="reset" name="reset" value="Reset Changes">
</p>
</form>
<?php
}
?>