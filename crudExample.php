<!DOCTYPE html>
<html>
<head>
    <title>CRUD Table</title>
    <meta charset="utf-8">
    
     <link href="Resources/Bootstrap-material-design/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
     <link href="Resources/bootstrap-table-master/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .update {
            color: #333;
            margin-right: 5px;
        }
        .remove {
            color: red;
            margin-left: 5px;
        }
        .alert {
            padding: 0 14px;
            margin-bottom: 0;
            display: inline-block;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="Resources/bootstrap-table-master/dist/bootstrap-table.min.js" type="text/javascript"></script>
        <script src="Resources/bootstrap-table-master/dist/locale/bootstrap-table-es-AR.min.js" type="text/javascript"></script>
    
</head>
<body>
    <div class="container">
        <h1>CRUD Table</h1>
        <p class="toolbar">
            <a class="create btn btn-default" href="javascript:">Create Item</a>
            <span class="alert"></span>
        </p>
        <table id="table"
               data-show-refresh="true"
               data-show-columns="true"
               data-search="true"
               data-query-params="queryParams"
               data-toolbar=".toolbar">
            <thead>
            <tr>
                <th data-field="nombre">Name</th>
                <th data-field="stargazers_count">Stars</th>
                <th data-field="forks_count">Forks</th>
                <th data-field="description">Description</th>
                <th data-field="action"
                    data-align="center"
                    data-formatter="actionFormatter"
                    data-events="actionEvents">Action</th>
            </tr>
            </thead>
        </table>
    </div>

    <div id="modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Stars</label>
                        <input type="number" class="form-control" name="stargazers_count" placeholder="Stars">
                    </div>
                    <div class="form-group">
                        <label>Forks</label>
                        <input type="number" class="form-control" name="forks_count" placeholder="Forks">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script>
    var API_URL = 'Controller/usuarioListController.php';
    var $table = $('#table').bootstrapTable({url: API_URL}),
        $modal = $('#modal').modal({show: false}),
        $alert = $('.alert').hide();
    $(function () {
        // create event
        $('.create').click(function () {
            showModal($(this).text());
        });
        $modal.find('.submit').click(function () {
            var row = {};
            $modal.find('input[name]').each(function () {
                row[$(this).attr('name')] = $(this).val();
            });
            $.ajax({
                url: API_URL + ($modal.data('id') || ''),
                type: $modal.data('id') ? 'put' : 'post',
                contentType: 'application/json',
                data: JSON.stringify(row),
                success: function () {
                    $modal.modal('hide');
                    $table.bootstrapTable('refresh');
                    showAlert(($modal.data('id') ? 'Update' : 'Create') + ' item successful!', 'success');
                },
                error: function () {
                    $modal.modal('hide');
                    showAlert(($modal.data('id') ? 'Update' : 'Create') + ' item error!', 'danger');
                }
            });
        });
    });
    function queryParams(params) {
        return {};
    }
    function actionFormatter(value) {
        return [
            '<a class="update" href="javascript:" title="Update Item"><i class="glyphicon glyphicon-edit"></i></a>',
            '<a class="remove" href="javascript:" title="Delete Item"><i class="glyphicon glyphicon-remove-circle"></i></a>',
        ].join('');
    }
    // update and delete events
    window.actionEvents = {
        'click .update': function (e, value, row) {
            showModal($(this).attr('title'), row);
        },
        'click .remove': function (e, value, row) {
            if (confirm('Are you sure to delete this item?')) {
                $.ajax({
                    url: API_URL + row.id,
                    type: 'delete',
                    success: function () {
                        $table.bootstrapTable('refresh');
                        showAlert('Delete item successful!', 'success');
                    },
                    error: function () {
                        showAlert('Delete item error!', 'danger');
                    }
                })
            }
        }
    };
    function showModal(title, row) {
        row = row || {
            name: '',
            stargazers_count: 0,
            forks_count: 0,
            description: ''
        }; // default row value
        $modal.data('id', row.id);
        $modal.find('.modal-title').text(title);
        for (var name in row) {
            $modal.find('input[name="' + name + '"]').val(row[name]);
        }
        $modal.modal('show');
    }
    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 3000);
    }
</script>
</body>
</html>