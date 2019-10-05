<?php

class viaViaServicio {

    private $id;
    private $id_sinat;
    private $gen_servicio_basico_id;
    private $via_via_id;
    private $es_activo;
    private $db;
    private $conn;
    private $nombreTabla = 'via_via_servicio';

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
        $sql = 'INSERT INTO ' . $this->nombreTabla . ' (gen_servicio_basico_id, via_via_id, es_activo) '
                . 'VALUES (?, ?, ?)';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_servicio_basico_id);
        $cons->bindParam(2, $this->via_via_id);
        $cons->bindParam(3, $this->es_activo);

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
