<?php
function base64($string)
{
$output = false;
$encrypt_method = "AES-256-CBC";
$secret_key = 'Tu KEY secreta';
$secret_iv = 'Tu IV secreta';
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
$output = base64_encode($output);
return $output;
}	
?>
<!doctype html>
<html lang="es">

<head>
	<title>Encriptador para prosasos</title>
	<meta charset="utf-8">
</head>

<body>
	<div id="wrapper">
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-body">
							<div class="row">

<h3 style="color: #ffc119;">Pegar aqui la url a encriptar</h3>
<font size="3"><form name="form" action="" method="post" enctype="multipart/form-data">
	<label style="color: #ffc119;">URL directa:</label><br><textarea class="form-control" name="url" cols="100" rows="4"></textarea><br><br>
<input type="submit" class="btn btn-primary" value="Enviar" title="to post" />
</form></font>		
			<?php
				if (!empty($_POST)) {
					extract($_POST);
					$urlEncode = base64($url);
				}
			?>					
<label style="color: #ffc119;">Enlaces encriptado ilegible +10 like y a favoritos</label><br><textarea class="form-control" cols="100" rows="4"><?php echo "http://localhost/encrypt/encriptar.php?v=".$urlEncode; ?></textarea><br><br>
</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div id="headline-chart" class="ct-chart"></div>
								</div>
								<div class="col-md-3">

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="/" target="_blank">cmarmol</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
</body>

</html>