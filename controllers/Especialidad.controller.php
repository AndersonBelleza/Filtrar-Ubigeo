<?php

require_once '../models/Especialidad.model.php';

$especialidad = new Especialidad();

if (isset($_GET['op'])){

    if ($_GET['op'] == 'cargarEspecialidades') {
        $datos = $especialidad->cargarEspecialidades(["idsede" => $_GET['idsede']]);
        if(count($datos) == 0){
            echo "<option>No encontramos Especialidades disponibles</option>";
        }
        else{
            foreach($datos as $fila){
                echo "
                    <option value='$fila->especialidad'>$fila->especialidad</option>
                    ";    
            }

        }
    }

    if ($_GET['op'] == 'listarEspecialidadesSedeDetalle') {
        $datos = $especialidad->cargarEspecialidades(["idsede" => $_GET['idsede']]);
        if(count($datos) == 0){
            echo "<option>No encontramos registros disponibles</option>";
        }
        else{

            foreach($datos as $fila){

                echo "
                        <div class='card col-md-3' style='margin-bottom: 1.5em;  margin-left: 2em; margin-right: 4em;' >
                            <div class='card-body'>
                                <p>
                                    <img src='../famisaludwebadmin/img/especialidad/icono/$fila->fotografia2' class='content-message-services img-fluid rounded-start' alt='...' style='width: 8vh;height: 8vh; margin-right:1em'>
                                    $fila->especialidad
                                </p>
                            </div>
                        </div>

                        <!--
                        <div class='card col-mb-3' style='max-width: 540px;'>
                            <div class='row g-0'>
                                <div class='col-md-12'>
                                <img src='../famisaludwebadmin/img/especialidad/icono/$fila->fotografia2' class='img-fluid rounded-start' alt='...'>
                                </div>
                                <div class='col-md-12'>
                                <div class='card-body'>
                                    <p class='card-text'>$fila->especialidad</p>
                                </div>
                                </div>
                            </div>
                        </div> 
                        -->
                        
                    ";
                        
            }
        }
    }
       

    // Anderson 
    if ($_GET['op'] == 'listarEspecialidades') {
        $datos = $especialidad->listarEspecialidades();
        if(count($datos) != 0){
            // Variable, utilizado para comprobar si contiene imagen o no
            $imagen = "";

            // Mostrar un registro, por cada iteración
            foreach($datos as $fila){
                echo "
                <div class='col-md-4 mb-4 detespecialidad-impor'>
                    <div class='card reflejo'>
                        <div clas='col-md-8 img-espe'>
                            <img class='card-img-top' src='../famisaludwebadmin/img/especialidad/fotografia/$fila->fotografia'>
                        </div>
                        <div class='col-md-4'>
                            <div class='card-body'>
                                <h5 class='text-center style='margin-top: 0.5em; text-align:center;'>ESPECIALIDAD</h5>  
                                <h3 class='card-title  text-center' style='font-weight: bold;'>{$fila->especialidad}</h3>
                                <button type='button' class='btn mostrar vermas' id-codigo='$fila->idespecialidad' nombre-codigo='$fila->especialidad' data-bs-toggle='modal' data-bs-target='#modalId'> 
                                    <b>Ver más</b> <i class='fas fa-arrow-circle-right'></i>
                                </button> 
                            </div>
                        </div>
                    </div>
                </div>
                ";
                        
            }
        }
    }

    if ($_GET['op'] == 'listarEspecialidadesPorSede') {
        $datos = $especialidad->listarEspecialidadesPorSede(["idsede" => $_GET['idsede']]);
        
        if(count($datos) == 0){
            echo "No hay especialidades disponible en esta sede";
        }
        else{
            // Mostrar un registro, por cada iteración
            foreach($datos as $fila){
                    echo "
                    <div class='col-md-4 mb-4 detespecialidad-impor'>
                        <div class='card reflejo'>
                            <div clas='col-md-8 img-espe'>
                                <img class='card-img-top' src='../famisaludwebadmin/img/especialidad/fotografia/$fila->fotografia'>
                            </div>
                            <div class='col-md-4'>
                                <div class='card-body'>
                                    <h5 class='text-center style='margin-top: 0.5em; text-align:center;'>ESPECIALIDAD</h5>  
                                    <h3 class='card-title  text-center' style='font-weight: bold;'>{$fila->especialidad}</h3>
                                    <button type='button' class='btn mostrar vermas' id-codigo='$fila->idespecialidad' nombre-codigo='$fila->especialidad' data-bs-toggle='modal' data-bs-target='#modalId'> 
                                        <b>Ver más</b> <i class='fas fa-arrow-circle-right'></i>
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    if($_GET['op'] == "detalleespecialidad"){
        $datos = $especialidad->detalleespecialidad(["idespecialidad" => $_GET['idespecialidad']]);

        foreach($datos as $fila){
            $horariolv = "";
            $horariosd = "";
            $titulo = "";

            if($fila->horario == "" && $fila->horario2 == ""){
                $titulo = "";
            }else{
                $titulo = "<h5 class='text-center text-black '><b>Horario de atención:</b></h5>";
            }

            if($fila->horario == ""){
                $horariolv = "<h6 class='text-center'>Lunes a Viernes: No hay atención en esta especialidad</h6>";
            }else{
                $horariolv = "<h6 class='text-center'>$fila->horario</h6>";
            }

            if($fila->horario2 == ""){
                $horariosd = "<h6 class='text-center '>Sábados: No hay atención en esta especialidad</h6>";
            }else{
                $horariosd = "<h6 class='text-center '>$fila->horario2</h6>";
            }

            

            echo "
                <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-5 detespecialidad text-black'>                          
                            <h1 class='text-center mt-4'><b>{$fila->especialidad}</b></h1>
                            <hr>
                            <p class='detespecialidad text-justify'>{$fila->informacion}</p>
                            <br>
                            <div class='row mt-3'>
                                <div class='card py-3'>
                                    {$titulo}
                                    {$horariolv}
                                    {$horariosd}
                                </div>
                            </div>
                        </div>
                        <div class='col-md-5 text-center img-responsive'>                     
                            <img src='../famisaludwebadmin/img/especialidad/fotografia/$fila->fotografia' class='imagen-responsivo mt-4' alt='...'>
                        </div>
                        <div class='col-md-1'></div>
                    </div>
                </div>
            ";
        }
    }

    if($_GET['op'] == "sedesEspecialidades"){
        $datos = $especialidad->sedesEspecialidades(["especialidad" => $_GET['especialidad']]);

        foreach($datos as $fila){
            
            echo "
                <div class='col-md-4 sedeespecialidad'>
                    <div class='card mb-2' text-center style='max-width: 400px; margin-left: 1.5em; margin-right:1.5em'>
                        <div class='row g-0'>
                            <div class='col-md-12'>
                            <div class='card-body'>
                                <h5 class=' text-black text-center color-card-especialidad'>SEDE<hr> </h5>
                                <h3 class='card-text text-center' style='color: black;'> <b>$fila->sede</b> </h3>
                                <h6 class='text-black text-center'>$fila->direccion</h6>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";

        }
    }

    if ($_GET['op'] == 'filtrarSedes') {
        $datos = $especialidad->filtrarSedes();
        if(count($datos) > 0){
            // Mostrar un registro, por cada iteración
            foreach($datos as $fila){
                echo "
                    <option value='$fila->idsede'>$fila->sede</option>
                ";
                        
            }
        }
    }
}
?>