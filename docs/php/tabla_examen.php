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
<div class="col-md-12">
<table class="table table-striped table-bordered" id="table3" width="900px">
                                    <thead>
                                    <tr >
                                        <th class="text-white bg-secondary" width="50%">Grupo</th>
                                        <th class="text-white bg-secondary" width="10%">Código</th>
                                        <th class="text-white bg-secondary" width="40%">Exámen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
';

                                    $query="select d.*, e.nombre ex, e.codigo, g.nombre gr from det_ordenexamen d, examen e, cab_grupo g where e.estado=1 and d.id_examen=e.id_examen and g.id_grupo=d.id_grupo and d.id_orden=".$idgr;
                                    $resultado = $bd->query($query);
                                    while($fila = $resultado->fetch_array()) {

                                        $a = $a . '                                        <tr>
                                            <td>' . $fila['gr'] . '</td>
                                            <td>' . $fila['codigo'] . '</td>
                                            <td>' . $fila['ex'] . '</td>
                                            </tr>';
                                    }
$a = $a.'</tbody>
</table> </div>
';

echo $a;





?>