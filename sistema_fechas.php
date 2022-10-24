
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de mesas</title>
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>    
</head>
<body>
<?php
session_start();
require_once("autoload.php");
require_once("Conexion.php");
require_once("Alumno.php");
$_SESSION['Matricula'] =$_POST['Matricula'];



  $objAlumno = new Alumno();
  
  $matricula= $_SESSION['Matricula'];

  var_dump($matricula);

  $alumnos = $objAlumno->getDatosAlumno($matricula);
  
  
  if($alumnos==NULL){ ?>
    <br>
    
    <?php echo "No hay datos";?>
    <br>
    <br>
    <input type="button" onclick="location.href='index.php';" value="Inicio" />
    <?php exit(); } ;

?>  
      <?php $alumnos = array_slice($alumnos, 0, 1);?>
           <?php foreach($alumnos as $dato){ ?> 
                    <h4>Matrícula: <?php echo $dato['Matricula'];?></h4>
                    <h4>Nombre: <?php echo $dato['Nombre'];?></h4>
                    <h4>Apellido: <?php echo $dato['Apellido'];?></h4>
                    <h4>DNI: <?php echo $dato['DNI'];?></h4>
                  <?php } ;?>  
    <hr>  
    <h3>Ver fechas de examen</h3>
    <br>
      
</body>
<br>
   
    
    <form action="Datos_fechas.php" method="post">
    <div class="mb-3">
    
      <input type="hidden" class="form-control" name="Matricula" id="Matricula" value="<?php echo $matricula;?>" aria-describedby="helpId" placeholder="">

    <h4>Módulo: <select name="Modulo" size="1"> 
      <option value=1>1er. cuatrimestre</option><option value=2>2do. cuatrimestre</option><option value=4>Febrero</option></select><br></h4>

     <h4>Ciclo Lectivo: <select name="Lectivo" size="1"> 
     <option value=35>2022</option><option value=34>2021</option><option value=33>2020</option></select><br></h4>

    <h4>Estado de materia: <select name="Estado" size="1"> 
      <option value=4>Final regular</option><option value=5>Final pendiente</option></select><br></h4>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </form>
    
    

<hr>          
<input type="button" onclick="location.href='index.php';" value="Inicio" />
<br>
</html>


