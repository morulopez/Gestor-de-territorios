<?php
include_once("obj.php");
?>
<HTML>
	<HEAD>
    <meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="style_territorios.css"> 
	</HEAD>
	<body class="bodypubli">
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
      	<div class="col-md-2">
      	</div>
      	<div class="col-md-8">
      		<h1><span class="glyphicon glyphicon-hand-right v" aria-hidden="true"></span> CREAR NUEVO PUBLICADOR</h1>
      		<form class="form-horizontal form_crearpubli" action="" method="POST">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label crear_publi">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre" name="nombre">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label crear_publi">Apellidos</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="apellidos" name="apellidos">
			    </div>
			  </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label crear_publi">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email">
          </div>
        </div>
			  <div class="form-group">
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" name="crear">CREAR</button>
			    </div>
			  </div>
			</form>
      	</div>
      	<div class="col-md-2">
      	</div>
      </div>
	</body>
</HTML>
<?php
if(isset($_POST["crear"])){
 $crear_publicador=$dbterritorios->crear_publicador($_POST["nombre"],$_POST["apellidos"],$_POST["email"]);

 
 if($crear_publicador!=1){
  echo  "<html>
              <head>
              <link rel='stylesheet' href='style_territorios.css'>
              <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
              </head>
              <div class='row'>
              <div class='col-md-2'>
              </div>
              <div class='col-md-8'>
              <h1>EL NOMBRE O APELLIDOS INTRODUCIDOS NO SON VALIDOS,POR FAVOR INTRODUZCALOS DE NUEVO</h1>
              </div>
              <div class='col-md-2'>
              </div>
              </html>";
 }else{
  echo      "<html>
              <head>
              <link rel='stylesheet' href='style_territorios.css'>
              <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
              </head>
              <div class='row'>
              <div class='col-md-2'>
              </div>
              <div class='col-md-8'>
              <h1>Usuario <span  class='usuario'>{$_POST["nombre"]} {$_POST["apellidos"]}</span> con Email: <span  class='usuario'>{$_POST["email"]}</span> creado correctamente</h1>
              </div>
              <div class='col-md-2'>
              </div>
              </html>";
              header("refresh:2;url=crear_publicador.php");
 }
}

?>