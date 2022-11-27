<?php


    class Conexion{


    private $conn = null;


    public function __construct(){

        include("config.php");

       
        $this->conn = new mysqli($serv, $user, $pass, $namedb);
        

        
        if ($this->conn->connect_errno) {
            echo "Error MySQLi: ". $this->conn->connect_error;
            exit();
        }
        $this->conn->set_charset("utf8");
    }

 
    public function __destruct(){
        $this->CloseDB();
    }

    //Funcion con la que se obtienen los datos de la conexion
    public function getConexion(){
        return $this->conn;
    }

    //funcion que regresa el resultado de un select
    public function select($qry){
        $result = $this->conn->query($qry);
        return $result;
    }

    //metodo para conectar a otras DB
    public function select_db($db){
      return $this->conn->select_db($db);
    }

    //metodo para regresar ultimo id
    public function insert_id(){
      return $this->conn->insert_id;
    }

    //funcion que realiza INSERT, UPDATE y DELETE y regresa true o false segun sea
    public function query($qry){

        if(!$this->conn->query($qry)){
            return false;
        }else{
            return true;
        }
        return null;
    }

    //Funcion que cierra la base de datos que se esta usando
    public function CloseDB(){
        $this->conn->close();
    }

}
?>
