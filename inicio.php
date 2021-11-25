<?php 
session_start();
$id_sesion=$_SESSION["sesion"];
$id_usuario=$_SESSION["id"];
 require_once('Modelo/classconexion.php');
 require_once('Modelo/classconsultas.php');
 require_once ('Controlador/cargar.php');


 if(isset($_POST["cerrar"])){
   cerrarS($id_sesion);
  header('Location: index.php');
 }

?><!DOCTYPE html>
<html lang="es">
<title>INTSOFT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="iconos/logoicono.png" type="imagepng" sizes="16x16">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function publicar(id_miembros,id_grupo) {
     var parametros = {"id_miembros":id_miembros,"id_grupo":id_grupo};
$.ajax({
    data:parametros,
    url:'aceptar.php',
    type: 'post',
    beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor");
    },
    success: function (response) {   
        $("#enviar"+id_miembros).css("display", "none");
        $("#cancelar"+id_miembros).css("display", "none");
        location.reload();
    }
});
}

</script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}


body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
.modal button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.modal .cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 3; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
textarea{
  width: 100%;
  height:80px;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="iconos/100222967.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>PERFIL</b></h4>
    <p class="w3-text-grey"><?php echo $_SESSION["usuario"]; ?></p>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>INICIO</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>MI PERFIL</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>DATOS PERSONALES</a>
    <a href="Controlador/cerrar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-window-close fa-fw w3-margin-right"></i>CERRAR SESION</a>
    
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="iconos/100222967.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>PUBLICACIONES</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Categorias:</span> 
      <button class="w3-button w3-black">TODO</button>
      <button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Platillos</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-commenting w3-margin-right"></i>Articulos</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-users w3-margin-right"></i>Recomendaciones</button>
      <button class="w3-button w3-white w3-hide-small" onclick="document.getElementById('id01_publicacion').style.display='block'"><i class="fa fa-plus w3-margin-right"></i></button>
    </div>
    </div>
  </header>
  <div id="id01_publicacion" class="modal">
  
  <form class="modal-content animate" action="Controlador/crear_publicacion.php" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_publicacion').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
    <button class="w3-button w3-white w3-hide-small" onclick="addUrl()" style="width:auto;"><i class="fa fa-plus w3-margin-right">URL</i></button>
    <button class="w3-button w3-white w3-hide-small" onclick="addInput()" style="width:auto;"><i class="fa fa-plus w3-margin-right">SUBIR IMAGEN</i></button>
    <div id="inputs"></div>
      <label for="uname"><b>Titulo</b></label>
      <input type="text" placeholder="Titulo:" name="titulo" required>
      <label for="psw"><b>Descripcion</b></label>
      <textarea id="w3review" name="message_post" placeholder="Escribe aqui..." maxlength="900" autofocus required>
</textarea>
<select name="nivel" id="">
        <option value="1">PRIVADO</option>
      </select>
      <button type="submit">PUBLICAR</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01_publicacion').style.display='none'" class="cancelbtn">Cancelar</button>
    </div>
  </form>
</div>



<?php



try {
   
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET UTF8");
  
  
  
  
    echo '<div class="w3-row-padding">';
$sql = "SELECT * FROM publicaciones  WHERE estado=1 ORDER BY id_publicacion DESC";
    foreach($conn->query($sql) as $row) {
      echo ' <div class="w3-third w3-container w3-margin-bottom">
      <img src="'.$row['img_online'].'" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>'.$row['titulo'].'</b></p>
        <p>'.$row['descripcion'].'</p>
      </div>
    </div>';
    }
  echo '</div>';

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?>
  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16" id="about">
    <div class="w3-col m6">
      <img src="https://www.nationalgeographic.com.es/medio/2018/02/27/playa-de-isuntza-lekeitio__1280x720.jpg" alt="Me" style="width:100%">
    </div>
    <div class="w3-col m6">
      <img src="https://viajes.nationalgeographic.com.es/medio/2020/04/15/yosemite_63829a27_1200x630.jpg" alt="Me" style="width:100%">
    </div>
  </div>

  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <h4><b>Acerca de mi.</b></h4>
    <p>Soy ingeniero industrial apasionado por la productividad. Tengo experiencia en gestión de operaciones, coordinación de grupos de trabajo y proyectos de mejora. He trabajado en la industria farmacéutica y en la cervecera. Estoy interesado en la preservación del medio ambiente y por ello estoy comprometida con la eficiencia. Me importa contribuir a crear entornos laborales seguros para todos los colaboradores. Creo que generar sinergia en el equipo de trabajo es primordial para lograr los resultados #ColaborarAntesQueCompetir</p>
    <hr>
    
    <h4>Estudio antropométrico</h4>
    <!-- Progress bars / Skills -->
    <p>IMC</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
    </div>
    <p>JUVENTUD</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
    </div>
    <p>AZUCAR EN LA SANGRE</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
    </div>
    <p>
      <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
        <i class="fa fa-download w3-margin-right"></i>Download Expediente Clinico
      </button>
    </p>
    <hr>
    
    <h4>RUTINAS DE EJERCICIO</h4>
    <!-- Pricing Tables -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Basico</li>
          <li class="w3-padding-16">Marcha 3 minutos</li>
          <li class="w3-padding-16">Talón 60 segundos</li>
          <li class="w3-padding-16">Elevacion rodilla 20 segundos</li>
          <li class="w3-padding-16">Giro hombros 20segundos</li>
          
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">INICIAR</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
        <li class="w3-black w3-xlarge w3-padding-32">Intermedio</li>
          <li class="w3-padding-16">Salto en estrella 2 minutos</li>
          <li class="w3-padding-16">Sentadillas 2 minutos</li>
          <li class="w3-padding-16">Tap backs 2 minutos</li>
          <li class="w3-padding-16">Burpees 2 minutos</li>
          
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">INICIAR</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Avanzado</li>
          <li class="w3-padding-16">Triceps 2 minutos</li>
          <li class="w3-padding-16">Piernas 1 minuto</li>
          <li class="w3-padding-16">Sentarse contra la pared 1 Minuto</li>
          <li class="w3-padding-16">Descensos 1 minuto</li>
          
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">INICIAR</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Mi Informacion</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p><?php
try {
   
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET UTF8");
  
$sql = "SELECT correo FROM usuarios WHERE id_usuario=$id_usuario";
    foreach($conn->query($sql) as $row) {
      echo $row[0];
    }
  

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?></p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p><?php



try {
   
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET CHARACTER SET UTF8");
  
$sql = "SELECT ciudad,pais FROM usuarios WHERE id_usuario=$id_usuario";
    foreach($conn->query($sql) as $row) {
      echo $row[0].",".$row[1];
    }
  

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?></p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
        <p>512312311</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Asunto</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email de amigo</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Mensaje</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Enviar Message</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>La Secretaría de Salud Federal, a través de la Dirección General de Epidemiología emite el siguiente informe técnico referente a Coronavirus (COVID-19).</p>
      <p>Secretaria de Salud <a href="https://www.gob.mx/salud/documentos/coronavirus-covid-19-comunicado-tecnico-diario-238449" target="_blank">VER</a></p>
    </div>
  
    <div class="w3-third">
      <h3>POSTS EN TENDENCIA</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="https://www.fao.org/images/homepagelibraries/news/sofa-2021-pr.jpg?sfvrsn=e31060ad_15" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">¿Está en riesgo nuestro suministro de alimentos?</span><br>
          <span>FAO</span>
        </li>
        <li class="w3-padding-16">
          <img src="https://www.fao.org/images/homepagelibraries/default-album/sdg-17.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">La FAO y los Objetivos de Desarrollo Sostenible</span><br>
          <span>FAO</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULARES</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">HABITOS</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">CARNES</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">QUESOS</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">SUEÑO</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">DESAYUNO</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">EJERCICIO</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">AGUA</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">AZUCARES</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">HARINAS</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">PAN DULCE</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">REFRESCOS</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">COMIDA RAPIDA</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">SUEÑO</span> 
      </p>
    </div>
  </footer>
  
  <div class="w3-black w3-center w3-padding-24">Powered by <a href="" title="W3.CSS" target="_blank" class="w3-hover-opacity">EQUIPO 1</a></div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Get the modal
var modal = document.getElementById('id01_publicacion');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function addUrl(){
  var capa = document.getElementById("inputs");
  var x = document.createElement("INPUT");
  x.setAttribute("type", "text");
  x.setAttribute("name", "url");
  x.setAttribute("placeholder", "Escribe URL de tu imagen");
  x.required = 'true';
  capa.appendChild(x);
}
function addInput(){
  var capa = document.getElementById("inputs");
  var x = document.createElement("INPUT");
  x.setAttribute("type", "file");
  x.setAttribute("name", "image");
  x.required = 'true';
  capa.appendChild(x);
}
</script>

</body>
</html>
