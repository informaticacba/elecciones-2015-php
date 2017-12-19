<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
		<td>Ver vandidatos de la gobernación de</td>
		<td>
			<select id="cmb_departamento" onchange="cargarHTMLDepartamento()">
				<option value="">Seleccione</option>
				<option value="ATLANTICO">Atlántico</option>
				<option value="BOLIVAR">Bolivar</option>
				<option value="CESAR">Cesar</option>
				<option value="CORDOBA">Córdoba</option>
				<option value="LA_GUAJIRA">La Guajira</option>
				<option value="MAGDALENA">Magdalena</option>
				<option value="SAN_ANDRES">San Andres y Providencia</option>
				<option value="SUCRE">Sucre</option>

			</select>
		</td>
		<td>Tipo de información</td>
		<td>
			<select id="cmb_corporacion" onchange="cargarHTMLDepartamento()">
				<option value="">Seleccione</option>
				<option value="candidato">Candidatos</option>
				<option value="partido">Partidos</option>
				

			</select>
		</td>
	</tr>
</table>

<div class="gobernacion">
	<table border="1" class="table_grafica">
		<tr class="tr_barras">
		</tr>

		<tr class="tr_num_votos">
		</tr>
	</table>    
</div>
<script>
	var resAjax;
	var arrColumnas=Array();
	var numVecesEjecucion=0;
	var cmb_departamento;
	var dataClaves;
	function consultarClaves(){
		$.ajax({
			url:"functions.php",
			success:function(res){
				//debugger;
				//alert("termino success");
				dataClaves=$.parseJSON(res);
				//console.log(res);
			},
			complete:function(){
				//alert("termino complete");
			}
		});
	}
	function cargarHTMLDepartamento(){
		numVecesEjecucion=0;
		$(".tr_barras").html("");
		$(".tr_num_votos").html("");

		var html;
		cmb_departamento=$("#cmb_departamento").val();
		cmb_corporacion=$("#cmb_corporacion").val();
		$.ajax({
			url:"leerXML.php",
			success:function(res){
				res=$.parseJSON(res);
				resAjax=res;
				console.log(res);
				for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length); i++) {
					html='\
					<td>\
						<div class="barra barra_partido_'+resAjax[cmb_departamento][cmb_corporacion][i].id+'" style="height:0%">\
							<span>0%</span>\
						</div>\
					</td>';

					$(".tr_barras").append(html);

					html='\
					<td>\
						<span class="item_partido_'+resAjax[cmb_departamento][cmb_corporacion][i].id+'">0</span>\
					</td>';
					$(".tr_num_votos").append(html);

				}
			},
			complete:function(){
				consultarXml();
			}
		});
	}

	function consultarXml(){
		cmb_departamento=$("#cmb_departamento").val();
		$.ajax({
			url:"leerXML.php",
			success:function(res){
				//console.log(res);
				res=$.parseJSON(res);
				resAjax=res;
				//console.log(res);
				for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length) ; i++) {
					console.log("i vale: "+i);
					arrColumnas[resAjax[cmb_departamento][cmb_corporacion][i].id]={
						//"anterior" : resAjax[cmb_departamento][i].anterior[0],
						"actual"   : resAjax[cmb_departamento][cmb_corporacion][i].actual[0],
						"porcentaje" : resAjax[cmb_departamento][cmb_corporacion][i].porcentaje[0]
					}
					
				}

				//$(".item_partido_10").attr("data-anterior", res.anterior[0]);
				//$(".item_partido_10").attr("data-actual", res.actual[0]);
				
				//$(".item_partido_10").html(res.anterior[0]);

				//console.log("if "+(parseInt($(".item_partido_10").html())) +" != "+res.actual[0]);
				//debugger;
				
				for (var i = 0; i < (Object.keys(resAjax[cmb_departamento][cmb_corporacion]).length) ; i++) {
					if ((parseInt($(".item_partido_"+resAjax[cmb_departamento][cmb_corporacion][i].id).html()))!=parseInt(resAjax[cmb_departamento][cmb_corporacion][i].actual[0])) {
						contar(resAjax[cmb_departamento][cmb_corporacion][i].id);
					}	
					
				}
				numVecesEjecucion++;
			}
		});
	}
	setInterval(function(){
		//consultarXml();
	}, 1000);

	function count($this, partidoID){
		var current = parseInt($this.html(), 10);
		current = current + 1; /* Where 1 is increment */
		//cambiarAltoBarra(current, partidoID);

		$this.html(++current);
		if(current > $this.data('count')){
			$this.html($this.data('count'));
		} else {
			setTimeout(function(){count($this, partidoID)}, 50);
		}
	}

	

	function contar(partidoID){
			
			if (numVecesEjecucion==0) {
				jQuery(".gobernacion .item_partido_"+partidoID).html(parseInt(arrColumnas[partidoID].actual));

				cambiarAltoBarra("", partidoID);
				console.log("numVecesEjecucion");
			} else{
				jQuery(".gobernacion .item_partido_"+partidoID).each(function() {
					console.log($(this).data("actual"));
					jQuery(this).data('count', parseInt(arrColumnas[partidoID].actual, 10));
					cambiarAltoBarra("", partidoID);
					count(jQuery(this), partidoID);
				});
			}
		

		/*
		jQuery(".gobernacion .item_partido_11").each(function() {
			console.log($(this).data("actual"));
			jQuery(this).data('count', parseInt(arrColumnas[11].actual, 10));
			count(jQuery(this));
		});*/
	}

	function cambiarAltoBarra(current, partidoID){
		//valor=((current*100)/3840);
		valor=arrColumnas[partidoID].porcentaje;
		valorTemp=valor.replace(",", ".");
		valor=valorTemp;
		console.log("Entro "+valor);
		//debugger;
		//valorSD=valor.split(".");
		//valor=valorSD[0];

		$(".barra_partido_"+partidoID).css("height", valor+"%");

		//$(".barra_partido_"+partidoID).css("height", valor+"%");
		$(".barra_partido_"+partidoID+" span").html(valor+"%");
	}
</script>