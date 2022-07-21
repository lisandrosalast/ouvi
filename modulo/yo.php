<?php 
  // Borra todas las variables de sesión 
  $_SESSION = array(); 
  // Borra la cookie que almacena la sesión 
if(isset($_COOKIE['lisandrosalast_user_id'])) {
setcookie('lisandrosalast_user_id', '', time() - 42000); 
} 
  // Finalmente, destruye la sesión 
  session_destroy(); 
?> 
<div class="full" style="padding: 30px 0;">
<div class="a67">
<h2>¿Quién soy?</h2>
<p align="justify" style="padding: 0 0 30px 0;">Me gusta trabajar con mi familia. Ofrezco asistencia técnica en <i>electricidad, computación, informática, redes y electrónica de la computadora</i>. Soy profesional y cuento con más de <?php $time=date('Y')-2006; echo $time; ?>  años de experiencia. Estoy dispuesto a prestar un excelente servicio, personalizado, en el menor tiempo posible y a su alcance.</p>
<h2>Misión</h2>
<p align="justify" style="padding: 0 0 30px 0;">Garantizar a mis clientes un servicio que cubra sus necesidades y satisfaga sus expectativas, brindando atención personalizada, en tiempo récord y al mejor costo, con integridad y compromiso.</p>
<h2>Visión</h2>
<p align="justify" style="padding: 0 0 0 0;">Convertirme en líder en mis áreas de acción en el centro del país, manteniendo la misma ética de trabajo y ofreciendo la mejor calidad de servicio a mis clientes.</p>
</div>
<div class="a33">
<center><img class="ajustar" src="./imagen/nosotros.jpg" width="100%" style="max-width:300px;max-height:376px;" alt="Nosotros"></center>
</div>
</div>
<style type="text/css">img {border:none;} h2 {color:#004488;}</style>