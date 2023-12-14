<?php
class Clase_Conectar_Base_Datos{
    public $conexion;
    protected $db;
    private $host = "localhost";  //192.168.100.103
    private $user = "root";
    private $pass = ''; // Esto es solo para MAMP private $pass = "root";
    /**
     * XAMPP password = '';
     */
    private $dbname = "trenes";
    public function ProcedimientoConectar(){
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        if($this->conexion->connect_errno){
            die("Fallo al conectar a MySQL" . mysqli_error($this->conexion));
        }
        $this->db =mysqli_select_db($this->conexion, $this->dbname); 
        if(!$this->db) die ("No se pudo seleccionar la base de datos" . mysqli_error($this->conexion));
        return $this->conexion;
    
    
    }

}