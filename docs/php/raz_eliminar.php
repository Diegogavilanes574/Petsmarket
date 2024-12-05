<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update raza set estado=0 where id_raza=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../raza.php?mn=1");
}else{
    header("location:../raza.php?mn=2");
}

?>