<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$nom = $_POST['nom'];
$nom = strtoupper($nom);

$sinto = explode(",", $nom);
foreach ($sinto as $valor) {
    $valor = trim($valor);
    $bandera = false;
    $sentencia = "select * from sintoma where nombre='$valor' and estado=1";
    $resp = $bd->query($sentencia);
    while($fila = $resp->fetch_array()){
        $bandera = true;
    }
    if (!$bandera) {
        $sql = "insert into sintoma(nombre) values('$valor') ";
        $resp = $bd->query($sql);
    }
}




 if(!$resp){
     header('location:../diagnostico.php?mn=2');
 }else{
     header('location:../diagnostico.php?mn=5');
 }

?>