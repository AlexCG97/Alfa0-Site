<?php
require_once('dati.php');
session_start();
if(!isset($_SESSION['login_user'])){
   header("Location:login.php");
}else {
  $usernameWeb = $_SESSION['login_user'];
}
?>
<html>
<head>
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
	<title>Inserimento Dati</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <nav>
      <div class="nav-wrapper green darken-2">
        <img src="ambu.png" class="responsive-img" style="vertical-align: middle;margin-bottom:10px;margin-right:10px;width: 50px;"> 
         <span class="indigo-text center-align" id="header-large" style="font-weight:300;font-size:1.3rem;">Benvenuto, <b><?php echo $usernameWeb ?></b></span>
      </div>
    </nav>

    <div class="row">
    <form class="col s12" method="post" action="input.php">
      <div class="row">
        <div class="input-field col s3">
          <i class="material-icons prefix">account_circle</i>
                <input id="cognome" type="text" name="cognome" class="validate">
                <label for="cognome" class="active">Cognome</label>
            </div>
        <div class="input-field col s3">
          <input id="nome" type="text" name="nome" class="validate">
          <label for="nome" class="active">Nome</label>
        </div>
        <div class="input-field col s3">
          <input id="data" type="date" name="data" class="validate">
          <label for="data" class="active">Data di Nascita</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input id="via" type="text" name="via" class="validate">
          <label for="via" class="active">Via</label>
        </div>
        <div class="input-field col s3">
          <input id="numero" type="number" name="numero" class="validate">
          <label for="numero" class="active">Numero</label>
        </div>
        <div class="input-field col s2">
          <input id="citta" type="text" name="citta" class="validate">
          <label for="citta" class="active">Città</label>
        </div>
        <div class="input-field col s2">
          <input id="comune" type="text" name="comune" class="validate">
          <label for="comune" class="active">Comune</label>
        </div>
        <div class="input-field col s2">
          <input id="cap" type="number" name="cap" class="validate">
          <label for="cap" class="active">CAP</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="chiamata" type="text" name="chiamata" class="validate">
          <label for="chiamata" class="active">Motivo della chiamata</label>
        </div>
        <div class="input-field col s3">
      <select name="codice">
        <option value="" disabled selected>Colore</option>
        <option value="bianco"> Bianco </option>
        <option value="verde"> Verde </option>
        <option value="giallo"> Giallo </option>
        <option value="rosso"> Rosso </option>
      </select>
        <label>Codice Emergenza</label>
      </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input value="Operatore" id="operatore" name="operatore" type="text" class="validate">
          <label for="operatore">Operatore</label>
        </div>
        <div class="input-field col s3">
          <?php
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          $sql = 'SELECT Username FROM utenti WHERE Ruolo="ambulanza" AND Occupato="0" ';
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
          echo"<select name='ambulanza'>";
          while($row = mysqli_fetch_assoc($result)) {
          $name=$row["Username"];
          echo '<option value="'.$row["Username"].'">'.$row["Username"].'</option>';
          }
   echo"</select>";
} else {
   echo "0 results";   
} ?>
        </div>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Sent">
      </div>
    </form>
  </div>

<footer class="page-footer green darken-2">
    <div class="container">
        Created by Alex Ghiurca Copyright &copy; 
    </div>
</footer>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script> 
$(document).ready(function() {
    $('select').material_select();
});
</script>
</body>
</html>