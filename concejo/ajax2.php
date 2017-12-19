<?php

$ficheroatlantico='cargar/atlantico/';$ficheroatlantico=scandir($ficheroatlantico, 1);$ficheroatlantico="cargar/atlantico/".$ficheroatlantico[0];
$ficherobolivar='cargar/bolivar/';$ficherobolivar=scandir($ficherobolivar, 1);$ficherobolivar="cargar/bolivar/".$ficherobolivar[0];
$ficherocesar='cargar/cesar/';$ficherocesar=scandir($ficherocesar, 1);$ficherocesar="cargar/cesar/".$ficherocesar[0];
$ficherocordoba='cargar/cordoba/';$ficherocordoba=scandir($ficherocordoba, 1);$ficherocordoba="cargar/cordoba/".$ficherocordoba[0];
$ficheromagdalena='cargar/magdalena/';$ficheromagdalena=scandir($ficheromagdalena, 1);$ficheromagdalena="cargar/magdalena/".$ficheromagdalena[0];
$ficherosucre='cargar/sucre/';$ficherosucre=scandir($ficherosucre, 1);$ficherosucre="cargar/sucre/".$ficherosucre[0];
$ficherola_guajira='cargar/la_guajira/';$ficherola_guajira=scandir($ficherola_guajira, 1);$ficherola_guajira="cargar/la_guajira/".$ficherola_guajira[0];
$ficherosanandres='cargar/sanandres/';$ficherosanandres=scandir($ficherosanandres, 1);$ficherosanandres="cargar/sanandres/".$ficherosanandres[0];

$name=array(
		$ficheroatlantico,
		$ficherobolivar,
		$ficherocesar,
		$ficherocordoba,
		$ficheromagdalena,
		$ficherosucre,
		$ficherola_guajira,
		$ficherosanandres
	);


$key=1;$key=0;$key2=0;$a=0;

$xmlNew = new DomDocument('1.0', 'UTF-8'); 
$root = $xmlNew->createElement('departamento');
$root = $xmlNew->appendChild($root);



for($k=0;$k<8;$k++)
{

$namexml[$k]=$name[$k];
	$namexml[$k]= new SimpleXMLElement($name[$k], null, true);

echo $namexml[$k]->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$namexml[$k]->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);



foreach ($namexml[$k] as $val)
{
	$candlin=$namexml[$k]->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($namexml[$k] as $val) {
	/*creacion estructura para los candidatos*/
	
		$cand=$namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			echo"***Municipio ".$namexml[$k]->Avance[$key]->Desc_Municipio["V"]." <br>";
			$mn=preg_replace('/[ ]+/','_', $namexml[$k]->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
			$municipio = $xmlNew->createElement($mn);
			$municipio = $dpto->appendChild($municipio);
			
			/*creacion estructura para los candidatos*/
			echo"--------------Candidatos-----------------".$candlin."<br>";
			for($j=1;$j<$cand;$j++)
			{
				echo"-------------------------------".$j."<br>";
				$candidato = $xmlNew->createElement('candidato');
				$candidato = $municipio->appendChild($candidato);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}

			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $namexml[$k]->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
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

