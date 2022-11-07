<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de mesas</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <!---El código de abajo es para ocultar los inputs para actas de desaprobados--->
    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("content");

            check = document.getElementById("check");

            if (check.checked) {
                element.style.display = 'block';
                element1.style.display = 'none';


            } else {
                element.style.display = 'none';
            }


        }

        function showContent2() {

            element1 = document.getElementById("contenido1");

            check1 = document.getElementById("check1");

            if (check1.checked) {
                element1.style.display = 'block';
                element.style.display = 'none';

            } else {
                element1.style.display = 'none';
            }


        }
    </script>

</head>

<body>
    <?php
    session_start();
    require_once("autoload.php");
    require_once("Conexion.php");
    require_once("Alumno.php");
    $_SESSION['Matricula'] = $_POST['Matricula'];



    $objAlumno = new Alumno();

    $matricula = $_SESSION['Matricula'];

    $alumnos = $objAlumno->getDatosAlumno($matricula);

    $alumnos1 = $objAlumno->getDatosAlumno($matricula);

    if ($alumnos == NULL) { ?>
        <br>

        <?php echo "No hay datos"; ?>
        <br>
        <br>
        <input type="button" onclick="location.href='index.php';" value="Inicio" />
    <?php exit();
    };

    ?>
    <h2>Generar acta complementaria</h2>
    <hr>


    <?php $alumnos = array_slice($alumnos, 0, 1); ?>
    <?php foreach ($alumnos as $dato) { ?>
        <h4>Matrícula: <?php echo $dato['Matricula']; ?></h4>
        <h4>Nombre: <?php echo $dato['Nombre']; ?></h4>
        <h4>Apellido: <?php echo $dato['Apellido']; ?></h4>
        <h4>DNI: <?php echo $dato['DNI']; ?></h4>
    <?php }; ?>
    <hr>
    <b>Generar acta alumno aprobado</b>
    <input type="radio" name="check" id="check1" onclick="javascript:showContent2();" />

    <b>Generar acta alumno desaprobado</b>
    <input type="radio" name="check" id="check" value="1" onchange="javascript:showContent();" />
    <br>
    <br>
    <div id="contenido1" style="display : none">
        <form action="Datos_acta.php" method="post">



            <table class="tabla-sistema">

                <tr>
                    <td>Abreviatura</td>
                    <td>Asignatura</td>
                    <td>Nota</td>
                    <td>Acta</td>
                    <td>Fecha</td>
                    <td>Seleccione asignatura</td>

                </tr>
                <?php foreach ($alumnos1 as $dato) { ?>
                    <tr>
                        <td><?php echo $dato['Abreviatura']; ?></td>
                        <td><?php echo $dato['Asignatura']; ?></td>
                        <td><?php echo $dato['Nota']; ?></td>
                        <td><?php echo $dato['Acta']; ?></td>
                        <?php $newDate = date("d-m-Y", strtotime($dato['Fecha'])); ?>
                        <td><?php echo $newDate; ?></td>
                        <td><input type="radio" name="Fecha_examen" value="<?php echo $newDate; ?>" required /></td>
                    </tr>
                <?php }; ?>
            </table>


            <div class="mb-3">

                <br>
                <input type="hidden" class="form-control" name="Matricula" id="Matricula" value="<?php echo $matricula; ?>" aria-describedby="helpId" placeholder="">

                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
    </div>
    </form>
    <div id="content" style="display : none">
        <form action="Datos_acta_ausente.php" method="post">
            <table class="tabla-sistema">

                <tr>
                    <td>Abreviatura</td>
                    <td>Asignatura</td>
                    <td>Nota</td>
                    <td>Acta</td>
                    <td>Fecha</td>
                    <td>Seleccione asignatura</td>

                </tr>
                <?php foreach ($alumnos1 as $dato) { ?>
                    <tr>
                        <td><?php echo $dato['Abreviatura']; ?></td>
                        <td><?php echo $dato['Asignatura']; ?></td>
                        <td><?php echo $dato['Nota']; ?></td>
                        <td><?php echo $dato['Acta']; ?></td>
                        <?php $newDate = date("d-m-Y", strtotime($dato['Fecha'])); ?>
                        <td><?php echo $newDate; ?></td>
                        <td><input type="radio" name="Fecha_examen" value="<?php echo $newDate; ?>" required /></td>
                    </tr>
                <?php }; ?>
            </table>

            <input type="hidden" class="form-control" name="Matricula" id="Matricula" value="<?php echo $matricula; ?>" aria-describedby="helpId" placeholder="">
            
            <form action="Datos_acta_ausente.php" method="post">

                <input type="hidden" class="form-control" name="Matricula" id="Matricula" value="<?php echo $matricula; ?>" aria-describedby="helpId" placeholder="">
                <h4>Nota: <select name="Nota" size="1">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=x>x</option>
                    </select><br></h4>
                <h4>Libro: <input type="text" name="Libro" id="Libro" value="" required><br></h4>
                <h4>Folio: <input type="text" name="Folio" id="Folio" value="" required><br></h4>
                <h4>Fecha de examen: <input type="date" name="Fecha_examen" id="Fecha_examen" value="" required></h4>
                <button type="submit" class="btn btn-primary">Enviar</button>

    </div>
    </form>
    <hr>
    <br>
    <input type="button" onclick="location.href='index.php';" value="Inicio" />

</body>

<br>

</html>