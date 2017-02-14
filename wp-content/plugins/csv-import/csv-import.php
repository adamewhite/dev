<?php

/*********************************************************************************
 * Plugin Name: CSV Import
 * Description: A plugin that helps to import the data's from a CSV file.
 * Version:     2.0
 * Author:      smackcoders
 * Plugin URI:  https://wordpress.org/plugins/csv-import/
 * Text Domain: csv-import
 * Domain Path: /languages
 * Author URI:  http://www.smackcoders.com
 * Contributors: smackcoders
 * License:     GPL3
 *
 *
 * CSV-Import is a Tool for importing CSV for the Wordpress
 * plugin developed by Smackcoders. Copyright (C) 2014 Smackcoders.
 *
 * CSV-Import is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License version 3
 * as published by the Free Software Foundation with the addition of the
 * following permission added to Section 15 as permitted in Section 7(a): FOR
 * ANY PART OF THE COVERED WORK IN WHICH THE COPYRIGHT IS OWNED BY
 * CSV-Import, CSV-Import DISCLAIMS THE WARRANTY OF NON
 * INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * CSV-Import is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public
 * License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program; if not, see http://www.gnu.org/licenses or write
 * to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA 02110-1301 USA.
 *
 * You can contact Smackcoders at email address info@smackcoders.com.
 *
 * The interactive user interfaces in original and modified versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License
 * version 3, these Appropriate Legal Notices must retain the display of the
 * CSV-Import copyright notice. If the display of the logo is
 * not reasonably feasible for technical reasons, the Appropriate Legal
 * Notices must display the words
 * "Copyright Smackcoders. 2015. All rights reserved".
*********************************************************************************/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once('sm_main_control.php');
include_once('sm_ajax_class.php');

register_activation_hook( __FILE__, array('SmackCSVImportHelper','sm_activate_function' ));

function SmackCSVImportEnqueue()	{
	wp_enqueue_script('smack_csv_import', plugins_url('csvimport.js', __FILE__));
	wp_enqueue_script('smack_csv_import_bootstrap_min_js', plugins_url('js/bootstrap.min.js', __FILE__));
	wp_enqueue_style('smack_csv_import_bootstrap_min_css', plugins_url('css/bootstrap.min.css', __FILE__));
}

function SmackCSVImportAddEnqueue()	{
	add_action('admin_enqueue_scripts', 'SmackCSVImportEnqueue');
}

add_action('admin_menu','SmackCSVImportAddMenu');
function SmackCSVImportAddMenu() {
	$my_page = add_menu_page('CSV Import','CSV Import','manage_options','sm_csv_importer','SmackCSVImportNewUpload', WP_PLUGIN_URL . '/csv-import/images/csv-import.png');
	add_action('load-'.$my_page, 'SmackCSVImportAddEnqueue');
}

function SmackCSVImportNewUpload() {
	$obj = new SmackCSVImportHelper;
	$obj->sm_file_upload();
	unset($obj);
}

add_action('wp_ajax_smack_ci_select_post_type','smack_ci_select_post_type');
function smack_ci_select_post_type()	{
	$obj1 = new SmackCSVImportAjaxActions;
	$obj1->getallposttypefields();
	unset($obj1);
}

add_action('wp_ajax_smack_ci_import_records','smack_ci_import_records');
function smack_ci_import_records()	{
	$obj2 = new SmackCSVImportAjaxActions();
	$obj2->importallrecords();
	unset($obj2);
}

function SmackCSVImportCustomMenuOrder( $menu_order ) {
	return array(
		'index.php',
		'edit.php',
		'edit.php?post_type=page',
		'upload.php',
		'sm_csv_importer',
	);
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'SmackCSVImportCustomMenuOrder' );
