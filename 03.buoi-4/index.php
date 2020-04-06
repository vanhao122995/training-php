<?php
//mang key , value
//khai bao 1 mang
$array = array(); 	//mang rong
$array = [];		//khong dc khuyen khich sai

//khai bao mang gan gia tri
$array = array(1, 2, 3, 4); // mang tuan tu 


echo '<pre>';
print_r($array);
echo '<\pre>';
//echo $array[0];die();

$array = array(
				'mssv' => 12345,
				'name' => 'Hoang',
				'age'  => 20
			);
			
echo $array['name'];			
//mang long mang
//khai bao 1 mang chua danh sach cac sinh vien
$array = array(
				array(
					'mssv' => 12345,
					'name' => 'Hoang',
					'age'  => 20
				),
				array(
					'mssv' => 12345,
					'name' => 'Hoang',
					'age'  => 20
				),
				array(
					'mssv' => 12345,
					'name' => 'Hoang',
					'age'  => 20
				),
			);



$array['info'] = 	array(
				'mssv' => 12345,
				'name' => 'Hung',
				'age'  => 20
			);
			
echo '<pre>';
print_r($array);
echo '<\pre>';
//var_dump($array);
















