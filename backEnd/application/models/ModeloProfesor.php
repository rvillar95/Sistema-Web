<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModeloProfesor extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function inicioProfesorWeb($rut, $clave)
    {
        $this->db->select("idProfesor,rutProfesor,nombresProfesor,apellidosProfesor,fechaNacimientoProfesor,	numeroProfesor,correoProfesor,fotoProfesor,claveProfesor,institucion_idInstitucion,responsableProfesor,estadoProfesor");
        $this->db->from("profesor");
        $this->db->where("rutProfesor", $rut);
        $this->db->where("claveProfesor", $clave);
        return $this->db->get()->result();
    }

    function getSelectCarpetaProfesor($id)
    {
        $this->db->select("idCarpeta_Profesor,nombreCarpeta_Profesor,rutaCarpeta_Profesor");
        $this->db->from("carpeta_profesor");
        $this->db->where("profesor_idProfesor", $id);
        return $this->db->get()->result();
    }

    function getCarpetaCursosProfesor($id)
    {
        $this->db->select("idCarpeta_CursoProfesor,nombreCarpeta_CursoProfesor,rutaCarpeta_CursoProfesor,cursoprofesor_idCursoProfesor,carpetaProfesor");
        $this->db->from("carpeta_curso_profesor");
        $this->db->where("carpetaProfesor", $id);
        return $this->db->get()->result();
    }

    function getMateriasProfesor($idCarpetaCurso)
    {
        $this->db->select("cursoprofesor_idCursoProfesor");
        $this->db->where("idCarpeta_CursoProfesor", $idCarpetaCurso);
        $var = $this->db->get("carpeta_curso_profesor")->result();
        $idCursoProfesor = $var[0]->cursoprofesor_idCursoProfesor;

        $this->db->select("curso_idCurso");
        $this->db->where("idCurso_Profesor", $idCursoProfesor);
        $var = $this->db->get("curso_profesor")->result();
        $curso = $var[0]->curso_idCurso;


        $this->db->select("m.idMateria,m.nombreMateria");
        $this->db->from("materia m");
        $this->db->join("materia_curso c", "c.materia_idMateria = m.idMateria");
        $this->db->where("c.curso_idCurso", $curso);
        return array("arreglo" => $this->db->get()->result(), "curso" => $curso);
    }

    function subirArchivo($nombre, $descripcion, $tipo, $ruta, $curso, $idProfesor, $materia, $idCarpeta)
    {
        $this->db->select("idCurso_Profesor");
        $this->db->from("curso_profesor");
        $this->db->where("profesor_idProfesor", $idProfesor);
        $this->db->where("curso_idCurso", $curso);
        $var = $this->db->get()->result();
        $cursoProfesor = $var[0]->idCurso_Profesor;
        $ruta =rtrim($ruta, "C:/wamp/www/Tesis/backEnd/");

        $data = array(
            "nombreArchivo" => strip_tags($nombre),
            "descripcionArchivo" => strip_tags($descripcion),
            "formatoArchivo" => strip_tags($tipo),
            "rutaArchivo" => strip_tags($ruta),
            "cursoProfesorArchivo" => strip_tags($cursoProfesor),
            "materiaArchivo" => strip_tags($materia),
            "idcarpetaCurso" => strip_tags($idCarpeta)
        );
        $this->db->insert("archivo", $this->security->xss_clean($data));
    }

    function verArchivosXCurso($idCarpetaCurso)
    {
        $this->db->select("a.nombreArchivo,a.descripcionArchivo,a.rutaArchivo,x.nombreMateria");
        $this->db->from("archivo a");
        $this->db->join("materia x", "x.idMateria = a.materiaArchivo");
        $this->db->where("idcarpetaCurso", $idCarpetaCurso);
        return $this->db->get()->result();
    }
}
