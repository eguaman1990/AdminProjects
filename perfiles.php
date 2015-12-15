<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>..: AdminProjects :.. - Perfiles</title>
        <?php require_once 'head.php'; ?>
        <link href="Resources/bootstrap-table-master/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require_once 'navbar.php'; ?>
        <div class="container">
            <div class="well bs-component">
                <h1 class="page-header">Perfiles</h1>
                <div class="row">
                    <button class=" btn btn-success" name="btnNew" id="btnNew" title="Agregar a un Nuevo Registro" 
                            onclick="window.location.href = 'perfilesAdd.php'">Agregar</button>
                    <div class="table-responsive">
                        <table id="table-javascript"></table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="id" name="id" />
        <div id="foo"></div>
        <?php require_once 'modal.php'; ?>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="Resources/Bootstrap-material-design/js/ripples.min.js"></script>
        <script src="Resources/Bootstrap-material-design/js/material.min.js"></script>
        <script src="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
        <script src="Resources/bootstrap-table-master/dist/bootstrap-table.min.js" type="text/javascript"></script>
        <script src="Resources/bootstrap-table-master/dist/locale/bootstrap-table-es-AR.min.js" type="text/javascript"></script>
        <script src="Resources/Bootstrap-material-design/js/spin.js" type="text/javascript"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>
