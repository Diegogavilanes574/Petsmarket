<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Market Lab</title>
    <link rel="stylesheet" href="docs/assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="docs/assets/images/logoRF.png" type="image/x-icon">
    <link rel="stylesheet" href="docs/assets/css/app.css">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="docs/assets/images/logoRF.png" class='mb-1'>
                        <h3>Inicie Sesión</h3>
                        <p>Ingrese su usuario y contraseña</p>
                    </div>
                    <form action="docs/php/ingresar.php" method="post">
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Usuario</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="username" name="username" required>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Contraseña</label>
                                <a href="docs/auth-forgot-password.html" class='float-right'>
                                    <small>Se olvidó la contraseña?, Recuperala</small>
                                </a>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

<!--                        <div class='form-check clearfix my-4'>-->
<!--                            <div class="float-right">-->
<!--                                <a href="docs/auth-register.html">Don't have an account?</a>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="clearfix">
                            <button class="btn float-right" style="background-color: #1d9aac; color: white" type="submit">Ingresar</button>
                        </div>
                    </form>
                    <div class="divider">
                        <div class="divider-text">Síguenos en redes</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2" style="background-color: #1d9aac; color: white"><i data-feather="facebook"></i> Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-secondary"><i data-feather="instagram"></i> Instagram</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="docs/assets/js/feather-icons/feather.min.js"></script>
    <script src="docs/assets/js/app.js"></script>
    
    <script src="docs/assets/js/main.js"></script>
</body>

</html>
