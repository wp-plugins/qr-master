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
*/

$auto_mode = $autoQR === 'true'? true: false;

if(($valueQR == null && !$auto_mode) || $widthQR == null || $heightQR == null) _e('<label class="error">Width, Height and Value fields are required.</label>','qrmaster');
else {
	$size = $heightQR * $widthQR;
	if($size > 300000 || $size == 0) _e('<label class="error">'.$widthQR.'x'.$heightQR.'='.$size.' is up to 300000 pixels allow or not a valid value.</label>','qrmaster');
	else {
		$code;
		if($auto_mode) $code = '[qrcode src="'.$srcQR.'" mode="auto" width="'.$widthQR.'" height="'.$heightQR.'" enc="'.$encQR.'" err="'.$errQR.'"';
		else $code = '[qrcode src="'.$srcQR.'" data="'.$valueQR.'" width="'.$widthQR.'" height="'.$heightQR.'" enc="'.$encQR.'" err="'.$errQR.'"';
		if($infoQR == 'false') $code = $code.' info="no"';
		if($cssQR != 'classic') $code = $code.' css="'.$cssQR.'"';
		$code = $code.']';
		echo $code;
	}
}
?>



