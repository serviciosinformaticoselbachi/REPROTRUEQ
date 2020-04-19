<?php 
include("decode.php");
$link = $_GET['video'];
$file = $link;
header('Location: '.openssl($file));

?>