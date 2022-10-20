<?php

require_once '../core/model.master.php';

class Filtro extends ModelMaster{

    public function listarDepartamentos(){
        try{
            return parent::getRows("spu_listar_departamento");
        } 
        catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function listarProvincias(array $data){
        try{
            return parent::execProcedure($data, "spu_listar_provincias", true);
        }
        catch(Exception $error){
        die($error->getMessage());
        }
    }

    public function listarDistritos(array $data){
        try{
            return parent::execProcedure($data, "spu_listar_distrito", true);
        }
        catch(Exception $error){
        die($error->getMessage());
        }
    }
}

?>