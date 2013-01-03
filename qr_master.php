<?php
/*
Plugin Name: QR Master
Description: Generation shortcodes to include QR codes from google API Charts
Author: Roger Pàmies
Author URI: http://studi7.com/
Version: 1.0.2
License: GPLv2 or later
Plugin URI: http://studi7.com/
*/

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

function qr_master_add_management_page(  ) {
  if ( function_exists('add_management_page') ) {
    $page = add_management_page( 'QR Master', 'QR Master', 'manage_options', 'qr_master', 'qr_master_admin' );
    add_action("admin_print_scripts-$page", 'qr_master_scripts');
  }
}

function qr_master_admin(  ) {
  
  include_once('qr_master_admin.php');
}

function qr_master_gen(  ) {
  $srcQR = isset($_POST['srcQR'])?$_POST['srcQR']:null;
  $valueQR = isset($_POST['valueQR'])?$_POST['valueQR']:null;
  $widthQR = isset($_POST['widthQR'])?$_POST['widthQR']:null;
  $heightQR = isset($_POST['heightQR'])?$_POST['heightQR']:null;
  $encQR = isset($_POST['encQR'])?$_POST['encQR']:null;
  $autoQR = isset($_POST['autoQR'])?$_POST['autoQR']:null;
  $errQR = isset($_POST['errQR'])?$_POST['errQR']:null;
  $infoQR = isset($_POST['infoQR'])?$_POST['infoQR']:null;
  $cssQR = isset($_POST['cssQR'])?$_POST['cssQR']:null;
  //if ( $valueQR ) {
    //$src = $srcQR;
    //$value = $valueQR;
    //$width = $widthQR;
    //$height = $heightQR;
    //$enc = $encQR;
    //$auto = $autoQR;
    //$err = $errQR;
	
    //$posts = get_posts( "numberposts=-1&post_status=publish,pending,future,private,draft&category=$catID" );
    include_once('qr_shortcode_view.php');
  //}
  exit();
}

function qr_master_scripts(  ) {
  wp_enqueue_script( "qrmaster", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/qr_master.js"), array( 'jquery' ) );
}

//shortcode
function get_qrcode($atts) 
{ 
	// atributes (user)
	extract(shortcode_atts(array('data' => 'data'), $atts));
	extract(shortcode_atts(array('width' => 'width'), $atts));
	extract(shortcode_atts(array('height' => 'height'), $atts));
	extract(shortcode_atts(array('enc' => 'UTF-8'), $atts));
	extract(shortcode_atts(array('err' => 'L'), $atts));
	extract(shortcode_atts(array('mode' => 'static'), $atts)); //set static by default if not specify mode auto
	extract(shortcode_atts(array('src' => 'google'), $atts)); //set google api by default
	extract(shortcode_atts(array('info' => 'yes'), $atts));
	extract(shortcode_atts(array('css' => 'classic'), $atts));  

	ob_start();
     	include('get_qrcode.php');
     	$output = ob_get_clean();
	//print $output; // debug
	return $output;	

	
}

function load_plugin_languages()
{
	load_plugin_textdomain('qrmaster', false, dirname(plugin_basename(__FILE__)).'/languages/');
}

add_action('plugins_loaded', 'load_plugin_languages');
add_action('admin_menu', 'qr_master_add_management_page');
add_action('wp_ajax_qr_master_gen', 'qr_master_gen' );
add_shortcode('qrcode', 'get_qrcode');
