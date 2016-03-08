<?php
/*
Plugin Name: Zenphotos
Plugin URI: http://www.photogabble.co.uk/projects/zenphoto/
Description: Tools for including zenphoto gallery images into wordpress templates
Version: 1.4
Author: Simon Dann
Author URI: http://www.photogabble.co.uk

    Copyright 2007  Simon Dann  (email : simon@photogabble.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function zenphotos($max=4, $zen_extra_before = '', $zen_extra_after  = '') {
global $wpdb;
$zen_output = "";

$cats = $wpdb->get_results("SELECT 	zp_images.filename AS zp_filename, 
									zp_images.desc AS zp_file_desc, 
									zp_album.folder AS zp_folder, 
									zp_images.title AS zp_title 
							FROM zp_images AS zp_images 
							INNER JOIN zp_albums AS zp_album ON zp_album.id = zp_images.albumid 
							WHERE zp_images.show =1 
							ORDER BY RAND() 
							LIMIT 0, $max");	

foreach ($cats as $cate){

	$zen_new_filename = str_replace(" ", "+", $cate->zen_filename);
	$zen_output.= $zen_extra_before . '<div class="image_thumb"><a href="/photos/'. $cate->zp_folder . '/' . $zen_new_filename .'" title="Image"><img class="image_thumb" src="/photos/'. $cate->zp_folder .'/image/thumb/'. $cate->zp_filename .'" alt="Thumb Image, Click to Full View" /></a></div>' . $zen_extra_after;
}
	
	echo $zen_output;


}

?>