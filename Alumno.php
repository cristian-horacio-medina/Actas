<?php

require_once("autoload.php");


class Alumno extends Conexion {
    private $matricula;
    private $FExamen;
    private $conexion;
    
public function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
}    

public function getAlumno($alumno_id, $FExamen){
    $sql = "Select distinct alalumat.Alumno_ID as Matricula, alplaestcarremate.materia_id, almat.Abreviatura, almat.Descripcion as Asignatura, calific.CalifNum as Nota, calific.Acta, calific.Fecha, vefam.Nombre_Padre as Nombre, 
    vefam.Apellido_Padre as Apellido, vefam.NroDocPadre as DNI, alcom.Combo2 as Comision,  alplaestcarre.Combo as Carrera
    ,dbo.[GESTION_ALUMNOS_fn_FormatearApeNomDocentes_MesaExamen](exam.Examen_Id ) as Docentes
    FROM al_alumnos_materias as alalumat
    inner join al_materias as almat on almat.Materia_ID=alalumat.Materia_ID
    inner join al_alumnos_materias_calific as calific on calific.AlumnoMate_ID=alalumat.AlumnoMate_ID 
    inner join al_evaluaciones as alev on alev.Evaluacion_ID=calific.Evaluacion_ID
    inner join ve_familias as vefam on vefam.Familia_ID=alalumat.Alumno_ID
    inner join AL_PLANES_EST_CARRE_MATE as alplaestcarremate on alplaestcarremate.materia_id=alalumat.Materia_ID
    inner join AL_PLANES_EST_CARRE as alplaestcarre on alplaestcarremate.PlanEstCarrera_ID=alplaestcarre.PlanEstCarrera_ID
    --inner join al_comisiones as alcom on alcom.Carrera_ID=alplaestcarre.Carrera_ID
    inner join al_comisiones as alcom on alcom.Comision_ID=alalumat.Comision_ID
    inner join al_carreras as alcarr on alcarr.Carrera_ID=alalumat.Carrera_ID
    inner join AL_EXAMENES as exam on almat.Materia_ID=exam.Materia_ID
    where alalumat.Alumno_ID= ? and alalumat.EstadoMateria_ID=9 and calific.Evaluacion_ID=4 and calific.CalifNum>=4  and alplaestcarre.Activo = 'S'
    and exam.FExamen = ? 
    order by almat.Abreviatura";
    
    $arrWhere = array($alumno_id, $FExamen);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    return $request;
}


public function getDatosAlumno($alumno_id){
    $sql = "Select alalumat.Alumno_ID as Matricula, almat.Abreviatura as Abreviatura, almat.Descripcion as Asignatura, calific.CalifNum as Nota, calific.Acta as Acta, calific.Fecha, vefam.Nombre_Padre as Nombre, vefam.Apellido_Padre as Apellido, vefam.NroDocPadre as DNI 
    FROM al_alumnos_materias as alalumat
    inner join al_materias as almat on almat.Materia_ID=alalumat.Materia_ID
    inner join al_alumnos_materias_calific as calific on calific.AlumnoMate_ID=alalumat.AlumnoMate_ID 
    inner join al_evaluaciones as alev on alev.Evaluacion_ID=calific.Evaluacion_ID
    inner join ve_familias as vefam on vefam.Familia_ID=alalumat.Alumno_ID
    where Alumno_ID=? and EstadoMateria_ID=9 and calific.CalifNum>=4 and calific.Evaluacion_ID=4  order by almat.Abreviatura";
    
    $arrWhere = array($alumno_id);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    return $request;
}

public function getFechasAlumno($alumno_id, $estadoMateria_id, $CicloLectivo_Id, $modulo_id){
$sql = "Select Distinct almat.Abreviatura, almat.Descripcion as Materia, 
ciclolect.Descripcion as Lectivo, alexam.Materia_Id, alexam.FExamen as Fecha, alexam.combo as Fecha1, alexam.modulo_id as Modulo,
alest.Descripcion as Estado
FROM AL_EXAMENES as ALEXAM
inner join AL_ALUMNOS_MATERIAS as alumat on alexam.Materia_Id=alumat.Materia_ID
inner join AL_CICLOS_LECTIVOS as ciclolect on alexam.CicloLectivo_Id=ciclolect.ciclolectivo_ID
inner join AL_MATERIAS as almat on alumat.Materia_ID=almat.Materia_ID
inner join AL_ESTADOS_MATERIAS as alest on alest.EstadoMate_ID=alumat.EstadoMateria_ID
where alumat.Alumno_ID=? and  alumat.EstadoMateria_ID=? and  alexam.CicloLectivo_Id=? and alexam.Modulo_Id=?  

order by almat.Abreviatura";

$arrWhere = array($alumno_id, $estadoMateria_id, $CicloLectivo_Id, $modulo_id);
    $query = $this->conexion->prepare($sql);
    $query->execute($arrWhere);
    $request = $query->fetchall(PDO::FETCH_ASSOC);
    return $request;


}

}

//and EstadoMateria_ID=9   and calific.CalifNum>=4

// '12/12/2016'
?>