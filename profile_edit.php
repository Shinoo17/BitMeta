<?php
session_start();
if(!isset($_SESSION["User_ID"])){
    header("location:login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php $conn = new PDO("mysql:host=localhost; dbname=bitmeta; charset=utf8","root","");
    $sql = "SELECT * FROM user WHERE User_ID='$_SESSION[User_ID]'";
    $result=$conn->query($sql);
    $row = $result->fetch();
?>
<form action="profile_save.php" method="post" enctype="multipart/form-data">
    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php
                        if($row['Icon']==""){  
                            ?>
                                <img class="rounded-circle mt-5" width="200px" height="300px" src="image/Icon/default-profile.jpg">
                            <?php 
                        }else {
                            ?>
                                <img class="rounded-circle mt-5" width="300px" height="300px" src="image/Icon/<?php echo $row['Icon'] ?>">
                            <?php
                        }
                        ?>
                    <span class="font-weight-bold"><?php echo $row['Username']; ?></span>
                    <input type="file" name="icon">
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="<?php echo $row['Name']; ?>" name="name"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="<?php echo $row['Surname']; ?>" name="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="int" min="0" class="form-control" placeholder="<?php echo $row['phone']; ?>" value="" name="phone" maxlength="10"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="<?php echo $row['Address']; ?>" value="" name="address"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="<?php echo $row['Email']; ?>" value="" name="email"></div>
                        <div class="col-md-12"><label class="labels">ID card number</label><input type="int" min="0" class="form-control" placeholder="<?php echo $row['ID_card_number']; ?>" value="" name="ID_card_number" maxlength="13"></div>
                        <div class="col-md-12"><label class="labels">Job</label><input type="text" class="form-control" placeholder="<?php echo $row['Job']; ?>" value="" name="job"></div>
                    </div>
                    <div class="row mt-3"></div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" name="save">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>