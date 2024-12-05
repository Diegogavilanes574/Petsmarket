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

    <?php $titulo = "Módulo: Grupos de exámenes"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar los exámenes de los diferentes grupos.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Laboratorio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grupo de exámenes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ingreso de Grupo
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="post" action="php/gru_grabar.php" id="formulario">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nom">Nombre</label>
                                <input type="text" id="nom" class="form-control" onchange="validarGrenBD();" name="nom"
                                       placeholder="Escriba el nombre del nuevo grupo" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="esp">Tipo de Exámenes</label>
                                <select id="tex0" name="tex" class="form-select">
                                    <option value="0">--SELECCIONAR UNA OPCION--</option>
                                    <?php
                                    $query="select * from tipo_examen where estado=1";
                                    $resultado = $bd->query($query);
                                    while($fila = $resultado->fetch_array()){
                                        ?>

                                        <option value="<?php echo $fila['id_tipoExamen']; ?>"><?php echo $fila['nombre']; ?></option>

                                    <?php } ?>
                                </select>
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
                Relación de Grupo con los Exámenes
            </div>
            <div class="card-body">

                <form class="form form-vertical" method="post" action="php/gru_editar.php" id="formulario2">
                    <div class="col-12">
                        <div class="form-group">

                            <label for="suc">Grupo</label>
                            <select id="dia" name="dia" class="form-select" onchange="poner_examenes()" >
                                <option value="0">--SELECCIONAR UNA OPCION--</option>
                                <?php
                                $query="select * from cab_grupo where estado=1";
                                $resultado = $bd->query($query);
                                while($fila = $resultado->fetch_array()){
                                    ?>

                                    <option value="<?php echo $fila['id_grupo']; ?>"><?php echo $fila['nombre']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ssin">Exámenes</label>
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
                Grupos ya creados
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
                    $query="select * from cab_grupo where estado=1";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                           <td>
                               <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_grupo']; ?>',  '<?php echo $fila['nombre']; ?>')">Editar</button>

                               <?php
                               $band = false;
                               $query2="select * from examen t, det_grupo e where t.estado=1 and t.id_examen=e.id_examen and e.id_grupo=".$fila['id_grupo'];
                               $resultado2 = $bd->query($query2);
                               while($fila2 = $resultado2->fetch_array()) {
                                   $band = true;
                               }
                               if(!$band) { ?>

                                   <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_grupo']; ?>')">Eliminar</button>
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



    <?php
    if (isset($_GET['mn'])){
        $num = $_GET['mn'];
        if($num==1 || $num=="1"){
            echo '<script>swal("Grupo eliminado con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Grupo ingresado con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Grupo actualizado con éxito");</script>';
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
            if(dia==0) swal("Por favor elegir un grupo");
            else{
                $("#formulario2").submit();
            }
        }

        function cerrar_modal(){
            $("#primary").modal("hide");
        }

        function poner_examenes(){
            let cod_fr = $("#dia").val();
            var myNode = document.getElementById("sintomas");
            myNode.innerHTML = '';

            $.ajax({
                url: 'php/agregarexamen.php?id_sin=' + cod_fr,
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
                    text: "Desea eliminar el grupo?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/gru_eliminar.php?valor="+idx;
                });
        }



        function validarGrenBD() {
            var nom = $("#nom").val();
            $.ajax({
                url: 'validacion/nombreBD.php?nom=' + nom + "&tipo=gru",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El grupo ya existe por favor, registrar con otro nombre");
                        $("#nom").val("");
                    }
                }
            });
        }

        function validarGrenBD2() {
            var nom = $("#nom0").val();
            var idem = $("#id_dia").val();
            $.ajax({
                url: 'validacion/nombreBD2.php?nom=' + nom + '&idreg=' + idem + "&tipo=gru",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El grupo ya existe por favor, registrar con otro nombre");
                        $("#nom0").val("");
                    }
                }
            });
        }


    </script>


</body>
</html>
