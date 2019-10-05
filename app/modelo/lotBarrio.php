<?php

class lotBarrio {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo = 'TRUE';
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_barrio';

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

    function validarBarrioIngresado() {
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
        if (!is_numeric($this->nombre)) {
            $sql = 'INSERT INTO ' . $this->nombreTabla . '(nombre, es_activo) VALUES (?, ?)';
            $cons = $this->conn->prepare($sql);
            $cons->bindParam(1, $this->nombre);
            $cons->bindParam(2, $this->es_activo);
            if ($cons->execute()) {
                return $this->db->obtenerId('lot_barrio');
            } else {
                $detalle_error = array(
                    'tabla' => 'lot_barrio',
                    'error' => $cons->errorInfo()
                );
                print_r($detalle_error);
                return 0;
            }
        } else {
            return $id_lot_barrio = $this->nombre;
        }
    }

}
