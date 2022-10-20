<?php

require_once '../models/Filtro.model.php';

$filtro = new Filtro();

if (isset($_GET['op'])){

    $operacion = $_GET['op'];

    if ($operacion == 'listarDepartamento'){
        $clave = $filtro->listarDepartamentos();

        echo "<option value=''>Seleccione</option>";

        foreach($clave as $valor){
            echo "
                <option value='$valor->dpto'>{$valor->dpto}</option>  
            ";
        }

    }

    // Lo buscamos por nombre de departamento
    if ($operacion == 'listarProvincias') {
        $clave = $filtro->listarProvincias(["dpto" => $_GET['dpto']]);

        foreach($clave as $valor){
            echo "
                <option value='$valor->prov'>$valor->prov</option>
            ";    
        }
    }

    if ($operacion == 'listarDistritos') {
        $clave = $filtro->listarDistritos(["prov" => $_GET['prov']]);

        foreach($clave as $valor){
            echo "
                <option value='$valor->ubigeo1'>$valor->distrito</option>
            ";   
        }
    }

}
?>