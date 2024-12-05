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

    <?php $titulo = "Módulo: Reporte de Orden de Exámen"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder llenar o imprimir una orden de exámen.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Laboratorio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reporte de ordenes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Filtro de búsqueda de ordenes de exámen
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/ord_grabar.php" id="formulario">
                        <div class="row">
                            <div class="col-md-2">
                                <h5>Búsque al paciente</h5><br/>
                                <input class="form-check-input" name="tods" id="todos1" type="radio" onclick="cambiar_opcionb()" />&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" name="btncli" id="btncli" onclick="buscarcliente()" type="button" disabled> Buscar paciente </button>
                                <br/><br/><input class="form-check-input" name="tods" id="todos" type="radio" onclick="cambiar_opcion()" checked>&nbsp;&nbsp;&nbsp;Todos los pacientes
                                <input type="hidden" name="cli" id="cli" />
                            </div>
                            <div class="col-md-2">
                                <h5>Dueño</h5>
                                <input type="text" class="form-control" id="duen" readonly>
                            </div>
                            <div class="col-md-2">
                                <h5>Paciente</h5>
                                <input type="text" class="form-control" id="paci" readonly>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechaz">Fecha desde:</label>
                                    <input type="date" id="fechaz" value="<?php echo date('Y-m').'-01'; ?>" class="form-control" name="fechaz" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechah">Fecha hasta:</label>
                                    <input type="date" id="fechah" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="fechah" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mr-1 mb-1" onclick="revisar()">Buscar ordenes de exámen</button>

                        </div>


                    </form>
                </div>
            </div>


        <div class="card">
            <div class="card-header">
                Ordenes de examen ya creadas
            </div>
            <div class="card-body">
                <div id="masexamenes">
                    <table class='table table-striped table-bordered' id="table1">
                    <thead>
                        <tr >
                            <th style="background-color: #1d9aac;" class="text-white">Estado</th>
                            <th style="background-color: #1d9aac;" class="text-white">Fecha</th>
                            <th style="background-color: #1d9aac;" class="text-white">Dueño</th>
                            <th style="background-color: #1d9aac;" class="text-white">Paciente</th>
                            <th style="background-color: #1d9aac;" class="text-white">Codigo QR</th>
                            <th style="background-color: #1d9aac;" class="text-white">Fecha de Resultados</th>
                            <th style="background-color: #1d9aac;" class="text-white">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query="select o.*, c.nombre cli, c.apellido clia, c.cedula clic, p.nombre pac from paciente p, cliente c, orden_examen o where p.estado=1 and c.id_cliente=p.id_cliente and o.id_paciente=p.id_paciente";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>

                            <?php if($fila['estado']==1){ ?>
                                <td><p class="btn btn-warning"> PENDIENTE </p></td>
                            <?php }else if ($fila['estado']==2){ ?>
                            <td><p class="btn btn-success"> LISTO </p></td>
                            <?php }else{ ?>
                                <td><p class="btn btn-danger"> <span class="text-danger">z</span>ELIMINADO </p></td>
                            <?php } ?>

                            <td><?php echo $fila['fecha']; ?></td>
                            <td><?php echo $fila['clic']; ?> - <?php echo $fila['cli']." ".$fila['clia']; ?> </td>
                            <td><?php echo $fila['pac']; ?></td>
                            <td><?php echo $fila['codigo']; ?></td>
                            <td><?php echo $fila['fecha_final']; ?></td>

                            <td>
                                <button type="button" class="btn btn-secondary" onclick="abrir_modal('<?php echo $fila['id_orden']; ?>')">Ver Exámenes</button>
                                <?php if($fila['estado']!=0){ ?>
                                    <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_orden']; ?>', 0)">Eliminar</button>
                                <?php }else{ ?>
                                    <button type="button" class="btn btn-info" onclick="eliminar('<?php echo $fila['id_orden']; ?>', 1)">Activar</button>
                                <?php } ?>
                                <?php if($fila['estado']==1){ ?>
                                    <button type="button" class="btn btn-success" onclick="llenar('<?php echo $fila['id_orden']; ?>')">Llenar exámen</button>
                                <?php } ?>
                                <?php if($fila['estado']==2){ ?>
                                    <button type="button" class="btn btn-light" onclick="imprimir('<?php echo $fila['id_orden']; ?>')">Imprimir</button>
                                <?php } ?>

                            </td>
                        </tr>
                <?php } ?>

                    </tbody>
                </table>
                </div>
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
                    <h5 class="modal-title white" id="myModalLabel160">Seleccionar Paciente</h5>
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
                                        <th class="text-white bg-purple">Mascota</th>
                                        <th class="text-white bg-purple">Correo</th>
                                        <th class="text-white bg-purple">Datos</th>

                                        <th class="text-white bg-purple">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $query="select c.*, p.nombre masco, p.id_paciente idis from cliente c, paciente p where c.estado=1 and p.estado=1 and p.id_cliente=c.id_cliente";
                                    $resultado = $bd->query($query);
                                    while($fila = $resultado->fetch_array()){
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['cedula']; ?></td>
                                            <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
                                            <td><?php echo $fila['masco']; ?></td>
                                            <td><?php echo $fila['correo']; ?></td>
                                            <td>Dirección: <?php echo $fila['direccion']; ?>, Celular: <?php echo $fila['telf']; ?> </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="seleccionar('<?php echo $fila['idis']; ?>','<?php echo $fila['cedula']."-".$fila['nombre']." ".$fila['apellido']; ?>','<?php echo $fila['masco']; ?>')">Seleccionar</button>

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
            echo '<script>swal("Orden de exámen grabada temportalmente con éxito");</script>';
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

        function cambiar_opcion(){
            $("#cli").val("0");
            $("#paci").val("");
            $("#duen").val("");
            $("#btncli").prop("disabled", true);
        }

        function cambiar_opcionb(){
            $("#btncli").prop("disabled", false);
        }

        function buscarcliente(){
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
            $("#seleccion").modal("show");
        }

        function llenar(idx){
            window.location.href ="orden_examen_llenar.php?valor="+idx;
        }

        function imprimir(idx){
            window.location.href ="pdf/rpt_orden_final.php?orden="+idx;
        }


        function seleccionar(idx, d, t){
            $("#cli").val(idx);
            $("#paci").val(t);
            $("#duen").val(d);
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


        function  eliminar(idx, op){
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
                    window.location.href ="php/ord_eliminar.php?valor="+idx+'&op='+op;
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
            let fefin = $("#fechah").val();
            let feini = $("#fechaz").val();
            let pac = $("#cli").val();

            var myNode = document.getElementById("masexamenes");
            myNode.innerHTML = '';
            $.ajax({
                url: 'php/agregarexamen2.php?cod='+pac+'&ff='+fefin+'&fi='+feini,
                type: 'get',
                success: function (e) {
                    console.log(e);
                    $('#masexamenes').append(e);

                    new DataTable("#table1", {
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
        }




    </script>


</body>
</html>
