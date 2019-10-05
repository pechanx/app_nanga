<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lotTipoCaracteristica
 *
 * @author Usuario
 */
class lotListaValores {

    private $id;
    private $lot_tipo_caracteristica_id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_lista_valores';
    private $nombreTablaForanea = 'lot_tipo_caracteristica';

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
        $sql = 'SELECT val.id, val.nombre '
                . 'FROM '.$this->nombreTablaForanea.' car, '.$this->nombreTabla.' val '
                . 'WHERE car.id = val.lot_tipo_caracteristica_id AND '
                . 'val.lot_tipo_caracteristica_id = ? ORDER BY val.nombre ASC';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->lot_tipo_caracteristica_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
