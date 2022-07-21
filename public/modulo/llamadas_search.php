<?php
include("conectar.php");echo '<div class="a100"><a href="./llamadas"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Todas las Llamadas</h2></div></a><a href="./llamada"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Nueva Llamada</h2></div></a></div>';
echo '<div class="a100"><center><h2>¿Qué buscas?</h2>';

echo '<form method="POST" action="./llamadas_search"><input type="text" id="text" name="buscar" style="text-align:center;width:95%"><br/>';
echo '<input type="submit" id="submit" value="Buscar"></form><style>#text{margin-bottom:10px;}</style></center></div>';
    

//cadena de conexion
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe

$busqueda=$_POST['buscar'];if($busqueda==''){$busqueda=$_GET['buscar'];}

if ($busqueda != ''){
echo '<div class="a100"><center><h2>Todas las llamadas de '.$busqueda.'</h2></center>';
 
  $buscar=mysqli_query($con, "SELECT * FROM llamadas WHERE persona LIKE '%$busqueda%' ORDER BY inicio DESC");
  while($result=mysqli_fetch_array($buscar))
  {
    //Mostramos los titulos de los articulos o lo que deseemos...
    

echo '<a href="./?i=llamada&id='.$result['registro'].'"><div class="a100" style="color:#000000;background-color:#eeeeee"';

echo '><p style="margin:10px 10px">';
if($result['persona'] != ''){echo '<a href="./?i=llamadas_search&buscar='.$result['persona'].'"><h2>'.$result['persona'].'</h2></a>';}
else{echo '<h2>Sin nombre</h2>';}
$dia = date("l", strtotime($result['inicio']));
if($dia == 'Monday'){$dia = "Lun";}
if($dia == 'Tuesday'){$dia = "Mar";}
if($dia == 'Wednesday'){$dia = "Mié";}
if($dia == 'Thursday'){$dia = "Jue";}
if($dia == 'Friday'){$dia = "Vie";}
if($dia == 'Saturday'){$dia = "Sáb";}
if($dia == 'Sunday'){$dia = "Dom";}
echo '<br/>'.$dia.' '.date("d/m/Y H:i", strtotime($result['inicio']));

if($result['solicitud'] != ''){echo '<br/><br>Solicitud:<br/>'.$result['solicitud'];}
if($result['respuesta'] != ''){echo '<br/><br>Respuesta:<br/>'.$result['respuesta'];}echo '<br><br><a href="./?i=llamada&id='.$result['registro'].'">[Editar]</a>';
echo '</p></div>';
echo '</a>';   

}
echo '</div>';
    
}

?>