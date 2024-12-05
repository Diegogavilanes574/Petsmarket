<?php
    require '../phpqrcode/qrlib.php';
    $dir='../temp/'; 

   $codigo = $_GET['cod'];

    if (!file_exists($dir)) {
        mkdir($dir);
      
    }

    $filename= $dir.$codigo.'.png';
    $tamanio=5;
    $level='H';
    $frameSize=3;
    $contenido=$codigo;
    QRcode::png($contenido,$filename,$level, $tamanio, $frameSize);
    echo('<img class="text-md-right" src="temp/'.$filename.'"/>');
?>