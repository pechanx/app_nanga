<?php

class viaTipoCaracteristica {

    private $id;
    private $nombre;
    private $id_sinat;
    private $tipo_dato;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'via_tipo_caracteristica';
    
    private $nombreTablaForaneaViaListaValores = 'via_lista_valores';
    private $via_tipo_caracteristica_id;

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
        $sql = 'SELECT val.id, val.nombre '
                . 'FROM ' . $this->nombreTabla . ' tcar, ' . $this->nombreTablaForaneaViaListaValores . ' val '
                . 'WHERE tcar.id = val.via_tipo_caracteristica_id '
                . 'AND val.via_tipo_caracteristica_id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->via_tipo_caracteristica_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
