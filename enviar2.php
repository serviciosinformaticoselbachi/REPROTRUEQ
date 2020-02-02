<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Confirmacion de envio formulario</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
<?php 
function form_mail($sPara, $sAsunto, $sTexto, $sDe)
{ 
$bHayFicheros = 0; 
$sCabeceraTexto = ""; 
$sAdjuntos = "";

if ($sDe)$sCabeceras = "From:".$sDe."\n"; 
else $sCabeceras = ""; 
$sCabeceras .= "MIME-version: 1.0\n"; 
foreach ($_POST as $sNombre => $sValor) 
$sTexto = $sTexto."\n".$sNombre." = ".$sValor;

foreach ($_FILES as $vAdjunto)
{ 
if ($bHayFicheros == 0)
{ 
$bHayFicheros = 1; 
$sCabeceras .= "Content-type: multipart/mixed;"; 
$sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";

$sCabeceraTexto = "----_Separador-de-mensajes_--\n"; 
$sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n"; 
$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";

$sTexto = $sCabeceraTexto.$sTexto; 
} 
if ($vAdjunto["size"] > 0)
{ 
$sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n"; 
$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";; 
$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n"; 
$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";

$oFichero = fopen($vAdjunto["tmp_name"], 'r'); 
$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"])); 
$sAdjuntos .= chunk_split(base64_encode($sContenido)); 
fclose($oFichero); 
} 
}

if ($bHayFicheros) 
$sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n"; 
return(mail($sPara, $sAsunto, $sTexto, $sCabeceras)); 
}

//cambiar aqui el email 
if (form_mail("servicioselbachi@gmail.com", $_POST[asunto], 
"Los datos introducidos en el formulario son:\n\n", $_POST[email])) 
echo "
 <h1>Su formulario fue enviado con exito </h1>
<form>   
<p>Muchas gracias <br>
O lo que tu quieras poner los que sea!<br>
Solo realiza el cambiio en este texto!<br>
<br>
Saludos el equipo de ..lo que seas..
</p>
</form>

"; 
?>
</div>
</body>
</html>
