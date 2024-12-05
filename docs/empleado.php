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

    <?php $titulo = "Módulo: Empleado"; ?>

    <div class="page-title">


        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $titulo; ?></h3>
                <p class="text-subtitle text-muted">Módulo para poder ingresar, actualizar y eliminar empleados. Puede cambiar la contraseña de los empleados</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Veterinaria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empleado</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


            <div class="card">
                <div class="card-header">
                    Ingreso de Empleados
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#info"> Crear Nuevo </button>
                </div>
            </div>


        <div class="card">
            <div class="card-header">
                Empleados ya creados
            </div>
            <div class="card-body">
                <table class='table table-striped table-bordered' id="table1">
                    <thead>
                        <tr >
                            <th style="background-color: #1d9aac;" class="text-white">Cédula</th>
                            <th style="background-color: #1d9aac;" class="text-white">Nombres</th>
                            <th style="background-color: #1d9aac;" class="text-white">Correo</th>
                            <th style="background-color: #1d9aac;" class="text-white">Usuario</th>
                            <th style="background-color: #1d9aac;" class="text-white">Datos</th>
                            <th style="background-color: #1d9aac;" class="text-white">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query="select e.*, u.nombre usu, u.id_usuario, u.id_tipoUsuario, u.clave from usuario u, empleado e where e.estado=1 and u.id_empleado=e.id_empleado";
                    $resultado = $bd->query($query);
                    while($fila = $resultado->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $fila['cedula']; ?></td>
                            <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo $fila['usu']; ?></td>
                            <td>Dirección: <?php echo $fila['direccion']; ?>, Celular: <?php echo $fila['telf']; ?> </td>
<!--                            <td> <span class="badge bg-success">Active</span> </td>-->
                            <td>
                                <button type="button" class="btn btn-primary" onclick="abrir_modal('<?php echo $fila['id_empleado']; ?>', '<?php echo $fila['id_usuario']; ?>', '<?php echo $fila['id_tipoUsuario']; ?>','<?php echo $fila['nombre']; ?>','<?php echo $fila['apellido']; ?>','<?php echo $fila['cedula']; ?>','<?php echo $fila['direccion']; ?>','<?php echo $fila['telf']; ?>','<?php echo $fila['correo']; ?>', '<?php echo $fila['edad']; ?>', '<?php echo $fila['sexo']; ?>', '<?php echo $fila['nacionalidad']; ?>', '<?php echo $fila['id_sucursal']; ?>', '<?php echo $fila['clave']; ?>', '<?php echo $fila['usu']; ?>')">Editar</button>

                              <?php if($fila['id_tipoUsuario'] != 1) { ?>
                                <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $fila['id_empleado']; ?>')">Eliminar</button>
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
                    <h5 class="modal-title white" id="myModalLabel130">Ingresar Nuevo Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/emp_grabar.php" id="formulario">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="ced">Cédula</label>
                                                    <input type="text" id="ced" name="ced" maxlength="10" onchange="validarCed(); validarCedenBD();"  class="form-control" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la cédula" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="suc">Sucursal</label>
                                                    <select id="suc" name="suc" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <?php
                                                        $query="select * from sucursal where estado=1";
                                                        $resultado = $bd->query($query);
                                                        while($fila = $resultado->fetch_array()){
                                                            ?>

                                                            <option value="<?php echo $fila['id_sucursal']; ?>"><?php echo $fila['nombre']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom" class="form-control" name="nom" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ape">Apellido</label>
                                                    <input type="text" id="ape" class="form-control" name="ape" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los apellidos" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="usu">Usuario</label>
                                                    <input type="text" id="usu" class="form-control" name="usu" onchange="validarUsenBD();" maxlength="10"
                                                           placeholder="Escriba el usuario" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
<!--                                                    <div class="form-group">-->
<!--                                                        <label for="usu">Contraseña</label>-->
<!--                                                        <input type="password" id="pas" class="form-control" name="pas"-->
<!--                                                               placeholder="Escriba la contraseña">-->
<!--                                                        <span>Mostrar</span>-->
<!--                                                    </div>-->
                                                <div class="form-group">
                                                    <label for="pas">Contraseña</label>
                                                    <div class="password-wrapper">

                                                        <input type="password" id="pas" class="form-control" name="pas" maxlength="15" required/>
                                                        <div class="toggle-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon" onclick="cambiar()">
                                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="suc">Tipo de usuario</label>
                                                    <select id="tus" name="tus" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <?php
                                                        $query="select * from tipo_usuario where estado=1";
                                                        $resultado = $bd->query($query);
                                                        while($fila = $resultado->fetch_array()){
                                                            ?>

                                                            <option value="<?php echo $fila['id_tipoUsuario']; ?>"><?php echo $fila['nombre']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir" class="form-control" name="dir"
                                                           placeholder="Escriba la dirección" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel" class="form-control" name="tel"
                                                           placeholder="Escriba el teléfono convencional o celular" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cor">Correo</label>
                                                    <input type="email" id="cor" class="form-control" name="cor" onchange="validarCorreo()"
                                                           placeholder="Escriba el correo" required>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="eda">Edad</label>
                                                    <input type="text" id="eda" class="form-control" name="eda" maxlength="2" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la edad" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="sex">Sexo</label>
                                                    <select id="sex" name="sex" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                        <option value="NO DEFINIDO">NO DEFINIDO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nac">Nacionalidad</label>
                                                    <input type="text" id="nac" class="form-control" name="nac" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba la nacionalidad" required>
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
                    <h5 class="modal-title white" id="myModalLabel160">Editar Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" action="php/emp_editar.php" id="formulario2">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">

                                                <input type="hidden" id="id_emple" name="id_emple">
                                                <input type="hidden" id="id_usu" name="id_usu">


                                                <div class="form-group">
                                                    <label for="ced">Cédula</label>
                                                    <input type="text" id="ced0" name="ced" maxlength="10" onchange="validarCed2(); validarCedenBD2();"  class="form-control" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la cédula" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="suc">Sucursal</label>
                                                    <select id="suc0" name="suc" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <?php
                                                        $query="select * from sucursal where estado=1";
                                                        $resultado = $bd->query($query);
                                                        while($fila = $resultado->fetch_array()){
                                                        ?>

                                                        <option value="<?php echo $fila['id_sucursal']; ?>"><?php echo $fila['nombre']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nom">Nombre</label>
                                                    <input type="text" id="nom0" class="form-control" name="nom" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ape">Apellido</label>
                                                    <input type="text" id="ape0" class="form-control" name="ape" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba los apellidos" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="usu">Usuario</label>
                                                    <input type="text" id="usu0" class="form-control" onchange="validarUsenBD2();" name="usu" maxlength="10"
                                                           placeholder="Escriba el usuario" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="pas">Contraseña</label>
                                                    <div class="password-wrapper">

                                                        <input type="password" id="pas0" class="form-control" name="pas" maxlength="15" required/>
                                                        <div class="toggle-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon" onclick="cambiar2()">
                                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="suc">Tipo de usuario</label>
                                                    <select id="tus0" name="tus" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <?php
                                                        $query="select * from tipo_usuario where estado=1";
                                                        $resultado = $bd->query($query);
                                                        while($fila = $resultado->fetch_array()){
                                                            ?>

                                                            <option value="<?php echo $fila['id_tipoUsuario']; ?>"><?php echo $fila['nombre']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="dir">Dirección</label>
                                                    <input type="text" id="dir0" class="form-control" name="dir"
                                                           placeholder="Escriba la dirección" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tel">Teléfono</label>
                                                    <input type="text" id="tel0" class="form-control" name="tel"
                                                           placeholder="Escriba el teléfono convencional o celular" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cor">Correo</label>
                                                    <input type="email" id="cor0" class="form-control" name="cor" onchange="validarCorreo0()"
                                                           placeholder="Escriba el correo" required>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="eda">Edad</label>
                                                    <input type="text" id="eda0" class="form-control" name="eda" maxlength="2" onkeypress="return soloNumeros(event)"
                                                           placeholder="Escriba la edad" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="sex">Sexo</label>
                                                    <select id="sex0" name="sex" class="form-select">
                                                        <option value="0">--SELECCIONAR UNA OPCION--</option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                        <option value="NO DEFINIDO">NO DEFINIDO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nac">Nacionalidad</label>
                                                    <input type="text" id="nac0" class="form-control" name="nac" onkeypress="return soloLetras(event)"
                                                           placeholder="Escriba la nacionalidad" required>
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
            echo '<script>swal("Empleado eliminado con éxito");</script>';
        }else if($num == 3 || $num=="3"){
            echo '<script>swal("Empleado ingresado con éxito");</script>';
        }else if($num == 4 || $num=="4"){
            echo '<script>swal("Empleado actualizado con éxito");</script>';
        }else{
            echo '<script>swal("Hubo un inconveniente, por favor vuelva a intentar más tarde");</script>';
        }
    }
    ?>

    <script>
        var h = 1;
        var h1 = 1;
        function abrir_modal(ide, idu, idt, no, ap, ce, di, te, co, ed, se,na, ids, cl, us){
            $("#id_emple").val(ide);
            $("#id_usu").val(idu);
            $("#tus0").val(idt);
            $("#nom0").val(no);
            $("#ape0").val(ap);
            $("#ced0").val(ce);
            $("#dir0").val(di);
            $("#tel0").val(te);
            $("#cor0").val(co);
            $("#eda0").val(ed);
            $("#sex0").val(se);
            $("#nac0").val(na);
            $("#suc0").val(ids);
            $("#pas0").val(cl);
            $("#usu0").val(us);
            $("#primary").modal("show");
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

        function validarCorreo(){
            var cor = $("#cor").val();
            var patron = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
            var resp = patron.test(cor);
            if (resp==false){
                swal("Por favor escribir de forma correcta el correo");
                $("#cor").val("");
            }
        }

        function validarCorreo0(){
            var cor = $("#cor0").val();
            var patron = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
            var resp = patron.test(cor);
            if (resp==false){
                swal("Por favor escribir de forma correcta el correo");
                $("#cor0").val("");
            }
        }

        function  eliminar(idx){
            swal({
                    title: "PET'S MARKET LAB",
                    text: "Desea eliminar al empleado?",
                    type: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                },
                function() {
                    window.location.href ="php/emp_eliminar.php?valor="+idx;
                });
        }

        function validarCed() {
            var parametros = $("#formulario").serialize();

            $.ajax({
                data: parametros,
                url: 'validacion/cedValida.php',
                type: 'post',

                success: function(response) {
                    console.log(response);
                    if (response == "cedula2") {
                        swal("La cédula es invalida por favor ingresar un valor correcto");
                        $("#ced").val("");

                    }

                }
            });
        }

        function validarCed2() {
            var parametros = $("#formulario2").serialize();

            $.ajax({
                data: parametros,
                url: 'validacion/cedValida.php',
                type: 'post',

                success: function(response) {
                    console.log(response);
                    if (response == "cedula2") {
                        swal("La cédula es invalida por favor ingresar un valor correcto");
                        $("#ced0").val("");

                    }

                }
            });
        }

        function validarCedenBD() {
            var cedw = $("#ced").val();
            $.ajax({
                url: 'validacion/cedulaBD.php?ced=' + cedw,
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La cédula ya existe por favor, registrar otra cédula");
                        $("#ced").val("");
                    }
                }
            });
        }

        function validarCedenBD2() {
            var cedw = $("#ced0").val();
            var idem = $("#id_emple").val();
            $.ajax({
                url: 'validacion/cedulaBD2.php?ced=' + cedw + '&idreg=' + idem,
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("La cédula ya existe por favor, registrar otra cédula");
                        $("#ced0").val("");
                    }
                }
            });
        }

        function validarUsenBD() {
            var cedw = $("#usu").val();
            $.ajax({
                url: 'validacion/nombreBD.php?nom=' + cedw + "&tipo=usu",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El nombre del usuario ya existe por favor, registrar otro usuario");
                        $("#usu").val("");
                    }
                }
            });
        }

        function validarUsenBD2() {
            var cedw = $("#usu0").val();
            var idem = $("#id_usu").val();
            $.ajax({
                url: 'validacion/nombreBD2.php?nom=' + cedw + '&idreg=' + idem + "&tipo=usu",
                type: 'get',
                success: function(response) {
                    console.log(response);
                    if (response == "si") {
                        swal("El nombre del usuario ya existe por favor, registrar otro usuario");
                        $("#usu0").val("");
                    }
                }
            });
        }


    </script>


</body>
</html>
