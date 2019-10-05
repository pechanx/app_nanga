<?php

class genUnidadMedida {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_predeterminada;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'gen_unidad_medida';

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
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla . ' WHERE es_predeterminada = TRUE';
        $consulta = $this->conn->prepare($sql);
        $consulta->execute();
        return $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

}
