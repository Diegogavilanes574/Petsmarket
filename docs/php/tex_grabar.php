<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];


$sql = "insert into tipo_examen(nombre) 
        values('$nom') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../tipo_examen.php?mn=2');
 }else{
     header('location:../tipo_examen.php?mn=3');
 }

?>