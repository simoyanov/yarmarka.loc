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
$j=1;
	for ($i=2; $i <= $rows; $i++) { 
		
		$type_id = 17;
		switch ($data_places->val($i, 13)) {
			case 'y':
				$type_id = 17;
				$place_description	=str_replace('<p>', "&lt;p&gt;",'<p>Ярмарки, на которых осуществляется продажа сельскохозяйственной продукции и продовольственных товаров, произведенных фермерами различных регионов России, а также на территории государств-членов Таможенного союза. Ярмарки выходного дня проводятся в пятницу, субботу и воскресенье.</p>') ;
				$place_description	=str_replace('</p>', "&lt;/p&gt;",$place_description) ;
				break;
			case 'ry':
				$type_id = 18;
				$place_description	=str_replace('<p>', "&lt;p&gt;",'<p>Ярмарки, на которых осуществляется продажа сельскохозяйственной продукции, продовольственных и непродовольственных товаров легкой промышленности, произведенных в России, а также на территории государств-членов Таможенного союза, изделий народных художественных промыслов, продукции ремесленничества и иных товаров. Региональные ярмарки проходят периодически или разово.</p>') ;
				$place_description	=str_replace('</p>', "&lt;/p&gt;",$place_description) ;
				break;
			case 'p':
				$type_id = 19;
				$place_description	=str_replace('<p>', "&lt;p&gt;",'<p>Рынки, на которых осуществляется продажа сельскохозяйственной продукции и продовольственных товаров, произведенных фермерами различных регионов России, а также на территории государств-членов Таможенного союза. Такой рынок находится под открытым небом или в торговых рядах.</p>') ;
				$place_description	=str_replace('</p>', "&lt;/p&gt;",$place_description) ;
				break;
			case 'f':
				$type_id = 20;

		$place_description	= str_replace('<p>', "&lt;p&gt;", $data_places->val($i, 3)) ;
		$place_description	= str_replace('</p>', "&lt;/p&gt;", $place_description) ;
				break;
			case 's':
				$type_id = 21;

		$place_description	= str_replace('<p>', "&lt;p&gt;", $data_places->val($i, 3)) ;
		$place_description	= str_replace('</p>', "&lt;/p&gt;", $place_description) ;
				break;
			default:
				$type_id = 17;
				break;
		}

		//print_r('<pre>');
		//print_r($data_places->val($i, 13));
		//print_r('</pre>');

		//place
		$image = $data_places->val($i, 5);
		if(!empty($image)){
			$image = 'catalog/fest/'.$data_places->val($i, 5).'.jpg';
		}
		$latitude_longitude = $data_places->val($i, 7).','.$data_places->val($i, 8);
		
		//place_description
		$place_title		= $data_places->val($i, 2);

		$place_phone 		= $data_places->val($i, 9);
		$place_time 		= $data_places->val($i, 10);
		$place_period 		= $data_places->val($i, 11);
		$address			= $data_places->val($i, 6);
		$meta_title			= $data_places->val($i, 2);

	/*	$place_category = str_replace('1', "сельскохозяйственная продукция", (string)$data_places->val($i, 12)) ; 
		$place_category = str_replace('2', "продовольственные товары и непродовольственные товары легкой промышленности", $data_places->val($i, 12)) ; 
		$place_category = str_replace('3', "изделия народных художественных промыслов", $data_places->val($i, 12)) ; 
		$place_category = str_replace('4', "продукция ремесленничества", $data_places->val($i, 12)) ; 
		$place_category = str_replace('5', "универсальные товары", $data_places->val($i, 12)) ; 
		$place_category = str_replace('6', "уличная еда", $data_places->val($i, 12)) ; 
		$place_category = str_replace('7', "сувенирная продукция", $data_places->val($i, 12)) ; 
	*/


/*		
1   сельскохозяйственная продукция
2	продовольственные товары и непродовольственные товары легкой промышленности
3	изделия народных художественных промыслов
4	продукция ремесленничества
5	универсальные товары
6	уличная еда
7	сувенирная продукция
*/
		print_r('<pre>');
		print_r("INSERT INTO oc_place SET 
			image = '" . $image . "',
			metro_id = '0',
			type_id = '" . (int)$type_id . "',
			place_date = NOW(),
			place_category = '".$data_places->val($i, 12)."',
			latitude_longitude = '" . $latitude_longitude . "',
			visibility = '1',
			status = '1',
			date_added = NOW(); ");
		print_r('</pre>');
		print_r('<pre>');
		print_r("INSERT INTO oc_place_description SET 
				place_id = '" . (int)$j . "', 
				language_id = '2', 
				title = '" . $place_title . "',
				address = '" . $address . "',
				place_period = '".$place_period."',
				place_time = '".$place_time."',
				place_phone   = '".$place_phone."',
				description = '" . $place_description . "', 
				meta_title = '" . $meta_title . "', 
				meta_description = '', 
				meta_keyword = '';");
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
		//$data_places->val($i, 10) - Время работы
		//$data_places->val($i, 11) - График работы
  		//$data_places->val($i, 12) - Категории товаров 


  		//$data_places->val($i, 13) - Тип
  		$j++;
  		
	}
?>
