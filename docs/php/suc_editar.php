<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_suc'];
$nom = $_POST['nom'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];

$sql2 = "update sucursal set nombre='$nom', direccion='$dir', numero='$tel' where id_sucursal=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../sucursal.php?mn=2');
}else{
    header('location:../sucursal.php?mn=4');
}

?>