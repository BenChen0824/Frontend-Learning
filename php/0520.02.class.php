<?php
header('Content-Type: text/plain');

class Person{
    static private $count = 0;// 靜態屬性
    //屬性宣告
    var $name;
    public $mobile;
    private $secretno = 'secret';

    //建構函示定義
    function __construct($name='',$mobile='')
    {
        Person::$count++;
        $this->name = $name;
        $this->mobile = $mobile;
    }

    //方法定義
    static function count(){
        return Person::$count;
    }
}

$p1 = new Person;
$p1->name = 'David';
$p1->mobile = '0912345678';


echo "{$p1->name} \n";

echo "{$p1->mobile} \n";





$a=new Person('Amy','0945678912');
var_dump($a);

$b=new Person('Amy','0945678912');
$c=new Person('Amy','0945678912');
//呼叫函示時會增加人數 下方會做改變
echo "共有 ". Person::count(). " 人";