<?php
	include 'Controlador.php';

	$tablero [0] [0] = -1; $tablero [0] [1] = -1; $tablero [0] [2] = -1;
	$tablero [1] [0] = -1; $tablero [1] [1] = -1; $tablero [1] [2] = -1;
	$tablero [2] [0] = -1; $tablero [2] [1] = -1; $tablero [2] [2] = -1;

	$turno_jugador = 0;

	/*
	Pone la ficha del jugador en turno en la posicion que se solicita
	*/
	function poner_ficha($fila,$columna){
		if(esta_vacia($fila,$columna) && es_valida($fila,$columna)){
			$tablero[$fila][$columna] = $turno_jugador;
			if($turno_jugador == 0 ){
				jugar_computadora();
			}
		}
	}

	//Verifica que una casilla del tablero esta vacia
	function esta_vacia($fila, $columna){
		return ($tablero[$fila][$columna] == -1);
	}

	// Verifica que las coordenadas sean validas en el tablero
	function es_valida($fila, $columna){
		return ($fila < 3 && $fila >= 0 && $columna < 3 && $columna >= 0);
	}

	// Hace la jugada "inteligente" del computador
	function jugar_computadora(){

	}


	if(gano($tablero)){
		echo "Gano";
	}else{
		echo "Perdio";
	}
?>
