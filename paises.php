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
        <?php require_once 'head.php'; ?>
        <link href="Resources/bootstrap-table-master/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require_once 'navbar.php'; ?>
        <div class="container">
            <div class="well bs-component">
                <h1 class="page-header">Paises</h1>
                <div class="row">
                    <button class="btn btn-success" name="btnNew" id="btnNew" 
                            title="Agregar nuevo registro" onclick="window.location.href = 'paisesAdd.php';">Agregar</button>
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
        <script src="Resources/Bootstrap-material-design/js/spin.js" type="text/javascript">
            var target = document.getElementById('foo');
            var $spinner = new Spinner().spin();
            target.appendChild($spinner.el);

            $spinner.stop();
            $(function () {

                $('#table-javascript').bootstrapTable({
                    method: 'post',
                    url: 'Controller/paisesController.php',
                    cache: false,
                    height: 400,
                    striped: true,
                    pagination: true,
                    pageSize: 50,
                    pageList: [5, 10, 15, 20, 25],
                    search: true,
                    showColumns: true,
                    showToggle: true,
                    showRefresh: true,
                    minimumCountColumns: 2,
                    clickToSelect: true,
                    columns: [{
                            field: 'nro',
                            title: 'N°',
                            align: 'right',
                            valign: 'middle',
                            sortable: true
                        }, {
                            field: 'pais',
                            title: 'País',
                            align: 'left',
                            valign: 'middle',
                            sortable: true
                        }, {
                            field: 'sigla',
                            title: 'Sigla',
                            align: 'left',
                            valign: 'middle',
                            sortable: true
                        }, {
                            field: 'vigente',
                            title: 'Vigente',
                            align: 'left',
                            valign: 'middle',
                            sortable: true
                        }, {
                            field: 'operate',
                            title: 'Opciones',
                            align: 'center',
                            valign: 'middle',
                            clickToSelect: false,
                            formatter: operateFormatter,
                            events: operateEvents
                        }]
                });
            });

            window.operateEvents = {
                'click .edit': function (e, value, row, index) {
                    //alert('You click edit icon, row: ' + JSON.stringify(row));
                    //console.log(value, row, index);
                    window.location.href = "paisesEdit.php?id_persona=" + row.id_persona;
                },
                'click .remove': function (e, value, row, index) {
                    modal("Eliminar", "¿Desea Eliminar el registro seleccionado?", "Eliminar");
                    $("#id").val(row.id_pais);

                }
            };

            function Eliminar() {
                var id = $("#id").val();
                $.ajax({
                    url: "Controller/paisesController.php",
                    data: {
                        'accion': 'eliminar',
                        'id_persona': id
                    },
                    beforeSend: function (xhr) {
                        $spinner.spin();
                        target.appendChild($spinner.el);
                    },
                    complete: function (e) {
                        $spinner.stop();
                        window.location.href = "paises.php";
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        $spinner.stop();
                    }
                });
            }

            function operateFormatter(value, row, index) {
                return [
                    '<a class="edit btn btn-warning btn-raised btn-xs " href="javascript:void(0)" title="Editar">',
                    '<i class="mdi-content-create"></i>',
                    '</a>',
                    '<a class="remove btn btn-danger btn-raised btn-xs" href="javascript:void(0)" title="Eliminar">',
                    '<i class="mdi-action-delete"></i>',
                    '</a>'
                ].join('');
            }
            $("#btnModalAceptar").on("click", function () {
                Eliminar();
                modalClose();
            });
        </script>
    </body>
</html>
