<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("modeloAdministrador");
        $this->load->library('excel');
    }



    public function index()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/index");
        } else {
            $this->load->view("Errormsg");
        }
    }


    public function Institucion()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/institucion");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Cursos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/cursos");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Usuarios()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/usuarios");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Materias()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/materias");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Talleres()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/talleres");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Asignaciones()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/asignaciones");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Profesores()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/Profesores");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Apoderados()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/Apoderados");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Alumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/Alumnos");
        } else {
            $this->load->view("Errormsg");
        }
    }
    public function Varios()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/extras");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function ImportarApoderados()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/ImportarApoderados");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function ImportarAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/ImportarAlumno");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function Busquedas(){
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Busquedas");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function ImportarProfesores()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Usuarios/ImportarProfesor");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function cursoProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Asignaciones/cursoProfesor");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function cursoAlumno()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Asignaciones/cursoAlumno");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function cursoMateria()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Asignaciones/cursoMateria");
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function tallerAlumno()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $this->load->view("Administrador/Asignaciones/tallerAlumno");
        } else {
            $this->load->view("Errormsg");
        }
    }


    //tablas relacionadas con el Administrador:
    //alumno ☑ getAlumno ☑
    //anno_escolar ☑ getAnno_escolar ☑
    //apoderado ☑ getApoderado ☑
    //curso ☑ getCurso ☑
    //profesor ☑  getProfesor ☑
    //letra_curso ☑ getLetra_curso ☑
    //materia ☑  getMateria ☑
    //parentesco ☑ getParentesco ☑
    //taller ☑ getTaller ☑
    //curso_alumno getCurso_alumno
    //curso_profesor getCurso_profesor
    //materia_curso getMateria_curso
    //taller_alumno getTaller_alumno
    //
    //
    //----------------------INICIO-------------------------------CRUD ALUMNO

    //----------------------INICIO-------------------------------CRUD MATERIA
    public function agregarMateria()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];




            if ($tamano_imagen <= 10000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {

                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Materias/';
                    $nombre_imagen = $hora . $nombre_imagen;

                    $user = $this->session->userdata("administrador");
                    $institucion = $user[0]->institucionAdministrador;
                    $nombre = $this->input->post("nombre");
                    $descripcion = $this->input->post("descripcion");

                    $resultado = $this->modeloAdministrador->addMateria($nombre, $descripcion, $nombre_imagen, $institucion);

                    if ($resultado == "ok") {
                        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);


                        echo "ok";
                    } else {

                        echo "error";
                    }
                } else {
                    echo "error";
                }
            } else {
                echo "error";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }



    public function getTablaMateria()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaMateria($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idMateria,
                    $r->nombreMateria,
                    $r->descripcionMateria,
                    $r->imagenMateria,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    //----------------------FIN----------------------------------CRUD MATERIA

    //----------------------INICIO-------------------------------CRUD TALLER
    public function addTaller()
    {

        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");

            $nombre = $this->input->post("nombreTaller");
            $inicio = $this->input->post("inicioTaller");
            $termino = $this->input->post("finTaller");
            $anno = $this->input->post("annoTaller");
            $profesor = $this->input->post("profesorTaller");
            $institucion = $user[0]->institucionAdministrador;
            $this->modeloAdministrador->addTaller($nombre, $inicio, $termino, $anno, $profesor, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else { }
    }

    public function editarTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id_t");
            $nombre = $this->input->post("nombre_t");
            $inicio = $this->input->post("inicio_t");
            $termino = $this->input->post("termino_t");
            $anno = $this->input->post("anno_t");
            $profesor = $this->input->post("profesor_t");
            $this->modeloAdministrador->editarTaller($id, $nombre, $inicio, $termino, $anno, $profesor);
        } else { }
    }

    public function eliminarTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id_t");
            $this->modeloAdministrador->eliminarTaller($id);
        } else { }
    }

    public function getTablaTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaTaller($institucion);
            $data = array();

            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idTaller,
                    $r->nombreTaller,
                    $r->fechaInicioTaller,
                    $r->fechaTerminoTaller,
                    $r->nombreAnno_Escolar,
                    $r->nombreProfesor,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else { }
    }

    public function getTaller2()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            echo json_encode($this->modeloAdministrador->getTaller());
        } else { }
    }

    //----------------------FIN----------------------------------CRUD TALLER

    public function addLetra()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $letra = $this->input->post("letra");
            $this->modeloAdministrador->addLetra($letra, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function getLetra_Curso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getLetra_Curso($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idLetra_Curso,
                    $r->nombreLetra_Curso
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getAnnoCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getAnno_Curso($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idAnno_Escolar,
                    $r->nombreAnno_Escolar
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectAnnoEscolar()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectAnno($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getLetraCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectLetra($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addAnno()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $anno = $this->input->post("anno");
            $this->modeloAdministrador->addAnno($anno, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function getTablaCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaCurso($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idCurso,
                    $r->nombreCurso,
                    $r->gradoCurso,
                    $r->nombreLetra_Curso,
                    $r->nombreAnno_Escolar,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addParentesco()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $parentesco = $this->input->post("parentesco");
            $this->modeloAdministrador->addParentesco($parentesco, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function addNacionalidad()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $nacionalidad = $this->input->post("nacionalidad");
            $this->modeloAdministrador->addNacionalidad($nacionalidad, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else {
            $this->load->view("Errormsg");
        }
    }

    public function getTablaParentesco()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaParentesco($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idParentesco,
                    $r->nombreParentesco,
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaNacionalidad()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaNacionalidad($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idNacionalidad,
                    $r->nombreNacionalidad,
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectProfesor($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarInstitucion()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];

            if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                $user = $this->session->userdata("administrador");
                $institucion = $user[0]->institucionAdministrador;
                $nombre = $this->input->post("nombre");
                $descripcion = $this->input->post("descripcion");
                $ciudad = $this->input->post("ciudad");
                $resultado = $this->modeloAdministrador->editarInstitucion($institucion, $nombre, $descripcion, $ciudad);
                if ($resultado == "ok") {

                    echo "ok";
                } else {
                    echo "error";
                }
            } else {
                if ($tamano_imagen <= 10000000) {
                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Institucion/';
                        $nombre_imagen = $hora . $nombre_imagen;

                        $user = $this->session->userdata("administrador");
                        $institucion = $user[0]->institucionAdministrador;
                        $nombre = $this->input->post("nombre");
                        $descripcion = $this->input->post("descripcion");
                        $ciudad = $this->input->post("ciudad");
                        $fotoantigua = $this->input->post("fotoantigua");

                        $resultado = $this->modeloAdministrador->editarInstitucionfoto($institucion, $nombre, $descripcion, $ciudad, $nombre_imagen);

                        if ($resultado == "ok") {
                            unlink($carpeta_destino . $fotoantigua);
                            move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                            echo "ok";
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "error";
                    }
                } else {
                    echo "error";
                }
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getInstitucion()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getDatosInstitucion($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectNacionalidad()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectNacionalidad($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectApoderado()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectApoderado($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addAlumno()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];

            $nacionalidad = $this->input->post("nacionalidad");
            $apoderado = $this->input->post("apoderado");
            if ($nacionalidad != null && $apoderado != null) {
                if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                    $user = $this->session->userdata("administrador");

                    $rut = $this->input->post("j_username");
                    $nombre = $this->input->post("nombre");
                    $apellido = $this->input->post("apellido");
                    $prueba = $this->input->post("nacimiento");
                    $numero = $this->input->post("numero");
                    $correo = $this->input->post("correo");
                    $nacionalidad = $this->input->post("nacionalidad");
                    $apoderado = $this->input->post("apoderado");
                    $institucion = $user[0]->institucionAdministrador;
                    $responsable = $user[0]->idAdministrador;
                    $clave = substr("$numero", -4);

                    $time = strtotime($prueba);

                    $nacimiento = date('Y-m-d', $time);
                    $resultado = $this->modeloAdministrador->addAlumnoSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $apoderado, $institucion, $nacionalidad, $responsable);
                    if ($resultado == "ok") {
                        $this->load->view("Administrador/Usuarios/Alumnos");
                        echo "<script> alert('Alumno Registrado con Exito')</script>";
                    } else if ($resultado == "no") {

                        $this->load->view("Administrador/Usuarios/Alumnos");
                        echo "<script> alert('Rut Ya Registrado')</script>";
                    }
                } else {
                    if ($tamano_imagen <= 10000000) {
                        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Alumnos/';
                            $nombre_imagen = $hora . $nombre_imagen;

                            $user = $this->session->userdata("administrador");

                            $rut = $this->input->post("j_username");
                            $nombre = $this->input->post("nombre");
                            $apellido = $this->input->post("apellido");
                            $prueba = $this->input->post("nacimiento");
                            $numero = $this->input->post("numero");
                            $correo = $this->input->post("correo");
                            $nacionalidad = $this->input->post("nacionalidad");
                            $apoderado = $this->input->post("apoderado");
                            $institucion = $user[0]->institucionAdministrador;
                            $responsable = $user[0]->idAdministrador;
                            $clave = substr("$numero", -4);

                            $time = strtotime($prueba);

                            $nacimiento = date('Y-m-d', $time);

                            $resultado = $this->modeloAdministrador->addAlumnoConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $apoderado, $institucion, $nacionalidad, $responsable);

                            if ($resultado == "ok") {
                                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);

                                $this->load->view("Administrador/Usuarios/Alumnos");
                                echo "<script> alert('Alumno Registrado con Exito')</script>";
                            } else if ($resultado == "no") {
                                $this->load->view("Administrador/Usuarios/Alumnos");
                                echo "<script> alert('Rut Ya Registrado')</script>";
                            }
                        } else {
                            $this->load->view("Administrador/Usuarios/Alumnos");
                            echo "<script> alert('El formato de la imagen tiene que ser jpg, png, jpeg o gif.')</script>";
                        }
                    } else {
                        $this->load->view("Administrador/Usuarios/Alumnos");
                        echo "<script> alert('El tamaño de la imagen supera el limite')</script>";
                    }
                }
            } else {
                $this->load->view("Administrador/Usuarios/Alumnos");
                echo "<script> alert('Faltan datos por rellenar')</script>";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }


    public function getTablaAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaAlumnos($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idAlumno,
                    $r->rutAlumno,
                    $r->nombreAlumno,
                    $r->numeroAlumno,
                    $r->correoAlumno,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectParentesco()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectParentesco($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addApoderado()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];
            $parentesco = $this->input->post("parentesco");
            if ($parentesco != null) {
                if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                    $user = $this->session->userdata("administrador");

                    $rut = $this->input->post("j_username");
                    $nombre = $this->input->post("nombre");
                    $apellido = $this->input->post("apellido");
                    $prueba = $this->input->post("nacimiento");
                    $numero = $this->input->post("numero");
                    $correo = $this->input->post("correo");

                    $time = strtotime($prueba);

                    $nacimiento = date('Y-m-d', $time);

                    $institucion = $user[0]->institucionAdministrador;
                    $responsable = $user[0]->idAdministrador;
                    $clave = substr("$numero", -4);
                    $resultado = $this->modeloAdministrador->addApoderadoSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $parentesco, $responsable, $institucion);
                    if ($resultado == "ok") {
                        echo "ok";
                    } else if ($resultado == "no") {
                        echo "error";
                    }
                } else {
                    if ($tamano_imagen <= 10000000) {
                        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Apoderados/';
                            $nombre_imagen = $hora . $nombre_imagen;

                            $user = $this->session->userdata("administrador");

                            $rut = $this->input->post("j_username");
                            $nombre = $this->input->post("nombre");
                            $apellido = $this->input->post("apellido");
                            $prueba = $this->input->post("nacimiento");
                            $numero = $this->input->post("numero");
                            $correo = $this->input->post("correo");

                            $time = strtotime($prueba);

                            $nacimiento = date('Y-m-d', $time);

                            $institucion = $user[0]->institucionAdministrador;
                            $responsable = $user[0]->idAdministrador;
                            $clave = substr("$numero", -4);
                            $resultado = $this->modeloAdministrador->addApoderadoConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $parentesco, $responsable, $institucion);

                            if ($resultado == "ok") {
                                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                                echo "ok";
                            } else if ($resultado == "no") {
                                echo "error";
                            }
                        } else {
                            echo "error2";
                        }
                    } else {
                        echo "error2";
                    }
                }
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaApoderados()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaApoderados($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idApoderado,
                    $r->rutApoderado,
                    $r->nombreApoderado,
                    $r->numeroApoderado,
                    $r->correoApoderado,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTablaProfesor($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->idProfesor,
                    $r->rutProfesor,
                    $r->nombreProfesor,
                    $r->numeroProfesor,
                    $r->correoProfesor,
                    $r->nombreEstado
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto']['name'];
            $tipo_imagen = $_FILES['foto']['type'];
            $tamano_imagen = $_FILES['foto']['size'];
            if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                $user = $this->session->userdata("administrador");

                $rut = $this->input->post("j_username");
                $nombre = $this->input->post("nombre");
                $apellido = $this->input->post("apellido");
                $prueba = $this->input->post("nacimiento");
                $numero = $this->input->post("numero");
                $correo = $this->input->post("correo");

                $time = strtotime($prueba);

                $nacimiento = date('Y-m-d', $time);
                $año = date('Y');

                $rutaCarpeta = $_SERVER['DOCUMENT_ROOT'] . "Tesis/backEnd/lib/Intranet/" . $rut . '_' . $año;





                $institucion = $user[0]->institucionAdministrador;
                $responsable = $user[0]->idAdministrador;
                $clave = substr("$numero", -4);
                $resultado = $this->modeloAdministrador->addProfesorSinFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $institucion, $responsable, $rutaCarpeta);
                if ($resultado == "ok") {
                    if (!file_exists($rutaCarpeta)) {
                        mkdir($_SERVER['DOCUMENT_ROOT'] . "Tesis/backEnd/lib/Intranet/" . $rut . '_' . $año, 0777, true);

                        echo "ok";
                    } else {
                        echo "existe";
                    }
                } else if ($resultado == "no") {
                    echo "error";
                }
            } else {
                if ($tamano_imagen <= 10000000) {
                    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Profesores/';
                        $nombre_imagen = $hora . $nombre_imagen;

                        $user = $this->session->userdata("administrador");

                        $rut = $this->input->post("j_username");
                        $nombre = $this->input->post("nombre");
                        $apellido = $this->input->post("apellido");
                        $prueba = $this->input->post("nacimiento");
                        $numero = $this->input->post("numero");
                        $correo = $this->input->post("correo");

                        $time = strtotime($prueba);
                        $año = date('Y');

                        $rutaCarpeta = $_SERVER['DOCUMENT_ROOT'] . "Tesis/backEnd/lib/Intranet/" . $rut . '_' . $año;


                        $nacimiento = date('Y-m-d', $time);

                        $institucion = $user[0]->institucionAdministrador;
                        $responsable = $user[0]->idAdministrador;
                        $clave = substr("$numero", -4);
                        $resultado = $this->modeloAdministrador->addProfesorConFoto($rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $institucion, $responsable, $rutaCarpeta);

                        if ($resultado == "ok") {
                            if (!file_exists($rutaCarpeta)) {
                                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);
                                mkdir($_SERVER['DOCUMENT_ROOT'] . "Tesis/backEnd/lib/Intranet/" . $rut . '_' . $año, 0777, true);
                                echo "ok";
                            } else {
                                echo "existe";
                            }
                        } else if ($resultado == "no") {
                            echo "error";
                        }
                    } else {
                        echo "error2";
                    }
                } else {
                    echo "error2";
                }
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getDatosProfesores()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getDatosProfesor($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectEstado()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            echo json_encode($this->modeloAdministrador->getEstado());
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto2']['name'];
            $tipo_imagen = $_FILES['foto2']['type'];
            $tamano_imagen = $_FILES['foto2']['size'];
            $estado = $this->input->post("estado");
            $numero = $this->input->post("numero2");
            $fotoantigua = $this->input->post("fotoantigua");
            $rut = $this->input->post("username");
            if ($estado != null) {
                if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                    $user = $this->session->userdata("administrador");
                    $id = $this->input->post("id");

                    $nombre = $this->input->post("nombre2");
                    $apellido = $this->input->post("apellido2");
                    $prueba = $this->input->post("nacimiento2");
                    $numero = $this->input->post("numero2");
                    $correo = $this->input->post("correo2");
                    $clave = $this->input->post("clave2");
                    $time = strtotime($prueba);

                    $nacimiento = date('Y-m-d', $time);
                    $responsable = $user[0]->idAdministrador;

                    $resultado = $this->modeloAdministrador->editarProfesorSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $responsable, $estado);


                    echo "ok";
                } else {
                    if ($tamano_imagen <= 10000000) {
                        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Profesores/';
                            $nombre_imagen = $hora . $nombre_imagen;
                            $id = $this->input->post("id");
                            $user = $this->session->userdata("administrador");

                            $rut = $this->input->post("username");
                            $nombre = $this->input->post("nombre2");
                            $apellido = $this->input->post("apellido2");
                            $prueba = $this->input->post("nacimiento2");
                            $numero = $this->input->post("numero2");
                            $correo = $this->input->post("correo2");
                            $clave = $this->input->post("clave2");

                            $time = strtotime($prueba);

                            $nacimiento = date('Y-m-d', $time);
                            $responsable = $user[0]->idAdministrador;


                            $resultado = $this->modeloAdministrador->editarProfesorConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $responsable, $estado);


                            unlink($carpeta_destino . $fotoantigua);
                            move_uploaded_file($_FILES['foto2']['tmp_name'], $carpeta_destino . $nombre_imagen);
                            echo "ok";
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "error";
                    }
                }
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getDatosAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getDatosAlumno($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarAlumno()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto2']['name'];
            $tipo_imagen = $_FILES['foto2']['type'];
            $tamano_imagen = $_FILES['foto2']['size'];
            $nacionalidad = $this->input->post("nacionalidad2");
            $apoderado = $this->input->post("apoderado2");
            $estado = $this->input->post("estado");
            if ($estado != null && $apoderado != null && $nacionalidad != null) {
                if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
                    $id = $this->input->post("id");
                    $rut = $this->input->post("username");
                    $nombre = $this->input->post("nombre2");
                    $apellido = $this->input->post("apellido2");
                    $prueba = $this->input->post("nacimiento2");
                    $numero = $this->input->post("numero2");
                    $correo = $this->input->post("correo2");
                    $clave = $this->input->post("clave2");
                    $time = strtotime($prueba);
                    $nacimiento = date('Y-m-d', $time);
                    $resultado = $this->modeloAdministrador->EditarAlumnoSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $apoderado, $nacionalidad, $estado);
                    echo "ok";
                } else {
                    if ($tamano_imagen <= 10000000) {
                        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Alumnos/';
                            $nombre_imagen = $hora . $nombre_imagen;
                            $fotoantigua = $this->input->post("fotoantigua");
                            $id = $this->input->post("id");

                            $rut = $this->input->post("username");
                            $nombre = $this->input->post("nombre2");
                            $apellido = $this->input->post("apellido2");
                            $prueba = $this->input->post("nacimiento2");
                            $numero = $this->input->post("numero2");
                            $correo = $this->input->post("correo2");
                            $clave = $this->input->post("clave2");
                            $time = strtotime($prueba);
                            $nacimiento = date('Y-m-d', $time);
                            $resultado = $this->modeloAdministrador->EditarAlumnoConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $apoderado, $nacionalidad, $estado);

                            unlink($carpeta_destino . $fotoantigua);
                            move_uploaded_file($_FILES['foto2']['tmp_name'], $carpeta_destino . $nombre_imagen);
                            echo "ok";
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "error";
                    }
                }
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getDatosApoderado()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getDatosApoderado($id));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarApoderado()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            date_default_timezone_set("Chile/Continental");
            $hora = date('YmdHis');
            $nombre_imagen = $_FILES['foto2']['name'];
            $tipo_imagen = $_FILES['foto2']['type'];
            $tamano_imagen = $_FILES['foto2']['size'];
            $parentesco = $this->input->post("parentesco2");
            $estado = $this->input->post("estado2");

            if ($parentesco != null && $estado != null) {
                if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {

                    $id = $this->input->post("id");
                    $rut = $this->input->post("username");
                    $nombre = $this->input->post("nombre2");
                    $apellido = $this->input->post("apellido2");
                    $prueba = $this->input->post("nacimiento2");
                    $numero = $this->input->post("numero2");
                    $correo = $this->input->post("correo2");
                    $clave = $this->input->post("clave2");
                    $time = strtotime($prueba);
                    $nacimiento = date('Y-m-d', $time);
                    $resultado = $this->modeloAdministrador->editarApoderadoSinFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $clave, $parentesco, $estado);


                    echo "ok";
                } else {
                    if ($tamano_imagen <= 10000000) {
                        if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
                            $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . 'Tesis/backEnd/lib/img/Apoderados/';
                            $nombre_imagen = $hora . $nombre_imagen;
                            $fotoantigua = $this->session->userdata("fotoantigua");
                            $id = $this->input->post("id");
                            $rut = $this->input->post("username");
                            $nombre = $this->input->post("nombre2");
                            $apellido = $this->input->post("apellido2");
                            $prueba = $this->input->post("nacimiento2");
                            $numero = $this->input->post("numero2");
                            $correo = $this->input->post("correo2");
                            $clave = $this->input->post("clave2");
                            $time = strtotime($prueba);
                            $nacimiento = date('Y-m-d', $time);
                            $resultado = $this->modeloAdministrador->editarApoderadoConFoto($id, $rut, $nombre, $apellido, $nacimiento, $numero, $correo, $nombre_imagen, $clave, $parentesco, $estado);

                            unlink($carpeta_destino . $fotoantigua);
                            move_uploaded_file($_FILES['foto2']['tmp_name'], $carpeta_destino . $nombre_imagen);
                            echo "ok";
                        } else {
                            echo "error";
                        }
                    } else {
                        echo "error";
                    }
                }
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function editarCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            $nombre = $this->input->post("nombre2");
            $apellido = $this->input->post("apellido");
            $letra = $this->input->post("letra");
            $aneo = $this->input->post("aneo");
            $estado = $this->input->post("estado");
            if ($nombre != null && $apellido != null && $letra != null && $aneo != null && $estado != null) {
                $this->modeloAdministrador->editarEstadoCurso($id, $nombre, $apellido, $letra, $aneo, $estado);
                echo "ok";
            } else {
                echo "falta";
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectCurso($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addProfesorCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $profesor = $this->input->post("profesor");
            $curso = $this->input->post("curso");
            $resultado = $this->modeloAdministrador->addProfesorCurso($profesor, $curso, $institucion);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "medio") {
                echo json_encode(array("msg" => "medio"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTableCursoProfesor()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTableCursoProfesor($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->curso_idCurso,
                    $r->nombreCurso,
                    $r->total
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;

            echo json_encode($this->modeloAdministrador->getSelectAlumnos($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addAlumnosCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $alumnos = $this->input->post("alumnos");
            $curso = $this->input->post("curso");
            $resultado = $this->modeloAdministrador->addAlumnoCurso($alumnos, $curso, $institucion);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "medio") {
                echo json_encode(array("msg" => "medio"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTotalCursosAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTotalCursosAlumnos($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->curso_idCurso,
                    $r->nombreCurso,
                    $r->total
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectMaterias()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectMaterias($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addAMateriasCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $materias = $this->input->post("materias");
            $curso = $this->input->post("curso");
            $resultado = $this->modeloAdministrador->addMateriasCurso($materias, $curso, $institucion);

            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "medio") {
                echo json_encode(array("msg" => "medio"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTotalMateriasCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTotalMateriasCurso($institucion);
            $data = array();
            foreach ($books->result() as $r) {
                $data[] = array(
                    $r->curso_idCurso,
                    $r->nombreCurso,
                    $r->total
                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaProfesoresCursos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getTablaProfesoresCursos($id, $institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaAlumnosCursos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getTablaAlumnosCursos($id, $institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaMateriasCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getTablaMateriasCurso($id, $institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getSelectTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            echo json_encode($this->modeloAdministrador->getSelectTaller($institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function addAlumnosTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $alumnos = $this->input->post("alumnos");
            $taller = $this->input->post("taller");
            $resultado = $this->modeloAdministrador->addAlumnosTaller($alumnos, $taller, $institucion);
            if ($resultado == "ok") {
                echo json_encode(array("msg" => "ok"));
            } else if ($resultado == "error") {
                echo json_encode(array("msg" => "error"));
            } else if ($resultado == "medio") {
                echo json_encode(array("msg" => "medio"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTotalTalleresAlumnos()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $books = $this->modeloAdministrador->getTotalTalleresAlumnos($institucion);
            $data = array();
            foreach ($books->result() as $r) {

                $data[] = array(
                    $r->taller_idTaller,
                    $r->nombreTaller,
                    $r->fechaInicioTaller,
                    $r->fechaTerminoTaller,
                    $r->nombreProfesor,
                    $r->total

                );
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $books->num_rows(),
                "recordsFiltered" => $books->num_rows(),
                "data" => $data
            );
            echo json_encode($output);
            exit();
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function getTablaAlumnosTaller()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $institucion = $user[0]->institucionAdministrador;
            $id = $this->input->post("id");
            echo json_encode($this->modeloAdministrador->getTablaAlumnosTaller($id, $institucion));
        } else {
            $this->load->view('Errormsg');
        }
    }

    public function insertarExcelApoderado()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $user = $this->session->userdata("administrador");
            $idAntes = $this->modeloAdministrador->ultimoId();
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $rutApoderado = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nombresApoderado = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $apellidosApoderado = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $fechaNacimientoApoderado = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $numeroApoderado = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $correoApoderado = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $parentescoApoderado = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $foto = "sinfoto.png";

                    $claveApoderado = substr("$numeroApoderado", -4);
                    $data[] = array(
                        'rutApoderado'        =>    strip_tags($rutApoderado),
                        'nombresApoderado'            =>    strip_tags($nombresApoderado),
                        'apellidosApoderado'                =>    strip_tags($apellidosApoderado),
                        'fechaNacimientoApoderado'        =>    strip_tags($fechaNacimientoApoderado),
                        'numeroApoderado'            =>    strip_tags($numeroApoderado),
                        'correoApoderado' => strip_tags($correoApoderado),
                        'claveApoderado' => strip_tags($claveApoderado),
                        'parentescoApoderado'            =>    strip_tags($parentescoApoderado),
                        'responsableApoderado' => $user[0]->idAdministrador,
                        'institucionApoderado' => $user[0]->institucionAdministrador,
                        'estadoApoderado' => 1,
                        'fotoApoderado' => $foto

                    );
                }
            }
            $this->modeloAdministrador->insertarExcelApoderado($data);



            if ($idAntes == 0) {
                $idAntes = 1;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();

                    for ($row = 2; $row <= $highestRow; $row++) {
                        $rutAlumno = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $nombresAlumno = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $apellidosAlumno = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $fechaNacimientoAlumno = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $numeroAlumno = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $correoAlumno = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $nacionalidadAlumno = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $claveAlumno = substr("$numeroAlumno", -4);
                        $data2[] = array(
                            'rutAlumno'        =>    strip_tags($rutAlumno),
                            'nombresAlumno'            =>    strip_tags($nombresAlumno),
                            'apellidosAlumno'                =>    strip_tags($apellidosAlumno),
                            'fechaNacimientoAlumno'        =>    strip_tags($fechaNacimientoAlumno),
                            'numeroAlumno'            =>    strip_tags($numeroAlumno),
                            'correoAlumno' => strip_tags($correoAlumno),
                            'apoderado_idApoderado' => $idAntes++,
                            'claveAlumno' => strip_tags($claveAlumno),
                            'institucion_idInstitucion'            =>    $user[0]->institucionAdministrador,
                            'nacionalidadAlumno' => strip_tags($nacionalidadAlumno),
                            'responsableAlumno' => $user[0]->idAdministrador,
                            'estadoAlumno' => 1,
                            'fotoAlumno' => 'sinfoto.png'
                        );
                    }
                };
            } else {
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();

                    for ($row = 2; $row <= $highestRow; $row++) {
                        $rutAlumno = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $nombresAlumno = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $apellidosAlumno = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $fechaNacimientoAlumno = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $numeroAlumno = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $correoAlumno = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $nacionalidadAlumno = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $claveAlumno = substr("$numeroAlumno", -4);
                        $data2[] = array(
                            'rutAlumno'        =>    strip_tags($rutAlumno),
                            'nombresAlumno'            =>    strip_tags($nombresAlumno),
                            'apellidosAlumno'                =>    strip_tags($apellidosAlumno),
                            'fechaNacimientoAlumno'        =>    strip_tags($fechaNacimientoAlumno),
                            'numeroAlumno'            =>    strip_tags($numeroAlumno),
                            'correoAlumno' => strip_tags($correoAlumno),
                            'apoderado_idApoderado' => $idAntes++,
                            'claveAlumno' => strip_tags($claveAlumno),
                            'institucion_idInstitucion'            =>    $user[0]->institucionAdministrador,
                            'nacionalidadAlumno' => strip_tags($nacionalidadAlumno),
                            'responsableAlumno' => $user[0]->idAdministrador,
                            'estadoAlumno' => 1,
                            'fotoAlumno' => 'sinfoto.png'
                        );
                    }
                };
            }
            $this->modeloAdministrador->insertarExcelAlumno($data2);
            echo "Importacion Realizada con Exito";
        }
    }

    public function insertarExcelProfesor()
    {
        if (isset($_FILES["file"]["name"])) {
            $user = $this->session->userdata("administrador");
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $rutProfesor = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nombresProfesor = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $apellidosProfesor = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $fechaNacimientoProfesor = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $numeroProfesor = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $correoProfesor = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $claveProfesor = substr("$numeroProfesor", -4);
                    $data[] = array(
                        'rutProfesor'        =>    strip_tags($rutProfesor),
                        'nombresProfesor'            =>    strip_tags($nombresProfesor),
                        'apellidosProfesor'                =>    strip_tags($apellidosProfesor),
                        'fechaNacimientoProfesor'        =>    strip_tags($fechaNacimientoProfesor),
                        'numeroProfesor'            =>    strip_tags($numeroProfesor),
                        'correoProfesor' => strip_tags($correoProfesor),
                        'claveProfesor' => strip_tags($claveProfesor),

                        'responsableProfesor' => $user[0]->idAdministrador,
                        'institucion_idInstitucion' => $user[0]->institucionAdministrador,
                        'estadoProfesor' => 1,
                        'fotoProfesor' => 'sinfoto.png'


                    );
                }
            }
            $this->modeloAdministrador->insertarExcelProfesor($data);
            echo 'Importacion Realizada con Exito, Actualice la pagina.';
        }
    }

    public function insertarExcelAlumno()
    {
        if (isset($_FILES["file"]["name"])) {
            $user = $this->session->userdata("administrador");
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $rutAlumno = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nombresAlumno = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $apellidosAlumno = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $fechaNacimientoAlumno = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $numeroAlumno = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $correoAlumno = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $apoderadoAlumno = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $nacionalidadAlumno = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    $claveAlumno = substr("$numeroAlumno", -4);
                    $data[] = array(
                        'rutAlumno'        =>    strip_tags($rutAlumno),
                        'nombresAlumno'            =>    strip_tags($nombresAlumno),
                        'apellidosAlumno'                =>    strip_tags($apellidosAlumno),
                        'fechaNacimientoAlumno'        =>    strip_tags($fechaNacimientoAlumno),
                        'numeroAlumno'            =>    strip_tags($numeroAlumno),
                        'correoAlumno' => strip_tags($correoAlumno),
                        'apoderado_idApoderado' => strip_tags($apoderadoAlumno),
                        'claveAlumno' => strip_tags($claveAlumno),
                        'institucion_idInstitucion'            =>    $user[0]->institucionAdministrador,
                        'nacionalidadAlumno' => strip_tags($nacionalidadAlumno),
                        'responsableAlumno' =>  $user[0]->idAdministrador,
                        'estadoAlumno' => 1,
                        'fotoAlumno' => 'sinfoto.png'
                    );
                }
            }
            $this->modeloAdministrador->insertarExcelAlumno($data);
            echo 'Importacion Realizada con Exito, Actualice la pagina.';
        }
    }

    public function agregarCurso()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $user = $this->session->userdata("administrador");
            $nombre = $this->input->post("nombre");
            $grado = $this->input->post("grado");
            $letra = $this->input->post("letra");
            $anno = $this->input->post("anno");
            $institucion = $user[0]->institucionAdministrador; //obtener la clave foreana de INSTITUCIOn de la session "ADMINISTRADOR" 
            $this->modeloAdministrador->addCurso($nombre, $grado, $letra, $anno, $institucion);
            echo json_encode(array("msg" => "ok"));
        } else { }
    }
    public function editarMateria()
    {
        if (count($this->session->userdata("administrador")) > 0) {
            $id = $this->input->post("id");
            $estado = $this->input->post("estado");
            if ($estado == "Activo") {
                $estado = 2;
                $this->modeloAdministrador->editarEstadoMateria($id, $estado);
                echo json_encode(array("msg" => "ok"));
            } else if ($estado == "Inactivo") {
                $estado = 1;
                $this->modeloAdministrador->editarEstadoMateria($id, $estado);
                echo json_encode(array("msg" => "ok"));
            }
        } else {
            $this->load->view('Errormsg');
        }
    }
}
