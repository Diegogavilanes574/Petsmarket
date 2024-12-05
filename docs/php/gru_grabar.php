<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$tex = $_POST['tex'];
$nom = strtoupper($nom);

$sql = "insert into cab_grupo(nombre, id_tipoExamen) 
        values('$nom','$tex') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../grupo.php?mn=2');
 }else{
     header('location:../grupo.php?mn=3');
 }

?>