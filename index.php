<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
    .center{ text-align: center;}
    </style>
</head>
<?php if(!isset($_SESSION["Id"])) {?>
<body>
<div class="container"> 
    <h1 class="center ">BIT-MIGHT เพราะเงินของคุณคือเงินของเรา</h1>
        <?php include'nav.php'; ?> 
        <br>
   <div class="d-flex">
       <div>
           <label >หมวดหมู่ :</label>
           <span class="dropdown">
                <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">ทั้งหมด</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                    <?php
                    $conn=new PDO("mysql:host=localhost;dbname=webboard; charset=utf8","root", ""); 
                    $sql="SELECT * FROM category";
                    foreach($conn->query($sql) as $row)
                    {
                        echo"<li><a class=dropdown-item href=#>".$row['name']."</a></li>";
                    }
                    $conn=null;
                    ?>  
                </ul>
            </span>
       </div>
   </div>
   <br>
   <table class="table table-striped">     
    <?php           
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql="SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) 
            INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
        $result=$conn->query($sql);
        while($row=$result->fetch())
        {
            echo " <tr><td>[ ".$row['0']." ]<a href=post.php?ID=" .$row['1']." 
            style=text-decoration:none> " .$row['2']."</a><br>".$row['3']." - ".$row['4']."</td></tr>"; 
        } 
        $conn=null;                         
   ?> 
    </table> 
    </div>

</body>
<?php }  else{ ?> 
    <body>
        <div class="container"> 
    <h1 class="center">BIT-MIGHT เพราะเงินของคุณคือเงินของเรา</h1>
   <?php include'nav.php'; ?>
    <hr>
    <div class="d-flex justify-content-between">
       <div>
           <label >หมวดหมู่ :</label>
           <span class="dropdown">
                <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">ทั้งหมด</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                    <?php
                    $conn=new PDO("mysql:host=localhost;dbname=webboard; charset=utf8","root", ""); 
                    $sql="SELECT * FROM category";
                    foreach($conn->query($sql) as $row)
                    {
                        echo"<li><a class=dropdown-item href=#>".$row['name']."</a></li>";
                    }
                    $conn=null;
                    ?>                    
                </ul>
            </span>
       </div> 
       <div>
            <a href="newpost.php" class="btn btn-success btn-sm" ><i class="bi bi-plus"></i>สร้างกระทู้ใหม่</a>
       </div>
   </div>          
        <br>                
        <table class="table table-striped">     
        <?php           
        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql="SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) 
            INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
        $result=$conn->query($sql);
        while($row=$result->fetch())
        {
            echo " <tr><td>[ ".$row['0']." ]<a href=post.php?ID=" .$row['1']." 
            style=text-decoration:none> " .$row['2']."</a><br>".$row['3']." - ".$row['4']."</td>";
            if($_SESSION['Role']=='a')
            {
                echo "<td><a class='btn btn-danger btn-sm mt-2' href=delete.php?Id=".$row['1'].
                "><i class='bi bi-trash'></i></a></td>";
            }
            
            echo "</tr>"; 
        }
        $conn=null;                          
        ?> 
    </table> 
    </div>    
</body> 
<?php }?>
</html>

