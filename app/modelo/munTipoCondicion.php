<?php

class munTipoCondicion {

    private $db;
    private $conn;
    private $nombreTabla = 'mun_tipo_condicion';

    function __construct() {
        $this->db = new ConexionDB();
        $this->conn = $this->db->conectar();
    }

    function get($atributo) {
        return $this->$atributo;
    }

    function set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    function listar() {
        $sql = 'SELECT id, nombre  FROM '.$this->nombreTabla.' ORDER BY id ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
