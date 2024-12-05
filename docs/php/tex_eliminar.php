<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update tipo_examen set estado=0 where id_tipoExamen=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../tipo_examen.php?mn=1");
}else{
    header("location:../tipo_examen.php?mn=2");
}

?>