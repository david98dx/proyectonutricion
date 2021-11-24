<?php



    class consultas{

        public function insertarNuevoUsuario($nombre, $a_paterno,$a_materno,$municipio,$ciudad,$pais,$correo,$contras,$contras2,$f_nacimiento){
            date_default_timezone_set("America/Mexico_City");
$fecha_hora = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");

            include 'SED.php';
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql="INSERT INTO usuarios (nombre,a_paterno,a_materno,contrasena,correo,f_nacimiento,municipio,ciudad,pais,fecha_regis)VALUES(:nombre,:a_paterno,:a_materno,:contras,:correo,:f_nacimiento,:municipio,:ciudad,:pais,:fecha_regis)";
            $claveE=SED::encryption($contras);
            $statement=$conexion->prepare($sql);

            /*$statement = $conexion->prepare($sql);
            $statement-> bindParam(':nombre', $arg_nombre);
            $statement-> bindParam(':descripcion', $arg_descripcion);
            $statement-> bindParam(':categoria', $arg_categoria);
            $statement-> bindParam(':precio', $arg_precio);*/
           if(!$statement){
               return '<div class="alert alert-danger alert-dismissible fade show">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong>ERROR!&nbsp;</strong>No se registro.
             </div>';
           } else {
            $statement->execute(array(":nombre"=>$nombre,":a_paterno"=>$a_paterno,":a_materno"=>$a_materno,":contras"=>$claveE,":correo"=>$correo,":f_nacimiento"=>$f_nacimiento,":municipio"=>$municipio,":ciudad"=>$ciudad,":pais"=>$pais,":fecha_regis"=>$fecha_hora));
               return '<div class="alert alert-success alert-dismissible fade show">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong>Registro Exitoso!</strong></div>';
           }
            
        }
        public function cuentaRenglones($query){

            $modelo = new conexion();
            $conexion = $modelo->get_conexionCuenta();
            /* verificar la conexión */
    if (mysqli_connect_errno()) {
        exit();
    }
    if ($result = mysqli_query($conexion, "$query")) {
        /* determinar el número de filas del resultado */
        $row_cnt = mysqli_num_rows($result);
        /* cerrar el resulset */
        mysqli_free_result($result);
    }

    return $row_cnt;

        }

        public function iniciarSesion($correo,$contras){
            date_default_timezone_set("America/Mexico_City");
$fecha_hora = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
            $acceso=0;
            include 'SED.php';
            $claveD=SED::encryption($contras);

            
            date_default_timezone_set("America/Mexico_City");

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            $sql = "SELECT * FROM usuarios WHERE correo='$correo' LIMIT 1";
            $statement = $conexion->prepare($sql);
            $statement->execute();
            while ($row = $statement->fetch()){

                $contra_bd=$row['contrasena'];
                $id_user = $row['id_usuario'];
                   $id_nombre = $row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];
            }
            if($contra_bd==$claveD){
                $_SESSION["id"] = $id_user;
                $_SESSION["usuario"] = $id_nombre;

                $sql="INSERT INTO sesiones (id_usuario,inicio)VALUES(:id,:fecha)";
                $statement=$conexion->prepare($sql);
                $statement->execute(array(":id"=>$id_user,":fecha"=>$fecha_hora));
                
                $sql = "SELECT id_sesion FROM sesiones WHERE id_usuario=$id_user ORDER BY id_sesion DESC LIMIT 1";
                    $statement=$conexion->prepare($sql);
                    $statement->execute();
                    while ($row = $statement->fetch()){
                        $_SESSION["sesion"]=$row['id_sesion'];
                    }
                $acceso=1;
                }
            return $acceso;
            $statement->closeCursor();
        }

        public function cerrarSesion($id){
            date_default_timezone_set("America/Mexico_City");
$fecha_hora = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            $sql="UPDATE `sesiones` SET `cierre` = '$fecha_hora' WHERE `id_sesion` = $id";

            $statement = $conexion->prepare($sql);
        
        if($statement->execute()){
            unset($_SESSION["USUARIO"]);
unset($_SESSION["id"]);
session_destroy();
header("Location: ../index.php");

        }else{
            echo "Error updating record: " . $conexion->error;
        }




        }
       
    public function nombreTemporada(){
        $rows = null;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM temporadas ORDER BY idtemporada DESC LIMIT 1";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function ultimaJornada(){
        $rows = null;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idjornada,nombre FROM `jornadas` WHERE idcategoria=1 ORDER BY idjornada DESC LIMIT 1";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function fechasPartidos($id_jornada){
        $rows = null;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT fecha FROM partidos WHERE idtemporada=1 AND idjornada=12 GROUP BY fecha ORDER BY fecha; ";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }
    public function encuentros($id_jornada,$fecha){
        $rows = null;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT equipo1,equipo2,anotaciones1,anotaciones2,horario FROM partidos WHERE idtemporada=1 AND idjornada=$id_jornada AND fecha='$fecha' ORDER BY fecha,horario";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function hacerRol($jornada,$nombre,$categoria,$equipo1,$equipo2,$horario,$fecha){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO `partidos` (`idpartido`, `idtemporada`, `idjornada`, `equipo1`, `equipo2`, `anotaciones1`, `anotaciones2`, `horario`, `fecha`, `observaciones`) VALUES (NULL, '$temporada', '$jornada', '$equipo1', '$equipo2', NULL, NULL, '$horario', '$fecha', NULL);";
        $conn->exec($sql);
       if(!$conn){
           return "Error al crear el registro";
       } else {
           $conn->execute();
           return " registro creado correctamente";
       }
    }
}

?>