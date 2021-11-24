<?php
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "nutricion";
class conexion{
    public function get_conexion(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "nutricion";
        $conn = new PDO("mysql:localhost=$host;dbname=$db;",$user, $pass);
        return $conn;
    }

    public function get_conexionCuenta(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "nutricion";

        $link = mysqli_connect("$host", "$user", "$pass", "$db");
        return $link;
    }
}

?>