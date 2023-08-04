<?php

$conn=mysqli_connect("localhost","root","","tender");
if($conn){ 
$req="SELECT * FROM `add`";
$result=mysqli_query($conn,$req);


}
?>