<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_SESSION['idusuario'];
$passA = $_POST['passAnt'];
$passN = $_POST['passNuev'];

$val = false;
$sql = "select * from usuario where clave='$passA' and id_usuario=".$idemp;
$resp = $bd->query($sql);
while($fila = $resp->fetch_array()){
	$val = true;
}


if ($val) {
	$sql2 = "update usuario set clave='$passN' where id_usuario=".$idemp;
	$bd->query($sql2);
    header('location:../cambiar_clave.php?mn=2');
}else{
    header('location:../cambiar_clave.php?mn=4');
}

?>