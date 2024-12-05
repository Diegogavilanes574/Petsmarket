<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];

$sql = "insert into sucursal(nombre, direccion, numero) 
        values('$nom', '$dir', '$tel') ";
$resp = $bd->query($sql);

 if(!$resp){
     header('location:../sucursal.php?mn=2');
 }else{
     header('location:../sucursal.php?mn=3');
 }

?>