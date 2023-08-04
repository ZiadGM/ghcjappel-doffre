
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <li><a href="admine.php" class="btn btn-warning">Accueil</a></li>

        
        <li> <a href="add.php" class="btn btn-warning">Ajouter</a></li>
       
        <li><a href="find.php" class="btn btn-warning">Recherche</a></li>
        <li><a href="logout.php" class="btn btn-warning">Logout</a></li>
  
    </div>
  
    <div class="bord"><p class="id"> User: <?php
      echo$_SESSION["user"]; 
      ?></p></div>
      <h2 >les appels d'offres</h2>
    <div class="somme">
        <section class="table_FD">
            <table >
                <thead>
                <tr>
                    <th>Id</th>
                    <th >Titre</th>
                    <th>Prix(DH)</th>
                    <th>Object</th>
                    <th>Ajouter par</th>
                    <th>Suppression</th>
                    <th>Modification</th>
                </tr>
                
                </thead>
            <?php
            $conn=mysqli_connect("localhost","root","","tender");
            if(!$conn){
                echo"error";
            }
            else{
                $sql="SELECT * FROM `add`";
              $result=mysqli_query($conn,$sql);

              if($result->num_rows>0){
                while($row=mysqli_fetch_assoc($result)){
                 
?>
<tbody>
<tr><td><?php   echo$row['NM'];?></td>
<td ><?php echo$row['Title']; ?></td>
<td><?php echo$row['prix']; ?></td>
<td><?php echo$row['object']; ?></td>
<td><?php echo$row['added_by']; ?></td>
<td><botton><a href="Delete.php" class="btn btn-danger"> Delete <?php
$_SESSION["K"]=$row['NM'];  ?> </a></botton>  </td>
<td> <botton><a href="Update.php" class="btn btn-info"> Update <?php
$_SESSION["UPD"]=$row['NM']; ?><a/></botton></td>
</tr>
</tbody>
<?php
                }
              }


            }
            ?>

            </table>
            </section>
            </div>

</body>
</html>