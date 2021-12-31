<?php require_once('PHPMailer-master/src/class.phpmailer.php');

$correo = new PHPMailer();

$correo->IsSMTP();

$correo->SMTPAuth = true;

$correo->SMTPSecure = 'tls';

$correo->Host = "smtp.office365.com";

$correo->Port = 587;

$correo->Username = "*******";//tu corrreo

$correo->Password = "******";// tu clave 

$correo->SetFrom("***********", "Mi Codigo PHP");//tu corrreo



$correo->AddAddress("hector58472@yahoo.es", "Jorge");//correo destino 

$correo->Subject = "Mi primero correo con PHPMailer";//asunto 

$correo->MsgHTML("HOLA COMO ESTAS <strong>HTML</strong>");//mensaje o cuerpo del correo 


if(!$correo->Send()) {
echo "Hubo un error: " . $correo->ErrorInfo;
} else {
echo "Mensaje enviado con exito.";
}

?>
