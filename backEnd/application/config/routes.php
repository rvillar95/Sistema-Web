<?php

defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//VISTA PRINCIPAL ADMINISTRADOR
$route['Administrador'] = 'Administrador/index';


$route['inicioAdministrador'] = 'welcome/sesionAdministrador';
$route['inicioProfe'] = 'welcome/sesionProfesor';

$route['cerrarSesion'] = 'welcome/cerrarSesion';


//VISTAS ADMINISTRADOR
$route['Cursos'] = 'Administrador/Cursos';
$route['addLetra'] = 'Administrador/addLetra';
$route['getLetra_Curso'] = 'Administrador/getLetra_Curso';
$route['addAnno'] = 'Administrador/addAnno';
$route['getAnnoCurso'] = 'Administrador/getAnnoCurso';
$route['getSelectAnnoEscolar'] = 'Administrador/getSelectAnnoEscolar';
$route['getLetraCurso'] = 'Administrador/getLetraCurso';
$route['addCurso'] = 'Administrador/agregarCurso';
$route['getTablaCurso'] = 'Administrador/getTablaCurso';
$route['addParentesco'] = 'Administrador/addParentesco';
$route['addNacionalidad'] = 'Administrador/addNacionalidad';
$route['getTablaParentesco'] = 'Administrador/getTablaParentesco';
$route['getTablaNacionalidad'] = 'Administrador/getTablaNacionalidad';
$route['getTablaMateria'] = 'Administrador/getTablaMateria';
$route['agregarMateria'] = 'Administrador/agregarMateria';
$route['getSelectProfesor'] = 'Administrador/getSelectProfesor';
$route['addTaller'] = 'Administrador/addTaller';
$route['getTablaTaller'] = 'Administrador/getTablaTaller';
$route['getInstitucion'] = 'Administrador/getInstitucion';
$route['editarInstitucion'] = 'Administrador/editarInstitucion';
$route['getSelectNacionalidad'] = 'Administrador/getSelectNacionalidad';
$route['getSelectApoderado'] = 'Administrador/getSelectApoderado';
$route['addAlumno'] = 'Administrador/addAlumno';
$route['getTablaAlumnos'] = 'Administrador/getTablaAlumnos';
$route['getSelectParentesco'] = 'Administrador/getSelectParentesco';
$route['addApoderado'] = 'Administrador/addApoderado';
$route['getTablaApoderados'] = 'Administrador/getTablaApoderados';
$route['getTablaProfesor'] = 'Administrador/getTablaProfesor';
$route['addProfesor'] = 'Administrador/addProfesor';
$route['getDatosProfesores'] = 'Administrador/getDatosProfesores';
$route['getSelectEstado'] = 'Administrador/getSelectEstado';
$route['editarProfesor'] = 'Administrador/editarProfesor';
$route['getDatosAlumnos'] = 'Administrador/getDatosAlumnos';
$route['editarAlumno'] = 'Administrador/editarAlumno';
$route['getDatosApoderado'] = 'Administrador/getDatosApoderado';
$route['editarApoderado'] = 'Administrador/editarApoderado';
$route['editarCurso'] = 'Administrador/editarCurso';
$route['getSelectCurso'] = 'Administrador/getSelectCurso';
$route['addProfesorCurso'] = 'Administrador/addProfesorCurso';
$route['getTableCursoProfesor'] = 'Administrador/getTableCursoProfesor';
$route['getSelectAlumnos'] = 'Administrador/getSelectAlumnos';
$route['addAlumnosCurso'] = 'Administrador/addAlumnosCurso';
$route['getTotalCursosAlumnos'] = 'Administrador/getTotalCursosAlumnos';
$route['getSelectMaterias'] = 'Administrador/getSelectMaterias';
$route['addAMateriasCurso'] = 'Administrador/addAMateriasCurso';
$route['getTotalMateriasCurso'] = 'Administrador/getTotalMateriasCurso';
$route['getTablaProfesoresCursos'] = 'Administrador/getTablaProfesoresCursos';
$route['getTablaAlumnosCursos'] = 'Administrador/getTablaAlumnosCursos';
$route['getTablaMateriasCurso'] = 'Administrador/getTablaMateriasCurso';
$route['getSelectTaller'] = 'Administrador/getSelectTaller';
$route['addAlumnosTaller'] = 'Administrador/addAlumnosTaller';
$route['getTotalTalleresAlumnos'] = 'Administrador/getTotalTalleresAlumnos';
$route['getTablaAlumnosTaller'] = 'Administrador/getTablaAlumnosTaller';
$route['insertarExcelApoderado'] = 'Administrador/insertarExcelApoderado';
$route['insertarExcelProfesor'] = 'Administrador/insertarExcelProfesor';
$route['insertarExcelAlumno'] = 'Administrador/insertarExcelAlumno';
$route['editarMateria'] = 'Administrador/editarMateria';










//INICIO PROFESOR
$route['InicioProfesor'] = 'Profesor/index';
$route['inicioProfesorWeb'] = 'Profesor/inicioProfesorWeb';
$route['Profesor'] = 'Profesor/menu';
$route['Material'] = 'Profesor/material';
$route['CarpetasProfesor'] = 'Profesor/mostrarCarpetaProfe';
$route['CarpetaCursosProfesor'] = 'Profesor/carpetaCursosProfesor';
$route['subirArchivo'] = 'Profesor/subirArchivo';
$route['getMateriaCurso'] = 'Profesor/getMateriasProfesor';
$route['verArchivosXCurso'] = 'Profesor/verArchivosXCurso';




























$route['Talleres'] = 'Administrador/Talleres';
$route['Materias'] = 'Administrador/Materias';
$route['Usuarios'] = 'Administrador/Usuarios';
$route['Institucion'] = 'Administrador/Institucion';
$route['Asignaciones'] = 'Administrador/Asignaciones';
$route['Profesores'] = 'Administrador/Profesores';
$route['Apoderados'] = 'Administrador/Apoderados';
$route['Alumnos'] = 'Administrador/Alumnos';
$route['Varios'] = 'Administrador/Varios';
$route['cursoProfesor'] = 'Administrador/cursoProfesor';
$route['cursoAlumno'] = 'Administrador/cursoAlumno';
$route['cursoMateria'] = 'Administrador/cursoMateria';
$route['tallerAlumno'] = 'Administrador/tallerAlumno';
$route['ImportarApoderados'] = 'Administrador/ImportarApoderados';
$route['ImportarAlumnos'] = 'Administrador/ImportarAlumnos';

$route['ImportarProfesores'] = 'Administrador/ImportarProfesores';
$route['Busquedas'] = 'Administrador/Busquedas';