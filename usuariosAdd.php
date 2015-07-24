<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>..: AdminProjects :..</title>
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="resources/css/roboto.min.css" rel="stylesheet" type="text/css"/>
    <link href="resources/css/material-fullpalette.min.css" rel="stylesheet" type="text/css"/>
    <link href="resources/css/ripples.min.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="resources/js/ripples.min.js"></script>
    <script src="resources/js/material.min.js"></script>
    <script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
  </body>
</html>
