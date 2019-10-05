<?php

class ediEstructura {

    private $id;
    private $gen_clase_estructura_id;
    private $gen_material_id;
    private $id_sinat;
    private $es_activo;
    private $edi_edificacion_id;
    private $db;
    private $conn;
    private $nombreTabla = 'edi_estructura';

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

    function guardar() {
        $sql = "INSERT INTO edi_estructura (gen_clase_estructura_id, gen_material_id, "
                . "es_activo , edi_edificacion_id) "
                . "VALUES (?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_clase_estructura_id);
        $cons->bindParam(2, $this->gen_material_id);
        $cons->bindParam(3, $this->es_activo);
        $cons->bindParam(4, $this->edi_edificacion_id);
        if ($cons->execute()) {
            return $id = $this->db->obtenerId('edi_estructura');
        } else {
            $detalle_error = array(
                'tabla' => 'edi_estructura',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
