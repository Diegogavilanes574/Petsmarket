<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update empleado set estado=0 where id_empleado=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../empleado.php?mn=1");
}else{
    header("location:../empleado.php?mn=2");
}

?>