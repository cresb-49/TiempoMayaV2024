<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_cruz_maya_dia.php';
$nahual_dia = $nahual['nombre'];
$nahual_dia_imagen =  preg_replace('/[^a-zA-Z]/', '', $nahual_dia);
$nahual_dia_imagen = strtolower($nahual_dia_imagen);
$nahual_descripcion = $nahual['descripcionDiaCruz'];
$nahual_concepcion = $nahual['descripcionConcepcionNombre'];
$nahual_concepcion_imagen =  preg_replace('/[^a-zA-Z]/', '', $nahual_concepcion);
$nahual_concepcion_imagen = strtolower($nahual_concepcion_imagen);
$nahual_concepcion_descripcion = $nahual['descripcionConcepcion'];
$nahual_destino = $nahual['descripcionDestinoNombre'];
$nahual_destino_imagen =  preg_replace('/[^a-zA-Z]/', '', $nahual_destino);
$nahual_destino_imagen = strtolower($nahual_destino_imagen);
$nahual_destino_descripcion = $nahual['descripcionDestino'];
$nahual_derecho = $nahual['descripcionDerechoNombre'];
$nahual_derecho_imagen =  preg_replace('/[^a-zA-Z]/', '', $nahual_derecho);
$nahual_derecho_imagen = strtolower($nahual_derecho_imagen);
$nahual_derecho_descripcion = $nahual['descripcionDerecho'];
$nahual_izquierdo = $nahual['descripcionIzquierdoNombre'];
$nahual_izquierdo_imagen =  preg_replace('/[^a-zA-Z]/', '', $nahual_izquierdo);
$nahual_izquierdo_imagen = strtolower($nahual_izquierdo_imagen);
$nahual_izquierdo_descripcion = $nahual['descripcionIzquierdo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/cruzmaya.css" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio" class="fix_inicio_calculadora" style="height: 195vh;">
            <div id="inicioContainer" class="inicio-container">

                <div id='formulario'>
                    <h1>CRUZ MAYA</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>

                    <div class="contenedor_estela" style="display:flex; justify-content: center;">
                        <div class="estela" style="padding: 10px;">
                            <table class="maya-table">
                                <tr>
                                    <td>
                                    </td>
                                    <td style="background-color: red;">
                                        <div class="espacio_cruz">
                                            <h5 class="titulo_texto_cardinal">ESTE</h5>
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/nahuales_alterno/<?php echo $nahual_derecho_imagen; ?>.png" alt="Maya 1">
                                            </div>
                                            <p class="texto_cardinal">
                                                <?php echo $nahual_derecho; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: white;">
                                        <div class="espacio_cruz">
                                            <h5 class="titulo_texto_cardinal">NORTE</h5>
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/nahuales_alterno/<?php echo $nahual_destino_imagen; ?>.png" alt="Maya 1">
                                            </div>
                                            <p class="texto_cardinal">
                                                <?php echo $nahual_destino; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td style="background: linear-gradient(to right, blue, green);">
                                        <div class="espacio_cruz">
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/nahuales_alterno/<?php echo $nahual_dia_imagen; ?>.png" alt="Maya 1">
                                            </div>
                                            <p class="texto_cardinal">
                                                <?php echo $nahual_dia; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td style="background-color: yellow;">
                                        <div class="espacio_cruz">
                                            <h5 class="titulo_texto_cardinal">SUR</h5>
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/nahuales_alterno/<?php echo $nahual_concepcion_imagen; ?>.png" alt="Maya 1">
                                            </div>
                                            <p class="texto_cardinal"><?php echo $nahual_concepcion; ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="background-color: black;">
                                        <div class="espacio_cruz">
                                            <h5 class="titulo_texto_cardinal">OESTE</h5>
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/nahuales_alterno/<?php echo $nahual_izquierdo_imagen; ?>.png" alt="Maya 1">
                                            </div>
                                            <p class="texto_cardinal">
                                                <?php echo $nahual_izquierdo; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="contenedor_descripcion">
                        <h2 style="color:#c9592d">Concepcion</h2>
                        <p class="texto_cruz">
                            <?php echo $nahual_concepcion_descripcion; ?>
                        </p>
                        <h2 style="color:#c9592d">Mano Derecha</h2>
                        <p class="texto_cruz">
                            <?php echo $nahual_derecho_descripcion; ?>
                        </p>
                        <h2 style="color:#c9592d">Mano Izquierda</h2>
                        <p class="texto_cruz">
                            <?php echo $nahual_izquierdo_descripcion; ?>
                        </p>
                        <h2 style="color:#c9592d">Destino</h2>
                        <p class="texto_cruz">
                            <?php echo $nahual_destino_descripcion; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>