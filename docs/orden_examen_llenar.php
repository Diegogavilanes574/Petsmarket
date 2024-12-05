<?php session_start();

$idx = $_GET['valor'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Market Lab</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<!--<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">-->

    <link rel="stylesheet" href="assets/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/buttons.bootstrap5.css"/>
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logoRF.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/sweetalert/sweetalert.css" />



</head>
<body>
    <div id="app">
    <?php include("sidebar.php"); ?>

        <div id="main">
            <?php include("menu.php") ?>
            
<div class="main-content container-fluid">

    <?php $titulo = "Módulo: Llenar Orden de Exámen"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder llenar una orden de exámen.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Laboratorio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orden de Exámen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Datos de la Orden de Exámenes
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/ord_llenar.php" id="formulario">
                        <div class="row">
                            <div class="col-md-12">


                                <input type="hidden" id="id_ordis" name="id_ordis" value="<?php echo $idx; ?>" >

                                <?php
                                $noorden = 0;
                                $query="select * from orden_examen where estado=1 and id_orden=".$idx;
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    $noorden = $fila['id_orden'];
                                    $fechaEx = $fila['fecha'];
                                    $fechaFi = $fila['fecha_final'];
                                    $idpaci = $fila['id_paciente'];

                                }
                                $noorden = intval($noorden);

                                $query="select p.*, CONCAT(d.cedula,' - ', d.nombre,' ',d.apellido) nom, d.direccion, d.telf, d.correo from paciente p, cliente d where p.estado=1 and p.id_cliente=d.id_cliente and p.id_paciente=".$idpaci;
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    $cliente = $fila['nom'];
                                    $telf = $fila['telf'];
                                    $dire = $fila['direccion'];
                                    $corre = $fila['correo'];
                                    $nomPac = $fila['nombre'];
                                    $idRaz = $fila['id_raza'];
                                    $fecNac = $fila['fecha_nacimiento'];
                                    $pes = $fila['peso'];
                                    $sexo = $fila['sexo'];
                                    $tama = $fila['tamanio'];
                                }

                                $query="select r.*, e.nombre esp from raza r, especie e where r.estado=1 and r.id_especie=e.id_especie  and r.id_raza=".$idRaz;
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    $razin = $fila['nombre'].' - '.$fila['esp'];
                                }


                                ?>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fnac">Código de la orden del exámen</label>
                                            <input type="hidden" id="codqr" class="form-control text-md-right" name="codqr" value="<?php echo date('Ymd')."0PETMARKET00".$noorden; ?>"  readonly/>
                                            <div id="codigoqr">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="fnac">Fecha de Hoy</label>
                                                <input type="text" id="fecha" class="form-control" name="fecha" value="<?php echo $fechaEx ?>"  readonly/>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="fnac">Fecha de Resultados</label>
                                                <input type="date" id="fechaR" class="form-control" name="fechaR" value="<?php echo $fechaFi ?>"  readonly/>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12">


                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cli">Dueño</label>
                                                    <input type="text" id="cli" class="form-control" name="clie" value="<?php echo $cliente; ?>" placeholder="Escriba el nombre convencional o celular" readonly>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir" class="form-control" name="dir" value="<?php echo $dire; ?>"
                                                           placeholder="Escriba la dirección" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel" class="form-control" name="tel" value="<?php echo $telf; ?>" placeholder="Escriba el teléfono convencional o celular" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cor">Correo</label>
                                                    <input type="email" id="cor" class="form-control" name="cor" value="<?php echo $corre; ?>"
                                                           placeholder="Escriba el correo" readonly>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group" >
                                        <label for="nom">Paciente</label>
                                        <input type="text" id="nom" class="form-control" name="nom" value="<?php echo $nomPac; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="nom">Peso (KG)</label>
                                        <input type="text" id="pes" class="form-control" name="pes" value="<?php echo $pes; ?>"
                                               placeholder="Escriba el peso en Kg" required readonly>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tam">Tamaño</label>
                                        <input type="text" id="tam" class="form-control" name="tam" value="<?php echo $tama; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="raz">Raza</label>
                                        <input type="text" id="raz" class="form-control" name="raz" value="<?php echo $razin; ?>" readonly/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fnac">Fecha de Nacimineto</label>
                                        <input type="text" id="fnac" class="form-control" name="fnac" value="<?php echo $fecNac; ?>" readonly/>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sex">Sexo</label>
                                        <input type="text" id="sex" class="form-control" name="sex" value="<?php echo $sexo; ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <h4 class="text-dark">Escriba los valores de los exámenes realizados</h4>
                        <br/>

                        <div class="row">

                            <?php

                            $exam = '';

                            $query="SELECT DISTINCT(id_examen), valor FROM det_ordenexamen WHERE id_orden=".$idx;
                            $resultado = $bd->query($query);
                            while($fila = $resultado->fetch_array()) {

                                $query2="Select * from examen where estado=1 and id_examen=".$fila['id_examen'];
                                $resultado2 = $bd->query($query2);
                                while($fila2 = $resultado2->fetch_array()) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <label ><h4 class="text-danger font-bold"><?php echo $fila2['nombre']; ?></h4></label>
                                            <input type="text" onkeypress="return soloNumeros(event)" id="op[]" name="op[]" class="form-control" value="<?php echo $fila['valor'] ?>"  />
                                            <input type="hidden" value="<?php echo $fila2['id_examen'] ?>"  id="op1[]" name="op1[]" class="form-control"  />
                                            <span class="font-bold">Rangos normales :<?php echo $fila2['valor_min'].' - '.$fila2['valor_max']; ?></span>

                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mr-1 mb-1" onclick="grabar()">Grabar Temporal</button>
                            <button type="button" class="btn btn-success mr-1 mb-1" onclick="imprimir()">Imprimir</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                        </div>


                    </form>
                </div>
            </div>




    </section>
</div>

            <?php include("footer.php"); ?>

        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    
<!--<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>-->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/dataTables.js"></script>
    <script src="assets/dataTables.bootstrap5.js"></script>
    <script src="assets/dataTables.buttons.js"></script>
    <script src="assets/buttons.bootstrap5.js"></script>
    <script src="assets/jszip.min.js"></script>
    <script src="assets/pdfmake.min.js"></script>
    <script src="assets/vfs_fonts.js"></script>
    <script src="assets/buttons.html5.min.js"></script>
    <script src="assets/buttons.print.min.js"></script>
    <script src="assets/buttons.colVis.min.js"></script>

    <script src="assets/js/vendors.js"></script>


    <script src="assets/js/main.js"></script>


    <?php
    if (isset($_GET['mn'])){
        $num = $_GET['mn'];
        if($num==1 || $num=="1"){
            echo '<script>swal("Orden de exámen eliminado con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Orden de exámen ingresado con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Orden de exámen actualizado con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>



        function soloLetras(e){
            var tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            var patron =/[A-Za-z\s]/;
            var te = String.fromCharCode(tecla);
            return patron.test(te);
        }

        function soloNumeros(e){
            var tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            var patron =/[0-9.]/;
            var te = String.fromCharCode(tecla);
            return patron.test(te);
        }


        function  imprimir(){
            swal({
                    title: "PET'S MARKET LAB",
                    text: "Desea imprimir la orden de exámen?, recuerde que si imprime ya no puede grabar mas valores de los exámenes",
                    type: 'success',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {

                    $("input[name='op[]']").each(function(indice, elemento) {
                        if ($(elemento).val()==""){
                            $(elemento).val("0");
                        }
                    });
                    $('#formulario').attr("action", "php/ord_llenar.php");
                    $("#formulario").submit();
                });
        }

        function grabar(){
            $("input[name='op[]']").each(function(indice, elemento) {
                if ($(elemento).val()==""){
                    $(elemento).val("0");
                }
            });
            $('#formulario').attr("action", "php/ord_llenart.php");
            $("#formulario").submit();
        }


        function poner_codigo(){
            let cod_fr = $("#codqr").val();
            var myNode = document.getElementById("codigoqr");
            myNode.innerHTML = '';

            $.ajax({
                url: 'validacion/crear_codigo.php?cod=' + cod_fr,
                type: 'get',
                success: function (e) {
                    console.log(e);
                    $('#codigoqr').append(e);

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        $( document ).ready(function() {
            poner_codigo();

        });


        function revisar(){
            let dia = $("#masc").val();
            let cli = $("#cli").val();
            if(cli==0) swal("Por favor elegir un cliente");
            else if(dia==0) swal("Por favor elegir una mascota");
            else{
                $("#formulario").submit();
            }
        }


    </script>


</body>
</html>
