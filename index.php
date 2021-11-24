<?php 
session_start();
require_once('Modelo/classconexion.php');
require_once('Modelo/classconsultas.php');

if(isset($_POST["iniciar"])){

  $email=htmlentities($_POST["email"]);
$psw=htmlentities($_POST["psw"]);

$sql = "SELECT * FROM usuarios WHERE correo='$email' LIMIT 1";


if(strlen($email) > 0 && strlen($psw) > 0){
  $consultas = new consultas();
  $renglones = $consultas->cuentaRenglones($sql);

  if($renglones>0){
    $ingreso=$consultas->iniciarSesion($email,$psw);
    
    if($ingreso>0){
      header('Location: inicio.php');
    }else{
      echo "Error/Acceso Denegado";
    }
    
  }else{
    echo "Error/USUARIO NO EXISTE";
  }
} else{
echo "Por favor completa los campos";
}

}
?><!DOCTYPE html>
<html lang="es">
<title>INTSOFT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}

body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=date] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
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
.cancelbtn {
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
  z-index: 2; /* Sit on top */
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
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button"><i class="fa fa-close"></i></a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a onclick="w3_close()" class="w3-bar-item w3-button"><button onclick="document.getElementById('id01_iniciar').style.display='block'" style="width:auto;">INICIAR SESION</button></a>
  <a onclick="w3_close()" class="w3-bar-item w3-button"><button onclick="document.getElementById('id01_registro').style.display='block'" style="width:auto;">REGISTRARME</button></a>
</nav>


<div id="id01_iniciar" class="modal">
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_iniciar').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Username" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="iniciar">INICIAR SESION</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Recordarme
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01_iniciar').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw"> <a href="#">Olvide mi password?</a></span>
    </div>
  </form>
</div>
<div id="id01_registro" class="modal">
  <span onclick="document.getElementById('id01_registro').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container">
      <h1>REGISTRO</h1>
      <p>Por favor complete este formulario para crear una cuenta. </p>
      <?php 



    
    if(isset($_POST["enviar"])){


    $nombre=htmlentities($_POST["name"]);
    $a_paterno=htmlentities($_POST["a_paterno"]);
    $a_materno=htmlentities($_POST["a_materno"]);
    $municipio=htmlentities($_POST["municipio"]);
    $ciudad=htmlentities($_POST["ciudad"]);
    $pais=htmlentities($_POST["pais"]);
    $correo=htmlentities($_POST["correo"]);
    $contras=htmlentities($_POST["contras"]);
    $contras2=htmlentities($_POST["contras2"]);
    $f_nacimiento=htmlentities($_POST["f_nacimiento"]);
		
		
		
		if($contras!=$contras2){
			echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ERROR!&nbsp;</strong> Las contraseñas no coinciden.
  </div>';
		
    }
		else{
			
			try{
    if(strlen($nombre) > 0 && strlen($a_paterno) > 0 && strlen($a_materno) > 0 && strlen($correo)>0){
      $consultas = new consultas();
      $mensaje = $consultas->insertarNuevoUsuario($nombre,$a_paterno,$a_materno,$municipio,$ciudad,$pais,$correo,$contras,$contras2,$f_nacimiento);
      echo $mensaje;
  } else{
    echo "Por favor completa los campos";
  }    
}catch(Exception $e){
    die("Error: ".$e->getMessage());
}
		}
	}


    ?>
      <hr>

      <label for="email"><b>Nombre</b></label>
      <input type="text" id="name" name="name" placeholder="Nombre" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
      <label for="email"><b>Apellido Paterno</b></label>
      <input type="text" id="paterno" name="a_paterno" placeholder="Apellido Paterno" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
      <label for="email"><b>Apellido Materno</b></label>
      <input type="text" id="materno" name="a_materno" placeholder="Apellido Materno" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">

      <label for="email"><b>Email</b></label>
      <input class="datos" type="email" name="correo" placeholder="Correo" required>

      <label for="psw"><b>Password</b></label>
      <input type="text" name="contras" placeholder="Contraseña" required>

      <label for="psw-repeat"><b>Repetir Password</b></label>
      <input type="text" name="contras2" placeholder="Repetir Contraseña" required>

      <label for="psw-repeat"><b>Fecha Nacimiento</b></label>
      <input type="date" name="f_nacimiento" required>

      <label for="psw-repeat"><b>Municipio</b></label>
      <input type="text" name="municipio" required>
      <label for="psw-repeat"><b>Ciudad</b></label>
      <input type="text" name="ciudad" required>
      <label for="psw-repeat"><b>Pais</b></label>
      <input type="text" name="pais" required>
      
      <p>Al crear una cuenta, acepta nuestras  <a href="#" style="color:dodgerblue">Términos y Privacidad </a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01_registro').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" name="enviar" class="signupbtn">REGISTRARME</button>
      </div>
    </div>
  </form>
</div>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-center w3-padding-16"><img src="iconos/logohorizontal.png" width="300"></div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/sandwich.jpg" alt="Sandwich" style="width:100%">
      <h3>El Sandwich perfecto</h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/steak.jpg" alt="Steak" style="width:100%">
      <h3>Let Me Tell You About This Steak</h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/cherries.jpg" alt="Cherries" style="width:100%">
      <h3>Cherries, interrupted</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
      <p>What else?</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/wine.jpg" alt="Pasta and Wine" style="width:100%">
      <h3>Once Again, Robust Wine and Vegetable Pasta</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/popsicle.jpg" alt="Popsicle" style="width:100%">
      <h3>All I Need Is a Popsicle</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/salmon.jpg" alt="Salmon" style="width:100%">
      <h3>Salmon For Your Skin</h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/sandwich.jpg" alt="Sandwich" style="width:100%">
      <h3>The Perfect Sandwich, A Real Classic</h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="https://www.w3schools.com/w3images/croissant.jpg" alt="Croissant" style="width:100%">
      <h3>Le French</h3>
      <p>Lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">Ver Mas..</a>
    </div>
  </div>
  
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>About Me, The Food Man</h3><br>
    <img src="https://www.w3schools.com/w3images/chef.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
    <div class="w3-padding-32">
      <h4><b>I am Who I Am!</b></h4>
      <h6><i>With Passion For Real, Good Food</i></h6>
      <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
    <div class="w3-third">
      <h3>BLOG POSTS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="https://www.w3schools.com/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="https://www.w3schools.com/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Get the modal
var modal = document.getElementById('id01_iniciar');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('id01_registro');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
