<?php
$ficherola_guajira='cargar/la_guajira/';$ficherola_guajira=scandir($ficherola_guajira, 1);$ficherola_guajira="cargar/la_guajira/".$ficherola_guajira[0];
$xmlla_guajira = new SimpleXMLElement($ficherola_guajira, null, true);$xmlla_guajira2= new SimpleXMLElement($ficherola_guajira, null, true);

$key=1;$key=0;$key2=0;$a=0;

$xmlNew = new DomDocument('1.0', 'UTF-8'); 
$root = $xmlNew->createElement('departamento');
$root = $xmlNew->appendChild($root);

echo $xmlla_guajira2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlla_guajira2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlla_guajira as $val)
{
	$candlin=$xmlla_guajira->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlla_guajira2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlla_guajira->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlla_guajira->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlla_guajira->Avance[$key]->Desc_Municipio["V"]);
			$mn=str_replace('. ','_',$mn);
			$mn=str_replace('  ','_',$mn);
			$mn=str_replace('._','_',$mn);
*/
			$municipio = $xmlNew->createElement($mn);
			$municipio = $dpto->appendChild($municipio);
			echo"***Municipio ".$mn." <br>";
			/*creacion estructura para los candidatos*/
			echo"--------------Candidatos-----------------".$candlin."<br>";
			for($j=1;$j<$cand;$j++)
			{
				echo"-------------------------------".$j."<br>";
				$candidato = $xmlNew->createElement('candidato');
				$candidato = $municipio->appendChild($candidato);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlla_guajira->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

$xmlNew->formatOutput = true; 
$strings_xml = $xmlNew->saveXML(); 
$xmlNew->save('nuevo/new3.xml'); 
echo 'Se Parseado el XML<br>'; 

?>