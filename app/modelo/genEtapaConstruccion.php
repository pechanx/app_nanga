<?php

class genEtapaConstruccion {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $es_terminada;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'gen_etapa_construccion';

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

     public function listar() {
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla;
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
