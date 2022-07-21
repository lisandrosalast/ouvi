<?php
$codigo = $_POST['codigo'];
echo "<div class='a25'></div><div class='a50'><h2>Recordar Correo</h2>";
if($codigo==''){
echo "<center><p><form method='POST' action='./recordar-correo'>";
echo "Ingrese ID<br/><input type='text' id='text' name='codigo' maxlength='6' style='text-align:center;width:95%'><br/>";
echo "<input type='submit' id='submit' value='¿Cuál es mi correo?'></form></p></center>";}
else{
include('./modulo/conectar.php');
$busca = mysqli_query($con,"SELECT * FROM propietarios WHERE id=\"$codigo\"");
$result = mysqli_fetch_array($busca);
if($result['email']==''){
echo "<p>Esta ID aún no está registrada en nuestro sistema. <a href='./registro'>¿Desea crear su cuenta?</a></p>";}
else{
echo "<p>Esta ID está registrada en nuestro sistema con la siguiente dirección de correo electrónico: <b>".$result['email']."</b></p>";}
mysqli_close($con);}
echo "</div><div class='a25'></div><style>#text{margin-bottom:10px;}</style>";
?>