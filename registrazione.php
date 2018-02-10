<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";
session_start();
$_SESSION["Username"]=$_POST["Username"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
$_SESSION["Password"]=$_POST["Password"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
$query = mysql_query("SELECT * FROM utenti WHERE Username='".$_POST["Username"]."' AND Password ='".$_POST["Password"]."'")  //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log
or DIE('query non riuscita'.mysql_error());
// Con il SELECT qua sopra selezione dalla tabella users l utente registrato (se lo è) con i parametri che mi ha passato il form di login, quindi
// Quelli dentro la variabile POST. username e password.
if(mysql_num_rows($query)){        //se c'è una persona con quel nome nel db allora loggati
$row = mysql_fetch_assoc($query); // metto i risultati dentro una variabile di nome $row
$_SESSION["logged"] =true;  // Nella variabile SESSION associo TRUE al valore logge
header("location:form.html"); // e mando per esempio ad una pagina esempio.php// in questo caso rimanderò ad una pagina prova.php
}else{
echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa di errore
}

?>