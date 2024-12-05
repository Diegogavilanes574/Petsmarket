<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$usuario = $_POST['username'];
$clave = $_POST['password'];
$bandera = false;
$sentencia = "select u.*, e.nombre as emple, e.apellido from usuario u
inner join empleado e ON u.id_empleado=e.id_empleado
where u.nombre='".$usuario."' and
u.clave='".$clave."' and u.estado=1";
$resp = $bd->query($sentencia);
while($fila = $resp->fetch_array()){
    $_SESSION['usuario'] = $fila['nombre'];
    $_SESSION['idusuario'] = $fila['id_usuario'];
    $_SESSION['rol'] = $fila['id_tipoUsuario'];
    $_SESSION['empleado'] = $fila['emple']." ".$fila['apellido'];
    $bandera = true;
}
if($bandera){
    header("location:../index.php");
}else{
    header("location:../../index.php?mn=1");
}

?>