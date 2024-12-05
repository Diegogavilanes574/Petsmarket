<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$idemp = $_POST['id_ordis'];
$chk = $_POST['op'];
$chk1 = $_POST['op1'];

$ind = 0;

$resp = false;

$array_num = count($chk);
for ($i = 0; $i < $array_num; ++$i){

    $query="select * from examen where id_examen=".$chk1[$i];
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()) {
        $rgmin = $fila['valor_min'];
        $rgmax = $fila['valor_max'];
    }

    $ind = 0;
    if(floatval($chk[$i])<floatval($rgmin) || floatval($chk[$i])>floatval($rgmax)) $ind=1;
    $sql = "update det_ordenexamen set valor='".$chk[$i]."', indicador=".$ind." where id_examen=".$chk1[$i]." and id_orden=".$idemp;
    $resp = $bd->query($sql);
}

if(!$resp){
    header('location:../rpt_orden_examen.php?mn=2');
}else{
    header('location:../rpt_orden_examen.php?mn=4');
}

?>