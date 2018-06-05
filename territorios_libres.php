<?php
include_once("obj.php");
if(isset($_GET["pagina"])){
  if($_GET["pagina"]==1){
    header("location:territorios_libres.php");
  }else{
    $pagina=$_GET["pagina"];
  }
}else{
  $pagina=1;
}
$territorio_noasig=$dbterritorios->listar_territorio_no_asignados($pagina);


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
  			<h1 class="publicadores"><strong><span class="glyphicon glyphicon-remove x" aria-hidden="true"></span> TERRITORIOS SIN ASIGNAR</strong></h1>
  			<table class="table table-striped">
    				<tr>
    					<td>
    						<span class="id"><strong>NUMERO</strong></span>
    					</td>
              <td>
                <span class="nombre"><strong>ZONA</strong></span>
              </td>
              <td>
                <span class="nombre"><strong>TRABAJADO POR ULTIMA VEZ</strong></span>
              </td>
            </tr>
            <?php 
            foreach ($territorio_noasig as $terri_noasig) {
                echo"
                <tr>
                  <td>
                    {$terri_noasig['num_territorio']}
                  </td>
                  <td>
                     {$terri_noasig['zona']}
                  </td>
                  <td class='centrado'>
                      {$terri_noasig['ultima_fecha']}
                  </td>
                  <td>
                    <a href='observaciones.php?id={$terri_noasig['ID']}' target='blanck'>VER TERRITORIO</a>
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