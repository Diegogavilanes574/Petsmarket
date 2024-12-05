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

    <?php $titulo = "Módulo: Paciente"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar pacientes, que son las mascotas.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Mascotas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paciente</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Ingreso de Pacientes
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-success" onclick="abrir_info()" id="info"> Crear Nuevo </button>
                </div>
            </div>


        <div class="card">
            <div class="card-header">
                Pacientes ya creados
            </div>
            <div class="card-body">
                <table class='table table-striped table-bordered' id="table1">
                    <thead>
                        <tr >
                            <th style="background-color: #1d9aac;" class="text-white">Dueño</th>
                            <th style="background-color: #1d9aac;" class="text-white">Nombre</th>
                            <th style="background-color: #1d9aac;" class="text-white">Raza</th>
                            <th style="background-color: #1d9aac;" class="text-white">Peso</th>
                            <th style="background-color: #1d9aac;" class="text-white">Tamaño</th>
                            <th style="background-color: #1d9aac;" class="text-white">Fecha de Nacimiento</th>
                            <th style="background-color: #1d9aac;" class="text-white">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query="select p.*, c.nombre cli, c.apellido clia, c.cedula clic, r.nombre raz from paciente p, cliente c, raza r where p.estado=1 and c.id_cliente=p.id_cliente and p.id_raza=r.id_raza";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['clic']; ?> - <?php echo $fila['cli']." ".$fila['clia']; ?> </td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['raz']; ?></td>
                            <td><?php echo $fila['peso']; ?></td>
                            <td><?php echo $fila['tamanio']; ?></td>
                            <td><?php echo $fila['fecha_nacimiento']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_paciente']; ?>', '<?php echo $fila['nombre']; ?>','<?php echo $fila['fecha_nacimiento']; ?>','<?php echo $fila['id_raza']; ?>','<?php echo $fila['peso']; ?>','<?php echo $fila['tamanio']; ?>', '<?php echo $fila['edad']; ?>', '<?php echo $fila['sexo']; ?>', '<?php echo $fila['id_cliente']; ?>')">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_paciente']; ?>')">Eliminar</button>
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


    <div class="modal fade text-left" id="infox" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel130">Ingresar Nuevo Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/pac_grabar.php" id="formulario">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom" class="form-control" name="nom" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los nombres" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cli">Dueño</label>
                                                    <button class="btn btn-danger" name="btncli" id="btncli" onclick="buscarcliente()" type="button" > Buscar </button>
                                                    <input type="hidden" name="cli" id="cli" />
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

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="nom">Peso</label>
                                                    <input type="text" id="pes" class="form-control" name="pes" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba el peso en Kg" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="tam">Tamaño</label>
                                                        <select id="tam" name="tam" class="form-select">
                                                            <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                            <option value="PEQUEÑO">PEQUEÑO</option>
                                                            <option value="MEDIANO">MEDIANO</option>
                                                            <option value="GRANDE">GRANDE</option>
                                                            <option value="EXTRA GRANDE">EXTRA GRANDE</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="raz">Raza</label>
                                                    <select id="raz" name="raz" class="form-select">
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

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="eda">Edad (en meses)</label>
                                                    <input type="text" id="eda" class="form-control" name="eda" maxlength="3" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la edad en meses" required readonly>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="fnac">Fecha de Nacimineto</label>
                                                    <input type="date" id="fnac" class="form-control" name="fnac" max="<?php echo date('Y-m-d'); ?>"  onchange="meses()"/>

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="sex">Sexo</label>
                                                    <select id="sex" name="sex" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <option value="MACHO">MACHO</option>
                                                        <option value="HEMBRA">HEMBRA</option>
                                                    </select>
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
                    <h5 class="modal-title white" id="myModalLabel160">Editar Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/pac_editar.php" id="formulario2">
                                    <div class="form-body">
                                        <div class="row">
                                                <input type="hidden" id="id_pac" name="id_pac">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom0" class="form-control" name="nom" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los nombres" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cli">Dueño</label>
                                                    <button class="btn btn-danger" name="btncli" id="btncli0" onclick="buscarcliente2()" type="button" > Buscar </button>
                                                    <input type="hidden" name="cli" id="cli0" />
                                                    <select id="clix0" name="clix" class="form-select" disabled>
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

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="pes">Peso</label>
                                                    <input type="text" id="pes0" class="form-control" name="pes" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba el peso en Kg" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="tam">Tamaño</label>
                                                    <select id="tam0" name="tam" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <option value="PEQUEÑO">PEQUEÑO</option>
                                                        <option value="MEDIANO">MEDIANO</option>
                                                        <option value="GRANDE">GRANDE</option>
                                                        <option value="EXTRA GRANDE">EXTRA GRANDE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="raz">Raza</label>
                                                    <select id="raz0" name="raz" class="form-select">
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

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="eda">Edad (en meses)</label>
                                                    <input type="text" id="eda0" class="form-control" name="eda" maxlength="3" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la edad en meses" required readonly>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="fnac">Fecha de Nacimineto</label>
                                                    <input type="date" id="fnac0" class="form-control" name="fnac" max="<?php echo date('Y-m-d'); ?>" onchange="meses2()" />

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="sex">Sexo</label>
                                                    <select id="sex0" name="sex" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <option value="MACHO">MACHO</option>
                                                        <option value="HEMBRA">HEMBRA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Grabar los cambios</button>
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
                                <table class='table table-striped table-bordered' id="tablex2">
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
                                                <button type="button" class="btn btn-primary" onclick="seleccionar('<?php echo $fila['id_cliente']; ?>')">Seleccionar</button>

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
            echo '<script>swal("Paciente eliminado con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Paciente ingresado con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Paciente actualizado con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>
        var h = 1;
        var h1 = 1;

        function abrir_modal(ide, no, fn, idr, pe, ta, ed, se, cl){
            $("#id_pac").val(ide);
            $("#nom0").val(no);
            $("#fnac0").val(fn);
            $("#raz0").val(idr);
            $("#pes0").val(pe);
            $("#tam0").val(ta);
            $("#eda0").val(ed);
            $("#sex0").val(se);
            $("#cli0").val(cl);
            $("#clix0").val(cl);

            $("#primary").modal("show");
        }

        function abrir_info(){
            $("#infox").modal("show");
        }

        function buscarcliente(){
            $("#tipin").val("1");
            $("#seleccion").modal("show");
        }

        function buscarcliente2(){
            $("#tipin").val("2");
            $("#seleccion").modal("show");
        }

        function seleccionar(idx){
            var tipo =  $("#tipin").val();
            if (tipo == "1"){
                $("#cli").val(idx);
                $("#clix").val(idx);
            }
            else{
                $("#cli0").val(idx);
                $("#clix0").val(idx);
            }
            $("#seleccion").modal("hide");

        }

        function cerrar_modal(){
            $("#primary").modal("hide");
        }

        function cambiar(){
            if (h==1){
                $("#pas").get(0).type = "text";
                h = 0;
            }else{
                $("#pas").get(0).type = "password";
                h = 1;
            }
        }

        function cambiar2(){
            if (h1==1){
                $("#pas0").get(0).type = "text";
                h1 = 0;
            }else{
                $("#pas0").get(0).type = "password";
                h1 = 1;
            }
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
                    text: "Desea eliminar al paciente?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/pac_eliminar.php?valor="+idx;
                });
        }

        function meses(){
            var fecha = $("#fnac").val();
            var fechaactual = new Date();
            var anioact = parseInt(fechaactual.getFullYear());
            var mesact = parseInt(fechaactual.getMonth())+1;
            var diaact = parseInt(fechaactual.getDay());

            var anionac = parseInt(String(fecha).substring(0,4));
            var mesnac = parseInt(String(fecha).substring(5,7));
            var dianac = parseInt(String(fecha).substring(8,10));

            let edad = anioact-anionac;
            edad = edad *12
            if(mesact<mesnac){
                edad = edad - 12 + mesact;
            }else{
                edad = edad + (mesact-mesnac);
            }

           $("#eda").val(edad);
        }

        function meses2(){
            var fecha = $("#fnac0").val();
            var fechaactual = new Date();
            var anioact = parseInt(fechaactual.getFullYear());
            var mesact = parseInt(fechaactual.getMonth())+1;
            var diaact = parseInt(fechaactual.getDay());

            var anionac = parseInt(String(fecha).substring(0,4));
            var mesnac = parseInt(String(fecha).substring(5,7));
            var dianac = parseInt(String(fecha).substring(8,10));

            let edad = anioact-anionac;
            edad = edad *12
            if(mesact<mesnac){
                edad = edad - 12 + mesact;
            }else{
                edad = edad + (mesact-mesnac);
            }

            $("#eda0").val(edad);

        }


        new DataTable("#tablex2", {
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



    </script>


</body>
</html>
