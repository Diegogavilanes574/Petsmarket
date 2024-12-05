<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_cli'];

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


$sql = "update cliente set nombre='$nom', correo='$cor', clave='$pas',
        cedula='$ced', direccion='$dir', telf='$tel', apellido='$ape', 
        nacionalidad='$nac', edad='$eda',
        sexo='$sex' where id_cliente=".$idemp;
$resp = $bd->query($sql);

if(!$resp){
    header('location:../cliente.php?mn=2');
}else{
    header('location:../cliente.php?mn=4');
}

?>