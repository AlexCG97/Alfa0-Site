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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    text-align: center;
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

</style>
</head>
<body>

<h2>Login Form</h2>

<form action="home.html" method="post">
  <div class="imgcontainer">
    <img src="ambu.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="Username" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="Password" required>
        
    <button type="submit">Login</button>
  </div>
</form>

</body>
</html>