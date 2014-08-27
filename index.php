<?php
/**
 * Created by PhpStorm.
 * User: Ctrip
 * Date: 14-8-25
 * Time: 下午5:48
 */
$a = 1;
$b = 2;

stringWithEnter($_POST);



echo ("Test Done!");

$firstVar = "I am Teddy";

stringWithEnter($firstVar);

$firstVar2 = $firstVar;
$firstVar3 = &$firstVar;

$firstVar = "I am Candy";

stringWithEnter($firstVar2);
stringWithEnter($firstVar);
stringWithEnter($firstVar3);
Sum();
Test();
GetDB();

stringWithEnter(__DIR__);
stringWithEnter(__FILE__);
define("TEDDY","Teddy Long");
stringWithEnter("TEDDY");


$onePerson = new Person();
$onePerson->_construct("Teddy");
$onePerson->getSelf();
stringWithEnter($onePerson::THISISCONST);

$myArray = array(1,2,3,4);
foreach($myArray as $value)
{
    settype($value,"string");
    stringWithEnter($value);
}



function stringWithEnter ($string)
{
    echo ("<br/>");
    echo($string);

}


function Sum()
{
    global $a, $b;
    $b = $a + $b;
    echo ("<br/>");
    echo ($b);
}

function Test()
{
    static $count = 0;
    $count++;
    echo("<br/>");
    echo($count);
    if($count <5)
    {
        Test();
    }
    //$count--;

}

function GetDB()
{
    $linkDB = mysql_connect('127.0.0.1:3306','root','');
    if(!$linkDB)
    {
        echo('Could not connect: ' + mysql_error());
    }
    else
    {
        echo ("<br/>");
        echo ("<br/>");
        echo ("Connect Done;");
        echo ("<br/>");
    }

    $query = "SELECT * FROM test.myLog;";
    $result = mysql_query($query);

    $results = array();
    while ($row = mysql_fetch_assoc($result)) {
        //echo $row['Name'];
        //echo $row['Age'];
        //echo $row['Address'];
        //echo $row['Phone'];
        $results[] = $row;
    }
    echo (json_encode($results));
    mysql_free_result($result);

}

class Person
{
    private $name;
    private $age;
    private $address;
    private $phone;
    const THISISCONST = 'Nothing';
    public function _construct($name)
    {
        $this->name = $name;
    }


    function getSelf()
    {
        stringWithEnter($this->name);
    }


}