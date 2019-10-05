<?php

class estPoligono {

    private $id;
    private $id_sinat;
    private $es_activo;
    private $codigo_acumulado;
    private $est_manzana_id;
    private $area;
    private $tipo_ficha;
    private $poligono;
    private $codigo;
    private $descripcion_franja_conflicto;
    private $db;
    private $conn;
    private $nombreTabla = 'est_poligono';

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

    function validarClaveCatastral() {
        $sql = 'SELECT codigo_acumulado FROM ' . $this->nombreTabla . ' WHERE codigo_acumulado = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->codigo_acumulado);
        $cons->execute();
        if ($cons->rowCount() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function obtenerIdPoligono() {
        $sql = 'SELECT id, codigo_acumulado FROM ' . $this->nombreTabla . ' WHERE codigo_acumulado = ? ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->codigo_acumulado);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos[0]['id'];
        } else {
            return 0;
        }
    }

}
