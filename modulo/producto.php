<div class="a100">

<?php
$id = $_GET['id'];
include("conectar.php");
$buscar=mysqli_query($con, "SELECT * FROM productos WHERE id=\"$id\"");
$result = mysqli_fetch_array($buscar);

echo '<div class="a67">';
echo '<img src="./catalogo/'.$result['foto1'].'" width="100%">';
echo '</div><div class="a33">';
echo '<h1>'.$result['producto'].'</h1>';
echo '<p>'.$result['descripcion'].'</p>';
echo '</div>';

$producto_id = $result['id'];
$favoritos = mysqli_query($con, "SELECT * FROM favoritos WHERE producto_id=\"$producto_id\" and user_id=\"$user_id\"");
$result_fav = mysqli_fetch_array($favoritos);
if($result_fav['user_id']!='' and $result_fav['user_id']==$user_id){$corazon=1;}
else{$corazon=0;}
echo '<form method="POST" action="" onsubmit="favorito(\'i'.$result['id'].'\',\'p'.$result['id'].'\',\'u'.$result['id'].'\',\'f'.$result['id'].'\'); return false">';
echo '<button id="corazon" name="corazon" style="background:none;border:none;outline:none;">';
echo '<img id="i'.$result['id'].'" src="./imagen/';
if($corazon==0){echo 'corazon-vacio';}
else{echo 'corazon-lleno';}
echo '.png">';
echo '</buttom>';
echo '<input type="text" id="p'.$result['id'].'" name="p'.$result['id'].'" readonly="readonly" value="'.$result['id'].'" style="display:none;text-align:center;width:25%">';
echo '<input type="text" id="u'.$result['id'].'" name="u'.$result['id'].'" readonly="readonly" value="'.$user_id.'" style="display:none;text-align:center;width:25%">';
echo '<input type="text" id="f'.$result['id'].'" name="f'.$result['id'].'" readonly="readonly" value="'.$result['favoritos'].'" style="display:none;text-align:center;width:25%">';
echo '</form>';

?>
</div>
<script type="text/javascript" src="./js/jquery.js"></script><script type="text/javascript"><?php include "./js/favs1.js";?></script>
