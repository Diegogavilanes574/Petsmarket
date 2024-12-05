<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$fecha = date("Y/m/d H:i");

$a = '';
$idgr = $_GET['cod'];
$ff = $_GET['ff'];
$fi = $_GET['fi'];


$band =false;

$a = "<table class='table table-striped table-bordered' id='table1'>
                    <thead>
                        <tr >
                            <th style='background-color: #1d9aac;' class='text-white'>Estado</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Fecha</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Dueño</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Paciente</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Codigo QR</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Fecha de Resultados</th>
                            <th style='background-color: #1d9aac;' class='text-white'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>";

if($idgr>0) $consulta="select o.*, c.nombre cli, c.apellido clia, c.cedula clic, p.nombre pac from paciente p, cliente c, orden_examen o where p.estado=1 and c.id_cliente=p.id_cliente and o.id_paciente=p.id_paciente and o.id_paciente=".$idgr." and o.fecha>='".$fi." 00:00:00' and o.fecha<='".$ff." 23:59:59'";
else $consulta="select o.*, c.nombre cli, c.apellido clia, c.cedula clic, p.nombre pac from paciente p, cliente c, orden_examen o where p.estado=1 and c.id_cliente=p.id_cliente and o.id_paciente=p.id_paciente and o.fecha>='".$fi." 00:00:00' and o.fecha<='".$ff." 23:59:59'";

$resp = $bd->query($consulta);
while($row = $resp->fetch_array()){
    $noid = $row['id_paciente'];
    $fecha = $row['fecha'];
    $codigo = $row['codigo'];
    $fechaf = $row['fecha_final'];
    $band = $row['estado'];
    $id_ord = $row['id_orden'];

$a =$a."<tr>";

                           if($row['estado']==1){
                                $a=$a."<td><p class='btn btn-warning'> PENDIENTE </p></td>";
                            }else if ($row['estado']==2){
                               $a=$a."<td><p class='btn btn-success'> LISTO </p></td>";
                            }else{
                               $a=$a."<td><p class='btn btn-danger'><span class='text-danger'>z</span>ELIMINADO </p></td>";
                            }

                            $a=$a."<td>".$row['fecha']."</td>
                            <td>".$row['clic']."-".$row['cli']." ".$row['clia']."</td>
                            <td>".$row['pac']."</td>
                            <td>".$row['codigo']."</td>
                            <td>".$row['fecha_final']."</td>

                            <td>
                                <button type='button' class='btn btn-secondary' onclick='abrir_modal(".$id_ord.")'>Ver Exámenes</button>";
                                if($row['estado']!=0){
                                    $a=$a."<button type='button' class='btn btn-danger' onclick='eliminar(".$id_ord.", 0)'>Eliminar</button>";
                                }else{
                                    $a=$a."<button type='button' class='btn btn-info' onclick='eliminar(".$id_ord.", 1)'>Activar</button>";
                                }
                                if($row['estado']==1){
                                    $a=$a."<button type='button' class='btn btn-success' onclick='llenar(".$id_ord.")'>Llenar exámen</button>";
                                }
                                if($row['estado']==2){
                                    $a=$a."<button type='button' class='btn btn-light' onclick='imprimir(".$id_ord.")'>Imprimir</button>";
                                }
                            $a = $a."</td>
                        </tr>";


}




$a = $a.'</tbody>
                </table>';

echo $a;





?>