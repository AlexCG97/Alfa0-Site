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
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: home.html");
      }else {
         $error = "Username o Password non corrette.";
         echo($error);
      }
   }
?>
<html>
   <head>
      <title>Login</title>
   </head>
   <body>
            <div><b>Login</b></div>				
            <div>              
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "Username" class = "box" required  /><br /><br />
                  <label>Password  :</label><input type = "password" name = "Password" class = "box" required /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
            </div>				
   </body>
</html>