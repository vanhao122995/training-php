<?php


//Bài 122: Viết hàm tìm giá trị lớn nhất trong mảng 1 chiều các số thực

function getMaxArray() {
	$array = array(10, 900.1, 900.2, 100, 10);
	$max = $array[0];
	echo '<pre>';
	print_r($array);
	echo '<\pre>';
	foreach ($array as $key => $value){
		if($value > $max){
			$max = $value;
		}
	}
	return $max;	
}
echo 'Bai 122: Gia tri lon nhat = ' . $Max = getMaxArray() . '</br>';


//Bài 123: Viết hàm tìm 1 vị trí mà giá trị tại vị trí đó là giá trị nhỏ nhất trong mảng 1 chiều các số nguyên

function getLocalMinArray() {
	$array = array(200, 53, 5, 2, 10);
	$min = $array[0];
	$loc = 0;
		echo '<pre>';
		print_r($array);
		echo '<\pre>';
	foreach ($array as $key => $value){
		if($value < $min){
			$min = $value;
			$loc = $key;
			}
		
		}
	return $loc;
}
echo 'Bai 123: Vi tri co gia tri nho nhat = ' .  $Location = getLocalMinArray() .'</br>';


//Bài 124: Viết hàm kiểm tra trong mảng các số nguyên có tồn tại giá trị chẵn nhỏ hơn 2004 hay không

function checkLess2004() {
	$array = array(5, 3, 2002, 7, 1);
	$Exist;
	echo '<pre>';
	print_r($array);
	echo '<\pre>' . '</br>';
	foreach ($array as $key => $value){
		if($value % 2 == 0){
			if($value < 2004){
				$Exist = 'Ton tai gia tri chan nho hơn 2004';
				break;
			}	
				$Exist = 'Ko Ton tai gia tri chan nho hơn 2004';
		}
	}
	return $Exist;
}
echo 'Bai 124:' . $Exist = checkLess2004() . '</br>';


//Bài 125: Viết hàm đếm số lượng số nguyên tố nhỏ hơn 100 trong mảng

function countNarray() {
	$array = array(4, 2, 8, 4, 13);
	$count = 0;
	echo '<pre>';
	print_r($array);
	echo '<\pre>' . '</br>';
	foreach ($array as $key => $value){
		//check snt
		$flag = checkSnt($value);
		//check < 100
		if($flag & $value < 100) {
			$count = $count + 1 ;
		}
	} 
	return $count;
}

function checkSnt($value) {//parame default
	//check snt
	$flag = true;
	if ($value == 1){
		$flag = false;
	}
	if ($value == 2){	
		$flag = true;
	}
	if ($value > 2){	
		for($i = 2; $i < $value; $i++) {
			if($value % $i == 0) {
				$flag = false;
			}			
		}
	}
	return $flag;
}



echo 'So luong so nguyen to = ' . $N = countNarray();











//Bài 126: Viết hàm tính tổng các giá trị âm trong mảng 1 chiều các số thực

function summinzero(){
	$array = array(-2,-3, 2, 7, 1);
	$Sum = 0;
	echo '<pre>';
	print_r($array);
	echo '<\pre>' . '</br>';
	foreach ($array as $key => $value){
		if($value < 0){
			$Sum = $Sum + $value;
			}	
		}
	return $Sum;
}
echo 'Bai 126: Tong cac gia tri am = ' . $Summin = summinzero() . '</br>';

//Bài 127: Viết hàm sắp xếp mảng 1 chiều các số nguyên tăng dần
function sortArray(){
	$array = array(-2,-3, -5, 7, 1);
	//sort($array);
	echo '<pre>';
	print_r($array);
	echo '<\pre>' . '</br>';
	foreach ($array as $key => $value);
}		
	sortArray();


//Bài 132: Viết hàm liệt kê các giá trị chẵn trong mảng 1 chiều các số nguyên

function oddArray(){
	$result = array();
	$array = array( 2, 3, 4, 7, 5);
	$odd = 0;
	echo '<pre>';
	print_r($array);
	echo '<\pre>' . '</br>';
	foreach ($array as $key => $value){
			if ($value % 2 == 0 ){
				$result[] = $value;
			}
	}
	return $result;
}
$arrayOdd = oddArray();

echo '<pre>';
print_r($arrayOdd);
echo '<\pre>' . '</br>';





























