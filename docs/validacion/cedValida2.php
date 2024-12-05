<?php
session_start();
include("ValidarIdentificacion.php");

$vced = new ValidarIdentificacion();

$noid = $_POST['ced0'];



$val = $vced->validarCedula($noid);

if($val == false){
    echo 'cedula2';
}
else {
    echo 'todobien';
}


?>