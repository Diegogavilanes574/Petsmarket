<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];
$op = $_GET['op'];

$quer = "update orden_examen set estado=".$op." where id_orden=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../rpt_orden_examen.php?mn=1");
}else{
    header("location:../rpt_orden_examen.php?mn=2");
}

?>