<?php

class munMunicipal {

    private $id;
    private $id_sinat;
    private $pro_propietario_id;
    private $mun_tipo_condicion_id;
    private $anios_documento;
    private $per_persona_id;
    private $per_direccion_id;
    private $esc_protocolizacion_id;
    private $esc_inscripcion_id;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'mun_municipal';

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
        $sql = "INSERT INTO mun_municipal "
                . "(pro_propietario_id, mun_tipo_condicion_id, anios_documento, "
                . "per_persona_id, per_direccion_id, esc_protocolizacion_id, esc_inscripcion_id, "
                . "es_activo, descripcion) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->pro_propietario_id);
        $cons->bindParam(2, $this->mun_tipo_condicion_id);
        $cons->bindParam(3, $this->anios_documento);
        $cons->bindParam(4, $this->per_persona_id);
        $cons->bindParam(5, $this->per_direccion_id);
        $cons->bindParam(6, $this->esc_protocolizacion_id);
        $cons->bindParam(7, $this->esc_inscripcion_id);
        $cons->bindParam(8, $this->es_activo);
        $cons->bindParam(9, $this->descripcion);
        if ($cons->execute()) {
            return $id = $this->db->obtenerId('mun_municipal');
        } else {
            $detalle_error = array(
                'tabla' => 'mun_municipal',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
