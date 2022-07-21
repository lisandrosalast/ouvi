<div class="a100">
<?php
include("conectar.php");
echo '<div class="a100"><a href="./servicios-editar"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Añadir</h2></div></a></div>';
echo '<div class="a100"><center><h2>Servicios</h2></center>';
$buscar=mysqli_query($con, "SELECT * FROM servicios ORDER BY categoria ASC");
while($result = mysqli_fetch_array($buscar)){
if($categ!=$result['categoria'] and $result['categoria']!=''){echo '<div style="clear:both"><div class="a100"></div></div><h3>'.$result['categoria'].'</h3>';
$categ = $result['categoria'];}
echo '<a href="./?i=servicios-editar&id='.$result['id'].'"><div class="a33" style="color:#000000;background-color:';
if($result['disponible']==5){$fondo="#ffaabb";}
elseif($result['disponible']==6){$fondo="#99ee33";}
else{$fondo="#eeeeee";}
$dispon=$result['disponible'];
echo $fondo.'">';
if ($result['foto']!=''){echo '<div class="full"><img src="./catalogo/thumb_'.$result['foto'].'" width="100%"></div><br/>';}
echo '<p style="margin:10px 10px"><b>'.$result['servicio'].'</b><br/>'.$result['descripcion'].'</p>';
echo '<form method="POST" action="" onsubmit="enviarDatos(\'i'.$result['id'].'\',\'d'.$result['id'].'\',\'r'.$result['id'].'\'); return false">';
echo '<button id="corazon" name="corazon" style="background:none;border:none;outline:none;padding:0">';
echo '<img id="i'.$result['id'].'" src="./imagen/';
if($dispon==0){echo 'corazon-vacio';}
else{echo 'corazon-lleno';}
echo '.png">';
echo '</buttom>';
echo '<input type="text" id="d'.$result['id'].'" name="d'.$result['id'].'" style="display:none" readonly="readonly" value="'.$result['disponible'].'" style="text-align:center;width:95%">';
echo '<input type="text" id="r'.$result['id'].'" name="r'.$result['id'].'" value="'.$result['id'].'" readonly="readonly" style="text-align:center;width:0%;display:none">';
echo '</form>';
echo '</div>';
echo '</a>';
}
echo '</div>';
echo '<div class="a100"><a href="./servicios-editar"><div style="float:left;margin:5px 0.5%;padding:10px;background-color:#ff6600;color:#ffffff"><h2>Añadir</h2></div></a></div>';
?>
</div><script type="text/javascript" src="./js/jquery.js"></script><script type="text/javascript" src="./js/activar.js"></script>
