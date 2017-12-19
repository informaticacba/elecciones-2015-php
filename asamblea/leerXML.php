<?php
	$xml=simplexml_load_file("nuevo/new.xml") or die("Error: Cannot create object");

	$arrPartidos=array();
	$arrPartidosV2=array();
	foreach ($xml as $departamento => $value) {

		//echo "<hr>Key: ".$departamento;
		//echo "<pre>";
		//print_r($value->partido[2]);
		//echo "</pre>";
		//$arrPartidos[$departamento]=array();
		$arrPartidosV2[$departamento]=array();
		$i=0;
		$esArrayCandidato=false;
		$esArrayPartido=false;
		foreach ($value as $corporacion => $infoPartido) {
			switch ($corporacion) {
				case 'candidato':
					if ($esArrayCandidato==false) {
						$esArrayCandidato=true;
						$arrPartidosV2[$departamento]["candidato"]=array();
					}
				break;

				case 'partido':
					if ($esArrayPartido==false) {
						$esArrayPartido=true;
						$arrPartidosV2[$departamento]["partido"]=array();
						$i=0;
					}
				break;
				
			}
				//echo "<br>".$corporacion." $i <br>";
			
				$corporacionID=(int)$infoPartido->id;
				/*echo "<hr><pre>";
				print_r($infoPartido);
				echo "</pre>";*/
				//exit();
				/*$arrPartidos[$corporacion]=array();			
				$arrPartidos[$corporacion]["anterior"]=$infoPartido->anterior["0"];
				$arrPartidos[$corporacion]["actual"]=$infoPartido->actual;
				$arrPartidos[$corporacion]["porcentaje"]=$infoPartido->porcentaje;
				$arrPartidos[$corporacion]["id"]=$partidoID;*/

				/*$arrPartidos[$departamento][$i]=array();
				$arrPartidos[$departamento][$i]["anterior"]=$infoPartido->anterior["0"];
				$arrPartidos[$departamento][$i]["actual"]=$infoPartido->actual;
				$arrPartidos[$departamento][$i]["porcentaje"]=$infoPartido->porcentaje;
				$arrPartidos[$departamento][$i]["id"]=$partidoID;*/
				
				
				
				$arrPartidosV2[$departamento][$corporacion][$i]=array();
				$arrPartidosV2[$departamento][$corporacion][$i]["actual"]=$infoPartido->actual;
				$arrPartidosV2[$departamento][$corporacion][$i]["porcentaje"]=$infoPartido->porcentaje;
				$arrPartidosV2[$departamento][$corporacion][$i]["id"]=$corporacionID;
				if ($corporacion=="candidato") {
					$arrPartidosV2[$departamento][$corporacion][$i]["id_partido"]=$infoPartido->id_partido;
				}

				$i++;
		}
		
	}

	/*echo "<hr><pre>";
	print_r($arrPartidosV2);
	echo "</pre>";*/

	//echo json_encode($arrPartidos);
	echo json_encode($arrPartidosV2);

	/*
	$arrPartidos["10"]=array();
	$arrPartidos["10"]["anterior"]=$xml->antioquia[0]->partido_010->anterior;
	$arrPartidos["10"]["actual"]=$xml->antioquia[0]->partido_010->actual;

	$arrPartidos["11"]=array();
	$arrPartidos["11"]["anterior"]=$xml->antioquia[0]->partido_011->anterior;
	$arrPartidos["11"]["actual"]=$xml->antioquia[0]->partido_011->actual;

	$arrPartidos["12"]=array();
	$arrPartidos["12"]["anterior"]=$xml->antioquia[0]->partido_012->anterior;
	$arrPartidos["12"]["actual"]=$xml->antioquia[0]->partido_012->actual;

	echo json_encode($arrPartidos);
	*/
	

	/*
	$xml = new SimpleXMLElement('AVA_GOB_DE_0000_1937.xml', null, true);
	$key=0;
	foreach ($xml as $value) {
		

		echo $xml->count();
		echo "<br><br>";
		echo $xml->Avance[$key]->Numero["V"]."<br>";
		echo $xml->Avance[$key]->Boletin["V"]."<br>";
		echo $xml->Avance[$key]->Tipo_Avance["V"]."<br>";
		echo $xml->Avance[$key]->Desc_Corporacion["V"]."<br>";
		echo $xml->Avance[$key]->Departamento["V"]."<br>";
		echo $xml->Avance[$key]->Desc_Departamento["V"]."<br>";
		echo $xml->Avance[$key]->Municipio["V"]."<br>";
		echo $xml->Avance[$key]->Desc_Municipio["V"]."<br>";
		echo $xml->Avance[$key]->Comuna["V"]."<br>";
		echo $xml->Avance[$key]->Desc_Comuna["V"]."<br>";
		echo $xml->Avance[$key]->Dia["V"]."<br>";
		echo $xml->Avance[$key]->Mes["V"]."<br>";
		echo $xml->Avance[$key]->Anio["V"]."<br>";
		echo $xml->Avance[$key]->Hora["V"]."<br>";
		echo $xml->Avance[$key]->Minuto["V"]."<br>";
		echo $xml->Avance[$key]->Seg["V"]."<br>";
		echo $xml->Avance[$key]->Mesas_Instaladas["V"]."<br>";
		echo $xml->Avance[$key]->Mesas_Informadas["V"]."<br>";
		echo $xml->Avance[$key]->Porc_Mesas_Informadas["V"]."<br>";
		echo $xml->Avance[$key]->Potencial_Sufragantes["V"]."<br>";
		echo $xml->Avance[$key]->Total_Sufragantes["V"]."<br>";
		echo $xml->Avance[$key]->Porc_Sufragantes["V"]."<br>";
		echo $xml->Avance[$key]->Votos_Nulos["V"]."<br>";
		echo $xml->Avance[$key]->Porc_Votos_Nulos["V"]."<br>";
		echo $xml->Avance[$key]->Votos_No_Marcados["V"]."<br>";
		echo $xml->Avance[$key]->Porc_Votos_No_Marcados["V"]."<br>";
		$key++;
		echo "<hr>";
	}*/


?>