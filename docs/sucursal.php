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

    <?php $titulo = "Módulo: Sucursal"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar sucursales.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Veterinaria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sucursales</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Ingreso de Sucursales
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#info"> Crear Nuevo </button>
                </div>
            </div>


        <div class="card">
            <div class="card-header">
                Sucursales ya creadas
            </div>
            <div class="card-body">
                <table class='table table-striped table-bordered' id="table1">
                    <thead>
                        <tr >
                            <th style="background-color: #1d9aac;" class="text-white">Nombre</th>
                            <th style="background-color: #1d9aac;" class="text-white">Dirección</th>
                            <th style="background-color: #1d9aac;" class="text-white">Teléfono</th>
                            <th style="background-color: #1d9aac;" class="text-white">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query="select * from sucursal where estado=1";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['direccion']; ?></td>
                            <td><?php echo $fila['numero']; ?></td>
\                            <td>
                                <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_sucursal']; ?>',  '<?php echo $fila['nombre']; ?>', '<?php echo $fila['direccion']; ?>', '<?php echo $fila['numero']; ?>')">Editar</button>

                              <?php if($fila['id_sucursal'] != 1) { ?>
                                <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_sucursal']; ?>')">Eliminar</button>
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
                    <h5 class="modal-title white" id="myModalLabel130">Ingresar Nueva Sucursal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/suc_grabar.php" id="formulario">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom" class="form-control" onchange="validarSucenBD();" name="nom"
                                                           placeholder="Escriba el nombre" required>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir" class="form-control" name="dir"
                                                           placeholder="Escriba la dirección" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel" class="form-control" name="tel"
                                                           placeholder="Escriba el teléfono convencional o celular" required>
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
                    <h5 class="modal-title white" id="myModalLabel160">Editar Sucursal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/suc_editar.php" id="formulario2">
                                    <div class="form-body">
                                        <div class="row">

                                                <input type="hidden" id="id_suc" name="id_suc">



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom0" class="form-control" onchange="validarSucenBD2();" name="nom"
                                                           placeholder="Escriba el nombre" required>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir0" class="form-control" name="dir"
                                                           placeholder="Escriba la dirección" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel0" class="form-control" name="tel"
                                                           placeholder="Escriba el teléfono convencional o celular" required>
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
            echo '<script>swal("Sucursal eliminada con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Sucursal ingresada con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Sucursal actualizada con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>
        var h = 1;
        var h1 = 1;
        function abrir_modal(ide, no, di, te){
            $("#id_suc").val(ide);
            $("#dir0").val(di);
            $("#tel0").val(te);
            $("#nom0").val(no);
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
                    text: "Desea eliminar la sucursal?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/suc_eliminar.php?valor="+idx;
                });
        }



        function validarSucenBD() {
            var nom = $("#nom").val();
            $.ajax({
                url: 'validacion/nombreBD.php?nom=' + nom + "&tipo=suc",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La sucrusal ya existe por favor, registrar con otro nombre");
                        $("#nom").val("");
                    }
                }
            });
        }

        function validarSucenBD2() {
            var nom = $("#nom0").val();
            var idem = $("#id_suc").val();
            $.ajax({
                url: 'validacion/nombreBD2.php?nom=' + nom + '&idreg=' + idem + "&tipo=suc",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La sucrusal ya existe por favor, registrar con otro nombre");
                        $("#nom0").val("");
                    }
                }
            });
        }


    </script>


</body>
</html>
