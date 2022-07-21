<?php
include("conectar.php");
echo '<div class="a100"><a href="./llamada"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Nueva Llamada</h2></div></a><a href="./llamadas_search"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Buscar Llamada</h2></div></a></div>';
echo '<div class="a100"><center><h2>Todas las llamadas</h2></center>';
$buscar=mysqli_query($con, "SELECT * FROM llamadas ORDER BY inicio DESC");
while($result = mysqli_fetch_array($buscar)){
echo '<div class="a100" style="color:#000000;background-color:#eeeeee"';

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
}
echo '</div>';
?>