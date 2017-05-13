<?php
session_start();
include '../../js/procesos/autenticacion.php';
autenticar();
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
        <link rel="stylesheet" href="../../css/components/datepicker.css" />
        <link rel="stylesheet" href="../../vendor/highlight/highlight.css" />

        <script src="../../js/jquery.js"></script>
        <script src="../../js/uikit.js"></script>
        <script src="../../js/components/slideshow.js"></script>
        <script src="../../js/components/slideshow-fx.js"></script>
        <script src="../../js/core/grid.min.js"></script>
        <script src="../../js/core/grid.js"></script>
        <script src="../../js/provedor.js"></script>
        <script src="../../vendor/highlight/highlight.js"></script>
        <script src="../../js/components/sticky.js"></script>
        <script src="../../js/components/datepicker.js"></script>
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
                <ul class="uk-tab uk-tab-flip">
                    <li><a href="../facturaElectronica/index.php">Cerrar Sesion</a></li>
                    <li><a href=""> <?php echo $_SESSION['nombres']; ?></a></li>
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
                            <div class="uk-grid uk-width-medium-1-1">
                                <div class="uk-width-1-4">
                                    <input id="desde" type="text" class="uk-form-small uk-form-width-medium" data-uk-datepicker="{format:'DD-MM-YYYY'}" placeholder="Desde">
                                </div>
                                <div class="uk-width-1-4">
                                    <input id="hasta" type="text" class="uk-form-small uk-form-width-medium" data-uk-datepicker="{format:'DD-MM-YYYY'}" placeholder="Hasta">
                                </div>
                                <div class="uk-width-1-4">
                                    <input id="cedu" type="hidden" value="<?php echo $_SESSION['ced']; ?>">
                                    <input id="id" type="hidden" value="<?php echo $_SESSION['id']; ?>">
                                </div>
                                <!--<a class="uk-width-1-2 uk-button uk-button-primary uk-button-large" id="clickCliente" name="clickCliente">Cliente</a>-->
                            </div>
                            <div class="uk-grid uk-width-medium-1-1">
                                <div class="uk-button-group">
                                    <a class="uk-button uk-button-primary uk-button-large" id="clickRetenciones">Retencion por Facturación</a>
                                    <a class="uk-button uk-button-primary uk-button-large" id="clickLiquidaciones">Retencion por Liquidación</a>
                                </div>
                            </div>
                            <div id="datosRetencion"></div>
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