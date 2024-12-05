<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_tex'];
$nom = $_POST['nom'];


$sql2 = "update tipo_examen set nombre='$nom' where id_tipoExamen=".$idemp;
$resp = $bd->query($sql2);

if(!$resp){
    header('location:../tipo_examen.php?mn=2');
}else{
    header('location:../tipo_examen.php?mn=4');
}

?>