
function showSistema(str)
{
if (str=="")
  {
   document.getElementById("txtHint").innerHTML="";
   return;

   }
if (window.XMLHttpRequest)
  {// codigo que crea el objeto xmlhttp para los navegadores IE/+, firefox, chrome
    xmlhttp=new XMLHttpRequest();
    }
   else
    {//para navegadores IE5 y IE6  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   } 
   xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {//manda los resultados en modo texto
       document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      }
     }
xmlhttp.open("GET","getsistema.php?q="+str,true); //con el php se consulta y manda el resultado
xmlhttp.send();
}