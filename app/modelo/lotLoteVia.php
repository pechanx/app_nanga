<?php

class lotLoteVia{
    
    private $id;
    private $id_sinat;
    private $es_activo;
    private $lot_lote_id;
    private $via_via_id;
    private $acceso;
    private $placa_inmueble;
    private $frente;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_lote_via';

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
        $sql = 'INSERT INTO '.$this->nombreTabla.' (es_activo, lot_lote_id, via_via_id, acceso, placa_inmueble, frente) VALUES (?, ?, ?, ?, ?, ?)';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->es_activo);
        $cons->bindParam(2, $this->lot_lote_id);
        $cons->bindParam(3, $this->via_via_id);
        $cons->bindParam(4, $this->acceso);
        $cons->bindParam(5, $this->placa_inmueble);
        $cons->bindParam(6, $this->frente);
        if ($cons->execute()) {
            return $this->db->obtenerId('lot_lote_via');
        } else {
            $detalle_error = array(
                'tabla' => 'lot_lote_via',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }
}

