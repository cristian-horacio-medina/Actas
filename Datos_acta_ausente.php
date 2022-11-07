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
    <title>Datos para Acta complementaria Regular o Pendiente (alumno ausente)</title>
</head>

<body>
<h2>Datos para generar Acta complementaria (alumno ausente)</h2>

<?php
session_start();
require_once("autoload.php");
require_once("Conexion.php");
require_once("Alumno.php");



$_SESSION['Matricula']=$_POST['Matricula'];

$_SESSION['Fecha_examen']=$_POST['Fecha_examen'];

var_dump($_SESSION['Matricula']);
var_dump($_SESSION['Fecha_examen']);

$objAlumno = new Alumno();

$matricula= $_SESSION['Matricula'];

$Fecha_examen= $_POST['Fecha_examen'];

$FExamen= date("d/m/Y", strtotime($Fecha_examen));

$alumnos = $objAlumno->getAlumno($matricula, $FExamen );


$alumnos = array_slice($alumnos, 0, 1);

foreach($alumnos as $dato){ ?> 
                    <hr>
                    <h4>Matrícula: <?php echo $dato['Matricula'];?></h4>
                    <h4>Nombre: <?php echo $dato['Nombre'];?></h4>
                    <h4>Apellido: <?php echo $dato['Apellido'];?></h4>
                    <h4>DNI: <?php echo $dato['DNI'];?></h4>
                    <hr>
                  <?php } ;?>  

<form action="acta_complementaria_ausente.php" method="get">

    <h4>Tipo de acta:</h4> <select name="tipo_mesa">
        <option value="PENDIENTE">PENDIENTE</option><option value="REGULAR POR COMISION">REGULAR                    
    </select>
</br>
<h4>Fecha del examen</h4>
<div class="col-md-1"> 
        
        <input type="text" class="form-control" value="<?php echo $FExamen;?>"  size="15" name="Fecha">
    </div>
    
    <div class="col-md-1"> 
           
        <input type="hidden" class="form-control" value="<?php echo str_replace('-','/',date('d', strtotime($Fecha_examen)));?>"  size="15" name="Día">
    </div>
    
    <div class="col-md-1"> 
        <?php 
            
            $fecha1=(str_replace('-','/',date('m', strtotime($Fecha_examen)))); echo $fecha1;?>
            
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
            
            }
            ;?>"  size="15" name="Mes">
               
        
    </div>
       
    <div class="col-md-1"> 
           
        <input type="hidden" class="form-control" value="<?php echo str_replace('-','/',date('Y', strtotime($Fecha_examen)));?>"  size="15" name="Año">
    </div>
    
    <?php foreach($alumnos as $dato){ ?> 
    <h4>Docentes</h4>
    <div class="col-md-1">
        <?php 
        $Docentes=$dato['Docentes'];
         
        $Docentes=str_replace(";", "", $Docentes);?>
        <input type="text" class="form-control" value="<?php echo $Docentes;?>"  size="80" name="Docentes">
    </div>
    
    <h4>Carrera</h4>
    <div class="col-md-1">    
        <input type="text" class="form-control" value="<?php echo $dato['Carrera'];?>"  size="35" name="Carrera">
    </div>
    <h4>Comisión</h4>    
    <div class="col-md-1">    
        <input type="text" class="form-control" value="<?php echo $dato['Comision'];?>"  size="15" name="Comision">
    </div>
        <h4>Asignatura</h4>
    <div class="col-md-2">
    <input type="text" class="form-control" value="<?php echo $dato['Abreviatura'];?>- <?php echo $dato['Asignatura'];?>"  size="55" style="text-transform:uppercase;" name="Asignatura">
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
        <input type="text" class="form-control" value="<?php echo $_POST['Nota'] ;?>"size="35" name="nota">
    </div>

    <?php 
            $nota_en_letras= $_POST['Nota'];
            
            if($nota_en_letras=='x'){
                var_dump($nota_en_letras);
                $nota_en_letras=99;

                }
                
            ?>
            
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
                
                case 99:
                    echo "AUSENTE";
                    break;              
               
            
            }
            ;?>"  size="15" name="nota_en_letras">
               
    </div>
           
    <?php } ;?>  

    <div class="col-md-2">
        <h4>Libro: <input type="text" value="<?php echo $_POST['Libro'];?>" name="Libro"></h4>
        <h4>Folio: <input type="text" value="<?php echo $_POST['Folio'];?>" name="Folio"></h4>
    </div>
    <hr>   

     <br>   
    <button type="submit" class="btn btn-primary">Enviar</button>
    
</form>
<!---<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
--->
</body>
<?php $nota_en_letras=0;?>
<br>
<hr>
<input type="button" onclick="location.href='index.php';" value="Inicio" />

</html>