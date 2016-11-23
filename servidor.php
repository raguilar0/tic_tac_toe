<?php
	include 'Controlador.php';
	
	$tablero [0] [0] = 0; $tablero [0] [1] = 1; $tablero [0] [2] = -1; 
	$tablero [1] [0] = 1; $tablero [1] [1] = -1; $tablero [1] [2] = 1; 
	$tablero [2] [0] = 0; $tablero [2] [1] = -1; $tablero [2] [2] = 0; 
	if(gano($tablero)){
		echo "Gano";
	}else{
		echo "Perdio";
	}
?>
