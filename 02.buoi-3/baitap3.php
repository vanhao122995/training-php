<?php


//B�i 44: H?y t�nh t?ng c�c ch? s? c?a s? nguy�n d��ng n
//n=123  S=1+2+3
//t�ch l?y s? 
//123%10 =12 du 3
//c?ng c�c ch? s? l?i v?i nhau
//ch?y l?i gi� tr? n
//$n = 564;
//$S = 0; 
while($n > 0) {
	//tach so
	$number = $n%10;
	$S = $S + $number;
	$n = floor($n / 10);
  echo $number . '-' . $S . '</br>';
}



//B�i 45: H?y t�nh t�ch c�c ch? s? c?a s? nguy�n d��ng n
//n=123  S = 1 x 2 x 3 =6
//t�ch l?y s?
//Nh�n c�c s? v?i nhau

//$n = 423;
//$S = 1;
while ($n > 0) {
     $number = $n%10;
	 $S = $S * $number;
	 $n = floor($n/10);
	 echo $number . '-' . $S . '</br>';
}


//B�i 47: H?y t�nh t?ng c�c ch? s? ch?n c?a s? nguy�n d��ng n
//n = 1234   S = 2 + 4 =6
//t�ch s? ch?n ra
//C?ng c�c s? ch?n v?i nhau

//$n = 123456;
//$S = 0;
while ($n > 0) {
     $number = $n%10; 
	 if($number % 2 == 0){
	 $S = $S + $number;
	 
	 }
	 $n = floor($n/10);
     
}   //echo 'S = ' . $S . '</br>';


//B�i 48: H?y t�nh t�ch c�c ch? s? l? c?a s? nguy�n d��ng n
//n = 1234   S = 1 + 3 =5
//t�ch s? l? ra
//C?ng c�c s? l? v?i nhau

//$n = 123556;
//$S = 0;
while ($n > 0) {
     $number = $n%10; 
	 if($number % 2 != 0){
	 $S = $S + $number;
	 
	 }
	 $n = floor($n/10);
}   //echo 'S = ' . $S . '</br>';


//B�i 49: Cho s? nguy�n d��ng n. H?y t?m ch? s? �?u ti�n c?a n
//n = 12345   S = 1
//chia n cho 10, n?u > 1 = 12.345 >  12/10=1.2
//tach so dau tien

$n = 82345;
while (($n / 10) > 1) {
   $n = floor($n / 10);
}   
   echo 'n1 = ' . $n ;
