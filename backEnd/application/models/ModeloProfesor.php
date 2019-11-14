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
}
