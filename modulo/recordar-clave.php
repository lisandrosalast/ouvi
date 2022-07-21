<?php
$email = $_POST['email'];
echo "<div class='a25'></div><div class='a50'><h2>Recordar Contraseña</h2>";
if($email==''){
echo "<p><center><form method='POST' action='./recordar-clave'>Ingrese su correo electrónico<br/><input type='text' id='text' name='email' style='text-align:center;width:95%'><br/>";
echo "<input type='submit' id='submit' value='Enviar clave'></form></center></p><style>#text{margin-bottom:10px;}</style>";}
else{
include('./modulo/conectar.php');
$busca = mysqli_query($con,"SELECT * FROM propietarios WHERE email=\"$email\"");
$result = mysqli_fetch_array($busca);
if($result['email']!=$email){
  echo "<p>Este correo no está registrado. <a href='./recordar-correo'>¿Olvidó su correo?</a></p>";}
else{
  include('./modulo/email_recordarclave.php');
  echo "<p style='background:#ffffbb'>Se ha enviado un mensaje con su contraseña a su dirección de correo electrónico <i>".$result['email']."</i>. <b>Si no lo encuentra, búsquelo en <i>Correo no deseado</i> o <i>Spam</i></b>.</p>";}
  mysqli_close($con);}
echo "</div><div class='a25'></div>";
?>