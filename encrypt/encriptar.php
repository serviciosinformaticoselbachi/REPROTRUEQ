<?php 
function decode($string)
{
$output = false;
$encrypt_method = "AES-256-CBC";
$secret_key = 'Tu KEY secreta';
$secret_iv = 'Tu IV secreta';
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
return $output;
}
$url = decode($_GET['v']);
include("encode.php");

?>
<!DOCTYPE html><html><head><title>Encriptar 100% real no feic made in narnia</title>
<script src="//ssl.p.jwpcdn.com/player/v/7.11.2/jwplayer.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<style>*{margin:0px;}html{overflow:hidden;}</style>
</head><body><div id="encrpyt"></div><script>
jwplayer.key = "XsWyeNQ1jdztTqhiD5MXEpz37wrnHdV05j7Ocg==";
var encrpytplay = jwplayer("encrpyt");
encrpytplay.setup({
sources: [<?php echo "{file:'http://localhost/encrypt/stream.php?video=".openssl($url)."',type:'video/mp4'}";?>],
preload: 'auto',
primary: 'html5',
width: $(window).width(),
height: $(window).height()
})
$(document).ready(function(){
$(window).resize(function(){
jwplayer().resize($(window).width(),$(window).height())
})
})
</script></body></html>


