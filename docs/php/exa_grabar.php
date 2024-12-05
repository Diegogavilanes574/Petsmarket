<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$dir = $_POST['cod'];
$vmi = $_POST['vmin'];
$vma = $_POST['vmax'];

$sql = "insert into examen(nombre, codigo,  valor_min, valor_max) 
        values('$nom', '$dir',  '$vmi', '$vma') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../examen.php?mn=2');
 }else{
     header('location:../examen.php?mn=3');
 }

?>