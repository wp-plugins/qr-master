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

 echo '<link type="text/css" rel="stylesheet" href="' . path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )) . '/css/shortcode.css" />';


if($src == "google") {

	if($mode == "auto") $data = uniqid(true);
	
	//get url google qr
	$url = 'http://chart.apis.google.com/chart?cht=qr&chs='.$width.'x'.$height.'&chl='.$data.'&chld='.$err.'&choe='.$enc.'|0';
	//print qr	
	echo '<div id="qr-content">';
	echo '<span class="qr-code"><img src="'.$url.'"/></span>';
	echo '<span class="qr-data"><p>[<a href="http://studi7.com" target="_blank">QRMaster</a>]&nbsp;<b>';
	_e('Size: ','qrmaster');
	echo '</b> '.$width.'x'.$height.' | <b>';
	_e('Encoding:','qrmaster');
	echo '</b> '.$enc.' | <b>Error:</b> '.$err.' | <a href="'.$url.'">';
	_e('Link','qrmaster');
	echo '</a></p></span><div class="clear"></div></div></br>';
}


?>
