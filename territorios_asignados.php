<?php
include_once("obj.php");
if(isset($_GET["pagina"])){
  if($_GET["pagina"]==1){
    header("location:territorios_asignados.php");
  }else{
    $pagina=$_GET["pagina"];
  }
}else{
  $pagina=1;
}
$territorio_asig=$dbterritorios->territorios_asignados($pagina);
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
  			<h1 class="publicadores"><strong><span class="glyphicon glyphicon-ok v" aria-hidden="true"></span> TERRITORIOS ASIGNADOS </strong></h1>
  			<table class="table table-striped">
    				<tr>
    					<td>
    						<span class="id"><strong>NUMERO </strong></span>
    					</td>
              <td>
                <span class="nombre"><strong>ZONA</strong></span>
              </td>
            </tr>
             <?php 
            foreach ($territorio_asig as $territorio_asig) {
                echo"
                <tr>
                  <td>
                    {$territorio_asig['num_territorio']}
                  </td>
                  <td>
                     {$territorio_asig['zona']}
                  </td>
                  <td>
                  </td>
                  <td>
                    <a href='observaciones.php?id={$territorio_asig['ID']}' target='blanck'>VER TERRITORIOS</a>
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
</body>
</HTML>