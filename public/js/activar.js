function objetoAjax(){
var xmlhttp = false;
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false; }
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
function enviarDatos(i,d,r){
disponible = document.getElementById(d).value;
id = document.getElementById(r).value;
imagen = document.getElementById(i);
imagen.src="./imagen/spinner-gris.png";
ajax = objetoAjax();
ajax.open("POST", "./modulo/servicios-activar.php", true);
// event.preventDefault();
ajax.onreadystatechange = function() {
if (ajax.readyState == 4){
resultado = (ajax.responseText);
if (resultado!=''){
if(resultado==1){imagen.src="./imagen/corazon-lleno.png";document.getElementById(d).value=1;}
else if (resultado==0){imagen.src="./imagen/corazon-vacio.png";document.getElementById(d).value=0;}
}
}
}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("&id="+id+"&disponible="+disponible);
}