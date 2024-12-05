<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idemp = $_POST['id_pac'];

$nom = $_POST['nom'];
$cli = $_POST['cli'];
$pes = $_POST['pes'];
$tam = $_POST['tam'];
$raz = $_POST['raz'];
$eda = $_POST['eda'];
$fnac = $_POST['fnac'];
$sex = $_POST['sex'];

$sql = "update paciente set nombre='$nom', edad='$eda', peso='$pes',
        fecha_nacimiento='$fnac', tamanio='$tam', id_raza='$raz', id_cliente='$cli', 
        id_raza='$raz' where id_paciente=".$idemp;
$resp = $bd->query($sql);

if(!$resp){
    header('location:../paciente.php?mn=2');
}else{
    header('location:../paciente.php?mn=4');
}

?>