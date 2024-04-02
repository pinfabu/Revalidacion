function validacion(formulario) {

	    var er_nombre = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/		//letras, '.' y '-' o vacio
		var er_email = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/
	    var er_telefono = /^([0-9\s\+\-])+$/						//numeros, espacios, + o -
        var er_password = /^([a-z]|[A-Z]|[0-9\+\-])/                  //password que acepta alfanumericos, + o -
        var er_password2 = /^([a-z]|[A-Z]|[0-9\+\-])/ 
	    var er_appat = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
        var er_apmat = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
        var er_txtUsername = /^([a-z]|[A-Z])/                                 //login solo letras
        
        

	
   	
	//comprueba 50 caracteres maximo
		
	for(x = 1; x < 5; x++) {
		if (formulario.elements[x].value.length > 50) {
			alert('La longitud máxima permitida para cualquier campo es de 50 caracteres.')
			return false
		}
	}   	
      	
      
	//comprueba campo de nombre
	if(!er_nombre.test(formulario.nombre.value)) { 
		alert('Contenido del campo Nombre no válido.')
		return false
	}   	

        //comprueba campo de apellido paterno
	if(!er_appat.test(formulario.ap_paterno.value)) { 
		alert('Contenido del campo Apellido Paterno no válido.')
		return false
	}   

         //comprueba campo de apellido materno
	 if(!er_apmat.test(formulario.ap_materno.value)) { 
		alert('Contenido del campo Apellido Materno no válido..')
		return false
	}  	
	 if(!er_email.test(formulario.email.value) && FormValidacion.email.value != "") { 
		alert('contenido del email no valido.')
		return false
	} 
       //verifica si se selecciono una subdireccion
	 	 if (document.FormValidacion.idsubdir.selectedIndex==""){ 
       alert("Debe seleccionar una subdireccion.") 
       document.FormValidacion.focus() 
       return false
       } 
         //comprueba que se seleccione un departamento
        	 if (document.getElementById('deptos').selectedIndex== 0){ 
       alert("Debe seleccionar un departamento.") 
       document.FormValidacion.focus() 
       return false
       } 

         //comprueba el campo de Login
        if(!er_txtUsername.test(formulario.txtUsername.value)){
           alert('Login no valido (ejemplo LUISS o noMeire86).')
           return false
        } 
		
		if(document.getElementById("txtUsernameFailed") == true){
		 alert('no puede registrar un usuario que ya existe')
		 return false
      }
         //comprueba el password si es valido
        if(!er_password.test(formulario.password.value)){
           alert('Contenido de password no válido, caracteres permitidos(A-Z,a-z,0-9,+,-).')
           return false
        }

         //checa que la longitud del password sea mayor a 8 caracteres
         if(FormValidacion.password.value.length < 8){
			 alert('el password debe ser mayor a 8 caracteres.')
			 return false
		 }
		
        //comprueba que se hayan escrito los dos campos del password
         if (FormValidacion.password.value != FormValidacion.password1.value){
         alert("Los passwords no coinciden");
         FormValidacion.password1.focus();
         return false
         }
		 
		  //verifica que se seleccione una opcion de perfil
	   	 if (document.FormValidacion.idperfil.selectedIndex==0){ 
       alert("Debe seleccionar un perfil de usuario.") 
       document.FormValidacion.focus() 
       return false
       } 
	   
       //verifica que se seleccione al menos un grupo
     if(!document.getElementById('grupo').checked && !document.getElementById('grupo2').checked &&  !document.getElementById('grupo3').checked  && !document.getElementById('grupo4').checked && !document.getElementById('grupo5').checked) {  
	    alert('Debe seleccionar al menos un grupo')
		return false
	 }


        //manda este mensaje de alerta si todo esta bien
	
	return true		//cambiar por return true para ejecutar la accion del formulario
}
function listaBox(){
if (document.FormValidacion.idperfil.value == 1){
           
           document.FormValidacion.grupo5.disabled = false;}
		    else {
				document.FormValidacion.grupo5.disabled = true;
	             document.FormValidacion.grupo5.checked = false;}	
}