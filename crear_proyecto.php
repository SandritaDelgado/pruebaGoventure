<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/estilos.css"> 
    <script src="https://kit.fontawesome.com/493f69e1b8.js" crossorigin="anonymous"></script>


  </head>
    
  <body>
    <br>
    <br>
    <br>
   <div class="container">
    <h1>Gestión de Tareas</h1>
    <div id="h" class="container">
      <style>
        .h {
          text-align: center;
        }

        #container {
  height: 1000;
  width: auto;
  padding: 15px;
  position: relative;
}
.columna {
  width: auto;
  height: auto;
  float: left;
  
}
.columna div {
  height: auto;
  width: auto;
  margin-right: 50px;
  /* background: red; */
}
      </style>
<div id="container">
  <div class="columna">
    <div><input type="text" class="form-control" id="tarea" placeholder="Nueva tarea..."> </div>
  </div>
  <div class="columna">
    <div><input type="checkbox" class="form-check-input" name="php0" value="PHP">PHP</input></div>
  </div>
  <div class="columna">
    <div><input type="checkbox" class="form-check-input" name="php1" value="JavaScript">JavaScript</input></div>
  </div>
  <div class="columna">
    <div><input type="checkbox" class="form-check-input" name="php2" value="CSS">CSS</input></div>
  </div>
  <div class="columna">
    <div><button type="submit" id="aniadir" class="btn btn-primary pull-right menu" onclick="javascript:insertarDatos()" ><i class="fas fa-plus"></i> Enviar</button></div>
  </div>
</div>
  
   
    
    <div style="height:50px"></div>
    
     <div class="container" style="background-color: #ffffff; padding: 20px; margin: auto; ">  
    <!--Ejemplo tabla con DataTables-->
    
        <div class="row">
                <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tarea</th>
                                <th>Lenguaje</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>       
                       </table>                  
                </div> 
    </div>    
    </div> 
  
      
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>  

    <script src="https://clipboardjs.com/dist/clipboard.min.js"></script>
    
    <script>

    $(document).ready(function() { 
        $('#example').DataTable({
            lengthChange: false,
            //dom: 'Bfrtip',
            // buttons: [ 
            //     { extend: 'copy', text: 'Copiar' },
            //     { extend: 'excel', text: 'Excel' },
            //     { extend: 'csv', text: 'CSV' },
            //     { extend: 'pdf', text: 'PDF' },
            //     { extend: 'colvis', text: 'Vista' }],
            responsive: true,
            ajax: "ajax_listar_tareas.php",
            language: {
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando _START_ de _END_ filas",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast":"Último",
                            "sNext":"Siguiente",
                            "sPrevious": "Anterior"
                         },
                         "sProcessing":"Procesando...",
                }
        });

    });
  </script>

  <script type="text/javascript">
    function insertarDatos(){
        var tarea = $('#tarea').val();
        
        var array = new Array();
        for (var i = 0; i < 3; i++){
          array[i] = $("input:checkbox[name=php"+i+"]:checked").val();
        }
        //funcion que elimina los elementos vacios
        array = array.filter(function(dato){
          return dato != undefined
        });
        //alert(array);
      
        $.ajax({
              type: "POST",
              url: "ajax_insertar_datos.php",
              data: {
                  tarea: tarea,
                  array: array
              },
              success: function (data) {
                $('#example').DataTable().ajax.reload();

              }
        });
    }

    function eliminarTarea(id){
        $.ajax({
                  type: "POST",
                  url: "ajax_borrar_tarea.php",
                  data: {
                      id : id
                  },
                  
                  success: function (data) {            
                    $('#example').DataTable().ajax.reload();

                  }
        });
    }

  </script>

  </body>
</html>


