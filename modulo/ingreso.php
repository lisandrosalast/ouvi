<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$previa = $_POST['previa'];
include("conectar.php");
if($usuario!='' and $contrasena!=''){
$verifica = mysqli_query($con, "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'");
$resultado = mysqli_fetch_array($verifica);
$user_id = $resultado['id'];
if($user_id!=''){
echo "Hola, ".$resultado['nombre'];
setcookie("provenex_user_code", "$user_id", time() + 365 * 24 * 60 * 60);
echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL='.$previa.'">'; 
}
else{
echo "<div class='a25'></div><div class='a50'>";
echo "Verifique los datos que ha introducido.";
echo "</div>";
}
}
else {
echo "<div class='a25'></div><div class='a50'>";
echo "<center><p><form method='POST' action='./ingreso'>";
echo "Usuario<br/><input type='text' id='text' name='usuario' style='text-align:center;width:90%'><br/>";
echo "Contraseña<br/><input type='password' id='text' name='contrasena' style='text-align:center;width:90%'><br/>";
echo "<input type='text' id='text' name='previa' value='".$_SERVER['HTTP_REFERER']."' style='display:none;text-align:center;width:90%'><br/>";
echo "<br/><input type='submit' id='submit' value='Ingresar'></form></p>";
echo "<p>Olvidé mi <a href='./recordar-clave' target='_blank'>contraseña</a> o <a href='./recordar-correo' target='_blank'>usuario</a></p></center></div>";
}
?> 