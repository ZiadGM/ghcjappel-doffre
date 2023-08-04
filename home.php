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
    <link rel="stylesheet" href="home.css">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>liste des appel d'offre</title>
  
</head>
<body style="margin: 50px;" class="bg-dark text-white">
  <h2 >les appels d'offres</h2>
    <div class="somme">
        <form action="home.php"  method="post">
            <table class="table">
                <tr class="bg-dark text-white">
                    <th>Id</th>
                    <th >Titre</th>
                    <th>Prix(DH)</th>
                    <th>Object</th>
                    <th>Ajouter par</th>
                    <th>autre</th>
                </tr>
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
<tr><td><?php   echo$row['NM'];?></td>
<td><?php echo$row['Title']; ?></td>
<td><?php echo$row['prix']; ?></td>
<td><?php echo$row['object']; ?></td>
<td><?php echo$row['added_by']; ?></td>
</tr>
<?php
                }
              }


            }
            ?>
            </table>
        </form>
    </div>
</body>
</html>