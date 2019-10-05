<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lotLoteOcupacion
 *
 * @author Usuario
 */
class lotLoteOcupacion {

    private $id;
    private $nombre;
    private $id_sinat;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_lote_ocupacion';

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
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla . ' ORDER BY nombre ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
