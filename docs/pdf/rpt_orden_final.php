<?php

include('../../base/conexion.php');
$bd = BD::connect();
require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

date_default_timezone_set("America/Guayaquil");

$fechaxf = date("YmdHis");




$ord= $_GET['orden'];
$nombisins = "";

$sql="SELECT * FROM orden_examen WHERE estado>0 and id_orden=".$ord;
$result = $bd->query($sql);
if($result) {
    while ($row = $result->fetch_array()){
        $codigo = $row['codigo'];
        $idpaci = $row['id_paciente'];
        $fechaEx = $row['fecha'];
        $fechaFi = $row['fecha_final'];

    }

}

$query="select p.*, CONCAT(d.cedula,' - ', d.nombre,' ',d.apellido) nom, d.direccion, d.telf, d.correo from paciente p, cliente d where p.estado=1 and p.id_cliente=d.id_cliente and p.id_paciente=".$idpaci;
$resultado = $bd->query($query);
while($fila = $resultado->fetch_array()){
    $cliente = $fila['nom'];
    $telf = $fila['telf'];
    $dire = $fila['direccion'];
    $corre = $fila['correo'];
    $nomPac = $fila['nombre'];
    $idRaz = $fila['id_raza'];
    $fecNac = $fila['fecha_nacimiento'];
    $pes = $fila['peso'];
    $sexo = $fila['sexo'];
    $tama = $fila['tamanio'];
}


$nombrepdf= $codigo.".pdf";
$nombrecodigo = $codigo.".png";

$query="select r.*, e.nombre esp from raza r, especie e where r.estado=1 and r.id_especie=e.id_especie  and r.id_raza=".$idRaz;
$resultado = $bd->query($query);
while($fila = $resultado->fetch_array()){
    $razin = $fila['nombre'].' - '.$fila['esp'];
}

if($resultado){
    ob_start();
    require_once './plantilla/plantillaExamen.php';
    $html = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es', $unicode = true, 'UTF-8', array(12, 10, 12, 12));
    $html2pdf->writeHTML($html);
    $result = $html2pdf->output($nombrepdf);
    return $result;
}
