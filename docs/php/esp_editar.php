<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_esp'];
$nom = $_POST['nom'];


$sql2 = "update especie set nombre='$nom' where id_especie=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../especie.php?mn=2');
}else{
    header('location:../especie.php?mn=4');
}

?>