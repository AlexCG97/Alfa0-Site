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
        <option value="Rosso"> Rosso </option>
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
          $ID=$row["ID_Utenti"];
          $name=$row["Username"];
          echo"<option value=" .$ID." name='ambulanza'>".$name."</option>"  ; //da fixare la query che inserisce
          }
   
   echo"</select>";
   echo "<br>";
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
<!--<table border="0">
  <tr>
    <td align="center">Inserisci i dati richiesti</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="post" action="input.php">
        <tr>
          <td>Nome</td>
          <td><input type="text" name="nome" size="20">
          </td>
        </tr>
		<tr>
          <td>Cognome</td>
          <td><input type="text" name="cognome" size="20">
		  </td>
        </tr>
        <tr>
          <td>Via</td>
          <td><input type="text" name="via" size="20">
        </td>
        </tr>
		<tr>
          <td>Numero</td>
          <td><input type="text" name="numero" size="20">
          </td>
        </tr>
		<tr>
          <td>Città</td>
          <td><input type="text" name="citta" size="20">
          </td>
        </tr>
		<tr>
          <td>Comune</td>
          <td><input type="text" name="comune" size="20">
          </td>
        </tr>
		<tr>
          <td>CAP</td>
          <td><input type="number" name="cap" size="20">
          </td>
        </tr>
		<tr>
          <td>Data Di Nascita</td>
          <td><input type="date" name="data" size="20">
          </td>
        </tr>
		<tr>
          <td>Motivo Chiamata</td>
          <td><input type="text" name="chiamata" size="20">
          </td>
        </tr>
		<tr>
          <td>Codice</td>
          <td>
		  <select name="codice">
			<option value="bianco" selected> Bianco </option>
			<option value="verde"> Verde </option>
			<option value="giallo"> Giallo </option>
			<option value="Rosso"> Rosso </option>
		  </select>
          </td>
        </tr>
		<tr>
          <td>Operatore</td>
          <td><input type="text" name="operatore" size="40">
          </td>
        </tr>
        <tr>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="Sent"></td>
        </tr>
        </form>
        </table>
      </td>
    </tr>
</table>
-->
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