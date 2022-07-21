<?php
echo "<div class='a25'></div><div class='a50'>";
include('./modulo/conectar.php');
$codigo = $_GET['id'];
$email = $_GET['validar'];
$busca = mysqli_query($con,"SELECT * FROM propietarios WHERE id=\"$codigo\"");
$result = mysqli_fetch_array($busca);
echo "<h3>Confirmación de correo electrónico</h3>";
if($result['emailnuevo']!=''){
  if($email=='no'){
    mysqli_query($con,"UPDATE propietarios SET emailnuevo='', registro='' WHERE id=\"$codigo\"");
    echo "<p style='background:#ffbbbb'>Se ha eliminado su nueva cuenta de correo electrónico. Pero sigue teniendo disponible su cuenta <i>" . $result['email'] . "</i> para ingresar a nuestro sistema.</p>";}
  elseif($email==$result['emailnuevo']){
    mysqli_query($con,"UPDATE propietarios SET email=\"$email\", emailnuevo='', registro='' WHERE id=\"$codigo\"");
    echo "<p style='background:#bbffbb'>Ha verificado correctamente su cuenta de correo electrónico " . $email ."</p>";}
  else{
    echo "<p style='background:#ffbbbb'>La dirección que quiere confirmar no coincide con la que tenemos en nuestros registros. Asegúrese de que esta fue la última dirección que usó en nuestro sistema.</p>";}}
else{
echo "<p style='background:#ffbbbb'>No hay una dirección de correo electrónico por verificar o ya fue verificada anteriormente.</p>";}
mysqli_close($con);
echo "</div><div class='a25'></div>";
?>