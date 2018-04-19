<?php
require_once('dati.php');

$id = $_POST["ID"];
$status = $_POST["Status"];
$Data = $_POST["Data"];

$conn = mysqli_connect($servername, $username, $password, $dbname); 
mysqli_query($conn, "SET NAMES 'utf'");
if(! $conn ) {
      die('Errore: ' . mysqli_error());
   }

if($status == "partenza"){
		$query = $conn->query("UPDATE chiamate SET OrarioPartenza = '$Data' WHERE ID_chiamata LIKE '$id'");
	//$query = $conn->prepare($query);
	//query->execute();
} else if($status == "arrivoPosto"){
		$query = $conn->query("UPDATE chiamate SET Orario_ArrivoPosto = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "bianco"){
		$query = $conn->query("UPDATE chiamate SET Codice_Rientro = 0, Orario_Partenza = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "verde"){
		$query = $conn->query("UPDATE chiamate SET Codice_Rientro = 1, Orario_Partenza = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "giallo"){
		$query = $conn->query("UPDATE chiamate SET Codice_Rientro = 2, Orario_Partenza = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "rosso"){
		$query = $conn->query("UPDATE chiamate SET Codice_Rientro = 3, Orario_Partenza = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "arrivoPS"){
		$query = $conn->query("UPDATE chiamate SET Orario_PS = '$Data' WHERE ID_chiamata LIKE '$id'");
}else if($status == "libero"){
		$query = $conn->query("UPDATE chiamate SET Orario_Libero = '$Data' WHERE ID_chiamata LIKE '$id'");
}

if($query)
{
echo "Success";

}
else
{
echo "Error";

}
?>