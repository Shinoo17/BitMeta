<?php
session_start();
if(!isset($_SESSION["User_ID"])){
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
$sql1 = "SELECT * FROM user WHERE User_ID='$_SESSION[User_ID]'";
$result=$conn->query($sql1);
$row = $result->fetch();
if($name=="")$name = $row['Name'];
if($surname=="")$surname = $row['Surname'];
if($phone=="")$phone = $row['phone'];
if($address=="")$address = $row['Address'];
if($ID_card_number=="")$ID_card_number = $row['ID_card_number'];
if($job=="")$job = $row['Job'];
if($email=="")$email = $row['Email'];

$sql="UPDATE user SET Name='$name',Surname='$surname',phone='$phone',Address='$address',
      ID_card_number='$ID_card_number',Job='$job',Email='$email' 
      WHERE User_ID='$_SESSION[User_ID]'";

$conn->exec($sql);
$_SESSION["save_profile"]="success";


$conn=null;
header("location:profile.php");
die();
?>