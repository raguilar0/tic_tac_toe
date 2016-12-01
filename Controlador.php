<?php
	/*class Controlador {
		function __construct() {
		   print "ESTO ES EL CONTROLADOR";
	   }
		public function imprimir(){
			return "HOLAMUNDO";
		}
	}*/

	function imprimir(){
			return "HOLAMUNDO";
		}
	// Verifica si en el tablero actual hay un ganador
	function gano($matrix){;
		$ha_ganado = false;
		$ha_ganado = revisar($matrix);
		return $ha_ganado;
	}

	// Revisa todas las posibles opciones de ganar
	function revisar ($matrix){
			return (revisar_horizontal($matrix) || revisar_vertical($matrix) || revisar_diagonales($matrix));
	}

	function revisar_horizontal($matrix){
		// Verifica si hay algun ganador en las filas del tablero
		$ha_ganado = false;
		for($i=0 ; $i<3 ;++$i){
			if( $matrix[$i][0] == $matrix[$i][1] && $matrix[$i][0] == $matrix[$i][2] && $matrix[$i][0] != -1 ){
				$ha_ganado = true;
			}
		}
		return $ha_ganado;
	}

	// Verifica si hay algun ganador en las columnas del tablero
	function revisar_vertical($matrix){
		$ha_ganado = false;
		for($i=0 ; $i<3 ;++$i){
			if($matrix[0][$i] == $matrix[1][$i] && $matrix[0][$i] == $matrix[2][$i] && $matrix[0][$i] != -1){
				$ha_ganado = true;
			}
		}
		return $ha_ganado;
	}

	// Verifica si hay algun ganador en las diagonales del tablero
	function revisar_diagonales($matrix){
		$ha_ganado = false;
		if($matrix[0][0] == $matrix[1][1] && $matrix[0][0]==$matrix[2][2] && $matrix[0][0] != -1 ){
			$ha_ganado = true;
		}
		if($matrix[0][2] == $matrix[1][1] && $matrix[0][2]==$matrix[2][0] && $matrix[0][2] != -1 ){
			$ha_ganado = true;
		}

		return $ha_ganado;
	}

		function movimiento($matriz){
			$posicion_ficha = analizar_tablero($matrix);
			return $posicion_ficha;
		}

	// Analiza el movimiento de la maquina y retorna la posicion donde debe de poner la ficha
	function analizar_tablero($matrix){
		$posicion_ficha[0] = 0;
		$posicion_ficha[1] = 0;
		if(tablero_vacio( $matrix )){
			$posicion_ficha = escoger_esquina();
		}

		return $posicion_ficha;
	}

	//Verifica que el tablero esta vacio si no es asi retorna false
	function tablero_vacio($tablero){
		$esta_vacio = true;
		for( $i=0 ; $i<3 ; $i++){
			for( $j=0 ; $j<3; ++$j){
				if($tablero[$i][$j] != -1){
					$esta_vacia = false;
				}
			}
		}
		return $esta_vacia;
	}

	//Escoge una esquina al azar
	function escoger_esquina(){
		$esquina = rand(1,4);
		switch ($esquina) {
		    case 1:
					$posicion[0] = 0;
					$posicion[1] = 1;
		      break;
		    case 2:
					$posicion[0] = 0;
					$posicion[1] = 2;
		      break;
		    case 3:
					$posicion[0] = 2;
					$posicion[1] = 0;
		      break;
				case 4:
					$posicion[0] = 2;
					$posicion[1] = 2;
					break;
		}
	}

	function calcular_posicion($fila,$columna){
		return (($fila*3)+$columna);
	}
	//=========================Para el nivel facil=================================

	function juego_facil($tablero){
		$casillas_libres = contar_casillas_libres($tablero);
		$casilla_elegida = rand(1,$casillas_libres);
		return posicion_casilla_elegida($casilla_elegida,$tablero);
		return juego_feo($tablero);
	}

	function juego_feo($tablero){
		return 5;
	}
	
	function contar_casillas_libres($tablero){
		$contador = 0;
		for( $i=0 ; $i<3 ; $i++){
			for( $j=0 ; $j<3; ++$j){
				if($tablero[$i][$j] == -1){
					++$contador;
				}
			}
		}
		return $contador;
	}

	function posicion_casilla_elegida($numero_casilla,$tablero){
		$contador = 1;
		$numero_fila = 0;
		$numero_columna = 0;
		for( $i=0 ; $i<3 ; $i++){
			for( $j=0 ; $j<3; ++$j){
				if($tablero[$i][$j] == -1){
					++$contador;
					if($contador == $numero_casilla){
						$numero_fila = $i;
						$numero_columna = $j;
						break;
					}
				}
			}
		}
		$posicion[0] = $numero_fila;
		$posicion[1] = $numero_columna;
		return $posicion;
	}



	//$obj = new Controlador();
?>
