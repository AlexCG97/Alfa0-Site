<?php
session_start();
if(!isset($_SESSION['login_user'])){
   header("Location:login.php");
}else {
	$username = $_SESSION['login_user'];
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

#header {
    overflow: hidden;
	color: white;
    background-color: black;
    position: sticky;
    top: 0;
}
#left{
    width: 33.3333333333%;
    margin-left: auto;
    left: auto;
    right: auto;
}

#right{
    width: 33.3333333333%;
    margin-left: auto;
    left: auto;
    right: auto;
}

#center{
    width: 33.3333333333%;
    margin-left: auto;
    left: auto;
    right: auto;
}

body {
	font-family: "Roboto";
}
	</style>
	<title>
	 Homepage - V 1.0	
	</title>
	<link rel="stylesheet" href="styles.css">
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
				 <span class="indigo-text center-align" id="header-large" style="font-weight:300;font-size:1.3rem;">Benvenuto, <b><?php echo $username ?></b></span>
			</div>
		</nav>
		<div class="row">
			<div class="col s10	m3">
      			<div class="card">
        			<div class="card-image">
         	 			<img src="add.png" alt="add" class="add">
         			 	<span class="card-title grey-text text-darken-4"><b>Aggiungi Chiamata</b></span>
       		 		</div>
        			<div class="card-content">
          				<p>Inserisci una nuova missione da inviare ad una ambulanza.</p>
        			</div>
        			<div class="card-action">
          				<a href="form.php">Clicca qui</a>
        			</div>
      			</div>
    		</div>
    		<div class="col s10	m3">
      			<div class="card">
        			<div class="card-image">
         	 			<img src="ambu1.png" alt="ambu1" class="ambu1">
         			 	<span class="card-title grey-text text-darken-4"><b>Visualizza Status Ambulanze</b></span>
       		 		</div>
        			<div class="card-content">
          				<p>Visualizza lo status delle ambulanze disponibili.</p>
        			</div>
        			<div class="card-action">
          				<a href="statusambulanze.php">Clicca qui</a>
        			</div>
      			</div>
    		</div>
    		<div class="col s10	m3">
      			<div class="card">
        			<div class="card-image">
         	 			<img src="chiamata.png" alt="chiamata" class="chiamata">
         			 	<span class="card-title grey-text text-darken-4"> <b> Visualizza Missioni</b></span>
       		 		</div>
        			<div class="card-content">
          				<p>Visualizza tutte le missioni inserite e quelle al momento attive.</p>
        			</div>
        			<div class="card-action">
          				<a href="chiamate.php">Clicca qui</a>
        			</div>
      			</div>
    		</div>
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