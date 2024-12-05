<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");

$a = '';
$idgr = $_GET['cod'];

$resp1 = "";
$resp2 = "";
$resp3 = "";
$resp4 = "";
$resp5 = "";

$consulta = "select * from paciente where id_paciente=".$idgr." and estado = 1 order by nombre";
$resp = $bd->query($consulta);
while($row = $resp->fetch_array()) {
    $resp1 = $row['sexo'];
    $resp2 = $row['fecha_nacimiento'];
    $resp3 = $row['id_raza'];
    $resp4 = $row['tamanio'];
    $resp5 = $row['peso'];
}

$data["resp"] = ["resp"=> [$resp1,$resp2,$resp3,$resp4,$resp5]];

print_r(json_encode($data));





?>