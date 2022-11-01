<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <style>
        h2 {
            color: blue;
            font-family: sans-serif;
        }

        h4 {
            color: green;
            font-family: sans-serif;
        }
    </style>

    <title>Datos para Acta complementaria Regular o Pendiente</title>
</head>

<body>
    <h2>Datos para generar Acta complementaria</h2>

    <?php
    session_start();

    require_once("autoload.php");
    require_once("Conexion.php");
    require_once("Alumno.php");


    $_SESSION['Matricula'] = $_POST['Matricula'];
    $_SESSION['Fecha_examen'] = $_POST['Fecha_examen'];

    var_dump($_SESSION['Fecha_examen']);

    if (isset($_POST['acta_c_ausente'])) {
        $hola = ($_POST['acta_c_ausente']);

        var_dump($hola);
        if ($hola == "SI") {

            header("Location: http://localhost/actas/Datos_acta_ausente.php");
            echo "Holaaaaaaaa";
            $matricula = $_SESSION['Matricula'];
            $FExamen = $_SESSION['Fecha_examen'];
        }
    }




    $objAlumno = new Alumno();

    $matricula = $_SESSION['Matricula'];

    //var_dump($matricula);

    $Fecha_examen = $_POST['Fecha_examen'];

    $FExamen = date("d/m/Y", strtotime($Fecha_examen));

    //var_dump($FExamen);

    $alumnos = $objAlumno->getAlumno($matricula, $FExamen);

    $alumnos = array_slice($alumnos, 0, 1);

    // <?php foreach($alumnos as $dato){ 

    //                     echo $dato['Matricula'];
    //                     echo $dato['Nombre'];
    //                     echo $dato['Apellido'];
    //                     echo $dato['DNI'];

    //                   };
    ?>

    <form action="acta_pendiente_complementaria.php" method="get">

        <h4>Tipo de acta: <select name="tipo_mesa"></h4>
        <option value="PENDIENTE">PENDIENTE</option>
        <option value="REGULAR POR COMISION">REGULAR
            </select>
            </br>
            <?php foreach ($alumnos as $dato) { ?>
                <div class="col-md-1">
                    <h4>Fecha del examen: <input type="text" class="form-control" value="<?php echo $FExamen; ?>" size="15" name="Fecha"></h4>

                </div>

                <div class="col-md-1">
                    <?php //$fecha=$dato['Fecha']; echo $fecha;
                    ?>
                    <input type="hidden" class="form-control" value="<?php echo str_replace('-', '/', date('d', strtotime($Fecha_examen))); ?>" size="15" name="Día">
                </div>

                <div class="col-md-1">
                    <?php
                    //$fecha=$dato['Fecha'];
                    $fecha1 = (str_replace('-', '/', date('m', strtotime($Fecha_examen)))); ?>
                    <input type="hidden" class="form-control" value="<?php
                                                                        switch ($fecha1) {
                                                                            case 1:
                                                                                echo "Enero";
                                                                                break;
                                                                            case 2:
                                                                                echo "Febrero";
                                                                                break;
                                                                            case 3:
                                                                                echo "Marzo";
                                                                                break;
                                                                            case 4:
                                                                                echo "Abril";
                                                                                break;
                                                                            case 5:
                                                                                echo "Mayo";
                                                                                break;
                                                                            case 6:
                                                                                echo "Junio";
                                                                                break;
                                                                            case 7:
                                                                                echo "Julio";
                                                                                break;
                                                                            case 8:
                                                                                echo "Agosto";
                                                                                break;
                                                                            case 9:
                                                                                echo "Septiembre";
                                                                                break;
                                                                            case 10:
                                                                                echo "Octubre";
                                                                                break;
                                                                            case 11:
                                                                                echo "Noviembre";
                                                                                break;
                                                                            case 12:
                                                                                echo "Diciembre";
                                                                                break;
                                                                        }; ?>" size="15" name="Mes">


                </div>

                <div class="col-md-1">
                    <?php $fecha = $dato['Fecha']; ?>
                    <input type="hidden" class="form-control" value="<?php echo str_replace('-', '/', date('Y', strtotime($fecha))); ?>" size="15" name="Año">
                </div>
                <hr>
                <h4>Datos del alumno</h4>
                <div class="col-md-1">
                    <h4>Matrícula: <input type="integer" class="form-control" value=<?php echo $dato['Matricula']; ?> name="matrícula"></h4>
                </div>

                <div class="col-md-1">
                    <h4>DNI: <input type="integer" class="form-control" value=<?php echo $dato['DNI']; ?> size="10" maxlength="10" name="dni"></h4>
                </div>

                <div class="col-md-2">
                    <h4>Apellidos: <input type="text" class="form-control" value="<?php echo $dato['Apellido']; ?>" size="35" name="apellidos"></h4>
                </div>

                <div class="col-md-2">
                    <h4>Nombres: <input type="text" class="form-control" value="<?php echo $dato['Nombre']; ?>" size="35" name="nombres"></h4>
                </div>
                <hr>


                <div class="col-md-1">
                    <?php
                    $Docentes = $dato['Docentes'];

                    $Docentes = str_replace(";", "", $Docentes); ?>
                    <h4>Docentes: <input type="text" class="form-control" value="<?php echo $Docentes; ?>" size="80" name="Docentes"></h4>
                </div>


                <div class="col-md-1">
                    <h4>Carrera: <input type="text" class="form-control" value="<?php echo $dato['Carrera']; ?>" size="35" name="Carrera"></h4>
                </div>

                <div class="col-md-1">
                    <h4>Comisión: <input type="text" class="form-control" value="<?php echo $dato['Comision']; ?>" size="15" name="Comision"></h4>
                </div>

                <div class="col-md-2">
                    <h4>Asignatura: <input type="text" class="form-control" value="<?php echo $dato['Abreviatura']; ?>- <?php echo $dato['Asignatura']; ?>" size="55" style="text-transform:uppercase;" name="Asignatura"></h4>
                </div>

                <div class="col-md-2">
                    <h4>Nota: <input type="text" class="form-control" value="<?php echo round($dato['Nota']); ?>" size="35" name="nota"></h4>
                </div>

                <?php
                $nota_en_letras = $dato['Nota']; ?>

                <input type="hidden" class="form-control" value="<?php
                                                                    switch ($nota_en_letras) {
                                                                        case 1:
                                                                            echo "UNO";
                                                                            break;
                                                                        case 2:
                                                                            echo "DOS";
                                                                            break;
                                                                        case 3:
                                                                            echo "TRES";
                                                                            break;
                                                                        case 4:
                                                                            echo "CUATRO";
                                                                            break;
                                                                        case 5:
                                                                            echo "CINCO";
                                                                            break;
                                                                        case 6:
                                                                            echo "SEIS";
                                                                            break;
                                                                        case 7:
                                                                            echo "SIETE";
                                                                            break;
                                                                        case 8:
                                                                            echo "OCHO";
                                                                            break;
                                                                        case 9:
                                                                            echo "NUEVE";
                                                                            break;
                                                                        case 10:
                                                                            echo "DIEZ";
                                                                            break;
                                                                        case AUSENTE:
                                                                            echo "AUSENTE";
                                                                            break;
                                                                    }; ?>" size="15" name="nota_en_letras">


                </div>

                <div class="col-md-2">
                    <h4>Acta: <input type="text" class="form-control" value="<?php echo $dato['Acta']; ?>" size="15" name="Acta"></h4>
                    <h4>Libro: <input type="text" value="<?php $actasl = $dato['Acta'];
                                                            $libro = explode("/", $actasl);
                                                            echo $libro[0]; ?>" name="Libro"></h4>
                    <h4>Folio: <input type="text" value="<?php $actasf = $dato['Acta'];
                                                            $libro = explode("/", $actasf);
                                                            echo $libro[1]; ?>" name="Folio"></h4>
                </div>
                <hr>
            <?php }; ?>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>

    </form>
    <!---<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
--->
</body>
<br>
<hr>
<input type="button" onclick="location.href='index.php';" value="Inicio" />

</html>