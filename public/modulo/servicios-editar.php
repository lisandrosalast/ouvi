<div class="a100">

<?php
include("conectar.php");

$categoria = $_POST['categoria'];
$servicio = $_POST['servicio'];
$descripcion = $_POST['descripcion'];
$disponible = $_POST['disponible'];
$foto = $_POST['foto'];
if($_POST['id']!=''){$id = $_POST['id'];}

if(isset($_POST['guardar'])){
//Subiendo la imagen
$archivo = $_FILES['archivo']['name'];
if (isset($archivo) && $archivo != ""){
$tipo = $_FILES['archivo']['type'];
$tamano = $_FILES['archivo']['size'];
$temp = $_FILES['archivo']['tmp_name'];
if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
echo '<div class="a100"><p>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</p></div>';}
else {
if (move_uploaded_file($temp, 'catalogo/'.$archivo)) {chmod('catalogo/'.$archivo, 0777); $foto = $archivo;}
else {echo '<div class="a100"><p>Ocurrió algún error al subir el fichero. No pudo guardarse.</p></div>';}}
//Creando la miniatura
$file = './catalogo/'.$archivo;
$width = 200;
$file_info = getimagesize($file);
$ratio = $file_info[0] / $file_info[1];
$newwidth = $width;
$newheight = round($newwidth / $ratio);
$ext = explode(".", $file);
$ext = strtolower($ext[count($ext) - 1]);
if ($ext == "jpeg") $ext = "jpg";
switch ($ext) {
case "jpg": $img = imagecreatefromjpeg($file);
break;
case "png": $img = imagecreatefrompng($file);
break;
case "gif": $img = imagecreatefromgif($file);
break;
}
$thumb = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($thumb, $img, 0, 0, 0, 0, $newwidth, $newheight, $file_info[0], $file_info[1]);
switch($file_ext){
case "jpg": imagejpeg($thumb,'./catalogo/thumb_'.$archivo,90);
break;
case "png": imagepng($thumb,'./catalogo/thumb_'.$archivo);
break;
case "gif": imagegif($thumb,'./catalogo/thumb_'.$archivo);
break;
default: imagejpeg($thumb,'./catalogo/thumb_'.$archivo,90);
}
}
if($id != ''){
mysqli_query($con, "UPDATE servicios SET categoria=\"$categoria\", servicio=\"$servicio\", descripcion=\"$descripcion\", disponible=\"$disponible\", foto=\"$foto\" WHERE id=\"$id\"");
}
else{
mysqli_query($con, "CREATE TABLE IF NOT EXISTS servicios (id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY , categoria VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , servicio VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , descripcion VARCHAR(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , disponible VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");
mysqli_query($con, "INSERT INTO servicios (categoria,servicio,descripcion,disponible,foto) VALUES ('$categoria','$servicio','$descripcion','$disponible','$foto')");
}
echo '<div class="a100"><p>Se ha guardado exitosamente '.$servicio.'</p></div>';
}

elseif(isset($_POST['borrar'])){
mysqli_query($con, "DELETE FROM servicios WHERE id=\"$id\"");
echo '<div class="a100"><p>El servicio se ha eliminado por completo de la base de datos</p></div>';
}

else{
$id = $_GET['id'];
$buscar = mysqli_query($con, "SELECT * FROM servicios WHERE id=\"$id\"");
$result = mysqli_fetch_array($buscar);
echo '<div class="a100">';
echo '<form method="POST" action="./servicios-editar" autocomplete="off" enctype="multipart/form-data">';
// Foto del Producto
echo '<div class="a100"><b>Foto</b><br/>';
if($id != ''){echo '<input type="text" id="text" name="foto" value="'.$result['foto'].'" style="text-align:center;width:95%">';}
echo '<input type="file" id="archivo" name="archivo"></div>';
//
echo '<div class="a100"><b>Categoría</b><br/>';
echo '<input type="text" id="text" name="categoria" value="'.$result['categoria'].'" autocomplete="on" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Servicio</b><br/>';
echo '<input type="text" id="text" name="servicio" value="'.$result['servicio'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Descripción</b><br/>';
echo '<textarea type="text" id="text" rows="5" name="descripcion" value="" maxlength="10000" style="width:95%">'.$result['descripcion'].'</textarea></div>';
echo '<div class="a100"><b>¿Disponible?</b> 1 es sí y 0 es no<br/>';
echo '<input type="text" id="text" name="disponible" value="'.$result['disponible'].'" style="text-align:center;width:95%"></div>';
echo '<center>';
echo '<input type="text" id="text" name="id" value="'.$result['id'].'" readonly="readonly" style="text-align:center;width:0%;display:none">';
echo '<div class="a100"><input type="submit" id="submit" name="guardar" value="Guardar"/>';
if($_GET['id']!=''){
echo ' <input type="submit" id="submit" name="borrar" value="Borrar"/>';}
echo '</div>';
echo '</center>';
echo '</form>';
echo '</div>';
}

?>
<div class="a100"><p><a href="./servicios-admin">Todos los servicios</a><br/><a href="./servicios-editar">Nuevo servicio</a></p></div>
</div>