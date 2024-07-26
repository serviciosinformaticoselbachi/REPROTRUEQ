<?php
header('Content-Type: application/json');




$url = $_GET["url"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$return_json = curl_exec($ch);



echo $return_json;

//$parte   = explode(" - ", $tit);
//echo $artista = $parte[0];
//echo $tema    = $parte[1];
?>