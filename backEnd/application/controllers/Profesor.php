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

    public function mostrarCarpetaProfe()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $user = $this->session->userdata("profesor");
            $id = $user[0]->idProfesor;
            echo json_encode($this->modeloProfesor->getSelectCarpetaProfesor($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function carpetaCursosProfesor()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $user = $this->session->userdata("profesor");
            $id = $this->input->post("id");

            $resultado = $this->modeloProfesor->getCarpetaCursosProfesor($id);
            if ($resultado == []) {
                echo json_encode(array("msg" => "No tiene ningun curso asignado, Comunicarse con su Administrador"));
            } else {
                echo json_encode($resultado);
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function subirArchivo()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $materia = $this->input->post("materiaselect");
            if ($materia != 0 && $materia != null) {
                $user = $this->session->userdata("profesor");
                $idProfesor = $user[0]->idProfesor;
                $nombre = $_FILES['arch']['name'];
                $guardado = $_FILES['arch']['tmp_name'];
                $tipo = $_FILES["arch"]["type"];
                $materia = $this->input->post("materiaselect");
                $curso = $this->input->post("curso");
                $ruta = $this->input->post("ruta");
                $idCarpeta = $this->input->post("idCurso");
                $ruta = $ruta . '/' . $nombre;
                $descripcion = $this->input->post("descripcion");
                $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
                $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
                $ruta = utf8_decode($ruta);
                $ruta = strtr($ruta, utf8_decode($originales), $modificadas);
                $ruta = utf8_encode($ruta);
                if (move_uploaded_file($guardado, $ruta)) {
                    $total = strlen($ruta);
                    $ruta = substr($ruta, 26, $total);
                    $this->modeloProfesor->subirArchivo($nombre, $descripcion, $tipo, $ruta, $curso, $idProfesor, $materia, $idCarpeta);
                    echo "ok";
                } else {
                    echo "error";
                }
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function verArchivosXCurso()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $idCarpetaCurso = $this->input->post("id");
            echo json_encode($this->modeloProfesor->verArchivosXCurso($idCarpetaCurso));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getMateriasProfesor()
    {
        if (count($this->session->userdata("profesor")) > 0) {
            $idCarpetaCurso = $this->input->post("idCurso");
            echo json_encode($this->modeloProfesor->getMateriasProfesor($idCarpetaCurso));
        } else {
            $this->load->view('Errormsg');
        }
    }



    public function cerrarSesion()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
