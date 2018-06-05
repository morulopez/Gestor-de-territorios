<?php
include_once("obj.php");
if(isset($_GET["pagina"])){
  if($_GET["pagina"]==1){
    header("location:lista_territorios.php");
  }else{
    $pagina=$_GET["pagina"];
  }
}else{
  $pagina=1;
}
$lista_territorios=$dbterritorios->listar_territorios($pagina);
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
  			<h1 class="publicadores"><strong><span class="glyphicon glyphicon-star estrella" aria-hidden="true"></span> TODOS LOS TERRITORIOS </strong></h1>
  			<table class="table table-striped">
    				<tr>
    					<td>
    						<span class="id"><strong>NUMERO </strong></span>
    					</td>
    					<td>
    						<span class="nombre"><strong>ASIGNADO</strong></span>
    					</td>
              <td>
                <span class="nombre"><strong>ZONA</strong></span>
              </td>
            </tr>
            <?php
            foreach ($lista_territorios as $lista_terri) {
              if($lista_terri["asignado"]==0){
                $asignado="NO";
              }else{
                $asignado="SI";
              }
            echo"
            <tr>
              <td>
              {$lista_terri['num_territorio']}
              </td>
              <td>
              {$asignado}
              </td>
              <td>
              {$lista_terri['zona']}
              </td>
              <td>
                <a href='observaciones.php?id={$lista_terri['ID']}' target='blanck'>VER TERRITORIO</a>
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