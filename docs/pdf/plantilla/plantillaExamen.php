<?php
date_default_timezone_set('America/Guayaquil');

?>




<page  backbottom="30mm" footer="page" style="padding:0px">


        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="../assets/css/app.css">




    <div style="margin-left:auto; margin-right:auto;">
        <table style="margin:0px 5px 0px 20px;" border="0">
            <tr>
                <td style="width: 600px;padding: 5px;" align="center"><img height="200" src="logoRF.png" alt=""></td>
            </tr>
        </table>

        <?PHP
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $anio = date('Y');
        $mes = date('m');
        $dia = date('d');
        $mes = (int) $mes;
        $fecha = "Guayaquil, $dia de " . $meses[$mes - 1] . " del $anio";
        ?>

        <div><h3 style="text-align: center; color: #04004c;">EXAMEN DE LABORATORIO </h3></div>
        <div style="padding-top:-25px "><h3 style="text-align: center; color: #04004c;">PET'S MARKET </h3></div>


        <table style="margin:0px 5px 0px 50px;" border="0">
            <tr>
                <td style="width: 250px;padding: 5px;" align="left"><img height="150" src="../temp/<?php echo $nombrecodigo; ?>" alt=""></td>
                <td style="width: 250px;padding: 5px;" align="right" ><br/><br/><br/><br/><br/><span><?php echo $fecha ?></span></td>
            </tr>
        </table>


        <table align="center" width="600px" style="margin:0px 5px 0px 7px !important;border-color: #dfdfdf;" border="1">
            <tr style="font-size: 11px;" >
                <td style="background-color: #f06e57;width:100px;padding: 5px">Dueño:</td>
                <td  style="width:200px;padding: 5px"><?php echo $cliente; ?></td>
                <td style="background-color: #f06e57;width:100px;padding: 5px">Dirección:</td>
                <td style="width:200px;padding: 5px"><?php echo $dire; ?></td>
            </tr>
            <tr style="font-size: 11px;" >
                <td style="background-color: #f06e57;width:100px;padding: 5px">Teléfono:</td>
                <td  style="width:200px;padding: 5px"><?php echo $telf; ?></td>
                <td style="background-color: #f06e57;width:100px;padding: 5px">Correo:</td>
                <td style="width:200px;padding: 5px"><?php echo $corre; ?></td>
            </tr>
        </table>


        <table align="center" width="600px" style="margin:0px 5px 0px 7px !important;border-color: #dfdfdf;" border="1">
            <tr style="font-size: 11px;" >
                <td style="background-color: #f06e57;width:50px;padding: 5px">Paciente:</td>
                <td  style="width:150px;padding: 5px"><?php echo $nomPac; ?></td>
                <td style="background-color: #f06e57;width:50px;padding: 5px">Peso:</td>
                <td style="width:125px;padding: 5px"><?php echo $pes; ?></td>
                <td style="background-color: #f06e57;width:50px;padding: 5px">Tamaño:</td>
                <td style="width:125px;padding: 5px"><?php echo $tama; ?></td>
            </tr>
            <tr style="font-size: 11px;" >
                <td style="background-color: #f06e57;width:50px;padding: 5px">Raza:</td>
                <td  style="width:150px;padding: 5px"><?php echo $razin; ?></td>
                <td style="background-color: #f06e57;width:50px;padding: 5px">Fecha/Nac:</td>
                <td style="width:125px;padding: 5px"><?php echo $fecNac; ?></td>
                <td style="background-color: #f06e57;width:50px;padding: 5px">Sexo:</td>
                <td style="width:125px;padding: 5px"><?php echo $sexo; ?></td>
            </tr>
        </table>

        <br /><br />

            <div style="background-color:#ff9900 "><h3 style="text-align: center; color: #000000;">EXAMENES </h3></div>

        <br />
        <table align="center" width="600px" style="margin:0px 5px 0px 7px !important;border-color: #dfdfdf;" border="1">

            <?php
            $exam = '';
            $c=0;
            $query="SELECT DISTINCT(id_examen), valor, indicador FROM det_ordenexamen WHERE id_orden=".$ord;
            $resultado = $bd->query($query);
            while($fila = $resultado->fetch_array()):
                $query2="Select * from examen where estado=1 and id_examen=".$fila['id_examen'];
                $resultado2 = $bd->query($query2);
                while ($row = $resultado2->fetch_array()):
                    $nombis = $row['nombre'];
                    $valis = $fila['valor'];
                    $vmin = $row['valor_min'];
                    $vmax = $row['valor_max'];
                    $ind = $fila['indicador'];

                    $c++;
                    $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                    ?>
                    <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                        <td style="padding: 5px;"><?=$nombis?></td>
                        <td style="padding: 5px;"><b><?=$valis?></b></td>
                        <?php if($ind==1){ ?> <td style="padding: 5px;">*</td>
                        <?php }else{ ?> <td style="padding: 5px;">&nbsp;</td>
                        <?php } ?>
                        <td  style="padding: 5px;">Rango: <?=$vmin?>-<?=$vmax?></td>
                    </tr>
                <?php endwhile;
                endwhile; ?>

        </table>

    </div>
</page>

