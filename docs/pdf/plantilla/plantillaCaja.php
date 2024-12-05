<?php
date_default_timezone_set('America/Guayaquil');

?>
<page  backbottom="30mm" footer="page" style="padding:0px">

    <div style="margin-left:auto; margin-right:auto;">
        <table style="margin:0px 5px 0px 50px;" border="0">
            <tr>
                <td style="width: 500px;padding: 5px;" align="center"><img height="100" src="https://banaportiec.com/image/logopr.png" alt=""></td>
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

        <div><h3 style="text-align: center; color: #04004c;">TRAZABILIDAD DEL MES DE <?php echo strtoupper($meses[$mesi-1]); ?> </h3></div>
        <div style="padding-top:-25px "><h3 style="text-align: center; color: #04004c;">INSUMO: <?php echo strtoupper($nombisins); ?> </h3></div>

        <div>
            <span><?php echo $fecha ?></span>
        </div>
        <br><br><br>

        <table style="margin:0px 5px 0px 7px !important;border-collapse: collapse;border-color: #dfdfdf;" border="1">
            <thead>
            <tr style="background-color: #f06e57;font-size: 11px;" >
                <th style="padding: 5px">Tipo de Insumo</th>
                <th style="padding: 5px">Nombre del insumo</th>
                <th style="padding: 5px">Stock actual</th>
                <th style="padding: 5px">Unidad</th>
                <th style="padding: 5px">Fecha de Ingreso</th>
            </tr>
            </thead>
            <tbody style="text-align:center">
            <?php
            $c=0;
            $totalPagar = 0;
            while ($row = $result->fetch_array()):
                $tipos = "MATERIAL DE EMPAQUE";
                $nombis = $row['nombre'];
                $apellis = $row['stock'];
                $cedis = $row['marca'];
                $direc = $row['ratio'];

                $c++;
                $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                ?>
                <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                    <td style="padding: 5px;"><?=$tipos?></td>
                    <td style="padding: 5px;"><?=$nombis?></td>
                    <td  style="padding: 5px;"><?=$apellis?></td>
                    <td style="padding: 5px;"><?=$cedis?></td>
                    <td style="padding: 5px;"><?=$direc?></td>

                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        <br />
        <br />

        <div style="padding-top:-25px "><h4 style="text-align: center; color: #04004c;">ORDENES DE PEDIDO DE : <?php echo strtoupper($nombisins); ?> </h4></div>

        <table style="margin:0px 5px 0px 7px !important;border-collapse: collapse;border-color: #dfdfdf;" border="1">
            <thead>
            <tr style="background-color: #168c00;font-size: 11px;color:white;" >
                <th style="padding: 5px">No. de Orden</th>
                <th style="padding: 5px">Fecha de Orden</th>
                <th style="padding: 5px">Proveedor</th>
                <th style="padding: 5px">Personal que entregó</th>
                <th style="padding: 5px">Personal que recibió</th>
                <th style="padding: 5px">Cantidad</th>
            </tr>
            </thead>
            <tbody style="text-align:center">
            <?php
            $sql3="SELECT d.*, p.rsocial, p.ruc, c.fecha as forden, c.entreg, e.nombre as enc, e.cedula as cedenc, b.nombre as bod  FROM det_compra d, proveedor p, compra c, empleado e, bodega b  
                    WHERE d.com_id=c.com_id and d.ins_id=".$idins." and d.cant_nrec=1 and c.bod_id=b.bod_id and c.prv_id=p.prv_id and  c.emp_id=e.emp_id and month(c.fecha)=".$mesi;
            $result3 = $db->query($sql3);
            while ($row3 = $result3->fetch_array()):
                $noors = $row3['com_id'];
                $ford = $row3['forden'];
                $tipos = $row3['rsocial'];
                $nombis = $row3['entreg'];
                $apellis = $row3['enc'];
                $direc = $row3['cantidad'];

                $c++;
                $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                ?>
                <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                    <td style="padding: 5px;"><?=$noors?></td>
                    <td style="padding: 5px;"><?=$ford?></td>
                    <td style="padding: 5px;"><?=$tipos?></td>
                    <td style="padding: 5px;"><?=$nombis?></td>
                    <td  style="padding: 5px;"><?=$apellis?></td>
                    <td style="padding: 5px;"><?=$direc?></td>

                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        <br/><br/>

        <?php if($tipiux==2){ ?>

            <div style="padding-top:-25px "><h4 style="text-align: center; color: #04004c;">LAVADO EN TINA DE : <?php echo strtoupper($nombisins); ?> </h4></div>
            <table style="margin:0px 5px 0px 7px !important;border-collapse: collapse;border-color: #dfdfdf;" border="1">
                <thead>
                <tr style="background-color: #3F97EB;font-size: 11px;color:white;" >
                    <th style="padding: 5px">No. de Lavado</th>
                    <th style="padding: 5px">Fecha de Lavado</th>
                    <th style="padding: 5px">Lote</th>
                    <th style="padding: 5px">Encargado</th>
                    <th style="padding: 5px">Cantidad</th>
                </tr>
                </thead>
                <tbody style="text-align:center">
                <?php
                $sql3="SELECT d.*, e.nombre as enc, e.cedula as cedenc, l.nombre as lot, c.fecha as forden  FROM deta_lavado d, lavado c, empleado e, lote l  
                    WHERE d.lav_id=c.lavado_id and d.ins_id=".$idins." and c.lot_id=l.lot_id and c.emp_id=e.emp_id and month(c.fecha)=".$mesi;
                $result3 = $db->query($sql3);
                while ($row3 = $result3->fetch_array()):
                    $noors = $row3['lav_id'];
                    $ford = $row3['forden'];
                    $tipos = $row3['lot'];
                    $nombis = $row3['enc'];
                    $direc = $row3['cantidad'];

                    $c++;
                    $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                    ?>
                    <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                        <td style="padding: 5px;"><?=$noors?></td>
                        <td style="padding: 5px;"><?=$ford?></td>
                        <td style="padding: 5px;"><?=$tipos?></td>
                        <td style="padding: 5px;"><?=$nombis?></td>
                        <td style="padding: 5px;"><?=$direc?></td>

                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <br/><br/>

            <div style="padding-top:-25px "><h4 style="text-align: center; color: #04004c;">TRATAMIENTO QUÍMICO DE : <?php echo strtoupper($nombisins); ?> </h4></div>
            <table style="margin:0px 5px 0px 7px !important;border-collapse: collapse;border-color: #dfdfdf;" border="1">
                <thead>
                <tr style="background-color: #3F97EB;font-size: 11px;color:white;" >
                    <th style="padding: 5px">No. de Tratamiento Químico</th>
                    <th style="padding: 5px">Fecha de Tratamiento</th>
                    <th style="padding: 5px">Lote</th>
                    <th style="padding: 5px">Encargado</th>
                    <th style="padding: 5px">Cantidad</th>
                </tr>
                </thead>
                <tbody style="text-align:center">
                <?php
                $sql3="SELECT d.*, e.nombre as enc, e.cedula as cedenc, l.nombre as lot, c.fecha as forden  FROM deta_trat_quimico d, tratamiento_quimico c, empleado e, lote l  
                    WHERE d.id_trata_quimico=c.id_trata_quimico and d.ins_id=".$idins." and c.lot_id=l.lot_id and c.emp_id=e.emp_id and month(c.fecha)=".$mesi;
                $result3 = $db->query($sql3);
                while ($row3 = $result3->fetch_array()):
                    $noors = $row3['id_trata_quimico'];
                    $ford = $row3['forden'];
                    $tipos = $row3['lot'];
                    $nombis = $row3['enc'];
                    $direc = $row3['cantidad'];

                    $c++;
                    $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                    ?>
                    <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                        <td style="padding: 5px;"><?=$noors?></td>
                        <td style="padding: 5px;"><?=$ford?></td>
                        <td style="padding: 5px;"><?=$tipos?></td>
                        <td style="padding: 5px;"><?=$nombis?></td>
                        <td style="padding: 5px;"><?=$direc?></td>

                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>


        <?php }else{

            $multipli = 1;
            ?>

            <div style="padding-top:-25px "><h4 style="text-align: center; color: #04004c;">EMPAQUE DE : <?php echo strtoupper($nombisins); ?> </h4></div>
            <table style="margin:0px 5px 0px 7px !important;border-collapse: collapse;border-color: #dfdfdf;" border="1">
                <thead>
                <tr style="background-color: #3F97EB;font-size: 11px;color:white;" >
                    <th style="padding: 5px">No. de Empaque</th>
                    <th style="padding: 5px">Fecha de Empque</th>
                    <th style="padding: 5px">Tipo de Caja</th>
                    <th style="padding: 5px">Encargado</th>
                    <th style="padding: 5px">Lote</th>
                    <th style="padding: 5px">Cantidad</th>
                </tr>
                </thead>
                <tbody style="text-align:center">
                <?php
                $sql3="SELECT d.*, e.nombre as enc, e.cedula as cedenc, l.nombre as lot, c.fecha as forden, caj.nombre as cajx  FROM deta_empaque d, empaque c, empleado e, lote l, caja caj  
                    WHERE d.emq_id=c.emq_id and d.lot_id=l.lot_id and caj.caja_id=c.caja_id and c.emp_id=e.emp_id and month(c.fecha)=".$mesi." order by c.fecha";
                $result3 = $db->query($sql3);
                while ($row3 = $result3->fetch_array()):
                    $noors = $row3['emq_id'];
                    $ford = $row3['forden'];
                    $tipos = $row3['cajx'];
                    $nombis = $row3['enc'];
                    $lotcj = $row3['lot'];
                    $direc = $row3['cantidad']*$multipli;

                    $c++;
                    $fondo= $c % 2 == 0 ? "#ffffff":"#dfdfdf";
                    ?>
                    <tr style="text-align: center;background-color: <?=$fondo?>;font-size: 11px;">
                        <td style="padding: 5px;"><?=$noors?></td>
                        <td style="padding: 5px;"><?=$ford?></td>
                        <td style="padding: 5px;"><?=$tipos?></td>
                        <td style="padding: 5px;"><?=$nombis?></td>
                        <td  style="padding: 5px;"><?=$lotcj?></td>
                        <td style="padding: 5px;"><?=$direc?></td>

                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>





        <?php } ?>
    </div>
</page>