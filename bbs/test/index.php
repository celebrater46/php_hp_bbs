<?php

// convert from yybbs log

$list = "list.txt";
//$txt = "";
$log = file("test.log");

foreach ($log as $line){
    $temp = explode("<>", $line);
    $txt = "comments/" . $temp[0] . ".txt";
    error_log($temp[0] . "|" . $temp[1] . "|" . $temp[2] . "|" . $temp[3] . "|" . $temp[4] . "\n", 3, $list);
    $temp2 = str_replace("<br>", "\n", $temp[6]);
    error_log($temp2, 3, $txt);
}