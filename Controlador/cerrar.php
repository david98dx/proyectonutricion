<?php
session_start();
date_default_timezone_set("America/Mexico_City");
require_once('../Modelo/classconexion.php');
 require_once('../Modelo/classconsultas.php');
 require_once ('../Controlador/cargar.php');
 $id_sesion=$_SESSION["sesion"];
 cerrarS($id_sesion);

?>