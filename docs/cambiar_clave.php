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

    <?php $titulo = "Módulo: Cambio de Contraseña"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder cambiar la contraseña del usuario.</p>
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
                    Cambio de contraseña
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/cont_cambiar.php" id="formulario">
                        <div class="form-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nom">Contraseña Anterior</label>
                                        <input type="password" id="passAnt" class="form-control" name="passAnt"
                                               placeholder="Escriba la contraseña anterior" required>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="dir">Contraseña Nueva:</label>
                                        <input type="password" id="passNuev" class="form-control" name="passNuev"
                                               placeholder="Escriba la nueva contraseña" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tel">Confirmar la nueva contraseña</label>
                                        <input type="password" id="passNuev2" class="form-control" name="passNuev2" onchange="revisar_cont()"
                                               placeholder="Repita la nueva contraseña" required>
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

    <script src="assets/js/vendors.js"></script>


    <script src="assets/js/main.js"></script>


    <?php
    if (isset($_GET['mn'])){
        $num = $_GET['mn'];
        if($num==1 || $num=="1"){
            echo '<script>swal("Contraseña eliminada con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Contraseña ingresada con éxito");</script>';
        }else if($num == 2 || $num=="2"){
            echo '<script>swal("Contraseña actualizada con éxito");</script>';
        }else{
            echo '<script>swal("La contraseña anterior no es la correcta, intentelo de nuevo");</script>';
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
            var patron =/[0-9]/;
            var te = String.fromCharCode(tecla);
            return patron.test(te);
        }

        function revisar_cont(){
            var pass1 = $("#passNuev").val();
            var pass2 = $("#passNuev2").val();

            if(pass1 != pass2){
                $("#passNuev2").val("");
                swal("La confirmación de la contraseña no es la misma, por favor volver a escribirla");
            }



        }


    </script>


</body>
</html>
