<?php

require_once '../core/model.master.php';

class Especialidad extends ModelMaster{

    public function cargarEspecialidades(array $data){
        try{
        return parent::execProcedure($data, "spu_especialidades_cargar", true);
        }
        catch(Exception $error){
        die($error->getMessage());
        }
    }


    //Anderson


    public function listarEspecialidades(){
        try{
            return parent::getRows("spu_especialidades_listaunica");
        } 
        catch (Exception $error){
            die($error->getMessage());
        }
    }

    public function listarEspecialidadesPorSede(array $data){
        try{
            return parent::execProcedure($data, "spu_especialidades_listarPorSede", true);
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function detalleespecialidad(array $data){
        try{
            return parent::execProcedure($data, "spu_detalleespecialidad_detalle", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }


    public function sedesEspecialidades(array $data){
        try{
            return parent::execProcedure($data, "spu_sedes_especialidades", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function filtrarSedes(){
        try{
            return parent::getRows("spu_sedesfiltrar_especialidades");
        } 
        catch (Exception $error){
            die($error->getMessage());
        }
    }

}
?>