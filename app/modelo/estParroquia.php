<?php

class estParroquia {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $codigo;
    private $codigo_acumulado;
    private $est_canton_id;
    private $area;
    private $poligono;
    private $db;
    private $conn;
    private $nombreTabla = 'est_parroquia';

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
        $sql = 'SELECT * FROM ' . $this->nombreTabla;
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    function listarOrdenadoNombre() {
        $sql = 'SELECT * FROM ' . $this->nombreTabla . ' ORDER BY nombre ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    function listarPorCanton() {
        $sql = 'SELECT * FROM ' . $this->nombreTabla . ' WHERE est_canton_id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->est_canton_id);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

}
