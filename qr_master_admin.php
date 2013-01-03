<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : info@studi7.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/?>

	
	<!--<h2 class="nav-tab-wrapper">
	<a href="?page=qr_master&tab=tab1" class="nav-tab">PHP QR Code</a>
	<a href="#" class="nav-tab nav-tab-active">Google API Charts</a>
	<a href="#" class="nav-tab">Tab #2</a>
	</h2>-->





<?php 
 echo '<link type="text/css" rel="stylesheet" href="' . path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )) . '/css/admin.css" />';
?>
<div class="wrap">

<form class="qrgenerator">

<h2><?php _e( 'Google API Charts QR Shortcode','qrmaster'); ?></h2><br />

<div class="col-1">
<div class="row-col">
<label><b><?php _e('Width image:','qrmaster');?></b></label><br />
<input type="text" class="width" id="width" value="150" maxlength="4" onkeypress="return isNumberKey(event)"/><br />
<label class="note"><?php _e('width x height can not up to 300000 pixels','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('Codification:','qrmaster');?></b></label><br />            
<select class="enc" id="enc">
	<option value="UTF-8"><?php _e('UTF-8','qrmaster');?></option>
	<option value="Shift_JIS"><?php _e('Shift_JIS','qrmaster');?></option>
	<option value="ISO-9985-1"><?php _e('ISO-9985-1','qrmaster');?></option>
</select><br /><label class="note"><?php _e('UTF-8 by default','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('Value:','qrmaster');?></b></label><br />
<input type="text" class="value" id="value" disabled="true" maxlength="40"/><br />
<label class="note"><?php _e('Only set if automatic mode is not checked. Max 40 characters.','qrmaster');?></label>
</div>
</div>

<div class="col-1">
<div class="row-col">
<label><b><?php _e('Heigth image:','qrmaster');?></b></label><br />
<input type="text" class="height" id="height" value="150" maxlength="4" onkeypress="return isNumberKey(event)"/><br />
<label class="note"><?php _e('width x height can not up to 300000 pixels','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('Error correction Level:','qrmaster');?></b></label><br />          
<select class="err" id="err">
	<option value="L"><?php _e('L (7% data loss)','qrmaster');?></option>
	<option value="M"><?php _e('M (15% data loss)','qrmaster');?></option>
	<option value="Q"><?php _e('Q (25% data loss)','qrmaster');?></option>
	<option value="H"><?php _e('H (30% data loss)','qrmaster');?></option>
</select><br /><label class="note"><?php _e('L by default','qrmaster');?></label>
</div>
<div class="row-col">
<input type="checkbox" class="auto" id="auto" value="1" checked onclick="javascript:Auto()"> <b><?php _e('Automatic mode','qrmaster');?></b><br />
<label class="note"><?php _e('Generate a random value of 23 characters based on current time in microseconds. Get random QR code each time to refresh page or post.','qrmaster');?></label>
</div>
</div>
<div class="col-3">
<div class="row-col">
<label><b><?php _e('Code information','qrmaster');?></b></label><br />
<input type="checkbox" class="info" id="info" checked/><?php _e('Show','qrmaster');?><br />
<label class="note"><?php _e('Show/hide information below QR code.','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('CSS Style','qrmaster');?></b></label><br />
<input type="radio" class="css" id="css" name="css" value="classic" checked/><?php _e('Classic','qrmaster');?><br />
<input type="radio" class="css" id="css" name="css" value="none"/><?php _e('None','qrmaster');?><br />
<label class="note"><?php _e('Set css style to code QR.','qrmaster');?></label>
</div>
</div>


<div class="row-2col">
<a class="button-primary get" href="<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php"><?php _e('Get shortcode','qrmaster'); ?></a>
<a class="button-secondary clear" href="javascript:Reset()"><?php _e('Reset','qrmaster'); ?></a>
<a target="_blank" href="https://developers.google.com/chart/infographics/docs/qr_codes?hl=ca"><?php _e('Google Chart Tools','qrmaster'); ?></a> &nbsp;<i><?php _e('(Deprecated)');?></i>
</div>
<div class="shortcode row-2col" id="shortcode"></div>
<div class="row-2col"><label class="note"><i><?php _e('Copy the shortcode and paste to page or post','qrmaster'); ?></i></label></div><br /><br /><br />
<div class="row-2col credits">
<label><?php _e('Plugin created by ','qrmaster');?><a href="http://studi7.com" target="_blank">Studi7</a></label><br />
<label><?php _e('Licensed with ','qrmaster');?><a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html" target="_blank"><?php _e('GNU General Public License, version 2','qrmaster');?></a></label><br />
<label><?php _e('If you like this plugin, you can make a donation :) ','qrmaster');?>&nbsp;<a href="https://www.paypal.com/es/cgi-bin/webscr?cmd=_flow&SESSION=N3FBPCkFbss4IquTxeNOxg4Psp_bwV3CUOaj9DCN4PyisiYw8y8kj-GWziS&dispatch=5885d80a13c0db1f8e263663d3faee8d0b7e678a25d883d0fa72c947f193f8fd">PayPal</a></label><br />


</div>
<script>
function Auto() {
   var auto = document.getElementById("auto");
   if (auto.checked) {
	document.getElementById("value").disabled = true;
   }
   else {
	document.getElementById("value").disabled = false;
   }
}

function Reset() {
   document.getElementById("value").value = '';
   document.getElementById("auto").checked = true;
   document.getElementById("value").disabled = true;
   document.getElementById("height").value = '150';
   document.getElementById("width").value = '150';
   var container = document.getElementById("shortcode");
   container.innerHTML = '';
   //reset combos!!!!!
   document.getElementById("enc").selectedIndex = 0;
   document.getElementById("err").selectedIndex = 0;
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
</form>
</div>
