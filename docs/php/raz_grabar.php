<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$dir = $_POST['esp'];


$sql = "insert into raza(nombre, id_especie) 
        values('$nom', '$dir') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../raza.php?mn=2');
 }else{
     header('location:../raza.php?mn=3');
 }

?>