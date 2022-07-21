<div class="a100">

<?php
include("conectar.php");
echo '<div id="pedido" style="float:right">Pedido</div>';
echo '<div class="a100"><center><h2>Nuestros Productos</h2></center>';
echo '<div style="float:right">Mostrar por:';
echo '<form method="post" action="./productos">';
echo '<select onchange="this.form.submit()" name="vista" size="1">';
//echo '<option value="'.$_POST['vista'].'">'.$_POST['vista'].'</option>';
echo '<option value="Categoría" ';
if($_POST['vista']=="Categoría"){echo 'selected';}
echo '>Categoría</option>';
echo '<option value="Producto" ';
if($_POST['vista']=="Producto"){echo 'selected';}
echo '>Producto</option>';
echo '<option value="Marca" ';
if($_POST['vista']=="Marca"){echo 'selected';}
echo '>Marca</option>';
echo '<option value="Precio" ';
if($_POST['vista']=="Precio"){echo 'selected';}
echo '>Precio</option>';
//echo '<option value="Popularidad">Popularidad</option>';
//echo '<option value="Ofertas">Ofertas</option>';
echo '</select>';
//echo '<input type="submit" id="submit" value="Ver">';
echo '</form></div>';


if($_POST['vista']=="Categoría" or $_POST['vista']==''){
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY categoria ASC, subcategoria ASC, costo DESC");}
elseif($_POST['vista']=="Producto"){
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY subcategoria ASC, costo ASC");}
elseif($_POST['vista']=="Marca"){
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY marca ASC, subcategoria ASC, costo ASC");}
elseif($_POST['vista']=="Precio"){
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY categoria ASC, precio ASC");}

$v=0;
while($result = mysqli_fetch_array($buscar)){
$v=$v+1;
if($_POST['vista']=="Categoría" or $_POST['vista']==''){
if($categ!=$result['categoria'] and $result['categoria']!=''){
if($v!=1){echo '</div>';}
echo '<div style="clear:both"><div class="a100"></div></div><h3 style="">'.$result['categoria'].'</h3>';
$categ = $result['categoria'];$v=1;}
}
if($_POST['vista']=="Producto"){
if($categ!=$result['subcategoria'] and $result['subcategoria']!=''){
if($v!=1){echo '</div>';}
echo '<div style="clear:both"><div class="a100"></div></div><h3>'.$result['subcategoria'].'</h3>';
$categ = $result['subcategoria'];$v=1;}
}
if($_POST['vista']=="Marca"){
if($categ!=$result['marca'] and $result['marca']!=''){
if($v!=1){echo '</div>';}
echo '<div style="clear:both"><div class="a100"></div></div><h3>'.$result['marca'].'</h3>';
$categ = $result['marca'];$v=1;}
}
if($_POST['vista']=="Precio"){
if($categ!=$result['categoria'] and $result['categoria']!=''){
if($v!=1){echo '</div>';}
echo '<div style="clear:both"><div class="a100"></div></div><h3>'.$result['categoria'].'</h3>';
$categ = $result['categoria'];$v=1;}
}

if($v==1){
echo '<div id="grupo" class="full">';
echo '<style>@media screen and (min-width: 699px){#grupo {display:flex;}}</style>';
}

echo '<div class="a25" style="position:relative;color:#ffffff;background-color:';
if($result['inventario']!=''){
if($result['inventario']<=0){$fondo="#6a2627";}
elseif($result['inventario']>=1){$fondo="#6a2627";}
}
else{$fondo="#222222";}
$dispon=$result['disponible'];
echo $fondo.'">';
echo '<a href="./?i=producto&id='.$result['id'].'" target="_blank" style="color:#fff">';

if ($result['foto1']!=''){echo '<div class="full"><img src="./catalogo/thumb_'.$result['foto1'].'" width="100%" style="margin:0; padding:0"></div><br/>';}

echo '<h4 style="margin:10px 5px">'.$result['producto'].'</h4>';
echo '</a>';

if ($result['costo']!=''){
$precio_detal = $result['costo'] + ($result['costo'] * $result['ganancia_detal'] / 100);
$precio_mayor = $result['costo'] + ($result['costo'] * $result['ganancia_mayor'] / 100);
echo '<p style="margin:10px 5px;">Mayor: '.$precio_mayor.'$<br>Detal: '.$precio_detal.'$</p>';}

$producto_id = $result['id'];
$favoritos = mysqli_query($con, "SELECT * FROM favoritos WHERE producto_id=\"$producto_id\" and user_id=\"$user_id\"");
$result_fav = mysqli_fetch_array($favoritos);
if($result_fav['user_id']!='' and $result_fav['user_id']==$user_id){$corazon=1;}
else{$corazon=0;}
echo '<form method="POST" action="" onsubmit="favorito(\'i'.$result['id'].'\',\'p'.$result['id'].'\',\'u'.$result['id'].'\',\'f'.$result['id'].'\'); return false">';
echo '<button id="corazon" name="corazon" style="background:none;border:none;outline:none;position:absolute;top:1px;right:1px">';
echo '<img id="i'.$result['id'].'" src="./imagen/';
if($corazon==0){echo 'corazon-vacio';}
else{echo 'corazon-lleno';}
echo '.png">';
echo '</buttom>';
echo '<input type="text" id="p'.$result['id'].'" name="p'.$result['id'].'" readonly="readonly" value="'.$result['id'].'" style="display:none;text-align:center;width:25%">';
echo '<input type="text" id="u'.$result['id'].'" name="u'.$result['id'].'" readonly="readonly" value="'.$user_id.'" style="display:none;text-align:center;width:25%">';
echo '<input type="text" id="f'.$result['id'].'" name="f'.$result['id'].'" readonly="readonly" value="'.$result['favoritos'].'" style="display:none;text-align:center;width:25%">';
echo '</form>';

echo '<form method="POST" action="" onsubmit="anadir(\'p'.$result['id'].'\'); return false">';
echo '<input type="text" id="p'.$result['id'].'" name="p'.$result['id'].'" readonly="readonly" value="'.$result['id'].'" style="display:none;text-align:center;width:25%">';
echo '<button id="ana" name="ana" style="background:none;border:none;outline:none;position:absolute;bottom:1px;right:1px"><img src="./imagen/carrito-blanco.png"></buttom>';
echo '</form>';

echo '<form method="POST" action="./?i=producto-editar&id='.$result['id'].'" onsubmit=""; return false">';
//echo '<input type="text" id="p'.$result['id'].'" name="p'.$result['id'].'" readonly="readonly" value="'.$result['id'].'" style="display:none;text-align:center;width:25%">';
echo '<button id="edi" name="edi" style="background:none;border:none;outline:none;position:absolute;top:1px;left:1px"><img src="./imagen/lapiz.png"></buttom>';
echo '</form>';


echo '</div>';

if($v==4){echo '</div>';$v=0;}
}
if($v!=0){echo '</div>';}

echo '</div>';
echo '<div class="a100"><a href="./producto-editar"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Añadir</h2></div></a></div>';
?>
</div><script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript"><?php include "./js/favs1.js";?></script>
<script type="text/javascript"><?php include "./js/anadir.js";?></script>