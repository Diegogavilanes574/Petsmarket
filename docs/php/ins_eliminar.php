<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update insumo set estado=0 where id_insumo=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../insumo.php?mn=1");
}else{
    header("location:../insumo.php?mn=2");
}

?>