<?php

	foreach($_POST as $nombre_campo => $valor){
	   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
	   eval($asignacion);
	}
	//if( $what == 'candidatos' ) {
		/*$candidatos_txt = file_get_contents( "CLCANDIDATOS_03.txt" );
		$rows = explode("\r\n", $candidatos_txt);

		$candidatos = array();
		$i=0;*/
		/*
		foreach( $rows as $key=> "$val){
			//echo "Entro $key veces";
			
			
			$candidato = array(
				'corporacion' => " substr( $val , 0 , 3 ),
				'cod_circunscripcion' => " substr( $val , 3 , 1 ),
				'cod_departamento' => " substr( $val , 4 , 2 ),
				'cod_municipio' => " substr( $val , 6 , 3 ),
				'cod_comuna' => " substr( $val , 9 , 2 ),
				'cod_partido' => " substr( $val , 11 , 3 ),
				'cod_candidato' => " substr( $val , 14 , 3 ),
				'preferente' => " substr( $val , 17 , 1 ),
				'nombre' => " substr( $val , 18 , 50 ),
				'apellido' => " substr( $val , 68 , 50 ),
				'cedula' => " trim( substr( $val , 118 , 15 ) ),
				'sexo' => " substr( $val , 133 , 3 )
			);


			if( $candidato['corporacion']==001){
				$candidatos[$i] = array();
				$candidatos[$i] = $candidato;
			}
			$i++;
		}*/


		require_once 'claves/claves-candidatos.php';



		$dataCandidatos=array();
		$dataCandidatos["gobernacion"]=array();
		foreach ($candidatos as $key => $value) {
			//print_r($value);
			//echo "-".
			//print 
			$departamento=str_replace(" ", "", $value["cod_departamento"]);


			//print_r($dataCandidatos["gobernacion"][$departamento]);
			//break;
			//$dataCandidatos["gobernacion"][$value["cod_departamento"]]=$value;

			if (@!is_array($dataCandidatos["gobernacion"][$value["cod_departamento"]])) {
				$dataCandidatos["gobernacion"][$value["cod_departamento"]]=array();
			}
			$codigoCandidato=str_replace(" ", "",$value["cod_candidato"]);
			$dataCandidatos["gobernacion"][$value["cod_departamento"]][$codigoCandidato]=$value;
		}

		//echo count($candidatos);			
		echo "<pre>";print_r($dataCandidatos);echo "</pre>";
		//echo json_encode($dataCandidatos);
	//}
	/* elseif( $what == 'partidos' ){
		$partidos_txt = file_get_contents( $txt );
		$rows = explode( "\r\n", $partidos_txt);

		$partidos = array();

		foreach( $rows as $key => " $val ){
			$partido = array(
				'cod' => " substr( $val, 0, 3),
				'name' => " trim(substr( $val, 3, 60))
			);
			if( $partido['cod'] ){
				$partidos[] = $partido;
			}
		}

		return $partidos;
	}*/
?>