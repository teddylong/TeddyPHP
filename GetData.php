<?php
/**
 * Created by PhpStorm.
 * User: Ctrip
 * Date: 14-8-26
 * Time: 下午2:12
 */

$iType = $_GET['type'];

switch ($iType)
{
    case "GetAllUser":
        $linkDB = mysql_connect('127.0.0.1:3306','root','');

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
        break;
}


