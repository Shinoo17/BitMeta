<?php
session_start();
if(!isset($_SESSION["username"])){
    header("location:login.php");
    die();
}

$name=$_POST['name'];
$surname=$_POST['surname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$ID_card_number=$_POST['ID_card_number'];
$job=$_POST['job'];
$email=$_POST['email'];
$icon=$_POST['icon'];

$conn = new PDO("mysql:host=localhost; dbname=bitmeta; charset=utf8","root","");

$sql="INSERT INTO user (Name,Surname,Phone,Address,ID_card_number,Job,Email,Icon) 
VALUES('$name','$surname','$phone','$address','$ID_card_number','$job','$email','$icon')";
$conn->exec($sql);
$_SESSION["save_profile"]="success";

?>