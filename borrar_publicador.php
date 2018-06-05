<?php
include_once("obj.php");
$id_publicador=$_GET["id"];
$nombre_publicador=$dbterritorios->listar_nombre($id_publicador);

if(isset($_POST["baja"])){
  $eliminar_usuario=$dbterritorios->eliminar_publicador($id_publicador);

  if($eliminar_usuario){
    header("location:publicadores.php");
  }else{
     echo"Huvo un error al eliminar al usuario,por favor intentelo de nuevo";
}
  }

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
      <div class="col-md-1">
      </div>
  		<div class="col-md-6 tabla_publi">
  			<h1 class="publicadores"><strong><span class="glyphicon glyphicon-thumbs-down x" aria-hidden="true"></span> DAR DE BAJA PUBLICADOR:<?php echo" {$nombre_publicador[0]['nombre']} {$nombre_publicador[0]['apellidos']}"; ?></strong></h1>
  			<form action="" method="POST">
         <button type="submit" class="btn btn-danger" class="boton_asignar2" name="baja"><strong>Dar de baja</strong></button>
       </form>
        </div>
     </div>
   </body>
</HTML>
