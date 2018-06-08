<?php
require_once('dati.php');
$con=mysqli_connect($servername,$username,$password,$dbname);
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {     
      $myusername = $_POST['Username'];
      $userpassword = $_POST['Password']; 

      $sql = "SELECT * FROM utenti WHERE Username = '$myusername'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);	
      if($count == 1) {
         if(password_verify($userpassword, $row['Password'])){
            $_SESSION['login_user'] = $myusername;
            header("location: home.php");
         }
         else{
            echo("Password non corretta");
         }
      }else {
         $error = "Username o Password non corrette.";
               echo($myusername);
               echo($mypassword);
         echo($error);
      }
   }
?>