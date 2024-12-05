<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$dir = $_POST['esp'];
$sto = $_POST['stock'];


$sql = "insert into insumo(nombre, id_tipoInsumo, stock) 
        values('$nom', '$dir', '$sto') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../insumo.php?mn=2');
 }else{
     header('location:../insumo.php?mn=3');
 }

?>