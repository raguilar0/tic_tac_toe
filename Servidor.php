<?php
	include 'Controlador.php';
	/**
	 *
	 */
	class Servidor{
		public $tablero;
		private $turno_jugador = 0;
		function __construct(){
			$this->tablero [0] [0] = -1; $this->tablero [0] [1] = -1; $this->tablero [0] [2] = -1;
			$this->tablero [1] [0] = -1; $this->tablero [1] [1] = -1; $this->tablero [1] [2] = -1;
			$this->tablero [2] [0] = -1; $this->tablero [2] [1] = -1; $this->tablero [2] [2] = -1;
		}
		/*
		Pone la ficha del jugador en turno en la posicion que se solicita
		*/
		public function poner_ficha($fila,$columna){
			if($this->esta_vacia($fila,$columna) && $this->es_valida($fila,$columna)){
				$this->tablero[$fila][$columna] = $this->turno_jugador;
				if($this->turno_jugador == 0 ){
				//	jugar_computadora();
				}
			}
		}
		//Verifica que una casilla del tablero esta vacia
		private function esta_vacia($fila, $columna){
			return ($this->tablero[$fila][$columna] == -1);
		}
		// Verifica que las coordenadas sean validas en el tablero
		private function es_valida($fila, $columna){
			return ($fila < 3 && $fila >= 0 && $columna < 3 && $columna >= 0);
		}
		// Hace la jugada "inteligente" del computador
		private function jugar_computadora(){
		}
		public function  imprimir(){
			if(gano($this->tablero)){
				print "HAY UN GANADOR\n"	;
			}else{
				print "NO HAY UN GANADOR \n";
			}
			return "hola";
		}
	}
		
?>
