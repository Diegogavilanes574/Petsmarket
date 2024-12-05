<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$nom = strtoupper($nom);

$sql = "insert into cab_pregunta(nombre) 
        values('$nom') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../preguntas.php?mn=2');
 }else{
     header('location:../preguntas.php?mn=3');
 }

?>