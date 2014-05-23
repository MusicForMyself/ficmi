<?php
	
	// RESPONSE
	
function table_updateRow($data){

	$array_keys = array_keys($_POST);
	$array_values = array_values($_POST);
	file_put_contents(
						'/Users/maquilador8/Desktop/php.log', 
						var_export($_POST, true), 
						FILE_APPEND);
	global $column_slugs;
	file_put_contents(
						'/Users/maquilador8/Desktop/php.log', 
						var_export($column_slugs, true), 
						FILE_APPEND);
	// $queryMaster = new query_master($con);
	// // unset($array_values[0]);
	// // $array_values = array_values($array_values);

	// $queryMaster->update("gb_contacts", $column_slugs, $array_values, "id = $update_id");

	// //TODO: this mehod fucks up the error_reporter
	// header("Location: {$_SERVER['REDIRECT_URL']}");
	// return;
}
	