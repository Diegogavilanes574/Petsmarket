<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");
$val = false;

$ruc = $_GET['ced'];
$idreg = $_GET['idreg'];

$sqlpreg = "select * from cliente where cedula='$ruc' and estado>0 and id_cliente<>".$idreg;


$resp = $bd->query($sqlpreg);
while($fila = $resp->fetch_array()){
    $val = true;
}

if($val == false){
    echo 'no';
}
else {
    echo 'si';
}
?>