//funcion para autocompletar, tiene la finalidad de mostrar los resultados de usuarios dependiendo de un parámetro
function lookup(inputString) {
                if(inputString.length == 0) {
                        // si no recibe nada la caja se oculta.
                        $('#suggestions').hide();
                } else {
                        $.post("rpc.php", {queryString: ""+inputString+""}, function(data){
                                if(data.length >0) //se envia el dato al archivo rpc.php que me ayuda en el autocompletar
								{
                                        $('#suggestions').show();
                                        $('#autoSuggestionsList').html(data);
                                }
                        });
                }
        } 

        function fill(thisValue) {
                $('#inputString').val(thisValue);
                setTimeout("$('#suggestions').hide();", 200);
        }
