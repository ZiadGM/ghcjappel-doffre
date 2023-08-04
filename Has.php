<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existe</title>
    <link href="find2.css" rel="stylesheet"></link>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
<div class="menu">
        <li><a href="admine.php" class="btn btn-warning">Accueil</a></li>

        
        <li> <a href="add.php" class="btn btn-warning">Ajouter</a></li>
       
        <li><a href="find.php" class="btn btn-warning">Recherche</a></li>
        <li><a href="logout.php" class="btn btn-warning">Logout</a></li>
  
    </div>
    <div class="bord"><p class="id"> User: <?php
      echo$_SESSION["user"]; 
      ?></p></div>
    <form action="Has.php" method="post">
        <div class="tab2">
        <h5>Votre appel d'offre est existe</h5>
        <div class="tab">
        <table class="table">
           <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>prix</th>
                <th>object</th>
                <th>date d'expire</th>
            </tr>
            </thead>
         
              <tr>
         <td><?php echo $_SESSION['NM']; 
         ?></td>
         <td><?php echo$_SESSION["Title"];?></td>
         <td><?php echo$_SESSION["prix"];?></td>
         <td><?php echo$_SESSION["object"];?></td>
         <td><?php echo$_SESSION["date_limite"];?></td>
         
         
                </tr>
            
        </table>
        </div>
        </div>
    </form>
</body>
</html>