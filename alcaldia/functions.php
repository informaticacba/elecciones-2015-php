<?php

	//switch ($nivel) {
		//case 'candidatos':
			//Cargando claves candidatos
			require_once 'claves/claves-candidatos.php';
			$dataCandidatos=array();
			$dataCandidatos["alcaldia"]=array();
			foreach ($candidatos as $key => $value) {
				$departamento=str_replace(" ", "", $value["cod_departamento"]);
				if (@!is_array($dataCandidatos["alcaldia"][$departamento])) {
					$dataCandidatos["alcaldia"][$departamento]=array();
				}
				if (@!is_array($dataCandidatos["alcaldia"][$departamento]["candidato"])) {
					$dataCandidatos["alcaldia"][$departamento]["candidato"]=array();
				}
				$codigoCandidato=str_replace(" ", "",$value["cod_candidato"]);
				$codigoCandidato=(int)$codigoCandidato;
				$dataCandidatos["alcaldia"][$departamento]["candidato"][$codigoCandidato]=$value;
			}

			echo json_encode($dataCandidatos);
		
		//break;

		/*case 'partidos':
			$dataPartidos=array();
			$candidatos_txt = file_get_contents( "CLPARTIDOS_03.txt" );
			$rows = explode("\r\n", $candidatos_txt);
			$candidatos = array();
			$i=0;
			foreach( $rows as $key=> $val){
				$partido = array(
					'codigoPartido' => substr( $val , 0 , 3 )
				);
			}

			$dataPartidos[]=$partido;

			echo json_encode($dataPartidos);

		break;*/
	//}
?>