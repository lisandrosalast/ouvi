<div class="a100">

<?php
include("conectar.php");

$categoria = $_POST['categoria'];
$url = $_POST['url'];
$titulo = $_POST['titulo'];
if ($url==''){
$url= utf8_decode($titulo);
$url = str_replace(' ', '-', $url);
$url = str_replace('?', '', $url);
$url = str_replace('+', '', $url);
$url = str_replace(':', '', $url);
$url = str_replace('??', '', $url);
$url = str_replace('`', '', $url);
$url = str_replace('!', '', $url);
$url = str_replace('¿', '', $url);
$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';
$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
$url = strtolower(strtr($url, utf8_decode($originales), $modificadas));
}
$contenido = $_POST['contenido'];
$resumen = $_POST['resumen'];
$modificado = $_POST['modificado'];
if($modificado==''){$modificado=date('Y-m-d H:i');}
$foto = $_POST['foto'];
if($_POST['id']!=''){$id = $_POST['id'];}

if(isset($_POST['guardar'])){
$archivo = $_FILES['archivo']['name'];
if (isset($archivo) && $archivo != ""){
$tipo = $_FILES['archivo']['type'];
$tamano = $_FILES['archivo']['size'];
$temp = $_FILES['archivo']['tmp_name'];
if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
echo '<div class="a100"><p>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</p></div>';}
else {
if (move_uploaded_file($temp, 'contenido/'.$archivo)) {chmod('contenido/'.$archivo, 0777); $foto = $archivo;}
else {echo '<div class="a100"><p>Ocurrió algún error al subir el fichero. No pudo guardarse.</p></div>';}}
//Creando la miniatura
$file = './contenido/'.$archivo;
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
case "jpg": imagejpeg($thumb,'./contenido/thumb_'.$archivo,90);
break;
case "png": imagepng($thumb,'./contenido/thumb_'.$archivo);
break;
case "gif": imagegif($thumb,'./contenido/thumb_'.$archivo);
break;
default: imagejpeg($thumb,'./contenido/thumb_'.$archivo,90);
}
}

if($id != ''){
mysqli_query($con, "UPDATE articulos SET categoria='$categoria', url='$url', titulo='$titulo', contenido='$contenido', resumen='$resumen', modificado='$modificado', foto='$foto' WHERE id='$id'");
}
else{
mysqli_query($con, "CREATE TABLE IF NOT EXISTS articulos (id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY , categoria VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , url VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , titulo VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , contenido LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , resumen VARCHAR(140) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , modificado VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");
mysqli_query($con, "INSERT INTO articulos (categoria,url,titulo,contenido,resumen,modificado,foto) VALUES ('$categoria','$url','$titulo','$contenido','$resumen','$modificado','$foto')");
}
echo '<div class="a100"><p>Se ha guardado exitosamente '.$titulo.'</p></div>';
}

elseif(isset($_POST['borrar'])){
mysqli_query($con, "DELETE FROM servicios WHERE id='$id'");
echo '<div class="a100"><p>El artículo se ha eliminado por completo de la página</p></div>';
}

else{
$id = $_GET['id'];
$buscar = mysqli_query($con, "SELECT * FROM articulos WHERE id='$id'");
$result = mysqli_fetch_array($buscar);
echo '<div class="a100">';
echo '<form method="POST" action="./articulo-editar" autocomplete="off" enctype="multipart/form-data">';
echo '<div class="a100"><b>Título</b><br/>';
echo '<input type="text" id="text" name="titulo" value="'.$result['titulo'].'" style="text-align:center;width:95%"></div>';
// Foto del Producto
echo '<div class="a100"><b>Foto</b><br/>';
echo '<input type="text" id="text" name="foto" value="'.$result['foto'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo"></div>';
//
echo '<div class="a100"><b>Contenido</b><br/>';
echo "<textarea type='text' id='text' rows='5' name='contenido' value='' maxlength='100000' style='width:95%'>".$result['contenido']."</textarea></div>";
echo '<div class="a100"><b>Resumen</b><br/>';
echo "<textarea type='text' id='text' rows='2' name='resumen' value='' maxlength='140' style='width:95%'>".$result['resumen']."</textarea></div>";
echo '<div class="a100"><b>Categoría</b><br/>';
echo '<input type="text" id="text" name="categoria" value="'.$result['categoria'].'" autocomplete="on" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>URL</b><br/>';
echo '<input type="text" id="text" name="url" value="'.$result['url'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Fecha y hora</b><br/>';
echo '<input type="text" id="text" name="modificado" value="'.$result['modificado'].'" style="text-align:center;width:95%"></div>';
echo '<center>';
echo '<input type="text" id="text" name="id" value="'.$result['id'].'" readonly="readonly" style="text-align:center;width:0%;display:none">';
echo '<div class="a100"><input type="submit" id="submit" name="guardar" value="Guardar"/>';
if($_GET['id']!=''){
echo ' <input type="submit" id="submit" name="borrar" value="Eliminar"/>';}
echo '</div>';
echo '</center>';
echo '</form>';
echo '</div>';
}

?>

<div class="a100"><p><a href="./articulo-editar">Nuevo artículo</a></p></div>
</div>