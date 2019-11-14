<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profesor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("modeloProfesor");
    }

    public function index()
    {
        $this->load->view("profesor");
    }

    public function menu()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $this->load->view("Profesor/index");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function material()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $this->load->view("Profesor/material");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function inicioProfesorWeb()
    {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");

        $user = $this->modeloProfesor->inicioProfesorWeb($rut, $clave);
        if (count($user) > 0) {
            if ($user[0]->estadoProfesor == 1) {
                $this->session->set_userdata("profesor", $user);
                echo json_encode(array("msg" => "ok"));
            } else {
                echo json_encode(array("msg" => "Inactivo"));
            }
        } else {
            echo json_encode(array("msg" => "error"));
        }
    }

    public function cerrarSesion()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
