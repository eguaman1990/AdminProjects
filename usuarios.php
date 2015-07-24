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
        <h1 class="page-header">Usuarios</h1>
        <div class="row">
          <button class=" btn btn-success" name="btnNew" id="btnNew" title="Agregar a un Nuevo Usuario" 
                  onclick="window.location.href = 'usuariosAdd.php'">Agregar Usuario</button>
        </div>
      </div>
    </div>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="resources/js/ripples.min.js"></script>
    <script src="resources/js/material.min.js"></script>
    <script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
  </body>
</html>
