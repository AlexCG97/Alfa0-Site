<?php
require_once('dati.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['Username'];
      $mypassword = $_POST['Password']; 
      
      $sql = "SELECT id FROM utenti WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($dbname,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      
   </head>
   
   <body>
	
      <div>
         <div>
            <div><b>Login</b></div>
				
            <div>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "Username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "Password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
 <!--              <div><//?php echo $error; ?></div>-->
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>