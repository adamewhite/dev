<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1); 

include("wp-load.php");
// require_once ABSPATH . '/wp-admin/includes/taxonomy.php';

$csv = file_get_contents('test.csv', FILE_USE_INCLUDE_PATH);

$lines = explode("\n", $csv);
print_r($lines);
//remove the first element from the array
$head = str_getcsv(array_shift($lines));
print_r($head);

$data = array();
foreach ($lines as $line) {
  $data[] = array_combine($head, str_getcsv($line));
}

var_dump($data);
print_r($data);

?>