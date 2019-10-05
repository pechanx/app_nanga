<?php

class genClaseAcabadoMaterial {

    private $id;
    private $id_sinat;
    private $es_activo;
    private $gen_clase_acabado_id;
    private $gen_material_id;
    private $db;
    private $conn;
    private $nombreTabla = 'gen_clase_acabado_material';
    private $nombreTablaClaseAcabado = 'gen_clase_acabado';
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
            FROM ' . $this->nombreTablaClaseAcabado . ' aca,
            ' . $this->nombreTabla . ' aca_ma,
            ' . $this->nombreTablaMaterial . ' ma
            WHERE aca.id = aca_ma.gen_clase_acabado_id AND
            ma.id = aca_ma.gen_material_id AND
            aca_ma.gen_clase_acabado_id = ?
            ORDER BY ma.id ASC';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_clase_acabado_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
