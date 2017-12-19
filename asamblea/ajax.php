<?php
//$fichero='../votaciones/gobernacion';
$fichero='cargar/';
$fichero=scandir($fichero, 1);
$fichero="cargar/".$fichero[0];
$xml = new SimpleXMLElement($fichero, null, true);

$xml2= new SimpleXMLElement($fichero, null, true);
$key=0;
$key=0;
$key2=0;
$a=0;

/*eliminacion del antiguo xml parseado*/
/*$origen='../votaciones/gobernacion/nuevo';
$f=scandir($origen,1);
@unlink("../votaciones/gobernacion/nuevo/".$f[0]);*/

/*Creacion del nuevo xml parseado*/
$xmlNew = new DomDocument('1.0', 'UTF-8'); 
$root = $xmlNew->createElement('departamentos');
$root = $xmlNew->appendChild($root);

echo "<br> Hay ".$xml->count()." Municipios";
echo"<br><br>";
foreach ($xml as $value) {
echo "--Numero de partidos por Gobernación----> ".$prt=$xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
echo"<br><br>";
echo "--Numero de candidatos a Gobernación----> ".$cand=$xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
echo "<br><br>";
/*nombre del departamento*/
foreach ($xml2 as $val) {
echo $xml2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xml2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);
if (++$a==1) break;
}
/*creacion estructura para los candidatos*/
echo"--------------Candidatos-----------------<br>";
for($j=0;$j<$cand;$j++){
	echo"-------------------------------<br>";
$candidato = $xmlNew->createElement('candidato');
$candidato = $dpto->appendChild($candidato);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
$act = $xmlNew->createElement('id', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
$act = $candidato->appendChild($act);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
$act = $xmlNew->createElement('actual', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
$act = $candidato->appendChild($act);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
$act = $xmlNew->createElement('porcentaje', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
$act = $candidato->appendChild($act);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
$id = $xmlNew->createElement('id_partido', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
$id = $candidato->appendChild($id);

}
echo"---------------partidos----------------<br>";
/*creacion estructura para los partidos*/
for($i=0;$i<$prt;$i++){
	echo"-------------------------------<br>";
$partido = $xmlNew->createElement('partido');
$partido = $dpto->appendChild($partido);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
$id = $xmlNew->createElement('id', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
$id = $partido->appendChild($id);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
$act = $xmlNew->createElement('actual', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
$act = $partido->appendChild($act);

echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
$porc = $xmlNew->createElement('porcentaje', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
$porc = $partido->appendChild($porc);
}
$key++;
$a=0;
echo "<hr>";
}


$xmlNew->formatOutput = true; 
$strings_xml = $xmlNew->saveXML(); 
$xmlNew->save('nuevo/new.xml'); 
echo 'Se Parseado el XML<br>'; 
/*-------------------------------------------------------------------------------------------------------------------------------*/

$fichero2='cargar/';
$fichero2=scandir($fichero2, 1);
$fichero2="cargar/".$fichero2[0];
$xml = new SimpleXMLElement($fichero2, null, true);

$xml2= new SimpleXMLElement($fichero2, null, true);
$key=0;
$key=0;
$key2=0;
$a=0;

/*eliminacion del antiguo xml parseado*/
/*$origen='../votaciones/gobernacion/nuevo';
$f=scandir($origen,1);
@unlink("../votaciones/gobernacion/nuevo/".$f[0]);*/

/*Creacion del nuevo xml parseado*/
$xmlNew2 = new DomDocument('1.0', 'UTF-8'); 
$root2 = $xmlNew2->createElement('departamentos');
$root2 = $xmlNew2->appendChild($root2);

echo "<br> Hay ".$xml->count()." Municipios";
echo"<br><br>";
foreach ($xml as $value) {
$vblanco=$xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido_Totales->lin->count();
/*nombre del departamento*/
foreach ($xml2 as $val) {
echo $xml2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xml2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew2->createElement($dpt);
$dpto = $root2->appendChild($dpto);
if (++$a==1) break;
}

$dato = $xmlNew2->createElement('datos');
$dato = $dpto->appendChild($dato);

echo $xml->Avance[$key]->Boletin["V"]."  Boletin <br>";
$act = $xmlNew2->createElement('boletin', $xml->Avance[$key]->Boletin["V"]);
$act = $dato->appendChild($act);

echo $xml->Avance[$key]->Dia["V"]."-".$xml->Avance[$key]->Mes["V"]."-".$xml->Avance[$key]->Anio["V"]."  Dia <br>";
$act = $xmlNew2->createElement('dia', $xml->Avance[$key]->Dia["V"]."-".$xml->Avance[$key]->Mes["V"]."-".$xml->Avance[$key]->Anio["V"]);
$act = $dato->appendChild($act);

echo $xml->Avance[$key]->Hora["V"].":".$xml->Avance[$key]->Minuto["V"]."  Hora <br>";
$act = $xmlNew2->createElement('hora', $xml->Avance[$key]->Hora["V"].":".$xml->Avance[$key]->Minuto["V"].":".$xml->Avance[$key]->Seg["V"]);
$act = $dato->appendChild($act);

echo $xml->Avance[$key]->Mesas_Informadas["V"]." de ".$xml->Avance[$key]->Mesas_Instaladas["V"]."  Informe de Mesas <br>";
$act = $xmlNew2->createElement('mesas', $xml->Avance[$key]->Mesas_Informadas["V"]." de ".$xml->Avance[$key]->Mesas_Instaladas["V"]);
$act = $dato->appendChild($act);

echo $xml->Avance[$key]->Total_Sufragantes["V"]." de ".$xml->Avance[$key]->Potencial_Sufragantes["V"]."  Informe de sufragante <br>";
$act = $xmlNew2->createElement('votantes', $xml->Avance[$key]->Total_Sufragantes["V"]." de ".$xml->Avance[$key]->Potencial_Sufragantes["V"]);
$act = $dato->appendChild($act);

for($k=1;$k<$vblanco;$k++)
{
	echo $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido_Totales->lin[$k]->Votos["V"]." votos en blanco <br>";
	$id = $xmlNew2->createElement('voto_blanco', $xml->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido_Totales->lin[$k]->Votos["V"]);
	$id = $dato->appendChild($id);
	$k=3;
}
echo $xml->Avance[$key]->Votos_Nulos["V"]."  Votos Nulos <br>";
$act = $xmlNew2->createElement('votos_nulos', $xml->Avance[$key]->Votos_Nulos["V"]);
$act = $dato->appendChild($act);

$key++;
$a=0;
echo "<hr>";
}


$xmlNew2->formatOutput = true; 
$strings_xml = $xmlNew2->saveXML(); 
$xmlNew2->save('nuevo/datos.xml'); 
echo 'Se Parseado el XML de Datos<br>'; 

//GENERANDO JSON
	$xml=simplexml_load_file("nuevo/new.xml") or die("Error: Cannot create object");
	$arrPartidos=array();
	$arrPartidosV2=array();
	foreach ($xml as $departamento => $value) {
		$arrPartidosV2[$departamento]=array();
		$i=0;
		$esArrayCandidato=false;
		$esArrayPartido=false;
		foreach ($value as $corporacion => $infoPartido) {
			if ($esArrayCandidato==false) {
				$esArrayCandidato=true;
				$arrPartidosV2[$departamento]["candidato"]=array();
			}
			
			$corporacionID=(int)$infoPartido->id;
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
	$fileJson = fopen("json.json", 'w') or die("Error al abrir fichero de salida");
	fwrite($fileJson, json_encode($arrPartidosV2, JSON_UNESCAPED_UNICODE));
	fclose($fileJson);
	echo "Genero el JSON";

//GENERANDO JSON DATOS
	$xml=simplexml_load_file("nuevo/datos.xml") or die("Error: Cannot create object");
	$arrDatos=array();
	foreach ($xml as $departamento => $value) {
		$arrDatos[$departamento]=$value;
	}
	$fileJson = fopen("jsonDatos.json", 'w') or die("Error al abrir fichero de salida");
	fwrite($fileJson, json_encode($arrDatos, JSON_UNESCAPED_UNICODE));
	fclose($fileJson);?>