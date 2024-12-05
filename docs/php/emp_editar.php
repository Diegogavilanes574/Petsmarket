<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_emple'];
$usid = $_POST['id_usu'];

$nom = $_POST['nom'];
$ced = $_POST['ced'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$ape = $_POST['ape'];
$eda = $_POST['eda'];
$pas = $_POST['pas'];
$usu = $_POST['usu'];
$sex = $_POST['sex'];
$cor = $_POST['cor'];
$tus = $_POST['tus'];
$nac = $_POST['nac'];
$suc = $_POST['suc'];

$sql2 = "update usuario set nombre='$usu', clave='$pas', id_tipoUsuario='$tus' where id_usuario=".$usid;
$bd->query($sql2);

$sql = "update empleado set nombre='$nom', correo='$cor', 
        cedula='$ced', direccion='$dir', telf='$tel', apellido='$ape', 
        nacionalidad='$nac', edad='$eda', id_sucursal='$suc',
        sexo='$sex' where id_empleado=".$idemp;
$resp = $bd->query($sql);

if(!$resp){
    header('location:../empleado.php?mn=2');
}else{
    header('location:../empleado.php?mn=4');
}

?>