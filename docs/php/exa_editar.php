<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_exa'];
$nom = $_POST['nom'];
$dir = $_POST['cod'];
$vmi = $_POST['vmin'];
$vma = $_POST['vmax'];


$sql2 = "update examen set nombre='$nom', codigo='$dir', valor_max='$vma', valor_min='$vmi' where id_examen=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../examen.php?mn=2');
}else{
    header('location:../examen.php?mn=4');
}

?>