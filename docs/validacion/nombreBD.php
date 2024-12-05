<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");
$val = false;
$tipo = $_GET['tipo'];
$ruc = $_GET['nom'];

if($tipo == "tus") $ruc = strtoupper($ruc);
else if ($tipo == "pre") $ruc = strtoupper($ruc);
else if ($tipo == "gru") $ruc = strtoupper($ruc);
else if ($tipo == "tin") $ruc = strtoupper($ruc);


$sqlpreg = '';
if ($tipo=="suc") $sqlpreg = "select * from sucursal where nombre='$ruc' and estado=1 ";
else if ($tipo=="usu") $sqlpreg = "select * from usuario where nombre='$ruc' and estado=1 ";
else if ($tipo=="raz") $sqlpreg = "select * from raza where nombre='$ruc' and estado=1 ";
else if ($tipo=="esp") $sqlpreg = "select * from especie where nombre='$ruc' and estado=1 ";
else if ($tipo=="exa") $sqlpreg = "select * from examen where nombre='$ruc' and estado=1 ";
else if ($tipo=="dia") $sqlpreg = "select * from cab_diagnostico where nombre='$ruc' and estado=1 ";
else if ($tipo=="tus") $sqlpreg = "select * from tipo_usuario where nombre='$ruc' and estado=1 ";
else if ($tipo=="tex") $sqlpreg = "select * from tipo_examen where nombre='$ruc' and estado=1 ";
else if ($tipo=="pre") $sqlpreg = "select * from cab_pregunta where nombre='$ruc' and estado=1 ";
else if ($tipo=="gru") $sqlpreg = "select * from cab_grupo where nombre='$ruc' and estado=1 ";
else if ($tipo=="tin") $sqlpreg = "select * from tipo_insumo where nombre='$ruc' and estado=1 ";
else if ($tipo=="ins") $sqlpreg = "select * from insumo where nombre='$ruc' and estado=1 ";

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