<?php

class escProtocolizacion {

    private $id;
    private $celebrado_ante;
    private $est_canton_id;
    private $notaria;
    private $fecha;
    private $id_sinat;
    private $es_activo;
    private $db;
    private $conn;
    private $nombreTabla = 'esc_protocolizacion';

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
        $sql = "INSERT INTO " . $this->nombreTabla
                . " (celebrado_ante, est_canton_id, notaria, fecha, id_sinat, es_activo) "
                . "VALUES (?, ?, ?, ?, ?, ?)";

        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->celebrado_ante);
        $cons->bindParam(2, $this->est_canton_id);
        $cons->bindParam(3, $this->notaria);
        $cons->bindParam(4, $this->fecha);
        $cons->bindParam(5, $this->id_sinat);
        $cons->bindParam(6, $this->es_activo);

        if ($cons->execute()) {
            return $id = $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
//            print_r($cons->errorInfo());
            return 0;
        }
    }

}
