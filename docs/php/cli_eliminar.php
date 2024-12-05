<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idx = $_GET['valor'];

$quer = "update cliente set estado=0 where id_cliente=".$idx;
$resp = $bd->query($quer);

if($resp){
    header("location:../cliente.php?mn=1");
}else{
    header("location:../cliente.php?mn=2");
}

?>