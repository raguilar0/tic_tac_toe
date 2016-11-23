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
	function gano($matrix){;
		$ha_ganado = false;
		$ha_ganado = revisar($matrix); 
		return $ha_ganado;
	}
	
	function revisar ($matrix){
			return (revisar_horizontal($matrix) || revisar_vertical($matrix) || revisar_diagonales($matrix));
	}
	
	function revisar_horizontal($matrix){
		$ha_ganado = false;
		for($i=0 ; $i<3 ;++$i){
			if( $matrix[$i][0] == $matrix[$i][1] && $matrix[$i][0] == $matrix[$i][2] && $matrix[$i][0] != -1 ){
				$ha_ganado = true;
			}
		}
		return $ha_ganado;
	}
	
	function revisar_vertical($matrix){
		$ha_ganado = false;
		for($i=0 ; $i<3 ;++$i){
			if($matrix[0][$i] == $matrix[1][$i] && $matrix[0][$i] == $matrix[2][$i] && $matrix[0][$i] != -1){
				$ha_ganado = true;
			}
		}
		return $ha_ganado;
	}
	
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
	
	//$obj = new Controlador();
?> 