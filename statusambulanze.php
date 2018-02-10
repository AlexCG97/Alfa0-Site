<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestioneambulanze";
   
   $conn = mysqli_connect($servername, $username, $password);
   
   if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }
   
   $sql = 'SELECT Nome, Targa, Occupato, Status FROM ambulanze';
   mysqli_select_db($conn, $dbname);
   $retval = mysqli_query( $conn, $sql);
   
   if(! $retval ) {
      die('Impossibile recuperare i dati: ' . mysqli_error());
   }
   
   while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "Ambulanza Nome:{$row['Nome']}  <br> ".
         "Ambulanza Targa: {$row['Targa']} <br> ".
         "Ambulanza Occupato : {$row['Occupato']} <br> ".
		 "Ambulanza Status : {$row['Status']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Dati recuperati con successo\n";
   
   mysqli_close($conn);
?>