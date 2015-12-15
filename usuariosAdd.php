<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>..: AdminProjects :..</title>
        <?php require_once 'head.php'; ?>
    </head>
    <body>
        <?php require_once 'navbar.php'; ?>
        <div class="container">
            <div class="well bs-component">
                <form class="form-horizontal" id="frmAdd">

                    <h1 class="page-header">Agregar Usuario</h1>
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Datos Persona</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtNombre">Nombre:</label>  
                            <div class="col-md-4">
                                <input id="txtNombre" name="txtNombre" type="text" placeholder="Ingrese su Nombre" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtApPaterno">Apellido Paterno:</label>  
                            <div class="col-md-4">
                                <input id="txtApPaterno" name="txtApPaterno" type="text" placeholder="Ingrese su Apellido Paterno" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtApellidoMaterno">Apellido Materno:</label>  
                            <div class="col-md-4">
                                <input id="txtApellidoMaterno" name="txtApellidoMaterno" type="text" placeholder="Ingrese su Apellido Materno" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtEmail">Email:</label>  
                            <div class="col-md-4">
                                <input id="txtEmail" name="txtEmail" type="text" placeholder="example@example555.com" class="form-control input-md" required="">

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Datos Usuario</legend>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtUser">Nombre Usuario:</label>  
                            <div class="col-md-4">
                                <input id="txtUser" name="txtUser" type="text" placeholder="Ingrese su Nombre de Usuario" class="form-control input-md" required="">
                                <span class="help-block">Nombre de Usuaio para el Inicio de Sesión</span>  
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtClave">Clave</label>
                            <div class="col-md-4">
                                <input id="txtClave" name="txtClave" type="password" placeholder="Ingrese su Clave" class="form-control input-md" required="" minlength="8" maxlength="16">
                                <span class="help-block">Minimo 8 dígitos</span>
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="txtClaveRep">Repita Clave</label>
                            <div class="col-md-4">
                                <input id="txtClaveRep" name="txtClaveRep" type="password" placeholder="Repita su Clave" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="btnGuardar"></label>
                            <div class="col-md-8">
                                <button id="btnGuardar" name="btnGuardar" class="btn btn-success" type="submit" >Guardar</button>
                                <button id="btnCancelar" name="btnCancelar" class="btn btn-danger" type="button">Cancelar</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="Resources/Bootstrap-material-design/js/ripples.min.js"></script>
        <script src="Resources/Bootstrap-material-design/js/material.min.js"></script>
        <script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
        <script src="Resources/Bootstrap-material-design/js/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).on("ready", function () {
                function error(e) {
                    alert("se prudujo un error");
                }

                function agregar() {

                    $.ajax({
                        type: 'POST',
                        data: {
                            accion: 'add',
                            nombre: $("#txtNombre").val(),
                            ap_paterno: $("#txtApPaterno").val(),
                            ap_materno: $("#txtApellidoMaterno").val(),
                            user: $("#txtUser").val(),
                            pass: $("#txtClave").val(),
                            email: $("#txtEmail").val()
                        },
                        url: "controller/usuarioController.php",
                        success: function (e) {
                            window.location.href = "usuarios.php";
                        },
                        error: function (e) {
                            error(e);
                        }
                    });
                }

                var validacion = jQuery("#frmAdd").validate({
                    debug: true,
                    errorClass: 'error help-inline',
                    validClass: 'success',
                    errorElement: 'span',
                    highlight: function (element, errorClass, validClass) {
                        $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass);
                        $(element).closest('.form-group').addClass('has-error').removeClass('has-success"');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success"');
                    },
                    rules: {
                        txtClave: "required",
                        txtClaveRep: {
                            equalTo: "#txtClave"
                        },
                        txtUser: {
                            remote: {
                                url: "controller/validaciones.php",
                                type: "post",
                                data: {
                                    accion: "validaUsuario"
                                }
                            }
                        },
                        txtEmail: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        txtUser: {
                            remote: "Nombre de Usuario ya Existe"
                        }
                    },
                    submitHandler: function (form) {
                        console.info("ingreso");
                        agregar();
                    }
                });

                $("#btnCancelar").on("click", function () {
                    window.location.href = "usuarios.php";
                });
            });
        </script>
    </body>
</html>
