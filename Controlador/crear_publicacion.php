<?php
session_start();
include '../Modelo/classconexion.php';
date_default_timezone_set("America/Mexico_City");
$fecha_hora = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
$dia = date("d");
$mes = date("m");
$anio = date("Y");
$hora = date("H:i:s");
$semana = date("W");
$id_usuario=$_SESSION["id"];
$nivel_user=$_SESSION["nivel_user"];
$url=$_POST["url"];
$titulo=$_POST["titulo"];
$nivel=$_POST["nivel"];
$descripcion=$_POST["message_post"];

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

      if(!isset($url)){
        
        $ruta_provisional = $_FILES["image"]["tmp_name"];
        $nombre_i = $_FILES["image"]["name"];


        $sql = "INSERT INTO publicaciones (`id_usuario`,`img_local`, `img_online`, `titulo`, `descripcion`, `fecha_hora_regis`,`fecha_regis`,`dia_regis`, `mes_regis`, `anio_regis`,`semana_regis`,`estado`)
        VALUES ('$id_usuario','$nombre_i','','$titulo','$descripcion','$fecha_hora','$fecha','$dia','$mes','$anio','$semana','$nivel')";
        // use exec() because no results are returned
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        $image=$_FILES['image'];
        
        $dir = "../publicaciones/$last_id";
        $target_dir = "../publicaciones/".$last_id."/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $src = $dir."/".$nombre_i;
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   

if(file_exists($dir)){
    if(move_uploaded_file($ruta_provisional, $src)){
        echo "LISTO";
      } 

}else{
    mkdir($dir,  0777, true);
    if(move_uploaded_file($ruta_provisional, $src)){
        echo "LISTO 2";
      } 
}

      }else{
        $sql = "INSERT INTO publicaciones (`id_usuario`,`img_local`, `img_online`, `titulo`, `descripcion`, `fecha_hora_regis`,`fecha_regis`,`dia_regis`, `mes_regis`, `anio_regis`,`semana_regis`,`estado`)
        VALUES ('$id_usuario','','$url','$titulo','$descripcion','$fecha_hora','$fecha','$dia','$mes','$anio','$semana','$nivel')";
        // use exec() because no results are returned
        $conn->exec($sql);

      }
      switch($nivel_user){
        case 1: header('Location: ../admin.php');
        break;
        case 2:
        break;
        case 3:header('Location: ../inicio.php');
        break;
    }

    
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;
?>