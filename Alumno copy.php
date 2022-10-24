<?php

require_once("autoload.php");


class Alumno extends Conexion {
    private $matricula;
    private $conexion;
    
public function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
}    

public function getAlumno($alumno_id){
    $sql = "Select distinct alalumat.Alumno_ID as Matricula, alplaestcarremate.materia_id, almat.Abreviatura, almat.Descripcion, calific.CalifNum as Nota, calific.Acta as Acta, calific.Fecha, vefam.Nombre_Padre as Nombre, 
    vefam.Apellido_Padre as Apellido, vefam.NroDocPadre as DNI, alcom.Combo2 as Comision
    -- alplaestcarre.NombreCompleto as NombreCarrera, alcom.Combo2 as Comision, alplaestcarre.Combo as Carrera, alplaestcarre.Combo as Carrera
    FROM al_alumnos_materias as alalumat
    inner join al_materias as almat on almat.Materia_ID=alalumat.Materia_ID
    inner join al_alumnos_materias_calific as calific on calific.AlumnoMate_ID=alalumat.AlumnoMate_ID 
    inner join al_evaluaciones as alev on alev.Evaluacion_ID=calific.Evaluacion_ID
    inner join ve_familias as vefam on vefam.Familia_ID=alalumat.Alumno_ID
    inner join AL_PLANES_EST_CARRE_MATE as alplaestcarremate on alplaestcarremate.materia_id=alalumat.Materia_ID
    inner join al_comisiones as alcom on alcom.Comision_ID=alalumat.Comision_ID
      
    where alalumat.Alumno_ID=? and alalumat.EstadoMateria_ID=9 and calific.Evaluacion_ID=4 and calific.CalifNum>=4 order by almat.Abreviatura";
    
    $arrWhere = array($alumno_id);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    return $request;
}

}

// "Select alalumat.Alumno_ID as Matricula, almat.Abreviatura as Abreviatura, almat.Descripcion as Descripcion, calific.CalifNum as Nota, calific.Acta as Acta, calific.Fecha, vefam.Nombre_Padre as Nombre, vefam.Apellido_Padre as Apellido, vefam.NroDocPadre as DNI 
//     FROM al_alumnos_materias as alalumat
//     inner join al_materias as almat on almat.Materia_ID=alalumat.Materia_ID
//     inner join al_alumnos_materias_calific as calific on calific.AlumnoMate_ID=alalumat.AlumnoMate_ID 
//     inner join al_evaluaciones as alev on alev.Evaluacion_ID=calific.Evaluacion_ID
//     inner join ve_familias as vefam on vefam.Familia_ID=alalumat.Alumno_ID
//     where Alumno_ID=? and EstadoMateria_ID=9 and calific.Evaluacion_ID=4 and calific.CalifNum>=4 order by almat.Abreviatura";


?>