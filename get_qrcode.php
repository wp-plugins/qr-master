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

if($css == "classic") echo '<link type="text/css" rel="stylesheet" href="' . path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )) . '/css/shortcode.css" />';


if($src == "google") {

	if($mode == "auto") $data = uniqid(true);
	
	//get url google qr
	$url = 'http://chart.apis.google.com/chart?cht=qr&chs='.$width.'x'.$height.'&chl='.$data.'&chld='.$err.'&choe='.$enc.'|0';
	//print qr	
	if ($css == "none") echo '<div id="qr-content-"'.$css.'>'; else echo '<div id="qr-content">';
	if ($css == "none") echo  '<span class="qr-code-"'.$css.'>'; else echo '<span class="qr-code">'; echo '<img src="'.$url.'"/></span>';
	if($info == "yes") {	
		echo '<span class="qr-data"><b>';
		_e('Encoding:','qrmaster');
		echo '</b> '.$enc.' | <b>Error:</b> '.$err.' | <a href="'.$url.'">';
		_e('Link','qrmaster');
		echo '</a></p></span>';
	}
	echo '<div class="clear"></div></div></br>';
}


?>
