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


/*-----------------------------------------------------------------* Datos *-----------------------------------------------------------*/
$xmlNew = new DomDocument('1.0', 'UTF-8'); 
$root = $xmlNew->createElement('departamento');
$root = $xmlNew->appendChild($root);
$pos=0;
for($k=0;$k<8;$k++)
{
	$dataxml[$k]= new SimpleXMLElement($name[$k], null, true);
	
	echo $dataxml[$k]->Avance[$pos]->Desc_Departamento["V"]."<br>";
	$dpt=str_replace(' ','_',$dataxml[$k]->Avance[$pos]->Desc_Departamento["V"]);
	$dpto = $xmlNew->createElement($dpt);
	$dpto = $root->appendChild($dpto);

	$dato = $xmlNew->createElement('datos');
	$dato = $dpto->appendChild($dato);

	echo $dataxml[$k]->Avance[$pos]->Boletin["V"]."  Boletin <br>";
	$act = $xmlNew->createElement('boletin', $dataxml[$k]->Avance[$pos]->Boletin["V"]);
	$act = $dato->appendChild($act);

	echo $dataxml[$k]->Avance[$pos]->Dia["V"]."-".$dataxml[$k]->Avance[$pos]->Mes["V"]."-".$dataxml[$k]->Avance[$pos]->Anio["V"]."  Dia <br>";
	$act = $xmlNew->createElement('dia', $dataxml[$k]->Avance[$pos]->Dia["V"]."-".$dataxml[$k]->Avance[$pos]->Mes["V"]."-".$dataxml[$k]->Avance[$pos]->Anio["V"]);
	$act = $dato->appendChild($act);

	echo $dataxml[$k]->Avance[$pos]->Hora["V"].":".$dataxml[$k]->Avance[$pos]->Minuto["V"]."  hora <br>";
	$act = $xmlNew->createElement('hora', $dataxml[$k]->Avance[$pos]->Hora["V"].":".$dataxml[$k]->Avance[$pos]->Minuto["V"].":".$dataxml[$k]->Avance[$pos]->Seg["V"]);
	$act = $dato->appendChild($act);

	echo $dataxml[$k]->Avance[$pos]->Mesas_Informadas["V"]." de ".$dataxml[$k]->Avance[$pos]->Mesas_Instaladas["V"]."  Informe de Mesas <br>";
	$act = $xmlNew->createElement('mesas', $dataxml[$k]->Avance[$pos]->Mesas_Informadas["V"]." de ".$dataxml[$k]->Avance[$pos]->Mesas_Instaladas["V"]);
	$act = $dato->appendChild($act);

	echo $dataxml[$k]->Avance[$pos]->Total_Sufragantes["V"]." de ".$dataxml[$k]->Avance[$pos]->Potencial_Sufragantes["V"]."  Informe de sufragantes <br>";
	$act = $xmlNew->createElement('votantes', $dataxml[$k]->Avance[$pos]->Total_Sufragantes["V"]." de ".$dataxml[$k]->Avance[$pos]->Potencial_Sufragantes["V"]);
	$act = $dato->appendChild($act);

}
$xmlNew->formatOutput = true; 
$strings_xml = $xmlNew->saveXML(); 
$xmlNew->save('nuevo/datos.xml'); 
echo 'Se Parseado el XML de Datos para concejo<br>'; 
/*-----------------------------------------------------------------* Fin Datos *-----------------------------------------------------------*/


$pos=0;

for($k=0;$k<8;$k++)
{
	$namexml[$k]=$name[$k];
	$namexml[$k]= new SimpleXMLElement($name[$k], null, true);
	if($namexml[$k]->Avance[$k]->Desc_Municipio["V"]=="NO APLICA")
	{
		$doc=new SimpleXMLElement($name[$k],null,true);
		unset($doc->Avance[$pos]);
			if($doc->asXML($name[$k]))
			{
				echo"(ok) ".$name[$k]."<br>";
			}
			else
			{
				echo"(error) ".$name[$k]."<br>";
			}
	}
}


//lectura de los diferentes archivos xml originales
/*--- atlantico ---*/
$ficheroatlantico='cargar/atlantico/';$ficheroatlantico=scandir($ficheroatlantico, 1);$ficheroatlantico="cargar/atlantico/".$ficheroatlantico[0];
$xmlatlantico = new SimpleXMLElement($ficheroatlantico, null, true);$xmlatlantico2= new SimpleXMLElement($ficheroatlantico, null, true);
/*--- bolivar ---*/
$ficherobolivar='cargar/bolivar/';$ficherobolivar=scandir($ficherobolivar, 1);$ficherobolivar="cargar/bolivar/".$ficherobolivar[0];
$xmlbolivar = new SimpleXMLElement($ficherobolivar, null, true);$xmlbolivar2= new SimpleXMLElement($ficherobolivar, null, true);
/*--- cesar ---*/
$ficherocesar='cargar/cesar/';$ficherocesar=scandir($ficherocesar, 1);$ficherocesar="cargar/cesar/".$ficherocesar[0];
$xmlcesar = new SimpleXMLElement($ficherocesar, null, true);$xmlcesar2= new SimpleXMLElement($ficherocesar, null, true);
/*--- cordoba ---*/
$ficherocordoba='cargar/cordoba/';$ficherocordoba=scandir($ficherocordoba, 1);$ficherocordoba="cargar/cordoba/".$ficherocordoba[0];
$xmlcordoba = new SimpleXMLElement($ficherocordoba, null, true);$xmlcordoba2= new SimpleXMLElement($ficherocordoba, null, true);
/*--- magdalena ---*/
$ficheromagdalena='cargar/magdalena/';$ficheromagdalena=scandir($ficheromagdalena, 1);$ficheromagdalena="cargar/magdalena/".$ficheromagdalena[0];
$xmlmagdalena = new SimpleXMLElement($ficheromagdalena, null, true);$xmlmagdalena2= new SimpleXMLElement($ficheromagdalena, null, true);
/*--- sucre ---*/
$ficherosucre='cargar/sucre/';$ficherosucre=scandir($ficherosucre, 1);$ficherosucre="cargar/sucre/".$ficherosucre[0];
$xmlsucre = new SimpleXMLElement($ficherosucre, null, true);$xmlsucre2= new SimpleXMLElement($ficherosucre, null, true);
/*--- guajira ---*/
$ficherola_guajira='cargar/la_guajira/';$ficherola_guajira=scandir($ficherola_guajira, 1);$ficherola_guajira="cargar/la_guajira/".$ficherola_guajira[0];
$xmlla_guajira = new SimpleXMLElement($ficherola_guajira, null, true);$xmlla_guajira2= new SimpleXMLElement($ficherola_guajira, null, true);
/*--- sanandres ---*/
$ficherosanandres='cargar/sanandres/';$ficherosanandres=scandir($ficherosanandres, 1);$ficherosanandres="cargar/sanandres/".$ficherosanandres[0];
$xmlsanandres = new SimpleXMLElement($ficherosanandres, null, true);$xmlsanandres2= new SimpleXMLElement($ficherosanandres, null, true);
$key=1;$key=0;$key2=0;$a=0;

$xmlNew = new DomDocument('1.0', 'UTF-8'); 
$root = $xmlNew->createElement('departamento');
$root = $xmlNew->appendChild($root);

/*------------------------------------------------------------ *Atlantico*  ------------------------------------------------------------------------------------*/
echo $xmlatlantico2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlatlantico2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlatlantico as $val)
{
	$candlin=$xmlatlantico->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlatlantico2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlatlantico->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			echo"***Municipio ".$xmlatlantico->Avance[$key]->Desc_Municipio["V"]." <br>";
			$mn=str_replace(' ','_',$xmlatlantico->Avance[$key]->Desc_Municipio["V"]);
			$municipio = $xmlNew->createElement($mn);
			$municipio = $dpto->appendChild($municipio);
			
			/*creacion estructura para los candidatos*/
			echo"--------------Candidatos-----------------".$candlin."<br>";
			for($j=1;$j<$cand;$j++)
			{
				echo"-------------------------------".$j."<br>";
				$candidato = $xmlNew->createElement('candidato');
				$candidato = $municipio->appendChild($candidato);

				echo $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlatlantico->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}

			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *Bolivar*  ------------------------------------------------------------------------------------*/

$key=1;$key=0;$key2=0;$a=0;

echo $xmlbolivar2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlbolivar2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlbolivar as $val)
{
	$candlin=$xmlbolivar->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlbolivar2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlbolivar->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlbolivar->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlbolivar->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlbolivar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *Cesar*  ------------------------------------------------------------------------------------*/

$key=1;$key=0;$key2=0;$a=0;

echo $xmlcesar2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlcesar2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlcesar as $val)
{
	$candlin=$xmlcesar->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlcesar2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlcesar->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlcesar->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlcesar->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlcesar->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *Corodoba*  ------------------------------------------------------------------------------------*/
$key=1;$key=0;$key2=0;$a=0;

echo $xmlcordoba2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlcordoba2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlcordoba as $val)
{
	$candlin=$xmlcordoba->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlcordoba2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlcordoba->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlcordoba->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlcordoba->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlcordoba->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *Magdalena*  ------------------------------------------------------------------------------------*/
$key=1;$key=0;$key2=0;$a=0;

echo $xmlmagdalena2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlmagdalena2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlmagdalena as $val)
{
	$candlin=$xmlmagdalena->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlmagdalena2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlmagdalena->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlmagdalena->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlmagdalena->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlmagdalena->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *Sucre*  ------------------------------------------------------------------------------------*/
$key=1;$key=0;$key2=0;$a=0;

echo $xmlsucre2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlsucre2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlsucre as $val)
{
	$candlin=$xmlsucre->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlsucre2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlsucre->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlsucre->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlsucre->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlsucre->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*------------------------------------------------------------ *La guajira*  ------------------------------------------------------------------------------------*/
$key=1;$key=0;$key2=0;$a=0;

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

/*------------------------------------------------------------ *SanAndres*  ------------------------------------------------------------------------------------*/
$key=1;$key=0;$key2=0;$a=0;

echo $xmlsanandres2->Avance[$key]->Desc_Departamento["V"]."<br>";
$dpt=str_replace(' ','_',$xmlsanandres2->Avance[$key]->Desc_Departamento["V"]);
$dpto = $xmlNew->createElement($dpt);
$dpto = $root->appendChild($dpto);


foreach ($xmlsanandres as $val)
{
	$candlin=$xmlsanandres->Avance[$key2]->Detalle_Circunscripcion->lin->count();
	
	foreach ($xmlsanandres2 as $val) {
	/*creacion estructura para los candidatos*/
		if($xmlsanandres->Avance[$key]->Desc_Municipio["V"]!="NO APLICA")
		{
		$cand=$xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin->count();
		$prt=$xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin->count();
			$mn=preg_replace('/[ ]+/','_', $xmlsanandres->Avance[$key]->Desc_Municipio["V"]);
			$mn=preg_replace('/[._]+/','_', $mn);
			$mn=preg_replace('/[(]+/','', $mn);
			$mn=preg_replace('/[)]+/','', $mn);
/*				$mn=str_replace(' ','_',$xmlsanandres->Avance[$key]->Desc_Municipio["V"]);
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

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]."  Id Candidato <br>";
				$act = $xmlNew->createElement('id', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Candidato["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]."  Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Votos["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]."  % <br>";
				$act = $xmlNew->createElement('porcentaje', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Porc["V"]);
				$act = $candidato->appendChild($act);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]." Id Partido<br>";
				$id = $xmlNew->createElement('id_partido', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Candidato->lin[$j]->Partido["V"]);
				$id = $candidato->appendChild($id);

			}
			echo"---------------partidos----------------<br>";
				/*creacion estructura para los partidos*/
			for($i=0;$i<$prt;$i++)
			{
				echo"-------------------------------<br>";
				$partido = $xmlNew->createElement('partido');
				$partido = $municipio->appendChild($partido);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]." Id <br>";
				$id = $xmlNew->createElement('id', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Partido["V"]);
				$id = $partido->appendChild($id);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]." Votos <br>";
				$act = $xmlNew->createElement('actual', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Votos["V"]);
				$act = $partido->appendChild($act);

				echo $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]." % <br>";
				$porc = $xmlNew->createElement('porcentaje', $xmlsanandres->Avance[$key]->Detalle_Circunscripcion->lin->Detalle_Partido->lin[$i]->Porc["V"]);
				$porc = $partido->appendChild($porc);
			}
		
		}
		if (++$a==1) break;
	}
	$key++;
$a=0;
echo "<hr>";

}

/*-------------------------------------------------------------- *Creacion del xml*  ---------------------------------------------------------------------------------------*/

$xmlNew->formatOutput = true; 
$strings_xml = $xmlNew->saveXML(); 
$xmlNew->save('nuevo/new.xml'); 
echo 'Se Parseado el XML<br>'; 
/*Generando JSON*/
	$xml=simplexml_load_file("nuevo/new.xml") or die("Error: Cannot create object");
	$fileJson = fopen("json.json", 'w') or die("Error al abrir fichero de salida");
	fwrite($fileJson, json_encode($xml, JSON_UNESCAPED_UNICODE));
	fclose($fileJson);

/*Generando JSONDatos*/
	$xml=simplexml_load_file("nuevo/datos.xml") or die("Error: Cannot create object");
	$fileJson = fopen("jsonDatos.json", 'w') or die("Error al abrir fichero de salida");
	fwrite($fileJson, json_encode($xml, JSON_UNESCAPED_UNICODE));
	fclose($fileJson);
?>