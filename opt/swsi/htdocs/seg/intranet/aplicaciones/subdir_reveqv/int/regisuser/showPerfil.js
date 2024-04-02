function showPerfil(str)
{
if (str=="")
  {
   document.getElementById("txtHint").innerHTML="";
   return;

   }
if (window.XMLHttpRequest)
  {// Code for IE/+, firefox, chrome, opera, safari
    xmlhttp=new XMLHttpRequest();
    }
   else
    {//code for IE&, IE5  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   } 
   xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
       document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      }
     }
xmlhttp.open("GET","getperfil.php?q="+str,true);
xmlhttp.send();
}