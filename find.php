<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="find.css"> 

  <title>Recherche</title>
</head>
<body>
<div class="bord"><p class="id"> User: <?php
      echo$_SESSION["user"]; 
      ?></p></div>
<div class="menu">
        <li><a href="admine.php" class="btn btn-warning">Accueil</a></li>

        
        <li> <a href="add.php" class="btn btn-warning">Ajouter</a></li>
       
        <li><a href="find.php" class="btn btn-warning">Recherche</a></li>
        <li><a href="logout.php" class="btn btn-warning">Logout</a></li>
  
    </div
    <div class="container">
      <div class="row">
        <div class="change">
    
  <form action="find.php" method="post">
          <div class="form-group">
            <label for="Nm">Entrer le N°</label>
            <input type="text" class="form-control" name="Nm" id="Nm" required>
          </div>
          <div class="form-group">
            <div class="sub">
            <input type="submit" class="btn btn-primary" value="Find" name="sub">
            </div>
          </div>
              <?php


if(isset($_POST["sub"])){
$Id=$_POST["Nm"];
require_once "BASE.php";
if(empty($Id)){
echo"<div class='alert alert-danger'>empty input</div>";
}elseif(strlen($Id)>12 || strlen($Id)<4){
    echo"<div class='alert alert-danger'>Error in Your N°</div>"; 
}else{
    $p=0;
while($Finaly=mysqli_fetch_assoc($result)){
    if(strcmp($Finaly['NM'],$Id)==0){
        $_SESSION["NM"]=$Id;
        $_SESSION["Title"]=$Finaly["Title"];
        $_SESSION["prix"]=$Finaly["prix"];
        $_SESSION["object"]=$Finaly["object"];
        $_SESSION["date_limite"]=$Finaly["date_limite"];
        header("location:Has.php");
        $p=1;
    }
  
}
if($p!=1){
        echo"<div class='alert alert-danger'>Error in Your N° Again</div>"; 

}
}
}



?>

          </form
        </div>
      </div>
    </div>
  </form> 
</body>
</html>

