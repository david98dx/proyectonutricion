<?php
$fecha_hora = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
$hora = date("H:i:s");

 function obtenerFechaEnLetra($fecha){

    $dia= conocerDiaSemanaFecha($fecha);

    $num = date("j", strtotime($fecha));

    $anno = date("Y", strtotime($fecha));

    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    $mes = $mes[(date('m', strtotime($fecha))*1)-1];

    return $dia.', '.$num.' de '.$mes;//.' del '.$anno;

}
function conocerDiaSemanaFecha($fecha) {

    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');

    $dia = $dias[date('w', strtotime($fecha))];

    return $dia;

}
function conocerDiaSemanaChar($fecha) {

    $dias = array('D', 'L', 'A', 'M', 'J', 'V', 'S');

    $dia = $dias[date('w', strtotime($fecha))];

    return $dia;

}

function cerrarS($sesion){
    $consultas = new consultas();
    $filas = $consultas -> cerrarSesion($sesion);
}


?>