<?php
	
	$xml=simplexml_load_file("nuevo/datos.xml") or die("Error: Cannot create object");

	$arrDatos=array();
	foreach ($xml as $departamento => $value) {
		$arrDatos[$departamento]=$value;
	}
	echo json_encode($arrDatos);