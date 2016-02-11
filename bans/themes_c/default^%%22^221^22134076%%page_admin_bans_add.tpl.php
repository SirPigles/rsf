<?php /* Smarty version 2.6.29, created on 2016-01-10 09:07:53
         compiled from page_admin_bans_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'help_icon', 'page_admin_bans_add.tpl', 18, false),array('function', 'sb_button', 'page_admin_bans_add.tpl', 176, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_addban']): ?>
  Access Denied!
<?php else: ?>
  <div id="msg-green" style="display:none;">
    <i><img src="./images/yay.png" alt="Success" /></i>
    <b>Ban Added</b><br />
    The new ban has been added to the system.<br /><br />
    <i>Redirecting back to bans page</i>
  </div>
  
  <div id="add-group1">
    <h3>Add Ban</h3>
    For more information or help regarding a certain subject move your mouse over the question mark.<br /><br />
    <table width="90%" style="border-collapse:collapse;" id="group.details" cellpadding="3">
    <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'Nickname','message' => "Type the nickname of the person that you are banning."), $this);?>
Nickname 
          </div>
        </td>
        <td>
          <div align="left">
            <input type="hidden" id="fromsub" value="" />
              <input type="text" TABINDEX=1 class="textbox" id="nickname" name="nickname" style="width: 169px" />
          </div>
          <div id="nick.msg" class="badentry"></div>
        </td>
      </tr>
      <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'Ban Type','message' => "Choose whether to ban by Steam ID or IP address."), $this);?>
Ban Type 
          </div>
        </td>
        <td>
          <div align="left">
            <select id="type" name="type" TABINDEX=2 class="select" style="width: 196px">
              <option value="0">Steam ID</option>
              <option value="1">IP Address</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => "Steam ID / Community ID",'message' => "The Steam ID or Community ID of the person to ban."), $this);?>
Steam ID / Community ID
          </div>
        </td>
        <td>
          <div align="left">
            <input type="text" TABINDEX=3 class="textbox" id="steam" name="steam" style="width: 169px" />
          </div>
          <div id="steam.msg" class="badentry"></div>
        </td>
      </tr>
      <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'IP Address','message' => "Type the IP address of the person you want to ban."), $this);?>
IP Address 
          </div>
        </td>
        <td>
          <div align="left">
            <input type="text" TABINDEX=3 class="textbox" id="ip" name="ip" style="width: 169px" />
          </div>
          <div id="ip.msg" class="badentry"></div>
        </td>
      </tr>
      <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'Ban Reason','message' => "Explain in detail, why this ban is being made."), $this);?>
Ban Reason 
          </div>
        </td>
        <td>
          <div align="left">
            <select id="listReason" name="listReason" TABINDEX=4 class="select" onChange="changeReason(this[this.selectedIndex].value);">
              <option value="" selected> -- Select Reason -- </option>
          <optgroup label="Hacking">
            <option value="Aimbot">Aimbot</option>
            <option value="Antirecoil">Antirecoil</option>
            <option value="Wallhack">Wallhack</option>
            <option value="Spinhack">Spinhack</option>
            <option value="Multi-Hack">Multi-Hack</option>
            <option value="No Smoke">No Smoke</option>
            <option value="No Flash">No Flash</option>
          </optgroup>
          <optgroup label="Behavior">
            <option value="Team Killing">Team Killing</option>
            <option value="Team Flashing">Team Flashing</option>
            <option value="Spamming Mic/Chat">Spamming Mic/Chat</option>
            <option value="Inappropriate Spray">Inappropriate Spray</option>
            <option value="Inappropriate Language">Inappropriate Language</option>
            <option value="Inappropriate Name">Inappropriate Name</option>
            <option value="Ignoring Admins">Ignoring Admins</option>
            <option value="Team Stacking">Team Stacking</option>
          </optgroup>
          <?php if ($this->_tpl_vars['customreason']): ?>
          <optgroup label="Custom">
          <?php $_from = ($this->_tpl_vars['customreason']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['creason']):
?>
            <option value="<?php echo $this->_tpl_vars['creason']; ?>
"><?php echo $this->_tpl_vars['creason']; ?>
</option>
          <?php endforeach; endif; unset($_from); ?>
          </optgroup>
          <?php endif; ?>
          <option value="other">Other Reason</option>
        </select>
        <div id="dreason" style="display:none;">
              <textarea class="textbox" TABINDEX=4 cols="30" rows="5" id="txtReason" name="txtReason"></textarea>
            </div>
          </div>
          <div id="reason.msg" class="badentry"></div>
        </td>
      </tr>
      <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'Ban Length','message' => "Select how long you want to ban this person for."), $this);?>
Ban Length 
          </div>
        </td>
        <td>
          <div align="left">
              <select id="banlength" TABINDEX=5 class="select" style="width: 196px">
            <option value="0">Permanent</option>
            <optgroup label="minutes">
              <option value="1">1 minute</option>
              <option value="5">5 minutes</option>
              <option value="10">10 minutes</option>
              <option value="15">15 minutes</option>
              <option value="30">30 minutes</option>
              <option value="45">45 minutes</option>
            </optgroup>
            <optgroup label="hours">
              <option value="60">1 hour</option>
              <option value="120">2 hours</option>
              <option value="180">3 hours</option>
              <option value="240">4 hours</option>
              <option value="480">8 hours</option>
              <option value="720">12 hours</option>
            </optgroup>
            <optgroup label="days">
              <option value="1440">1 day</option>
              <option value="2880">2 days</option>
              <option value="4320">3 days</option>
              <option value="5760">4 days</option>
              <option value="7200">5 days</option>
              <option value="8640">6 days</option>
            </optgroup>
            <optgroup label="weeks">
              <option value="10080">1 week</option>
              <option value="20160">2 weeks</option>
              <option value="30240">3 weeks</option>
            </optgroup>
            <optgroup label="months">
              <option value="43200">1 month</option>
              <option value="86400">2 months</option>
              <option value="129600">3 months</option>
              <option value="259200">6 months</option>
              <option value="518400">12 months</option>
            </optgroup>
          </select>
          </div>
          <div id="length.msg" ></div>
        </td>
      </tr>
      
      
      <tr>
        <td valign="top" width="35%">
          <div class="rowdesc">
            <?php echo smarty_function_help_icon(array('title' => 'Upload Demo','message' => "Click here to upload a demo with this ban submission."), $this);?>
Upload Demo
          </div>
        </td>
        <td>
          <div align="left">
            <?php echo smarty_function_sb_button(array('text' => 'Upload a demo','onclick' => "childWindow=open('pages/admin.uploaddemo.php','upload','resizable=no,width=300,height=130');",'class' => 'save','id' => 'udemo','submit' => false), $this);?>

          </div>
          <div id="demo.msg" style="color:#CC0000;"></div>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
            <?php echo smarty_function_sb_button(array('text' => 'Add Ban','onclick' => "ProcessBan();",'class' => 'ok','id' => 'aban','submit' => false), $this);?>

              &nbsp;
        <?php echo smarty_function_sb_button(array('text' => 'Back','onclick' => "history.go(-1)",'class' => 'cancel','id' => 'aback'), $this);?>

          </td>
      </tr>
  </table>
</div>
<?php endif; ?>