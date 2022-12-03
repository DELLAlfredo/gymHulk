<?php
class Modelo {

    public static function find($id) {
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $query = "SELECT * FROM " . static::class . " WHERE id =" . $id;
        $rs = $conn->prepare($query);
        $rs->execute();
        $dato = $rs->fetchObject(static::class); //devuelve la fila convertida en un objeto de la clase pasada como parametro
        return $dato;
    }

    public static function all() {
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $query = "SELECT * FROM " . static::class;
        $rs = $conn->prepare($query);
        $rs->execute();
        $datos = [];

        //mete en el array mientras la consulta tenga filas
        while ($dato = $rs->fetchObject(static::class)) {
            array_push($datos, $dato);
        }
        return $datos;
    }

    public function insert() {

        $vars = get_object_vars($this); //array con variables del objeto
        $table_name = get_class($this); //Nombre de la clase del objecto
        //si el id existe lo elimina
        if (isset($vars["id"])) {
            unset($vars["id"]);
        }

        $keys = array_keys($vars); //array con el nombre de los campos
        $values = ""; //llaves de valores a insertar (se inicializa con el valor del id)
        $params = [];
        $campos = "";
        //recorre el arreglo con todas las variables del objeto
        for ($i = 0; $i < count($vars); $i++) {
            $key = ":" . $keys[$i]; //nombre de la llave de params
            $values = $values . $key . ",";
            $campos = $campos . $keys[$i] . ",";
            $params[$key] = $vars[$keys[$i]];
            
        }

        $values = mb_substr($values, 0, -1); //quitar la ultima coma
        $campos = mb_substr($campos, 0, -1); //quitar la ultima coma

        $query = "INSERT INTO " . $table_name . "(" . $campos . ") VALUES (" . $values . ")";
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $rs = $conn->prepare($query);
        $rs->execute($params);

        //asignando id correspondiente al objeto
        
        $this->id = $this::getLastId($table_name)-1;
    }

    public static function getLastId( $table_name){
        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $query = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'gym_hulk' AND TABLE_NAME = '" . $table_name . "'";
        $rs = $conn->prepare($query);
        $rs->execute();
        $last_id = $rs->fetch();
        return $last_id[0];
    }

    public function delete() {
        $table_name = get_class($this); //Nombre de la clase del objecto
        $query = "DELETE FROM " . $table_name . " WHERE id = " . $this->id;

        $conexion = new Conexion();
        $conn = $conexion->conectar();

        $rs = $conn->prepare($query);
        $rs->execute();
    }

    //para usar esta funcion el objeto debe tener un id
    public function update() {

        $vars = get_object_vars($this); //array con variables del objeto
        $table_name = get_class($this); //Nombre de la clase del objecto
        $keys = array_keys($vars); //array con el nombre de los campos
        $values = "";
        $params = [];

        for ($i = 0; $i < count($vars); $i++) {
            $key = ":" . $keys[$i]; //nombre de la llave de params
            if ($keys[$i] != "id") {
                $values = $values . $keys[$i] . " = " . $key . ",";
            }
            $params[$key] = $vars[$keys[$i]];
        }

        $values = mb_substr($values, 0, -1); //quitar la ultima coma

        $query = "UPDATE " . $table_name . " SET " . $values . " WHERE id = :id";

        $conexion = new Conexion();
        $conn = $conexion->conectar();
        $rs = $conn->prepare($query);
        $rs->execute($params);
    }
}
