


<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}
?>
<?php
if (isset($_POST["submit"])){ 
    $object = $_POST["object"];
    $NM = $_POST["NM"];
    $prix = $_POST["prix"];
    $date = $_POST["date"];
    $segment = $_SESSION["user"];
    $Title=$_POST["Title"];
   


    if (empty($object) || empty($NM) || empty($prix) || empty($date) || empty($segment) || empty($Title)) {
        echo '<div class="alert alert-danger">Please fill in all fields.</div>';
    } elseif (strlen($NM) < 3) {
        echo '<div class="alert alert-danger">N° must be at least 8 characters long.</div>';
    } elseif(strlen($NM) > 10){
        echo '<div class="alert alert-danger">N° must be less than 8 characters.</div>';
    }
    elseif(strtotime("today")>=strtotime($date)){
        echo '<div class="alert alert-danger">You Have error in Your Date.</div>';

    }
    else {
        $req = "INSERT INTO `add` VALUES ('$NM','$Title', '$object', '$segment', '$prix', '$date')";
        $conn = mysqli_connect("localhost", "root", "", "tender");
        if (mysqli_query($conn, $req)) {
            echo '<div class="alert alert-success">Data inserted successfully!</div>';
        } else {
            die("Error: " . mysqli_error($conn));
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ajouter</title>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

</head>
<body>
    <div class="s">
<li><a href="admine.php" class="btn btn-warning">Accueil</a></li>

        
<li> <a href="add.php" class="btn btn-warning">Ajouter</a></li>

<li><a href="find.php" class="btn btn-warning">Recherche</a></li>
<li><a href="logout.php" class="btn btn-warning">Logout</a></li></div>
<div class="bord"><p class="id"> User: <?php
      echo$_SESSION["user"]; 
      ?></p></div>
<div class="nzl">
<div class="H"><h3>Ajouter une appel d'offre</h3></div>
    <form action="add.php" method="post">
    <div class="object">

        <div class="ad">
        <textarea  name="object" row="5" class="form-control"placeholder="Ajouter votre objective"></textarea>
    </div>
    <div class="ad">
        <input type="text" name="Title"  class="form-control"placeholder="Titre">
    </div>
      
        <div class="ad">
        <input type="text" name="NM"  class="form-control"placeholder="Ajouter une N° pour cet appel d'offre">
    </div>
      
        <div class="ad">
        <input type="number" class="form-control"name="prix" placeholder="Ajouter une prix">
    </div>
        
        <div class="ad">
        <input type="date" name="date"class="form-control" placeholder="Date d'expire"> 
    </div>
        
    
       
        <div class="af">
        <input type="submit" class="btn btn-primary"value="Ajouter" name="submit">
    </div>
    </div>
    </div>
</form>
</body>
</html>