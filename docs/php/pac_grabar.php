<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$cli = $_POST['cli'];
$pes = $_POST['pes'];
$tam = $_POST['tam'];
$raz = $_POST['raz'];
$eda = $_POST['eda'];
$fnac = $_POST['fnac'];
$sex = $_POST['sex'];

$empid = 0;

$sql = "insert into paciente(nombre, id_raza, id_cliente,
        peso, tamanio, edad, sexo, fecha_nacimiento) 
        values('$nom','$raz','$cli', '$pes', '$tam', '$eda', '$sex', '$fnac') ";

$resp = $bd->query($sql);

 if(!$resp){
     header('location:../paciente.php?mn=2');
 }else{
     header('location:../paciente.php?mn=3');
 }

?>