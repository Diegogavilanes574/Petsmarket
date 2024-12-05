<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['dia'];
$chk = $_POST['chk0'];

$resp = false;

$sql = "update respuesta set id_sintoma='$chk' where id_respuesta=".$idemp;
$resp = $bd->query($sql);


if(!$resp){
    header('location:../preguntas.php?mn=2');
}else{
    header('location:../preguntas.php?mn=6');
}

?>