<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    --->
    <style>
    h2{
        color: blue;
        font-family: sans-serif;
    }
    h4{
        color: green;
        font-family: sans-serif;
    }

 </style>    
    <title>Datos para Acta complementaria Pendiente</title>
</head>

<body>
<h2>Datos para generar Acta complementaria</h2>

<?php
require_once("autoload.php");
require_once("Conexion.php");
require_once("Alumno.php");

$objAlumno = new Alumno();

$matricula= $_POST['Matricula'];

$alumnos = $objAlumno->getAlumno($matricula);

$alumnos1 = $objAlumno->getAlumno($matricula);

$alumnos = array_slice($alumnos, 0, 1);

foreach($alumnos as $dato){ ?> 
                    <h4>Matrícula: <?php echo $dato['Matricula'];?></h4>
                    <h4>Nombre: <?php echo $dato['Nombre'];?></h4>
                    <h4>Apellido: <?php echo $dato['Apellido'];?></h4>
                    <h4>DNI: <?php echo $dato['DNI'];?></h4>
                  <?php } ;?>  

<form action="acta_pendiente_complementaria.php" method="get">

</br>
    Tipo de acta: <select name="tipo_mesa">
        <option value="PENDIENTE">PENDIENTE</option><option value="REGULAR POR COMISION">REGULAR                    
    </select>
</br>
</br>
<h4>Fecha del examen</h4>
    <!--día: <input type="integer" name="día"></hr>
    
    año: <input type="integer" name="año"></hr>-->
    
    día: <select name=día>
    
        <option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5
        </option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option><option value=10>10
        </option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15
        </option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20
        </option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25
        </option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29'>29</option><option value=30>30
        </option><option value=31>31                    
       
    </select>
    
    mes en letras: <select name="mes">
        <option value="Enero">Enero</option><option value="Febrero">Febrero</option><option value="Marzo">Marzo</option><option value="Abril">Abril</option><option value="Mayo">Mayo
        </option><option value="Junio">Junio</option><option value="Julio">Julio</option><option value="Agosto">Agosto</option><option value="Septiembre">Septiembre</option><option value="Octubre">Octubre
        </option><option value="Noviembre">Noviembre</option><option value="Diciembre">Diciembre                    
    </select>

    mes en número: <select name=mesnum>
        <option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5
        </option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option><option value=10>10
        </option><option value=11>11</option><option value=12>12
    </select>

    año: <select name="año">
        <option value=2020>2020</option><option value=2021>2021</option><option value=2022>2022</option><option value=2023>2023</option><option value=2024>2024                    
    </select>
    </br>
    </br>
    <?php foreach($alumnos as $dato){ ?> 
    <h4>Docentes</h>
    <div class="col-md-6">
    <input type="text" class="form-control" style="text-transform:uppercase;" name="docentes">    
    </div>
    
    <h4>Carrera</h4>
        <select name="carrera">
        <option value="2021 - Técnico Superior en Marketing">2021 - Técnico Superior en Marketing</option><option value="2021 - Tecnic Sup. en Diseño Gráfico y Digital">2021 - Tecnic Sup. en Diseño Gráfico y Digital</option><option value='6-24'>2021 - Recursos Humanos</option><option value='8-23'>2019 - Tecnicatura Superior Contable</option><option value="2019 - Administracion de Empresas">2019 - Administracion de Empresas</option><option value="2015 - Técnico Sup. en Organización de Eventos">2015 - Técnico Sup. en Organización de Eventos</option><option value="2015 - Tecnicatura Superior Contable">2015 - Tecnicatura Superior Contable</option><option value="2015 - Tecnicatura Sup. en Diseño Gráfico">2015 - Tecnicatura Sup. en Diseño Gráfico</option><option value="2015 - Diseño de Indumentaria">2015 - Diseño de Indumentaria</option><option value="2014 - Comercio Internacional">2014 - Comercio Internacional</option><option value="2011 - Técnico Superior en Publicidad">2011 - Técnico Superior en Publicidad</option><option value="2011 - Técnico Superior en Marketing">2011 - Técnico Superior en Marketing</option><option value="2011 - Relaciones Publicas">2011 - Relaciones Publicas</option><option value="2011 - Recursos Humanos">2011 - Recursos Humanos</option><option value="2011 - Análisis Financiero">2011 - Análisis Financiero</option><option value="2011 - Administración de Empresas">2011 - Administración de Empresas</option>      
        </select>
    <h4>Comisión</h4>    
    <div class="col-md-1">    
        <input type="text" class="form-control"  size="15" name="comision">
    </div>
        <h4>Asignatura</h4>
    <div class="col-md-2">
    <input type="text" class="form-control"  size="35" style="text-transform:uppercase;" name="asignatura">
    </div>
    <h4>Alumno - Matrícula</h4>
    <div class="col-md-1">
    <input type="integer" class="form-control" value=<?php echo $dato['Matricula'];?>  name="matrícula">
    </div>
    <h4>Alumno - DNI</h4>
    <div class="col-md-1">
    <input type="integer" class="form-control" value=<?php echo $dato['DNI'];?> size="10" maxlength="10" name="dni">
    </div>
    <h4>Alumno - Apellidos</h4>
    <div class="col-md-2">
        <input type="text" class="form-control" value="<?php echo $dato['Apellido'];?>" size="35" name="apellidos">
    </div>
    <h4>Alumno - Nombres</h4>
    <div class="col-md-2">
        <input type="text" class="form-control" value="<?php echo $dato['Nombre'];?>"size="35" name="nombres">
    </div>
    <h4>Nota - numérica</h4>
    <div class="col-md-2">
        <input type="text" class="form-control" value="<?php echo $dato['Nota'];?>"size="35" name="nota">
    </div>

    <h4>Nota - en letras</h4>
    <select name="nota_en_letras">
        <option value=UNO>UNO</option><option value=DOS>DOS</option><option value=TRES>TRES</option><option value=CUATRO>CUATRO</option><option value=CINCO>CINCO
        </option><option value=SEIS>SEIS</option><option value=SIETE>SIETE</option><option value=OCHO>OCHO</option><option value=NUEVE>NUEVE</option><option value=DIEZ>DIEZ
    </select>           
    <?php } ;?>  
     </div>    
            
    <!--<input type="date" name="día" step="1" min="2020-12-01" max="2024-12-31" value="
    <input type="date" name="día","mes","año" step="1" min="01-12-2020" max="31-12-2024" value="?php echo date("Y");?>">-->
    <!--<input type="submit" value="Enviar">-->
    <button type="submit" class="btn btn-primary">Enviar</button>
    
</form>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
-->
</body>
</html>