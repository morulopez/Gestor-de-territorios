<?php
include_once("obj.php");
$publicadores=$dbterritorios->publi_alerta();
Class mail{

function envio_email($nombre,$apellidos,$email){

$para="rapmoru@hotmail.com" . ",";
$para .="contacto@jesuslopezprogramador.com";
 $encoding = "utf-8";

    // Preferences for Subject field
    $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
    );
    
    // Mail header
    $from_name="Responsable de territorios";
    $from_mail="madrigalescongre@gmeail.com";
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$from_name." <".$from_mail."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
     
    


mail($para, "devolver territorio","el publicador {$nombre} {$apellidos} no ha devuelto su territorio despues de cuatro meses",$header);

if(strlen($email)>0){
     $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
    );
      $publicador=$email;
       
    // Mail header
    $from_name2="Responsable de territorios";
    $from_mail2="madrigalescongre@gmeail.com";
    $header2 = "Content-type: text/html; charset=".$encoding." \r\n";
    $header2 .= "From: ".$from_name2." <".$from_mail2."> \r\n";
    $header2 .= "MIME-Version: 1.0 \r\n";
    $header2 .= "Content-Transfer-Encoding: 8bit \r\n";
    $header2 .= "Date: ".date("r (T)")." \r\n";
	
	mail($publicador, "devolver territorio","hola {$nombre} {$apellidos} le informamos que su plazo con el territorio asignado ha vencido,por favor devuelvalo cuanto antes GRACIAS",$header2);
}



}

}

$mail= new mail();
 foreach ($publicadores as $publicadores) {
                     if($publicadores["devuelta"]!=NULL){
                     
                         $fecha=date("y-m-d");
                         $alerta=$dbterritorios->alerta($fecha,$publicadores["devuelta"]);
                         if($alerta){
                          $mail->envio_email($publicadores['nombre'], $publicadores['apellidos'], $publicadores['email']);
                 
                        }
                    }
                    if($publicadores["devueltaid2"]!=NULL){
                     
                         $fecha=date("y-m-d");
                         $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid2"]);
                         if($alerta){
                          $mail->envio_email($publicadores['nombre'], $publicadores['apellidos'], $publicadores['email']);
                 
                        }
                    }
                    if($publicadores["devueltaid3"]!=NULL){
                     
                         $fecha=date("y-m-d");
                         $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid3"]);
                         if($alerta){
                          $mail->envio_email($publicadores['nombre'], $publicadores['apellidos'], $publicadores['email']);
                 
                        }
                    }
                    if($publicadores["devueltaid4"]!=NULL){
                     
                         $fecha=date("y-m-d");
                         $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid4"]);
                         if($alerta){
                          $mail->envio_email($publicadores['nombre'], $publicadores['apellidos'], $publicadores['email']);
                 
                        }
                    }
                    if($publicadores["devueltaid5"]!=NULL){
                     
                         $fecha=date("y-m-d");
                         $alerta=$dbterritorios->alerta($fecha,$publicadores["devueltaid5"]);
                         if($alerta){
                          $mail->envio_email($publicadores['nombre'], $publicadores['apellidos'], $publicadores['email']);
                 
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
        }







?>