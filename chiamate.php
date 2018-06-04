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
<!DOCTYPE HTML>
<html>
   <head>
      <title>Chiamate - Alfa0 </title>
      <meta charset="utf-8">
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
               <li><a href="Logout.php">Logout</a></li>
            </ul>
         </div>
      </nav>
      <div class="row">
         <table>
            <thead>
               <tr>
                  <th>ID Chiamata</th>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Via</th>
                  <th>Numero</th>
                  <th>Citta</th>
                  <th>Comune</th>
                  <th>Motivo Chiamata</th>
                  <th>Codice</th>
                  <th>Macchina Assegnata </th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql = 'SELECT ID_Chiamata, Nome, Cognome, Via, Numero, Citta, Comune, Motivo_chiamata, codice, macchinaAssegnata FROM chiamate ORDER BY ID_Chiamata DESC';
                  mysqli_select_db($conn, $dbname);
                  $retval = mysqli_query( $conn, $sql);
                  if(! $retval ) {
                     die('Impossibile recuperare i dati. ' . mysqli_error());
                  }
                  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                     echo("<tr>");
                     echo("<td>");
                     echo($row['ID_Chiamata']);
                     echo("</td> <td>");
                     echo($row['Nome']);
                     echo("</td> <td>");
                     echo($row['Cognome']);
                     echo("</td> <td>");
                     echo($row['Via']);
                     echo("</td> <td>");
                     echo($row['Numero']);
                     echo("</td> <td>");
                     echo($row['Citta']);
                     echo("</td> <td>");
                     echo($row['Comune']);
                     echo("</td> <td>");
                     echo($row['Motivo_chiamata']);
                     echo("</td> <td>");
                     echo($row['codice']);
                     echo("</td> <td>");
                     echo($row['macchinaAssegnata']);
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
