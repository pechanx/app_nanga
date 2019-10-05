<?php

class ediInstalacion {

    private $id;
    private $gen_tipo_instalacion_id;
    private $id_sinat;
    private $edi_edificacion_id;
    private $cantidad;
    private $es_activo;
    private $db;
    private $conn;
    private $nombreTabla = 'edi_instalacion';

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
        $sql = "INSERT INTO edi_instalacion (gen_tipo_instalacion_id, edi_edificacion_id, cantidad, es_activo) "
                . "VALUES (?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_tipo_instalacion_id);
        $cons->bindParam(2, $this->edi_edificacion_id);
        $cons->bindParam(3, $this->cantidad);
        $cons->bindParam(4, $this->es_activo);
        if ($cons->execute()) {
            return $id = $this->db->obtenerId('edi_instalacion');
        } else {
            $detalle_error = array(
                'tabla' => 'edi_instalacion',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
