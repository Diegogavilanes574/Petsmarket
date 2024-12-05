<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update especie set estado=0 where id_especie=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../especie.php?mn=1");
}else{
    header("location:../especie.php?mn=2");
}

?>