//funciones, valida y habilita

function validacion(formulario) {

	
        var er_password = /^([a-z]|[A-Z]|[0-9\+\-])/                  //password que acepta alfanumericos, + o -
		var er_email = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)|.+$/
        var er_password1 = /^([a-z]|[A-Z]|[0-9\+\-])/ 
	    var er_nombre = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/			//letras, '.' y '-' o vacio                              
        //var elemento = document.getElementById("grupo");
        

	
	
   	
	//comprueba 50 caracteres maximo
	for(x = 1; x < 5; x++) {
		if (formulario.elements[x].value.length > 50) {
			alert('La lontitud máxima permitida para cualquier campo es de 10 caracteres.')
			return false
		}
	} 	
	
      
  
         //comprueba campo de nombre
	if(!er_nombre.test(formulario.nombre.value)) { 
		alert('Contenido del campo NOMBRE no válido.')
		return false
	}  
	
     if(!er_email.test(formulario.email.value) && FormValidacion.email.value != "") { 
		alert('Contenido del campo NOMBRE no válido.')
		return false
	}  	

         //comprueba el password si es valido
      if(!er_password.test(formulario.password.value) && FormValidacion.password.disabled==false && FormValidacion.password.value !="" ){
           alert('Contenido de password no válido caracteres permitidos(A-Z,a-z,0-9,+,-).')
           return false
        }
          //checa que la longitud del password sea mayor a 8 caracteres
         if(FormValidacion.password.value.length < 8 && FormValidacion.password.disabled==false && FormValidacion.password.value !=""){
			 alert('el password debe ser mayor a 8 caracteres.')
			 return false
		 }
		 
          //comprueba que se hayan escrito los dos campos del password
        if (FormValidacion.password.value != FormValidacion.password1.value){
         alert("La contraseña confirmada no concuerda con la contraseña escrita");
         FormValidacion.password1.focus();
         return false
         }
		 //verifica que se seleccione una opcion de perfil
	   	/* if (document.FormValidacion.idperfil.selectedIndex==0 && document.FormValidacion.perfil.disabled== false ){ 
       alert("Debe seleccionar un perfil de usuario.") 
       document.FormValidacion.focus() 
       return false
       } */
       //verifica que se seleccione al menos un grupo
     if(!document.getElementById('grupo1').checked && !document.getElementById('grupo2').checked &&  !document.getElementById('grupo3').checked  && !document.getElementById('grupo4').checked && !document.getElementById('grupo5').checked) {  
	    alert('Debe seleccionar al menos un grupo')
		return false
	 } 
     
	return true		//cambiar por return true para ejecutar la accion del formulario
}
	
function habilitarCondicion(){
if (document.FormValidacion.nombre_checkbox.checked == true){
	document.FormValidacion.nombre_checkbox.value = "true";
	document.FormValidacion.password.disabled = false;
	document.FormValidacion.password1.disabled = false;
	document.FormValidacion.grupo1.disabled = false;
	document.FormValidacion.grupo2.disabled = false;
	document.FormValidacion.grupo3.disabled = false;
	document.FormValidacion.grupo4.disabled = false;
	document.FormValidacion.grupo5.disabled = false;
	document.FormValidacion.idperfil.disabled = false;
	document.FormValidacion.idperfil.disabled = false;
	document.FormValidacion.validar[0].disabled = false;
	document.FormValidacion.validar[1].disabled = false;
		if (document.FormValidacion.idperfil.value != 1){
			document.FormValidacion.grupo5.disabled = true;
	}
	else{
	    document.FormValidacion.grupo5.disables = false;
	}	
	

	  	 }
	else {
		document.FormValidacion.nombre_checkbox.value = "false";
	    document.FormValidacion.password.disabled = true;
	    document.FormValidacion.password1.disabled = true;
		document.FormValidacion.grupo1.disabled = true;
	    document.FormValidacion.grupo2.disabled = true;
		document.FormValidacion.grupo3.disabled = true;
		document.FormValidacion.grupo4.disabled = true;
		document.FormValidacion.grupo5.disabled = true;
		document.FormValidacion.idperfil.disabled = true;
		document.FormValidacion.validar[0].disabled = true;
		document.FormValidacion.validar[1].disabled = true;

	}
}

