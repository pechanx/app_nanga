<?php

class preListaValores {

    private $id;
    private $nombre;
    private $id_sinat;
    private $pre_tipo_caracteristica_id;
    private $es_activo;
    
    private $db;
    private $conn;
    private $nombreTabla = 'pre_lista_valores';

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

    function listarPorTipoCaracteristica() {
        $sql = 'SELECT id, nombre FROM pre_lista_valores WHERE pre_tipo_caracteristica_id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->pre_tipo_caracteristica_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
