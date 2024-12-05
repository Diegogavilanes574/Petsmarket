<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update cab_diagnostico set estado=0 where id_diagnostico=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../diagnostico.php?mn=1");
}else{
    header("location:../diagnostico.php?mn=2");
}

?>