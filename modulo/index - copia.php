<!--div style="display:none;"><img src="./imagen/banner-disenoweb.jpg"><img src="./imagen/banner-fuentes.jpg"><img src="./imagen/banner-redes.jpg"><img src="./imagen/banner-borrados.jpg"></div-->
<div class="full" style="background: #ffffff;">
<div id="presentacion" style="position: relative; width: 100%;" onmouseout="ocultarflechas()" onmouseover="mostrarflechas()">
<center><a id="enlace"><img id="banner" width="100%" style="margin:0px; padding:0; background-color:#000000"></a></center>
<div id="servicio" style="color:#ffffff; background-color:#000000; padding:0;margin:0px"><h5 id="titulo" style="padding:0;margin:0px;"></h5><i><h6 id="descripcion" style="margin:0 5px 3px; color:#ffffff; background-color:#000000"></h6></i></div>
<div class="solopc"><img id="flecha1" src="./imagen/ant.png" height="10%" alt="Anterior" title="Anterior" style="position: absolute; display: none; top: 45%; left: 5px;" onMousedown="anterior()">
<img id="flecha2" src="./imagen/sig.png" height="10%" alt="Siguiente" title="Siguiente" style="position: absolute; display: none; top: 45%; right: 5px;" onMousedown="siguiente()"></div>
<div class="movil"><img id="flecha1" src="./imagen/ant.png" height="10%" alt="Anterior" title="Anterior" style="position: absolute; top: 5%; left: 5px;" onMousedown="anterior()">
<img id="flecha2" src="./imagen/sig.png" height="10%" alt="Siguiente" title="Siguiente" style="position: absolute; top: 5%; right: 5px;" onMousedown="siguiente()"></div></div>
</div>

<div class="full" style="padding:30px 0; background:#ffffff;">
<div class="a25"><center><h3>Proveedores</h3>
<p></p>
<img src="./imagen/frigova.png" width="50%"><br>
<img src="./imagen/kaiser.png" width="50%">
</center>
</div>

<div class="a75">

<div class="a100"><center><h2>Lo más pedido</h2></center></div>
<?php
include("conectar.php");
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY favoritos DESC");
$x=1;
while($result = mysqli_fetch_array($buscar)){
if ($x<=3){
echo '<a href="./?i=producto-editar&id='.$result['id'].'"><div class="a33" style="padding:0; margin:1%; height:300px;color:#ffffff;background-color:';
if($result['inventario']!=''){
if($result['inventario']==0){$fondo="#6a2627";}
elseif($result['inventario']>=1){$fondo="#6a2627";}
}
else{$fondo="#eeeeee";}
$dispon=$result['disponible'];
echo $fondo.'">';
if ($result['foto1']!=''){echo '<div class="full"><img src="./catalogo/thumb_'.$result['foto1'].'" width="100%" height="200px" style="margin:0; padding=0"></div><br/>';}
echo '<p style="margin:10px 10px"><b>'.$result['producto'].'</b>';
if ($result['precio']!=''){echo '<br/>'.$result['precio'].'$';}
echo '</p>';
echo '<form method="POST" action="" onsubmit="enviarDatos(\'i'.$result['id'].'\',\'d'.$result['id'].'\',\'r'.$result['id'].'\'); return false">';
echo '<button id="corazon" name="corazon" style="background:none;border:none;outline:none;">';
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
$x=$x+1;}}
?>

<div class="a100" style="margin-top:40px"><center><h2>Promociones</h2></center></div>
<?php
include("conectar.php");
$buscar=mysqli_query($con, "SELECT * FROM productos ORDER BY categoria ASC, precio ASC");
$x=1;
while($result = mysqli_fetch_array($buscar)){
if ($x<=3){
echo '<a href="./?i=producto-editar&id='.$result['id'].'"><div class="a33" style="padding:0; margin:1%; height:300px;color:#ffffff;background-color:';
if($result['inventario']!=''){
if($result['inventario']==0){$fondo="#6a2627";}
elseif($result['inventario']>=1){$fondo="#6a2627";}
}
else{$fondo="#eeeeee";}
$dispon=$result['disponible'];
echo $fondo.'">';
if ($result['foto1']!=''){echo '<div class="full"><img src="./catalogo/thumb_'.$result['foto1'].'" width="100%" height="200px" style="margin:0; padding=0"></div><br/>';}
echo '<p style="margin:10px 10px"><b>'.$result['producto'].'</b>';
if ($result['precio']!=''){echo '<br/>'.$result['precio'].'$';}
echo '</p>';
echo '<form method="POST" action="" onsubmit="enviarDatos(\'i'.$result['id'].'\',\'d'.$result['id'].'\',\'r'.$result['id'].'\'); return false">';
echo '<button id="corazon" name="corazon" style="background:none;border:none;outline:none;">';
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
$x=$x+1;}}
?>

</div>
</div>

<script type="text/javascript"><?php include "./js/banner-inicio--.js";?></script>
<div class="solopc">
<!--script type="text/javascript">
function on_scroll() {if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {document.getElementById('cabeza_alt').style.display="block";} else {document.getElementById('cabeza_alt').style.display="none";}}
</script>
<body OnScroll="on_scroll()"-->
<div id="cabeza_alt" style="display:none"><a href="./index"><img src="./imagen/logo.png" height="38px" alt="Lisandro Salas"></a>
<div id="nav_alt"><ul><b><a href="./servicios"><li>Servicios</li></a><a href="./yo"><li>Sobre mí</li></a><a href="./contacto"><li>Contacto</li></a></b></ul></div></div></body></div>
<style>h5 {font-size: 40px;} h6 {font-size: 30px;} img {border: none;} #titulo, #descripcion {text-align: center;} #presentacion {background: #ffffff;}
@media screen and (max-width: 699px) {#titulo, #descripcion {text-align: left;} #presentacion {background: #000000;} h5 {font-size: 22px;} h6 {font-size: 18px;}}
@media screen and (min-width: 1281px) {}</style>