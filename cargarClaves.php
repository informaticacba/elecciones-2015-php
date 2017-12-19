<?php
set_time_limit(0);
foreach ($variable=array("candidato", "partido", "consejo") as $key => $value) {
	switch ($value) {
		case 'partido':
			$partidos_txt = file_get_contents( "claves/CLPARTIDOS_05.txt" );
			$rows = explode("\r\n", $partidos_txt);

			$i=0;
			$dataPartidos=array();
			foreach( $rows as $key=> $val){
				$codigo=substr($val, 0, 3);
				$nombre=utf8_encode(substr($val, 3, 86));
				if ($codigo!="") {
					$partido = array(
						'codigo' => $codigo,
						'nombre' => $nombre
					);
					$dataPartidos[$i] = $partido;
					$dataPartidosID[$codigo] = $partido;
				}
				$i++;
			}
		break;

		case 'candidato':
			//require_once 'claves/claves-candidatos.php';
			//$dataCandidatos=$candidatos;
			$dataCandidatosTotal=array();
			$dataCandidatosAlcaldia=array();
			$dataCandidatos=array();
			$dataCandidatos["gobernacion"]=array();
			$dataCandidatosID=array();
			$dataCandidatosConcejo=array();
			$partidos_txt = file_get_contents( "claves/CLCANDIDATOS_05.txt" );
			$rows = explode("\r\n", $partidos_txt);
			foreach( $rows as $key=> $value){
				$cod_corporacion=substr($value, 0, 3);
				$cod_departamento=substr($value, 4, 2);
				$cod_municipio=substr($value, 6, 3);
				$cod_candidato=substr($value, 14, 3);
				$cod_partido=substr($value, 11, 3);
				//$cod_candidato=utf8_encode(substr($value, 15, 3));
				$nombre=utf8_encode(substr($value, 18, 47));
				$apellido=utf8_encode(substr($value, 68, 20));
				$datosCandidato=array(
					'nombre' => $nombre,
					'apellido' => $apellido,
					'codPartido' => $cod_partido
				);
				/*Alcaldia*/
					if (@!is_array($dataCandidatosAlcaldia[$cod_departamento])) {
						$dataCandidatosAlcaldia[$cod_departamento]=array();
					}
					if (@!is_array($dataCandidatosAlcaldia[$cod_departamento][$cod_municipio])) {
						$dataCandidatosAlcaldia[$cod_departamento][$cod_municipio]=array();
					}
					if (@!is_array($dataCandidatosAlcaldia[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato])) {
						$dataCandidatosAlcaldia[$cod_departamento][$cod_municipio][$cod_candidato]=array();
					}
					$dataCandidatosAlcaldia[$cod_departamento][$cod_municipio][$cod_candidato]=$datosCandidato;

				/*Concejo*/
					//echo "<br>Concejo es: ".$cod_corporacion;
					if ($cod_corporacion=="04") {
						if (@!is_array($dataCandidatosConcejo[$cod_departamento])) {
							$dataCandidatosConcejo[$cod_departamento]=array();
						}
						if (@!is_array($dataCandidatosConcejo[$cod_departamento][$cod_municipio])) {
							$dataCandidatosConcejo[$cod_departamento][$cod_municipio]=array();
						}
						if (@!is_array($dataCandidatosConcejo[$cod_departamento][$cod_municipio][$cod_partido])) {
							$dataCandidatosConcejo[$cod_departamento][$cod_municipio][$cod_partido]=array();
						}
						if (@!is_array($dataCandidatosConcejo[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato])) {
							$dataCandidatosConcejo[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato]=array();
						}
						$dataCandidatosConcejo[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato]=$datosCandidato;
					}
				/*dataCandidatosID*/
					if (@!is_array($dataCandidatosID[$cod_departamento])) {
						$dataCandidatosID[$cod_departamento]=array();
					}
					if (@!is_array($dataCandidatosID[$cod_departamento][$cod_municipio])) {
						$dataCandidatosID[$cod_departamento][$cod_municipio]=array();
					}
					if (@!is_array($dataCandidatosID[$cod_departamento][$cod_municipio][$cod_candidato])) {
						$dataCandidatosID[$cod_departamento][$cod_municipio][$cod_candidato]=array();
					}
					$dataCandidatosID[$cod_departamento][$cod_municipio][$cod_candidato]=$datosCandidato;

				/*Ultimo*/
					if (@!is_array($dataCandidatosTotal[$cod_departamento])) {
						$dataCandidatosTotal[$cod_departamento]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido][$cod_candidato])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido][$cod_candidato]=array();
					}
					$dataCandidatos[$cod_departamento][$cod_municipio][$cod_corporacion][$cod_partido][$cod_candidato]=$datosCandidato;					
					
				/*Total*/
					/*dataCandidatosTotal*/
					if (@!is_array($dataCandidatosTotal[$cod_departamento])) {
						$dataCandidatosTotal[$cod_departamento]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_partido])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_partido]=array();
					}
					if (@!is_array($dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato])) {
						$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato]=array();
					}
					$dataCandidatosTotal[$cod_departamento][$cod_municipio][$cod_partido][$cod_candidato]=$datosCandidato;
			}

			/*echo "<pre>";
			print_r($dataCandidatosID);
			echo "</pre>";*/

			//
			//$dataCandidatos=array();
			/*$dataCandidatos["gobernacion"]=array();
			foreach ($candidatos as $key => $value) {
				$departamento=str_replace(" ", "", $value["cod_departamento"]);
				if (@!is_array($dataCandidatos["gobernacion"][$departamento])) {
					$dataCandidatos["gobernacion"][$departamento]=array();
				}
				$codigoCandidato=str_replace(" ", "",$value["cod_candidato"]);
				$dataCandidatos["gobernacion"][$departamento][$codigoCandidato]=$value;
			}*/
		break;
	}
}
//echo "<pre>";print_r($dataCandidatos);echo "</pre>";
?>
<?php //echo json_encode($dataCandidatos);?>
<script>
	var clavesPartidos=<?php echo json_encode($dataPartidos, JSON_PRETTY_PRINT);?>;
	var clavesPartidosID=<?php echo json_encode($dataPartidosID, JSON_PRETTY_PRINT);?>;
	var clavesCandidatos=<?php echo json_encode($dataCandidatos, JSON_PRETTY_PRINT);?>;
	var clavesCandidatosID=<?php echo json_encode($dataCandidatosID, JSON_PRETTY_PRINT);?>;
	var clavesCandidatosConcejo=<?php echo json_encode($dataCandidatosConcejo, JSON_PRETTY_PRINT);?>;
	var clavesCandidatosAlcaldia=<?php echo json_encode($dataCandidatosAlcaldia, JSON_PRETTY_PRINT);?>;
	var clavesCandidatosTotal=<?php echo json_encode($dataCandidatosTotal, JSON_PRETTY_PRINT);?>;
</script>