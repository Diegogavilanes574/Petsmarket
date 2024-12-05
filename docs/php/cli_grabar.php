<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$ced = $_POST['ced'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$ape = $_POST['ape'];
$eda = $_POST['eda'];
$pas = $_POST['pas'];
$sex = $_POST['sex'];
$cor = $_POST['cor'];
$nac = $_POST['nac'];


$empid = 0;


$sql = "insert into cliente(nombre, correo, cedula,
        direccion, telf, clave, edad, sexo, nacionalidad, apellido) 
        values('$nom','$cor','$ced', '$dir', '$tel', '$pas', '$eda', '$sex', '$nac', '$ape') ";

$resp = $bd->query($sql);

 if(!$resp){
     header('location:../cliente.php?mn=2');
 }else{
     header('location:../cliente.php?mn=3');
 }

?>