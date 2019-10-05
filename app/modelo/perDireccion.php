<?php

class perDireccion {

    private $id;
    private $id_sinat;
    private $per_persona_id;
    private $per_tipo_direccion_id;
    private $pais;
    private $est_canton_id;
    private $est_parroquia_id;
    private $telefono;
    private $direccion;
    private $correo_electronico;
    private $telefono_celular;
    private $db;
    private $conn;
    private $nombreTabla = 'per_direccion';

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
        $sql = "INSERT INTO per_direccion "
                . "(per_persona_id, per_tipo_direccion_id, pais, est_canton_id, "
                . "est_parroquia_id, telefono, direccion, correo_electronico, telefono_celular) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->per_persona_id);
        $cons->bindParam(2, $this->per_tipo_direccion_id);
        $cons->bindParam(3, $this->pais);
        $cons->bindParam(4, $this->est_canton_id);
        $cons->bindParam(5, $this->est_parroquia_id);
        $cons->bindParam(6, $this->telefono);
        $cons->bindParam(7, $this->direccion);
        $cons->bindParam(8, $this->correo_electronico);
        $cons->bindParam(9, $this->telefono_celular);
        if ($cons->execute()) {
            return $this->db->obtenerId('per_direccion');
        } else {
            $detalle_error = array(
                'tabla' => 'per_direccion',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
