<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update tipo_insumo set estado=0 where id_tipoInsumo=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../tipo_insumo.php?mn=1");
}else{
    header("location:../tipo_insumo.php?mn=2");
}

?>