<?php

class lotCaracteristica {

    private $id;
    private $id_sinat;
    private $lot_lista_valores_id;
    private $valor_entero;
    private $valor_alfanumerico;
    private $valor_fecha;
    private $valor_decimal;
    private $lot_lote_id;
    private $lot_tipo_caracteristica_id;
    private $valor_booleano;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_caracteristica';

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
        $sql = 'INSERT INTO ' . $this->nombreTabla . ' (lot_lista_valores_id, valor_alfanumerico, lot_lote_id, lot_tipo_caracteristica_id) 
                VALUES(?, ?, ?, ?)';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->lot_lista_valores_id);
        $cons->bindParam(2, $this->valor_alfanumerico);
        $cons->bindParam(3, $this->lot_lote_id);
        $cons->bindParam(4, $this->lot_tipo_caracteristica_id);
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
