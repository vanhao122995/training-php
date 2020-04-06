<?php


//Bài 44: H?y tính t?ng các ch? s? c?a s? nguyên dýõng n
//n=123  S=1+2+3
//tách l?y s? 
//123%10 =12 du 3
//c?ng các ch? s? l?i v?i nhau
//ch?y l?i giá tr? n
//$n = 564;
//$S = 0; 
while($n > 0) {
	//tach so
	$number = $n%10;
	$S = $S + $number;
	$n = floor($n / 10);
  echo $number . '-' . $S . '</br>';
}



//Bài 45: H?y tính tích các ch? s? c?a s? nguyên dýõng n
//n=123  S = 1 x 2 x 3 =6
//tách l?y s?
//Nhân các s? v?i nhau

//$n = 423;
//$S = 1;
while ($n > 0) {
     $number = $n%10;
	 $S = $S * $number;
	 $n = floor($n/10);
	 echo $number . '-' . $S . '</br>';
}


//Bài 47: H?y tính t?ng các ch? s? ch?n c?a s? nguyên dýõng n
//n = 1234   S = 2 + 4 =6
//tách s? ch?n ra
//C?ng các s? ch?n v?i nhau

//$n = 123456;
//$S = 0;
while ($n > 0) {
     $number = $n%10; 
	 if($number % 2 == 0){
	 $S = $S + $number;
	 
	 }
	 $n = floor($n/10);
     
}   //echo 'S = ' . $S . '</br>';


//Bài 48: H?y tính tích các ch? s? l? c?a s? nguyên dýõng n
//n = 1234   S = 1 + 3 =5
//tách s? l? ra
//C?ng các s? l? v?i nhau

//$n = 123556;
//$S = 0;
while ($n > 0) {
     $number = $n%10; 
	 if($number % 2 != 0){
	 $S = $S + $number;
	 
	 }
	 $n = floor($n/10);
}   //echo 'S = ' . $S . '</br>';


//Bài 49: Cho s? nguyên dýõng n. H?y t?m ch? s? ð?u tiên c?a n
//n = 12345   S = 1
//chia n cho 10, n?u > 1 = 12.345 >  12/10=1.2
//tach so dau tien

$n = 82345;
while (($n / 10) > 1) {
   $n = floor($n / 10);
}   
   echo 'n1 = ' . $n ;
