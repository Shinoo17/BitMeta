<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
img{
    max-width: 300px;
    max-height: 300px;
    margin: auto;
    text-align: center;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
</style>
</head>

<?php
if($_POST){
    if(isset($_FILES['upload'])){
        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img ="pic/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
    }
}
?>
<body>
    <div class="conatiner">
        <center>
            <a href="test.php"><img src="pic/<?php echo $name_file?>" alt="Avatar"></a>
        </center>
        <div style="text-align: center;">
           <h1>Seres</h1>
           <p class="title">Wep Devoloper</p>
           <p>KMUTNB</p>
           <a href="#"><i class="fa fa-twitter"></i></a>  
           <a href="#"><i class="fa fa-facebook"></i></a> 
           <a href="#"><i class="fa fa-twitch"></i></a>
        </div>
    </div>
</body>
</html>