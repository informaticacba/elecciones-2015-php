<?php
	$xml=simplexml_load_file("nuevo/new.xml") or die("Error: Cannot create object");

	$arrCandidatosConsejo=$xml;
	echo json_encode($arrCandidatosConsejo);
?>