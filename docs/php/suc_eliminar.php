<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update sucursal set estado=0 where id_sucursal=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../sucursal.php?mn=1");
}else{
    header("location:../sucursal.php?mn=2");
}

?>