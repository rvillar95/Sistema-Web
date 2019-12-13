<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModeloAdministrador extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addLetra($letra, $institucion)
    {
        $data = array(
            "nombreLetra_Curso" => strip_tags($letra),
            "institucionLetra_Curso" => strip_tags($institucion)
        );
        $this->db->insert("letra_curso", $this->security->xss_clean($data));
    }

    function getLetra_Curso($institucion)
    {
        $this->db->select("idLetra_Curso, nombreLetra_Curso");
        $this->db->from("letra_curso");
        $this->db->where("institucionLetra_Curso", $institucion);
        return $this->db->get();
    }

    function getAnno_Curso($institucion)
    {
        $this->db->select("idAnno_Escolar, nombreAnno_Escolar");
        $this->db->from("anno_escolar");
        $this->db->where("institucionAnno_Escolar", $institucion);
        return $this->db->get();
    }

    function addAnno($anno, $institucion)
    {
        $data = array(
            "nombreAnno_Escolar" => strip_tags($anno),
            "institucionAnno_Escolar" => strip_tags($institucion)
        );
        $this->db->insert("anno_escolar", $this->security->xss_clean($data));
    }

    function getSelectAnno($institucion)
    {

        $this->db->select("idAnno_Escolar,nombreAnno_Escolar");
        $this->db->from("anno_escolar");
        $this->db->where("institucionAnno_Escolar", $institucion);
        $this->db->order_by('nombreAnno_Escolar', 'ASC');
        return $this->db->get()->result();
    }

    function getSelectLetra($institucion)
    {
        $this->db->select("idLetra_Curso,nombreLetra_Curso");
        $this->db->from("letra_curso");
        $this->db->where("institucionLetra_Curso", $institucion);
        return $this->db->get()->result();
    }

    function addCurso($nombre, $grado, $letra, $anno, $institucion)
    {
        $data = array(
            "nombreCurso" => strip_tags($nombre),
            "gradoCurso" => strip_tags($grado),
            "anno_escolar_idAnno_Escolar" => strip_tags($anno),
            "letra_curso_idLetra_Curso" => strip_tags($letra),
            "institucion_idInstitucion" => strip_tags($institucion),
            "estadoCurso" => 1
        );
        $this->db->insert("curso", $this->security->xss_clean($data));
    }

    function getTablaCurso($institucion)
    {
        $this->db->select("c.idCurso, c.nombreCurso,c.gradoCurso,a.nombreAnno_Escolar,l.nombreLetra_Curso,e.nombreEstado");
        $this->db->from("curso c");
        $this->db->join("estado e", "e.idEstado = c.estadoCurso");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = c.anno_escolar_idAnno_Escolar");
        $this->db->join("letra_curso l", "l.idLetra_Curso = c.letra_curso_idLetra_Curso");
        $this->db->where("c.institucion_idInstitucion", $institucion);
        return $this->db->get();
    }

    function addParentesco($parentesco, $institucion)
    {
        $data = array(
            "nombreParentesco" => strip_tags($parentesco),
            "institucionParentesco" => strip_tags($institucion)
        );
        $this->db->insert("parentesco", $this->security->xss_clean($data));
    }

    function getTablaParentesco($institucion)
    {
        $this->db->select("idParentesco,nombreParentesco");
        $this->db->from("parentesco");
        $this->db->where("institucionParentesco", $institucion);
        return $this->db->get();
    }

    function addNacionalidad($nacionalidad, $institucion)
    {
        $data = array(
            "nombreNacionalidad" => $nacionalidad,
            "institucionNacionalidad" => $institucion
        );
        $this->db->insert("nacionalidad", $data);
    }

    function getTablaNacionalidad($institucion)
    {
        $this->db->select("idNacionalidad,nombreNacionalidad");
        $this->db->from("nacionalidad");
        $this->db->where("institucionNacionalidad", $institucion);
        return $this->db->get();
    }

    function addMateria($nombre, $descripcion, $nombre_imagen, $institucion)
    {
        $data = array(
            "nombreMateria" => strip_tags($nombre),
            "descripcionMateria" => strip_tags($descripcion),
            "imagenMateria" => strip_tags($nombre_imagen),
            "institucionMateria" => strip_tags($institucion),
            "estadoMateria" => 1
        );
        $this->db->insert("materia", $this->security->xss_clean($data));
        return "ok";
    }

    function getTablaMateria($institucion)
    {
        $prueba = '<img class="img-responsive" style="width: 50px; height:50px;" src="http://127.0.0.1/Tesis/backEnd/lib/img/Materias/';
        $prueba2 = '" alt=""/>';
        $this->db->select("m.idMateria,m.nombreMateria,m.descripcionMateria,concat('$prueba',m.imagenMateria,'$prueba2') as imagenMateria,e.nombreEstado");
        $this->db->from("materia m");
        $this->db->join("estado e", "e.idEstado = m.estadoMateria");
        $this->db->where("institucionMateria", $institucion);
        return $this->db->get();
    }

    function getSelectProfesor($institucion)
    {
        $this->db->select("idProfesor,concat(nombresProfesor,' ',apellidosProfesor) as nombreProfesor");
        $this->db->from("profesor");
        $this->db->where("institucion_idInstitucion", $institucion);
        $this->db->where("estadoProfesor", 1);
        return $this->db->get()->result();
    }

    function addTaller($nombre, $inicio, $termino, $anno, $profesor, $institucion)
    {
        $data = array(
            "nombreTaller" => strip_tags($nombre),
            "fechaInicioTaller" => strip_tags($inicio),
            "fechaTerminoTaller" => strip_tags($termino),
            "anno_escolar_idAnno_Escolar" => strip_tags($anno),
            "profesor_idProfesor" => strip_tags($profesor),
            "institucion_idInstitucion" => strip_tags($institucion),
            "estadoTaller" => 1
        );
        $this->db->insert("taller", $this->security->xss_clean($data));
        return "ok";
    }

    function getTablaTaller($institucion)
    {
        $this->db->select("t.idTaller,t.nombreTaller,t.fechaInicioTaller,t.fechaTerminoTaller,a.nombreAnno_Escolar,concat(p.nombresProfesor,' ',p.apellidosProfesor) as nombreProfesor,e.nombreEstado");
        $this->db->from("taller t");
        $this->db->join("estado e", "e.idEstado = t.estadoTaller");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = t.anno_escolar_idAnno_Escolar");
        $this->db->join("profesor p", "p.idProfesor = t.profesor_idProfesor");
        $this->db->where("t.institucion_idInstitucion", $institucion);
        return $this->db->get();
    }

    function getDatosInstitucion($institucion)
    {
        $this->db->select("idInstitucion,nombreInstitucion,descripcionInstitucion,ciudadInstitucion,logoInstitucion");
        $this->db->from("institucion");
        $this->db->where("idInstitucion", $institucion);
        return $this->db->get()->result();
    }

    function editarInstitucion($institucion, $nombre, $descripcion, $ciudad)
    {
        $data = array(
            "nombreInstitucion" => $nombre,
            "descripcionInstitucion" => $descripcion,
            "ciudadInstitucion" => $ciudad
        );
        $this->db->where('idInstitucion', $institucion);
        $this->db->update("institucion", $data);
        return "ok";
    }

    function editarInstitucionfoto($institucion, $nombre, $descripcion, $ciudad, $nombre_imagen)
    {
        $data = array(
            "nombreInstitucion" => $nombre,
            "descripcionInstitucion" => $descripcion,
            "ciudadInstitucion" => $ciudad,
            "logoInstitucion" => $nombre_imagen
        );
        $this->db->where('idInstitucion', $institucion);
        $this->db->update("institucion", $data);
        return "ok";
    }

    function getSelectNacionalidad($institucion)
    {
        $this->db->select("idNacionalidad,nombreNacionalidad");
        $this->db->from("nacionalidad");
        $this->db->where("institucionNacionalidad", $institucion);
        return $this->db->get()->result();
    }

    function getSelectApoderado($institucion)
    {
        $this->db->select("idApoderado,concat(nombresApoderado,' ',apellidosApoderado) as nombreApoderado");
        $this->db->from("apoderado");
        $this->db->where("institucionApoderado", $institucion);
        $this->db->where("estadoApoderado", 1);
        return $this->db->get()->result();
    }

    function addAlumnoSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $apoderado, $institucion, $nacionalidad, $responsable)
    {
        $this->db->select('count (*)');
        $this->db->from('alumno');
        $this->db->where('rutAlumno', $rut);
        $resultado = $this->db->count_all_results();
        if ($resultado == 0) {
            $data = array(
                "rutAlumno" => strip_tags($rut),
                "nombresAlumno" => strip_tags($nombre),
                "apellidosAlumno" => strip_tags($apellido),
                "fechaNacimientoAlumno" => strip_tags($nacimiento),
                "numeroAlumno" => strip_tags($numero),
                "correoAlumno" => strip_tags($correo),
                "claveAlumno" => strip_tags($clave),
                "apoderado_idApoderado" => strip_tags($apoderado),
                "institucion_idInstitucion" => strip_tags($institucion),
                "nacionalidadAlumno" => strip_tags($nacionalidad),
                "responsableAlumno" => strip_tags($responsable),
                "estadoAlumno" => 1,
                "fotoAlumno" => 'sinfoto.png'
            );
            $this->db->insert("alumno", $this->security->xss_clean($data));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addAlumnoConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $apoderado, $institucion, $nacionalidad, $responsable)
    {
        $this->db->select('count (*)');
        $this->db->from('alumno');
        $this->db->where('rutAlumno', $rut);
        $resultado = $this->db->count_all_results();
        if ($resultado == 0) {
            $data = array(
                "rutAlumno" => strip_tags($rut),
                "nombresAlumno" => strip_tags($nombre),
                "apellidosAlumno" => strip_tags($apellido),
                "fechaNacimientoAlumno" => strip_tags($nacimiento),
                "numeroAlumno" => strip_tags($numero),
                "correoAlumno" => strip_tags($correo),
                "fotoAlumno" => strip_tags($nombre_imagen),
                "claveAlumno" => strip_tags($clave),
                "apoderado_idApoderado" => strip_tags($apoderado),
                "institucion_idInstitucion" => strip_tags($institucion),
                "nacionalidadAlumno" => strip_tags($nacionalidad),
                "responsableAlumno" => strip_tags($responsable),
                "estadoAlumno" => 1
            );
            $this->db->insert("alumno", $this->security->xss_clean($data));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function getTablaAlumnos($institucion)
    {
        $this->db->select("a.idAlumno, a.rutAlumno, concat(a.nombresAlumno,' ',a.apellidosAlumno) as nombreAlumno,a.numeroAlumno,a.correoAlumno,e.nombreEstado");
        $this->db->from("alumno a");
        $this->db->join("estado e", "e.idEstado = a.estadoAlumno");
        $this->db->where("a.institucion_idInstitucion", $institucion);
        return $this->db->get();
    }

    function getSelectParentesco($institucion)
    {
        $this->db->select("idParentesco,nombreParentesco");
        $this->db->from("parentesco");
        $this->db->where("institucionParentesco", $institucion);
        return $this->db->get()->result();
    }

    function addApoderadoSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $parentesco, $responsable, $institucion)
    {
        $this->db->select('count (*)');
        $this->db->from('apoderado');
        $this->db->where('rutApoderado', $rut);
        $resultado = $this->db->count_all_results();
        if ($resultado == 0) {
            $data = array(
                "rutApoderado" => strip_tags($rut),
                "nombresApoderado" => strip_tags($nombre),
                "apellidosApoderado" => strip_tags($apellido),
                "fechaNacimientoApoderado" => strip_tags($nacimiento),
                "numeroApoderado" => strip_tags($numero),
                "correoApoderado" => strip_tags($correo),
                "claveApoderado" => strip_tags($clave),
                "parentescoApoderado" => strip_tags($parentesco),
                "responsableApoderado" => strip_tags($responsable),
                "institucionApoderado" => strip_tags($institucion),
                "estadoApoderado" => 1,
                "fotoApoderado" => 'sinfoto.png'
            );
            $this->db->insert("apoderado", $this->security->xss_clean($data));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addApoderadoConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $parentesco, $responsable, $institucion)
    {
        $this->db->select('count (*)');
        $this->db->from('apoderado');
        $this->db->where('rutApoderado', $rut);
        $resultado = $this->db->count_all_results();
        if ($resultado == 0) {
            $data = array(
                "rutApoderado" => strip_tags($rut),
                "nombresApoderado" => strip_tags($nombre),
                "apellidosApoderado" => strip_tags($apellido),
                "fechaNacimientoApoderado" => strip_tags($nacimiento),
                "numeroApoderado" => strip_tags($numero),
                "correoApoderado" => strip_tags($correo),
                "fotoApoderado" => strip_tags($nombre_imagen),
                "claveApoderado" => strip_tags($clave),
                "parentescoApoderado" => strip_tags($parentesco),
                "responsableApoderado" => strip_tags($responsable),
                "institucionApoderado" => strip_tags($institucion),
                "estadoApoderado" => 1
            );
            $this->db->insert("apoderado", $this->security->xss_clean($data));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function getTablaApoderados($institucion)
    {
        $this->db->select("a.idApoderado, a.rutApoderado, concat(a.nombresApoderado,' ',a.apellidosApoderado) as nombreApoderado,a.numeroApoderado,a.correoApoderado,e.nombreEstado");
        $this->db->from("apoderado a");
        $this->db->join("estado e", "e.idEstado = a.estadoApoderado");
        $this->db->where("a.institucionApoderado", $institucion);
        return $this->db->get();
    }

    function getTablaProfesor($institucion)
    {
        $this->db->select("a.idProfesor, a.rutProfesor, concat(a.nombresProfesor,' ',a.apellidosProfesor) as nombreProfesor,a.numeroProfesor,a.correoProfesor,e.nombreEstado");
        $this->db->from("profesor a");
        $this->db->join("estado e", "e.idEstado = a.estadoProfesor");
        $this->db->where("a.institucion_idInstitucion", $institucion);
        return $this->db->get();
    }

    function addProfesorSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $institucion, $responsable, $rutaCarpeta)
    {

        $this->db->select('count (*)');
        $this->db->from('profesor');
        $this->db->where('rutProfesor', $rut);
        $resultado = $this->db->count_all_results();

        $this->db->select('MAX(idProfesor) AS "id"');
        $var = $this->db->get("profesor")->result();
        $ultimo = ($var[0]->id) + 1;

        if ($resultado == 0) {
            $data = array(
                "rutProfesor" => strip_tags($rut),
                "nombresProfesor" => strip_tags($nombre),
                "apellidosProfesor" => strip_tags($apellido),
                "fechaNacimientoProfesor" => strip_tags($nacimiento),
                "numeroProfesor" => strip_tags($numero),
                "correoProfesor" => strip_tags($correo),
                "claveProfesor" => strip_tags($clave),
                "institucion_idInstitucion" => strip_tags($institucion),
                "responsableProfesor" => strip_tags($responsable),
                "estadoProfesor" => 1,
                "fotoProfesor" => 'sinfoto.png'
            );

            $data2 = array(
                "nombreCarpeta_Profesor" => strip_tags($rut),
                "descripcionCarpeta_Profesor" => "Profesor " . strip_tags($nombre) . " " . strip_tags($apellido),
                "rutaCarpeta_Profesor" => strip_tags($rutaCarpeta),
                "profesor_idProfesor" => strip_tags($ultimo)
            );

            $this->db->insert("profesor", $this->security->xss_clean($data));
            $this->db->insert("carpeta_profesor", $this->security->xss_clean($data2));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function addProfesorConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $institucion, $responsable, $rutaCarpeta)
    {

        $this->db->select('MAX(idProfesor) AS "id"');
        $var = $this->db->get("profesor")->result();
        $ultimo = ($var[0]->id) + 1;
        $año = date('Y');
        $this->db->select('count (*)');
        $this->db->from('profesor');
        $this->db->where('rutProfesor', $rut);
        $resultado = $this->db->count_all_results();
        if ($resultado == 0) {
            $data = array(
                "rutProfesor" => strip_tags($rut),
                "nombresProfesor" => strip_tags($nombre),
                "apellidosProfesor" => strip_tags($apellido),
                "fechaNacimientoProfesor" => strip_tags($nacimiento),
                "numeroProfesor" => strip_tags($numero),
                "correoProfesor" => strip_tags($correo),
                "fotoProfesor" => strip_tags($nombre_imagen),
                "claveProfesor" => strip_tags($clave),
                "institucion_idInstitucion" => strip_tags($institucion),
                "responsableProfesor" => strip_tags($responsable),
                "estadoProfesor" => 1
            );

            $data2 = array(
                "nombreCarpeta_Profesor" => strip_tags($rut . '_' . $año),
                "descripcionCarpeta_Profesor" => "Profesor " . strip_tags($nombre) . " " . strip_tags($apellido),
                "rutaCarpeta_Profesor" => strip_tags($rutaCarpeta),
                "profesor_idProfesor" => strip_tags($ultimo)
            );
            $this->db->insert("profesor", $this->security->xss_clean($data));
            $this->db->insert("carpeta_profesor", $this->security->xss_clean($data2));
            return "ok";
        } else {
            return "no";
        }
        return "error";
    }

    function getDatosProfesor($id)
    {
        $this->db->select("p.idProfesor, p.rutProfesor, p.nombresProfesor,p.apellidosProfesor, p.fechaNacimientoProfesor,p.numeroProfesor,p.correoProfesor,p.fotoProfesor,p.claveProfesor,p.estadoProfesor,e.nombreEstado");
        $this->db->from("profesor p");
        $this->db->join("estado e", "e.idEstado = p.estadoProfesor");
        $this->db->where("idProfesor", $id);
        return $this->db->get()->result();
    }

    function getEstado()
    {
        $this->db->select("idEstado,nombreEstado");
        $this->db->from("estado");
        return $this->db->get()->result();
    }

    function editarProfesorSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $responsable, $estado)
    {

        $data = array(
            "rutProfesor" => $rut,
            "nombresProfesor" => $nombre,
            "apellidosProfesor" => $apellido,
            "fechaNacimientoProfesor" => $nacimiento,
            "numeroProfesor" => $numero,
            "correoProfesor" => $correo,
            "claveProfesor" => $clave,
            "responsableProfesor" => $responsable,
            "estadoProfesor" => $estado
        );
        $this->db->where("idProfesor", $id);
        $this->db->update("profesor", $data);
    }

    function editarProfesorConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $responsable, $estado)
    {

        $data = array(
            "rutProfesor" => $rut,
            "nombresProfesor" => $nombre,
            "apellidosProfesor" => $apellido,
            "fechaNacimientoProfesor" => $nacimiento,
            "numeroProfesor" => $numero,
            "correoProfesor" => $correo,
            "fotoProfesor" => $nombre_imagen,
            "claveProfesor" => $clave,
            "responsableProfesor" => $responsable,
            "estadoProfesor" => $estado
        );
        $this->db->where("idProfesor", $id);
        $this->db->update("profesor", $data);
    }

    function getDatosAlumno($id)
    {
        $this->db->select("a.idAlumno, a.rutAlumno, a.nombresAlumno,a.apellidosAlumno, a.fechaNacimientoAlumno,a.numeroAlumno,a.correoAlumno,a.fotoAlumno,a.claveAlumno,n.nombreNacionalidad,e.nombreEstado,concat(p.nombresApoderado,' ',p.apellidosApoderado) as nombreApoderado");
        $this->db->from("alumno a");
        $this->db->join("estado e", "e.idEstado = a.estadoAlumno");
        $this->db->join("nacionalidad n", "n.idNacionalidad = a.nacionalidadAlumno");
        $this->db->join("apoderado p", "p.idApoderado = a.apoderado_idApoderado");
        $this->db->where("a.idAlumno", $id);
        return $this->db->get()->result();
    }

    function EditarAlumnoSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $apoderado, $nacionalidad, $estado)
    {
        $data = array(
            "rutAlumno" => $rut,
            "nombresAlumno" => $nombre,
            "apellidosAlumno" => $apellido,
            "fechaNacimientoAlumno" => $nacimiento,
            "numeroAlumno" => $numero,
            "correoAlumno" => $correo,
            "claveAlumno" => $clave,
            "apoderado_idApoderado" => $apoderado,
            "nacionalidadAlumno" => $nacionalidad,
            "estadoAlumno" => $estado
        );
        $this->db->where("idAlumno", $id);
        $this->db->update("alumno", $data);
    }

    function EditarAlumnoConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $apoderado, $nacionalidad, $estado)
    {
        $data = array(
            "rutAlumno" => $rut,
            "nombresAlumno" => $nombre,
            "apellidosAlumno" => $apellido,
            "fechaNacimientoAlumno" => $nacimiento,
            "numeroAlumno" => $numero,
            "correoAlumno" => $correo,
            "fotoAlumno" => $nombre_imagen,
            "claveAlumno" => $clave,
            "apoderado_idApoderado" => $apoderado,
            "nacionalidadAlumno" => $nacionalidad,
            "estadoAlumno" => $estado
        );
        $this->db->where("idAlumno", $id);
        $this->db->update("alumno", $data);
    }

    function getDatosApoderado($id)
    {
        $this->db->select("p.idApoderado, p.rutApoderado, p.nombresApoderado,p.apellidosApoderado, p.fechaNacimientoApoderado,p.numeroApoderado,p.correoApoderado,p.fotoApoderado,p.claveApoderado,p.estadoApoderado,e.nombreEstado,a.nombreParentesco");
        $this->db->from("apoderado p");
        $this->db->join("estado e", "e.idEstado = p.estadoApoderado");
        $this->db->join("parentesco a", "a.idParentesco = p.parentescoApoderado");
        $this->db->where("p.idApoderado", $id);
        return $this->db->get()->result();
    }

    function editarApoderadoSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $parentesco, $estado)
    {
        $data = array(
            "rutApoderado" => $rut,
            "nombresApoderado" => $nombre,
            "apellidosApoderado" => $apellido,
            "fechaNacimientoApoderado" => $nacimiento,
            "numeroApoderado" => $numero,
            "correoApoderado" => $correo,
            "claveApoderado" => $clave,
            "parentescoApoderado" => $parentesco,
            "estadoApoderado" => $estado
        );
        $this->db->where("idApoderado", $id);
        $this->db->update("apoderado", $data);
    }

    function editarApoderadoConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $parentesco, $estado)
    {
        $data = array(
            "rutApoderado" => $rut,
            "nombresApoderado" => $nombre,
            "apellidosApoderado" => $apellido,
            "fechaNacimientoApoderado" => $nacimiento,
            "numeroApoderado" => $numero,
            "correoApoderado" => $correo,
            "fotoApoderado" => $nombre_imagen,
            "claveApoderado" => $clave,
            "parentescoApoderado" => $parentesco,
            "estadoApoderado" => $estado
        );
        $this->db->where("idApoderado", $id);
        $this->db->update("apoderado", $data);
    }

    function editarEstadoCurso($id, $nombre, $apellido, $letra, $aneo, $estado)
    {
        $data = array(
            "nombreCurso" => $nombre,
            "gradoCurso" => $apellido,
            "anno_escolar_idAnno_Escolar" => $aneo,
            "letra_curso_idLetra_Curso" => $letra,
            "estadoCurso" => $estado

        );
        $this->db->where('idCurso', $id);
        return $this->db->update("curso", $data);
    }


    function getSelectCurso($institucion)
    {
        $this->db->select("c.idCurso,concat(c.nombreCurso,' ',c.gradoCurso,' ',l.nombreLetra_Curso,' ',a.nombreAnno_Escolar) as nombreCurso");
        $this->db->from("curso c");
        $this->db->join("estado e", "e.idEstado = c.estadoCurso");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = c.anno_escolar_idAnno_Escolar");
        $this->db->join("letra_curso l", "l.idLetra_Curso = c.letra_curso_idLetra_Curso");
        $this->db->where("c.institucion_idInstitucion", $institucion);
        $this->db->where("c.estadoCurso", 1);
        return $this->db->get()->result();
    }

    function getSelectAlumnos($institucion)
    {
        $this->db->select("idAlumno,concat(nombresAlumno,' ',apellidosAlumno) as nombreAlumno");
        $this->db->from("alumno");
        $this->db->where("institucion_idInstitucion", $institucion);
        $this->db->where("estadoAlumno", 1);
        return $this->db->get()->result();
    }

    function getSelectMaterias($institucion)
    {
        $this->db->select("idMateria,nombreMateria");
        $this->db->from("materia");
        $this->db->where("institucionMateria", $institucion);
        $this->db->where("estadoMateria", 1);
        return $this->db->get()->result();
    }

    function getSelectTaller($institucion)
    {
        $this->db->select("idTaller,nombreTaller");
        $this->db->from("taller");
        $this->db->where("institucion_idInstitucion", $institucion);
        $this->db->where("estadoTaller", 1);
        return $this->db->get()->result();
    }

    function addProfesorCurso($profesor, $curso, $institucion)
    {


        $ok = "";
        $error = "";


        foreach ($profesor as $value) {
            $this->db->select('rutProfesor');
            $this->db->where('idProfesor', $value);
            $var = $this->db->get("profesor")->result();
            $rut = ($var[0]->rutProfesor);

            $this->db->select('idCarpeta_Profesor');
            $this->db->where('profesor_idProfesor', $value);
            $var = $this->db->get("carpeta_profesor")->result();
            $id = ($var[0]->idCarpeta_Profesor);

            $this->db->select("c.curso_idCurso, concat(o.nombreCurso,' ',o.gradoCurso,' ',l.nombreLetra_Curso,' ',a.nombreAnno_Escolar) as nombreCurso,count(*) as total");
            $this->db->from("curso_profesor c");
            $this->db->join("curso o", "o.idCurso = c.curso_idCurso");
            $this->db->join("profesor p", "p.idProfesor = c.profesor_idProfesor");
            $this->db->join("anno_escolar a", "a.idAnno_Escolar = o.anno_escolar_idAnno_Escolar");
            $this->db->join("letra_curso l", "l.idLetra_Curso = o.letra_curso_idLetra_Curso");
            $this->db->where('c.curso_idCurso', $curso);
            $nombre = $this->db->get()->result();
            $nombreCurso = $nombre[0]->nombreCurso;
            $año = date('Y');
            $rutaCarpeta = $_SERVER['DOCUMENT_ROOT'] . "Tesis/backEnd/lib/Intranet/" . $rut . "_" . $año . "/" . $nombreCurso;

            $this->db->select('count (*)');
            $this->db->from('curso_profesor');
            $this->db->where('profesor_idProfesor', $value);
            $this->db->where('curso_idCurso', $curso);
            $this->db->where('institucion_idInstitucion', $institucion);
            $resultado = $this->db->count_all_results();
            if ($resultado == 0) {
                $data = array(
                    "profesor_idProfesor" => strip_tags($value),
                    "curso_idCurso" => strip_tags($curso),
                    "institucion_idInstitucion" => strip_tags($institucion)
                );

                mkdir($rutaCarpeta, 0777, true);


                $this->db->insert("curso_profesor", $this->security->xss_clean($data));
                $this->db->select('MAX(idCurso_Profesor) AS "id"');
                $var = $this->db->get("curso_profesor")->result();
                $ultimo = ($var[0]->id);
                $data2 = array(
                    "nombreCarpeta_CursoProfesor" => strip_tags($nombreCurso),
                    "descripcionCarpeta_CursoProfesor" => strip_tags(" "),
                    "rutaCarpeta_CursoProfesor" => strip_tags($rutaCarpeta),
                    "cursoprofesor_idCursoProfesor" => strip_tags($ultimo),
                    "carpetaProfesor" => strip_tags($id),
                );
                $this->db->insert("carpeta_curso_profesor", $this->security->xss_clean($data2));
                $ok = "Ok";
            } else {
                $error = "Error";
            }
        }
        if ($ok == "Ok" && $error == "") {
            return "ok";
        } else if ($error == "Error" && $ok == "") {
            return "error";
        } else if ($error == "Error" && $ok == "Ok") {
            return "medio";
        }
    }

    function addAlumnoCurso($alumnos, $curso, $institucion)
    {
        $ok = "";
        $error = "";
        foreach ($alumnos as $value) {
            $this->db->select('count (*)');
            $this->db->from('curso_alumno');
            $this->db->where('alumno_idAlumno', $value);
            $this->db->where('curso_idCurso', $curso);
            $this->db->where('institucion_idInstitucion', $institucion);
            $resultado = $this->db->count_all_results();
            if ($resultado == 0) {
                $data = array(
                    "curso_idCurso" => strip_tags($curso),
                    "alumno_idAlumno" => strip_tags($value),
                    "institucion_idInstitucion" => strip_tags($institucion)
                );
                $this->db->insert("curso_alumno", $this->security->xss_clean($data));
                $ok = "Ok";
            } else {
                $error = "Error";
            }
        }
        if ($ok == "Ok" && $error == "") {
            return "ok";
        } else if ($error == "Error" && $ok == "") {
            return "error";
        } else if ($error == "Error" && $ok == "Ok") {
            return "medio";
        }
    }

    function addAlumnosTaller($alumnos, $taller, $institucion)
    {
        $ok = "";
        $error = "";
        foreach ($alumnos as $value) {
            $this->db->select('count (*)');
            $this->db->from('taller_alumno');
            $this->db->where('taller_idTaller', $taller);
            $this->db->where('alumno_idAlumno', $value);
            $this->db->where('institucion_idInstitucion', $institucion);
            $resultado = $this->db->count_all_results();
            if ($resultado == 0) {
                $data = array(
                    "taller_idTaller" => strip_tags($taller),
                    "alumno_idAlumno" => strip_tags($value),
                    "institucion_idInstitucion" => strip_tags($institucion)
                );
                $this->db->insert("taller_alumno", $this->security->xss_clean($data));
                $ok = "Ok";
            } else {
                $error = "Error";
            }
        }
        if ($ok == "Ok" && $error == "") {
            return "ok";
        } else if ($error == "Error" && $ok == "") {
            return "error";
        } else if ($error == "Error" && $ok == "Ok") {
            return "medio";
        }
    }

    function addMateriasCurso($materias, $curso, $institucion)
    {
        $ok = "";
        $error = "";
        foreach ($materias as $value) {
            $this->db->select('count (*)');
            $this->db->from('materia_curso');
            $this->db->where('materia_idMateria', $value);
            $this->db->where('curso_idCurso', $curso);
            $this->db->where('institucion_idInstitucion', $institucion);
            $resultado = $this->db->count_all_results();
            if ($resultado == 0) {
                $data = array(
                    "materia_idMateria" => strip_tags($value),
                    "curso_idCurso" => strip_tags($curso),
                    "institucion_idInstitucion" => strip_tags($institucion)
                );
                $this->db->insert("materia_curso", $this->security->xss_clean($data), FALSE);
                $ok = "Ok";
            } else {
                $error = "Error";
            }
        }
        if ($ok == "Ok" && $error == "") {
            return "ok";
        } else if ($error == "Error" && $ok == "") {
            return "error";
        } else if ($error == "Error" && $ok == "Ok") {
            return "medio";
        }
    }

    function getTableCursoProfesor($institucion)
    {
        $this->db->select("c.curso_idCurso, concat(o.nombreCurso,' ',o.gradoCurso,' ',l.nombreLetra_Curso,' ',a.nombreAnno_Escolar) as nombreCurso,count(*) as total");
        $this->db->from("curso_profesor c");
        $this->db->join("curso o", "o.idCurso = c.curso_idCurso");
        $this->db->join("profesor p", "p.idProfesor = c.profesor_idProfesor");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = o.anno_escolar_idAnno_Escolar");
        $this->db->join("letra_curso l", "l.idLetra_Curso = o.letra_curso_idLetra_Curso");
        $this->db->group_by("c.curso_idCurso");
        $this->db->where("c.institucion_idInstitucion", $institucion);
        $this->db->where("o.institucion_idInstitucion", $institucion);
        $this->db->where("p.institucion_idInstitucion", $institucion);
        $this->db->where("a.institucionAnno_Escolar", $institucion);
        $this->db->where("l.institucionLetra_Curso", $institucion);
        return $this->db->get();
    }

    function getTotalCursosAlumnos($institucion)
    {
        $this->db->select("k.curso_idCurso,concat(c.nombreCurso,' ',c.gradoCurso,' ',l.nombreLetra_Curso,' ',a.nombreAnno_Escolar) as nombreCurso,count(*) as total");
        $this->db->from("curso_alumno k");
        $this->db->join("curso c", "c.idCurso = k.curso_idCurso");
        $this->db->join("estado e", "e.idEstado = c.estadoCurso");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = c.anno_escolar_idAnno_Escolar");
        $this->db->join("letra_curso l", "l.idLetra_Curso = c.letra_curso_idLetra_Curso");
        $this->db->group_by("k.curso_idCurso");
        $this->db->where("k.institucion_idInstitucion", $institucion);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        $this->db->where("l.institucionLetra_Curso", $institucion);
        $this->db->where("a.institucionAnno_Escolar", $institucion);
        return $this->db->get();
    }

    function getTotalMateriasCurso($institucion)
    {
        $this->db->select("k.curso_idCurso,concat(c.nombreCurso,' ',c.gradoCurso,' ',l.nombreLetra_Curso,' ',a.nombreAnno_Escolar) as nombreCurso,count(*) as total");
        $this->db->from("materia_curso k");
        $this->db->join("curso c", "c.idCurso = k.curso_idCurso");
        $this->db->join("estado e", "e.idEstado = c.estadoCurso");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = c.anno_escolar_idAnno_Escolar");
        $this->db->join("letra_curso l", "l.idLetra_Curso = c.letra_curso_idLetra_Curso");
        $this->db->group_by("k.curso_idCurso");
        $this->db->where("k.institucion_idInstitucion", $institucion);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        $this->db->where("a.institucionAnno_Escolar", $institucion);
        $this->db->where("l.institucionLetra_Curso", $institucion);
        return $this->db->get();
    }

    function getTotalTalleresAlumnos($institucion)
    {
        $this->db->select("k.taller_idTaller,concat(c.nombreTaller,' - ',a.nombreAnno_Escolar) as nombreTaller,c.fechaInicioTaller,c.fechaTerminoTaller,concat(l.nombresProfesor,' ',l.apellidosProfesor) as nombreProfesor,count(*) as total");
        $this->db->from("taller_alumno k");
        $this->db->join("taller c", "c.idTaller = k.taller_idTaller");
        $this->db->join("estado e", "e.idEstado = c.estadoTaller");
        $this->db->join("anno_escolar a", "a.idAnno_Escolar = c.anno_escolar_idAnno_Escolar");
        $this->db->join("profesor l", "l.idProfesor = c.profesor_idProfesor");
        $this->db->group_by("k.taller_idTaller");
        $this->db->where("k.institucion_idInstitucion", $institucion);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        $this->db->where("a.institucionAnno_Escolar", $institucion);
        $this->db->where("l.institucion_idInstitucion", $institucion);
        return $this->db->get();
    }

    function getTablaProfesoresCursos($id, $institucion)
    {
        $this->db->select("p.idProfesor,p.rutProfesor,concat(p.nombresProfesor,' ',p.apellidosProfesor) as nombreProfesor,p.numeroProfesor,p.correoProfesor");
        $this->db->from("profesor p");
        $this->db->join("curso_profesor c", "c.profesor_idProfesor = p.idProfesor");
        $this->db->where("c.curso_idCurso", $id);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        return $this->db->get()->result();
    }

    function getTablaAlumnosCursos($id, $institucion)
    {
        $this->db->select("p.idAlumno,p.rutAlumno,concat(p.nombresAlumno,' ',p.apellidosAlumno) as nombreAlumno,p.numeroAlumno,p.correoAlumno");
        $this->db->from("alumno p");
        $this->db->join("curso_alumno c", "c.alumno_idAlumno = p.idAlumno");
        $this->db->where("c.curso_idCurso", $id);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        return $this->db->get()->result();
    }

    function getTablaMateriasCurso($id, $institucion)
    {
        $this->db->select("m.idMateria,m.nombreMateria,m.descripcionMateria");
        $this->db->from("materia m");
        $this->db->join("materia_curso c", "c.materia_idMateria = m.idMateria");
        $this->db->where("c.curso_idCurso", $id);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        return $this->db->get()->result();
    }

    function getTablaAlumnosTaller($id, $institucion)
    {
        $this->db->select("p.idAlumno,p.rutAlumno,concat(p.nombresAlumno,' ',p.apellidosAlumno) as nombreAlumno,p.numeroAlumno,p.correoAlumno");
        $this->db->from("alumno p");
        $this->db->join("taller_alumno c", "c.alumno_idAlumno = p.idAlumno");
        $this->db->where("c.taller_idTaller", $id);
        $this->db->where("c.institucion_idInstitucion", $institucion);
        return $this->db->get()->result();
    }

    function editUser($id, $rut, $nombre, $apellido, $correo, $fecha, $ocupacion, $estado, $clave)
    {
        $data = array(
            "rut" => $rut,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "fechaDeNacimiento" => $fecha,
            "email" => $correo,
            "clave" => $clave,
            "estado" => $estado,
            "ocupacion" => $ocupacion
        );
        $this->db->where('idUsuario', 9);
        return $this->db->update("usuario", $data);
    }

    function getRutUsuarios($rut)
    {
        $this->db->select('count(*)');
        $this->db->from('usuario');
        $this->db->where('rut', $rut);
        return $this->db->get()->result();
    }

    function addClase($nombre, $asistentes, $dia, $hora, $salon, $profesor)
    {
        $data = array(
            "nombre" => strip_tags($nombre),
            "asistentes" => strip_tags($asistentes),
            "dia" => strip_tags($dia),
            "hora" => strip_tags($hora),
            "salon" => strip_tags($salon),
            "profesor" => strip_tags($profesor)
        );
        $this->db->insert("clase", $this->security->xss_clean($data));
    }

    function insertarExcelApoderado($data)
    {
        $this->db->select('MAX(idApoderado) AS "id"');
        $var = $this->db->get("apoderado")->result();
        $ultimo = ($var[0]->id);
        $this->db->trans_begin();
        foreach ($data as $value) {
            $this->db->insert('apoderado', $this->security->xss_clean($value));
        }

        if ($this->db->trans_status()  ===  FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        return $ultimo;
    }

    function ultimoId()
    {
        $this->db->select('MAX(idApoderado) AS "id"');
        $var = $this->db->get("apoderado")->result();
        $ultimo = ($var[0]->id);
        return $ultimo;
    }

    function insertarExcelProfesor($data)
    {
        $this->db->trans_begin();

        foreach ($data as $value) {
            $this->db->insert('profesor', $this->security->xss_clean($value));
        }
        if ($this->db->trans_status()  ===  FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    function insertarExcelAlumno($data)
    {
        $this->db->trans_begin();

        foreach ($data as $value) {
            $this->db->insert('alumno', $this->security->xss_clean($value));
        }
        if ($this->db->trans_status()  ===  FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    function editarEstadoMateria($id, $estado)
    {
        $data = array("estadoMateria" => $estado);
        $this->db->where('idMateria', $id);
        return $this->db->update("materia", $data);
    }
}
