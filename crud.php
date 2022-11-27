<?php

    function conexion(){
// Conecta con base de datos
        $mysqli = new mysqli("localhost", "root", "", "upes-reclamos");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
    }



    //funcion que se encarga de ir a traer todos los datos de una tabla
    function findAll($tabla){ 
        $respuesta = array();
        $bd = conexion();      
        // Prepara SELECT
        $sql = "SELECT * FROM " . $tabla;
        $resultado = $bd -> query($sql);   
        while ($row = $resultado -> fetch_assoc()) { 
            array_push($respuesta, $row); 
        }
        if($bd->connect_errno) { 
            return $bd->error;  
        }   
        return $respuesta;
    }




    //funcion que se encarga de ir a traer todos los datos de una tabla
    function findUser($tabla, $nombre, $pass){ 
        $respuesta = array();
        $bd = conexion();      
        // Prepara SELECT
        $sql =  "SELECT nombre FROM ".$tabla." WHERE (nombre='".$nombre."'"."AND  password='".$pass."')";

        $resultado = $bd -> query($sql);   
        while ($row = $resultado -> fetch_assoc()) { 
            array_push($respuesta, $row); 
        }
        if($bd->connect_errno) { 
            return $bd->error;  
        }   
        return $respuesta;
    }






    // funcion para eliminar un registro de la BD
    //la llave primaria de la tabla debe llamarse id
    function delete($id, $tabla){   
        $bd = conexion();      
        // Prepara SELECT
        $sql = "DELETE FROM " . $tabla . " WHERE id = " . $id;
        $resultado = $bd -> query($sql); 
        if($bd->connect_errno) { 
            return $bd->error;  
        }
        return 'Registro eliminado correctamente';
    }

    //funcion para ir a buscar un campo en la BD
     //la llave primaria de la tabla debe llamarse id
    function find($dato, $tabla){       
        $respuesta = array();
        $bd = conexion();      
        // Prepara SELECT
        $sql = "SELECT * FROM " . $tabla . " WHERE id_reclamo = " . $dato;
        $resultado = $bd -> query($sql);         
        if($bd->connect_errno) { 
            return $bd->error;  
        }   
        return $resultado->fetch_assoc();
    }

    //funcion para crear un nuevo registro en la tabla
    //el array debe estar compuesto por el nombre del campo en la tabla y su valor
    function create($datos, $tabla){       
        $data=$data2='';
        $bd = conexion();
        foreach ($datos as $clave => $valor){
            if(!$data){
                $data = $clave;
            }else{
                $data = $data . ',' . $clave;
            }
            if(!$data2){
                $data2 = '"' . $valor . '"';
            }else{
                $data2 = $data2 . ', "' . $valor . '"';
            }
        }      
        // Prepara SELECT
        $sql = "INSERT INTO " . $tabla . "(".$data.") VALUES (".$data2.")";
        
        $resultado = $bd ->query($sql);  
        if($bd->connect_errno) { 
            return $bd->error;  
        }     
        return 1;
    }

    //funcion para actualizar un campo en la tabla
    //el array debe estar compuesto por el nombre del campo en la tabla y su valor
    //la llave primaria de la tabla debe ser id

    function update($id, $tabla, $datos){       
        $data='';
        $bd = conexion();
        foreach ($datos as $clave => $valor){
            if(!$data){
                $data = $clave . " = '" . $valor . "'";
            }else{
                $data = $data . ',' . $clave . " = '" . $valor . "'";
            }
           
        }      
        // Prepara SELECT
        $sql = "UPDATE " . $tabla . " SET " . $data . " WHERE id = " . $id;
        $resultado = $bd -> query($sql); 
        if($bd->connect_errno) { 
            return $bd->error;  
        }   
        return 'Registro Actualizado Correctamente';
    }

?>