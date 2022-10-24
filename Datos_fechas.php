<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }

 </style>    
    <title>Fechas de exámenes regulares o pendientes</title>
</head>

<body>
<h2>Fechas de exámenes del alumno</h2>

<?php
session_start();

require_once("autoload.php");
require_once("Conexion.php");
require_once("Alumno.php");


$_SESSION['Matricula']=$_POST['Matricula'];

$matricula= $_SESSION['Matricula'];

$modulo_id=$_POST['Modulo'];

$CicloLectivo_Id=$_POST['Lectivo'];

$estadoMateria_id=$_POST['Estado'];


$objAlumno = new Alumno();

$alumnos = $objAlumno->getDatosAlumno($matricula);

$alumnos1 = $objAlumno->getFechasAlumno($matricula, $estadoMateria_id, $CicloLectivo_Id, $modulo_id);



$alumnos = array_slice($alumnos, 0, 1);

?>

<table>

<tr>
    <td>Matrícula</td>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>DNI</td>
</tr>    

<?php foreach($alumnos as $dato){ ?> 
    <tr>                    
    <td><?php echo $dato['Matricula'];?></td>
    <td><?php echo $dato['Nombre'];?></td>
    <td><?php echo $dato['Apellido'];?></td>
    <td><?php echo $dato['DNI'];?></td>
                    
     <?php };?>
 <tr>
 <hr>
</table>
<br>

<br>
<table>
 <tr>
    <td>Cógigo</td>
    <td>Asignatura</td>
    <td>Módulo</td>
    <td>Ciclo Lectivo</td>
    <td>Fecha</td>


</tr>    


<?php foreach($alumnos1 as $dato){ ?>
    
    <tr>     
    <td><?php echo $dato['Abreviatura'];?></td>
    <td><?php echo $dato['Materia'];?></td>
    <td><?php echo $dato['Modulo'];?></td>
    <td><?php echo $dato['Lectivo'];?></td>
    <td><?php echo $dato['Fecha1'];?></td>
    
                 
 <?php };?>
 <hr>
 <h3>Fechas de  <?php echo $dato['Estado'];?></h3>
 </tr>  
</table> 
  
     <br>   
    <button type="submit" class="btn btn-primary">Enviar</button>
    
</form>

</body>
<br>
<hr>
<input type="button" onclick="location.href='index.php';" value="Inicio" />

</html>