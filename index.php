<?php

require_once 'Servidor.php';

<<<<<<< HEAD
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
=======
  if (isset($_GET['wsdl'])) {
		header('Content-Type: application/soap+xml; charset=utf-8');
		echo file_get_contents('gato.wsdl');
	}
	else {
		session_start();
		$servidorSoap = new SoapServer('http://titanic.ecci.ucr.ac.cr:80/~eb10141/tic_tac_toe/?wsdl');

		//Para evitar la excepción por defecto de SOAP PHP cuando no existe HTTP_RAW_POST_DATA,
		//se regresa explícitamente el siguiente fallo cuando no hay solicitud (v.b. desde un navegador)
		if(!@$HTTP_RAW_POST_DATA){
			$servidorSoap->fault('SOAP-ENV:Client', 'Invalid Request');
			exit;
	}

	$servidorSoap->setClass('Servidor');
	$servidorSoap->setPersistence(SOAP_PERSISTENCE_SESSION);
	$servidorSoap->handle();

?>
>>>>>>> 196bd43932b2073b9e4665f9dcb4a5597d33a7fd
