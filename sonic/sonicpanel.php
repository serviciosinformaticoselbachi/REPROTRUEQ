<?php
// Version v1.0

if (!defined("WHMCS")) {
    die("Fatal Error");
}

use WHMCS\Database\Capsule;

function sonicpanel_ConfigOptions() {

// Fetch Active sonicpanel Server
try {
foreach (Capsule::table('tblservers')->where('type', '=', 'sonicpanel') ->where('active', '=', 1) ->get() as $srv) {
    $server_ip = $srv->ipaddress;
    $server_p = decrypt($srv->password);
    $serveruser = $srv->username;
}
} catch (\Exception $e) {
    throw new Exception("Unable to connect to WHMCS Database or there is no active SonicPanel server set: {$e->getMessage()}");
}
// Fetch Active sonicpanel Server

// Get Account Packages from the sonicpanel Server
$sonicpanelserver = "http://$server_ip:2086/api/sonic_api.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=packs&owner=$serveruser&key=$server_p");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_URL, $sonicpanelserver);
$retval = curl_exec($ch);
$getresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {throw new Exception('Unable to connect to the server:' . $server_ip . ' - ' . curl_errno($ch) . ' - ' . curl_error($ch));}
if ($getresponse == 401) {throw new Exception("SonicPanel Server Invalid API Key! Check your username and API Key(Password) in your billing software server settings for this active server $server_ip. Multiple login failures in 1 hour will get your website IP banned for 1 hour.");}
if ($getresponse == 500) {throw new Exception("Multiple API Login Failures Detected: Your website IP is blocked for 1 hour to login. Read the limits and security in SonicPanel under the Billing and API page");}
curl_close($ch);
// Get Account Packages from the sonicpanel Server

$configarraysonic = array(
  "Radio Account Packages" => array( "Type" => "dropdown", "Options" => "$retval","Description" => "Create packages in SonicPanel to use here. SonicPanel >> Left Menu >> Add a Radio Package"),
);
return $configarraysonic;
}



function sonicpanel_CreateAccount($params) {
    // Get Information
    $package = $params["configoption1"];
    $orderid = $params["serviceid"];
    $server_ip = $params["serverip"];
    $serverp = $params["serverpassword"];
    $serveruser = $params["serverusername"];
    $radiousername = $params["username"];

    // Get The Client Information
    $client_email = $params["clientsdetails"]["email"];

    $chars = "ABCDEFGHJKMNPQRSTUVWXYZ23456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 20) {
    $num = rand() % 45;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
    }

$sonicpanelserver = "http://$server_ip:2086/api/sonic_api.php";
$data = "cmd=create&client_email=$client_email&rad_username=$radiousername&panel_pass=$pass&owner=$serveruser&package=$package&send_email=yes&key=$serverp";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 59);
curl_setopt($ch, CURLOPT_URL, $sonicpanelserver);
$retval = curl_exec($ch);
$getresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {throw new Exception('Unable to connect to the server:' . $server_ip . ' - ' . curl_errno($ch) . ' - ' . curl_error($ch));}
if ($getresponse == 401) {throw new Exception("SonicPanel Server Invalid API Key! Check your username and API Key(Password) in your billing software server settings for this active server $server_ip. Multiple login failures in 1 hour will get your website IP banned for 1 hour.");}
if ($getresponse == 500) {throw new Exception("Multiple API Login Failures Detected: Your website IP is blocked for 1 hour to login. Read the limits and security in SonicPanel under the Billing and API page.");}
curl_close($ch);

    $obj = json_decode($retval);
    $return = $obj->{'result'};
    $radiousername = $obj->{'username'};

	if ($return=="complete") {	// Update WHMCS Database
	   $encryptedPassword = encrypt($pass);
       $updatehosting = Capsule::table('tblhosting')->where('id', $params["accountid"])->update(['username' => $radiousername, 'dedicatedip' => $server_ip, 'password' => $encryptedPassword]);
    // Update WHMCS Database
	$result = "success";
	} else {
	$result = $return;
	}
	return $result;
}


function sonicpanel_TerminateAccount($params) {
    // Details
    $server_ip = $params["serverip"];
    $rad_username= $params["username"];
    $serverp = $params["serverpassword"];
    $serveruser = $params["serverusername"];

$sonicpanelserver = "http://$server_ip:2086/api/sonic_api.php";
$data = "cmd=terminate&rad_username=$rad_username&key=$serverp&owner=$serveruser";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 59);
curl_setopt($ch, CURLOPT_URL, $sonicpanelserver);
$retval = curl_exec($ch);
$getresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {throw new Exception('Unable to connect to the server:' . $server_ip . ' - ' . curl_errno($ch) . ' - ' . curl_error($ch));}
if ($getresponse == 401) {throw new Exception("SonicPanel Server Invalid API Key! Check your username and API Key(Password) in your billing software server settings for this active server $server_ip. Multiple login failures in 1 hour will get your website IP banned for 1 hour.");}
if ($getresponse == 500) {throw new Exception("Multiple API Login Failures Detected: Your website IP is blocked for 1 hour to login. Read the limits and security in SonicPanel under the Billing and API page.");}
curl_close($ch);

    $obj = json_decode($retval);
    $return = $obj->{'result'};

	if ($return=="complete") {
		$result = "success";
	} else {
		$result = $return;
	}
	return $result;
}

function sonicpanel_SuspendAccount($params) {
    // Details
    $server_ip = $params["serverip"];
    $rad_username= $params["username"];
    $serverp = $params["serverpassword"];
    $serveruser = $params["serverusername"];

$sonicpanelserver = "http://$server_ip:2086/api/sonic_api.php";
$data = "cmd=suspend&rad_username=$rad_username&key=$serverp&owner=$serveruser";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 59);
curl_setopt($ch, CURLOPT_URL, $sonicpanelserver);
$retval = curl_exec($ch);
$getresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {throw new Exception('Unable to connect to the server:' . $server_ip . ' - ' . curl_errno($ch) . ' - ' . curl_error($ch));}
if ($getresponse == 401) {throw new Exception("SonicPanel Server Invalid API Key! Check your username and API Key(Password) in your billing software server settings for this active server $server_ip. Multiple login failures in 1 hour will get your website IP banned for 1 hour.");}
if ($getresponse == 500) {throw new Exception("Multiple API Login Failures Detected: Your website IP is blocked for 1 hour to login. Read the limits and security in SonicPanel under the Billing and API page.");}
curl_close($ch);

    $obj = json_decode($retval);
    $return = $obj->{'result'};

	if ($return=="complete") {
		$result = "success";
	} else {
		$result = $return;
	}
	return $result;
}

function sonicpanel_UnsuspendAccount($params) {

    // Details
    $server_ip = $params["serverip"];
    $rad_username= $params["username"];
    $serverp = $params["serverpassword"];
    $serveruser = $params["serverusername"];

$sonicpanelserver = "http://$server_ip:2086/api/sonic_api.php";
$data = "cmd=unsuspend&rad_username=$rad_username&key=$serverp&owner=$serveruser";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 59);
curl_setopt($ch, CURLOPT_URL, $sonicpanelserver);
$retval = curl_exec($ch);
$getresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {throw new Exception('Unable to connect to the server:' . $server_ip . ' - ' . curl_errno($ch) . ' - ' . curl_error($ch));}
if ($getresponse == 401) {throw new Exception("SonicPanel Server Invalid API Key! Check your username and API Key(Password) in your billing software server settings for this active server $server_ip. Multiple login failures in 1 hour will get your website IP banned for 1 hour.");}
if ($getresponse == 500) {throw new Exception("Multiple API Login Failures Detected: Your website IP is blocked for 1 hour to login. Read the limits and security in SonicPanel under the Billing and API page.");}
curl_close($ch);

    $obj = json_decode($retval);
    $return = $obj->{'result'};

	if ($return=="complete") {
		$result = "success";
	} else {
		$result = $return;
	}
	return $result;

}

function sonicpanel_ClientArea($params) {
	$connection = $params["serverip"];
	$code = "<form action=http://$connection:2082 method=post target=_blank><input type=submit value=\"SonicPanel Login\"></form>";
	return $code;
}
function sonicpanel_AdminLink($params) {
    $connection = $params["serverip"];
	$code = "<form action=http://$connection:2086 method=post target=_blank><input type=submit value=\"SonicPanel Login\"></form>";
	return $code;
}
?>