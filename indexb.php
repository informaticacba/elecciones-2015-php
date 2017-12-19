<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="gobernacion/style.css">
<link rel="stylesheet" type="text/css" href="css/resultados-colombia.css">
<link rel="stylesheet" type="text/css" href="css/estilos-resultados.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="arrayMunicp-Depart.js"></script>
<script>
	//Arr departamentos
	/*	var dataDepartamentos=Array();
		municipios=Array();
		municipios[0]={
			"nombre" : "BARRANQUILLA",
			"codigo" : "001",
			"codigoDepartamento" : "03",
			"nombreMayus" : "BARRANQUILLA"
		}
		dataDepartamentos[0]={
			"nombreMayus" : "ATLANTICO",
			"nombreMostrar" : "Atlantico",
			"codigo" : "03",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "CARTAGENA",
			"codigo" : "001",
			"codigoDepartamento" : "05",
			"nombreMayus" : "CARTAGENA"
		}
		dataDepartamentos[1]={
			"nombreMayus" : "BOLIVAR",
			"nombreMostrar" : "Bolivar",
			"codigo" : "05",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "VALLEDUPAR",
			"codigo" : "001",
			"codigoDepartamento" : "12",
			"nombreMayus" : "VALLEDUPAR"
		}
		dataDepartamentos[2]={
			"nombreMayus" : "CESAR",
			"nombreMostrar" : "Cesar",
			"codigo" : "12",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "MONTERIA",
			"codigo" : "001",
			"codigoDepartamento" : "13",
			"nombreMayus" : "MONTERIA"
		}
		dataDepartamentos[3]={
			"nombreMayus" : "CORDOBA",
			"nombreMostrar" : "Cordoba",
			"codigo" : "13",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "RIOHACHA",
			"codigo" : "001",
			"codigoDepartamento" : "48",
			"nombreMayus" : "RIOHACHA"
		}
		dataDepartamentos[4]={
			"nombreMayus" : "LA_GUAJIRA",
			"nombreMostrar" : "La guajira",
			"codigo" : "48",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "SANTA MARTA",
			"codigo" : "001",
			"codigoDepartamento" : "21",
			"nombreMayus" : "SANTA_MARTA"
		}
		dataDepartamentos[5]={
			"nombreMayus" : "MAGDALENA",
			"nombreMostrar" : "Magdalena",
			"codigo" : "21",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "SAN ANDRES",
			"codigo" : "001",
			"codigoDepartamento" : "56",
			"nombreMayus" : "SAN_ANDRES"
		}
		dataDepartamentos[6]={
			"nombreMayus" : "SAN_ANDRES",
			"nombreMostrar" : "San Andres",
			"codigo" : "56",
			"municipios" : municipios
		}
		municipios=Array();
		municipios[0]={
			"nombre" : "SINCELEJO",
			"codigo" : "001",
			"codigoDepartamento" : "28",
			"nombreMayus" : "SINCELEJO"
		}
		dataDepartamentos[7]={
			"nombreMayus" : "SUCRE",
			"nombreMostrar" : "Sucre",
			"codigo" : "28",
			"municipios" : municipios
		}*/
</script>
</head>

<body>
<div id="formulario" style="display:none;">
	<div class="text">
	<h1 align='center'>Por favor seleccione un Criterio </h1>
		<div class="celdas">
			<a href="gobernacion/upload.php"><input type="submit" value="Subir XML de Gobernaciones"></a>

			<a href="alcaldia/upload.php"><input type="submit" value="Subir XML de Alcaldias"></a>

			<a href="concejo/upload.php"><input type="submit" value="Subir XML de Concejo"></a>

			<a href="jal/upload.php"><input type="submit" value="Subir XML de JAL"></a>

			<a href="samblea/upload.php"><input type="submit" value="Subir XML de Asamblea"></a>
		</div>
	</div>
</div>

<div id="divGraficos">
	<div id="filtro"><!--Filtro-->
		<style>
			.barra{
			    width: 70px;
			    display: block;
			    text-align: center;
			    transition:0.5s;
			    background-color:#B00F0A;
			}
			.barra_partido_10{background-color: blue;}
			.barra_partido_11{background-color: red;}
			.barra_partido_12{background-color:orange;}
			.table_grafica .tr_barras td{
				height: 200px;
				vertical-align: bottom;
			}
			.table_grafica .tr_barras td div span{
				color:#fff;
			}
		</style>
		<table>
			<tr>
				<td>
					corporación
					<select id="cmbCorporacion">
						<option value="">Seleccione</option>
						<option value="alcaldia">Alcaldia</option>
						<option value="gobernacion">Gobernación</option>
						<option value="concejo">Concejo</option>
						<option value="asamblea">Asamblea</option>
					</select>
				</td>

				<td>
					departamento
					<select id="cmb_departamento" onchange="cargarCMBMunicipios();">
						<option value="">Seleccione</option>
						<script>
							for (var i = 0; i < dataDepartamentos.length; i++) {
								//document.write('<optgroup label="'+dataDepartamentos[i].nombreMostrar+'">');
								document.write('<option data-tipoFiltro="gobernacion" data-codigo="'+dataDepartamentos[i].codigo+'" value="'+dataDepartamentos[i].nombreMayus+'">'+dataDepartamentos[i].nombreMostrar+'</option>');
								
								/*if (dataDepartamentos[i]["municipios"]!='') {
									for (var j = 0; j < dataDepartamentos[i]["municipios"].length; j++) {
										value=dataDepartamentos[i]["municipios"][j]["nombre"];
										data_codigoDepartamento=dataDepartamentos[i]["municipios"][j]["codigoDepartamento"];
										data_codigo=dataDepartamentos[i]["municipios"][j]["codigo"];
										nombre=dataDepartamentos[i]["municipios"][j]["nombre"];

										document.write('<option data-tipoFiltro="alcaldia" value="'+value+'" data-codigoDepartamento="'+data_codigoDepartamento+'" data-codigo="'+data_codigo+'">Alcaldia de '+nombre+'</option>');
									}
								}*/
								//document.write("</optgroup>");
							}
						</script>
					</select>
				</td>
				
				<td id="divCmb_municipio">
					municipio
					<select id="cmb_municipio">
					</select>
				</td>
				<td><button onclick="consultar()">Consultar</button></td>
				<!--<td>Tipo de información</td>
				<td>
					<select id="cmb_corporacion" onchange="cargarHTMLDepartamento()">
						<option value="">Seleccione</option>
						<option value="candidato">Candidatos</option>
						<option value="partido">Partidos</option>
					</select>
				</td>-->
			</tr>
		</table>
		<div id="resultados" style="height: 170px;">
			<div id="winRes">
		    <div id="gobAtl" class="boxRes" style="display:block;">
	        <div class="subNav">
	            <!--<h3>Resultados de los candidatos a la <strong class="strongTitleGober">Gobernación de Atlántico</strong></h3>-->
	            <span class="cambiando filtroNombreMunicipio" style="padding:0;" rel="#alcBar"></span>
	        </div>
	        <div class="dataGen" style="overflow: hidden;">
	          <ul class="dataConteo divDatos" style="width: 987px;">
	            <li>
	              <span>Boletín</span>
	                <ul class="data">
	                  <li class="boletin"></li>
	                </ul>
	            </li>
	            <li>
	              <span>Hora de actualización</span>
	              <ul class="data">
	                <li class="hda"></li>
	                </ul>
	            </li>
	            <li>
	              <span>Mesas informadas de las instaladas</span>
	              <ul class="data">
	                <li class="mivi"></li>
	                </ul>
	            </li>
	            <li>
	              <span>Votos contados del potencial de sufragantes</span>
	              <ul class="data">
	                <li class="vrvpdv"></li>
	                </ul>
	            </li>
	            <li>
	              <span>Votos en blanco</span>
	                <ul class="data">
	                  <li class="veb"></li>
	                </ul>
	            </li>
	            <li style="border:none;">
	              <span>Votos nulos</span>
	                <ul class="data">
	                  <li class="va"></li>
	                </ul>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>
  	</div>
	</div>

	<div class="divCandidato" style="display:none;">
	</div>

	<hr>
	<div class="divPartido">
	</div>
</div>

<script>
	//var tipoFiltro="gobernacion";
	$("#cmbCorporacion").change(function(){
		if (this.value=="alcaldia") {
			$("#divCmb_municipio").show();
		} else if(this.value=="gobernacion"){
			$("#divCmb_municipio").hide();
		} else if(this.value=="concejo"){
			$("#divCmb_municipio").show();
		} else if(this.value=="asamblea"){
			$("#divCmb_municipio").hide();
		}
	});

	var tipoFiltro;
	var resAjax;
	var arrColumnas=Array();
	var numVecesEjecucion=0;
	var cmb_departamento;
	var dataClaves;
	var arrPartidos;
	var cmb_departamentoCodigo;

	function consultar(){
		//$(".divPartido").html("");
		/*var arg=$.parseJSON(arg);*/
		//tipoFiltro="concejo";
		//tipoFiltro="gobernacion";
		//tipoFiltro="alcaldia";
		$(".divPartido").html("");
		cmb_municipio=$("#cmb_municipio").val();// "ATLANTICO";
		cmb_municipioCodigo=$("#cmb_municipio option:selected").attr("data-codigo");
		tipoFiltro=$("#cmbCorporacion").val();
		cargarHTMLDepartamento();
		consultarXmlDatos();
	}

	function cargarCMBMunicipios(){
		cmb_departamento=$("#cmb_departamento").val();// "ATLANTICO";
		cmb_departamentoCodigo=$("#cmb_departamento option:selected").attr("data-codigo");
		//cmb_departamento=
		//document.write('<optgroup label="'+dataDepartamentos[i].nombreMostrar+'">');
		//document.write('<option data-tipoFiltro="gobernacion" data-codigo="'+dataDepartamentos[i].codigo+'" value="'+dataDepartamentos[i].nombreMayus+'">Gobernación del '+dataDepartamentos[i].nombreMostrar+'</option>');
		for (var i = 0; i < dataDepartamentos.length; i++) {
			if(dataDepartamentos[i]["codigo"]==cmb_departamentoCodigo){
				if (dataDepartamentos[i]["municipios"]!='') {
					html="";
					for (var j = 0; j < dataDepartamentos[i]["municipios"].length; j++) {
						value=dataDepartamentos[i]["municipios"][j]["nombre"];
						data_codigoDepartamento=dataDepartamentos[i]["municipios"][j]["codigoDepartamento"];
						data_codigo=dataDepartamentos[i]["municipios"][j]["codigo"];
						nombre=dataDepartamentos[i]["municipios"][j]["nombre"];

						html+='<option data-tipoFiltro="alcaldia" value="'+value+'" data-codigoDepartamento="'+data_codigoDepartamento+'" data-codigo="'+data_codigo+'">'+nombre+'</option>';
					}
					$("#filtro #cmb_municipio").html(html);
				}
			}
		}
	}

	function consultarClaves(){//No se esta utilizando
		cmb_corporacion="candidato";
		url="functions.php";
		$.ajax({
			url:url,
			data:{cmb_corporacion:cmb_corporacion},
			type:"GET",
			success:function(res){
				dataClaves=$.parseJSON(res);
			},
			complete:function(){
			},
			timeout: 5000
		});
	}


	function cargarHTMLDepartamento(){
		if (tipoFiltro=="alcaldia" || tipoFiltro=="gobernacion") {
			cmb_corporacion="candidato";
			html='<table border="0">\
				<thead>\
					<tr>\
						<td>Candidato</td>\
						<td>Partido</td>\
						<td colspan="2">Votos</td>\
					</tr>\
				</thead>\
				<tbody>\
				</tbody>\
			</table>';
			$(".divCandidato").html(html);
			$(".divCandidato").fadeIn();
			$(".divDatos").fadeIn();
		}
		if (tipoFiltro=="asamblea" || tipoFiltro=="concejo") {
			cmb_corporacion="partido";
		}
		//candidatoCodigo="001";
		/*
		tipoFiltro=arg["tipoFiltro"];
		cmb_departamento=arg["nombreMayus"];

		if (tipoFiltro=='gobernacion') {
			cmb_departamentoCodigo=arg.codigoDepartamento;
			cmb_departamento=arg.nombreMayus;
			indiceDepartamento=arg["indiceDepartamento"];
			nombreMunicipio=dataDepartamentos[indiceDepartamento]["municipios"][0].nombre;
			codigoMunicipio=dataDepartamentos[indiceDepartamento]["municipios"][0].codigo;
			nombreMayus=dataDepartamentos[indiceDepartamento]["municipios"][0].nombreMayus;

			var foo = {
				tipoFiltro: "alcaldia", 
				codigoMunicipio: codigoMunicipio,
				nombreMayus: nombreMayus,
				codigoDepartamento: cmb_departamentoCodigo
			}

			var arg = JSON.stringify(foo);
			console.log(arg);
			html="<a href='#' onclick=cargarHTMLDepartamento('"+arg+"')>"+nombreMunicipio+"</a>";
			$(".filtro .nombreMunicipio").html(html);
		}

		if (tipoFiltro=="alcaldia") {
			codigoMunicipio=arg.codigoMunicipio;
			codigoDepartamento=arg.codigoDepartamento;
		}

		$(".gobernacion").hide();
		$(".alcaldia").hide();
		$("."+tipoFiltro).fadeIn();
		numVecesEjecucion=0;
		$(".tr_barras").html("");
		$(".tr_num_votos").html("");
		$(".tr_label_nombre").html("");
		*/
		/*if (tipoFiltro!="concejo" || tipoFiltro!="asamblea" ) {
			ruta="http://especiales.elheraldo.co/home-elecciones-2015/"+tipoFiltro+"/json.json";
		} else{
		}*/
		ruta=tipoFiltro+"/json.json";
		alert(ruta);
		var html;
		$.ajax({
			async:false,
			dataType: "json",
			url:ruta,
			success:function(res){
				resAjax=res;
			}
		});

		if (cmb_corporacion=="candidato" && tipoFiltro=="alcaldia") {
			//alert("entro alcaldia");
			for (var i = 0; i < (Object.keys(resAjax[cmb_municipio][cmb_corporacion]).length); i++) {
				
				candidatoCodigo=resAjax[cmb_municipio][cmb_corporacion][i]["id"];
				candidatoCodigo=("00"+candidatoCodigo).slice(-3);
				//nombre=candidatoCodigo+" "+clavesCandidatosID[cmb_departamentoCodigo][cmb_municipioCodigo][candidatoCodigo].nombre;
				//nombre=clavesCandidatos[cmb_departamentoCodigo]["000"]["001"][idPartido][candidatoCodigo].nombre;
				idPartido=resAjax[cmb_municipio][cmb_corporacion][i]["id_partido"][0];
				nombre=clavesCandidatos[cmb_departamentoCodigo][cmb_municipioCodigo]["003"][idPartido][candidatoCodigo].nombre;
				apellido=clavesCandidatos[cmb_departamentoCodigo][cmb_municipioCodigo]["003"][idPartido][candidatoCodigo].apellido;
				nombrePartido=idPartido+" "+clavesPartidosID[idPartido]["nombre"];
				porcCandidato=resAjax[cmb_municipio][cmb_corporacion][i]["porcentaje"][0];
				porcCandidato=porcCandidato.replace(",", ".");
				cantVotos=resAjax[cmb_municipio][cmb_corporacion][i]["actual"][0];
				html='<tr>\
					<td class="trNombre">'+nombre+' '+apellido+'</td>\
					<td class="trPartido"><img width="200px" src="logosPartidos/'+idPartido+'.jpg" /></td>\
					<td class="trGrafica">\
						<div class="graficaBarra" style="width:'+porcCandidato+'%; height: 10px; background-color:blue; display: inline-block;">\
						</div>\
						<span class="porcentajeVotos">'+porcCandidato+'%</span>\
						<span class="cantidadVotos">'+cantVotos+'</span>\
					</td>\
				</tr>';
				$(".divCandidato table tbody").append(html);
			}
		}

		if (cmb_corporacion=="candidato" && tipoFiltro=="gobernacion") {
			//alert("entro gobernacion");
			for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length); i++) {
				candidatoCodigo=resAjax[cmb_departamento][cmb_corporacion][i]["id"];
				candidatoCodigo=("00"+candidatoCodigo).slice(-3);
				partidoID=resAjax[cmb_departamento][cmb_corporacion][i]["id_partido"];
				idPartido=resAjax[cmb_departamento][cmb_corporacion][i]["id_partido"][0];
				console.log("Buscando nombre del candidato, partido: "+candidatoCodigo+", partido:"+idPartido);
				object=clavesCandidatos[cmb_departamentoCodigo]["000"]["001"][idPartido][candidatoCodigo];
				if(typeof object === 'undefined') {
					nombre="";
					apellido="";
				} else{
					nombre=clavesCandidatos[cmb_departamentoCodigo]["000"]["001"][idPartido][candidatoCodigo].nombre;
					apellido=clavesCandidatos[cmb_departamentoCodigo]["000"]["001"][idPartido][candidatoCodigo].apellido;
				}
				//nombrePartido=idPartido+" "+clavesPartidosID[idPartido]["nombre"];
				porcCandidato=resAjax[cmb_departamento][cmb_corporacion][i]["porcentaje"][0];
				porcCandidato=porcCandidato.replace(",", ".");
				cantVotos=resAjax[cmb_departamento][cmb_corporacion][i]["actual"][0];

				html='<tr>\
					<td class="trNombre">'+candidatoCodigo+" / "+idPartido+" / "+nombre+' '+apellido+'</td>\
					<td class="trPartido"><img width="200px" src="logosPartidos/'+idPartido+'.jpg" /></td>\
					<td>\
						<span class="cantidadVotos">'+cantVotos+'</span>\
					</td>\
					<td class="trGrafica">\
						<div class="graficaBarra" style="width:'+porcCandidato+'%; height: 10px; background-color:blue; display: inline-block;">\
						</div>\
						<span class="porcentajeVotos">'+porcCandidato+'%</span>\
					</td>\
				</tr>';
				$(".divCandidato table tbody").append(html);
			}
		}

		if (tipoFiltro=="concejo") {
			//alert("entro concejo");
			arrPartidos=Array();
			j=-1;
			partidoVa="";
			for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_municipio]["candidato"]).length); i++) {
				//idPartido=resAjax[cmb_departamento][i]["id_partido"][0];
				arrDatoCandidato=resAjax[cmb_departamento][cmb_municipio]["candidato"][i];
				if (resAjax[cmb_departamento][cmb_municipio]["candidato"][i]["id_partido"]==null) {
				} else{

					partidoID=resAjax[cmb_departamento][cmb_municipio]["candidato"][i]["id_partido"];
					if (partidoID=="001") {
						console.log("Entro");
					}
					if (partidoVa!=partidoID) {
						j++;
						partidoVa=partidoID;
						arrPartidos[j]=Array();
						arrPartidos[j]["idPartido"]=partidoVa;
						//Informacion del partido
							for (var t = 0; t < (Object.keys(resAjax[cmb_departamento][cmb_municipio]["partido"]).length); t++) {
									if(partidoVa==(resAjax[cmb_departamento][cmb_municipio]["partido"][t]["id"])){
										infoPartido=resAjax[cmb_departamento][cmb_municipio]["partido"][t];
										arrPartidos[j]["infoPartido"]=infoPartido;
										break;
									}
							}

						if(Object.prototype.toString.call( arrPartidos[j]["datos"] ) === '[object Array]' ) {
						} else{
							arrPartidos[j]["datos"]=Array();
						}
						arrPartidos[j]["datos"].push(arrDatoCandidato);
					} else{
						arrPartidos[j]["datos"].push(arrDatoCandidato);
					}
				}
			}

			for (var i = 0; i < arrPartidos.length; i++) {
				idPartido=arrPartidos[i]["idPartido"];
				actual=arrPartidos[i]["infoPartido"]["actual"];
				porcentaje=arrPartidos[i]["infoPartido"]["porcentaje"];
				console.log("id_partido Vale: "+idPartido);
				if(typeof clavesPartidosID[idPartido]["nombre"] === 'undefined') {
					nombrePartido="";
				}
				else {
					nombrePartido=clavesPartidosID[idPartido]["nombre"];
				}

				html='<div>\
					<img src="logosPartidos/'+idPartido+'.jpg" width="100">\
					<div style="display:inline-block;">\
						<div>Partido '+nombrePartido+'</div>\
						<div>Votos: '+actual+'</div>\
						<div>\
							<div class="graficaBarra" style="width:'+porcentaje+'%; height: 10px; background-color:blue; display: inline-block;">\
							</div>\
							<span class="porcentajeVotos">'+porcentaje+'%</span>\
						</div>\
					</div>\
				</div>\
				<table border="0">\
					<thead>\
						<tr>\
							<td>Candidato</td>\
							<td>Votos</td>\
						</tr>\
					</thead>\
					<tbody>';

					for (var iCan = 0; iCan < (arrPartidos[i]["datos"]).length; iCan++) {//Recorriendo candidatos de los partidos
						porcentaje=arrPartidos[i]["datos"][iCan]["porcentaje"];
						cantVotos=arrPartidos[i]["datos"][iCan]["actual"];
						idCandidato=arrPartidos[i]["datos"][iCan].id;
						idCandidato=String(idCandidato);
						if (idCandidato!=0) {
							//nombreCandidato=clavesCandidatosID[cmb_departamentoCodigo][cmb_municipioCodigo][idCandidato]["nombre"];
							console.log("id_partido vale: "+idPartido);
							if(typeof clavesPartidosID[idPartido]["nombre"] === 'undefined') {
								nombrePartido="";
							} else {
								nombreCandidato=clavesCandidatosConcejo[cmb_departamentoCodigo][cmb_municipioCodigo][idPartido][idCandidato]["nombre"];
							}
							//console.log("ID CANDIDATO:"+idCandidato+" Nombre:" +nombreCandidato);
							
							//console.log(nombreCandidato);
							//debugger;
							nombre="";//clavesCandidatos["gobernacion"]["03"][idCandidatoString]["nombre"];
							//+" "+clavesCandidatos["gobernacion"]["03"][idCandidato]["apellido"];
							html+='<tr>\
								<td class="trNombre">'+nombreCandidato+'</td>\
								<td class="trGrafica">\
									<div class="graficaBarra" style="width:'+porcentaje+'%; height: 10px; background-color:blue; display: inline-block;">\
									</div>\
									<span class="porcentajeVotos">'+porcentaje+'%</span>\
									<span class="cantidadVotos">'+cantVotos+'</span>\
								</td>\
							</tr>';
						}
					}

					html+='</tbody>\
				</table>';
				$(".divPartido").append(html);
			}
		}

		if (tipoFiltro=="asamblea") {
			for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length); i++) {

				html="<tr>"+resAjax[cmb_departamento][cmb_corporacion]+"</tr>";
				$(".divCandidato table tbody").append(html);
			}
		}
		

		/*
			codDato=resAjax[cmb_departamento][cmb_corporacion][i].id;
			//Buscar nombre del candidato
			html='\
			<td>\
				<div class="barra barra_partido_'+resAjax[cmb_departamento][cmb_corporacion][i].id+'" style="height:0%">\
					<span>0%</span>\
				</div>\
			</td>';

			$(".tr_barras").append(html);

			html='\
			<td>\
				<span class="item_'+resAjax[cmb_departamento][cmb_corporacion][i].id+'">0</span>\
			</td>';

			$(".tr_num_votos").append(html);
			switch(cmb_corporacion){
				case "candidato":
					if (tipoFiltro=="alcaldia") {
						longA=$(codDato).length;
						codDato=("00"+codDato).slice(-3);
						etiquetaDetalle=clavesCandidatosID[codigoDepartamento][codigoMunicipio][codDato]["nombre"]+" \
						"+clavesCandidatosID[codigoDepartamento][codigoMunicipio][codDato]["apellido"];
					}

					if (tipoFiltro=="gobernacion") {
						longA=$(codDato).length;
						codDato=("00"+codDato).slice(-3);
						etiquetaDetalle=clavesCandidatos["gobernacion"][cmb_departamentoCodigo][codDato]["nombre"]+"\
						"+clavesCandidatos["gobernacion"][cmb_departamentoCodigo][codDato]["apellido"];
					}


					html='<td>\
						<span class="item_nombre_'+resAjax[cmb_departamento][cmb_corporacion][i].id+'">'+etiquetaDetalle+'</span>\
					</td>';
				break;

				case "partido":
					longA=$(codDato).length;
					codDato=("00"+codDato).slice(-3);
					html='<td>\
						<span class="item_nombre_'+codDato+'">\
						<img width="150" src="logosPartidos/'+codDato+'.jpg" /></span>\
					</td>';
				break;
			}

			$(".tr_label_nombre").append(html);
		}
	},
	complete:function(){
		//consultarXml();
	}*/
//consultarXmlDatos();
	}

	var resAjaxDatos;
	function consultarXmlDatos(){
		resAjaxDatos=Array();
		/*if (tipoFiltro!="concejo" || tipoFiltro!="asamblea") {
			ruta="http://especiales.elheraldo.co/home-elecciones-2015/"+tipoFiltro+"/jsonDatos.json";
		} else{
		}*/

		ruta=tipoFiltro+"/jsonDatos.json";
		$.ajax({
			async:false,
			dataType: "json",
			url:ruta,
			data:{tipoFiltro:tipoFiltro},
			success:function(res){
				resAjaxDatos=res;
			}
		});

		switch(tipoFiltro){
			case "alcaldia":
				cmb_indicador=cmb_municipio;
			break;
			case "gobernacion":
				cmb_indicador=cmb_departamento;
			break;
			case "asamblea":
				cmb_indicador=cmb_departamento;
			break;
		}

		$(".divDatos .boletin").html(resAjaxDatos[cmb_indicador]["datos"]["boletin"]);
		$(".divDatos .hda").html(resAjaxDatos[cmb_indicador]["datos"]["hora"]);
		$(".divDatos .mivi").html(resAjaxDatos[cmb_indicador]["datos"]["mesas"]);
		$(".divDatos .vrvpdv").html(resAjaxDatos[cmb_indicador]["datos"]["votantes"]);
		$(".divDatos .veb").html(resAjaxDatos[cmb_indicador]["datos"]["voto_blanco"]);
		$(".divDatos .va").html(resAjaxDatos[cmb_indicador]["datos"]["votos_nulos"]);
	}

	function consultarXml(){
		/*if (tipoFiltro!="concejo" || tipoFiltro!="asamblea") {
			ruta="http://especiales.elheraldo.co/home-elecciones-2015/"+tipoFiltro+"/json.json";
		} else{
		}*/
		ruta=tipoFiltro+"/json.json";
		$.ajax({
			dataType: "json",
			url:ruta,
			success:function(res){
				//res=$.parseJSON(res);
				resAjax=res;
				for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length) ; i++) {
					//console.log("i vale: "+i);
					arrColumnas[resAjax[cmb_departamento][cmb_corporacion][i].id]={
						"actual"   : resAjax[cmb_departamento][cmb_corporacion][i].actual[0],
						"porcentaje" : resAjax[cmb_departamento][cmb_corporacion][i].porcentaje[0]
					}
					
				}

				for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length) ; i++) {
					if ((parseInt($(".item_"+resAjax[cmb_departamento][cmb_corporacion][i].id).html()))!=parseInt(resAjax[cmb_departamento][cmb_corporacion][i].actual[0])) {
						contar(resAjax[cmb_departamento][cmb_corporacion][i].id);
					}	
				}
				numVecesEjecucion++;
			}
		});
	}
	setInterval(function(){
		/*consultarXml();
		consultarXmlDatos();*/
	}, 1000);

	function count($this, partidoID){
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 1 is increment */
		$this.html(++current);
		if(current > $this.data('count')){
			$this.html($this.data('count'));
		} else {
			setTimeout(function(){count($this, partidoID)}, 50);
		}
	}

	

	function contar(partidoID){
			if (numVecesEjecucion==0) {
				jQuery("."+tipoFiltro+" .item_"+partidoID).html(parseInt(arrColumnas[partidoID].actual));

				cambiarAltoBarra("", partidoID);
				//console.log("numVecesEjecucion");
			} else{
				jQuery("."+tipoFiltro+" .item_"+partidoID).each(function() {
					//console.log($(this).data("actual"));
					jQuery(this).data('count', parseInt(arrColumnas[partidoID].actual, 10));
					cambiarAltoBarra("", partidoID);
					count(jQuery(this), partidoID);
				});
			}
	}

	function cambiarAltoBarra(current, partidoID){
		valor=arrColumnas[partidoID].porcentaje;
		valorTemp=valor.replace(",", ".");
		valor=valorTemp;
		$(".barra_partido_"+partidoID).css("height", valor+"%");
		$(".barra_partido_"+partidoID+" span").html(valor+"%");
	}
</script>
<?php
	include("cargarClaves.php");
?>

</body>
</html>