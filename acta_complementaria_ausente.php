<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <style type="text/css" media="print">
    .invisible {
      display: none
    }
  </style>
  <link rel="stylesheet" href="style.css">
  <title>Acta Complementaria Regular/Complementaria</title>
  <script type="text/javascript">
    window.onload = function() {
      console.log(document.body.offsetHeight);
    }
    //Lo de abajo lo agregué para imprimir directamente en PDF
    function imprimir() {
      if (window.print) {
        window.print();
      } else {
        alert("La función de impresion no esta soportada por su navegador.");
      }
    }
  </script>
</head>
<nav role="navigation" class="invisible">
  <ul>

    <li><a href="#" aria-haspopup="true" class="invisible">Menú</a>
      <ul class="invisible" aria-label="submenu">
        <li><a href="#" onclick="imprimir();" class="invisible">Imprimir acta</a></li>
        <li><a href="#" onclick="location.href='index.php';" class="invisible">Ir al inicio</a></li>

      </ul>
    </li>

  </ul>
</nav>

<body>

  <div class="page">

    <div class="box">
      <div class="box w50 col p10">
        <img style="width:100px" src="https://mifaecc.edu.ar/apk/administrativo_php/public/export/print/img/logo-faecc.png">
      </div>
      <div class="box w50 col">
        <div>
          <p class="text-right"><?php
                                $tipo_examen = $_GET['tipo_mesa'];
                                if ($tipo_examen == "PENDIENTE") {
                                  echo "FINAL PEND.";
                                } else {
                                  echo "FINAL REG.";
                                }
                                ?></b></p>

          <p class="text-right"><b><u>Fecha:</u></b> <?php echo $_GET['Fecha']; ?>
            <!--
        - <b><u>Página:<span class='pageNumber'></span></u></b>
        -->
          </p>
        </div>
        <!--
      <div>

        <p class='text-right'>Usuario: </p>
      </div>
      -->
        <div class="box b1 p10">
          <div>
            <p>Libro: <?php echo $_GET['Libro']; ?></p>
          </div>
          <div>
            <p>Folio: <?php echo $_GET['Folio']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <h1 class="text-center">ACTA DE FINAL <?php echo $_GET['tipo_mesa']; ?></h1>
    <h1 class="text-center">Complementaria</h1>
    <!-- h3 class='text-center'> Alumnos condicionales (Resolución 1694/21)</h3 -->
    <p>A los <?php echo $_GET['Día']; ?> días del mes de <?php echo $_GET['Mes']; ?> reunida la comisión examinadora de la asignatura mencionada, con asistencia de los docentes Sres: <?php echo $_GET['Docentes']; ?>.</p>
    <p>procediendo a cumplir su cometido con el resultado que se le consigna a continuación:</p>

    <p><b><?php
          $tipo_examen = $_GET['tipo_mesa'];
          if ($tipo_examen == "PENDIENTE") {
            echo "Carrera";
          } else {

            echo "Comisión";
          }
          ?>: <?php echo $_GET['Carrera']; ?> <?php
                                            $tipo_examen = $_GET['tipo_mesa'];
                                            if ($tipo_examen == "PENDIENTE") {
                                              echo "";
                                            } else {
                                              echo $_GET['Comision'];
                                            }
                                            ?></b></p>
    <p><b>Asignatura: <?php echo $_GET['Asignatura']; ?></b></p>
    <table>
      <thead>
        <tr>
          <th rowspan="2">#</th>
          <th rowspan="2">Matrícula</th>
          <th colspan="2">Documento</th>
          <th rowspan="2">Apellido y Nombre</th>
          <th colspan="2">Nota</th>
        </tr>
        <tr>
          <th>Tipo</th>
          <th>Número</th>
          <th>Nro.</th>
          <th>Letras</th>
        </tr>
      </thead>

      <tr>
        <td class="text-center">1</td>
        <td class="text-center"><?php echo $_GET['matrícula']; ?></td>
        <td class="text-center">DNI</td>
        <td class="text-center"><?php echo $_GET['dni']; ?></td>
        <td><?php echo ucwords($_GET['apellidos']); ?>, <?php echo ucwords($_GET['nombres']); ?></td>


        <td class="text-center"><?php echo ucwords($_GET['nota']); ?></td>

        <td class="text-center"><?php echo $_GET['nota_en_letras']; ?></td>
      </tr>
    </table><br />
    <p style="margin: 1px auto 1px 200px"><b>Totales de alumnos a Examinar:</b> 1</p>
    <p style="margin: 1px auto 1px 200px"><b>Total de alumnos Aprobados:</b> 0</p>
    <p style="margin: 1px auto 1px 200px">
      <b>Total de alumnos Desaprobados:</b> <?php if ($_GET['nota'] < 4) {
                                              echo 1;
                                            } else {
                                              echo 0;
                                            } ?>
    </p>
    <p style="margin: 1px auto 1px 200px"><b>Total de alumnos Ausentes:</b> <?php if ($_GET['nota'] == 'x') {
                                                                              echo 1;
                                                                            } else {
                                                                              echo 0;
                                                                            } ?></p><br>
    <p><b>Firmas:</b></p><br>
    <table style="border: hidden">
      <tr>
        <th style="border: hidden">_____________________</th>
        <th style="border: hidden">_____________________</th>
        <th style="border: hidden">_____________________</th>
      </tr>
      <tr>
        <th style="border: hidden">Docente</th>
        <th style="border: hidden">Docente</th>
        <th style="border: hidden">Docente</th>
      </tr>
    </table>
    <!--<div class="page">
    </div>
  </body>--->

</html>