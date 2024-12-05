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
    <link rel="stylesheet" href="assets/buttons.bootstrap5.css"/>
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

    <?php $titulo = "Módulo: Orden de Exámen"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder crear y eliminar una orden de exámen.</p>
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
                    Ingreso de Orden de Exámenes
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/ord_grabar.php" id="formulario">
                        <div class="row">
                            <div class="col-md-12">


                                <?php
                                $noorden = 0;
                                $query="select * from orden_examen where estado=1";
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    $noorden = $fila['id_orden'];
                                }
                                $noorden = intval($noorden) + 1;
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
                                                <input type="text" id="fecha" class="form-control" name="fecha" value="<?php echo date('Y-m-d H:i'); ?>"  readonly/>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="fnac">Fecha de Resultados</label>
                                                <input type="date" id="fechaR" class="form-control" name="fechaR" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>""  required/>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12">


                                    <div class="form-group">

                                        <button class="btn btn-danger" name="btncli" id="btncli" onclick="buscarcliente()" type="button" > Buscar Cliente </button>
                                        <input type="hidden" name="cli" id="cli" />
                                        <br/><br/>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cli">Dueño</label>
                                                    <select id="clix" name="clix" class="form-select" disabled>
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <?php
                                                        $query="select * from cliente where estado=1";
                                                        $resultado = $bd->query($query);
                                                        while($fila = $resultado->fetch_array()){
                                                            ?>
                                                            <option value="<?php echo $fila['id_cliente']; ?>"><?php echo $fila['cedula']." - ".$fila['nombre']." ".$fila['apellido']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir" class="form-control" name="dir"
                                                           placeholder="Escriba la dirección" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel" class="form-control" name="tel"
                                                           placeholder="Escriba el teléfono convencional o celular" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cor">Correo</label>
                                                    <input type="email" id="cor" class="form-control" name="cor"
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
                                        <div id="mascotas">
                                            <select id="masc" name="masc" class="form-select" >
                                                <option value="0">--SELECCIONAR UNA OPCION--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="nom">Peso (KG)</label>
                                        <input type="text" id="pes" class="form-control" name="pes" onkeypress="return soloNumeros(event)"
                                               placeholder="Escriba el peso en Kg" required readonly>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tam">Tamaño</label>
                                        <select id="tam" name="tam" class="form-select" disabled>
                                            <option value="0">--SELECCIONAR UNA OPCION--</option>
                                            <option value="PEQUEÑO">PEQUEÑO</option>
                                            <option value="MEDIANO">MEDIANO</option>
                                            <option value="GRANDE">GRANDE</option>
                                            <option value="EXTRA GRANDE">EXTRA GRANDE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="raz">Raza</label>
                                        <select id="raz" name="raz" class="form-select" disabled>
                                            <option value="0">--SELECCIONAR UNA OPCION--</option>
                                            <?php
                                            $query="select r.*, e.nombre esp from raza r, especie e  where r.estado=1 and r.id_especie=e.id_especie";
                                            $resultado = $bd->query($query);
                                            while($fila = $resultado->fetch_array()){
                                                ?>
                                                <option value="<?php echo $fila['id_raza']; ?>"><?php echo $fila['nombre']." - ".$fila['esp']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fnac">Fecha de Nacimineto</label>
                                        <input type="text" id="fnac" class="form-control" name="fnac" readonly/>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sex">Sexo</label>
                                        <input type="text" id="sex" class="form-control" name="sex" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <h4 class="text-dark">Escoja los exámenes que desea realizarle al paciente</h4>

                        <div class="row">

                            <?php

                            $exam = '';

                            $query="Select * from tipo_examen where estado=1";
                            $resultado = $bd->query($query);
                            while($fila = $resultado->fetch_array()) {
                            ?>

                                    <center>
                                        <h3 class="text-white text-decoration-underline bg-dark"><?php echo $fila['nombre']; ?></h3><br />
                                    </center>


                            <?php
                                $query2="Select * from cab_grupo where estado=1 and id_tipoExamen=".$fila['id_tipoExamen'];
                                $resultado2 = $bd->query($query2);
                                while($fila2 = $resultado2->fetch_array()) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <input type="checkbox" id="op[]" name="op[]" value="<?php echo $fila2['id_grupo'] ?>" class="form-check-input"  />
                                            <label ><h4 class="text-danger font-bold"><?php echo $fila2['nombre']; ?></h4></label>
                                            <?php
                                            $query3="Select d.*, e.codigo exa from det_grupo d, examen e where d.estado=1 and e.estado =1 and d.id_examen=e.id_examen and d.id_grupo=".$fila2['id_grupo'];
                                            $resultado3 = $bd->query($query3);
                                            $exam = '';
                                            while($fila3 = $resultado3->fetch_array()) {
                                               $exam = $exam.', '.$fila3['exa'];
                                            }
                                                ?>
                                            <p class="text-dark"><?php echo substr($exam, 2); ?></p>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mr-1 mb-1" onclick="revisar()">Grabar</button>
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



    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title white" id="myModalLabel160">Ver Exámenes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/ord_editar.php" id="formulario2">
                                    <div class="form-body">
                                        <div class="row">
                                            <input type="hidden" id="id_pac" name="id_pac">
                                            <center>
                                                <div id="tabla_examen" >


                                                </div>
                                            </center>
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

    <div class="modal fade text-left" id="seleccion" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <h5 class="modal-title white" id="myModalLabel160">Seleccionar Dueño</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <input type="hidden" name="tipin" id="tipin" />
                                <table class='table table-striped table-bordered' id="table2">
                                    <thead>
                                    <tr >
                                        <th class="text-white bg-purple">Cédula</th>
                                        <th class="text-white bg-purple">Nombres</th>
                                        <th class="text-white bg-purple">Correo</th>
                                        <th class="text-white bg-purple">Datos</th>
                                        <th class="text-white bg-purple">No. Mascotas</th>
                                        <th class="text-white bg-purple">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $query="select * from cliente where estado=1";
                                    $resultado = $bd->query($query);
                                    while($fila = $resultado->fetch_array()){
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['cedula']; ?></td>
                                            <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td>Dirección: <?php echo $fila['direccion']; ?>, Celular: <?php echo $fila['telf']; ?> </td>

                                            <?php
                                            $cantMasc = 0;
                                            $query2="select count(id_paciente) numis from paciente where estado=1 and id_cliente=".$fila['id_cliente'];
                                            $resultado2 = $bd->query($query2);
                                            while($fila2 = $resultado2->fetch_array()) {
                                                $cantMasc = $fila2['numis'];
                                            }
                                            ?>

                                            <td><?php echo $cantMasc; ?></td>
                                            <!--                            <td> <span class="badge bg-success">Active</span> </td>-->
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="seleccionar('<?php echo $fila['id_cliente']; ?>','<?php echo $fila['direccion']; ?>','<?php echo $fila['telf']; ?>','<?php echo $fila['correo']; ?>' )">Seleccionar</button>

                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
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


        function abrir_modal(ide){
            $("#id_pac").val(ide);
            var myNode = document.getElementById("tabla_examen");
            myNode.innerHTML = '';

            $.ajax({
                url: 'php/tabla_examen.php?cod=' + ide,
                type: 'get',
                success: function (e) {
                    console.log(e);
                    $('#tabla_examen').append(e);

                    new DataTable("#table3", {
                        "language":{
                            "search":"Buscar:",
                            "lengthMenu": "Ver _MENU_ registros",
                            "zeroRecords": "No se encontraron resultados",
                            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "paginate": {
                                "first": "<<",
                                "last": ">>",
                                "next": ">",
                                "previous": "<"
                            },
                        }
                    });

                },
                error: function (e) {
                    console.log(e);
                }
            });
            $("#primary").modal("show");
        }

        function buscarcliente(){
            $("#tipin").val("1");
            $("#seleccion").modal("show");
        }

        function buscarcliente2(){
            $("#tipin").val("2");
            $("#seleccion").modal("show");
        }

        function seleccionar(idx, d, t, c){
            var tipo =  $("#tipin").val();
            if (tipo == "1"){
                $("#cli").val(idx);
                $("#clix").val(idx);
                $("#dir").val(d);
                $("#tel").val(t);
                $("#cor").val(c);

                var myNode = document.getElementById("mascotas");
                myNode.innerHTML = '';
                $.ajax({
                    url: 'php/agregarmascota.php?cod=' + idx,
                    type: 'get',
                    success: function (e) {
                        console.log(e);
                        $('#mascotas').append(e);

                    },
                    error: function (e) {
                        console.log(e);
                    }
                });

            }
            else{
                $("#cli0").val(idx);
                $("#clix0").val(idx);
                $("#dir0").val(d);
                $("#tel0").val(t);
                $("#cor0").val(c);


            }
            $("#seleccion").modal("hide");

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
                    text: "Desea eliminar la orden de exámen?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/ord_eliminar.php?valor="+idx;
                });
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

            new DataTable("#table2", {
                "language":{
                    "search":"Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    },
                }
            });



        });

        function poner_mascota(){
            let cod_fr = $("#masc").val();
            $.ajax({
                url: 'php/agregarmascota2.php?cod=' + cod_fr,
                dataType: 'json',
                type: 'get',
                success: function (e) {
                    console.log(e);
                    $('#sex').val(e.resp.resp[0]);
                    $('#fnac').val(e.resp.resp[1]);
                    $('#raz').val(e.resp.resp[2]);
                    $('#tam').val(e.resp.resp[3]);
                    $('#pes').val(e.resp.resp[4]);
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

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
