<?php
error_reporting(E_ALL ^ E_NOTICE);
require __DIR__."/system/helper/PHPExcelReader/SpreadsheetReader.php"; //better use autoloading
use \PHPExcelReader\SpreadsheetReader as Reader;        

$data_places = new Reader(__DIR__ . "/upload/place.xls");
//type_id
//1 - ярмарки выходного для == y
//2 - региональные ярмарки == ry
//3 - продуктовые рынки == p
//4 - фестиваль == f

$rows = $data_places->rowcount();
$id = 45;
// loop through all rows
	for ($i=2; $i <= $rows; $i++) { 
		

		print_r('<pre>');
		print_r($data_places->val($i, 13));
		print_r('</pre>');

		print_r('<pre>');
		print_r($data_places->val($i, 5));
		print_r('</pre>'); 
	  	//print_r('<pre>');
	  	
		//print_r($data_places->val($i, 1) . ' -||- '.$data_places->val($i, 2) . ' -||- ' . $data_places->val($i, 3) . ' -||- ' . $data_places->val($i, 4) . ' -||- ' . $data_places->val($i, 5) . ' -||- '.$data_places->val($i, 6) . ' -||- ' . $data_places->val($i, 7) . ' -||- ' . $data_places->val($i, 8) . ' -||- '.$data_places->val($i, 9) . ' -||- ' . $data_places->val($i, 10). ' -||- ' . $data_places->val($i, 11). ' -||- ' . $data_places->val($i, 12). ' -||- ' . $data_places->val($i, 13));
		//print_r('</pre>');
	  	//print_r("-- --------------------------------------------------------");

	  	//$data_places->val($i, 1) - номер
	  	//$data_places->val($i, 2) - название
	  	//$data_places->val($i, 3) - описание
	  	//$data_places->val($i, 4) - Ссылка на "как стать участником"
  		//$data_places->val($i, 5) - Изображения
  		//$data_places->val($i, 6) - Адрес
  		//$data_places->val($i, 7) - LAT
  		//$data_places->val($i, 8) - LONG
  		//$data_places->val($i, 9) - Телефон горячей линии
		//$data_places->val($i, 11) - График работы
  		//$data_places->val($i, 12) - Категории товаров 


  		//$data_places->val($i, 13) - Тип
  		
	}
?>
