<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idemp = $_POST['id_pre'];
$nom = $_POST['nom'];

$nom = strtoupper($nom);

$sql2 = "update cab_pregunta set nombre='$nom' where id_pregunta=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../preguntas.php?mn=2');
}else{
    header('location:../preguntas.php?mn=4');
}

?>