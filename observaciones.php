<?php
include_once("obj.php");
$id_territorio=$_GET['id'];
$observaciones=$dbterritorios->observaciones($id_territorio);

if($observaciones=="e"){
  
 echo "<meta http-equiv='Refresh' content='0;url=observaciones.php?id={$id_territorio}'>";
}
$historial=$dbterritorios->historial($id_territorio);
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
        <div class="col-md-8">
        </div>
       </div>
       <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <h1>HISTORIAL DEL TERRITORIO NUMERO <span class="num_terri"><?php echo $dbterritorios->numero_territorio[0]['num_territorio']."  ".$dbterritorios->numero_territorio[0]['zona']; ?></span></h1>
          <div class="col-md-6 observaciones">
            <?php foreach($historial as $historial){
              echo "{$historial['observacion']}<br>";
            }?>
          </div>
        </div>
        <div class="col-md-1">
        </div>
       </div><br><br>
       <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <h1>OBSERVACIONES</h1>
          <div class="col-md-6 observaciones">
            <table class="table">
           <?php foreach($observaciones as $observaciones){
              echo "<tr><td>{$observaciones['observacionob']}</td> <td><form action='' method='POST'><button type='submit' name='borrar' value={$observaciones['ID']}>borrar</button></form><br></td></tr>";
            }?>
          </table>
          </div>
        </div>
        <div class="col-md-1">
        </div>
       </div><br><br>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span> EDITAR OBSERVACIONES</h1>
          <form action="" method="POST">
              <textarea class="form-control" rows="3" name="observaciones"></textarea><br>
              <button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>
          </form>
        </div>
        <div class="col-md-1">
        </div>
       </div>
     </body>
 </HTML>
 <?php
 if(isset($_POST['borrar'])){
    $dbterritorios->borrarobservacion($_POST['borrar']);
    echo "<html><meta http-equiv='Refresh' content='1;url=observaciones.php?id=$id_territorio'>
              </html>";
  }
 if(isset($_POST['actualizar'])){
  if(strlen($_POST['observaciones'])>0){
    echo $editar=$dbterritorios->editar_observaciones($_POST['observaciones'],$id_territorio);
        header("location:observaciones.php?id={$id_territorio}");
  }else{
    echo"introduzcca datos para poder actualizar las observaciones por favor";
  }
 }
 ?>