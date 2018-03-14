<?php
require_once('dati.php');
session_start();
$_SESSION["Username"]=$_POST["Username"]; 
$_SESSION["Password"]=$_POST["Password"]; 
$query = mysql_query("SELECT * FROM utenti WHERE Username='".$_POST["Username"]."' AND Password ='".$_POST["Password"]."'")  
or DIE('query non riuscita'.mysql_error());

if(mysql_num_rows($query)){       
$row = mysql_fetch_assoc($query); 
$_SESSION["logged"] =true;  
header("location:form.html"); 
}else{
echo "non ti sei registrato con successo"; 
}

?>