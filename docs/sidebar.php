<?php
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
}

include ("../base/conexion.php");
$bd = BD::connect();
date_default_timezone_set("America/Guayaquil");

$rol_id = $_SESSION['rol'];
$ox1 = $ox2 = $ox3 = $ox4 = $ox5 = $ox6 = $ox7 = $ox8 = $ox9 = $ox10 = $ox11 = $ox12 = $ox13 = $ox14 = $ox15 = $ox16 = $ox17 = 0;

$query="select * from tipo_usuario where id_tipoUsuario=".$rol_id;
$resultado = $bd->query($query);
while($fila = $resultado->fetch_array()){
    $ox1 = $fila['op01'];
    $ox2 = $fila['op02'];
    $ox3 = $fila['op03'];
    $ox4 = $fila['op04'];
    $ox5 = $fila['op05'];
    $ox6 = $fila['op06'];
    $ox7 = $fila['op07'];
    $ox8 = $fila['op08'];
    $ox9 = $fila['op09'];
    $ox10 = $fila['op10'];
    $ox11 = $fila['op11'];
    $ox12 = $fila['op12'];
    $ox13 = $fila['op13'];
    $ox14 = $fila['op14'];
    $ox15 = $fila['op15'];
    $ox16 = $fila['op16'];
    $ox17 = $fila['op17'];
}

?>


<div id="sidebar" class='active' >
    <div class="sidebar-wrapper active" style="background: url('assets/images/background/auth3.jpg')">
        <div class="sidebar-header" >
            <img src="assets/images/logoRF.png" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">


                <li class='sidebar-title'>Menú Principal</li>



                <li class="sidebar-item active ">
                    <a href="index.php" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>

                </li>




                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="github" width="20"></i>
                        <span>Mascotas</span>
                    </a>

                    <ul class="submenu ">

                        <?php if($ox1==1){ ?>
                        <li>
                            <a href="cliente.php">Cliente</a>
                        </li>
                        <?php }
                            if($ox2==1){ ?>
                        <li>
                            <a href="paciente.php">Paciente</a>
                        </li>
                        <?php }
                            if($ox3==1){ ?>
                        <li>
                            <a href="raza.php">Raza</a>
                        </li>

                        <?php }
                            if($ox4==1){ ?>
                        <li>
                            <a href="especie.php">Especie</a>
                        </li>
                        <?php } ?>

                    </ul>

                </li>



                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="activity" width="20"></i>
                        <span>Veterinaria</span>
                    </a>

                    <ul class="submenu ">

                        <?php if($ox5==1){ ?>
                        <li>
                            <a href="sucursal.php">Sucursal</a>
                        </li>
                        <?php }if($ox6==1){ ?>
                        <li>
                            <a href="empleado.php">Empleados</a>
                        </li>
                        <?php }if($ox7==1){ ?>
                        <li>
                            <a href="tipo_usuario.php">Tipos de Usuario</a>
                        </li>
                        <?php } ?>

                        <?php if($ox16==1){ ?>
                            <li>
                                <a href="tipo_insumo.php">Tipo de insumo</a>
                            </li>
                        <?php } ?>

                        <?php if($ox17==1){ ?>
                            <li>
                                <a href="insumo.php">Insumo</a>
                            </li>
                        <?php } ?>



                        <?php if($ox15==1){ ?>
                        <li>
                            <a href="inventario.php">Inventario</a>
                        </li>
                        <?php } ?>



                    </ul>

                </li>




                <li class='sidebar-title'>Laboratorio</li>

                <?php if($ox8==1){ ?>
                <li class="sidebar-item  ">
                    <a href="diagnostico.php" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i>
                        <span>Diagnósticos</span>
                    </a>
                </li>
                <?php } ?>


                <?php if($ox9==1){ ?>
                <li class="sidebar-item  ">
                    <a href="tipo_examen.php" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i>
                        <span>Tipos de Exámen</span>
                    </a>
                </li>
                <?php } ?>

                <?php if($ox10==1){ ?>
                <li class="sidebar-item  ">
                    <a href="examen.php" class='sidebar-link'>
                        <i data-feather="clipboard" width="20"></i>
                        <span>Exámenes</span>
                    </a>
                </li>
                <?php } ?>

                <?php if($ox14==1){ ?>
                    <li class="sidebar-item  ">
                        <a href="grupo.php" class='sidebar-link'>
                            <i data-feather="grid" width="20"></i>
                            <span>Grupos de Exámenes</span>
                        </a>
                    </li>
                <?php } ?>


                <?php if($ox11==1){ ?>
                <li class="sidebar-item  ">
                    <a href="orden_examen.php" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Ordenes de exámen</span>
                    </a>
                </li>
                <?php } ?>

                <?php if($ox12==1){ ?>
                <li class="sidebar-item  ">
                    <a href="rpt_orden_examen.php" class='sidebar-link'>
                        <i data-feather="book" width="20"></i>
                        <span>Reporte de Ordenes</span>
                    </a>
                </li>
                <?php } ?>

                <?php if($ox13==1){ ?>
                <li class='sidebar-title'>Encuesta</li>


                    <li class="sidebar-item  ">
                        <a href="preguntas.php" class='sidebar-link'>
                            <i data-feather="globe" width="20"></i>
                            <span>Preguntas/Respuestas</span>
                        </a>
                    </li>

                <?php } ?>

                <li class="sidebar-item  ">
                    <a href="../cerrar_sesion.php" class='sidebar-link'>
                        <i data-feather="log-out" width="20"></i>
                        <span>Salir del software</span>
                    </a>

                </li>






            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>