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
<div class="header">
<div class="title">
<h1><?php _e( 'QR Master','qrmaster'); ?></h1>
<h2><?php _e( 'Shortcode generator','qrmaster'); ?></h2>
</div>
<div class="credits">
<label><?php _e('Plugin created by ','qrmaster');?><a href="http://studi7.com" target="_blank">Studi7</a></label><br />
<label><?php _e('Licensed with ','qrmaster');?><a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html" target="_blank"><?php _e('GNU General Public License, version 2','qrmaster');?></a></label><br />
<label><?php _e('If you like this plugin, you can make a donation :) ','qrmaster');?>&nbsp;<a href="https://www.paypal.com/es/cgi-bin/webscr?cmd=_flow&SESSION=N3FBPCkFbss4IquTxeNOxg4Psp_bwV3CUOaj9DCN4PyisiYw8y8kj-GWziS&dispatch=5885d80a13c0db1f8e263663d3faee8d0b7e678a25d883d0fa72c947f193f8fd">PayPal</a></label><br />
</div>
</div>

<h2 class="nav-tab-wrapper">
	<a href="javascript:ActiveTab('wrap','1')" class="nav-tab nav-tab-active" id="nav-tab-1"><?php _e( 'Google API Charts','qrmaster'); ?></a>
	<a href="javascript:ActiveTab('wrap','2')" class="nav-tab" id="nav-tab-2"><?php _e( 'PhpQR API','qrmaster'); ?></a>
	<a href="javascript:ActiveTab('wrap','3')" class="nav-tab usages-tab" id="nav-tab-3"><?php _e( 'QR code usages','qrmaster'); ?></a>
</h2>

<div class="wrap-tab wrap-1" id="wrap-1">

<form class="qrgenerator">
<div class="row-2col">
<?php echo '<img src="'.path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )) . '/img/developers-logo.png"'.'"/>'; ?><br />
<a target="_blank" href="https://developers.google.com/chart/infographics/docs/qr_codes?hl=ca"><?php _e('Google Chart Tools','qrmaster'); ?></a> &nbsp;<i><?php _e('(Deprecated)');?></i>
</div>
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
<label class="note"><?php _e('Only set if automatic mode is not checked. Max 40 characters.','qrmaster');?>&nbsp;
<a href="javascript:ActiveTab('wrap','3')"><?php _e('Usages','qrmaster'); ?></a></label>
</div>
<div class="row-col">
<label><b><?php _e('Code information','qrmaster');?></b></label><br />
<input type="checkbox" class="info" id="info" checked/><?php _e('Show','qrmaster');?><br />
<label class="note"><?php _e('Show/hide information below QR code.','qrmaster');?></label>
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
<div class="row-col">
<label><b><?php _e('CSS Style','qrmaster');?></b></label><br />
<input type="radio" class="css" id="css" name="css" value="classic" checked/><?php _e('Classic','qrmaster');?><br />
<input type="radio" class="css" id="css" name="css" value="none"/><?php _e('None','qrmaster');?><br />
<label class="note"><?php _e('Set css style to code QR.','qrmaster');?></label>
</div>
</div>

<div class="col-3">
<div class="row-col no-style">
<a class="button-primary get" href="<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php"><?php _e('Get shortcode','qrmaster'); ?></a>
<a class="button-secondary clear" href="javascript:Reset()"><?php _e('Reset','qrmaster'); ?></a>
<br /><br />
<div class="shortcode" id="shortcode"></div><br />
<label class="note"><i><?php _e('Copy the shortcode and paste to page or post','qrmaster'); ?></i></label>
</div>
</div>

<script>
function ActiveTab(wrap, id) {
   var w = document.getElementById(wrap + '-' + id);
   w.style.display = 'inline-block';
   document.getElementById("nav-tab-" + id).className += " nav-tab-active";
   
   for (var i=1;i<4;i++)
	{
		if (id != i) {
			w = document.getElementById(wrap + '-' + i);
			w.style.display = 'none';	
			document.getElementById("nav-tab-" + i).className = "nav-tab";	
		}
			
	}	
}

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

<div class="wrap-tab wrap-2" id="wrap-2">

<form class="phpqrgen" id="phpqrgen">
<div class="row-2col">
<?php echo '<img src="'.path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )) . '/img/phpqrcode.png"'.'"/>'; ?><br />
<a target="_blank" href="http://phpqrcode.sourceforge.net/index.php#home"><?php _e('Php QR Code','qrmaster'); ?></a> | 
<label><?php _e('This method save generated qr-codes in \'uploads/qrmaster/cache\' folder. The folder will be cleared when exceed 10MB');?></label>
</div>
<div class="col-1">
<div class="row-col">
<label><b><?php _e('Size image:','qrmaster');?></b></label><br />
<select class="phpsize" id="phpsize">
	<option value="1"><?php _e('1','qrmaster');?></option>
	<option value="2"><?php _e('2','qrmaster');?></option>
	<option value="3"><?php _e('3','qrmaster');?></option>
	<option value="4" selected><?php _e('4','qrmaster');?></option>
	<option value="5"><?php _e('5','qrmaster');?></option>
	<option value="6"><?php _e('6','qrmaster');?></option>
	<option value="7"><?php _e('7','qrmaster');?></option>
	<option value="8"><?php _e('8','qrmaster');?></option>
	<option value="9"><?php _e('9','qrmaster');?></option>
	<option value="10"><?php _e('10','qrmaster');?></option>
</select><br /><label class="note"><?php _e('4 by default. 40 maximum size.','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('Value:','qrmaster');?></b></label><br />
<input type="text" class="phpvalue" id="phpvalue" disabled="true"/><br />
<label class="note"><?php _e('Only set if automatic mode is not checked.','qrmaster');?>&nbsp;
<a href="javascript:ActiveTab('wrap','3')"><?php _e('Usages','qrmaster'); ?></a></label>
</div>
<div class="row-col">
<label><b><?php _e('Code information','qrmaster');?></b></label><br />
<input type="checkbox" class="phpinfo" id="phpinfo" checked/><?php _e('Show','qrmaster');?><br />
<label class="note"><?php _e('Show/hide information below QR code.','qrmaster');?></label>
</div>
</div>

<div class="col-1">
<div class="row-col">
<label><b><?php _e('ECC:','qrmaster');?></b></label><br />          
<select class="phperr" id="phperr">
	<option value="L"><?php _e('L (smallest)','qrmaster');?></option>
	<option value="M"><?php _e('M','qrmaster');?></option>
	<option value="Q"><?php _e('Q','qrmaster');?></option>
	<option value="H"><?php _e('H (best)','qrmaster');?></option>
</select><br /><label class="note"><?php _e('L by default','qrmaster');?></label>
</div>
<div class="row-col">
<input type="checkbox" class="phpauto" id="phpauto" value="1" checked onclick="javascript:AutoPhp()"> <b><?php _e('Automatic mode','qrmaster');?></b><br />
<label class="note"><?php _e('Generate a random value of 23 characters based on current time in microseconds. Get random QR code each time to refresh page or post.','qrmaster');?></label>
</div>
<div class="row-col">
<label><b><?php _e('CSS Style','qrmaster');?></b></label><br />
<input type="radio" class="phpcss" id="phpcss" name="phpcss" value="classic" checked/><?php _e('Classic','qrmaster');?><br />
<input type="radio" class="phpcss" id="phpcss" name="phpcss" value="none"/><?php _e('None','qrmaster');?><br />
<label class="note"><?php _e('Set css style to code QR.','qrmaster');?></label>
</div>
</div>

<div class="col-3">
<div class="row-col no-style">
<a class="button-primary get" href="<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php"><?php _e('Get shortcode','qrmaster'); ?></a>
<a class="button-secondary clear" href="javascript:ResetPhp()"><?php _e('Reset','qrmaster'); ?></a>
<br /><br />
<div class="shortcode" id="phpshortcode"></div><br />
<label class="note"><i><?php _e('Copy the shortcode and paste to page or post','qrmaster'); ?></i></label>
</div>
</div>
</form>
</div>
<div class="wrap-tab wrap-3" id="wrap-3">
<div class="row-2col">
<p><?php _e('The QR code is a way of representing data as binary code, a series of letters or musical notes. QR codes only show data in a way that the machine can read. The documentation of the QR Code does not specify what the data mean or indicate how it represents a URL or a phone number or a link to Android Market.','qrmaster');?>
</p><p><?php _e('Developers of code generators and scanners have agreed on how to representing and interpreting some data, such as: surfing the web, add contact, or initializing a call. Here are some examples:','qrmaster');?>
</p>
<h2><?php _e('Links','qrmaster');?></h2>
<p><a href="http://example.com" title="http://example.com" rel="nofollow">http://example.com</a></p>
<p><a href="http://example.com?withparameter=a&amp;andother=b" title="http://example.com?withparameter=a&amp;andother=b" rel="nofollow">http://example.com?withparameter=a&amp;andother=b</a></p>
<p><a href="http://goo.gl/short" title="http://goo.gl/short" rel="nofollow">http://goo.gl/short</a></p>
<p>market://details?id=my.android.market.full.qualiffied.package.name</p>
<h2><?php _e('Phone number','qrmaster');?></h2>
<p>tel:012345678</p>
<h2><?php _e('E-mail address','qrmaster');?></h2>
<p><a href="mailto:hello@example.com" title="mailto:hello@example.com" rel="nofollow">mailto:hello@example.com</a></p>
<p><a href="mailto:hello@example.com?subject=promotion" title="mailto:hello@example.com?subject=promotion" rel="nofollow">mailto:hello@example.com?subject=promotion</a></p>
<h2><?php _e('Contact card (V-Card)','qrmaster');?></h2>
<p>
BEGIN:VCARD<br />
VERSION:2.1<br />
N:Jack;Sparrow<br />
FN:Jack Sparrow<br />
TITLE:Captain<br />
TEL;WORK;VOICE:(666) 555-7212<br />
END:VCARD
</div>
</div>
<script>
function AutoPhp() {
   var auto = document.getElementById("phpauto");
   if (auto.checked) {
	document.getElementById("phpvalue").disabled = true;
   }
   else {
	document.getElementById("phpvalue").disabled = false;
   }
}

function ResetPhp() {
   document.getElementById("phpvalue").value = '';
   document.getElementById("phpauto").checked = true;
   document.getElementById("phpvalue").disabled = true;
   var container = document.getElementById("phpshortcode");
   container.innerHTML = '';
   //reset combos!!!!!
   document.getElementById("phpsize").selectedIndex = 3;
   document.getElementById("phperr").selectedIndex = 0;
}
</script>
</div> <!-- end wrap -->
<!--PREVIEW-->
<?php /*echo do_shortcode( '[qrcode src="google" mode="auto" width="150" height="150" enc="UTF-8" err="L"]' ) */?> 

