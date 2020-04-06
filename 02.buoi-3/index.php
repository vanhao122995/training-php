<?php

//Toan tu (oprater): + - * / %
//toan tu so sánh: >, <, >=, <=, !=, !, ==, ===, ? <=> if/else, =
//Kiêu du lieu: number, string, array, boolean: 1/0 = true/false

$flag = false;

//var_dump($flag );
$number = '10';

//f($number > 10) {
	//echo 'So lon hon 10';
//}else {
	////echo 'So be hon 10';
//}

//if($number === 10) {
	//echo 'So lon hon 10';
//}

//$number = 15;

//$a = $number == 10 ? 'So 10' : 'So khong phai 10';

//echo $a;

//vong lap: while, for
//Bài 1: Tính S(n) = 1 + 2 + 3 + … + n
$s = 0;
for($n = 1; $n <= 5; $n = $n + 1) {//0, 1, 2, 3, 4  = 5 lan
	//echo $n . '</br>';
	$s = $s + $n;
}

//echo $s;
//Bài 43:  Ðêm so luong so nguyen duong n = 1000 == 4 chu so , 123 = 3 chu so
//$n = 100;
//$count = 0;
//while($n >= 1) {
	//echo $n = $n/10 . '</br>';
	//$count = $count + 1;
//}

//echo $count;

//Bài 46: hay dem so luong sô le cua so nguyen duong n = 1234567 8 9 = 5 chu so le => 12345678,9
//123 chia 10 (/,%) = 12x10 + 3 = 3
//check n chia het 2 -> chan ->le 3 chia 2 = 1 du 1 = 1x2 + 1
//

$n = 123;
$count = 0;
while($n > 0) {//10%2 = 5 du 0 9%2 = 4 du 1
	//tach so
	$number = $n%10;
	
	//check so le
	if($number%2 != 0) {//la so chan != == !
		$count = $count + 1; //1
	}
	$n = floor($n/10); //=> 1.2.3 => lam tron => 12
	
	echo $n . '-' . $number .'</br>';
}

echo $count;

//44, 45, 47, 48, 49













