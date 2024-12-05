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
$usu = $_POST['usu'];
$sex = $_POST['sex'];
$cor = $_POST['cor'];
$tus = $_POST['tus'];
$nac = $_POST['nac'];
$suc = $_POST['suc'];

$empid = 0;


$sql = "insert into empleado(nombre, correo, cedula,
        direccion, telf, id_sucursal, edad, sexo, nacionalidad, apellido) 
        values('$nom','$cor','$ced', '$dir', '$tel', '$suc', '$eda', '$sex', '$nac',
        '$ape') ";
$bd->query($sql);



$sql3 = "select * from empleado where estado=1 
        order by id_empleado DESC LIMIT 1";
$resp = $bd->query($sql3);
while($fila = $resp->fetch_array()){
    $empid = $fila['id_empleado'];
}

$sql2 = "insert into usuario(nombre, clave, id_tipoUsuario, id_empleado) 
        values('$usu','$pas', '$tus', '$empid')";
$resp = $bd->query($sql2);

 if(!$resp){
     header('location:../empleado.php?mn=2');
 }else{
     header('location:../empleado.php?mn=3');
 }

?>