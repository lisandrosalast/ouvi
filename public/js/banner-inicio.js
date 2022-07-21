i5="./imagen/banner-electricidad.jpg"
i4="./imagen/banner-borrados.jpg"
i3="./imagen/banner-redes.jpg"
i2="./imagen/banner-fuentes.jpg"
i1="./imagen/banner-disenoweb.jpg"
t5="Electricidad Residencial"
t4="Recupero Archivos"
t3="Implemento Redes"
t2="Reparo Fuentes de Poder"
t1="Diseño Web"
d5="ilumino su casa u oficina"
d4="busco hasta que aparezcan"
d3="porque estar conectados es cada vez más necesario"
d2="y quedan como nuevas"
d1="que conozcan su imagen y su empresa"
h5="./electricidad"
h4="./computadoras"
h3="./redes"
h2="./computadoras"
h1="./internet"
var i=Math.round(Math.random() * 4) + 1;
var b=document.getElementById("banner");
var e=document.getElementById("enlace");
var t=document.getElementById("titulo");
var d=document.getElementById("descripcion");
function siguiente() {   
if (i == 1) {b.src=i2; e.href=h2; b.alt=t2; t.innerHTML=t2; d.innerHTML=d2; i=2;}
else if (i == 2) {b.src=i3; e.href=h3; b.alt=t3; t.innerHTML=t3; d.innerHTML=d3; i=3;}
else if (i == 3) {b.src=i4; e.href=h4; b.alt=t4; t.innerHTML=t4; d.innerHTML=d4; i=4;}
else if (i == 4) {b.src=i5; e.href=h5; b.alt=t5; t.innerHTML=t5; d.innerHTML=d5; i=5;}
else if (i == 5) {b.src=i1; e.href=h1; b.alt=t1; t.innerHTML=t1; d.innerHTML=d1; i=1;}}
function anterior() {
if (i == 5) {b.src=i4; e.href=h4; b.alt=t4; t.innerHTML=t4; d.innerHTML=d4; i=4;}
else if (i == 4) {b.src=i3; e.href=h3; b.alt=t3; t.innerHTML=t3; d.innerHTML=d3; i=3;}
else if (i == 3) {b.src=i2; e.href=h2; b.alt=t2; t.innerHTML=t2; d.innerHTML=d2; i=2;}
else if (i == 2) {b.src=i1; e.href=h1; b.alt=t1; t.innerHTML=t1; d.innerHTML=d1; i=1;}
else if (i == 1) {b.src=i5; e.href=h5; b.alt=t5; t.innerHTML=t5; d.innerHTML=d5; i=5;}}
<!--setInterval('siguiente()',8000);-->
function ocultarflechas() {document.getElementById('flecha1').style.display="none"; document.getElementById('flecha2').style.display="none";}
function mostrarflechas() {document.getElementById('flecha1').style.display="block"; document.getElementById('flecha2').style.display="block";}