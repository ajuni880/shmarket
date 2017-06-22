<?php

/* Classe encarregada de gestionar las connexions a la base de dades */

class DBConnect{

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $conn;
    private $stmt;
    private $array;
    static $_instance;

    /* La función construct és privada per  evitar que l'objecte pugui ser creat mitjançant new */

    private function __construct() {
        $this->setConexion();
        $this->connectar();
    }

    /* Mètode per establir els paràmetres de la connexió */

    private function setConexion() {

        $this->servidor =  'localhost';
        $this->base_datos = 'shmarket';
        $this->usuario = 'root';
        $this->password = 'root';
    }

    /* Evitem el clonatge de l'obejcte: Patró Singleton */

    private function __clone() {
    }

    /* Funció encarregada de crear, si s'escau, l'objete. Aquesta és la funció que hem de cridar des de fora de la classe per a instanciar l'objecte i així poder fer servir els seus mètodes */

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /* Realitza la connexió a la base de dades. */

    private function connectar() {
        try {
            $this->conn = new PDO('mysql:dbname=' . $this->base_datos . ';host=' . $this->servidor, $this->usuario, $this->password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            $this->conn = null;
        }
    }

    public function execution($sql, $vector) {

        if ($this->conn != null) {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($vector);
        } else {
            $this->stmt = null;
        }
        return $this->stmt; //retorna la consulta select o el número de files afectades
    }

    public function lastInsertId(){
      return $this->conn->lastInsertId();
    }

    public function selectQuery($sql,$vector){
        $result = false;

        if ($this->conn != null) {
           $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($vector);
            $result = $this->stmt->fetchAll();
        } else {
            $this->stmt = null;
            $result = false;
        }
        return $result; //retorna la consulta select o el número de files afectades
    }

    //si necessitem altres coses, com per exemple, saber el darrer id insertat, l'hem de codificar a banda
}
?>
