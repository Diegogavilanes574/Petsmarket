<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Market Lab</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logoRF.png" type="image/x-icon">
</head>
<body>
    <div id="app">
        <?php include("sidebar.php"); ?>
        <div id="main">
            <?php include("menu.php"); ?>


            <?php
            $clientes = $pacientes = $ordenhoy = $ordenmes = 0;
            $query="select count(id_cliente) cli from cliente where estado=1";
            $resultado = $bd->query($query);
            while($fila = $resultado->fetch_array()){
                $clientes = $fila['cli'];
            }

            $query="select count(id_paciente) cli from paciente where estado=1";
            $resultado = $bd->query($query);
            while($fila = $resultado->fetch_array()){
                $pacientes = $fila['cli'];
            }

            $query="select count(id_orden) cli from orden_examen where estado=1 and fecha='".date('Y-m-d')."'";
            $resultado = $bd->query($query);
            while($fila = $resultado->fetch_array()){
                $ordenhoy = $fila['cli'];
            }

            $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=".date('m');
            $resultado = $bd->query($query);
            while($fila = $resultado->fetch_array()){
                $ordenmes = $fila['cli'];
            }

            ?>
            
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">Estadísticas del laboratorio de veterinaria</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>CLIENTES</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php echo $clientes; ?> </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>PACIENTES</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php echo $pacientes; ?></p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas2" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>ORDENES DE EXAMEN HOY</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php echo $ordenhoy; ?></p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>ORDENES DE EXAMEN MENSUAL</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p><?php echo $ordenmes; ?> </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas4" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-heading p-1 pl-3'>Ordenes de Examenes</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="pl-3">
                                    <h1 class='mt-5'>Este mes: <?php echo $ordenmes; ?> </h1>

                                    <div class="legends">
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-grey mr-2'></div><span class='text-xs'>Enero</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-red mr-2'></div><span class='text-xs'>Febrero</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-green mr-2'></div><span class='text-xs'>Marzo</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-orange mr-2'></div><span class='text-xs'>Abril</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-purple mr-2'></div><span class='text-xs'>Mayo</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-yellow mr-2'></div><span class='text-xs'>Junio</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-green mr-2'></div><span class='text-xs'>Julio</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-grey mr-2'></div><span class='text-xs'>Agosto</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-red mr-2'></div><span class='text-xs'>Septiembre</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-blue mr-2'></div><span class='text-xs'>Octubre</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-info mr-2'></div><span class='text-xs'>Noviembre</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-purple mr-2'></div><span class='text-xs'>Diciembre</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <canvas id="barEx"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>

            <?php include("footer.php") ?>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>

    <?php
    $en = $fe = $ma = $ab = $my = $jn = $jl = $ag = $sp = $oc = $nv = $dc = 0;

    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=1";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $en = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=2";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $fe = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=3";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $ma = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=4";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $ab = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=5";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $my = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=6";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $jn = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=7";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $jl = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=8";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $ag = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=9";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $sp = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=10";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $oc = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=11";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $nv = $fila['cli'];
    }
    $query="select count(id_orden) cli from orden_examen where estado=1 and month(fecha)=12";
    $resultado = $bd->query($query);
    while($fila = $resultado->fetch_array()){
        $dc = $fila['cli'];
    }

    ?>


    <script>
        var ctxBar = document.getElementById("barEx").getContext("2d");
        var myBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                datasets: [{
                    label: 'Ordenes de exámen',
                    backgroundColor: [chartColors.grey, chartColors.red, chartColors.green, chartColors.orange, chartColors.purple, chartColors.yellow, chartColors.green, chartColors.grey, chartColors.red,chartColors.blue, chartColors.info, chartColors.purple],
                    data: [
                        <?= $en; ?>,
                        <?= $fe; ?>,
                        <?= $ma; ?>,
                        <?= $ab; ?>,
                        <?= $my; ?>,
                        <?= $jn; ?>,
                        <?= $jl; ?>,
                        <?= $ag; ?>,
                        <?= $sp; ?>,
                        <?= $oc; ?>,
                        <?= $nv; ?>,
                        <?= $dc; ?>
                    ]
                }]
            },
            options: {
                responsive: true,
                barRoundness: 1,
                title: {
                    display: false,
                    text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
                },
                legend: {
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 30 + 10,
                            padding: 10,
                        },
                        gridLines: {
                            drawBorder: false,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display:false,
                            drawBorder: false
                        }
                    }]
                }
            }
        });

    </script>


</body>
</html>
