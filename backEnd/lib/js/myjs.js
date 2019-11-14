function IniciarSesion() {
    var rut = $("#rutUsuario").val();
    var clave = $("#clave").val();

    if (rut == "" || clave == "") {
        toastr.error("Rellene todos los campos.", "Faltan datos!!!");
    } else {
        $.ajax({
            url: 'inicioAdministrador',
            type: 'POST',
            dataType: 'json',
            data: { "rut": rut, "clave": clave }
        }).then(function (msg) {
            if (msg.msg == "error") {
                toastr.error("Verifique su Rut y Clave.", "Datos Incorrectos!!!");
            } else if (msg.msg == "administrador") {
                alert("correcto");
            } else if (msg.msg == "Inactivo") {
                toastr.error("Comuniquese con algun Administrador.", "Su cuenta se encuentra Inactiva!!!");
            } else if (msg.msg == "ok") {
                window.location.href = 'http://127.0.0.1/Tesis/backEnd/Administrador';
            }
        });
    }
}

function IniciarSesionProfesor() {
    var rut = $("#rutUsuario").val();
    var clave = $("#clave").val();

    if (rut == "" || clave == "") {
        toastr.error("Rellene todos los campos.", "Faltan datos!!!");
    } else {
        $.ajax({
            url: 'inicioProfesorWeb',
            type: 'POST',
            dataType: 'json',
            data: { "rut": rut, "clave": clave }
        }).then(function (msg) {
            if (msg.msg == "error") {
                toastr.error("Verifique su Rut y Clave.", "Datos Incorrectos!!!");
            } else if (msg.msg == "administrador") {
                alert("correcto");
            } else if (msg.msg == "Inactivo") {
                toastr.error("Comuniquese con algun Administrador.", "Su cuenta se encuentra Inactiva!!!");
            } else if (msg.msg == "ok") {
                window.location.href = 'http://127.0.0.1/Tesis/backEnd/Profesor';
            }
        });
    }
}



function salir() {
    $.ajax({
        url: 'cerrarSesion', type: 'POST', dataType: 'json', data: {}
    }).then(function (msg) {

    });
    window.location.href = 'http://127.0.0.1/Tesis/backEnd/';
}

function agregarLetraCurso() {
    var letra = $("#letra").val();
    letra = letra.toUpperCase();
    if (letra == "") {
        toastr.error("Ingrese la Letra del Curso.", "Error!");

    } else {
        $.ajax({
            url: 'addLetra',
            type: 'POST',
            dataType: 'json',
            data: { "letra": letra }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Letra agregada.", "Acción Realizada");
                $("#letra").val("");
            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function AgregarAnnoCurso() {
    var anno = $("#curso").val();

    if (anno == "") {
        toastr.error("Ingrese el Año Actual o a cursar.", "Error!");
    } else {
        $.ajax({
            url: 'addAnno',
            type: 'POST',
            dataType: 'json',
            data: { "anno": anno }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Año agregado.", "Acción Realizada");
                $("#curso").val("");
            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function getAnnoEscolar() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectAnnoEscolar';
    $("#getAnnoEscolar").empty();
    var fila = "<option disabled selected>Seleccione el Año Escolar</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idAnno_Escolar + "'>" + o.nombreAnno_Escolar + "</option>";
        });
        $("#getAnnoEscolar").append(fila);
    });
}

function getLetraCurso() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getLetraCurso';
    $("#getLetraCurso").empty();
    var fila = "<option disabled selected>Seleccione la Letra del Curso</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idLetra_Curso + "'>" + o.nombreLetra_Curso + "</option>";
        });
        $("#getLetraCurso").append(fila);
    });
}

function agregarCurso() {
    var nombre = $("#nombre").val();
    var anno = $("#getAnnoEscolar").val();
    var letra = $("#getLetraCurso").val();
    var grado = $("#apellidoCurso").val();
    if (anno == null || nombre == "" || letra == null || grado == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addCurso',
            type: 'POST',
            dataType: 'json',
            data: { "nombre": nombre, "grado": grado, "letra": letra, "anno": anno }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Curso agregado.", "Acción Realizada");
                $("#nombre").val("");

            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function agregarNacionalidad() {
    var nacionalidad = $("#nacionalidad").val();
    if (nacionalidad == "") {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addNacionalidad',
            type: 'POST',
            dataType: 'json',
            data: { "nacionalidad": nacionalidad }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Nacionalidad agregada.", "Acción Realizada");
                $("#nacionalidad").val("");

            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function agregarParentesco() {
    var parentesco = $("#parentesco").val();
    if (parentesco == "") {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addParentesco',
            type: 'POST',
            dataType: 'json',
            data: { "parentesco": parentesco }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Parentesco agregado.", "Acción Realizada");
                $("#parentesco").val("");

            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function getSelectProfesor() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectProfesor';
    $("#getSelectProfesor").empty();
    var fila = "<option disabled selected>Seleccione el Profesor</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idProfesor + "'>" + o.nombreProfesor + "</option>";
        });
        $("#getSelectProfesor").append(fila);
    });
}

function agregarTaller() {
    var nombre = $("#nombre").val();
    var inicio = $("#fechaInicio").val();
    var fin = $("#fechaTermino").val();
    var anno = $("#getAnnoEscolar").val();
    var profe = $("#getSelectProfesor").val();
    if (nombre == "" || inicio == "" || fin == "" || anno == null || profe == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addTaller',
            type: 'POST',
            dataType: 'json',
            data: { "nombreTaller": nombre, "inicioTaller": inicio, "finTaller": fin, "annoTaller": anno, "profesorTaller": profe }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Taller agregado.", "Acción Realizada");
                $("#nombre").val("");
                $("#fechaInicio").val("");
                $("#fechaTermino").val("");
                $("#getAnnoEscolar").val("");
                $("#getSelectProfesor").val("");
            } else {
                toastr.error("No se pudo agregar", "Error!");
            }
        });
    }
}

function getDatosInstitucion() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getInstitucion';
    $("#info-institucion").empty();
    var fila = "";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += '<form  method="post" action="http://127.0.0.1/Tesis/backEnd/editarInstitucion" enctype="multipart/form-data" ><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>ID Institución</label><input disabled required  placeholder="ID de la Institución" value="' + o.idInstitucion + '" type="text" name="nombre" class="form-control" ></div> <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Nombre Institución</label><input required id="nombre" value="' + o.nombreInstitucion + '" placeholder="Nombre de la Institucion" type="text" name="nombre" class="form-control" ></div>  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Descripción Institución</label><input required id="descripcion" value="' + o.descripcionInstitucion + '" placeholder="Descripcion de la Institución" type="text" name="descripcion" class="form-control" ></div><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Ciudad Institución</label><input required id="ciudad" value="' + o.ciudadInstitucion + '" placeholder="Ciudad de la Institución" type="text" name="ciudad" class="form-control" ></div>  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Logo Institucion</label><br/><img style="width:50px; height=50px;" src="http://127.0.0.1/Tesis/backEnd/lib/img/Institucion/' + o.logoInstitucion + '""></div><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><label>Logo Institucion Nuevo</label> <input type="file" name="foto" placeholder="Seleccione el archivo" class="form-control"></div> <div class="form-group form-group col-lg-6 col-md-6 col-sm-6 col-xs-6"><button type="submit" id="btnEditarDatos"  class="btn btn-primary" style="background-color: black; color: white; ">Editar Datos</button></div><input type="text" name="fotoantigua" value="' + o.logoInstitucion + '" class="hidden"></form> ';
        });
        $("#info-institucion").append(fila);
    });
}

//function editarInstitucion() {
//    var nombre = $("#nombre").val();
//    var inicio = $("#fechaInicio").val();
//    var fin = $("#fechaTermino").val();
//    var anno = $("#getAnnoEscolar").val();
//    var profe = $("#getSelectProfesor").val();
//    if (nombre == "" || inicio == "" || fin == "" || anno == null || profe == null) {
//        toastr.error("Ingrese todos los campos solicitados", "Error!");
//    } else {
//        $.ajax({
//            url: 'addTaller',
//            type: 'POST',
//            dataType: 'json',
//            data: {"nombreTaller": nombre, "inicioTaller": inicio, "finTaller": fin, "annoTaller": anno, "profesorTaller": profe}
//        }).then(function (msg) {
//            if (msg.msg == "ok") {
//                toastr.success("Taller agregado.", "Acción Realizada");
//                $("#nombre").val("");
//                $("#fechaInicio").val("");
//                $("#fechaTermino").val("");
//                $("#getAnnoEscolar").val("");
//                $("#getSelectProfesor").val("");
//            } else {
//                toastr.error("No se pudo agregar", "Error!");
//            }
//        });
//    }
//}

function getSelectNacionalidad() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectNacionalidad';
    $("#getSelectNacionalidadCurso").empty();
    $("#getSelectNacionalidadCurso2").empty();
    var fila = "<option disabled selected>Seleccione la Nacionalidad</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idNacionalidad + "'>" + o.nombreNacionalidad + "</option>";
        });
        $("#getSelectNacionalidadCurso").append(fila);
        $("#getSelectNacionalidadCurso2").append(fila);
    });
}

function getSelectApoderado() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectApoderado';
    $("#getSelectApoderado").empty();
    $("#getSelectApoderado2").empty();
    var fila = "<option disabled selected>Seleccione el Apoderado</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idApoderado + "'>" + o.nombreApoderado + "</option>";
        });
        $("#getSelectApoderado").append(fila);
        $("#getSelectApoderado2").append(fila);
    });
}

function getSelectParentesco() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectParentesco';
    $("#getSelectParentesco").empty();
    $("#getSelectParentesco2").empty();
    var fila = "<option disabled selected>Seleccione el Parentesco</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idParentesco + "'>" + o.nombreParentesco + "</option>";
        });
        $("#getSelectParentesco").append(fila);
        $("#getSelectParentesco2").append(fila);
    });
}

function getSelectEstado() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectEstado';
    $("#getSelectEstado").empty();

    var fila = "<option disabled selected>Seleccione el Estado</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idEstado + "'>" + o.nombreEstado + "</option>";
        });
        $("#getSelectEstado").append(fila);
    });
}




function getDatosProfesor(id) {
    var id = id;
    $.ajax({
        url: 'getDatosProfesores',
        type: 'POST',
        dataType: 'json',
        data: { "id": id }
    }).then(function (msg) {
        $("#info-profesores").empty();
        var fila = "";
        getSelectEstado();
        $.each(msg, function (i, o) {
            fila += '<div class="row" style="padding:20px;"><form id="login2" name="login2"  method="post" action="http://127.0.0.1/Tesis/backEnd/editarProfesor" enctype="multipart/form-data"><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>ID Profesor</label> <input required disabled type="text" value="' + o.idProfesor + '" placeholder="Ingrese ID del Profesor" class="form-control"> <input required type="text" name="id"  value="' + o.idProfesor + '" placeholder="Ingrese nombre del Profesor" class="form-control hidden"></div>  <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Rut Profesor</label> <input required type="text" name="username" value="' + o.rutProfesor + '" placeholder="Rut" class="form-control" autocomplete="off" onfocus="rut2(this.value);" onkeypress="return esRutLogin2(event)"  onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut2()"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Nombres Profesor</label> <input required type="text" name="nombre2" value="' + o.nombresProfesor + '" placeholder="Ingrese nombre del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Apellidos Profesor</label> <input required type="text" name="apellido2" value="' + o.apellidosProfesor + '" placeholder="Ingrese apellido del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Fecha Nacimiento Profesor</label> <input required type="date" name="nacimiento2" value="' + o.fechaNacimientoProfesor + '" placeholder="Ingrese Fecha Nacimiento del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Número Profesor</label> <input required type="text" name="numero2" value="' + o.numeroProfesor + '" placeholder="Ingrese Numero del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Clave Profesor</label> <input required type="text" name="clave2" value="' + o.claveProfesor + '" placeholder="Ingrese Numero del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Correo Profesor</label> <input required type="email" name="correo2" value="' + o.correoProfesor + '" placeholder="Ingrese Correo del Profesor" class="form-control"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Foto Profesor</label> <img style="width: 100px; height: 100px" src="http://127.0.0.1/Tesis/backEnd/lib/img/Profesores/' + o.fotoProfesor + '"></div>                                                                                              <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Foto Profesor</label> <input  type="file" name="foto2" placeholder="Seleccione el archivo" class="form-control"></div>    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Estado: <label><h5>' + o.nombreEstado + '</h5></label></label>  <select class="form-control" id="getSelectEstado"  required name="estado"></select>  </div>                                        <div class="form-group form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><button type="submit" class="btn btn-primary" style="background-color: black; color: white; ">Editar Profesor</button></div><input type="text" value="' + o.fotoProfesor + '" name="fotoantigua" class="hidden"></form></div>';
            $("#info-profesores").append(fila);
        });
    });
}

function getDatosAlumno(id) {
    var id = id;
    $.ajax({
        url: 'getDatosAlumnos',
        type: 'POST',
        dataType: 'json',
        data: { "id": id }
    }).then(function (msg) {
        $("#info-alumnos").empty();
        var fila = "";
        getSelectEstado();
        getSelectApoderado();
        getSelectNacionalidad();
        $.each(msg, function (i, o) {
            fila += '<div class="row" style="padding:20px;"><form id="login2" name="login2"  method="post" action="http://127.0.0.1/Tesis/backEnd/editarAlumno" enctype="multipart/form-data"><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>ID Profesor</label> <input required disabled type="text" value="' + o.idAlumno + '" placeholder="Ingrese ID del Alumno" class="form-control"> <input required type="text" name="id"  value="' + o.idAlumno + '" placeholder="Ingrese nombre del Alumno" class="form-control hidden"></div>  <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Rut Profesor</label> <input required type="text" name="username" value="' + o.rutAlumno + '" placeholder="Rut" class="form-control" autocomplete="off" onfocus="rut2(this.value);" onkeypress="return esRutLogin2(event)"  onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut2()"></div>                                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Nombres Alumno</label> <input required type="text" value="' + o.nombresAlumno + '" name="nombre2" placeholder="Ingrese nombre del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Apellidos Alumno</label> <input required type="text" value="' + o.apellidosAlumno + '" name="apellido2" placeholder="Ingrese apellido del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Fecha Nacimiento Alumno</label> <input required type="date" value="' + o.fechaNacimientoAlumno + '" name="nacimiento2" placeholder="Ingrese Fecha Nacimiento del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Número Alumno</label> <input required type="text" name="numero2" value="' + o.numeroAlumno + '" placeholder="Ingrese Numero del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Correo Alumno</label> <input required type="email" value="' + o.correoAlumno + '" name="correo2" placeholder="Ingrese Correo del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Clave Alumno</label> <input required type="text" value="' + o.claveAlumno + '" name="clave2" placeholder="Ingrese Clave del Alumno" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Foto Alumno</label> <img style="width: 100px; height: 100px" src="http://127.0.0.1/Tesis/backEnd/lib/img/Alumnos/' + o.fotoAlumno + '"></div> <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Nacionalidad: <label><h5>' + o.nombreNacionalidad + '</h5></label></label> <select class="form-control" name="nacionalidad2"  required id="getSelectNacionalidadCurso2"></select></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Apoderado: <label><h5>' + o.nombreApoderado + '</h5></label></label><select class="form-control" name="apoderado2" required id="getSelectApoderado2"> </select></div> <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Estado: <label><h5>' + o.nombreEstado + '</h5></label></label>  <select class="form-control" id="getSelectEstado"  required name="estado"></select>  </div> <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Foto Alumno</label> <input  type="file" name="foto2" placeholder="Seleccione el archivo" class="form-control"></div>  <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><button type="submit" class="btn btn-primary" style="background-color: black; color: white; ">Editar Alumno</button></div><input type="text" value="' + o.fotoAlumno + '" name="fotoantigua" class="hidden"></form></div>';
            $("#info-alumnos").append(fila);
        });
    }
    );
}

function getDatosApoderado(id) {
    var id = id;
    $.ajax({
        url: 'getDatosApoderado',
        type: 'POST',
        dataType: 'json',
        data: { "id": id }
    }).then(function (msg) {
        $("#info-apoderados").empty();
        var fila = "";
        getSelectEstado();
        getSelectParentesco();
        $.each(msg, function (i, o) {
            fila += '<div class="row" style="padding:20px;"><form id="login2" name="login2"  method="post" action="http://127.0.0.1/Tesis/backEnd/editarApoderado" enctype="multipart/form-data"> <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>ID Apoderado</label> <input required="" disabled="" type="text" value="' + o.idApoderado + '" placeholder="Ingrese ID del Alumno" class="form-control"> <input required="" type="text" name="id" value="' + o.idApoderado + '" placeholder="Ingrese nombre del Alumno" class="form-control hidden"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Rut Apoderado</label> <input required type="text" name="username" placeholder="Rut" value="' + o.rutApoderado + '" class="form-control" autocomplete="off" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Nombres Apoderado</label> <input required type="text" name="nombre2" value="' + o.nombresApoderado + '"  placeholder="Ingrese nombre del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Apellidos Apoderado</label> <input required type="text" name="apellido2" value="' + o.apellidosApoderado + '"  placeholder="Ingrese apellido del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Fecha Nacimiento Apoderado</label> <input required type="date" name="nacimiento2" value="' + o.fechaNacimientoApoderado + '"  placeholder="Ingrese Fecha Nacimiento del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Número Apoderado</label> <input required type="text" name="numero2" value="' + o.numeroApoderado + '"  placeholder="Ingrese Numero del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Correo Apoderado</label> <input required type="email" name="correo2" value="' + o.correoApoderado + '"  placeholder="Ingrese Correo del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Clave Apoderado</label> <input required type="text" name="clave2" value="' + o.claveApoderado + '" placeholder="Ingrese Clave del Apoderado" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Clave Apoderado</label> <img style="width: 100px; height: 100px" src="http://127.0.0.1/Tesis/backEnd/lib/img/Apoderados/' + o.fotoApoderado + '"> </div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Parentesco: <label><h5>' + o.nombreParentesco + '</h5></label></label>     <select class="form-control" name="parentesco2" required="false" id="getSelectParentesco2">    </select></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Estado: <label><h5>' + o.nombreEstado + '</h5></label></label>     <select class="form-control" name="estado2" required="false" id="getSelectEstado">    </select></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><label>Foto Apoderado</label> <input  type="file" name="foto2" placeholder="Seleccione el archivo" class="form-control"></div><div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12"><button type="submit" class="btn btn-primary" style="background-color: black; color: white; ">Editar Apoderado</button></div><input type="text" value="' + o.fotoApoderado + '" name="fotoantigua" class="hidden"></form></div>';
            $("#info-apoderados").append(fila);
        });
    }
    );


}

function editarCurso(id, estado) {
    var id = id;
    var estado = estado;
    if (id == "" || estado == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'editarCurso',
            type: 'POST',
            dataType: 'json',
            data: { "id": id, "estado": estado }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Participante Curso", "Estado Cambiado!!!")

                $("#categoria").val("");
            } else {
                toastr.error("", "Error el editar la Membresia!!!")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}

function getSelectCurso() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectCurso';
    $("#getSelectCurso").empty();

    var fila = "<option disabled selected>Seleccione el Curso</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idCurso + "'>" + o.nombreCurso + "</option>";
        });
        $("#getSelectCurso").append(fila);

    });
}

function addRelacionProfesorCurso() {
    var profesor = $("#getSelectProfesor").val();
    var curso = $("#getSelectCurso").val();
    if (profesor == null || curso == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addProfesorCurso',
            type: 'POST',
            dataType: 'json',
            data: { "profesor": profesor, "curso": curso }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Relacion agregada.", "Acción Realizada");
            } else if (msg.msg == "medio") {
                toastr.warning("Algunos Profesores ya estan Registrados en Tal Curso", "Advertencia!");
            } else if (msg.msg == "error") {
                toastr.error("Profesor(es) ya registrados en ese curso", "Error!");
            }
        });
    }
}

function getTablaProfesoresCurso(id) {
    var id = id;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getTablaProfesoresCursos',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idProfesor + "</td>";
                fila += "<td >" + o.rutProfesor + "</td>";
                fila += "<td >" + o.nombreProfesor + "</td>";
                fila += "<td >" + o.numeroProfesor + "</td>";
                fila += "<td >" + o.correoProfesor + "</td></tr>";
                $("#tbodyDetalle").append(fila);
            });
        });
    }

}

function getTablaAlumnosCurso(id) {
    var id = id;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getTablaAlumnosCursos',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idAlumno + "</td>";
                fila += "<td >" + o.rutAlumno + "</td>";
                fila += "<td >" + o.nombreAlumno + "</td>";
                fila += "<td >" + o.numeroAlumno + "</td>";
                fila += "<td >" + o.correoAlumno + "</td></tr>";

                $("#tbodyDetalle").append(fila);
            });
        });
    }
}

function getTablaMateriasCurso(id) {
    var id = id;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getTablaMateriasCurso',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idMateria + "</td>";
                fila += "<td >" + o.nombreMateria + "</td>";
                fila += "<td >" + o.descripcionMateria + "</td></tr>";
                $("#tbodyDetalle").append(fila);
            });
        });
    }
}

function getTablaAlumnosTaller(id) {
    var id = id;
    if (id == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
    } else {
        $.ajax({
            url: 'getTablaAlumnosTaller',
            type: 'POST',
            dataType: 'json',
            data: { "id": id }
        }).then(function (msg) {
            $("#tbodyDetalle").empty();
            $.each(msg, function (i, o) {
                var fila = "<tr><td>" + o.idAlumno + "</td>";
                fila += "<td >" + o.rutAlumno + "</td>";
                fila += "<td >" + o.nombreAlumno + "</td>";
                fila += "<td >" + o.numeroAlumno + "</td>";
                fila += "<td >" + o.correoAlumno + "</td></tr>";
                $("#tbodyDetalle").append(fila);
            });
        });
    }
}



function getSelectAlumnos() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectAlumnos';
    $("#getSelectAlumnos").empty();

    var fila = "<option disabled selected>Seleccione el/los Alumnos</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idAlumno + "'>" + o.nombreAlumno + "</option>";
        });
        $("#getSelectAlumnos").append(fila);

    });
}

function addRelacionAlumnoCurso() {
    var alumnos = $("#getSelectAlumnos").val();
    var curso = $("#getSelectCurso").val();

    if (alumnos == null || curso == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addAlumnosCurso',
            type: 'POST',
            dataType: 'json',
            data: { "alumnos": alumnos, "curso": curso }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Relacion agregada.", "Acción Realizada");
            } else if (msg.msg == "medio") {
                toastr.warning("Algunos Alumnos ya estan Registrados en Tal Curso", "Advertencia!");
            } else if (msg.msg == "error") {
                toastr.error("Alumno ya registrado en algun curso", "Error!");
            }
        });
    }
}

function addRelacionAlumnoTaller() {
    var alumnos = $("#getSelectAlumnos").val();
    var taller = $("#getSelectTaller").val();
    if (alumnos == null || taller == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addAlumnosTaller',
            type: 'POST',
            dataType: 'json',
            data: { "alumnos": alumnos, "taller": taller }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Relacion agregada.", "Acción Realizada");
            } else if (msg.msg == "medio") {
                toastr.warning("Algunos Alumnos ya estan Registrados en Tal Curso", "Advertencia!");
            } else if (msg.msg == "error") {
                toastr.error("Alumno ya registrado en algun curso", "Error!");
            }
        });
    }
}

function getSelectMaterias() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectMaterias';
    $("#getSelectMaterias").empty();

    var fila = "<option disabled selected>Seleccione la/las Materias</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idMateria + "'>" + o.nombreMateria + "</option>";
        });
        $("#getSelectMaterias").append(fila);

    });
}

function getSelectTaller() {
    var hola = 'http://127.0.0.1/Tesis/backEnd/getSelectTaller';
    $("#getSelectTaller").empty();

    var fila = "<option disabled selected>Seleccione el Taller</option>";
    $.getJSON(hola, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.idTaller + "'>" + o.nombreTaller + "</option>";
        });
        $("#getSelectTaller").append(fila);

    });
}

function addRelacionMateriaCurso() {
    var materia = $("#getSelectMaterias").val();
    var curso = $("#getSelectCurso").val();
    if (materia == null || curso == null) {
        toastr.error("Ingrese todos los campos solicitados", "Error!");
    } else {
        $.ajax({
            url: 'addAMateriasCurso',
            type: 'POST',
            dataType: 'json',
            data: { "materias": materia, "curso": curso }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Relacion agregada.", "Acción Realizada");
            } else if (msg.msg == "medio") {
                toastr.warning("Algunas Materias ya estan Registradas en Tal Curso", "Advertencia!");
            } else if (msg.msg == "error") {
                toastr.error("Materia ya registrada en algun curso", "Error!");
            }
        });
    }
}


function editarApoderado(id, estado) {
    var id = id;
    var estado = estado;
    if (id == "" || estado == "") {
        toastr.error("Verifique todos los campos", "Ingrese todos los datos!!!")
        toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
    } else {
        $.ajax({
            url: 'editarParticipante',
            type: 'POST',
            dataType: 'json',
            data: { "id": id, "estado": estado }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Participante Editado", "Estado Cambiado!!!")

                $("#categoria").val("");
            } else {
                toastr.error("", "Error el editar la Membresia!!!")
                toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
            }
        });
    }
}




function checkRut(rut) {
    var rutUsuario = $("#rutUsuario").val();
    $.ajax({
        url: 'http://127.0.0.1/SacrificeSports/index.php/validarRut',
        type: 'POST',
        dataType: 'json',
        data: { "rut": rutUsuario }
    }).then(function (msg) {
        var resultado;
        for (var key in msg.msg) {
            var obj = msg.msg[key];
            for (var prop in obj) {
                if (obj.hasOwnProperty(prop)) {
                    resultado = obj[prop];
                }
            }
        }
        if (resultado == 0) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv

            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if (cuerpo.length < 7) {
                $("#div_rut").empty();
                var fila = '<label>Rut Incompleto</label><br/>';
                fila += '<img src="http://127.0.0.1/SacrificeSports/lib/img/warning.png" style="height: 25px; width: 25px;">';
                $("#div_rut").append(fila);

                $("#rutUsuario").val("");
                $('#btnAgregarUsuario').attr("disabled", true);
                return false;
            }

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;

            // Validar que el Cuerpo coincide con su Dígito Verificador
            if (dvEsperado != dv) {
                $("#div_rut").empty();
                var fila = '<label>Rut Invalido</label><br/>';
                fila += '<img src="http://127.0.0.1/SacrificeSports/lib/img/negativo.png" style="height: 25px; width: 25px;">';
                $("#div_rut").append(fila);
                $("#rutUsuario").val("");
                $('#btnAgregarUsuario').attr("disabled", true);
                return false;
            }

            // Si todo sale bien, eliminar errores (decretar que es válido)
            $("#div_rut").empty();

            var fila = '<label>Rut Valido</label><br/>';
            fila += '<img src="http://127.0.0.1/SacrificeSports/lib/img/tick.png" style="height: 25px; width: 25px;">';
            $("#div_rut").append(fila);

            var element = document.getElementById("btnAgregarUsuario");
            element.classList.remove("disabled");
        } else {
            $("#div_rut").empty();
            var fila = '<label>Rut Ya Registrado</label><br/>';
            fila += '<img src="http://127.0.0.1/SacrificeSports/lib/img/negativo.png" style="height: 25px; width: 25px;">';
            $("#div_rut").append(fila);
            $('#btnAgregarUsuario').attr("disabled", true);
        }
    });



}




function EditarUsuario() {
    var id = $("#id").val();
    var rutUsuario = $("#rutU").val();
    var nombreUsuario = $("#nombreU").val();
    var apellidoUsuario = $("#apellido").val();
    var fechaNacimiento = $("#fechaU").val();
    var correoUsuario = $("#correo").val();
    var clave = $("#claveU").val();
    var estado = $("#getEstado").val();
    var ocupacion = $("#getOcupacion").val();
    if (id == "" || rutUsuario == "" || nombreUsuario == "" || apellidoUsuario == "" || correoUsuario == "" || ocupacion == null || fechaNacimiento == "" || estado == null || clave == "") {
        $.notify({
            icon: "../lib/img/warning.png",
            message: "<strong>Ingrese los datos pedidos</strong> "
        }, {
            icon_type: 'image',
            type: "warning"
        });
    } else {
        $.ajax({
            url: 'http://127.0.0.1/SacrificeSports/index.php/editUser',
            type: 'POST',
            dataType: 'json',
            data: { "id": id, "rutUsuario": rutUsuario, "nombreUsuario": nombreUsuario, "apellidoUsuario": apellidoUsuario, "fechaNacimiento": fechaNacimiento, "correoUsuario": correoUsuario, "clave": clave, "ocupacion": ocupacion, "estado": estado }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                $.notify({
                    icon: "../lib/img/tick2.png",
                    message: "<strong>Usuario Editado con Exito!!!</strong> "
                }, {
                    icon_type: 'image',
                    type: "success"
                });
            } else {
                $.notify({
                    icon: "../lib/img/no.png",
                    message: "<strong>Error al ingresar al sistema, intentelo nuevamente</strong>"
                }, {
                    icon_type: 'image',
                    type: "danger"
                });
            }
        });
    }
}

function RegistrarClase() {
    var nombreClase = $("#nombreClase").val();
    var dia = $("#selectDia").val();
    var hora = $("#selectHora").val();
    var salon = $("#selectSalon").val();
    var profesor = $("#selectProfesor").val();
    var asistentes = 0;
    if (nombreClase == "" || dia == null || hora == null || salon == null || profesor == null) {
        $.notify({
            icon: "../lib/img/warning.png",
            message: "<strong>Ingrese los datos pedidos</strong> "
        }, {
            icon_type: 'image',
            type: "warning"
        });
    } else {
        $.ajax({
            url: 'http://127.0.0.1/SacrificeSports/index.php/addClase',
            type: 'POST',
            dataType: 'json',
            data: { "nombreClase": nombreClase, "asistentes": asistentes, "dia": dia, "hora": hora, "salon": salon, "profesor": profesor }
        }).then(function (msg) {
            if (msg.msg == "ok") {
                $.notify({
                    icon: "../lib/img/tick2.png",
                    message: "<strong>Clase Registrada con Exito!!!</strong> "
                }, {
                    icon_type: 'image',
                    type: "success"
                });
                table.ajax.reload(null, false);


            } else {
                $.notify({
                    icon: "../lib/img/no.png",
                    message: "<strong>Error al ingresar al sistema, intentelo nuevamente</strong>"
                }, {
                    icon_type: 'image',
                    type: "danger"
                });
            }
        });
    }
}


function tecladoVirtual(input) {
    if (document.getElementById("tecladoVirtualCheck").checked) {
        changeDivTeclado(input, "tecladoVirtualCheck", -160, 110);
    } else {
        cerrarTeclado();
    }
}

function calcularDigitoVerificadorRUT(strRutSinDv) {
    var lengthRut = strRutSinDv.length;
    var lngSumaTotal = calculaSumaRut(strRutSinDv, lengthRut);
    /* var intRestoSumaTotal = 11 - (lngSumaTotal mod 11); */
    var intRestoSumaTotal = 11 - (lngSumaTotal % 11);
    var strDVCalculado;

    switch (intRestoSumaTotal) {
        case 10:
            {
                strDVCalculado = "K";
                break
            }
        case 11:
            {
                strDVCalculado = "0";
                break
            }
        default:
            {
                strDVCalculado = "" + intRestoSumaTotal;
                break
            }
    }
    return strDVCalculado;
}

function calculaSumaRut(strRut, lngRut) {
    var sumaRut;
    if (lngRut == 0) {
        sumaRut = 0;
    } else {
        var i = strRut.length - lngRut + 2;
        if (i >= 8) {
            i = i - 6;
        }
        var a = strRut.substr(lngRut - 1, 1);
        var lngSumParcial = a * i;
        sumaRut = lngSumParcial + calculaSumaRut(strRut, lngRut - 1);
    }
    return sumaRut;
}

function formatoRut() {
    var formLogin = document.getElementById("login");
    var sRut1 = formLogin.j_username.value.toUpperCase();
    sRut1 = quitarEspacios(sRut1);
    // var sRut1 = rut.value;
    // contador de para saber cuando insertar el . o la -
    var nPos = 0;

    // Guarda el rut invertido con los puntos y el gui�n agregado
    var sInvertido = "";

    // Guarda el resultado final del rut como debe ser
    var sRut = "";
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");

    for (var i = sRut1.length - 1; i >= 0; i--) {
        sInvertido += sRut1.charAt(i);
        if (i == sRut1.length - 1)
            sInvertido += "-";
        else if (nPos == 3) {
            sInvertido += ".";
            nPos = 0;
        }
        nPos++;
    }

    for (var j = sInvertido.length - 1; j >= 0; j--) {
        if (sInvertido.charAt(sInvertido.length - 1) != ".")
            sRut += sInvertido.charAt(j);
        else if (j != sInvertido.length - 1)
            sRut += sInvertido.charAt(j);

    }
    // Pasamos al campo el valor formateado
    // rut.value = sRut.toUpperCase();
    document.getElementById("login").j_username.value = sRut.toUpperCase();

}

function quitarEspacios(rut) {
    var i = 0;
    while (rut.length > i) {
        if ((rut.substring(i, i + 1) == " ") || (rut.codePointAt(i) == 173)) {
            rut = rut.substring(0, i) + rut.substring(i + 1, rut.length);
        } else {
            i = i + 1;
        }
    }
    return rut;
}


function rut(value) {
    var sRut1 = value;
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");
    if (sRut1.length > 9) {
        jQuery('#username').replaceSelection("", true);
    } else {
        var str = value.substring(value.length - 1, value.length);
        if (str != "0" && str != "1" && str != "2" && str != "3" && str != "4" && str != "5" &&
            str != "6" && str != "7" && str != "8" && str != "9" && str != "K" && str != "k") {
            jQuery('#username').replaceSelection("", true);
        }
    }

}

function esRutLogin(evt) {
    var charCode = getCharCode(evt);
    if (charCode == 0 || largo(evt)) {
        return esRUT(evt);
    }
    return false;
}

function largo(evt) {
    var formLogin = document.getElementById("login");
    var sRut1 = formLogin.j_username.value.toUpperCase();
    while (sRut1.indexOf(".") != -1) {
        sRut1 = sRut1.replace(".", "");
    }
    sRut1 = sRut1.replace("-", "");
    if (sRut1.length < 9) {
        return true;
    }
    return false;
}


