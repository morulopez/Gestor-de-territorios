<?php
include_once('obj.php');
require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf();
$prueba2=$dbterritorios->pdfprueba2();
$zona="";
$observaciones="";
$numTerritorio="";
$historial="";

$html2pdf->writeHTML("<h1>Informe territorios de la congregacion Madrigales</h1>");
foreach($prueba2 as $p)
{
	if($numTerritorio!=$p['num_territorio'])
	{
		if($p['asignado']==0){
			$asignado="NO";
		}else{
			$asignado="SI";
		}
		$zona=$p['zona'];
		$numTerritorio=$p['num_territorio'];
		$html2pdf->writeHTML("<br><hr><br>");
	    $html2pdf->writeHTML("<div><strong>Numero de territorio:  ".$numTerritorio."</strong></div><br>");
	    $html2pdf->writeHTML("<div><strong>Zona: ".$zona."</strong></div><br>");
	    $html2pdf->writeHTML("<div><strong>Asignado: ".$asignado."<br><br>Historial</strong></div>");}
		if($observaciones!=$p['observacion']){
			$observaciones=$p['observacion'];
			$html2pdf->writeHTML("<div>".$observaciones."</div>");
			}

		
        
			
	
		
	}
	
	
			
			
  
		
		


//print_r($prueba2);








$html2pdf->output();



?>