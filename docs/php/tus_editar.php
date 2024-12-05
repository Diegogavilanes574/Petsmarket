<?php
session_start();
include ("../../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");


$idemp = $_POST['id_tus'];
$nom = $_POST['nom'];

$o1 = $o2 = $o3 = $o4 =$o5 =$o6 =$o7 =$o8 =$o9 =$o10 =$o11 =$o12 =$o13 =$o14=$o15 =$o16 =$o17=0;

if(isset($_POST['op1'])) $o1 = 1;
if(isset($_POST['op2'])) $o2 = 1;
if(isset($_POST['op3'])) $o3 = 1;
if(isset($_POST['op4'])) $o4 = 1;
if(isset($_POST['op5'])) $o5 = 1;
if(isset($_POST['op6'])) $o6 = 1;
if(isset($_POST['op7'])) $o7 = 1;
if(isset($_POST['op8'])) $o8 = 1;
if(isset($_POST['op9'])) $o9 = 1;
if(isset($_POST['op10'])) $o10 = 1;
if(isset($_POST['op11'])) $o11 = 1;
if(isset($_POST['op12'])) $o12 = 1;
if(isset($_POST['op13'])) $o13 = 1;
if(isset($_POST['op14'])) $o14 = 1;
if(isset($_POST['op15'])) $o15 = 1;
if(isset($_POST['op16'])) $o16 = 1;
if(isset($_POST['op17'])) $o17 = 1;



$sql2 = "update tipo_usuario set nombre='$nom', op01='$o1', op02='$o2', op03='$o3', op04='$o4', op05='$o5', op06='$o6', op07='$o7',
                     op08='$o8', op09='$o9', op10='$o10', op11='$o11', op12='$o12', op13='$o13', op14='$o14', op15='$o15', op16='$o16', op17='$o17' where id_tipoUsuario=".$idemp;

$resp = $bd->query($sql2);

if(!$resp){
    header('location:../tipo_usuario.php?mn=2');
}else{
    header('location:../tipo_usuario.php?mn=4');
}


?>