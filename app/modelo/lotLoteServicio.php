<?php

class lotLoteServicio {

    private $id;
    private $id_sinat;
    private $gen_servicio_basico_det_id;
    private $es_activo;
    private $lot_lote_id;
    private $gen_servicio_basico_id;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_lote_servicio';

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

    public function guardar() {
        $sql = "INSERT INTO "
                . $this->nombreTabla . "(gen_servicio_basico_det_id, es_activo, lot_lote_id, gen_servicio_basico_id) "
                . "VALUES(?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_servicio_basico_det_id);
        $cons->bindParam(2, $this->es_activo);
        $cons->bindParam(3, $this->lot_lote_id);
        $cons->bindParam(4, $this->gen_servicio_basico_id);
        if ($cons->execute()) {
            return $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
