<?php

header('Content-type: application/json');
$status = array(
    'type'=>'Mensaje eviado',
    'message'=>'Gracias por contactarnos. Nosotros le responderemos a la brebedad posible.'
);

$Cabecera = "MIME-Version: 1.0\r\n";
$Cabecera .= "Content-type: text/html; charset=utf-8\r\n";
//$Cabecera .= "Content-type: text/html; charset=iso-8859-1\r\n";
$Cabecera .= "From: ".$_POST['nombre']." <".$_POST['correo'].">\r\n";

$Mensaje = "<b>MENSAJE ENVIADO DESDE www.paraba-soft.com</b><br/><br/>
<b>Empresa/Institución: </b>" .$_POST['empresa']."<br/>
<b>Persona de Contacto: </b>".$_POST['nombre']."<br/>
<b>Telefono/Celular: </b>".$_POST['telefono']."<br/>
<b>E-Mail: </b>".$_POST['correo']."<br/><br/>
<br/>
<b>Mensaje: </b>".$_POST['mensaje'];

    mail('info@paraba-it.com', 'Mensaje Paraba IT', $Mensaje, $Cabecera); // envia el correo
    mail('marco.alesan@gmail.com', 'Mensaje Paraba IT', $Mensaje, $Cabecera); // envia el correo
    echo json_encode($status);
    die;


	/*header('Content-type: application/json');
	$status = array(
		'type'=>'Mensaje eviado',
		'message'=>'Gracias por contactarnos. Nosotros le responderemos a la brebedad posible.'
	);

    $nombre = @trim(stripslashes($_POST['nombre']));
    $correo = @trim(stripslashes($_POST['correo']));
    $telefono = @trim(stripslashes($_POST['telefono']));
    $empresa = @trim(stripslashes($_POST['empresa']));
    $asunto = @trim(stripslashes($_POST['asunto']));
    $mensaje = @trim(stripslashes($_POST['mensaje']));

    $email_from = $correo;
    $email_to = 'tecknock@gmail.com';//replace with your email

    $body = ''.
        'Nombre: ' . $nombre . "\n\n" .
        'E-mail: ' . $correo . "\n\n" .
        'Teléfono: ' . $telefono . "\n\n" .
        'Empresa/Institución: ' . $empresa . "\n\n" .
        'Asunto: ' . $asunto . "\n\n" .
        'Mensaje: ' . $mensaje;

    $success = @mail($email_to, "mensaje desde paraba-it.com", $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;*/