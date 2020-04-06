<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//các dang cua bien variable
$number = -10; // 10, 10.12, null, int, float,....
$tring = '10';//""
//cách 1 khai báo mang
$array = array(); //0-10
//cách 2
$array = array(10, 2, 3);//gán giái tr? cho mang
//date 
//var_dump($array );
//câu dieu kien
//loai 1
if(1) {
	//echo 123;
}
//loai 2
if($number == 10) {
	//echo 'number: ' . $number;
}else {
	//echo 'number: ' . $number;
}

//loai 3 else if => n lan
if($number > 0) {
	//echo 'So duong';
}else if($number < 0) {
	//echo 'So âm ';
} else{
	//echo 'Sô khong';
}
//Bài 1: Tính S(n) = 1 + 2 + 3 + … + n = 3
//		n = 1 => S = 1
//      n = 2 => S = 1 + 2 
//      n = 3 => S = 1 + 2 + 3 = 6
// S = 0
// S1 = n + 1=> 1
//S2 = n => 2

//S5 = S1+S5
$n = 1;
// vong lap
$S = 0;
while($n <= 3) {
	$S = $S + $n;
	$n = $n + 1;
}

echo $S;


//n = 1 => $S = $S + n = 0 + 1 = 1 vong 1 => n = 1 + 1 = 2 => S = 1
//n = 2 => S = 1 => vong 2 => S = 1 + n = 1 + 2 = 3 => n= 3
////n = 3 => S = 3 => vong 3 => S = 3 + n = 3+ 3 = 6 => n= 4




