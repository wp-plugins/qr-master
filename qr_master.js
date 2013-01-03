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

jQuery(document).ready( function($) {
  $("form.qrgenerator a.get").click( function() {
    
    /* only fetch results once */
    /*$(this).unbind('click').bind('click', function(){return false;});*/
    //alert($('input[name=css]:checked').val());	
    
    $.post($(this).attr("href"), {
        action: "qr_master_gen",
        srcQR: "google",
	valueQR: document.getElementById("value").value,
	widthQR: document.getElementById("width").value,
	heightQR: document.getElementById("height").value,
	encQR: document.getElementById("enc").value,
	autoQR: document.getElementById("auto").checked,
	errQR: document.getElementById("err").value,
	infoQR: document.getElementById("info").checked,
	cssQR: $('input[name=css]:checked').val()
      }, function(data) {
        var container = document.getElementById("shortcode");
	container.innerHTML = data;

      }
    );
    return false;
  });



});
