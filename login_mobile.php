<?php
require_once('dati.php');

$usernameinserito = $_POST["Username"];
$passwordinserita = $_POST["Password"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
     $sql = "SELECT * FROM utenti WHERE Username = '$usernameinserito'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);	
      if($count == 1) {
         if(password_verify($passwordinserita, $row['Password'])){
         	echo("success");
         }
         else{
            echo("error");
         }
      }else {
         echo("error");
      }

?>