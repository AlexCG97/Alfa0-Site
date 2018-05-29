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
		<title>
	 		Registrazione - V 1.0	
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
				<img src="img/ambu.png" class="responsive-img" style="vertical-align: middle;margin-bottom:10px;margin-right:10px;width: 50px;"> 
				<span class="white-text center-align" id="header-large" style="font-weight:300;font-size:1.3rem;">Benvenuto</b></span>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
        			<li><a href="home.php">Home</a></li>
      			</ul>
			</div>
		</nav>

		<div class="row">
    <form class="col s12" method="post" action="API/API_registrazione.php">
      <div class="row">
        <div class="input-field col s3">
          <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text" name="username" class="validate">
                <label for="username" class="active">Username</label>
            </div>
        <div class="input-field col s3">
        	<i class="material-icons prefix">mode_edit</i>
          	<input id="password" type="password" name="password" class="validate">
          	<label for="password" class="active">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
         	<select name="ruolo">
      			<option value="" disabled selected>Seleziona il tuo ruolo</option>
      			<option value="ambulanza">Ambulanza</option>
      			<option value="operatore">Operatore</option>
    		</select>
    		<label>Ruolo</label>
      </div>
  </div>
      <div class="row">
      		<div class="input-field col s3">
          	<input id="targa" type="text" name="targa" class="validate">
          	<label for="targa" class="active">Targa</label>
        	</div>
      	</div>
      <div class="row">
        <input type="submit" name="submit" value="Registrati">
      </div>
    </form>
  </div>

		<footer class="page-footer green darken-2">
        	<div class="container">
				Created by Alex Ghiurca Copyright &copy; 
			</div>
		</footer>
		<!--JavaScript at end of body for optimized loading-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/materialize.js"></script>
		<script> 
		$(document).ready(function() {
   		 $('select').material_select();
		});
	</script>

	</body>
</html>