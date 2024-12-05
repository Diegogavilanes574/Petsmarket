<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Market Lab</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<!--<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">-->

    <link rel="stylesheet" href="assets/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logoRF.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/sweetalert/sweetalert.css" />

    <style>

        .password-wrapper {
            position: relative;
        }

        .toggle-button {
            display: inline-flex;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: unset;
            right: 12px;
            cursor: pointer;
        }

        .eye-icon {
            width: 20px;
            height: 20px;
        }
    </style>


</head>
<body>
    <div id="app">
    <?php include("sidebar.php"); ?>

        <div id="main">
            <?php include("menu.php") ?>
            
<div class="main-content container-fluid">

    <?php $titulo = "Módulo: Tipo de Usuario"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar tipos de usuario.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Veterinaria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tipos de Usuario</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Ingreso de Tipos de Usuario
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#info"> Crear Nuevo </button>
                </div>
            </div>


        <div class="card">
            <div class="card-header">
                Tipos de usuario ya creados
            </div>
            <div class="card-body">
                <table class='table table-striped table-bordered' id="table1">
                    <thead>
                        <tr >
                            <th style="background-color: #1d9aac;" class="text-white">Nombre</th>
                            <th style="background-color: #1d9aac;" class="text-white">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query="select * from tipo_usuario where estado=1";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                           <td>
                                <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_tipoUsuario']; ?>',  '<?php echo $fila['nombre']; ?>', '<?php echo $fila['op01']; ?>', '<?php echo $fila['op02']; ?>', '<?php echo $fila['op03']; ?>', '<?php echo $fila['op04']; ?>', '<?php echo $fila['op05']; ?>', '<?php echo $fila['op06']; ?>', '<?php echo $fila['op07']; ?>', '<?php echo $fila['op08']; ?>', '<?php echo $fila['op09']; ?>', '<?php echo $fila['op10']; ?>', '<?php echo $fila['op11']; ?>', '<?php echo $fila['op12']; ?>', '<?php echo $fila['op13']; ?>', '<?php echo $fila['op14']; ?>', '<?php echo $fila['op15']; ?>', '<?php echo $fila['op16']; ?>', '<?php echo $fila['op17']; ?>' )">Editar</button>

                               <?php

                               if($fila['id_tipoUsuario']!=1) { ?>

                                <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_tipoUsuario']; ?>')">Eliminar</button>
                                <?php } ?>
                            </td>
                        </tr>
                <?php } ?>

                    </tbody>
                </table>
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


    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel130">Ingresar Nuevo Tipo de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/tus_grabar.php" id="formulario">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom" class="form-control" onchange="validarTusenBD();" name="nom"
                                                           placeholder="Escriba el nombre del nuevo tipo de usuario" required>
                                                </div>

                                                <h2 class="">OPCIONES:</h2>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label form="inop0">Dashboard</label>
                                                            <input type="checkbox" id="inop0" name="inop0" class="form-check-input" checked disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class="text-blue">Mascotas:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op1">Cliente</label>
                                                            <input type="checkbox" id="op1" name="op1" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op2">Paciente</label>
                                                            <input type="checkbox" id="op2" name="op2" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op3">Raza</label>
                                                            <input type="checkbox" id="op3" name="op3" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op4">Especie</label>
                                                            <input type="checkbox" id="op4" name="op4" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>

                                                <h3 class="text-blue">Veterinaria:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op5">Sucursal</label>
                                                            <input type="checkbox" id="op5" name="op5" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op6">Empleado</label>
                                                            <input type="checkbox" id="op6" name="op6" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op7">Tipo de Usuario</label>
                                                            <input type="checkbox" id="op7" name="op7" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op16">Tipo de Insumo</label>
                                                            <input type="checkbox" id="op16" name="op16" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op17">Insumo</label>
                                                            <input type="checkbox" id="op17" name="op17" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op15">Inventario</label>
                                                            <input type="checkbox" id="op15" name="op15" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>

                                                <h3 class="text-blue">Laboratorio:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op8">Diagnósticos</label>
                                                            <input type="checkbox" id="op8" name="op8" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op9">Tipo de Exámen</label>
                                                            <input type="checkbox" id="op9" name="op9" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op10">Exámenes</label>
                                                            <input type="checkbox" id="op10" name="op10" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op14">Grupos de Exámenes</label>
                                                            <input type="checkbox" id="op14" name="op14" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op11">Ordenes de Exámen</label>
                                                            <input type="checkbox" id="op11" name="op11" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op12">Reporte de Ordenes</label>
                                                            <input type="checkbox" id="op12" name="op12" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <h3 class="text-blue">Encuesta:</h3>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op13">Preguntas/Respuestas</label>
                                                            <input type="checkbox" id="op13" name="op13" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>





                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Grabar</button>
                                                <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Editar Tipo de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/tus_editar.php" id="formulario">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id_tus" id="id_tus" />

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="Enom" class="form-control" onchange="validarTusenBD2();" name="nom"
                                                           placeholder="Escriba el nombre del nuevo tipo de usuario" required>
                                                </div>

                                                <h2 class="">OPCIONES:</h2>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label form="inop0">Dashboard</label>
                                                            <input type="checkbox" id="Einop0" name="inop0" class="form-check-input" checked disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class="text-blue">Mascotas:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op1">Cliente</label>
                                                            <input type="checkbox" id="Eop1" name="op1" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op2">Paciente</label>
                                                            <input type="checkbox" id="Eop2" name="op2" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op3">Raza</label>
                                                            <input type="checkbox" id="Eop3" name="op3" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op4">Especie</label>
                                                            <input type="checkbox" id="Eop4" name="op4" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>

                                                <h3 class="text-blue">Veterinaria:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op5">Sucursal</label>
                                                            <input type="checkbox" id="Eop5" name="op5" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op6">Empleado</label>
                                                            <input type="checkbox" id="Eop6" name="op6" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op7">Tipo de Usuario</label>
                                                            <input type="checkbox" id="Eop7" name="op7" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op16">Tipo de Insumo</label>
                                                            <input type="checkbox" id="Eop16" name="op16" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op17">Insumo</label>
                                                            <input type="checkbox" id="Eop17" name="op17" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op15">Inventario</label>
                                                            <input type="checkbox" id="Eop15" name="op15" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>

                                                <h3 class="text-blue">Laboratorio:</h3>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op8">Diagnósticos</label>
                                                            <input type="checkbox" id="Eop8" name="op8" class="form-check-input"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op9">Tipo de Exámen</label>
                                                            <input type="checkbox" id="Eop9" name="op9" class="form-check-input"   />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op10">Exámenes</label>
                                                            <input type="checkbox" id="Eop10" name="op10" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op14">Grupos de Exámenes</label>
                                                            <input type="checkbox" id="Eop14" name="op14" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op11">Ordenes de Exámen</label>
                                                            <input type="checkbox" id="Eop11" name="op11" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op12">Reporte de Ordenes</label>
                                                            <input type="checkbox" id="Eop12" name="op12" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                    <h3 class="text-blue">Encuesta:</h3>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label form="op13">Preguntas/Respuestas</label>
                                                            <input type="checkbox" id="Eop13" name="op13" class="form-check-input"  />
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>



                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Grabar</button>
                                                <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['mn'])){
        $num = $_GET['mn'];
        if($num==1 || $num=="1"){
            echo '<script>swal("Tipo de usuario eliminado con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Tipo de usuario ingresado con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Tipo de usuario actualizado con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>
        var h = 1;
        var h1 = 1;
        function abrir_modal(ide, no, o1, o2, o3, o4, o5, o6, o7, o8, o9, o10, o11, o12, o13, o14, o15, o16, o17){
            $("#id_tus").val(ide);
            $("#Enom").val(no);

            if(o1==1)  $("#Eop1").prop("checked", true);
            else $("#Eop1").prop("checked", false);
            if(o2==1)  $("#Eop2").prop("checked", true);
            else $("#Eop2").prop("checked", false);
            if(o3==1)  $("#Eop3").prop("checked", true);
            else $("#Eop3").prop("checked", false);
            if(o4==1)  $("#Eop4").prop("checked", true);
            else $("#Eop4").prop("checked", false);
            if(o5==1)  $("#Eop5").prop("checked", true);
            else $("#Eop5").prop("checked", false);
            if(o6==1)  $("#Eop6").prop("checked", true);
            else $("#Eop6").prop("checked", false);
            if(o7==1)  $("#Eop7").prop("checked", true);
            else $("#Eop7").prop("checked", false);
            if(o8==1)  $("#Eop8").prop("checked", true);
            else $("#Eop8").prop("checked", false);
            if(o9==1)  $("#Eop9").prop("checked", true);
            else $("#Eop9").prop("checked", false);
            if(o10==1)  $("#Eop10").prop("checked", true);
            else $("#Eop10").prop("checked", false);
            if(o11==1)  $("#Eop11").prop("checked", true);
            else $("#Eop11").prop("checked", false);
            if(o12==1)  $("#Eop12").prop("checked", true);
            else $("#Eop12").prop("checked", false);
            if(o13==1)  $("#Eop13").prop("checked", true);
            else $("#Eop13").prop("checked", false);
            if(o14==1)  $("#Eop14").prop("checked", true);
            else $("#Eop14").prop("checked", false);

            if(o15==1)  $("#Eop15").prop("checked", true);
            else $("#Eop15").prop("checked", false);
            if(o16==1)  $("#Eop16").prop("checked", true);
            else $("#Eop16").prop("checked", false);
            if(o17==1)  $("#Eop17").prop("checked", true);
            else $("#Eop17").prop("checked", false);

            $("#primary").modal("show");
        }

        function cerrar_modal(){
            $("#primary").modal("hide");
        }


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
            var patron =/[0-9]/;
            var te = String.fromCharCode(tecla);
            return patron.test(te);
        }



        function  eliminar(idx){
            swal({
                    title: "PET'S MARKET LAB",
                    text: "Desea eliminar el tipo de usuario?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/tus_eliminar.php?valor="+idx;
                });
        }



        function validarTusenBD() {
            var nom = $("#nom").val();
            $.ajax({
                url: 'validacion/nombreBD.php?nom=' + nom + "&tipo=tus",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El tipo de usuario ya existe por favor, registrar con otro nombre");
                        $("#nom").val("");
                    }
                }
            });
        }

        function validarTusenBD2() {
            var nom = $("#nom0").val();
            var idem = $("#id_tus").val();
            $.ajax({
                url: 'validacion/nombreBD2.php?nom=' + nom + '&idreg=' + idem + "&tipo=tus",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El tipo de usuario ya existe por favor, registrar con otro nombre");
                        $("#nom0").val("");
                    }
                }
            });
        }


    </script>


</body>
</html>
