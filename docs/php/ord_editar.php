<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['dia'];
$chk = $_POST['chk0'];

$resp = false;

$sql = "delete from det_diagnostico where id_diagnostico=".$idemp;
$bd->query($sql);

foreach ($chk as $valor) {
        $sql = "insert into det_diagnostico(id_diagnostico, id_sintoma) values('$idemp','$valor') ";
        $resp = $bd->query($sql);
}

if(!$resp){
    header('location:../diagnostico.php?mn=2');
}else{
    header('location:../diagnostico.php?mn=4');
}

?>