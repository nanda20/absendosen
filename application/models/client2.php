<?php
require_once('lib/nusoap.php');
$client	=	new	nusoap_client('http://www.webservicex.net/geoipservice.asmx?wsdl','wsdl');
$response	=	$client->call('GetGeoIP',	array("IPAddress"=>"152.118.24.10"));
print_r($response);
?>