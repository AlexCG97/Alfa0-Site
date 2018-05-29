<?php
require_once('dati.php');
 $conn = mysqli_connect($servername, $username, $password, $dbname);
   if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }
session_start();
if(!isset($_SESSION['login_user'])){
   header("Location:login.php");
}else {
   $usernameWeb = $_SESSION['login_user'];
}
?>

<html>
   <head>
      <link rel="stylesheet" href="styles.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style>
footer {
    padding: 1em;
    color: white;
    background-color: black;
    text-align: center;
   width:100%;
   position: fixed;
    bottom: 0;
}
</style>
   </head>
   <body>
      <nav>
         <div class="nav-wrapper green darken-2">
            <img src="img/ambu.png" class="responsive-img" style="vertical-align: middle;margin-bottom:10px;margin-right:10px;width: 50px;"> 
            <span class="white-text center-align" id="header-large" style="font-weight:300;font-size:1.3rem;">Benvenuto, <b><?php echo $usernameWeb ?></b></span>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
               <li><a href="home.php">Home</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
         </div>
      </nav>
      <div class="row">
         <table>
            <thead>
               <tr>
                  <th>Nome Ambulanza</th>
                  <th>Ambulanza Targa</th>
                  <th>Status Ambulanza</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql = 'SELECT Username, Targa, Occupato FROM utenti WHERE ruolo="ambulanza"';
                  mysqli_select_db($conn, $dbname);
                  $retval = mysqli_query( $conn, $sql);
                  if(! $retval ) {
                     die('Impossibile recuperare i dati. ' . mysqli_error());
                  }
                  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                     echo("<tr>");
                     echo("<td>");
                     echo($row['Username']);
                     echo("</td> <td>");
                     echo($row['Targa']);
                     echo("</td> <td>");
                     if($row['Occupato'] == '0'){
                        echo("Libero");} 
                        else { echo("Occupato");};
                     echo("</td></tr>");
                  }
   ?>

            </tbody>
      </div>


         <footer class="page-footer green darken-2">
            <div class="container">
            Created by Alex Ghiurca Copyright &copy; 
            </div>
         </footer>
         <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
   </body>
</html>
