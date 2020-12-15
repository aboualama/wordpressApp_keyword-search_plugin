<?php 
    /*
    Plugin Name: Custom Search Plugins
    Plugin URI: http://www.aboualama.com
    Description: Plugin For Search System
    Author: Mohamed Aboualama
    Version: 1.0
    Author URI: http://www.aboualama.com
    */
 

register_activation_hook( __FILE__ , "SearchSystem"); 
function SearchSystem() {
	global $wpdb; 
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . "searchstable";
	$sql = "CREATE TABLE `$table_name` (
    `id` int(11) NOT NULL AUTللاى  O_INCREMENT,
	`user_id` int(11),
	`device_id` text,
	`keyword` varchar(220) DEFAULT NULL,  
	PRIMARY KEY(id)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
	";
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta($sql);
	}
}  
 




function Search_System($request) {
	global $wpdb;
	$table = $wpdb->prefix.'searchstable'; 
	
	$data = [ 
			'user_id'   => $request['user_id'],
			'device_id' => $request['device_id'],
			'keyword'   => $request['keyword'],
			];  

	$wpdb->insert($table , $data); 
    return rest_ensure_response( $data );
}

add_action('rest_api_init', function() {
	register_rest_route('wp/v3/', 'save_search', [
		'methods' =>  'POST', 
		'callback' => 'Search_System',
	]); 
});
  


function getByKeyword($request) {
	global $wpdb;     
	$table_name = $wpdb->prefix . "searchstable";

	$keyword = $request['keyword']; 
	$devices = [];   
	$results = $wpdb->get_results ("SELECT * FROM $table_name WHere (keyword = '". $keyword ."')");  
	foreach($results as $result)
	{ 
		$devices[] = $result->user_id;
	} 
	return $devices;
} 
add_action('rest_api_init', function() {
	register_rest_route('wp/v3/', 'getkeyword', [
		'methods' =>  'GET', 
		'callback' => 'getByKeyword',
	]); 
});

  
function getAllKeyword($request) {
	global $wpdb;     
	$table_name = $wpdb->prefix . "searchstable";
 
	$device_id =  $request['device_id']; 
	$keywords = [];  
	$results = $wpdb->get_results ("SELECT * FROM $table_name WHere (device_id = '". $device_id ."')");  
	foreach($results as $result)
	{ 
		$keywords[] = $result;
	} 
	return $keywords;
} 
add_action('rest_api_init', function() {
	register_rest_route('wp/v3/', 'get_keywords', [
		'methods' =>  'POST', 
		'callback' => 'getAllKeyword',
	]); 
});

 
function removeKeyword($request) { 
	global $wpdb;     
	$table_name = $wpdb->prefix . "searchstable";  
	$Id = $request['id'];  
    $wpdb->get_results ("DELETE FROM $table_name WHere (id = '". $Id ."')"); 
 
} 
add_action('rest_api_init', function() {
	register_rest_route('wp/v3/', 'remove_keywords', [
		'methods' =>  'POST', 
		'callback' => 'removeKeyword',
	]); 
});




