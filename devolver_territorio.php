<?php 
include_once("obj.php");
$id=$_GET['id'];
$nombre=$dbterritorios->listar_nombre($id);
$id_terri=$dbterritorios->id_territorio($id);
	if(!empty($id_terri[0]["ID_territorio"])){
	$num_territorio=$dbterritorios->numero_territorio($id_terri[0]["ID_territorio"]);
	}

	if(!empty($id_terri[0]["ID_territorio2"])){
	$num_territorio2=$dbterritorios->numero_territorio2($id_terri[0]["ID_territorio2"]);
	}
	if(!empty($id_terri[0]["ID_territorio3"])){
	$num_territorio3=$dbterritorios->numero_territorio3($id_terri[0]["ID_territorio3"]);
	}
	if(!empty($id_terri[0]["ID_territorio4"])){
	$num_territorio4=$dbterritorios->numero_territorio4($id_terri[0]["ID_territorio4"]);
	}
	if(!empty($id_terri[0]["ID_territorio5"])){
	$num_territorio5=$dbterritorios->numero_territorio5($id_terri[0]["ID_territorio5"]);
	}
	if(!empty($id_terri[0]["ID_territorio6"])){
	$num_territorio6=$dbterritorios->numero_territorio6($id_terri[0]["ID_territorio6"]);
	}
	if(!empty($id_terri[0]["ID_territorio7"])){
	$num_territorio7=$dbterritorios->numero_territorio7($id_terri[0]["ID_territorio7"]);
	}




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
	    	<div class="col-md-7">
	    		<h1 class="h1asig"><strong>PULSE EN EL TERRITORIO  PARA QUE DEVUELVA EL PUBLICADOR <span class="publicadorasig"></span></strong></h1><h1><?php echo $nombre[0]["nombre"]." ".$nombre[0]["apellidos"]; ?>
	    		</h1>
	    	</div>
	    	<div class="col-md-2">
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-1">
	    	</div>
	    	<div class="col-md-4">
	    		<form class='form-inline' action='' method='POST'>
	    			<?php  
	    				if(!empty($num_territorio[0]['num_territorio'])){
	    						
	    						echo "<button type='submit' class='btn btn-warning' name='uno' value='{$num_territorio[0]['num_territorio']}'>{$num_territorio[0]['num_territorio']} / {$num_territorio[0]['zona']}</button><br><br>  ";
	    						}
	    					if(!empty($num_territorio2[0]['num_territorio'])){
	    						
	    						echo "<button type='submit' class='btn btn-warning' name='dos' value='{$num_territorio2[0]['num_territorio']}'>{$num_territorio2[0]['num_territorio']} / {$num_territorio2[0]['zona']}</button><br><br>  ";
	    							
	    						}
	    					if(!empty($num_territorio3[0]['num_territorio'])){
	    						echo "<button type='submit' class='btn btn-warning' name='tres' value='{$num_territorio3[0]['num_territorio']}'>{$num_territorio3[0]['num_territorio']} / {$num_territorio3[0]['zona']}</button><br><br>  ";
	    					}
	    					if(!empty($num_territorio4[0]['num_territorio'])){
	    						echo "<button type='submit' class='btn btn-warning' name='cuatro' value='{$num_territorio4[0]['num_territorio']}'>{$num_territorio4[0]['num_territorio']} / {$num_territorio4[0]['zona']}</button><br><br>  ";
	    					}
	    					if(!empty($num_territorio5[0]['num_territorio'])){
	    						
	    						echo "<button type='submit' class='btn btn-warning' name='cinco' value='{$num_territorio5[0]['num_territorio']}'>{$num_territorio5[0]['num_territorio']} / {$num_territorio5[0]['zona']}</button><br><br>  ";
	    							;
	    					}
	    					if(!empty($num_territorio6[0]['num_territorio'])){
	    						
	    						echo "<button type='submit' class='btn btn-warning' name='seis' value='{$num_territorio6[0]['num_territorio']}'>{$num_territorio6[0]['num_territorio']} / {$num_territorio6[0]['zona']}</button><br><br>  ";
	    							;
	    					}
	    					if(!empty($num_territorio7[0]['num_territorio'])){
	    						
	    						echo "<button type='submit' class='btn btn-warning' name='siete' value='{$num_territorio7[0]['num_territorio']}'>{$num_territorio7[0]['num_territorio']} / {$num_territorio7[0]['zona']}</button><br><br>  ";
	    							;
	    					}

	    					?>
	    				</form>
	    	</div>
	    	<div class="col-md-4">
	    	</div>
	    </div>

	</body>
</HTML>
<?php
if(isset($_POST['uno'])){
$devuelta=$dbterritorios->devolver_territorio1($id,$_POST["uno"]);
		    if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }

 }
	  

if(isset($_POST["dos"])){
	    
	    	$devuelta=$dbterritorios->devolver_territorio2($id,$_POST["dos"]);
	    
	    if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
}
if(isset($_POST["tres"])){

	    	$devuelta=$dbterritorios->devolver_territorio3($id,$_POST["tres"]);
	    
	    if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
}
if(isset($_POST["cuatro"])){

	    	$devuelta=$dbterritorios->devolver_territorio4($id,$_POST["cuatro"]);
	    
	   if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
	}

if(isset($_POST["cinco"])){
	   
	   
	    	$devuelta=$dbterritorios->devolver_territorio5($id,$_POST["cinco"]);
	    
	   if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
}
if(isset($_POST["seis"])){
	   
	   
	    	$devuelta=$dbterritorios->devolver_territorio5($id,$_POST["seis"]);
	    
	   if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
}
if(isset($_POST["siete"])){
	   
	   
	    	$devuelta=$dbterritorios->devolver_territorio5($id,$_POST["siete"]);
	    
	   if($devuelta==1){
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'>
	    	<h1>territorio  devuelto correctamente</h1>
	    	</div>
	    	</div>";
	    	header("refresh:2;url=devolver_territorio.php?id={$id}");
	    }else{
	    	echo "<div class='row'>
	    	<div class='col-md-4'>
	    	</div>
	    	<div class='col-md-4'> error al  devolver territorio
	    	</div>
	    	</div>";
	    }
}
?>