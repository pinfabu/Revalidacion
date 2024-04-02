//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Las funciones siguientes son utilizadas por javascript para mostrar el contador del reloj utizado en el registro de los empleados
//Estas funciones fueron obtenidas de internet
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Identidad del temporizador
var timerID = null;
//Flag para saber si el reloj esta activo
var timerRunning = false;

//Para el reloj       
function stopTimer(){
if(timerRunning){                
	clearTimeout(timerID);
	timerRunning = false;
	}
} 

// Para el reloj, si esta activo y lo arranca.    
function startTimer(){
	stopTimer();
	runClock();
	}

// Solo para evitar hacer varias llamadas
function runClock(){        
	var Hora=timeNow();
	var Dia=fechahoy();
	// Mostrar la hora en los elementos que se desee
	window.document.getElementById("reloj").innerHTML= Dia + " " + Hora;
	window.status=Dia + " " + Hora;
	//window.document.title=Dia + " " + Hora;	//Si no hay frames
	//top.document.title=Dia + " " + Hora;      //Por si hay frames
	timerID = setTimeout("runClock()",1000);	//setTimeout() se llama a si mismo.
	timerRunning = true;
	}

//Toma la hora y la formatea        
function timeNow(){
	now = new Date();
	hours = now.getHours();
	minutes = now.getMinutes();
	seconds = now.getSeconds();
	timeStr = ((hours < 10) ? "0" : "") + hours;
	timeStr += ((minutes < 10) ? ":0" : ":") + minutes;
	timeStr += ((seconds < 10) ? ":0" : ":") + seconds;
	return timeStr;
	}

function fechahoy(){
	var diasemana = new Array ('Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
	var nombremes = new Array ('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 
								'Octubre', 'Noviembre', 'Diciembre');
	var ahora;
	var fecha = new Date();
	var mes = fecha.getMonth();	
	var dia = fecha.getDay();
	var num = fecha.getDate();
	var ano=fecha.getFullYear();
	ahora = diasemana[dia] + ", " + num + " de " + nombremes[mes] + " de " + ano;
	return ahora;
}
