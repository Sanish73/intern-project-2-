<?php


session_start();
ob_start();

define('HOST','localhost');
define('USER' , 'root');
define('PASSWORD' , '');
define('DATABSE', 'intern(2)');


$conn  = mysqli_connect(HOST, USER , PASSWORD , DATABSE) or die("Conn error!!!");

if($conn){
    // echo "hie";
}



?>