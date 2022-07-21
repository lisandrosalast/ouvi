<div class="a100">

<?php
include("conectar.php");

$fechainicio = date('Y-m-d',strtotime(str_replace("/","-",$_POST['fechainicio'])));
if($_POST['fechainicio'] == ''){$fechainicio = date('Y-m-d');}
$horainicio = $_POST['horainicio'];
if($_POST['horainicio'] == ''){
if($fechainicio == date('Y-m-d')){$horainicio = date('H:i');}
else{$horainicio = "00:00";}}
$inicio = $fechainicio." ".$horainicio;
$persona = $_POST['persona'];
$solicitud = $_POST['solicitud'];
$respuesta = $_POST['respuesta'];
if($_POST['registro']!=''){$registro = $_POST['registro'];}

if(isset($_POST['guardar'])){
if($registro != ''){
mysqli_query($con, "UPDATE llamadas SET inicio=\"$inicio\", persona=\"$persona\", solicitud=\"$solicitud\", respuesta=\"$respuesta\" WHERE registro=\"$registro\"");}
else{
// Acomodo
mysqli_query($con, "CREATE TABLE IF NOT EXISTS llamadas (registro INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY , inicio VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , persona VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , solicitud VARCHAR(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , respuesta VARCHAR(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");
// Fin
mysqli_query($con, "INSERT INTO llamadas (inicio,persona,solicitud,respuesta) VALUES ('$inicio','$persona','$solicitud','$respuesta')");}
echo '<p>Se ha guardado exitosamente '.$persona.'</p>';
}

elseif(isset($_POST['borrar'])){
mysqli_query($con, "DELETE FROM llamadas WHERE registro=\"$registro\"");
echo '<p>La llamada se ha eliminado por completo de la base de datos</p>';
}

elseif(isset($_POST['copiar'])){
mysqli_query($con, "INSERT INTO llamadas (inicio,persona,solicitud,respuesta) VALUES ('$inicio','$persona','$solicitud','$respuesta')");
echo '<p>'.$persona.' se ha copiado nuevamente</p>';
}

else{
$registro = $_GET['id'];
$buscar = mysqli_query($con, "SELECT * FROM llamadas WHERE registro=\"$registro\"");
$result = mysqli_fetch_array($buscar);
echo '<div class="a100">';
echo '<form method="POST" action="./llamada" autocomplete="off">';
echo '<div class="a100"><b>Persona</b><br/>';
echo '<input type="text" id="text" name="persona" value="'.$result['persona'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a50"><b>Inicio</b><br/>';
echo '<input type="text" id="text" name="fechainicio" value="';
if($result['inicio'] != ''){echo date("d/m/Y",strtotime($result['inicio']));}
echo '" placeholder="dd/mm/aaaa" style="text-align:center;width:45%"> ';
echo '<input type="text" id="text" name="horainicio" value="';
if($result['inicio'] != ''){echo date("H:i",strtotime($result['inicio']));}
echo '" placeholder="hh:mm" style="text-align:center;width:45%"></div>';
echo '<div class="a100"><b>Solicitud</b><br/>';
echo '<textarea type="text" id="text" rows="5" name="solicitud" value="" maxlength="10000" style="width:95%">'.$result['solicitud'].'</textarea></div>';
echo '<div class="a100"><b>Respuesta</b><br/>';
echo '<textarea type="text" id="text" rows="5" name="respuesta" value="" maxlength="10000" style="width:95%">'.$result['respuesta'].'</textarea></div>';
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

echo '<a href="./llamadas"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Todas las Llamadas</h2></div></a>';
echo '<a href="./llamada"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#cccccc;color:#000000"><h2>Nueva Llamada</h2></div></a>';
?>

</div>