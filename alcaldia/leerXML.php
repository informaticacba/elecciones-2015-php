<?php
	$xml=simplexml_load_file("nuevo/new.xml") or die("Error: Cannot create object");

	$arrPartidos=array();
	$arrPartidosV2=array();
	foreach ($xml as $municipio => $value) {

		$arrPartidosV2[$municipio]=array();
		$i=0;
		$esArrayCandidato=false;
		$esArrayPartido=false;
		foreach ($value as $corporacion => $infoPartido) {
			switch ($corporacion) {
				case 'candidato':
					if ($esArrayCandidato==false) {
						$esArrayCandidato=true;
						$arrPartidosV2[$municipio]["candidato"]=array();
					}
				break;

				case 'partido':
					if ($esArrayPartido==false) {
						$esArrayPartido=true;
						$arrPartidosV2[$municipio]["partido"]=array();
						$i=0;
					}
				break;
				
			}
			
				$corporacionID=(int)$infoPartido->id;
				$arrPartidosV2[$municipio][$corporacion][$i]=array();
				$arrPartidosV2[$municipio][$corporacion][$i]["actual"]=$infoPartido->actual;
				$arrPartidosV2[$municipio][$corporacion][$i]["porcentaje"]=$infoPartido->porcentaje;
				$arrPartidosV2[$municipio][$corporacion][$i]["id"]=$corporacionID;
				if ($corporacion=="candidato") {
					$arrPartidosV2[$municipio][$corporacion][$i]["id_partido"]=$infoPartido->id_partido;
				}

				$i++;
		}
		
	}

	echo json_encode($arrPartidosV2);
?>