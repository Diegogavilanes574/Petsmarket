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

    <?php $titulo = "Módulo: Preguntas/Respuestas"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar las respuestas de las diferentes preguntas para el algoritmo de decisión.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Encuesta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Preguntas/Respuestas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Ingreso de Preguntas
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/pre_grabar.php" id="formulario">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nom">Pregunta:</label>
                                <input type="text" id="nom" class="form-control" onchange="validarPregenBD();" name="nom"
                                       placeholder="Escriba la pregunta" required>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Grabar</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Ingreso de Respuestas
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/res_grabar.php" id="formulario3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nom">Respuestas (Escriba las diferentes RESPUESTAS, separados por PUNTOS)</label>
                                <input type="text" id="noms" class="form-control"  name="nom"
                                       placeholder="Escriba las respuestas de las preguntas" required>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Grabar</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                Relación de Respuestas con los Síntomas
            </div>
            <div class="card-body">

                <form class="form form-vertical" method="post" action="php/res_editar.php" id="formulario2">
                    <div class="col-12">
                        <div class="form-group">

                            <label for="suc">Respuesta</label>
                            <select id="dia" name="dia" class="form-select" onchange="poner_sintomas()" >
                                <option value="0">--SELECCIONAR UNA OPCION--</option>
                                <?php
                                $query="select * from respuesta where estado=1 order by nombre";
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    ?>

                                    <option value="<?php echo $fila['id_respuesta']; ?>"><?php echo $fila['nombre']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ssin">Síntomas</label>
                        <div class="row" id="sintomas">

                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-success mr-1 mb-1" onclick="revisar()">Grabar</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Limpiar Campos</button>
                    </div>

                </form>

            </div>
        </div>


        <div class="card">
            <div class="card-header">
                Preguntas ya creados
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
                    $query="select * from cab_pregunta where estado=1";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                           <td>
                               <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_pregunta']; ?>',  '<?php echo $fila['nombre']; ?>')">Editar</button>
                                <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_pregunta']; ?>')">Eliminar</button>
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

    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Editar Pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/pre_editar.php" id="formulario2">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" id="id_pre" name="id_pre">



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Pregunta</label>
                                                    <input type="text" id="nom0" class="form-control" onchange="validarPreenBD2();" name="nom"
                                                           placeholder="Escriba la pregunta" required>
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

    <?php
    if (isset($_GET['mn'])){
        $num = $_GET['mn'];
        if($num==1 || $num=="1"){
            echo '<script>swal("Pregunta eliminada con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Pregunta ingresada con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Pregunta actualizada con éxito");</script>';
        }else if($num == 5 || $num=="5"){
            echo '<script>swal("Respuesta ingresada con éxito");</script>';
        }else if($num == 6 || $num=="6"){
            echo '<script>swal("Respuestas actualizadas con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>
        var h = 1;
        var h1 = 1;
        function revisar(){
            let dia = $("#dia").val();
            if(dia==0) swal("Por favor elegir una respuesta");
            else{
                $("#formulario2").submit();
            }
        }

        function abrir_modal(ide, no){
            $("#id_pre").val(ide);
            $("#nom0").val(no);
            $("#primary").modal("show");
        }

        function cerrar_modal(){
            $("#primary").modal("hide");
        }

        function poner_sintomas(){
            let cod_fr = $("#dia").val();
            var myNode = document.getElementById("sintomas");
            myNode.innerHTML = '';

            $.ajax({
                url: 'php/agregarsintoma2.php?id_sin=' + cod_fr,
                type: 'get',
                success: function (e) {
                    console.log(e);
                    $('#sintomas').append(e);

                },
                error: function (e) {
                    console.log(e);
                }
            });
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
                    text: "Desea eliminar la pregunta?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/pre_eliminar.php?valor="+idx;
                });
        }



        function validarPreenBD() {
            var nom = $("#nom").val();
            $.ajax({
                url: 'validacion/nombreBD.php?nom=' + nom + "&tipo=pre",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La pregunta ya existe por favor, registrar otra");
                        $("#nom").val("");
                    }
                }
            });
        }

        function validarPreenBD2() {
            var nom = $("#nom0").val();
            var idem = $("#id_pre").val();
            $.ajax({
                url: 'validacion/nombreBD2.php?nom=' + nom + '&idreg=' + idem + "&tipo=pre",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La pregunta ya existe por favor, registrar otra");
                        $("#nom0").val("");
                    }
                }
            });
        }


    </script>


</body>
</html>
