<?php
include_once("obj.php");
if(isset($_POST["buscar"])){
$nombre=$dbterritorios->buscar_publicador($_POST["buscar_publi"]);
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
              <li ><a class="a_menu" href="seccion_publicadores.php">Publicadores(asignar/devolver)</a></li>
            
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
          <h1 class="publicadores"><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> PUBLICADORES</strong></h1>
          <table class="table table-striped">
              <tr>
                <td>
                  <span class="nombre"><strong>Nombre/Apellidos</strong></span>
                </td>
                <td>
                  <span class="nombre"><strong>Email</strong></span>
                </td>
                <td>
                  <span class="terriasig"><strong>Territorio Asignado</strong></span>
                </td>
              </tr>
              <?php
              foreach($nombre as $publicadores){
                if($publicadores["ID_territorio"]!=0 || $publicadores["ID_territorio2"]!=0 || $publicadores["ID_territorio3"]!=0 || $publicadores["ID_territorio4"]!=0 || $publicadores["ID_territorio5"]!=0){
                    $territorio_asignado="SI";
                  }else{
                    $territorio_asignado="NO";
                  }
                   if($publicadores["devuelta"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devuelta"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid2"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid2"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid3"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid3"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid4"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid4"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid5"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid5"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid6"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid6"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 if($publicadores["devueltaid7"]!=NULL){
                 
                 $fecha=date("y-m-d");
                 $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid7"]);
                 if($alerta){
                    echo $mensaje="<h1 class='mensaje'>ALERTA</h1><h3 class='mensaje'>El publicador {$publicadores['nombre']} {$publicadores['apellidos']} no ha devuelto su territorio después de cuatro meses</h3><br>";                 
                 }
                  
                }
                 echo"
                <tr>
                  <td>
                    {$publicadores['nombre']} / {$publicadores['apellidos']}
                  </td>
                  <td>
                    {$publicadores['email']}
                  </td>
                  <td>
                    {$territorio_asignado}
                  </td>
                  <td>
                    <button type='button' class='btn btn-success'><strong><a class='boton_asignar' href='asignar_territorio.php?id={$publicadores['ID']}'>Asignar territorio</a></strong></button> 
                  </td>
                  <td>
                  <button type='button' class='btn btn-danger boton_asignar3'><strong><a  class='boton_asig' href='devolver_territorio.php?id={$publicadores['ID']}'>Devolver territorio</a></strong></button> 
                </td>
                  <td>
                    <button type='button' class='btn btn-danger'><strong><a class='boton_asignar2' href='borrar_publicador.php?id={$publicadores['ID']}'>Borrar publicador</a></strong></button> 
                  </td>
                </tr>";





              }
              ?>
            </htm>
           
