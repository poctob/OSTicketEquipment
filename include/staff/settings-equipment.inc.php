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
              Enable Equipment&nbsp;<em>(Client interface)</em>
              &nbsp;<font class="error">&nbsp;<?php echo $errors['enable_equipment']; ?></font>
            </td>
        </tr>
    </tbody>
</table>
<p style="padding-left:210px;">
    <input class="button" type="submit" name="submit" value="Save Changes">
    <input class="button" type="reset" name="reset" value="Reset Changes">
</p>
</form>
