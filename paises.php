<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>..: AdminProjects :.. - Paises</title>
        <link href="Resources/Bootstrap-material-design/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Resources/Bootstrap-material-design/css/roboto.min.css" rel="stylesheet" type="text/css"/>
        <link href="Resources/Bootstrap-material-design/css/material-fullpalette.min.css" rel="stylesheet" type="text/css"/>
        <link href="Resources/Bootstrap-material-design/css/ripples.min.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Resources/bootstrap-table-master/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
         <?php require_once 'navbar.php'; ?>
        <div class="container">
            <div class="well bs-component">
                <h1 class="page-header">Paises</h1>
                <div class="row">
                    <button class="btn btn-success" name="btnNew" id="btnNew" 
                            title="Agregar nuevo registro" onclick="window.location.href='bancosAdd.php';">Agregar</button>
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
    </body>
</html>
