<?php
session_start();

include 'db/dbcon.php';
$conn = OpenCon();

if(isset($_POST['submit_btn']))
  {

$name = $_POST["name"];
$desc = $_POST["desc"];
$price = $_POST["price"];

$sql = "INSERT INTO test_products (name, description, price) VALUES ('$name', '$desc', '$price');";
$conn->query($sql);

unset($_POST['submit_btn']);

}

CloseCon($conn);

header("Location: index.php");
?>