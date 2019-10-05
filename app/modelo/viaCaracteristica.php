<?php

class viaCaracteristica {

    private $id;
    private $id_sinat;
    private $via_lista_valores_id;
    private $valor_entero;
    private $valor_alfanumerico;
    private $valor_fecha;
    private $valor_decimal;
    private $via_via_id;
    private $via_tipo_caracteristica_id;
    private $valor_booleano;
    private $db;
    private $conn;
    private $nombreTabla = 'via_caracteristica';

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
        $sql = "INSERT INTO " . $this->nombreTabla . " (via_lista_valores_id, valor_entero, valor_alfanumerico, valor_fecha, valor_decimal, via_via_id, via_tipo_caracteristica_id, valor_booleano) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->via_lista_valores_id);
        $cons->bindParam(2, $this->valor_entero);
        $cons->bindParam(3, $this->valor_alfanumerico);
        $cons->bindParam(4, $this->valor_fecha);
        $cons->bindParam(5, $this->valor_decimal);
        $cons->bindParam(6, $this->via_via_id);
        $cons->bindParam(7, $this->via_tipo_caracteristica_id);
        $cons->bindParam(8, $this->valor_booleano);

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
