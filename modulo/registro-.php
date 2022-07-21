<?php

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$codigo = $_POST['codigo'];
$contrasena = $_POST['contrasena'];
$usuario = $_POST['usuario'];
$email_nuevo = $_POST['email'];
$permisos_uva = "100"; //usuario,vendedor,administrador (Ejemplos: 100, 110, 111, 101)

echo "<div class='a25'></div><div class='a50'>";
echo "<h2>Acerca de sus datos enviados</h2>";

include("conectar.php");

mysqli_query($con, "CREATE TABLE IF NOT EXISTS usuarios ( id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , usuario VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , contrasena VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , email VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , nombre VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , cedula VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , direccion VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , telefono VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , nombre_nuevo VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , email_nuevo VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , fecha_registro VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , fecha_modificacion VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , permisos_uva VARCHAR(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) ENGINE = InnoDB");
//Verificamos nombre de usuario
$busca = mysqli_query($con, "SELECT * FROM usuarios WHERE usuario=\"$usuario\"");
$result = mysqli_fetch_array($busca);
if($result['usuario']==$usuario){
  echo "<p style='background:#ffbbbb'>Este nombre ya está registrado en nuestro sistema. Debe proporcionar un nombre de usuario diferente.</p><p><a href='./registro'>¿Intenta de nuevo?</a></p>";
}
else{
  $fecha_registro = date('Y-m-d H:i');
  if($email_nuevo!=''){

mysqli_query($con, "INSERT INTO usuarios (id,usuario,contrasena,email,nombre,cedula,direccion,telefono,nombre_nuevo,email_nuevo,fecha_registro,fecha_modificacion,permisos_uva) VALUES ('$codigo','$usuario','$contrasena','$email','$nombre','$cedula','$direccion','$telefono','$nombre_nuevo','$email_nuevo','$fecha_registro','$fecha_modificacion','$permisos_uva')");
    include("email_confirmecorreo.php");
    echo "<p style='background:#ffffbb'>Es necesario que <b>confirme su correo antes de ingresar al sistema</b>. Se ha enviado un mensaje de verificación a su dirección de correo electrónico. <b>Si no lo encuentra, búsquelo en <i>Correo no deseado</i> o <i>Spam</i></b>.</p>";
    }

}
mysqli_close($con);

echo "</div><div class='a25'></div>";
?>