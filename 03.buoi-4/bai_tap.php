<?php

$array = array(10, 2, 4, 100, 10);// sap xep, de quy, nhi phan 1 ..... 19

//echo '<pre>';
//print_r($array);
//echo '<\pre>';
//echo '<br>';
//duy�t mang
foreach($array as $key => $value) {
	//echo $key . '-' . $value . '</br>';
}

//Tim so lon nhat trong mang nguyen duong - cau truc du lieu va giai thuat
$max = $array[0]; //10
$min = $array[0];
$i;
foreach($array as $key => $value) {
	//so sanh $max voi tung $value
	//gan gia cho max neu lon hon
	if($value > $max) {
		$max = $value;
	}
	if($value < $min) {
		$min = $value;
	}
	
}



//echo $max . '-' . $min;

//tim hop to nhat => tim ra mang co so ptu lon nhat
//tim ptu co gia tri be nhat

$array = array(
				array(1, 2, 3, 4, 6),	
				array(4564, 23, 7, 4, 6, 43, 745, 54),
				array(1, 2, 3, 4, 6, 77, 545),
				array(1, 2, 3, 4, 6, 34),
				array(1, 2, 3),
			);

//keyword => php facebook api login
//ham function => se thuc hien 1 chuc nang nao do dong goi lai
//ham co hai loai: ham thuc thi, ham tra ve ket qua
function name() {//chuc nang in string
	echo 'Function';
}

//function name1() { 
	//return "function";
//}


//name();

//$str = name1();
//viet ham tim gia lon nhat cua 1 mang => tra lai ket qua max trong 1 mang
function getMaxArray() {
	$array = array(10, 2, 4, 100, 10);
	$max = $array[0];
	foreach($array as $key => $value) {
		if($value > $max) {
			$max = $value;
		}		
	}
	
	return $max;
}

echo $max = getMaxArray();
//scope => globle, local





















