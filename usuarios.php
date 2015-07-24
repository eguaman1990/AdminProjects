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
        <form class="form-horizontal">
          <fieldset>
            <legend>Legend</legend>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Checkbox
                  </label>
                </div>
                <br>
                <div class="togglebutton">
                  <label>
                    <input type="checkbox" checked=""> Toggle button
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputFile" class="col-lg-2 control-label">File</label>
              <div class="col-lg-10">
                <input type="text" readonly="" class="form-control floating-label" placeholder="Browse...">
                <input type="file" id="inputFile" multiple="">
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Textarea</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Radios</label>
              <div class="col-lg-10">
                <div class="radio radio-primary">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Option one is this
                  </label>
                </div>
                <div class="radio radio-primary">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Option two can be something else
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="select" class="col-lg-2 control-label">Selects</label>
              <div class="col-lg-10">
                <select class="form-control" id="select">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <br>
                <select multiple="" class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
