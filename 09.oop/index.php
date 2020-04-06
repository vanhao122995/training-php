<?php

// class Student {
//     public $name = '';
//     public $code = '';

//     public function __construct($name = '', $code = '') {
//         $this->name = $name;
//         $this->code =  $code;
//     }

//     public function  set_name() {

//     }

//     public function  showInfo() {
//         echo "Tên: $this->name MSSV: $this->code";
//     }

//     function __destruct() {
//         echo "T__destruct";
//     }
// }

// $studentA = new Student();

// $studentA->showInfo();


class Person {
    public $name = 'Tèo';
    protected $v = '100';
    public static $money = '100 tỉ';
    // public function __construct() {
    //     $this->name = 'Tèo';
    // }

    public function  showInfo() {
        echo "Tên: $this->name";
    }

    public function run() {
        echo 'run: ' . $this->v;
    }

    public static function get_money() {
        return self::$money;
    }
}

class Student  extends Person {
    public $code = '123456';
    
    public function __construct() {
        //echo $this->money;
        //echo $this->name;
        //parent::__construct();
    }

    public function  showInfo() {
        parent::showInfo();
        echo " MSSV:  $this->code";
    }

    public function run1() {
        echo 'run child: ' . $this->v;
    }


}

$studentA = new Student('Tèo');

//$studentA->showInfo();
//$studentA->run1();

// $person = new Person;
// // //person->run();
// echo $person->money;

echo Person::get_money();


?>

