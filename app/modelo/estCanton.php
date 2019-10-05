<?php

class estCanton {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $es_canton_actual;
    private $codigo;
    private $codigo_acumulado;
    private $est_provincia_id;
    private $area;
    private $poligono;
    private $db;
    private $conn;
    private $nombreTabla = 'est_canton';

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
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla . ' ORDER BY nombre ASC';
        $consulta = $this->conn->prepare($sql);
        $consulta->execute();
        return $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

}
