<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");

$a = '';
$idgr = $_GET['id_sin'];
$band =false;

$consulta = "select * from examen where estado = 1 order by nombre";
$resp = $bd->query($consulta);
while($row = $resp->fetch_array()){
    $noid = $row['id_examen'];
    $nombre = $row['nombre'];
    $signo = $row['codigo'];
    $band = false;
    $cons = "select * from det_grupo where id_grupo =".$idgr." and id_examen=".$noid ;
    $resp2 = $bd->query($cons);
    while($row2 = $resp2->fetch_array()) {
        $band = true;
    }

    if($band == true){
        $a = $a.'
         <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="checkbox" id="chk0[]" name="chk0[]" class="checkbox-inline" value="'.$noid.'" checked> ['.$signo.'] '.$nombre.'
                                                </div>
                                            </div>
';
    }else{
        $a = $a.'
         <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="checkbox" id="chk0[]" name="chk0[]" class="checkbox-inline" value="'.$noid.'"> ['.$signo.'] '.$nombre.'
                                                </div>
                                            </div>
';
    }

}


echo $a;





?>