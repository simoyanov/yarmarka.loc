<?php
error_reporting(E_ALL ^ E_NOTICE);
require __DIR__."/system/helper/PHPExcelReader/SpreadsheetReader.php"; //better use autoloading
use \PHPExcelReader\SpreadsheetReader as Reader;        

$data_places = new Reader(__DIR__ . "/upload/place.xls");

$rows = $data_places->rowcount();
print_r($rows);
$id = 45;
// loop through all rows
	for ($i=1; $i <= $rows; $i++) { 
		
	  	print_r('<pre>');
		print_r($data_places->val($i, 1) . ' -||- '.$data_places->val($i, 2) . ' -||- ' . $data_places->val($i, 3) . ' -||- ' . $data_places->val($i, 4) . ' -||- ' . $data_places->val($i, 5) . ' -||- '.$data_places->val($i, 6) . ' -||- ' . $data_places->val($i, 7) . ' -||- ' . $data_places->val($i, 8) . ' -||- '.$data_places->val($i, 9) . ' -||- ' . $data_places->val($i, 10). ' -||- ' . $data_places->val($i, 11). ' -||- ' . $data_places->val($i, 12). ' -||- ' . $data_places->val($i, 13));
		print_r('</pre>');
	  	print_r("-- --------------------------------------------------------");
	}
?>
