<?php

$servername = "sql310.byetcluster.com";
$username = "epiz_26792831";
$password = "RSn1nGkPWXv";
$db = "epiz_26792831_management";

$connect = mysqli_connect($servername,$username,$password,$db);

if(!$connect)
{
    die("connection failed: ".mysqli_connect_error().'<hr>');
}



?>