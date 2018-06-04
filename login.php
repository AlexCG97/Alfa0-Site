<?php
   session_start();
?>
<!DOCTYPE HTML>
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
<title>Login - Alfa0</title>
<meta charset="utf-8">
</head>
<body>

<h2>Login</h2>
  <div class="imgcontainer">
    <img src="img/ambu.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <form action="checkdata.php" method="post">
    <label for="uname"><b>Username</b></label><br>
    <input type="text" placeholder="Inserisci L'Username" name="Username" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Inserisci la Password" name="Password" required>
        
    <button type="submit">Login</button>
  </form>
  </div>

</body>
</html>