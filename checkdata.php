<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";
$con=mysqli_connect($servername,$username,$password,$dbname);
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {     
      $myusername = $_POST['Username'];
      $mypassword = $_POST['Password']; 

      $sql = "SELECT ID_Utenti FROM utenti WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);	
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: home.php");
      }else {
         $error = "Username o Password non corrette.";
               echo($myusername);
               echo($mypassword);
         echo($error);
      }
   }
?>