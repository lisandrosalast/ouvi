<?php
include("conectar.php");
echo '<div class="a100"><a href="./evento"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Nueva Actividad</h2></div></a></div>';
echo '<div class="a100"><center><h2>Toda la Agenda</h2></center>';
$buscar=mysqli_query($con, "SELECT * FROM agenda ORDER BY inicio ASC");
while($result = mysqli_fetch_array($buscar)){
echo '<a href="./?i=evento&id='.$result['registro'].'"><div class="a100" ';
//azul:55ddff; rojo:ffaabb; amarillo:ffdd33; verde:99ee33
if(strtotime($result['inicio']) < strtotime(date("Y-m-d H:i")) and strtotime($result['fin']) < strtotime(date("Y-m-d H:i"))){echo 'style="color:#000000;background-color:#ffaabb"';}
elseif((strtotime(date("Y-m-d",strtotime($result['inicio']))) == strtotime(date("Y-m-d"))) or (strtotime($result['inicio']) < strtotime(date("Y-m-d H:i")) and strtotime($result['fin']) > strtotime(date("Y-m-d H:i")))){echo 'style="color:#000000;background-color:#99ee33"';}
if(strtotime($result['inicio']) > strtotime('+7 days',strtotime(date("Y-m-d H:i")))){echo 'style="color:#000000;background-color:#55ddff"';}
else{echo 'style="color:#000000;background-color:#ffdd33"';}

echo '><p style="margin:10px 10px">';
if($result['actividad'] != ''){echo '<b>'.$result['actividad'].'</b>';}
else{echo '<b>Sin título</b>';}
$dia = date("l", strtotime($result['inicio']));
if($dia == 'Monday'){$dia = "Lun";}
if($dia == 'Tuesday'){$dia = "Mar";}
if($dia == 'Wednesday'){$dia = "Mié";}
if($dia == 'Thursday'){$dia = "Jue";}
if($dia == 'Friday'){$dia = "Vie";}
if($dia == 'Saturday'){$dia = "Sáb";}
if($dia == 'Sunday'){$dia = "Dom";}
echo '<br/>'.$dia.' '.date("d/m/Y H:i", strtotime($result['inicio']));
echo ' - ';
if(date("Y-m-d",strtotime($result['inicio'])) == date("Y-m-d",strtotime($result['fin']))){
echo date("H:i", strtotime($result['fin']));}
else{
$dia = date("l", strtotime($result['fin']));
if($dia == 'Monday'){$dia = "Lun";}
if($dia == 'Tuesday'){$dia = "Mar";}
if($dia == 'Wednesday'){$dia = "Mié";}
if($dia == 'Thursday'){$dia = "Jue";}
if($dia == 'Friday'){$dia = "Vie";}
if($dia == 'Saturday'){$dia = "Sáb";}
if($dia == 'Sunday'){$dia = "Dom";}
echo $dia.' '.date("d/m/Y H:i", strtotime($result['fin']));}
if($result['observaciones'] != ''){echo '<br/>-<br/>'.$result['observaciones'];}
echo '</p></div>';
echo '</a>';
}
echo '</div>';
?>