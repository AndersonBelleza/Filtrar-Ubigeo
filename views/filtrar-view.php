<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  </head>
  <body>
      <div class="container mt-5">

        <div class="jumbotron">
            <h1 class="display-4">Filtro de ubigeo</h1>
            <hr class="my-2">

            <div class="row mt-5">
                <div class="col-md-4 form-group">
                    <label for="departamento">Departamento</label>
                    <select class="form-control" name="" id="departamento">
                        
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="provincia">Provincia</label>
                    <select class="form-control" name="" id="provincia">
                        <option value="">Seleccione</option>    
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="distrito">Distrito</label>
                    <select class="form-control" name="" id="distrito">
                        <option value="">Seleccione</option>    
                    </select>
                </div>
            </div>
        </div>

      </div>
  </body>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
    $(document).ready(function (){
        
        function listarDepartamento(){

            var datosEnviar = {
                'op'            : 'listarDepartamento'
            };

            $.ajax({
                url: '../controllers/Filtro.controller.php',
                type: 'GET',
                data: datosEnviar,
                success: function(result){
                    $("#departamento").html(result);
                }
            });
        }

        $("#departamento").change(function (){
            var departamento = $("#departamento").val();

            $.ajax({
                url: '../controllers/Filtro.controller.php',
                type: 'GET',
                data: 'op=listarProvincias&dpto=' + departamento,
                success: function(result){
                    $("#provincia").html(result);
                    
                }
            });
        });

        $("#provincia").change(function (){
            var provincia = $("#provincia").val();

            $.ajax({
                url: '../controllers/Filtro.controller.php',
                type: 'GET',
                data: 'op=listarDistritos&prov=' + provincia,
                success: function(result){
                    $("#distrito").html(result);
                    
                }
            });
        });

        listarDepartamento();

    });

    </script>



</html>