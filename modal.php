<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
          <button id="btnModalCancelar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button id="btnModalAceptar" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
 function modal(titulo,mensaje,btnAceptarText,btnCancelarText){
     $(".modal-header").html(titulo);
     $(".modal-body").html(mensaje);
     $("#btnModalAceptar").html(btnAceptarText);
     $("#btnModalCancelar").html(btnCancelarText);
     $('#myModal').modal();   
 }
 function modalClose(){
     $('#myModal').modal("hide");   
 }
</script>

