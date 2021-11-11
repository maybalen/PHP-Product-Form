<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "id17295775_naomi";
 $dbpass = "H^mH4S=QxZ5R@geP";
 $db = "id17295775_dbnaomi";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>