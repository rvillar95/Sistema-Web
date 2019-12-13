<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("indexModel");
    }

    public function index() {
        $this->load->view('index.php');
    }

    public function sesionProfesor() {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");
        $user = $this->indexModel->inicioProfesor($rut, $clave);
        if (count($user) > 0) {
            $this->session->set_userdata("profesor", $user);
            echo json_encode(array($user));
        } else {
            echo json_encode(array("msg" => "chao"));
        }
    }

    public function sesionAdministrador() {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");
     
        $user = $this->indexModel->inicioAdministrador($rut, $clave);
        if (count($user) > 0) {
            if ($user[0]->estadoAdministrador == 1) {
                $this->session->set_userdata("administrador", $user);
                echo json_encode(array("msg" => "ok"));
            }else{
                echo json_encode(array("msg" => "Inactivo"));
            }
        }else{
            echo json_encode(array("msg" => "error"));
        }
    }
    
      public function cerrarSesion() {
        $this->session->sess_destroy();
        $this->index();
    }

}
