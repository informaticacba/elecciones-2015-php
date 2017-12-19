<?php

	//switch ($nivel) {
		//case 'candidatos':
			//Cargando claves candidatos
			require_once 'claves/claves-candidatos.php';
			$dataCandidatos=array();
			$dataCandidatos["gobernacion"]=array();
			foreach ($candidatos as $key => $value) {
				$departamento=str_replace(" ", "", $value["cod_departamento"]);
				if (@!is_array($dataCandidatos["gobernacion"][$departamento])) {
					$dataCandidatos["gobernacion"][$departamento]=array();
				}
				if (@!is_array($dataCandidatos["gobernacion"][$departamento]["candidato"])) {
					$dataCandidatos["gobernacion"][$departamento]["candidato"]=array();
				}
				$codigoCandidato=str_replace(" ", "",$value["cod_candidato"]);
				$codigoCandidato=(int)$codigoCandidato;
				$dataCandidatos["gobernacion"][$departamento]["candidato"][$codigoCandidato]=$value;
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