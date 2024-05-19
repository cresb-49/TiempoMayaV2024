<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);

//Creamos un array con split del caracter de "."
$cuenta_larga_array = explode(".", $cuenta_larga);

$x = $cuenta_larga_array[3];
$y = $cuenta_larga_array[4];
//Calcular el señor de la noche
$senor_noche = ((20 * $x + $y + 8) % 9 + 1);

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
    <link rel="stylesheet" href="css/cuentaLarga.css" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section class="inicio" >
            <div class="inicio-container">

                <div class='contenedor_formulario'>
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>

                    <div id="tabla" style="padding-right: 10%; padding-left: 10%;">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Calendario</th>
                                    <th scope="col" style="width: 60%;">Fecha</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td><?php echo isset($haab) ? $haab : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td><?php echo isset($cholquij) ? $cholquij : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Señor de la Noche</th>
                                    <td>G<?php echo isset($senor_noche) ? $senor_noche : ''; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $haab_array = explode(" ", $haab);
                    $haab_nombre = $haab_array[0];
                    //El nombre solo se permiten letras
                    $haab_nombre = preg_replace('/[^a-zA-Z]/', '', $haab_nombre);
                    // Lo hacemos lowercase
                    $haab_nombre = strtolower($haab_nombre);
                    $haab_numero = $haab_array[1];
                    //Array cholquij
                    $cholquij_array = explode(" ", $cholquij);
                    $cholquij_nombre = $cholquij_array[0];
                    //El nombre solo se permiten letras
                    $cholquij_nombre = preg_replace('/[^a-zA-Z]/', '', $cholquij_nombre);
                    // Lo hacemos lowercase
                    $cholquij_nombre = strtolower($cholquij_nombre);
                    $cholquij_numero = $cholquij_array[1];
                    ?>
                    <div class="contenedor_info">
                        <div class="contenedor_estela" style="display:flex; justify-content: center;">
                            <div class="estela" style="padding: 10px;">
                                <table class="maya-table">
                                    <tr>
                                        <td colspan="2">
                                            <div class="images-container">
                                                <img style="width: 400px; height: auto; object-fit: scale-down;" src="img/cuenta_larga/principal.png" alt="Superior Maya">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cuenta_larga_array[0] ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/cuenta_larga/baktun.png" alt="Maya 1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cuenta_larga_array[1] ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/cuenta_larga/katun.png" alt="Maya 2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cuenta_larga_array[2] ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/cuenta_larga/tun.png" alt="Maya 1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cuenta_larga_array[3] ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/cuenta_larga/unial.png" alt="Maya 2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cuenta_larga_array[4] ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/cuenta_larga/kin.png" alt="Maya 1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $cholquij_numero ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/nahuales/<?php echo $cholquij_nombre ?>.png" alt="Maya 2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_num" src="img/numeros/<?php echo $haab_numero ?>.png" alt="Descripción">
                                                <img class="maya_cal" src="img/uinales/<?php echo $haab_nombre ?>.png" alt="Maya 2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="images-container">
                                                <img class="maya_cal" src="img/cuenta_larga/g<?php echo $senor_noche ?>.png" alt="Maya 2">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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