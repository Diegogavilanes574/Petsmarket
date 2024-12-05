<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_raz'];
$nom = $_POST['nom'];
$dir = $_POST['esp'];

$sql2 = "update sucursal set nombre='$nom', id_especie='$dir' where id_especie=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../raza.php?mn=2');
}else{
    header('location:../raza.php?mn=4');
}

?>