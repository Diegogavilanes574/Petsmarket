<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");

$a = '';
$idgr = $_GET['cod'];
$band =false;


$a = $a.'
<select id="masc" name="masc" class="form-select" onchange="poner_mascota()"><option value="0">--SELECCIONAR UNA OPCION--</option>
';

$consulta = "select * from paciente where id_cliente=".$idgr." and estado = 1 order by nombre";
$resp = $bd->query($consulta);
while($row = $resp->fetch_array()) {
    $noid = $row['id_paciente'];
    $nombre = $row['nombre'];

    $a = $a . '
         <option value="'.$noid.'">'.$nombre.'</option>
';

}

$a = $a.'
</select>
';


echo $a;





?>