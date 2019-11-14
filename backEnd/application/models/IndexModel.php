<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IndexModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function inicioProfesor($rut, $clave){
        $this->db->select("idProfesor,rutProfesor");
        $this->db->from("profesor");
        $this->db->where("rutProfesor", $rut);
        $this->db->where("estadoProfesor", 1);
        $this->db->where("claveProfesor", $clave);
        return $this->db->get()->result();
    }
    
    function inicioAdministrador($rut, $clave){
        $this->db->select("idAdministrador,rutAdministrador,nombresAdministrador,apellidosAdministrador,fechaNacimientoAdministrador,numeroAdministrador,correoAdministrador,fotoAdministrador,claveAdministrador,institucionAdministrador,estadoAdministrador");
        $this->db->from("administrador");
        $this->db->where("rutAdministrador", $rut);
        $this->db->where("claveAdministrador", $clave);
        return $this->db->get()->result();
    }


}
