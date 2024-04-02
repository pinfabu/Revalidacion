$(document).ready(function() {

	var numMat = 0
		,nextCell = 0
		,nowCell = 0
		,nalMin = 6
		,nalMax = 10
		,extMin = 0
		,extMax = 0
		,nalMinFlag = true
		,nalMaxFlag = true
		,extMinFlag = false
		,extMaxFlag = false
		,numMatFlag= false
		,tableFlag = false
		,promNal = 0
		,promExt = 0
		,timeout = 10000
		,dataSend = {}
		,action = ""
		,action = ""
		,opt=""
		,iniciales = ""
		,fc_recepcion = ""
		,aux_num = 0
		,error_rango = false
		;
		
	
	$("input:text").addClass("ui-corner-all ui-widget-content");
	$("select").addClass("ui-corner-all ui-widget-content");
	$("#btnGuardar" ).button({ icons: { primary: "ui-icon ui-icon-disk" } });
	$("#btnAceptar" ).button({ icons: { primary: "ui-icon ui-icon-disk" } });
	$("#btnFile").button({ icons: { primary: "ui-icon ui-icon-arrowthickstop-1-s" } });
	$("#btnClear").button({ icons: { primary: "ui-icon  ui-icon-trash" } });
	
	$('.folio').mask('AAA-9999-00');
	$('.num').mask('999.999');
	$('.numRng').mask('999.999');
	$('.numRng2').mask('9999.999');
	$('.xMat').mask('9999.999');
	$('.numMat').mask('999');
	$('.year').mask('9999');
	$('#frmData').bValidator();
	
function redondear(numero, digitos){
    let base = Math.pow(10, digitos);
    let entero = Math.round(numero * base);
    return entero / base;
}

	function clearForm(){
		
		numMat = 0;
		nextCell = 0;
		nowCell = 0;
		nalMin = 6;
		nalMax = 10;
		extMin = 0;
		extMax = 0;
		nalMinFlag = true;
		nalMaxFlag = true;
		extMinFlag = false;
		extMaxFlag = false;
		numMatFlag= false;
		tableFlag = false;
		promNal = 0;
		promExt = 0;
		action = "";		
		
		$(":text").each(function(){
			$(this).val("");
		});
		
		$("#nalMin").val(nalMin);
		$("#nalMax").val(nalMax);
		
		$("#lstCalif").empty();
		
	}
	
	function validDataForm(){
		
		var tramite = $("#tramite").val();
		var folio = $("#folio").val();
		var equivalencia = $("#equivalencia").val();
		var fecha1 = $("#fecha1").val();
		var fecha2 = $("#fecha2").val();

		//alert("qweqw");
		
		if(tramite==0){
			$("#modMessage_msg").html("Debe indicar el tipo de tramite");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if($("#escuela").val()==""){
			$("#modMessage_msg").html("Debe indicar el nombre de la escuela");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if($("#solicitante").val()==""){
			$("#modMessage_msg").html("Debe indicar el nombre del solicitante");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if($("#pais").val()==""){
			$("#modMessage_msg").html("Debe indicar el nombre del pais");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if($("#estudios").val()==""){
			$("#modMessage_msg").html("Debe indicar los estudios realizados");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if(tramite == "mov"){
			
			return true;
		}
		
		if(folio==""){
			$("#modMessage_msg").html("Debe indicar un folio");
			$("#modMessage").dialog("open");
			return false;
		}
		
		if(tramite == "eqv"){
			
			if((fecha1 == "")&&(fecha2 == "")){
			}
			else if((fecha1 != "")&&(fecha2 == "")){

			}
			else if((fecha1 == "")&&(fecha2 != "")){
				$("#modMessage_msg").html("Debe indicar la fecha inicial del periodo");
				$("#modMessage").dialog("open");
				return false;
			}
			
		}
		
		
			
		return true;
			
	}
	
	
	function getForm(){
		
		var lstCalif = new Array();
		var cont = 1;
		
		dataSend = new Array();

		$(":text").each(function(){
			if($(this).attr("xMat")=== undefined){
				dataSend.push({"name": $(this).attr("id"), "value": $(this).val()});
			}
		});
		
		dataSend.push({"name": "code_arch", "value": $("#code_arch").val() });
		dataSend.push({"name": "tramite", "value": $("#tramite").val() });
		dataSend.push({"name": "equivalencia", "value": $("#equivalencia").val() });
		
		for(id=1, cont=0; cont<numMat ;cont++, id++){
			lstCalif[cont] = { ext: $("#extMat"+id).val(), nal: $("#nalMat"+id).html() };
		}
		
		dataSend.push({"name": "lstCalif", "value": JSON.stringify(lstCalif) });
		dataSend.push({"name": "iniciales", "value": iniciales});
		dataSend.push({"name": "fc_recepcion", "value": fc_recepcion});
		
		//console.log(dataSend);
		
	}
	
	function validEscalas(){
		
		var xError = false;
		var regexp =  /^\d+\.?\d{0,3}$/;
		
		if(!checkRango()){
			
			$("#modMessage_msg").html("Debe indicar las escalas m&aacute;ximas y min&iacute;mas de las calificaciones");
			$("#modMessage").dialog("open");
			return false;
			
		}
		
		if(!numMatFlag){
			$("#modMessage_msg").html("Debe indicar el n&uacute;mero de materias");
			$("#modMessage").dialog("open");
			return false;
		}
					
		$.each($(".xMat"), function(){
			
			if(xError){ return false; }
			
			if(!regexp.test($(this).val())){
				$("#modMessage_msg").html("Debe indicar la calificaci&oacute;n "+$(this).attr("xMat"));
				$("#modMessage").dialog("open");
				xError = true;
			}
			
		});
		
		return true;
	}
	
	
	$("#modClear").dialog({
		open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog).hide(); }
		,autoOpen: false
		,position:'center'
		,resizable: true
		,height:200
		,width:400		
		,modal: true
		,buttons: {
			"Cancelar": function() {
				$( this ).dialog( "close" );
			}
			,"Aceptar": function() {
				clearForm();
				$( this ).dialog( "close" );
			}
		}
	});
	
	
	$("#modMessage").dialog({
		open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog).hide(); }
		,autoOpen: false
		,position:'center'
		,resizable: true
		,height:200
		,width:400		
		,modal: true
		,buttons: {
			"Aceptar": function() {
				$( this ).dialog( "close" );
				if(error_rango){
					$("#extMat"+aux_num).val("");
					$("#nalMat"+aux_num).html("");
					$("#extMat"+aux_num).focus();
					error_rango=false;
				}
			}
		}
	});
	
	$("#tramite").change(function(){
	
		var tram = $(this).val();
		$("#trFolio").show();
		$("#trEqv").hide();
		$("#trPer").hide();
		//$("#fecha1").val("");
		//$("#fecha1").val("");
		$("#ligas").hide();
		
		//clearForm();
		$(this).val(tram);
		switch(tram){
			case "eqv":
				$("#trEqv").show();
				$("#trPer").show();
				break;
				
			case "sec":
			case "bach":
			
				
				break;
				
			case "mov":
			
				$("#trFolio").hide();
				$("#ligas").show();
				
				break;
				
		}
		
		
		return false;
		
	});
	
	
	
	$("#btnAceptar").click(function(){
	
		if(!validDataForm()){return false;}
		
		if(!validEscalas()){return false;}
		
		calcularPromedio();
		
		return false;
		
	});
	
	$("#btnFile").click(function(){
		
		if(!validDataForm()){
            
			$("#modMessage_msg").html("Debes llenar todos los campos");
			$("#modMessage").dialog("open");
			return false;
		}
		
		getForm();
		opt = "getOficio";
		dataSend.push({"name": "opt", "value": "getOficio"});
		processData();
		
		return false;
		
	});
	
	$("#btnClear").click(function(){
		
		action = "clear";
		$("#modClear").dialog("open");
		return false;
		
	});
	
	function createTablas(){
		
		var tTable
			,cad
			,id
			,rows
			,flag
			,xRow=""
			,fT
			,nT
			;

		//Numero de renglones de la tabla final
		fT = numMat%10;
		nT;
		
		
		//Numero de tablas de 10 renglones
		if(fT==0) nT = numMat/10;
		else nT = (numMat-fT)/10+1;
				
		//Para el caso de que sea mas de una tabla de 10 elementos
		tTable ="<center><table border=\"0\">";
		tTable +="<tr>";
		for(i=0; i<nT ;i++){
			//if(i==3){
			if(i%5==0){
				tTable +="</tr>";
				tTable +="<tr>";
			}
	
			tTable +="<td>";
			tTable +="<table border='0' class='tabla_search'>";
			tTable +="<thead>";
			tTable +="<tr>";
			tTable +="<th>#</th>";
			tTable +="<th>Calif. Ext.</th>";
			tTable +="<th>Calif. Nac.</th>";
			tTable +="</tr>";
			tTable +="</thead>";
			for(r=0; r<10 ;r++){
				id=i*10+r+1;
				cad="extMat"+id;
				tTable +="<tr>";
				tTable +="<td>"+id+"</td>";
		
				if(((i+1)!=nT)||(((i+1)==nT)&&(fT==0))||(r<fT)){
					tTable += "<td>";
					tTable += "<input type='text' name='"+cad+"' id='"+cad+"' size='5' style='text-align:center' class='ui-corner-all ui-widget-content xMat' xMat='"+id+"'/>";
					tTable += "</td>";
				}
				else{
					tTable += "<td class='clsHeight'></td>";
				}
				
				cad = "nalMat"+id;
				tTable +="<td><center><label id='"+cad+"'  class='Estilo1' ></label></center></td>";
				tTable +="</tr>";
			}
			tTable +="</table>";
			tTable +="</td>";
		}
		tTable +="</tr>";
		tTable +="</table></center>";
		
		$("#lstCalif").html(tTable);
		
	}
	
	function checkRango(){
		
		if(!validRango()){
		
			$("#modMessage_msg").html("Primero debe indicar los rangos de las escalas");
			$("#modMessage").dialog("open");
			return false;
		}
		
		return true;
	}
	
	function validRango(){
		
		if(!(nalMinFlag && nalMaxFlag && extMinFlag && extMaxFlag)){
			return false;
		}
		
		return true;
	}
	
	function getNCar(txt){
		var len = txt.length;
		
		if(len<=4) return txt;
		
		var res="";
		
		for(i=0; i<4 ;i++){
			c=txt.charAt(i); 
			res += c;
		}
			
	
		return parseFloat(res);
	}
	
	
	function getCalif(calif){
		
		var eqv = ((nalMax-nalMin)/(extMax-extMin))*(parseFloat(calif) - extMax) + nalMax;

		//eqv = parseFloat(eqv).toFixed(2);
		eqv= new String(eqv);
		eqv = parseFloat(getNCar(eqv));	
		
		return eqv;
	}
	
	

	function calcularPromedio(){
		
		var xPromNal = 0
			,xPromExt = 0
			,xCalif = 0
			,xFlag = true
			,x_eqv
			;
			
		
		if(!validRango()){
			return false;
		}
		
		if($("#numMat").val()==""){
			return false;
		}
		
		$.each($(".xMat"), function(){
			
			if(!xFlag){ return false; }
			
			xCalif = $(this).val();
			
			if(xCalif!=""){
				
				//xPromExt += redondear(parseFloat(xCalif),1);
				xPromExt += parseFloat(xCalif);
				xCalif = parseFloat(getCalif(xCalif));
				//console.log("antes:" + xCalif);
				//
				//x_eqv= new String(xCalif);
				//xCalif = parseFloat(getNCar(x_eqv));
				//console.log(xCalif);
	
				//xPromNal += redondear(parseFloat(xCalif),1);
				xPromNal += parseFloat(xCalif);
				
				$("#nalMat"+$(this).attr("xMat")).html(xCalif);
			}
			else{
				xFlag = false;
			}
			
		});
		
		if(xFlag){
			xPromNal = parseFloat(parseFloat(xPromNal)/numMat).toFixed(1);
			//xPromExt = parseFloat(parseFloat(xPromExt)/numMat).toFixed(1);	
			xPromExt = parseFloat(parseFloat(xPromExt)/numMat);	
			
			if( xPromNal >= 6.9 && xPromNal < 7 ){
				xPromNal = 7;
			}else if( xPromNal >= 7.9 && xPromNal < 8 ){
				xPromNal = 8;
			}else if( xPromNal >= 8.9 && xPromNal < 9 ){
				xPromNal = 9;
			}else if( xPromNal >= 9.9 ){
				xPromNal = 10;
			}
		
			x_eqv= new String(xPromExt);
			xPromExt = parseFloat(getNCar(x_eqv));
		
			$("#promNal").val(xPromNal);
			$("#promExt").val(xPromExt);
			return true;
		}
		
		return false;
	}
	
	
	
	$("#folio").change(function(){

		var xFolio = $(this).val();
		//var regexp =  /^(\d|[A-Z])(\d|[A-Z])(\d|[A-Z])\-\d{4}\-\d{2}$/;
		//var regexp =  /^(\w\-){11}$/;
		

		//alert(xFolio);
		//if((xFolio=="")||(!regexp.test(xFolio))){
		if(xFolio==""){
			$("#modMessage_msg").html("El folio debe de tener el formato AAA-9999-99");
			$("#modMessage").dialog("open");
			$(this).val("");
			return false;
		}

		
		dataSend = {};
		opt = "getFolio";
		dataSend.opt = opt;
		dataSend.folio = xFolio;
		processData();		
	
	});
	
	
	$(".numRng").change(function(){
		
		var name = $(this).attr("id");
		var dato = $(this).val();
		var flag = true;
		
		if((dato == "")||(dato == ".")){
			dato = 0;
			flag = false;
		}
		
		
		switch(name){
			case "extMin":
				extMin = dato
				extMinFlag = flag;
				break;
			case "extMax":
				extMax = dato
				extMaxFlag = flag;
				break;
			case "nalMin":
				nalMin = dato
				nalMinFlag = flag;
				break;
			case "nalMax":
				nalMax = dato
				nalMaxFlag = flag;
				break;
		}
		
		if(!flag){
			$("#"+name).val("");
			$("#"+name).focus();
		}
		
		//if(!tableFlag){ return false; }
		
		calcularPromedio();
		
		//if($("#numMat").val()!=)
		
	});



	$(".numRng2").change(function(){
		
		var name = $(this).attr("id");
		var dato = $(this).val();
		var flag = true;
		
		if((dato == "")||(dato == ".")){
			dato = 0;
			flag = false;
		}
		
		
		switch(name){
			case "extMin":
				extMin = dato
				extMinFlag = flag;
				break;
			case "extMax":
				extMax = dato
				extMaxFlag = flag;
				break;
			case "nalMin":
				nalMin = dato
				nalMinFlag = flag;
				break;
			case "nalMax":
				nalMax = dato
				nalMaxFlag = flag;
				break;
		}
		
		if(!flag){
			$("#"+name).val("");
			$("#"+name).focus();
		}
		
		//if(!tableFlag){ return false; }
		
		calcularPromedio();
		
		//if($("#numMat").val()!=)
		
	});





	
	$("#numMat").change(function(){
		
		numMat = $(this).val();
		numMatFlag = false;
		
		if(!checkRango()){ return false; }
		
		createTablas(numMat);
		$("#promNal").val("");
		$("#promExt").val("");
		$("#extMat1").focus();
		numMatFlag = true;
	
	});
	
	
	$("#extMin").keypress(function(){
		
		if ( event.which == 13 ) {
			$("#extMax").focus();
			return true;
		}
		
	});
	
	$("#extMax").keypress(function(){
		
		if ( event.which == 13 ) {
			$("#numMat").focus();
			return true;
		}
		
	});
	
	
	
	$("#nalMin").keypress(function(){
		
		if ( event.which == 13 ) {
			$("#nalMax").focus();
			return true;
		}
		
	});
	
	$("#nalMax").keypress(function(){
		
		if ( event.which == 13 ) {
			$("#numMat").focus();
			return true;
		}
		
	});
	
	$("#numMat").keypress(function(){
		
		if ( event.which == 13 ) {
			$("#extMat1").focus();
			return true;
		}
		
	});
	
	
	$(document).on('keypress','.xMat',function(event){

		error_rango = false;
		
		if ( event.which != 13 ) {
			return true;
		}

		var calif = $(this).val();
		
		if((calif=="")||(calif==".")){ return false; }
		
		nowCell = $(this).attr("xmat");
		nextCell = parseInt(nowCell) + 1;
		
		if(parseFloat(extMin)<parseFloat(extMax)){
			
			if(parseFloat(calif)>parseFloat(extMax)){
				error_rango = true;
				aux_num = nowCell;
				$("#modMessage_msg").html("La calificaci&oacute;n no puede ser mayor a la calificaci&oacute;n m&aacute;xima");
				$("#modMessage").dialog("open");
				return false;
			}
			
		}
		else{
			
			if(parseFloat(calif)<parseFloat(extMax)){
				error_rango = true;
				aux_num = nowCell; 
				$("#modMessage_msg").html("La calificaci&oacute;n no puede ser menor a la calificaci&oacute;n m&aacute;xima");
				$("#modMessage").dialog("open");
				return false;
			}
			
			
		}
		
		
		$("#nalMat"+nowCell).html(getCalif(calif));
		
		if ( $( "#extMat"+nextCell ).length ) {
			$( "#extMat"+nextCell ).focus();
			//alert(nextCell);
		}
		
		calcularPromedio();
		
		return false;
	});
	
	
	$(document).on('change','.xMat',function(event){

		var calif = $(this).val();
		
		if((calif=="")||(calif==".")){ return false; }
		
		nowCell = $(this).attr("xmat");
		nextCell = parseInt(nowCell) + 1;
		
		$("#nalMat"+nowCell).html(getCalif(calif));
		
		if ( $( "#extMat"+nextCell ).length ) {
			$( "#extMat"+nextCell ).focus();
			//alert(nextCell);
		}
		
		calcularPromedio();
		
		return false;
	});
	
	
	
	
	
	function processData() {

        $.ajax({
            type: "POST",
            url: 'processData.php',
            data: dataSend,
            dataType: "json",
            timeout: timeout,
            beforeSend: function() {
                //dialog.show();
            },
            success: function(json) {

                if (json.error == "si") {
                    //dialog.alert(json.msg);
					console.log(json.debug);
                    return false;
                }

				switch(opt){
					case "getIni":
						
						$.each(json.data, function(id, x_eqv){
							$("#equivalencia").append("<option value="+x_eqv.value+">"+x_eqv.text+"</option>");
						});
						
						break;
						
					case "getFolio":
					
						if(json.cont==0){
							
							$("#modMessage_msg").html("No existe el folio <strong>"+$("#folio").val()+"</strong>, debe indicar un folio valido");
							$("#modMessage").dialog("open");
							$("#folio").val("");
							$("#folio").focus();
			
							return false;
						}
					
						$("#solicitante").val(json.data.nombre_completo);
						$("#code_arch").val(json.data.code_arch);
						
						iniciales = json.data.iniciales;
						fc_recepcion = json.data.Fec_Recibe_Docs;
						
						break;
					
					case "getOficio":
				
						window.open(json.oficio);
						window.open(json.equivalencia);
						
						break;
					
				}
				
				

                return false;

            },
            error: function(jqXHR, textStatus, errorThrown) {
                //dialog.close();
                msg = "";
                if (textStatus == "timeout") {
                    msg = "tiempo agotado";
                } else {
                    //msg = messageCommon.errorSend;
                    msg = "Error en la conexion";
                }
                console.log(msg);
                //dialog.alert(msg);//showMessage(msg);
                return false;
            }
        });
    }
	
	opt = "getIni";
	dataSend.opt = opt;
	processData();
	
	
 
});
