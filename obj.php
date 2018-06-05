<?php
	class dbterritorios{

		function __construct(){

			// Creamos la conexión a la base de datos
			// Guardamos el objeto $mysqli en $this->db
			$this->db = new mysqli("localhost", "root", "", "territorios_madrigales");

		}

	/* TERRITORIOS */

		function crear_territorio($zona,$num_territorio, $observaciones){
			$zona=htmlentities(addslashes($zona));
			$num_territorio=htmlentities(addslashes($num_territorio));
			$observaciones=htmlentities(addslashes($observaciones));
			if(!(INT)$num_territorio){
				return "los valores introducidos del numero no son correctos,por favor introduzcalos de nuevo";
			}else{
				$this->territorio_creado= $this->db->query("INSERT INTO territorios (zona, num_territorio )  VALUES ('{$zona}',
					'{$num_territorio}')");
				if($this->territorio_creado){
				$sacar_numeroterri=$this->db->query("SELECT ID FROM territorios WHERE num_territorio='{$num_territorio}'");
				$sacar_numeroterri=$sacar_numeroterri->fetch_all(true);
				}
				if($sacar_numeroterri){
				$observaciones_creadas=$this->db->query("INSERT INTO observaciones (observacion,ID_territorio) VALUES ('{$observaciones}','{$sacar_numeroterri[0]['ID']}') ");
					return true;
				}
				if($observaciones_creadas){
					return true;
					
				}
			}	
		}

		function editar_territorio($id,$num_territorio, $observaciones){
			$this->editar_territorio= $this->db->query("UPDATE territorios SET num_territorio='{$num_territorio}',observaciones='{$observaciones}' 
														WHERE ID='{$id}'");
		}

		function eliminar_territorio($id){
			$this->eliminar_territorio= $this->db->query("DELETE FROM territorios WHERE ID='{$id}'");
		}
		function eliminar_publicador($id){
			$this->mostrar_territorio=$this->db->query("SELECT ID_territorio FROM publicadores WHERE ID={$id}");
			$this->mostrar_territorio=$this->mostrar_territorio->fetch_all(true);
			$this->actualizar_territorio=$this->db->query("UPDATE territorios SET asignado=0 WHERE ID={$this->mostrar_territorio[0]['ID_territorio']}");
			$this->eliminar_publicador= $this->db->query("DELETE FROM publicadores WHERE ID={$id}");
			return $this->eliminar_publicador;
		}


		function listar_territorios($pagina){
			$dimension_pagina=10;
			$empezar=($pagina-1)*$dimension_pagina;
			$territorios=$this->db->query("SELECT * FROM territorios");
			$todos_territorios=$territorios->num_rows;
			$this->total_paginas=ceil($todos_territorios/$dimension_pagina);
			$datos = $this->db->query("SELECT * FROM territorios   LIMIT {$empezar},{$dimension_pagina}");

			$array = $datos->fetch_all(true);

			return $array;
		}

		function listar_territorio_por_zona($id_zona){
			// Similar que arriba pero con el where en 'zona'
			$territorios_zona=$this->db->query("SELECT * FROM territorios WHERE zona='{$id_zona}'");
			$this->array_territorios= $territorios_zona->fetch_all(true);
			return $this->array_territorios;
		}

		function listar_territorio_no_asignados($pagina){
			// Similar que arriba pero con el where en 'asignado'
			$dimension_pagina=10;
			$empezar=($pagina-1)*$dimension_pagina;
			$territorios=$this->db->query("SELECT * FROM territorios WHERE asignado=0");
			$todos_territorios=$territorios->num_rows;
			$this->total_paginas=ceil($todos_territorios/$dimension_pagina);
			$no_asignados=$this->db->query("SELECT * FROM territorios  WHERE asignado=0 ORDER BY fecha_mostrar desc
			LIMIT {$empezar},{$dimension_pagina}");
			 $territorios_no_asignados=$no_asignados->fetch_all(true);
			 return  $territorios_no_asignados;
		}
		function territorios_sin_asignar(){
			$territorios_sin=$this->db->query("SELECT * FROM territorios WHERE asignado=0 ORDER BY fecha_mostrar desc");
			$territorios_sin2=$territorios_sin->fetch_all(true);
			return $territorios_sin2;
		}

		
		function devolver_territorio1($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio=0, entrega=NULL, devuelta=NULL, devuelta2=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}', entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}
		}
			function devolver_territorio2($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio2,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio2=0, entregaid2=NULL, devueltaid2=NULL, devuelta2id2=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}',entrega_terri=NULL, devuelta_terri=NULL,fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio2']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}}
			function devolver_territorio3($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio3,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio3=0, entregaid3=NULL, devueltaid3=NULL, devuelta2id3=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}',entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio3']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}}
			function devolver_territorio4($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio4,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio4=0, entregaid4=NULL, devueltaid4=NULL, devuelta2id4=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}',entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio4']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}}
			function devolver_territorio5($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio5,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio5=0, entregaid5=NULL, devueltaid5=NULL, devuelta2id5=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}', entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio5']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}
		}
			function devolver_territorio6($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio6,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio6=0, entregaid6=NULL, devueltaid6=NULL, devuelta2id6=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}', entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio5']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}
		}
			function devolver_territorio7($id_publicador,$numero){
			$sacar_territorio=$this->db->query("SELECT ID_territorio7,nombre,apellidos,entrega FROM publicadores WHERE ID={$id_publicador}");
			$sacar_territorio=$sacar_territorio->fetch_all(true);
			$territorio_devuelto=$this->db->query("UPDATE publicadores SET ID_territorio7=0, entregaid7=NULL, devueltaid7=NULL, devuelta2id7=NULL WHERE ID={$id_publicador} ");
			$fecha=date('d-m-y');
			$fecha2=date('y-m-d');
			$territorio_libre=$this->db->query("UPDATE territorios SET asignado=0, ultima_fecha='{$fecha}', entrega_terri=NULL, devuelta_terri=NULL, fecha_mostrar='{$fecha2}' WHERE num_territorio={$numero}");
			$historial=$this->db->query("INSERT INTO historial (observacion, ID_territorio) VALUES ('Trabajado por ultima vez por el publicador {$sacar_territorio[0]['nombre']} {$sacar_territorio[0]['apellidos']} desde el dia {$sacar_territorio[0]['entrega']} hasta {$fecha}',{$sacar_territorio[0]['ID_territorio5']})");
			if($territorio_libre){
				if($this->db->affected_rows>0){
					return true;
					
				}
			}
					
				
			
		}
		function historial($id){
			$historial=$this->db->query("SELECT observacion FROM historial WHERE ID_territorio={$id}");
			if($this->db->error){
				return $this->db->error;
			}
			$historial=$historial->fetch_all(true);
			return $historial;
		}
		function editar_observaciones($observaciones,$id){
			$id=(addslashes($id));
			$observaciones=htmlentities(addslashes($observaciones));
			$observaciones=$this->db->query("INSERT INTO observaciones (observacionob, ID_territorioob) VALUES ('{$observaciones}',{$id})");
			if($this->db->affected_rows>0){
				return "Actualizado correctamente";
			}
		}
		function observaciones($id){

			$id=(addslashes($id));
            
			
			$observaciones=$this->db->query("SELECT observacionob,ID FROM observaciones WHERE ID_territorioob={$id}");
			if($this->db->error){
				return( substr($this->db->error,-3,1))
				;
			}
			$observaciones=$observaciones->fetch_all(true);
			$numero_territorio=$this->db->query("SELECT num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero_territorio=$numero_territorio->fetch_all(true);
			$this->numero_territorio=$numero_territorio;
			return $observaciones;
			
		}
		function territorios_asignados($pagina){
			$dimension_pagina=10;
			$empezar=($pagina-1)*$dimension_pagina;
			$total_territorios=$this->db->query("SELECT * FROM territorios WHERE asignado=1");
			$total_territorios=$total_territorios->num_rows;
			$this->total_paginas=ceil($total_territorios/$dimension_pagina);
			$terri_asignado=$this->db->query("SELECT * FROM territorios WHERE asignado=1 LIMIT {$empezar},{$dimension_pagina}");
			$terri_asignado=$terri_asignado->fetch_all(true);
			return $terri_asignado;
		}


	/* PUBLICADORES */
		function publi_alerta(){
			$publicador=$this->db->query("SELECT * FROM publicadores");
			$publicador=$publicador->fetch_all(true);
			return $publicador;


		}

		function listar_publicador($pagina){
			$dimension_pagina=10;
			$empezar=($pagina-1)*$dimension_pagina;
			$publicadores_totales=$this->db->query("SELECT * FROM publicadores");
			$total=$publicadores_totales->num_rows;
			$this->total_paginas=ceil($total/$dimension_pagina);
			$publicadores=$this->db->query("SELECT * FROM publicadores ORDER BY nombre LIMIT {$empezar},{$dimension_pagina}");
			$publicadores=$publicadores->fetch_all(true);
			return $publicadores;
		}
		function listar_nombre($id_publicador){
			$publicadores_nombre=$this->db->query("SELECT nombre,apellidos,ID_territorio,ID_territorio2,ID_territorio3,ID_territorio4,ID_territorio5,ID_territorio6,ID_territorio7 FROM publicadores WHERE ID={$id_publicador}");
			$publicadores_nombre=$publicadores_nombre->fetch_all(true);
			return $publicadores_nombre;
		}


		function crear_publicador($nombre, $apellido,$email){
			if(strlen($nombre)<2 || strlen($apellido)<3 || preg_match("/[0-9]/",$nombre) || preg_match("/[0-9]/",$apellido)){
				 return false;
				 
			}else{
				$nombre=ucwords($nombre);
				$apellido=ucwords($apellido);
				$nombre=htmlentities(addslashes($nombre));
				$apellido=htmlentities(addslashes($apellido));
				$nuevo_usuario=$this->db->query("INSERT INTO publicadores (nombre, apellidos,email) VALUES ('{$nombre}','{$apellido}','{$email}')");
				return true;
			}
			
    			
		}
		function buscar_publicador($nombre){
			$nombre=$this->db->real_escape_string($nombre);
			$nombre=$this->db->query("SELECT * FROM publicadores WHERE nombre LIKE '%{$nombre}%'");
			$nombre=$nombre->fetch_all(true);
			return $nombre;
		}

		function editar_publicador($id, $nombre, $apellido){
			if(strlen($nombre)<2 || strlen($apellido)<3 || preg_match("/[0-9]/",$nombre) || preg_match("/[0-9]/",$apellido)){
				return "el nombre y apellido actualizados no son validos";
			}else{
				$this->db->query("UPDATE publicadores SET nombre='{$nombre}',apellidos='{$apellidos}' WHERE id={$id}");
			}
		}
		function borrarobservacion($id){
			$this->db->query("DELETE FROM observaciones WHERE ID=$id");
		}
		function asig($ID){
			$id=$this->db->query("SELECT * FROM publicadores WHERE ID={$ID}");
			$id=$id->fetch_all(true);
			return $id;
		}
		
		function asignar_territorio_publicador($id_publicador, $id_territorio){

			// El territorio pasará a estar asignado (se cambia el booleano)
			
			$this->id_publicador=$id_publicador;
			$this->id_territorio=$id_territorio;
			$fecha=date("d-m-y");
			$devuelta2=date("d-m-y", strtotime('+4 month'));
			$devuelta=date("y-m-d", strtotime('+4 month'));
			$id=$this->db->query("SELECT * FROM publicadores WHERE id={$this->id_publicador}");
			$id=$id->fetch_all(true);
			if($id[0]["ID_territorio"]==0){
			$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio={$this->id_territorio}, entrega='{$fecha}', devuelta='{$devuelta}',devuelta2='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;
				    
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]==0){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio2={$this->id_territorio}, entregaid2='{$fecha}', devueltaid2='{$devuelta}',devuelta2id2='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]!=0 AND $id[0]["ID_territorio3"]==0){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio3={$this->id_territorio}, entregaid3='{$fecha}', devueltaid3='{$devuelta}',devuelta2id3='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]!=0 AND  $id[0]["ID_territorio3"]!=0 AND $id[0]["ID_territorio4"]==0){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio4={$this->id_territorio}, entregaid4='{$fecha}', devueltaid4='{$devuelta}',devuelta2id4='{$devuelta2}' WHERE id={$this->id_publicador}");
			       return $this->asignado_publicador;
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]!=0 AND  $id[0]["ID_territorio3"]!=0 AND $id[0]["ID_territorio4"]!=0 AND $id[0]["ID_territorio5"]==0 ){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio5={$this->id_territorio}, entregaid5='{$fecha}', devueltaid5='{$devuelta}',devuelta2id5='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;	
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]!=0 AND  $id[0]["ID_territorio3"]!=0 AND $id[0]["ID_territorio4"]!=0 AND $id[0]["ID_territorio5"]!=0 AND $id[0]["ID_territorio6"]==0){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio6={$this->id_territorio}, entregaid6='{$fecha}', devueltaid6='{$devuelta}',devuelta2id6='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;	
			}else if($id[0]["ID_territorio"]!=0 AND $id[0]["ID_territorio2"]!=0 AND  $id[0]["ID_territorio3"]!=0 AND $id[0]["ID_territorio4"]!=0 AND $id[0]["ID_territorio5"]!=0 AND $id
				[0]["ID_territorio6"]!=0 AND $id[0]["ID_territorio7"]==0){
				$this->asignado_publicador=$this->db->query("UPDATE publicadores SET ID_territorio7={$this->id_territorio}, entregaid7='{$fecha}', devueltaid7='{$devuelta}',devuelta2id7='{$devuelta2}' WHERE id={$this->id_publicador}");
				return $this->asignado_publicador;	
			}
		}

		
   function actualizar_territorio($asig){
   	$fecha=date("d-m-y");
   	$devuelta=date("d-m-y", strtotime('+4 month'));
			if($asig){
				$asignado=1;
				$asignado_territorio=$this->db->query("UPDATE territorios SET asignado={$asignado}, entrega_terri='{$fecha}', devuelta_terri='{$devuelta}'  where ID={$this->id_territorio}");
				if($asignado_territorio){
					if($this->db->affected_rows>0){
						return true;
					}else{
						return false;
					}
				}
			}
		}
				
		

		function alerta($fecha,$devolucion){
			if(isset($devolucion)){
				if($devolucion<=$fecha){
					$devolu=true;
				}else{
				$devolu=false;
			}
		}
			
			
			return $devolu;
		}
		

	/* FUNCIÓN listar publicadores con territorios asignados*/

		function lista_territorios_con_publicadores($pagina){
			$dimension_pagina=10;
			$empezar=($pagina-1)*$dimension_pagina;
			$publicadores_totales=$this->db->query("SELECT territorios.ID,num_territorio,asignado, publicadores.ID_territorio,nombre,apellidos,email FROM territorios LEFT JOIN publicadores ON territorios.ID=publicadores.ID_territorio WHERE asignado=1 ");
			$total=$publicadores_totales->num_rows;
			$this->total_paginas=ceil($total/$dimension_pagina);
			$left_join=$this->db->query("SELECT territorios.ID,num_territorio,asignado,entrega_terri,devuelta_terri,zona, publicadores.ID_territorio,nombre,apellidos,email FROM territorios LEFT JOIN publicadores ON territorios.ID=publicadores.ID_territorio OR territorios.ID=publicadores.ID_territorio2 OR territorios.ID=publicadores.ID_territorio3 OR territorios.ID=publicadores.ID_territorio4 OR territorios.ID=publicadores.ID_territorio5 OR  territorios.ID=publicadores.ID_territorio6 OR territorios.ID=publicadores.ID_territorio7 WHERE asignado=1 ORDER BY publicadores.nombre LIMIT {$empezar},{$dimension_pagina}");
			$left_join2=$left_join->fetch_all(true);
			return($left_join2);
		}
		

		
		function pdfprueba2(){
            $pdf2=$this->db->query("SELECT territorios.ID,num_territorio,zona,asignado, historial.ID_territorio,historial.observacion,observaciones.ID_territorioob,observaciones.observacionob FROM territorios LEFT JOIN historial ON territorios.ID=historial.ID_territorio LEFT JOIN observaciones ON territorios.ID=observaciones.ID_territorioob");

             $pdf2=$pdf2->fetch_all(true);
             return $pdf2;

		}

		function id_territorio($id){
			$numero=$this->db->query("SELECT ID_territorio,ID_territorio2,ID_territorio3,ID_territorio4,ID_territorio5,ID_territorio6,ID_territorio7 FROM publicadores WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;
		}
		function numero_territorio($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio2($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio3($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio4($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio5($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio6($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}
		function numero_territorio7($id){
			$numero=$this->db->query("SELECT ID,num_territorio,zona FROM territorios WHERE ID={$id}");
			$numero=$numero->fetch_all(true);
			return $numero;

		}

		


}
	
	$dbterritorios = new dbterritorios();
?>