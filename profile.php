<?php 
session_start();
?>
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
    max-height: 400px;
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


<body>
    <div class="container">
        <?php $conn = new PDO("mysql:host=localhost; dbname=bitmeta; charset=utf8","root","");
        $sql = "SELECT * FROM user WHERE User_ID='$_SESSION[User_ID]'";
        $result=$conn->query($sql);
        $row = $result->fetch();
        ?>
        <center>
        <?php 
            $conn = new PDO("mysql:host=localhost;dbname=bitmeta;charset=utf8","root","");
            if($row['Icon']==""){
                ?>
                    <img src="image/Icon/default-profile.jpg" alt="avatar">
                <?php
            }else{
                ?>
                    <img src="image/Icon/<?php echo $row['Icon']?>" alt="avatar">
                <?php
            }
        ?>
        
            
        </center>
        <div style="text-align: center;">
           <h1><?php echo $row["Username"]; ?></h1>
           <p>Name : <?php echo $row["Name"]; ?>&nbsp;&nbsp;<?php echo $row["Surname"]; ?></p>
           <p>Email : <?php echo $row["Email"]; ?></p>
           <p>ID card : <?php echo $row["ID_card_number"]; ?></p>
           <p>Address : <?php echo $row["Address"]; ?></p>
           <p>Work : <?php echo $row["Job"]; ?></p>
           <p>Tel. <?php echo $row["phone"]; ?></p>
           <br>
           <a href="profile_edit.php" class="btn button-link mt-2 btn-primary">edit profile</a>
        </div>
    </div>
</body>
</html>