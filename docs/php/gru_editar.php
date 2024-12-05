<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['dia'];
$chk = $_POST['chk0'];


$resp = false;

$sql = "delete from det_grupo where id_grupo=".$idemp;
$bd->query($sql);

foreach ($chk as $valor) {
        $sql = "insert into det_grupo(id_grupo, id_examen) values('$idemp','$valor') ";
        $resp = $bd->query($sql);
}

if(!$resp){
    header('location:../grupo.php?mn=2');
}else{
    header('location:../grupo.php?mn=4');
}

?>