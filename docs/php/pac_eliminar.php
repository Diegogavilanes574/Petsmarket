<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update paciente set estado=0 where id_paciente=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../paciente.php?mn=1");
}else{
    header("location:../paciente.php?mn=2");
}

?>