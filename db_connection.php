<?php

function OpenCon()
 {
 $dbhost = "localhost:8889";
 $dbuser = "root";
 $dbpass = "";
 $db = "techjobproject";


 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
//changed from new mysqli 
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>