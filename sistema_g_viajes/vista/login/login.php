<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <title>Inicio de sesión</title>
</head>

<body>
    <div class="container">
        <div class="img">
        </div>
        <div class="login-content">
            <form method="POST" action="">
                <img src="img/avatar.svg">
                <!-- <h2 class="title">BIENVENIDO</h2> -->
                <!-- AQUI VA EL MENSAJE DE ERROR -->
                    <div class="alert alert-white alert-dismissible fade show mb-0 text-dark" role="alert">
                        <small>
                            <?php
                            include "../../config/conexion.php";
                            include "../../controlador/controlador_login.php";
                            ?>
                        </small>
                       
                    </div>              
                <div class="input-div one">
                    <div class="i">
                        
                    </div>
                    <div class="div">
                        <input id="usuario" type="text"
                            class="input" name="usuario"
                            title="ingrese su nombre de usuario" autocomplete="usuario" placeholder="Usuario">


                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        
                    </div>
                    <div class="div">
                        <input type="password" id="input" class="input"
                            name="password" title="ingrese su clave para ingresar" placeholder="Contraseña">


                    </div>
                </div>
                

                <input name="btningresar" class="btn" title="click para ingresar" type="submit"
                    value="INICIAR SESION">
            </form>
        </div>
    </div>
    <script src="js/fontawesome.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>
