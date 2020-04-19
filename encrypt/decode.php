<?php 
function openssl($string){
$method = "aes-256-cbc";
$secretHash = "0D4EE605BA20B35A7A07994AF47CA95580B6BA17250AADF4D7E273BD399E130";
$iv = "VYo5FTXD3Mu6K8td";
$link = str_replace(array('-','_'),array('+','/'),$string);
$openssldMessage = openssl_decrypt($link, $method, $secretHash, 0, $iv);
	return $openssldMessage;
}?>