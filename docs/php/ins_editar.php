<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_raz'];
$nom = $_POST['nom'];
$dir = $_POST['esp'];
$sto = $_POST['stock'];

$sql2 = "update insumo set nombre='$nom', id_tipoInsumo='$dir', stock='$sto' where id_insumo=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../insumo.php?mn=2');
}else{
    header('location:../insumo.php?mn=4');
}

?>