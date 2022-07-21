<div class="a100">

<?php
include("conectar.php");

$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$marca = $_POST['marca'];
$producto = $_POST['producto'];
$descripcion = $_POST['descripcion'];
$inventario = intval($_POST['inventario']);

$costo = round($_POST['costo'],2);
$ganancia_detal = round($_POST['ganancia_detal'],2);
$ganancia_mayor = round($_POST['ganancia_mayor'],2);
$mayor = round($_POST['mayor'],2);

$favoritos = intval($_POST['favoritos']);
$minimo = intval($_POST['minimo']);
$maximo = intval($_POST['maximo']);
$modificado = $_POST['modificado'];
$foto1 = $_POST['foto1'];
$foto2 = $_POST['foto2'];
$foto3 = $_POST['foto3'];
$foto4 = $_POST['foto4'];
$foto5 = $_POST['foto5'];
$foto6 = $_POST['foto6'];
if($_POST['id']!=''){$id = $_POST['id'];}

if(isset($_POST['guardar'])){

//Subiendo la imagen

for ($i=1;$i<=6;$i++){
echo $i;
if ($i==1){$file = $_FILES['archivo1'];}
elseif ($i==2){$file = $_FILES['archivo2'];}
elseif ($i==3){$file = $_FILES['archivo3'];}
elseif ($i==4){$file = $_FILES['archivo4'];}
elseif ($i==5){$file = $_FILES['archivo5'];}
elseif ($i==6){$file = $_FILES['archivo6'];}
$archivo = $file['name'];
if (isset($archivo) && $archivo != ""){
$tipo = $file['type'];
$tamano = $file['size'];
$temp = $file['tmp_name'];
if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
echo '<div class="a100"><p>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</p></div>';}
else {
if (move_uploaded_file($temp, 'catalogo/'.$archivo)) {chmod('catalogo/'.$archivo, 0777);
if ($i==1){$foto1 = $archivo;}
elseif ($i==2){$foto2 = $archivo;}
elseif ($i==3){$foto3 = $archivo;}
elseif ($i==4){$foto4 = $archivo;}
elseif ($i==5){$foto5 = $archivo;}
elseif ($i==6){$foto6 = $archivo;}
}
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
}

$modificado=date('Y-m-d H:i');

if($id != ''){
mysqli_query($con, "UPDATE productos SET categoria='$categoria', subcategoria='$subcategoria', marca='$marca', producto='$producto', descripcion='$descripcion', inventario='$inventario', costo='$costo', ganancia_detal='$ganancia_detal', ganancia_mayor='$ganancia_mayor', mayor='$mayor', favoritos='$favoritos', minimo='$minimo', maximo='$maximo', modificado='$modificado', foto1='$foto1', foto2='$foto2', foto3='$foto3', foto4='$foto4', foto5='$foto5', foto6='$foto6' WHERE id='$id'");
}
else{
mysqli_query($con, "CREATE TABLE IF NOT EXISTS productos (id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY , categoria VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , subcategoria VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , marca VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , producto VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , descripcion LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , inventario INT(100) NOT NULL , costo DECIMAL(10,2) NOT NULL , ganancia_detal DECIMAL(10,2) NOT NULL , ganancia_mayor DECIMAL(10,2) NOT NULL , mayor DECIMAL(10,2) NOT NULL , favoritos INT(100) NOT NULL , minimo INT(10) NOT NULL , maximo INT(20) NOT NULL , modificado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto1 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto2 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto3 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto4 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto5 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , foto6 VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");
mysqli_query($con, "INSERT INTO productos (categoria , subcategoria , marca , producto , descripcion , inventario , costo , ganancia_detal , ganancia_mayor , mayor , favoritos , minimo , maximo , modificado , foto1 , foto2 , foto3 , foto4 , foto5 , foto6) VALUES ('$categoria' , '$subcategoria' , '$marca' , '$producto' , '$descripcion' , '$inventario' , '$costo' , '$ganancia_detal' , '$ganancia_mayor' , '$mayor' , '$favoritos' , '$minimo' , '$maximo' , '$modificado' , '$foto1' , '$foto2' , '$foto3' , '$foto4' , '$foto5' , '$foto6')");
}
echo '<div class="a100"><p>Se ha guardado exitosamente '.$producto.'</p></div>';
}

elseif(isset($_POST['borrar'])){
mysqli_query($con, "DELETE FROM productos WHERE id=\"$id\"");
echo '<div class="a100"><p>El producto se ha eliminado por completo de la base de datos</p></div>';
}

else{
$id = $_GET['id'];
$buscar = mysqli_query($con, "SELECT * FROM productos WHERE id=\"$id\"");
$result = mysqli_fetch_array($buscar);
echo '<div class="a100">';
echo '<form method="POST" action="./producto-editar" autocomplete="off" enctype="multipart/form-data">';
// Fotos del Producto
echo '<div class="a100"><b>Foto 1</b><br/>';
echo '<input type="text" id="text" name="foto1" value="'.$result['foto1'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo1"></div>';
echo '<div class="a100"><b>Foto 2</b><br/>';
echo '<input type="text" id="text" name="foto2" value="'.$result['foto2'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo2"></div>';
echo '<div class="a100"><b>Foto 3</b><br/>';
echo '<input type="text" id="text" name="foto3" value="'.$result['foto3'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo3"></div>';
echo '<div class="a100"><b>Foto 4</b><br/>';
echo '<input type="text" id="text" name="foto4" value="'.$result['foto4'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo4"></div>';
echo '<div class="a100"><b>Foto 5</b><br/>';
echo '<input type="text" id="text" name="foto5" value="'.$result['foto5'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo5"></div>';
echo '<div class="a100"><b>Foto 6</b><br/>';
echo '<input type="text" id="text" name="foto6" value="'.$result['foto6'].'" style="text-align:center;width:95%">';
echo '<input type="file" id="archivo" name="archivo6"></div>';
//
echo '<div class="a100"><b>Categoría</b><br/>';
echo '<input type="text" id="text" name="categoria" value="'.$result['categoria'].'" autocomplete="on" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>SubCategoría</b><br/>';
echo '<input type="text" id="text" name="subcategoria" value="'.$result['subcategoria'].'" autocomplete="on" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Marca</b><br/>';
echo '<input type="text" id="text" name="marca" value="'.$result['marca'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Producto</b><br/>';
echo '<input type="text" id="text" name="producto" value="'.$result['producto'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Descripción</b><br/>';
echo '<textarea type="text" id="text" rows="5" name="descripcion" value="" maxlength="10000" style="width:95%">'.$result['descripcion'].'</textarea></div>';

echo '<div class="a100"><b>Costo</b><br/>';
echo '<input type="text" id="text" name="costo" value="'.$result['costo'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Ganancia Detal (%)</b><br/>';
echo '<input type="text" id="text" name="ganancia_detal" value="'.$result['ganancia_detal'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Ganancia Mayor (%)</b><br/>';
echo '<input type="text" id="text" name="ganancia_mayor" value="'.$result['ganancia_mayor'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Mayor desde</b><br/>';
echo '<input type="text" id="text" name="mayor" value="'.$result['mayor'].'" style="text-align:center;width:95%"></div>';

echo '<div class="a100"><b>Disponible</b><br/>';
echo '<input type="text" id="text" name="inventario" value="'.$result['inventario'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Mínimo</b><br/>';
echo '<input type="text" id="text" name="minimo" value="'.$result['minimo'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Máximo</b><br/>';
echo '<input type="text" id="text" name="maximo" value="'.$result['maximo'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Favoritos</b><br/>';
echo '<input type="text" id="text" name="favoritos" value="'.$result['favoritos'].'" style="text-align:center;width:95%"></div>';
echo '<div class="a100"><b>Modificado</b><br/>';
echo '<input type="text" id="text" name="modificado" value="'.$result['modificado'].'" style="text-align:center;width:95%"></div>';

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
<div class="a100"><p><a href="./productos">Todos los productos</a><br/><a href="./producto-editar">Nuevo producto</a></p></div>
</div>