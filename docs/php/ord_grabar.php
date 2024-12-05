<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");
$fecha = date('Y-m-d H:i');


$nom = $_POST['masc'];
$fecfin = $_POST['fechaR'];
$codi = $_POST['codqr'];
$chk = $_POST['op'];

$ordid = 0;

$sql = "insert into orden_examen(id_paciente,fecha,codigo,fecha_final) 
        values('$nom','$fecha','$codi','$fecfin') ";
$bd->query($sql);

$sql3 = "select * from orden_examen where estado=1 
        order by id_orden DESC LIMIT 1";
$resp = $bd->query($sql3);
while($fila = $resp->fetch_array()){
    $ordid = $fila['id_orden'];
}


$sql = "delete from det_ordenexamen where id_orden=".$ordid;
$bd->query($sql);

foreach ($chk as $valor) {

    $sql3 = "select * from det_grupo where estado=1 and id_grupo=".$valor;
    $resp = $bd->query($sql3);
    while($fila = $resp->fetch_array()){
        $exis = $fila['id_examen'];
        $sql5 = "insert into det_ordenexamen(id_orden, id_examen, id_grupo, valor, indicador) values('$ordid','$exis','$valor', 0, 0) ";

        $resp5 = $bd->query($sql5);
    }


}


 if(!$resp5){
     header('location:../orden_examen.php?mn=2');
 }else{
     header('location:../orden_examen.php?mn=3');
 }

?>