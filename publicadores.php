<?php
include_once("obj.php");
if(isset($_GET["pagina"])){
  if($_GET["pagina"]==1){
    header("location:publicadores.php");
  }else{
    $pagina=$_GET["pagina"];
  }
}else{
  $pagina=1;
}
$publicadores=$dbterritorios->listar_publicador($pagina);

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
      <div class="row">
      <div class="col-md-9">
      </div>
      <div class="col-md-2">
          <a href="samplepdf.php"><button class="pdf" type="button">GENERAR PDF DE CON LA INFORMACION DE LOS TERRITORIOS</button></a>
        </div>
        </div>
      <div class="col-md-1">
      </div>
    </div>
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 buscador">
            <form class="form-inline" action="buscar_publicador.php" method="POST">
              <div class="form-group">
                <label for="exampleInputName2">Buscar Publicador</label>
                <input type="text" class="form-control" id="exampleInputName2" name="buscar_publi" placeholder="Buscar">
               </div>
              <button type="submit" class="btn btn-default" name="buscar">BUSCAR</button>
            </form>
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


              foreach ($publicadores as $publicadores) {

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
                  if($publicadores["ID_territorio"]!=0 || $publicadores["ID_territorio2"]!=0 || $publicadores["ID_territorio3"]!=0 || $publicadores["ID_territorio4"]!=0 || $publicadores["ID_territorio5"]!=0 || $publicadores["ID_territorio6"]!=0 || $publicadores["ID_territorio7"]!=0){
                    $territorio_asignado="SI";
                  }else{
                    $territorio_asignado="NO";
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
              echo"<tr>
              <td>";
              for($i=1;$i<=$dbterritorios->total_paginas;$i++){
                echo "<a class='paginacion' href='?pagina={$i}'>{$i}</a>  ";
              }
              echo "</td>
              </tr>";
              ?>
    			</table>
    		</div>
    	</div>
  </body>
</HTML>