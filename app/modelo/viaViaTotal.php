<?php

class viaViaTotal {

    private $id;
    private $id_sinat;
    private $nombre;
    private $nomenclatura;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'via_via_total';

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

    function validarViaIngresada() {
        $sql = 'SELECT id FROM ' . $this->nombreTabla . ' WHERE nombre = ? ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->nombre);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos[0]['id'];
        } else {
            return 0;
        }
    }

    function guardar() {
        $sql = 'INSERT INTO ' . $this->nombreTabla 
                . ' (nombre, nomenclatura, es_activo, descripcion) '
                . 'VALUES (?, ?, ?, ?)';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->nombre);
        $cons->bindParam(2, $this->nomenclatura);
        $cons->bindParam(3, $this->es_activo);
        $cons->bindParam(4, $this->descripcion);
        if ($cons->execute()) {
            return $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    function listarNombresVias() {
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla . ' ORDER BY nombre ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
