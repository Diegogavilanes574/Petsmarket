<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");
$val = false;

$tipo = $_GET['tipo'];
$ruc = $_GET['nom'];
$idreg = $_GET['idreg'];

if($tipo == "tus") $ruc = strtoupper($ruc);
else if ($tipo == "pre") $ruc = strtoupper($ruc);
else if ($tipo == "gru") $ruc = strtoupper($ruc);
else if ($tipo == "tin") $ruc = strtoupper($ruc);

$sqlpreg = "";

if ($tipo=="suc") $sqlpreg = "select * from sucursal where nombre='$ruc' and estado>0 and id_sucursal<>".$idreg;
else if ($tipo=="usu") $sqlpreg = "select * from usuario where nombre='$ruc' and estado>0 and id_usuario<>".$idreg;
else if ($tipo=="raz") $sqlpreg = "select * from raza where nombre='$ruc' and estado>0 and id_raza<>".$idreg;
else if ($tipo=="esp") $sqlpreg = "select * from especie where nombre='$ruc' and estado>0 and id_especie<>".$idreg;
else if ($tipo=="exa") $sqlpreg = "select * from examen where nombre='$ruc' and estado>0 and id_examen<>".$idreg;
else if ($tipo=="dia") $sqlpreg = "select * from cab_diagnostico where nombre='$ruc' and estado>0 and id_diagnostico<>".$idreg;
else if ($tipo=="tus") $sqlpreg = "select * from tipo_usuario where nombre='$ruc' and estado>0 and id_tipoUsuario<>".$idreg;
else if ($tipo=="tex") $sqlpreg = "select * from tipo_examen where nombre='$ruc' and estado>0 and id_tipoExamen<>".$idreg;
else if ($tipo=="pre") $sqlpreg = "select * from cab_pregunta where nombre='$ruc' and estado>0 and id_pregunta<>".$idreg;
else if ($tipo=="gru") $sqlpreg = "select * from cab_grupo where nombre='$ruc' and estado>0 and id_grupo<>".$idreg;
else if ($tipo=="tin") $sqlpreg = "select * from tipo_insumo where nombre='$ruc' and estado>0 and id_tipoInsumo<>".$idreg;
else if ($tipo=="ins") $sqlpreg = "select * from insumo where nombre='$ruc' and estado>0 and id_insumo<>".$idreg;


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