<?php
include_once("obj.php");
$id_publicador=$_GET["id"];
$nombre_publicador=$dbterritorios->listar_nombre($id_publicador);
$terri_no_asignados=$dbterritorios->territorios_sin_asignar();
?>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="style_territorios.css"> 
	</HEAD>
	<body class="bodyasig">
		<div class="row">
	      <div class="col-md-1">
	      </div>
	       <div class="col-md-10 volver">
	         <nav class="navbar navbar-inverse menu">
	          <div class="container-fluid menu">
	            <ul class="nav navbar-nav navbar-right">
	            	<li ><a class="a_menu" href="index.php">Inicio</a></li>
	              	<li ><a class="a_menu" href="territorios.php">Territorios(editar/observaciones)</a></li>
	              	<li ><a class="a_menu" href="seccion_publicadores.php">Publicadores(asignar)</a></li>
	            </ul>
	          </div>
	        </nav>
	      	</div>
	      <div class="col-md-1">
	      </div>
	    </div>
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-6">
				<h1 class="h1asig"><strong>ASIGNAR TERRITORIO AL PUBLICADOR:<?php echo"<h1>{$nombre_publicador[0]['nombre']}/{$nombre_publicador[0]['apellidos']} </h1>"?><span class="publicadorasig"></span></strong></h1>
				<form class="form-inline" action="" method="POST">
				  <div class="form-group">
				   <div class="form-group">
					  <label for="sel1">TERRITORIO</label>
					  <select class='form-control' id='sel1' name='num_territorio'>
					  <?php 
					  	foreach ($terri_no_asignados as $no_asig) {
					  		echo"
					  		
					    	<option value='{$no_asig['ID']}'>{$no_asig['num_territorio']} / {$no_asig['zona']} </option>";
						}
					    ?>
					</select>
					fecha entrega:<input type="text" name="entrega">
					fecha devuelta:<input type="text" name="devuelta">
					fecha devuelta2:<input type="text" name="devuelta2">
				   </div>
				  </div>
				      <button class="btn btn-default"><a href="publicadores.php">VOLVER</a></button>  <button class="btn btn-default"><a href="territorios_libres.php" target="blank">Ver Territorios/Observaciones</a></button> <button type="submit" class="btn btn-default asignar" name="boton_asig">ASIGNAR</button>
				</form>
			</div>
		</div>
	</body>
</HTML>
<?php
if(isset($_POST["boton_asig"])){
	if($nombre_publicador[0]['ID_territorio']!=0 AND $nombre_publicador[0]['ID_territorio2']!=0 AND $nombre_publicador[0]['ID_territorio3']!=0 AND $nombre_publicador[0]['ID_territorio4']!=0 AND $nombre_publicador[0]['ID_territorio5']!=0 AND $nombre_publicador[0]['ID_territorio6']!=0 AND $nombre_publicador[0]['ID_territorio7']!=0){
		echo"EL USUARIO <strong>{$nombre_publicador[0]['nombre']} {$nombre_publicador[0]['apellidos']}</strong> tiene ya 7 territorios asignados,debe devolver primero algún territorio para poder asignarle uno nuevo <a href='publicadores.php'>(IR A DEVOLVER TERRITORIO)</a>";
	}else{
		 $asignar_territorio=$dbterritorios->entrega_a_mano($id_publicador,$_POST["num_territorio"],$_POST["entrega"],$_POST["devuelta"],$_POST["devuelta2"]);
		 $dbterritorios->actualizar_terri2($asignar_territorio);
		if($asignar_territorio==1){
			echo "<html>
    					<head>
    					<link rel='stylesheet' href='style_territorios.css'>
    					<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
    					</head>
    					<div class='row'>
    					<div class='col-md-2'>
    					</div>
    					<div class='col-md-8'>
    					<h1>TERRITORIO ASIGNADO correctamente</h1>
    					</div>
    					<div class='col-md-2'>
    					</div>
    					<meta http-equiv='Refresh' content='2;url=publicadores.php'>
    					</html>";
		}else if($asignar_territorio!=1){
			echo "HUBO UN ERROR AL ASIGNAR EL TERRITORIO";
		}
}
}

?>