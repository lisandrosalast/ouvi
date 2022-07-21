<div class="a100">

<?php
include("conectar.php");

$fechainicio = date('Y-m-d',strtotime(str_replace("/","-",$_POST['fechainicio'])));
if($_POST['fechainicio'] == ''){$fechainicio = date('Y-m-d');}
$horainicio = $_POST['horainicio'];
if($_POST['horainicio'] == ''){
if($fechainicio == date('Y-m-d')){$horainicio = date('H:i');}
else{$horainicio = "00:00";}}
$fechafin = date('Y-m-d',strtotime(str_replace("/","-",$_POST['fechafin'])));
if($_POST['fechafin']==''){$fechafin=$fechainicio;}
$horafin = $_POST['horafin'];
if($_POST['horafin']==''){
if($_POST['horainicio']==''){$horafin = "23:59";}
else{$horafin = $horainicio;}}
$inicio = $fechainicio." ".$horainicio;
$fin = $fechafin." ".$horafin;
$actividad = $_POST['actividad'];
$observaciones = $_POST['observaciones'];
if($_POST['registro']!=''){$registro = $_POST['registro'];}

if(isset($_POST['guardar'])){
if($registro != ''){
mysqli_query($con, "UPDATE agenda SET inicio=\"$inicio\", fin=\"$fin\", actividad=\"$actividad\", observaciones=\"$observaciones\" WHERE registro=\"$registro\"");}
else{
// Acomodo
mysqli_query($con, "CREATE TABLE IF NOT EXISTS agenda (registro INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY , inicio VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , fin VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , actividad VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , observaciones VARCHAR(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");
// Fin
mysqli_query($con, "INSERT INTO agenda (inicio,fin,actividad,observaciones) VALUES ('$inicio','$fin','$actividad','$observaciones')");}
echo '<p>Se ha guardado exitosamente '.$actividad.'</p>';
}

elseif(isset($_POST['borrar'])){
mysqli_query($con, "DELETE FROM agenda WHERE registro=\"$registro\"");
echo '<p>La actividad se ha eliminado por completo de la base de datos</p>';
}

elseif(isset($_POST['copiar'])){
mysqli_query($con, "INSERT INTO agenda (inicio,fin,actividad,observaciones) VALUES ('$inicio','$fin','$actividad','$observaciones')");
echo '<p>'.$actividad.' se ha copiado nuevamente</p>';
}

else{
$registro = $_GET['id'];
$buscar = mysqli_query($con, "SELECT * FROM agenda WHERE registro=\"$registro\"");
$result = mysqli_fetch_array($buscar);
echo '<div class="a100">';
echo '<form method="POST" action="./evento" autocomplete="off">';
echo '<div class="a100"><b>Actividad</b><br/>';
echo '<input type="text" id="text" name="actividad" value="'.$result['actividad'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a50"><b>Inicio</b><br/>';
echo '<input type="text" id="text" name="fechainicio" value="';
if($result['inicio'] != ''){echo date("d/m/Y",strtotime($result['inicio']));}
echo '" placeholder="dd/mm/aaaa" style="text-align:center;width:45%"> ';
echo '<input type="text" id="text" name="horainicio" value="';
if($result['inicio'] != ''){echo date("H:i",strtotime($result['inicio']));}
echo '" placeholder="hh:mm" style="text-align:center;width:45%"></div>';
echo '<div class="a50"><b>Fin</b><br/>';
echo '<input type="text" id="text" name="fechafin" value="';
if($result['fin'] != ''){echo date("d/m/Y",strtotime($result['fin']));}
echo '" placeholder="dd/mm/aaaa" style="text-align:center;width:45%"> ';
echo '<input type="text" id="text" name="horafin" value="';
if($result['fin'] != ''){echo date("H:i",strtotime($result['fin']));}
echo '" placeholder="hh:mm" style="text-align:center;width:45%"></div>';
echo '<div class="a100"><b>Observaciones</b><br/>';
echo '<textarea type="text" id="text" rows="5" name="observaciones" value="" maxlength="10000" style="width:95%">'.$result['observaciones'].'</textarea></div>';
echo '<center>';
echo '<input type="text" id="text" name="registro" value="'.$result['registro'].'" readonly="readonly" style="text-align:center;width:0%;display:none">';
echo '<div class="a100"><input type="submit" id="submit" name="guardar" value="Guardar"/>';
if($_GET['id']!=''){
echo ' <input type="submit" id="submit" name="copiar" value="Copiar"/>';
echo ' <input type="submit" id="submit" name="borrar" value="Borrar"/>';}
echo '</div>';
echo '</center>';
echo '</form>';
echo '</div>';
}

echo '<a href="./agenda"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Toda la Agenda</h2></div></a>';
echo '<a href="./evento"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Nueva Actividad</h2></div></a>';
?>

</div>