<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update cab_pregunta set estado=0 where id_pregunta=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../preguntas.php?mn=1");
}else{
    header("location:../preguntas.php?mn=2");
}

?>