<?php

class genClaseEstructuraMaterial {

    private $id;
    private $id_sinat;
    private $es_activo;
    private $gen_clase_estructura_id;
    private $gen_material_id;
    private $db;
    private $conn;
    private $nombreTabla = 'gen_clase_estructura_material';
    private $nombreTablaClaseEstructura = 'gen_clase_estructura';
    private $nombreTablaMaterial = 'gen_material';

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
        $sql = 'SELECT ma.id, ma.nombre
            FROM ' . $this->nombreTablaClaseEstructura . ' est,
            ' . $this->nombreTabla . ' est_ma,
            ' . $this->nombreTablaMaterial . ' ma
            WHERE est.id = est_ma.gen_clase_estructura_id AND
            ma.id = est_ma.gen_material_id AND
            est_ma.gen_clase_estructura_id = ?
            ORDER BY ma.id ASC';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_clase_estructura_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
