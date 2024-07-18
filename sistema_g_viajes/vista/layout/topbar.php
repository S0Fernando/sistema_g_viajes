<!doctype html>
<html lang="es">

<head>

    <head lang="es">
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <title>Plantilla-php</title>



        <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
        <link href="../public/app/publico/css/lib/font-awesome/font-awesome.min.css" rel="stylesheet">
        <link href="../public/bootstrap5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <link rel="stylesheet" href="../public/app/publico/css/lib/lobipanel/lobipanel.min.css">
        <link rel="stylesheet" href="../public/app/publico/css/separate/vendor/lobipanel.min.css">
        <link rel="stylesheet" href="../public/app/publico/css/lib/jqueryui/jquery-ui.min.css">
        <link rel="stylesheet" href="../public/app/publico/css/separate/pages/widgets.min.css">

        <!-- font awesome -->
        <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../public/fontawesome/css/fontawesome.min.css">

        <!-- datatables -->
        <link rel="stylesheet" href="../public/app/publico/css/lib/datatables-net/datatables.min.css">
        <link rel="stylesheet" href="../public/app/publico/css/separate/vendor/datatables-net.min.css">

        <link href="../public/app/publico/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="../public/app/publico/css/main.css" rel="stylesheet">
        <link href="../public/app/publico/css/mis_estilos/estilos.css" rel="stylesheet">

        <!-- form -->
        <link rel="stylesheet" type="text/css" href="../public/app/publico/css/lib/jquery-flex-label/jquery.flex.label.css"> <!-- Original -->

        <!-- mis estilos -->
        <link href="../public/principal/css/estilos.css" rel="stylesheet">

        <!-- pNotify -->
        <link href="../public/pnotify/css/pnotify.css" rel="stylesheet" />
        <link href="../public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
        <link href="../public/pnotify/css/custom.min.css" rel="stylesheet" />

        <!-- google fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

        <!-- pnotify -->
        <script src="../public/pnotify/js/jquery.min.js">
        </script>
        <script src="../public/pnotify/js/pnotify.js">
        </script>
        <script src="../public/pnotify/js/pnotify.buttons.js">
        </script>

        <!-- alpine js -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- chart js -->
        <script src="../public/chart/chart.js"></script>

        <style>
            .marca {
                width: 100%;
                background: rgb(13, 39, 48);
                position: fixed;
                bottom: 0;
                z-index: 999;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 10px;
            }

            .marca__parrafo {
                margin: 0 !important;
                color: white;
            }

            .marca__texto {
                color: rgb(0, 162, 255);
                text-decoration: underline;
            }

            .marca__parrafo span {
                color: red;
            }

            .page-content {
                margin-top: 70px;
            }

            @media screen and (max-width:1056px) {
                .page-content {
                    padding: 15px !important;
                }
            }

            a.item {
                text-decoration: none;
                background: #053B1F;
                color: white;
                padding: 10px;
                border-radius: 5px;
            }

            li {
                list-style: none;
            }

            .lista {
                margin-top: 10px !important;
            }
            .vinculos{
                display: flex;
                flex-direction: row;
                justify-content: center;
                gap: 15px;
            }
        </style>

    </head>
</head>

<body class="with-side-menu">
    <div id="app">

        <header class="site-header" style="background: #106138;">
            <div class="vinculos" style="padding-left: 40px;">

                <li class="lista">
                    <a href="inicio.php" class="destino item">
                        <span class="lbl"><i class="fas fa-map-marker-alt"></i> DESTINOS</span>
                    </a>
                </li>

                <li class="lista">
                    <a href="turista.php" class="turista item">
                        <span class="lbl"><i class="fas fa-hiking"></i> TURISTAS</span>
                    </a>
                </li>

                <li class="lista">
                    <a href="reserva.php" class="reserva item">
                        <span class="lbl"><i class="fas fa-receipt"></i> RESERVA VIAJES</span>
                    </a>
                </li>

                <li class="lista">
                    <a href="../controlador/controlador_cerrar_sesion.php" class="item">
                        <span class="lbl"><i class="fas fa-power-off"></i> SALIR</span>
                    </a>
                </li>



            </div>
            <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
    </header>

    <div class="mobile-menu-left-overlay">
    </div>