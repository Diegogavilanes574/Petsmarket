<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update cab_grupo set estado=0 where id_grupo=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../grupo.php?mn=1");
}else{
    header("location:../grupo.php?mn=2");
}

?>