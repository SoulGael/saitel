<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" data-find="_13">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Soluciones Avanzadas Informáticas y Telecomunicaciones SAITEL, es una empresa que fue creada con el fin principal de brindar a la colectividad el servicio de Internet.">
        <meta name="author" content="Romero Giovanni - 0987868133">
        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Saitel-Internet Wireless para todo el Ecuador</title>
        <link rel="stylesheet" href="../../css/uikit.min.css" />
        <link rel="stylesheet" href="../../css/components/slideshow.css" />
        <link rel="stylesheet" href="../../css/components/slidenav.css" />
        <link rel="stylesheet" href="../../css/components/dotnav.gradient.css" />
        <link rel="stylesheet" href="../../vendor/highlight/highlight.css" />

        <script src="../../js/jquery.js"></script>
        <script src="../../js/uikit.js"></script>
        <script src="../../js/uikit.min.js"></script>
        <script src="../../js/components/slideshow.js"></script>
        <script src="../../js/components/slideshow-fx.js"></script>
        <script src="../../js/core/grid.min.js"></script>
        <script src="../../js/core/grid.js"></script>
        <script src="../../js/facElectronica.js"></script>
        <script src="../../vendor/highlight/highlight.js"></script>
        <script src="../../js/components/sticky.js"></script>
        <script async src="//www.google-analytics.com/analytics.js"></script>

    </head>
    <body data-find="_12" style="background-color: rgb(230, 230, 230);">
        <div id="fb-root"></div>
        <!--NAV-->
        <nav class='uk-navbar uk-navbar-attached'>
            <div id="my-id" class='uk-container uk-container-center'>
                <a href="../../index.html" class='uk-navbar-brand uk-hidden-small'>
                    <img class='uk-margin uk-margin-remove' src="../../images/logosfondo.png" width="100" height="40" title="Saitel" alt="Saitel">
                </a>
                <ul class="uk-tab">
                    <li class="uk-active" data-uk-dropdown="{mode:'hover',justify:'#my-id'}"  aria-expanded="true" aria-haspopup="true">
                        <!-- This is the menu item toggling the dropdown -->
                        <a href="#"> Planes y Servicios
                            <i class="uk-icon-hover  uk-icon-laptop"></i>
                        </a>
                        <!-- This is the dropdown -->
                        <div class="uk-dropdown uk-dropdown-navbar">
                            <ul class="uk-subnav uk-subnav-line">
                                <div class="uk-grid uk-container-center" data-uk-grid-margin>
                                    <div class="uk-flex uk-flex-column">
                                    <div class="uk-grid uk-width-medium-1-1">
                                        <div class="uk-width-medium-1-5" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../escojeTuPlan.html" class="uk-icon-hover uk-icon-large uk-icon-cart-plus"></a>
                                                    <br>Escoje tu mejor Plan
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-5" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../planesHogar.html" class="uk-icon-hover uk-icon-large uk-icon-laptop"></a>
                                                    <br>Planes Residenciales
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-5" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../planesSmall.html" class="uk-icon-hover uk-icon-large uk-icon-group"></a>
                                                    <br>Planes Small
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-5" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../planesEmpresa.html" class="uk-icon-hover uk-icon-large uk-icon-suitcase"></a>
                                                    <br>Planes Corporativos
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-5" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../planesFibra.html" class="uk-icon-hover uk-icon-large uk-icon-server"></a>
                                                    <br>Fibra
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-width-medium-1-1">
                                        <div class="uk-width-medium-1-4" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../medidorVelocidad.html" class="uk-icon-hover uk-icon-large uk-icon-dashboard"></a>
                                                    <br>Medidor de Velocidad
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-4" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li><a href="../facturaElectronica/index.php" class="uk-icon-hover uk-icon-large uk-icon-barcode"></a>
                                                    <br>Factura Electrónica
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-4" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../planillas.html" class="uk-icon-hover uk-icon-large uk-icon-qrcode"></a>
                                                    <br>Planillas
                                                </li>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-4" style='text-align: center;'>
                                            <div class="uk-panel uk-panel-box">
                                                <li>
                                                    <a href="../formasPago.html" class="uk-icon-hover uk-icon-large uk-icon-money"></a>
                                                    <br>Formas de Pago
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li data-uk-dropdown="{mode:'hover',justify:'#my-id'}"  aria-expanded="true" aria-haspopup="true">
                        <!-- This is the menu item toggling the dropdown -->
                        <a href="#"> Empresa
                            <i class="uk-icon-hover  uk-icon-gears"></i>
                        </a>
                        <!-- This is the dropdown -->
                        <div class="uk-dropdown uk-dropdown-navbar">
                            <ul class="uk-subnav uk-subnav-line">
                                <div class="uk-grid uk-container-center" data-uk-grid-margin>
                                    <div class="uk-flex uk-flex-column">
                                        <div class="uk-grid uk-width-medium-1-1">
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../sucursales.html" class="uk-icon-hover uk-icon-large uk-icon-sitemap"></a>
                                                        <br>Sucursales
                                                    </li>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../empresa.html" class="uk-icon-hover uk-icon-large uk-icon-tasks"></a>
                                                        <br>Antecedentes
                                                    </li>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../empresa.html#mision" class="uk-icon-hover uk-icon-large uk-icon-check-square-o"></a>
                                                        <br>Mision
                                                    </li>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../empresa.html#vision" class="uk-icon-hover uk-icon-large uk-icon-cloud"></a>
                                                        <br>Vision
                                                    </li>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../empresa.html#objetivos" class="uk-icon-hover uk-icon-large uk-icon-line-chart"></a>
                                                        <br>Objetivos
                                                    </li>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6" style='text-align: center;'>
                                                <div class="uk-panel uk-panel-box">
                                                    <li>
                                                        <a href="../Directivos.html" class="uk-icon-hover uk-icon-large uk-icon-male"></a>
                                                        <a href="../Directivos.html" class="uk-icon-hover uk-icon-large uk-icon-male"></a>
                                                        <br>Directivos
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="../dondeEstamos.html"> Donde Estamos
                            <i class="uk-icon-hover uk-icon-street-view"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../cobertura.html"> Cobertura
                            <i class="uk-icon-hover uk-icon-flag"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../contactos.html"> Contactos
                            <i class="uk-icon-hover uk-icon-users"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../seguridad.html"> Seguridad
                            <i class="uk-icon-hover uk-icon-key"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="tm-middle" data-find="_11">
            <div style="background: rgba(0, 85, 151, 0.9);"><b class="uk-text-primary">_</b> </div>
            <!--DATOS-->
            <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom" >
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-grid-margin data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:300,repeat: true}">
                            <!--<div class="uk-width-medium-1-3">
                                    <img class="uk-border-rounded" width="300" src="../images/antecedentes.jpg" alt="">
                                </div>-->
                            <div class="uk-width-1-1">
                                <h2 class="uk-text-bold">Facturación Electrónica</h2>
                                <p class="uk-text-justify">SAITEL pone a tu disposición el servicio de FACTURA ELECTRÓNICA, recibe la factura mensual de tu servicio directamente a tu correo electrónico y puedes descargar tu factura eletrónica desde www.saitel.ec Reduce el tiempo de recepción del estado de cuenta y apoya al medio ambiente en la disminución de uso de papel</p>
                            </div>
                            <div class="uk-vertical-align uk-text-center" data-uk-grid-margin>
                                <div class="uk-vertical-align-middle">
                                    <form class="uk-panel uk-panel-box uk-form">
                                        <div class="uk-form-row">
                                            <input class="uk-width-1-1 uk-form-large" type="text" id="cedula" name="cedula" placeholder="Cédula o Ruc">
                                        </div>
                                        <div class="uk-form-row">
                                            <div class="uk-button-group">
                                                <a class="uk-width-1-2 uk-button uk-button-primary uk-button-large" id="clickCliente" name="clickCliente">Cliente</a>
                                                <a class="uk-width-1-2 uk-button uk-button-primary uk-button-large" id="clickProveedor" name="clickProveedor">Proveedor</a>
                                            </div>
                                        </div>
                                        <div class="uk-form-row" id="datos">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <br>
            <div style="background: rgba(0, 85, 151, 0.9);" class="uk-block uk-contrast uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-slide-top',delay:100,repeat: true}">
            <!--238, 165, 72, 0.9<div class="uk-block uk-contrast uk-scrollspy-init-inview uk-block-primary" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:100,repeat: true}">-->
                <div class="uk-container uk-container-center">
                    <div class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3>AYUDA AL CLIENTE</h3>
                                <hr>
                                <a href="../../docs/verificacionContratado.pdf" target="_blank" class="uk-text-small uk-text-contrast">Guía para Verificación de Ancho de Banda Contratado</a><br>
                                <a href="../glosarioTerminos.html" class="uk-text-small uk-text-contrast">Glosario de Términos</a><br>
                                <a href="../medidorVelocidad.html" class="uk-text-small uk-text-contrast">Test de Velocidad</a><br>
                                <a href="../reclamos.html" class="uk-text-small uk-text-contrast">Reclamos</a><br>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3>ENLACES GUBERNAMENTALES</h3>
                                <hr>
                                <a href="http://www.arcotel.gob.ec/" class="uk-text-small uk-text-contrast" target="_blank">ARCOTEL</a><br>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3>INFORMACIÓN ADICIONAL</h3>
                                <hr>
                                <a href="../../docs/reglamento_abonados.pdf" class="uk-text-small uk-text-contrast" target="_blank">Reglamento de Abonados</a><br>
                                <a href="../../docs/norma_sva.pdf" class="uk-text-small uk-text-contrast" target="_blank">Reglamento Norma SVA</a><br>
                                <a href="../mejorar.html" class="uk-text-small uk-text-contrast">Ayudanos a Mejorar</a><br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="uk-container-center uk-width-medium-1-3">
                        <img src="../../images/logosfondo.png" width="150" height="100">
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=1607266319561188&l=04eab0ede6" data-width="500"></div>-->
    </body>
</html>