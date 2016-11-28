<?php

require_once 'Servidor.php';

ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0');

if (isset($_GET['wsdl'])){
	header('Content-Type: application/soap+xml; charset=utf-8');
	echo file_get_contents('gato.wsdl');
}
else{
	session_start();
	$servidorSoap = new SoapServer('http://titanic.ecci.ucr.ac.cr:80/~eb10141/tic_tac_toe/?wsdl');

	if(!@$HTTP_RAW_POST_DATA){
		$servidorSoap->fault('SOAP-ENV:Client', 'Invalid Request');
		exit;
	}
	$servidorSoap->setClass('Servidor');
	$servidorSoap->setPersistence(SOAP_PERSISTENCE_SESSION);
	$servidorSoap->handle();
}
?>
