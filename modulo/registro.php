<?php
echo "<div class='a25'></div><div class='a50'><h2>Registro</h2>";
  echo "<p><form method='POST' action='./registro-'><center>";
  echo "Nombre de usuario<br/><input type='text' id='text' name='usuario' value='' style='text-align:center;width:95%'>";
  echo "Correo electrónico<br/><input type='text' id='text' name='email' value='' style='text-align:center;width:95%'>";
  echo "Contraseña<br/><input type='password' id='text' name='contrasena' value='' style='text-align:center;width:95%'>";
  echo "Nombre Completo<br/><input type='text' id='text' name='nombre' value='' style='text-align:center;width:95%'>";
  echo "Cédula o RIF<br/><input type='text' id='text' name='cedula' value='' style='text-align:center;width:95%'>";
  echo "Dirección<br/><input type='text' id='text' name='direccion' value='' style='text-align:center;width:95%'>";
  echo "Teléfono<br/><input type='text' id='text' name='telefono' value='' style='text-align:center;width:95%'>";
//Código aleatorio
$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  echo "<input type='text' id='text' name='codigo' value='" . substr(str_shuffle($caracteres),0,20) . "' style='text-align:center;display:none' readonly='readonly'>";
  echo "<input type='submit' id='submit' value='Listo'></center></form></p>";
echo "</div><div class='a25'></div><style>#text{margin-bottom:10px;}</style>";
?>