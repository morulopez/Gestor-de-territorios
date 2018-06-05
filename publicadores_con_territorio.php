<?php
include_once("obj.php");
if(isset($_GET["pagina"])){
  if($_GET["pagina"]==1){
    header("location:publicadores_con_territorio.php");
  }else{
    $pagina=$_GET["pagina"];
  }
}else{
  $pagina=1;
}
$territorios_publicadores=$dbterritorios->lista_territorios_con_publicadores($pagina);
 
?>
<HTML>
	<HEAD>
    <meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="style_territorios.css"> 
	</HEAD>
  <body class="bodypubli">
    <div class="row">
    </div>
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
    		<div class="col-md-10 tabla_publi">
    			<h1 class="publicadores"><strong><span class="glyphicon glyphicon-user publi" aria-hidden="true"></span> / <span class="glyphicon glyphicon-folder-open cartera" aria-hidden="true"></span>   PUBLICADORES CON TERRITORIO</strong> <?php 
        $fecha=date("d-m-y");
        echo "<strong>Hoy es día {$fecha}";
        ?></h1><div class="col-md-4">
      </div>
    			<table class="table table-striped">
      				<tr>
      					<td>
      						<span class="nombre"><strong>Nombre/Apellidos</strong></span>
      					</td>
                <td>
                  <span class="terriasig"><strong>Email</strong></span>
                </td>
                <td>
                  <span class="terriasig"><strong>Territorio Asignado</strong></span>
                </td>
                <td>
                  <span class="terriasig"><strong>Entrega</strong></span>
                </td>
                <td>
                  <span class="terriasig"><strong>Devuelta</strong></span>
                </td>
              </tr>
              <?php
              foreach ($territorios_publicadores as $terri) {
                $fecha=date("y-m-d");
                $devuelta=$terri["devuelta_terri"];
                $devuelta=$devuelta[6].$devuelta[7].$devuelta[5].$devuelta[3].$devuelta[4].$devuelta[2].$devuelta[0].$devuelta[1];
                 if($devuelta<=$fecha){
                 echo "<tr>
                <td>
                  <span class='devuelta'>{$terri['nombre']} /  {$terri['apellidos']}</span>
                </td>
                <td>
                  <span class='devuelta'>{$terri['email']}</span>
                </td>
                <td>
                  <span class='devuelta'>{$terri['num_territorio']} / {$terri['zona']}</span>
                </td>
                <td>
                  <span class='devuelta'><strong>{$terri['entrega_terri']}</strong></span>
                </td>
                <td><span class='devuelta'><strong>{$terri['devuelta_terri']}</strong></span></td>";
                }else{
                  echo "<td>
                  {$terri['nombre']} /  {$terri['apellidos']}
                </td>
                <td>
                  {$terri['email']}
                </td>
                <td>
                  {$terri['num_territorio']} / {$terri['zona']}
                </td>
                <td>
                  <strong>{$terri['entrega_terri']}</strong>
                </td>
                <td><strong>{$terri['devuelta_terri']}</strong></td>";
                }
                echo "
                 <td>
                  <a href='observaciones.php?id={$terri['ID']}' target='blanck'>VER TERRITORIO</a>
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
