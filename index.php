<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Laboratorio 8</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
	<title>Bootstrap Example</title>  
</head>
<body>




<div  style="background:#3983e2 !important" class="jumbotron text-center">
<h1>DOMÓTICA</h1>
<p>Proyecto final de Arquitectura del Hardware</p>
</div>

<div class = "col-sm-6">
<div class="panel panel-primary">
      <div class="panel-heading"><h3>Panel de control</h3></div>      	
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Luces</a></li>
			<li><a data-toggle="tab" href="#menu1">Puertas</a></li>
			<li><a data-toggle="tab" href="#menu2">Sensores</a></li>
		</ul>
		<div class="panel-body">
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<h3>Luces</h3>
							<div class ="container">			
								<h5>Piso 1 </h5>
								<form action ="domotica.php" method="get">								
								<input type ="submit" class="btn btn-success" name ="onLed1" id ="onLed1" value="Encender">								
								<input type ="submit" class="btn btn-danger" name ="offLed1" id= "offLed1"value="Apagar">			
								</form>
							</div>
							<div class ="container">	
								<h5>Piso 2 </h5>
								<form action ="domotica.php" method="get">
								<input type ="submit" class="btn btn-success" name ="onLed2" id="onLed2" value="Encender">								
								<input type ="submit" class="btn btn-danger" name ="offLed2" id = "offLed2" value="Apagar">
							</div>
							<div class ="container">	
								<h5>Exteriores </h5>
								<form action ="domotica.php" method="get">
								<input type ="submit" class="btn btn-success" name ="onLed3" id = "onLed2" value="Encender">
								<form action ="domotica.php" method="get">
								<input type ="submit" class="btn btn-danger" name ="offLed3" id = "offLed2" value="Apagar">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
					<div class="col-sm-2">
					<h3>Puertas</h3>
						<div class ="container">	
							<h5>Puerta principal </h5>
							<form action ="domotica.php" method="get">
							<input type ="submit" class="btn btn-success" name ="openDoor" id="openDoor" value="Abrir">
							<form action ="domotica.php" method="get">
							<input type ="submit" class="btn btn-danger" name ="closeDoor" value="Cerrar">
						</div>
						<div class ="container">	
							<h5>Garaje</h5>
							<form action ="domotica.php" method="get">
							<input type ="submit" class="btn btn-success" name ="openGaraje" id ="openGaraje" value="Abrir">
							<form action ="domotica.php" method="get">
							<input type ="submit" class="btn btn-danger" name ="closeGaraje" id ="closeGaraje" value="Cerrar">
						</div>			
					</div>
			</div>

			<div id="menu2" class="tab-pane fade">
				<div class="col-sm-3">
					<h3>Sensores</h3>
					<div class ="container">	
						<h5>Sensor de proximidad </h5>
						<form action ="domotica.php" method="post">
						<input type ="submit" class="btn btn-success" name ="onSensorProx" value="Encender">
						<form action ="" method="post">
						<input type ="submit" class="btn btn-danger" name ="offSensorProx" value="Apagar">
					</div>
					<div class ="container">	
						<h5>Sensor de temperatura</h5>
						<form action ="domotica.php" method="post">
						<input type ="submit" class="btn btn-success" name ="onSensorProx" id ="onSensorProx"value="Encender">
						<form action ="domotica.php" method="post">
						<input type ="submit" class="btn btn-danger" name ="offSensorProx" id = "offSensorProx"value="Apagar">
					</div>
				</div>
			</div>    
		</div>
		</div>
	</div>
</div>
<?php
error_reporting(0);
?>

<div class="col-sm-4">
<div class="panel panel-primary">
      <div class="panel-heading"><h3>Monitoreo</h3></div>
      <div class="panel-body">
	  	<div class="alert alert-success">
 	 		<strong>Temperatura actual:</strong>
		</div>
		<div id="led-info1">
			<?php
			try {
				if($_GET["onLed1"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOnPiso1.py");
					?>
					<script>
					 $("#led-info1").html('<div class="alert alert-success" id="led-info1"><h5>Luces del piso 1 encendidas</h5>');
		 			</script>
					 <?php
					

			}}catch(Exception $e){}
			try{
				if($_GET["offLed1"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOffPiso1.py");
					?>
					<script>
					 $("#led-info1").html('<div class="alert alert-danger" id="led-info1"><h5>Luces del piso 1 apagadas</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?> 
				 		
		</div>
		
		<div id="led-info2">
		<?php
			try {
				if($_GET["onLed2"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOnPiso2.py");
					?>
					<script>
					 $("#led-info2").html('<div class="alert alert-success" id="led-info2"><h5>Luces del piso 2 encendidas</h5>');
		 			</script>
					 <?php
					//

			}}catch(Exception $e){}
			try{
				if($_GET["offLed2"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOffPiso2.py");
					?>
					<script>
					 $("#led-info2").html('<div class="alert alert-danger" id="led-info2"><h5>Luces del piso 2 apagadas</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?>  	 		
		</div>
		</div>
		<div id="led-info3"> 
		<?php
			try {
				if($_GET["onLed3"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOnPiso3.py");
					?>
					<script>
					 $("#led-info3").html('<div class="alert alert-success" id="led-info3"><h5>Luces exteriores encendidas</h5>');
		 			</script>
					 <?php
					//

			}}catch(Exception $e){}
			try{
				if($_GET["offLed3"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/leds/ledOffPiso3.py");
					?>
					<script>
					 $("#led-info3").html('<div class="alert alert-danger" id="led-info3"><h5>Luces exteriores apagadas</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?>  	 			
		</div>

		<div id="puerta-info"> 
		<?php
			try {
				if($_GET["openDoor"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/servoPuerta/open.py");
					?>
					<script>
					 $("#puerta-info").html('<div class="alert alert-success" id="puerta-info"><h5>Puerta abierta</h5>');
		 			</script>
					 <?php
					//

			}}catch(Exception $e){}
			try{
				if($_GET["closeDoor"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/servoPuerta/close.py");
					?>
					<script>
					 $("#puerta-info").html('<div class="alert alert-danger" id="puerta-info"><h5>Puerta cerrada</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?>  	 			
		</div>

		<div id="garaje-info"> 
		<?php
			try {
				if($_GET["openGaraje"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/servoGaraje/open.py");
					?>
					<script>
					 $("#garaje-info").html('<div class="alert alert-success" id="garaje-info"><h5>Garaje abierto</h5>');
		 			</script>
					 <?php
					//

			}}catch(Exception $e){}
			try{
				if($_GET["closeGaraje"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/servoGaraje/close.py");
					?>
					<script>
					 $("#garaje-info").html('<div class="alert alert-danger" id="garaje-info"><h5>Garaje cerrado</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?>  	 			
		</div>

		<div id="sensor-info"> 
		<?php
			try {
				if($_GET["onSensorProx"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/ultrasonido_on.py");
					?>
					<script>
					 $("#sensor-info").html('<div class="alert alert-success" id="sensor-info"><h5>Sensor de proximidad activado</h5>');
		 			</script>
					 <?php
					//

			}}catch(Exception $e){}
			try{
				if($_GET["offSensorProx"] != null){
					$a= exec("sudo python /home/pi/Desktop/DOMOTICA/App/controllers/servo/ultrasonido_off.py");
					?>
					<script>
					 $("#garaje-info").html('<div class="alert alert-danger" id="sensor-info"><h5>Sensor de proximidad desactivado</h5>');
		 			</script>
					 <?php	
			}}catch(Exception $e){}
			
			?>  	 			
		</div>
	  </div> 
</div>

</body>
</html>

