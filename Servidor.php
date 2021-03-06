<?php
	include 'Controlador.php';
	/**
	 *
	 */
	class Servidor{
		public $tablero;
		private $turno_jugador = 0;
		private $modo_facil = true;
		/**
		*Inicializa el tablero como un tablero vacio
		*/
		function __construct(){
			$this->tablero [0] [0] = -1; $this->tablero [0] [1] = -1; $this->tablero [0] [2] = -1;
			$this->tablero [1] [0] = -1; $this->tablero [1] [1] = -1; $this->tablero [1] [2] = -1;
			$this->tablero [2] [0] = -1; $this->tablero [2] [1] = -1; $this->tablero [2] [2] = -1;

		//	$this->modo_facil = $modo;
		}
		/*
		Pone la ficha del jugador en turno en la posicion que se solicita
		*/
		public function poner_ficha($fila,$columna){
			if($this->esta_vacia($fila,$columna) && $this->es_valida($fila,$columna)){
				$this->tablero[$fila][$columna] = $this->turno_jugador;
				if($this->turno_jugador == 0 && !tablero_vacio($this->tablero) && !gano($this->tablero, 0)){//siempre que se pueda jugar
					$this->cambiar_jugador();
					$posicion_retorno = $this->jugar_computadora();
					return $posicion_retorno;
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

		//Cambia el identificador del jugador para poder colocar la ficha correcta
		private function cambiar_jugador(){
			if($this->get_turno_jugador() == 0 ){
				$this->set_turno_jugador(1);
			}else{
				$this->set_turno_jugador(0);
			}
		}
		// Hace la jugada "inteligente" del computador
		private function jugar_computadora(){
			if($this->modo_facil){
					$posicion = juego_facil($this->tablero);
			}
			$this->poner_ficha($posicion[0],$posicion[1]);
			$posicion_final = calcular_posicion($posicion[0],$posicion[1]);
			$this->cambiar_jugador();
			return $posicion_final;
		}

		//Metodo para probar que si ganaba
		public function  imprimir(){
			if(gano($this->tablero)){
				print "HAY UN GANADOR\n"	;
			}else{
				print "NO HAY UN GANADOR \n";
			}
			return "hola";
		}


		public function set_turno_jugador($turno){
			$this->turno_jugador = $turno;
		}
		public function get_turno_jugador(){
			return $this->turno_jugador;
		}

		// Retorna si hay un ganador con el tablero en el estado actual
		public function hay_ganador(){
			$ganador = 0;
			if(gano($this->tablero,0)){
				$ganador = -1;
			}
			if(gano($this->tablero,1)){
				$ganador = -2;
			}
			return $ganador;
		}

		//Inserta un nuevo record en la base de datos con el nombre y el tiempo que se le proporcione
		public function insertar_ganador($nombre,$tiempo){
			$dbconn = pg_connect("host=titanic.ecci.ucr.ac.cr dbname=ci2413 user=eb10141 password=eb10141")
    	or die('No se ha podido conectar: ' . pg_last_error());

			$query = "INSERT INTO eb10141.gato (name,time) VALUES ('".$nombre."' ,".$tiempo.");";
			//echo $query;
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			// Liberando el conjunto de resultados
			pg_free_result($result);

			// Cerrando la conexión
			pg_close($dbconn);
		}

		//Retorna en un string los primeros mejores tiempos en los record
		public function mostrar_records(){
			$dbconn = pg_connect("host=titanic.ecci.ucr.ac.cr dbname=ci2413 user=eb10141 password=eb10141")
    	or die('No se ha podido conectar: ' . pg_last_error());

			$query = "SELECT name, time FROM eb10141.gato ORDER BY time LIMIT 10;";
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			$str = "";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		    foreach ($line as $col_value) {
        	$str.= $col_value."     ";
    		}
    		$str.="\n";
			}
			echo $str;
			// Liberando el conjunto de resultados
			pg_free_result($result);

			// Cerrando la conexión
			pg_close($dbconn);

			return $str;
		}

    public function mostrar_tablero(){
      $str = $this->tablero[0][0].", ".$this->tablero[0][1].", ".$this->tablero[0][2]."</br>";
      $str .= $this->tablero[1][0].", ".$this->tablero[1][1].", ".$this->tablero[1][2]."</br>";
      $str .= $this->tablero[2][0].", ".$this->tablero[2][1].", ".$this->tablero[2][2]."</br>";
      $str .= "===============================</br>";
      return $str;
    }

	}

?>
