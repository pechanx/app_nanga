<?php

class preCaracteristica {

    private $id;
    private $id_sinat;
    private $pre_tipo_caracteristica_id;
    private $pre_lista_valores_id;
    private $valor_entero;
    private $valor_alfanumerico;
    private $valor_fecha;
    private $valor_decimal;
    private $pre_predio_id;
    private $tipo;
    private $valor_booleano;
    private $db;
    private $conn;
    private $nombreTabla = 'pre_caracteristica';

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
        $sql = "INSERT INTO " .$this->nombreTabla
                . " (pre_tipo_caracteristica_id, pre_lista_valores_id, valor_entero, "
                . "valor_alfanumerico, valor_fecha, valor_decimal, pre_predio_id, tipo) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->pre_tipo_caracteristica_id);
        $cons->bindParam(2, $this->pre_lista_valores_id);
        $cons->bindParam(3, $this->valor_entero);
        $cons->bindParam(4, $this->valor_alfanumerico);
        $cons->bindParam(5, $this->valor_fecha);
        $cons->bindParam(6, $this->valor_decimal);
        $cons->bindParam(7, $this->pre_predio_id);
        $cons->bindParam(8, $this->tipo);
        if ($cons->execute()) {
            return $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo(),
                'pre_tipo_caracteristica_id' => $this->pre_tipo_caracteristica_id
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
