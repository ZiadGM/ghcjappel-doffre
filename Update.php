<?php
session_start();

if (isset($_POST["submit"])){ 
    $object = $_POST["object"];
   
    $prix = $_POST["prix"];
    $date = $_POST["date"];
    $segment = $_SESSION["user"];
    $Title=$_POST["Title"];



    if (empty($object) || empty($prix) || empty($date) || empty($segment) || empty($Title)) {
        echo '<div class="alert alert-danger">Please fill in all fields.</div>';
    }
    elseif(strtotime("today")>=strtotime($date)){
        echo '<div class="alert alert-danger">You Have error in Your Date.</div>';

    }
    else{
        include"BASE.php";
        $E = $_SESSION["UPD"];
        $sql="update `add` set prix=?,object=?,date_limite=?,Title=? where NM=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"issss",$prix,$object,$date,$Title,$E);
        if(mysqli_execute($stmt)){
                    echo '<div class="alert alert-success">Fin</div>';
                    header("location:admine.php");
                    exit;
        }
        mysqli_stmt_close($stmt);
    }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<form method="post" action="Update.php">
<p>Modification<p>
 <div class="object">

        <div class="ad">
        <textarea  name="object" row="5" class="form-control"placeholder="votre objective"></textarea>
    </div>
    <div class="ad">
        <input type="text" name="Title"  class="form-control"placeholder="Titre">
    </div>
      
     
      
        <div class="ad">
        <input type="number" class="form-control"name="prix" placeholder="Ajouter le prix">
    </div>
        
        <div class="ad">
        <input type="date" name="date"class="form-control" placeholder="Date d'expire"> 
    </div>
        
    
       
        <div class="af">
        <input type="submit" class="btn btn-primary"value="Update" name="submit">
    </div>
    </form>
</body>
</html>